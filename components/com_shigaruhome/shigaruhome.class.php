<?php
defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );
class shigaruHome{
	
	var $likedquery 		= null;
	var $recentquery 		= null;
	var $favouritedquery	= null;
    var $ratedquery			= null;
    var $bwnquery			= null;
	var $limitstart			= null;
	var $limitend			= null;
	
   function __construct($limitstart = '0',$limitend = '12'){
	    $lang = JFactory::getLanguage();
		$this->likedquery 		= 'SELECT likes.date_liked, COUNT( likes.item_id ) AS cnt, video.* FROM #__hwdvidslikes AS likes, #__hwdvidsvideos AS video	WHERE video.approved =  "yes" AND video.published =1 AND video.language_id = "'.$lang->getTag().'" AND likes.item_id = video.id AND likes.item_type =  "video" GROUP BY likes.item_id ORDER BY cnt DESC';
		$this->recentquery 		= 'SELECT video.* FROM #__hwdvidsvideos AS video WHERE video.approved =  "yes" AND video.published =1 GROUP BY video.id  AND video.language_id = "'.$lang->getTag().'" ORDER BY video.date_uploaded DESC';
		$this->favouritedquery	= 'SELECT fav.date, COUNT( fav.item_id ) AS cnt, video.* FROM #__hwdvidsfavorites AS fav, #__hwdvidsvideos AS video WHERE video.approved =  "yes" AND video.published =1  AND video.language_id = "'.$lang->getTag().'" AND fav.item_id = video.id GROUP BY fav.item_id ORDER BY cnt DESC';
		$this->ratedquery		= 'SELECT rat.date, COUNT( rat.videoid ) AS cnt, video.* FROM #__hwdvidslogs_votes AS rat, #__hwdvidsvideos AS video WHERE video.approved =  "yes" AND video.published =1  AND video.language_id = "'.$lang->getTag().'" AND rat.videoid = video.id GROUP BY rat.videoid ORDER BY cnt DESC';
		$this->bwnquery			= 'SELECT DISTINCT video.* FROM #__hwdvidsvideos AS video LEFT JOIN #__hwdvidslogs_views AS l ON l.videoid = video.id AND l.date > NOW() - INTERVAL 1440 MINUTE  AND video.language_id = "'.$lang->getTag().'" ORDER BY l.date DESC'; 
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
   
   function getTotalVideosCount(){
		$db = & JFactory::getDBO();
		// get video count
        $db->SetQuery( 'SELECT count(*)'
					 . ' FROM #__hwdvidsvideos AS video'
					 . $hwdvs_joinv
					 . $where
					 );
        $total = $db->loadResult();
        echo $db->getErrorMsg();
        return $total;
		}
   function getTotalCategoryVideosCount($paramcategory){
		$db = & JFactory::getDBO();
		// get video count
        $db->SetQuery( 'SELECT count(*)'
					 . ' FROM #__hwdvidsvideos AS video WHERE category_id ='.$paramcategory
					 . $hwdvs_joinv
					 . $where
					 );
        $total = $db->loadResult();
        echo $db->getErrorMsg();
        return $total;
		}
	
}

?>
