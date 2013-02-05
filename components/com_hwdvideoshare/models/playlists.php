<?php
/**
 *    @version [ Nightly Build ]
 *    @package hwdVideoShare
 *    @copyright (C) 2007 - 2011 Highwood Design
 *    @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 ***
 *    This program is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    This program is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );

/**
 * This class is the HTML generator for hwdVideoShare frontend
 *
 * @package    hwdVideoShare
 * @author     Dave Horsfall <info@highwooddesign.co.uk>
 * @copyright  2008 Highwood Design
 * @license    http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @version    1.1.4 Alpha RC2.13
 */
class hwd_vs_playlists
{
    /**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */
    function playlists()
	{
		global $limitstart, $hwdvs_joing, $hwdvs_selectg, $smartyvs;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$acl= & JFactory::getACL();
		$usersConfig = &JComponentHelper::getParams( 'com_users' );

		$limit 	= intval($c->gpp);

		$where = ' WHERE pl.published = 1';
		if (!$my->id) {
		$where .= ' AND pl.public_private = "public"';
		}

		$db->SetQuery( 'SELECT count(*)'
					 . ' FROM #__hwdvidsplaylists AS pl'
					 . $where
					 );
  		$total = $db->loadResult();
		echo $db->getErrorMsg();

		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $total, $limitstart, $limit );

		//Groups that are published
		$query = 'SELECT *'
				. ' FROM #__hwdvidsplaylists AS pl'
				. $where
				. ' ORDER BY pl.date_created DESC'
				;

		$db->SetQuery($query, $pageNav->limitstart, $pageNav->limit);
		$rows = $db->loadObjectList();

		//Featured groups
		$query = 'SELECT *'
				. ' FROM #__hwdvidsplaylists AS pl'
				. $where
		        . ' AND pl.featured = 1'
				. ' ORDER BY pl.date_created DESC'
				. ' LIMIT 0, '.$c->fpfeaturedgroups
				;

		$db->SetQuery($query);
		$rowsfeatured = $db->loadObjectList();

