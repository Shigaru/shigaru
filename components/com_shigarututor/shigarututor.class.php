<?php
defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );
class shigarututorTools{
	
	var $youtubeApiKey 	= null;
    var $channelId		= null;

   function __construct(){
	  $this->setChannelId();		
	  $this->setYoutubeApiKey();
   }
   
   function setYoutubeApiKey($in){
		require_once(JPATH_SITE.DS.'configuration.php');
		$jconfig = new JConfig();
		$this->youtubeApiKey = $jconfig->youtubeApiKey;
   }
   
   function setChannelId($in){
      $this->channelId = 'UC_wSoQNCOUjR3rhg6ej_-HQ';
   }
 
    /**
     * getRecentChannelActivity
     *
     * @return       $code  the trucated string
     */  
	function getRecentChannelActivity(){
		$maxResults = '20';
		$channelActivityURL = 'https://www.googleapis.com/youtube/v3/activities?part=id,snippet,contentDetails&channelId='.$this->channelId.'&maxResults='.$maxResults.'&key='.$this->youtubeApiKey;
		$youJson 			= file_get_contents($channelActivityURL,0,null,null);
		/*var_dump($youJson);
		var_dump($channelActivityURL);*/
		return $youJson;
	}
	
    /**
     * getChannelPlaylists
     *
     * @return       $code  the trucated string
     */  
	function getChannelPlaylists(){
		$maxResults = '10';
		$channelPlaylistsURL = 'https://www.googleapis.com/youtube/v3/playlists?part=id,snippet,contentDetails&channelId='.$this->channelId.'&maxResults='.$maxResults.'&key='.$this->youtubeApiKey;
		$youJson 			= file_get_contents($channelPlaylistsURL,0,null,null);
		/*var_dump($youJson);
		var_dump($channelActivityURL);*/
		return $youJson;
	}
	
    /**
     * getRecentChannelActivity
     *
     * @return       $code  the trucated string
     */  
	function getVideoByExternalId($video_id){
		$db = & JFactory::getDBO();
		$query = 'SELECT *'
				. ' FROM #__hwdvidsvideos AS video'
				. ' WHERE video.video_id = "'.$video_id.'"';
		$db->SetQuery($query);
		$row = $db->loadObject();
		var_dump($row);
		var_dump($query);
		exit;
	}
}

?>
