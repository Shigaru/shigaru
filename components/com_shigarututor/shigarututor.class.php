<?php
defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );
class shigarututorTools{
	
	var $youtubeApiKey 	= null;
    var $channelId		= null;

   function __construct(){
	  $this->setChannelId();		
	  $this->setYoutubeApiKey();
   }
   
   function setYoutubeApiKey(){
		require_once(JPATH_SITE.DS.'configuration.php');
		$jconfig = new JConfig();
		$this->youtubeApiKey = $jconfig->youtubeApiKey;
   }
   
   function setChannelId(){
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
		$query = 'SELECT video.id'
				. ' FROM #__hwdvidsvideos AS video'
				. ' WHERE video.video_id = "'.$video_id.'"';
		$db->SetQuery($query);
		$row = $db->loadObject();
		if(!$row)
			shigarututorTools::sendAlertEmail($video_id);
		return $row;
	}
	
	private function sendAlertEmail($video_id){
		$mailer =& JFactory::getMailer();
		$config =& JFactory::getConfig();
		$sender = array( 
			$config->getValue( 'config.mailfrom' ),
			$config->getValue( 'config.fromname' ) );
		$mailer->setSender($sender);
		$recipient = 'murcialito@gmail.com';
		$mailer->addRecipient($recipient);
		$body   = "The body string";
		$mailer->setSubject('Missing video in Shigaru from Youtube Channel');
		$mailer->setBody($body);
		$body   = '<h2>https://www.youtube.com/watch?v=</h2>'.$video_id
	. '<div>The message string'
	. '<img src="cid:logo_id" alt="logo"/></div>';
		$mailer->isHTML(true);
		$mailer->Encoding = 'base64';
		$mailer->setBody($body);
		$send =& $mailer->Send();
		if ( $send !== true ) {
			echo 'Error sending email: ' . $send->message;
		} else {
			echo 'Mail sent';
		}
	}
}

?>
