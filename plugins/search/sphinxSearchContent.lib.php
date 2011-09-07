<?php
require_once(dirname(__file__) . '/sphinxSearch.lib.php');

class PlgSphinxSearchContent extends PlgSphinxSearch
{
    function PlgSphinxSearchContent($hostname, $port, $index)
    {
        parent::PlgSphinxSearch($hostname, $port, $index);
    }

    function getResults()
    {
        $db =& JFactory::getDBO();
        $user   =& JFactory::getUser();

        $ids = $this->getIds();

        $results = array();
        if (!empty($ids)) {
            $query = 'SELECT a.id, a.title AS title, a.metadesc, a.metakey, a.created AS created, '
		. ' CONCAT(a.introtext, a.fulltext) AS text,'
                . ' CONCAT_WS( "/", u.title, b.title ) AS section,'
                . ' CASE WHEN CHAR_LENGTH(a.alias) THEN CONCAT_WS(":", a.id, a.alias) ELSE a.id END as slug,'
                . ' CASE WHEN CHAR_LENGTH(b.alias) THEN CONCAT_WS(":", b.id, b.alias) ELSE b.id END as catslug,'
                . ' u.id AS sectionid,'
                . ' "2" AS browsernav'
		. ' FROM #__content AS a'
                . ' LEFT JOIN #__categories AS b ON b.id=a.catid'
                . ' LEFT JOIN #__sections AS u ON u.id = a.sectionid'
		. ' WHERE a.id in ( ' . implode(', ',$ids) . ')'
                . ' AND a.access <= '.(int) $user->get( 'aid' )
                . ' AND IF(b.id, b.access <= '.(int) $user->get( 'aid' ) . ', 1) '
                . ' AND IF(u.id, u.access <= '.(int) $user->get( 'aid' ) . ', 1) '
                . ' GROUP BY a.id'
		. " ORDER BY FIELD(a.id, ". implode(', ', $ids) . ")"
            ;

            $db->setQuery($query);
            $results = $db->loadObjectList();

            if (empty ($results)){
                return array();
            }


            // get the actual links from Joomla (maintains clean urls but is probably quite slow)
            foreach($results as $key => $item) {
                if ( empty($item->sectionid) ) {
                    $results[$key]->href = ContentHelperRoute::getArticleRoute($item->id);
                } else {
                    $results[$key]->href = ContentHelperRoute::getArticleRoute($item->slug, $item->catslug, $item->sectionid);
                }
                //get text for build snippets
                $texts[] = strip_tags($results[$key]->text);
            }
            $textSnippets = $this->_sphinx->BuildExcerpts($texts, $this->_index, $this->_query, array("before_match" => '', "after_match" => ''));

            //load snippets
            $counter = 0;
            foreach($results as $key => $item) {
                $results[$key]->text = $textSnippets[$counter++];
            }
        }
        return $results;
    }
}