		hwd_vs_html::playlists($rows, $rowsfeatured, $pageNav, $total);
	}
    /**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */
	function createPlaylist()
	{
		global $mosConfig_live_site, $Itemid, $smartyvs;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$acl= & JFactory::getACL();

		if (!$my->id) {
			$smartyvs->assign("showconnectionbox", 1);
        	hwd_vs_tools::infomessage(4, 0, _HWDVIDS_TITLE_NOACCESS, _HWDVIDS_ALERT_LOG2ADDC, "exclamation.png", 0);
			return;
		}

		hwd_vs_html::createPlaylist();
	}
    /**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */
	function deletePlaylist()
	{
		global $Itemid;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$acl= & JFactory::getACL();
		$app = & JFactory::getApplication();

		$userid = $my->id;
		$playlistid	= JRequest::getInt( 'playlistid', 0 );

		if (!$my->id) {
			$app->enqueueMessage(_HWDVIDS_ALERT_LOG2REMG);
			$app->redirect( JRoute::_("index.php?option=com_hwdvideoshare&Itemid=".$Itemid."&task=playlists") );
		}

		$db->SetQuery("DELETE FROM #__hwdvidsplaylists WHERE id = $playlistid AND user_id = $my->id");
		$db->Query();
		if ( !$db->query() ) {
			echo "<script> alert('".$db->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
		}

		$msg = _HWDVIDS_ALERT_PLREMOVED;
		$app->enqueueMessage($msg);
		$app->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&task=playlists&Itemid='.$Itemid );
	}
    /**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */
    function savePlaylist()
	{
		global $params, $Itemid, $mosConfig_absolute_path, $mosConfig_mailfrom, $mosConfig_fromname, $mosConfig_live_site, $mosConfig_sitename;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$acl= & JFactory::getACL();

		if ($c->disablecaptcha == "0") {
			$sessid = session_id();
			if (empty($sessid)) {
				session_start();
			}
			if(($_SESSION['security_code'] == $_POST['security_code']) && (!empty($_SESSION['security_code'])) ) {
				// Insert you code for processing the form here, e.g emailing the submission, entering it into a database.
   		    	hwd_vs_playlists::bindNewPlaylist();
				unset($_SESSION['security_code']);
			} else {
				// Insert your code for showing an error message here
        		hwd_vs_tools::infomessage(3, 0, _HWDVIDS_TITLE_UPLDFAIL, _HWDVIDS_ALERT_ERRSC, "exclamation.png", 0);
				return;
			}

   		} else {
   		    hwd_vs_playlists::bindNewPlaylist();
		}
	}
	
	function createAndAddVideo(){
			
		$playlistId = hwd_vs_playlists::bindNewPlaylist();
		$response = 0;
		if($playlistId !=0){
			$response = hwd_vs_playlists::addRemoveItemPlaylist($playlistId);
			}
		return $response;		
		}
	
	/**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */
    function bindNewPlaylist()
	{
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$response = 0;
		
		$playlist_name        = Jrequest::getVar( 'playlist_name', _HWDVIDS_UNKNOWN );
		$playlist_description = Jrequest::getVar( 'playlist_description', _HWDVIDS_UNKNOWN );
		$public_private       = JRequest::getWord( 'public_private' );
		$date_created         = date('Y-m-d H:i:s');
		$date_modified        = date('Y-m-d H:i:s');
		$allow_comments       = JRequest::getInt( 'allow_comments', 0, 'request' );
		$user_id              = $my->id;
		$thumbnail            = '';
		$featured             = 0;

		$row = new hwdvids_playlist($db);

		$_POST['playlist_name'] 	   = $playlist_name;
		$_POST['playlist_description'] = $playlist_description;
		$_POST['public_private'] 	   = $public_private;
		$_POST['date_created'] 	       = $date_created;
		$_POST['date_modified'] 	   = $date_modified;
		$_POST['allow_comments'] 	   = $allow_comments;
		$_POST['user_id'] 	           = $user_id;
		$_POST['thumbnail'] 	       = $thumbnail;
		$_POST['featured'] 			   = $featured;

		if (!$row->bind( $_POST )) {
				return JError::raiseWarning( 500, $row->getError() );
			}else{
				if (!$row->store()) {
						JError::raiseError(500, $row->getError() );
				}
				$response = $row->id;					
			}

		return $response;	
	}
	
	function addRemoveItemPlaylist($playlistId){
		
		$db 			= & JFactory::getDBO();
		$my 			= & JFactory::getUser();
		$playlist_id 	= $playlistId;
		$item_id 		= JRequest::getInt( 'item_id', 0 );
		$date_added 	= date('Y-m-d H:i:s');
		$response 		= 0;
		$row 			= null;
		$oOnlySong 		= !is_numeric($playlistId);
		$where 			= '';	
		
		if(!$oOnlySong){
			$row = new hwdvids_playlist($db);
			$row->load( $playlist_id );
		}
		
		if (($row->user_id != $my->id) && !$oOnlySong) {
			$response = _HWDVIDS_ALERT_NOPERM;
			}else{
				$row = new hwdvidsplaylists_videos($db);
				
				$_POST['playlist_id'] 		= ($oOnlySong)?0:$playlist_id;
				$_POST['user_id'] 			= $my->id;
				$_POST['item_id']  			= $item_id;
				$_POST['date_added'] 	    = $date_added;
				
				if($oOnlySong)
					$where .= ' WHERE a.playlist_id = 0 AND a.user_id='. $my->id;
				else
					$where .= ' WHERE a.playlist_id = '.$playlist_id;
				$where .= ' AND a.item_id = '.$item_id;

				$db->SetQuery( 'SELECT *'
							. ' FROM #__hwdvidsplaylists_videos AS a'
							. $where
							);
				$PLItem = $db->loadResultArray();
				
				if ( sizeof($PLItem)>0 ) {
					
					if (!$row->delete($PLItem[0])){
						JError::raiseError(500, $row->getError() );
						$response = 0;
						}else
							$response = 1;
					}else{
						if (!$row->bind( $_POST )) {
								return JError::raiseWarning( 500, $row->getError() );
							}else{
								if (!$row->store()) {
										JError::raiseError(500, $row->getError() );
								}
								$response = $row->id;							
							}
						}
				
		
		}
		return $response;
	}
	
    /**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */
    function editPlaylist()
	{
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$playlistid = JRequest::getInt( 'playlistid', 0 );

		$row = new hwdvids_playlist($db);
		$row->load( $playlistid );

		//check valid user
		if ($row->user_id != $my->id) {
			$app->enqueueMessage(_HWDVIDS_ALERT_NOPERM);
			$app->redirect( JURI::root() . 'index.php?option=com_hwdvideoshare&task=playlists&Itemid='.$Itemid );
		}

		if (empty($row->playlist_data))
		{
			$row->playlist_data = 0;
		}

		if (!empty($row->playlist_data))
		{
			$playlist = explode(",", $row->playlist_data);
			$playlist = preg_replace("/[^0-9]/", "", $playlist);

			$counter = 0;
			$pl_videos = array();
			for ($i=0, $n=count($playlist); $i < $n; $i++)
			{
				$db->SetQuery('SELECT * FROM #__hwdvidsvideos WHERE id = '.$playlist[$i]);
				$video = $db->loadObject();
				if (isset($video->id))
				{
					$pl_videos[$counter] = $video;
					$counter++;
				}
			}
		}
		else
		{
			$pl_videos = null;
		}

		hwd_vs_html::editPlaylist($row, $pl_videos);
  	}
    /**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */
    function updatePlaylist($paramPlaylistId = null)
	{
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$playlist_id = $paramPlaylistId;
		$response = 0;
		$row = new hwdvids_playlist($db);
		$row->load( $playlist_id );

		if ($row->user_id != $my->id) {
			$response = _HWDVIDS_ALERT_NOPERM;
		}else{

			$playlist_name 		   = Jrequest::getVar( 'playlist_name', null );
			$playlist_description  = Jrequest::getVar( 'playlist_description', null );
			$public_private    	   = JRequest::getWord( 'public_private' ,null);
			$date_modified         = date('Y-m-d H:i:s');
			
			$_POST['id'] 		            = $playlist_id;
			$_POST['playlist_name'] 		= $playlist_name;
			$_POST['playlist_description']  = $playlist_description;
			$_POST['public_private'] 	    = $public_private;
			$_POST['date_modified'] 	    = $date_modified;

			if (!$row->bind( $_POST )) {
				return JError::raiseWarning( 500, $row->getError() );
			}else{
				if (!$row->store()) {
						JError::raiseError(500, $row->getError() );
				}
				$response = $row->id;					
			}
		}
	
		return $response;
  	}
    /**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */
    function viewPlaylist()
	{
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$acl= & JFactory::getACL();
		$usersConfig = &JComponentHelper::getParams( 'com_users' );

		$playlist_id = JRequest::getInt( 'playlist_id', 0 );

		$row = new hwdvids_playlist($db);
		$row->load( $playlist_id );

		hwd_vs_html::viewPlaylist($row);
	}
	/**
	 * Save editted video details
	 */
	function reorderplaylist()
	{
	    global $Itemid;
	    $db =& JFactory::getDBO();
	    $my = & JFactory::getUser();
$app = & JFactory::getApplication();

	    $playlist_id  = JRequest::getInt( 'playlist_id', 0 );
	    $orderdata = JRequest::getVar( 'orderdata' );
	    $neworder = explode("_", $orderdata);
		$updatedOrder = "";

	    for ($i=0, $n=count($neworder)-1; $i < $n; $i++)
	    {
	      $orderslot = explode("--", $neworder[$i]);
	      $order = intval(preg_replace("/[^0-9]/", "", $orderslot[0]));
	      $pid = intval(preg_replace("/[^0-9]/", "", $orderslot[1]));

		  $updatedOrder.= "$pid,";
	    }

		if (substr($updatedOrder, -1) == ",")
		{
			$updatedOrder = substr($updatedOrder, 0, strlen($updatedOrder)-1);
		}

	      // update ordering
	      $db->SetQuery("UPDATE #__hwdvidsplaylists SET playlist_data = \"$updatedOrder\" WHERE id = $playlist_id");
	      $db->Query();
	      if ( !$db->query() ) {
	        echo "<script language=\"javascript\" type=\"text/javascript\"> alert('".addslashes($db->getErrorMsg())."'); window.history.go(-1); </script>\n";
	        exit();
	      }

	    // perform maintenance
		//require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdphotoshare'.DS.'libraries'.DS.'maintenance_recount.class.php');
	   // hwd_ps_tools::setAlbumModifiedDate($album_id);
	   /// include_once(JPATH_SITE.DS.'components'.DS.'com_hwdphotoshare'.DS.'xml'.DS.'xmloutput.class.php');
	   // hwd_ps_xmlOutput::prepareSlideshowXML($album_id);

		$row = new hwdvids_playlist($db);
		$row->load( $playlist_id );
		if (!empty($row->playlist_data))
		{
			$playlist = explode(",", $row->playlist_data);
			$playlist = preg_replace("/[^0-9]/", "", $playlist);

			$counter = 0;
			$pl_videos = array();
			for ($i=0, $n=count($playlist); $i < $n; $i++)
			{
				$db->SetQuery('SELECT * FROM #__hwdvidsvideos WHERE id = '.$playlist[$i]);
				$video = $db->loadObject();
				if (isset($video->id))
				{
					$pl_videos[$counter] = $video;
					$counter++;
				}
			}
		}

		require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'helpers'.DS.'draw.php');
		hwdvsDrawFile::XMLDataFile($pl_videos, "pl_$playlist_id");
		hwdvsDrawFile::XMLPlaylistFile($pl_videos, "pl_$playlist_id");

	    $msg = _HWDPS_ALERT_AREORGANISED;
	    $app->enqueueMessage($msg);
	    $app->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&task=editPlaylist&playlistid='.$playlist_id.'&Itemid='.$Itemid );
    }
   /**
	* Save editted video details
	*/
	function removeVideoFromPlaylist()
	  {
	    global $Itemid;
	    $db =& JFactory::getDBO();
	    $my = & JFactory::getUser();
$app = & JFactory::getApplication();

	    $playlist_id  = JRequest::getInt( 'playlist_id', 0 );
	    $video_id  = JRequest::getInt( 'video_id', 0 );

		$row = new hwdvids_playlist($db);
		$row->load( $playlist_id );

		if ( $row->user_id !== $my->id )
		{
			$msg = "You do not have permission to remove videos from this playlist";
			$app->enqueueMessage($msg);
			$app->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&task=editPlaylist&playlistid='.$playlist_id.'&Itemid='.$Itemid );
		}

                $pl_videos = array();
		if (!empty($row->playlist_data))
		{
			$playlist = explode(",", $row->playlist_data);
			$playlist = preg_replace("/[^0-9]/", "", $playlist);

			for ($i=0, $n=count($playlist); $i < $n; $i++)
			{
                                if (intval($playlist[$i]) !== intval($video_id))
				{
                                    $pl_videos[] = $playlist[$i];
				}
			}
		}

		$newData = implode(",", $pl_videos);

		$db->SetQuery("UPDATE #__hwdvidsplaylists SET playlist_data = \"$newData\" WHERE id = $playlist_id");
		if ( !$db->query() ) { echo "<script language=\"javascript\" type=\"text/javascript\"> alert('".addslashes($db->getErrorMsg())."'); window.history.go(-1); </script>\n"; exit(); }

		// perform maintenance
		require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'libraries'.DS.'maintenance_recount.class.php');
		hwd_vs_recount::recountVideosInPlaylist($playlist_id);

		$row = new hwdvids_playlist($db);
		$row->load( $playlist_id );
		if (!empty($row->playlist_data))
		{
			$playlist = explode(",", $row->playlist_data);
			$playlist = preg_replace("/[^0-9]/", "", $playlist);

			$counter = 0;
			$pl_videos = array();
			for ($i=0, $n=count($playlist); $i < $n; $i++)
			{
				$db->SetQuery('SELECT * FROM #__hwdvidsvideos WHERE id = '.$playlist[$i]);
				$video = $db->loadObject();
				if (isset($video->id))
				{
					$pl_videos[$counter] = $video;
					$counter++;
				}
			}
		}

		require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'helpers'.DS.'draw.php');
		hwdvsDrawFile::XMLDataFile($pl_videos, "pl_$playlist_id");
		hwdvsDrawFile::XMLPlaylistFile($pl_videos, "pl_$playlist_id");

                $msg = _HWDPS_ALERT_VIDEODELETEDFROMPLAYLIST;
            
                $app->enqueueMessage($msg);
                $app->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&task=editPlaylist&playlistid='.$playlist_id.'&Itemid='.$Itemid );
	}
}
?>
