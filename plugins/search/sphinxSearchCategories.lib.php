<?php
require_once(dirname(__file__) . '/sphinxSearch.lib.php');

class PlgSphinxSearchCategories extends PlgSphinxSearch
{
    function PlgSphinxSearchCategories($hostname, $port, $index)
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

            $query = 'SELECT a.title, a.description as text, "" as created, a.name, '
            . ' "2" AS browsernav,'
            . ' s.id AS secid, a.id AS catid,'
            . ' CASE WHEN CHAR_LENGTH(a.alias) THEN CONCAT_WS(":", a.id, a.alias) ELSE a.id END as slug'
            . ' FROM #__categories AS a'
            . ' INNER JOIN #__sections AS s ON s.id = a.section'
            . ' WHERE a.id in ( ' . implode(', ',$ids) . ')'
            . ' AND a.published = 1'
            . ' AND s.published = 1'
            . ' AND a.access <= '.(int) $user->get('aid')
            . ' AND s.access <= '.(int) $user->get('aid')
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
                $results[$key]->href = ContentHelperRoute::getCategoryRoute($item->slug, $item->secid);
                $results[$key]->section  = JText::_( 'Category' );
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