<?php
require_once(dirname(__file__) . '/sphinxSearch.lib.php');

class PlgSphinxSearchSections extends PlgSphinxSearch
{
    function PlgSphinxSearchSections($hostname, $port, $index)
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

            $searchNewsfeeds = JText::_( 'Newsfeeds' );

            $query = 'SELECT a.title AS title, a.description AS text, a.name, '
            . ' "" AS created,'
            . ' "2" AS browsernav,'
            . ' a.id AS secid'
            . ' FROM #__sections AS a'
            . ' WHERE a.id in ( ' . implode(', ',$ids) . ')'
            . ' AND a.published = 1'
            . ' AND a.access <= '.(int) $user->get('aid')
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
                $results[$key]->href = ContentHelperRoute::getSectionRoute($item->secid);
                $results[$key]->section  = JText::_( 'Section' );
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