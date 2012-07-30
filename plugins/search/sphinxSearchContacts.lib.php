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
        $document =& JFactory::getDocument();
		$document->addStyleSheet(JURI::base()."/plugins/hwdvs-template/shigaru/template.css",'text/css',"screen");

        $ids = $this->getIds();

        $results = array();
        if (!empty($ids)) {

            $query ='SELECT DISTINCT v.id as id, v.video_type,v.video_id,v.title,v.description,v.tags,v.song_id,v.band_id,v.language_id,v.category_id,v.genre_id,v.intrument_id,v.level_id,
			UNIX_TIMESTAMP(v.date_uploaded) AS date_added,v.video_length,v.allow_comments,v.allow_embedding,v.allow_ratings,v.rating_number_votes,v.rating_total_points,v.user_id,
			v.updated_rating,v.number_of_comments,v.public_private,v.thumb_snap,v.thumbnail,v.approved,v.number_of_views,u.username as username 
			FROM #__hwdvidsvideos AS v JOIN #__users AS u ON v.user_id = u.id'
			. ' WHERE v.id in ( ' . implode(', ',$ids) . ')'
            . " ORDER BY FIELD(v.id, ". implode(', ', $ids) . ")"
            ;
            

            $db->setQuery($query);
            $results = $db->loadObjectList();
            if (empty ($results)){
            $query ='SELECT DISTINCT v.id as id, v.video_type,v.video_id,v.title,v.description,v.tags,v.song_id,v.band_id,v.language_id,v.category_id,v.genre_id,v.intrument_id,v.level_id,
			UNIX_TIMESTAMP(v.date_uploaded) AS date_added,v.video_length,v.allow_comments,v.allow_embedding,v.allow_ratings,v.rating_number_votes,v.rating_total_points,v.user_id,
			v.updated_rating,v.number_of_comments,v.public_private,v.thumb_snap,v.thumbnail,v.approved,v.number_of_views,u.username as username 
			FROM #__hwdvidsvideos AS v JOIN #__users AS u ON v.user_id = u.id'
			. ' WHERE 1=1'
            . " ORDER BY v.rating_total_points ASC"
            ;
            

            $db->setQuery($query);
            $results = $db->loadObjectList();
            }
            
            // get the actual links from Joomla (maintains clean urls but is probably quite slow)
            foreach($results as $key => $item) {
				/*
            echo '<pre>';
             var_dump(hwd_vs_tools::generateRatingImg(number_format(($item->rating_total_points/$item->rating_number_votes),2)));
             echo '</pre>';
             */
                $rating = 0;
                $results[$key]->href = 'index.php?option=com_hwdvideoshare&task=viewvideo&Itemid=28&video_id='.$item->id.'&lang=en';
                $results[$key]->thumbnail = 'hwdvideos/thumbs/'.$item->thumbnail;
                $results[$key]->userlink = 'index.php?option=com_comprofiler&Itemid=0&task=userProfile&user='.$item->user_id;
                $results[$key]->instrument = constant(hwd_vs_tools::getVideoInstrument($item->intrument_id));
                $results[$key]->genre = constant(hwd_vs_tools::getVideoGenre($item->genre_id));
                $results[$key]->language = constant($item->language_id);
                $results[$key]->level = constant(hwd_vs_tools::getVideoLevel($item->level_id));
				if(($item->rating_total_points/$item->rating_number_votes)>0)$rating=$item->rating_total_points/$item->rating_number_votes;
					if ($rating > 5 || $rating < 0) { $rating = "0"; }
					$rating = round($rating, 0);
					$results[$key]->rating = "<img src=\"".JURI::base()."/components/com_hwdvideoshare/assets/images/ratings/stars".intval($rating)."0.png\" width=\"80\" height=\"16\" alt=\"".constant("_HWDVIDS_ALT_RATED")." ".$rating."\" />";
                $texts[] = strip_tags($results[$key]->description);
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
