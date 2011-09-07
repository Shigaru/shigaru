<?php
require_once(dirname(__file__) . '/sphinxSearch.lib.php');

class PlgSphinxSearchContacts extends PlgSphinxSearch
{
    function PlgSphinxSearchContacts($hostname, $port, $index)
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
            /*$results = array();
            foreach ($ids as $id) {
                $query = 'SELECT params '
                    . ' FROM #__contacts '
                    . ' WHERE id = ' . $id ;
                $db->setQuery($query);
                $params = $db->loadResult();
            }*/

            $section = JText::_( 'Contact' );
            $query = 'SELECT a.name as title, CONCAT_WS(" ", a.name, a.con_position, a.address, a.country, a.misc) as text, "" AS created,'
            . ' CASE WHEN CHAR_LENGTH(a.alias) THEN CONCAT_WS(\':\', a.id, a.alias) ELSE a.id END as slug, '
            . ' CASE WHEN CHAR_LENGTH(b.alias) THEN CONCAT_WS(\':\', b.id, b.alias) ELSE b.id END AS catslug, '
            . ' CONCAT_WS( " / ", '.$db->Quote($section).', b.title ) AS section,'
            . ' "2" AS browsernav'
            . ' FROM #__contact_details AS a'
            . ' INNER JOIN #__categories AS b ON b.id = a.catid'
            . ' WHERE a.id in ( ' . implode(', ',$ids) . ')'
            . ' AND b.published = 1'
            . ' AND a.access <= '.(int) $user->get( 'aid' )
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
                $results[$key]->href = 'index.php?option=com_contact&view=contact&id='.$item->slug.'&catid='.$item->catslug;
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