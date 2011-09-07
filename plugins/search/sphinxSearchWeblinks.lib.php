<?php
require_once(dirname(__file__) . '/sphinxSearch.lib.php');

class PlgSphinxSearchWeblinks extends PlgSphinxSearch
{
    function PlgSphinxSearchWeblinks($hostname, $port, $index)
    {
        parent::PlgSphinxSearch($hostname, $port, $index);
    }

    function getResults()
    {
        $db =& JFactory::getDBO();
        $user   =& JFactory::getUser();

        $ids = $this->getIds();

        $section = JText::_( 'Web Links' );

        $results = array();
        if (!empty($ids)) {
            $query = 'SELECT a.title, a.url, a.date AS created, a.description as text, '
                . ' CASE WHEN CHAR_LENGTH(a.alias) THEN CONCAT_WS(\':\', a.id, a.alias) ELSE a.id END as slug, '
                . ' CASE WHEN CHAR_LENGTH(b.alias) THEN CONCAT_WS(\':\', b.id, b.alias) ELSE b.id END as catslug, '
                . ' CONCAT_WS( " / ", '.$db->Quote($section).', b.title ) AS section,'
                . ' "1" AS browsernav'
		. ' FROM #__weblinks a'
                . ' INNER JOIN #__categories AS b ON b.id = a.catid'
		. ' WHERE a.id in ( ' . implode(', ',$ids) . ')'
                . ' AND a.published = 1'
                . ' AND b.published = 1'
                . ' AND b.access <= '.(int) $user->get( 'aid' )
		. " ORDER BY FIELD(a.id, ". implode(', ', $ids) . ")"
            ;

            $db->setQuery($query);
            $results = $db->loadObjectList();

            if (empty ($results)){
                return array();
            }

            // get the actual links from Joomla (maintains clean urls but is probably quite slow)
            foreach($results as $key => $item) {
                $results[$key]->href = WeblinksHelperRoute::getWeblinkRoute($item->slug, $item->catslug);
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