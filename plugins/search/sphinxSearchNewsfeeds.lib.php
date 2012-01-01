<?php
require_once(dirname(__file__) . '/sphinxSearch.lib.php');

class PlgSphinxSearchNewsfeeds extends PlgSphinxSearch
{
    function PlgSphinxSearchNewsfeeds($hostname, $port, $index)
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
			//'SELECT c.id, c.object_id, c.object_group, c.userid, c.name, c.username AS created, c.title AS title,  c.comment AS text, c.email, c.homepage, c.date as datetime, c.ip, c.published, c.checked_out, 
			//c.checked_out_time , c.isgood, c.ispoor , v.value as voted FROM #__jcomments AS c LEFT JOIN #__jcomments_votes AS v ON c.id = v.commentid AND v.ip = \'127.0.0.1\' WHERE c.object_group = \'com_hwdvideoshare_v\' AND c.published = 1 ORDER BY c.date DESC LIMIT 0, 10'
            $query = '
            SELECT c.object_id, c.object_group, c.userid, c.name, c.username, c.title , c.comment as title , c.email, c.homepage, c.date as datetime, c.ip, c.published, c.checked_out, 
			c.checked_out_time , c.isgood, c.ispoor , v.value as voted, a.title,a.description,a.tags,a.song_id,a.band_id,a.language_id,a.category_id,a.genre_id,a.intrument_id,a.level_id,
			a.rating_number_votes,a.rating_total_points,a.updated_rating,a.thumbnail,number_of_views'
            .' FROM #__jcomments AS c LEFT JOIN #__jcomments_votes AS v ON c.id = v.commentid INNER JOIN jos_hwdvidsvideos AS a ON a.id = c.object_id'
            ." ORDER BY FIELD(c.id, ". implode(', ', $ids) . ")"
            ;

            $db->setQuery($query);
            $results = $db->loadObjectList();

            if (empty ($results)){
                return array();
            }
            
             // get the actual links from Joomla (maintains clean urls but is probably quite slow)
             
             /*
echo '<pre>';
             var_dump($results);
             echo '</pre>';*/
            foreach($results as $key => $item) {
                $results[$key]->href = 'index.php?option=com_hwdvideoshare&task=viewvideo&Itemid=28&video_id='.$item->object_id.'&lang=en'.$item->slug.'&catid='.$item->catslug;
                $results[$key]->thumbnail = 'hwdvideos/thumbs/'.$item->thumbnail;
                $texts[] = strip_tags($results[$key]->title);
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
