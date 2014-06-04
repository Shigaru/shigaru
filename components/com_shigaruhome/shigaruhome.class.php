<?php
defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );
class shigaruHome{
	
	var $likedquery 		= 'SELECT likes.date_liked, COUNT( likes.item_id ) AS cnt, video.* FROM #__hwdvidslikes AS likes, #__hwdvidsvideos AS video	WHERE video.approved =  "yes" AND video.published =1 AND likes.item_id = video.id AND likes.item_type =  "video" GROUP BY likes.item_id ORDER BY cnt DESC';
	var $recentquery 		= 'SELECT video.* FROM #__hwdvidsvideos AS video WHERE video.approved =  "yes" AND video.published =1 GROUP BY video.id ORDER BY video.date_uploaded DESC';
	var $favouritedquery	= 'SELECT fav.date, COUNT( fav.item_id ) AS cnt, video.* FROM #__hwdvidsfavorites AS fav, #__hwdvidsvideos AS video WHERE video.approved =  "yes" AND video.published =1 AND fav.item_id = video.id GROUP BY fav.item_id ORDER BY cnt DESC';
    var $ratedquery			= 'SELECT rat.date, COUNT( rat.videoid ) AS cnt, video.* FROM #__hwdvidslogs_votes AS rat, #__hwdvidsvideos AS video WHERE video.approved =  "yes" AND video.published =1 AND rat.videoid = video.id GROUP BY rat.videoid ORDER BY cnt DESC';
    var $bwnquery			= 'SELECT DISTINCT video.* FROM #__hwdvidsvideos AS video LEFT JOIN #__hwdvidslogs_views AS l ON l.videoid = video.id AND l.date > NOW() - INTERVAL 1440 MINUTE ORDER BY l.date DESC';
	var $limitstart			= null;
	var $limitend			= null;
	
   function __construct($limitstart = '0',$limitend = '12'){
	  $this->setLimits($limitstart,$limitend);
   }
   
   function getVideoList($videolist = 'liked',$limitstart = null,$limitend = null){
	    $oList = null;
	    $this->defineLimits($limitstart,$limitend);
		switch ($videolist){			
				case 'liked':
							$oList = $this->getRawVideoList($this->likedquery);
						break;
				case 'favoured':
							$oList = $this->getRawVideoList($this->favouritedquery);
						break;
				case 'rated':
							$oList = $this->getRawVideoList($this->ratedquery);
						break;
				case 'recent':
							$oList = $this->getRawVideoList($this->recentquery);
						break;
				case 'bwn':
							$oList = $this->getRawVideoList($this->bwnquery);
						break;
				default		:
							$oList = $this->getRawVideoList($this->likedquery);
						break;
			}
		return $oList;		
   }
   
   private function getRawVideoList($query = ''){
      $db = & JFactory::getDBO();
      $db->SetQuery($query.' LIMIT '.$this->limitstart.','.$this->limitend);
	  $oVideoList = $db->loadObjectList();
	  return $oVideoList;
   }
   
   private function defineLimits($limitstart,$limitend){
      if($limitstart && $limiten)
			$this->setLimits($limitstart,$limitend);
			else if($limitstart && !$limiten)
				$this->setLimits($limitstart,$this->limitend);
			else if(!$limitstart && $limiten)
				$this->setLimits($this->limitstart,$limitend);
	  return;
   }
   
   private function setLimits($limitstart,$limitend){
      $this->limitstart = $limitstart;
      $this->limitend = $limitend;
	  return;
   }
	
}

?>
