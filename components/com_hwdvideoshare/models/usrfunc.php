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

class hwd_vs_usrfunc
{
   /**
    * List Groups Created by User
    */
    function yourGroups()
	{
		global $hwdvsItemid;
		$my = & JFactory::getUser();
		$app = & JFactory::getApplication();
		$app->redirect(JRoute::_('index.php?option=com_hwdvideoshare&task=viewChannel&Itemid='.$hwdvsItemid.'&user_id='.$my->id.'&sort=groups'));
	}
   /**
    * List Groups User Has Joined
    */
	function yourMemberships()
	{
		global $hwdvsItemid;
		$my = & JFactory::getUser();
		$app = & JFactory::getApplication();
		$app->redirect(JRoute::_('index.php?option=com_hwdvideoshare&task=viewChannel&Itemid='.$hwdvsItemid.'&user_id='.$my->id.'&sort=memberships'));
	}
   /**
    * List User Videos
    */
	function watchHistory()
	{
		global $mainframe, $limitstart, $Itemid, $hwdvs_joinv, $hwdvs_selectv;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$otheruser = Jrequest::getVar( 'guid', 'no' );
		
		$my = & JFactory::getUser();

		
		if (!$my->id && $otheruser=='no') {
			$msg = _HWDVIDS_ALERT_LOG2CYV;
			$mainframe->enqueueMessage($msg);
			$mainframe->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&Itemid='.$Itemid );
		}

		$limit 	= intval($c->vpp);
		if($otheruser=='no')
			$user_id = $my->id;
			else
				$user_id = $otheruser;
		
		$where = ' WHERE video.approved = "yes"';
		$where .= ' AND video.published = 1';
		$where .= ' AND history.videoid = video.id';
		$where .= ' AND history.userid = '.$user_id;

		$db->SetQuery( 'SELECT count(*)'
					 . ' FROM #__hwdvidslogs_views AS history, #__hwdvidsvideos as video '
					 . $where					 
					 );
  		$total = $db->loadResult();
		echo $db->getErrorMsg();
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $total, $limitstart, $limit );
		hwd_vs_html::watchHistory($total,$otheruser,$my->id);
	}
   /**
    * List User Videos
    */
	function yourlearnlater()
	{
		global $mainframe, $limitstart, $Itemid, $hwdvs_joinv, $hwdvs_selectv;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$otheruser = Jrequest::getVar( 'guid', 'no' );
		
		$my = & JFactory::getUser();

		
		if (!$my->id && $otheruser=='no') {
			$msg = _HWDVIDS_ALERT_LOG2CYV;
			$mainframe->enqueueMessage($msg);
			$mainframe->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&Itemid='.$Itemid );
		}

		$limit 	= intval($c->vpp);
		if($otheruser=='no')
			$user_id = $my->id;
			else
				$user_id = $otheruser;
		
		$where = ' WHERE video.approved = "yes"';
		$where .= ' AND video.published = 1';
		$where .= ' AND learnlater.playlist_id = 0 ';
		$where .= ' AND learnlater.user_id = '.$my->id;
		$where .= ' AND learnlater.item_id = video.id';
		$db->SetQuery( 'SELECT count(*)'
					 . ' FROM #__hwdvidsplaylists_videos AS learnlater, #__hwdvidsvideos as video '
					 . $where
					 );
  		$total = $db->loadResult();
		echo $db->getErrorMsg();
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $total, $limitstart, $limit );
		hwd_vs_html::learnLater($total,$otheruser,$my->id);
	}
   /**
    * List User Videos
    */
	function yourVideos()
	{
		global $mainframe, $limitstart, $Itemid, $hwdvs_joinv, $hwdvs_selectv;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$otheruser = Jrequest::getVar( 'guid', 'no' );
		
		$my = & JFactory::getUser();

		
		if (!$my->id && $otheruser=='no') {
			$msg = _HWDVIDS_ALERT_LOG2CYV;
			$mainframe->enqueueMessage($msg);
			$mainframe->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&Itemid='.$Itemid );
		}

		$limit 	= intval($c->vpp);
		if($otheruser=='no')
			$user_id = $my->id;
			else
				$user_id = $otheruser;
		
		$where = ' WHERE video.approved = "yes"';
		$where .= ' AND video.published = 1';
		$where .= ' AND video.user_id = '.$user_id;

		$db->SetQuery( 'SELECT count(*)'
					 . ' FROM #__hwdvidsvideos AS video'
					 . $where
					 
					 );
  		$total = $db->loadResult();
		echo $db->getErrorMsg();
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $total, $limitstart, $limit );
		hwd_vs_html::yourVideos($total,$otheruser,$my->id);
	}
   /**
    * List User Videos
    */
	function yourVideosShared()
	{
		global $mainframe, $limitstart, $Itemid, $hwdvs_joinv, $hwdvs_selectv;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$otheruser = Jrequest::getVar( 'guid', 'no' );
		
		$my = & JFactory::getUser();

		
		if (!$my->id && $otheruser=='no') {
			$msg = _HWDVIDS_ALERT_LOG2CYV;
			$mainframe->enqueueMessage($msg);
			$mainframe->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&Itemid='.$Itemid );
		}

		$limit 	= intval($c->vpp);
		if($otheruser=='no')
			$user_id = $my->id;
			else
				$user_id = $otheruser;
		
		$where = ' WHERE video.approved = "yes"';
		$where .= ' AND video.published = 1';
		$where .= ' AND video.original_autor = 0';
		$where .= ' AND video.user_id = '.$user_id;

		$db->SetQuery( 'SELECT count(*)'
					 . ' FROM #__hwdvidsvideos AS video'
					 . $where
					 
					 );
  		$total = $db->loadResult();
		echo $db->getErrorMsg();
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $total, $limitstart, $limit );
		hwd_vs_html::yourVideosShared($total,$otheruser,$my->id);
	}
	
	/**
    * List User Videos
    */
	function yourVideosCreated()
	{
		global $mainframe, $limitstart, $Itemid, $hwdvs_joinv, $hwdvs_selectv;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$otheruser = Jrequest::getVar( 'guid', 'no' );
		
		$my = & JFactory::getUser();

		
		if (!$my->id && $otheruser=='no') {
			$msg = _HWDVIDS_ALERT_LOG2CYV;
			$mainframe->enqueueMessage($msg);
			$mainframe->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&Itemid='.$Itemid );
		}

		$limit 	= intval($c->vpp);
		if($otheruser=='no')
			$user_id = $my->id;
			else
				$user_id = $otheruser;
		
		$where = ' WHERE video.approved = "yes"';
		$where .= ' AND video.published = 1';
		$where .= ' AND video.original_autor = 1';
		$where .= ' AND video.user_id = '.$user_id;

		$db->SetQuery( 'SELECT count(*)'
					 . ' FROM #__hwdvidsvideos AS video'
					 . $where
					 
					 );
  		$total = $db->loadResult();
		echo $db->getErrorMsg();
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $total, $limitstart, $limit );
		hwd_vs_html::yourVideosCreated($total,$otheruser,$my->id);
	}
	
	/**
    * List User Videos
    */
	function videosIlike()
	{
		global $mainframe, $limitstart, $Itemid, $hwdvs_joinv, $hwdvs_selectv;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$otheruser = Jrequest::getVar( 'guid', 'no' );
		
		$my = & JFactory::getUser();

		
		if (!$my->id && $otheruser=='no') {
			$msg = _HWDVIDS_ALERT_LOG2CYV;
			$mainframe->enqueueMessage($msg);
			$mainframe->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&Itemid='.$Itemid );
		}

		$limit 	= intval($c->vpp);
		if($otheruser=='no')
			$user_id = $my->id;
			else
				$user_id = $otheruser;
		
		$where = ' WHERE video.approved = "yes"';
		$where .= ' AND video.published = 1';
		$where .= ' AND likes.item_id = video.id';
		$where .= ' AND likes.item_type = "video"';
		$where .= ' AND likes.user_id = '.$user_id;

		$db->SetQuery( 'SELECT count(*)'
					. ' FROM #__hwdvidslikes AS likes, #__hwdvidsvideos as video '
					 . $where
					 
					 );
  		$total = $db->loadResult();
		echo $db->getErrorMsg();
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $total, $limitstart, $limit );
		hwd_vs_html::videosIlike($total,$otheruser,$my->id);
	}
	/**
    * List User Videos
    */
	function aboutMe()
	{
		global $mainframe, $limitstart, $Itemid, $hwdvs_joinv, $hwdvs_selectv;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$otheruser = Jrequest::getVar( 'guid', 'no' );
		
		$my = & JFactory::getUser();

		
		if (!$my->id && $otheruser=='no') {
			$msg = _HWDVIDS_ALERT_LOG2CYV;
			$mainframe->enqueueMessage($msg);
			$mainframe->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&Itemid='.$Itemid );
		}
		hwd_vs_html::aboutMe($total,$otheruser,$my->id);
	}
	
   /**
    * List User Favourite Videos
    */
	function yourFavourites()
	{
		global $mainframe,  $Itemid, $hwdvs_joinv, $hwdvs_selectv;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$otheruser = Jrequest::getVar( 'guid', 'no' );
		if (!$my->id && $otheruser=='no') {
			$msg = _HWDVIDS_ALERT_LOG2CYF;
			$mainframe->enqueueMessage($msg);
			$mainframe->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&Itemid='.$Itemid );
		}
		$limit 	= intval($c->vpp);
		if($otheruser=='no')
			$user_id = $my->id;
			else
				$user_id = $otheruser;
		
		$where = ' WHERE video.approved = "yes"';
		$where .= ' AND video.published = 1';
		$where .= ' AND f.userid = '.$user_id;

		$db->SetQuery( 'SELECT count(*)'
					 . ' FROM #__hwdvidsvideos AS video'
					 . ' LEFT JOIN #__hwdvidsfavorites AS f ON video.id = f.item_id'
					 . $where
					 );
  		$total = $db->loadResult();
		echo $db->getErrorMsg();
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $total, $limitstart, $limit );
		hwd_vs_html::yourFavourites($total,$otheruser,$my->id);
	}
	
	function setUserStatusMessage($mind){
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$odate = date("Y-m-d H:i:s", time());
		$data =new stdClass();
		$data->userid = $my->id;
		$data->mind = $mind;
		$data->date = $odate;
		$ret = $db->insertObject( '#__onyourmind', $data);
		
		if (!$ret) {
				echo $db->getErrorMsg();
				return false;
			}else
				return (int)$db->insertid();
	}
	
	
   /**
    * List User Favourite Videos
    */
	function yourPlaylists()
	{
		global $hwdvsItemid;
		$my = & JFactory::getUser();
		$app = & JFactory::getApplication();
		$app->redirect(JRoute::_('index.php?option=com_hwdvideoshare&task=viewChannel&Itemid='.$hwdvsItemid.'&user_id='.$my->id.'&sort=playlists'));
	}
   /**
    * List User Favourite Videos
    */
	function yourChannel()
	{
		global $hwdvsItemid;
		$my = & JFactory::getUser();
		$app = & JFactory::getApplication();
		$app->redirect(JRoute::_('index.php?option=com_hwdvideoshare&task=viewChannel&Itemid='.$hwdvsItemid.'&user_id='.$my->id));
	}
	
   /**
    * List User Favourite Videos
    */
	function getUserProfileSideMenu($guid='no')
	{
		global $smartyvs;
		$lang = JFactory::getLanguage();
		$my = & JFactory::getUser();
		$showown = 'no';
		if($guid==='no' || intval($guid) == $my->id){
			$user_id = $my->id;
			$showown = 'yes';
			}else
				$user_id = $guid;
		$smartyvs->assign("lang", substr($lang->getTag(),0,2));
		$smartyvs->assign("user_id", $user_id);
		$smartyvs->assign("showown", $showown);
		$smartyvs->assign("aboutme", JRoute::_('index.php?option=com_hwdvideoshare&task=aboutme&Itemid=89&lang='.substr($lang->getTag(),0,2).'&guid='.$user_id));
		$smartyvs->assign("watchhistory", JRoute::_('index.php?option=com_hwdvideoshare&task=watchhistory&Itemid=89&lang='.substr($lang->getTag(),0,2).'&guid='.$user_id));
		$smartyvs->assign("yourvideoscreated", JRoute::_('index.php?option=com_hwdvideoshare&task=yourvideoscreated&Itemid=89&lang='.substr($lang->getTag(),0,2).'&guid='.$user_id));
		$smartyvs->assign("yourvideosshared", JRoute::_('index.php?option=com_hwdvideoshare&task=yourvideosshared&Itemid=89&lang='.substr($lang->getTag(),0,2).'&guid='.$user_id));
		$smartyvs->assign("yourlearnlater", JRoute::_('index.php?option=com_hwdvideoshare&task=yourlearnlater&Itemid=89&lang='.substr($lang->getTag(),0,2).'&guid='.$user_id));
		$smartyvs->assign("yourfavourites", JRoute::_('index.php?option=com_hwdvideoshare&task=yourfavourites&Itemid=89&lang='.substr($lang->getTag(),0,2).'&guid='.$user_id));
		$smartyvs->assign("videosilike", JRoute::_('index.php?option=com_hwdvideoshare&task=videosilike&Itemid=89&lang='.substr($lang->getTag(),0,2).'&guid='.$user_id));
		$oResults = $smartyvs->fetch('video_list_sidemenu.tpl');
		return $oResults;
		}
   
   
   /**
    * List User Favourite Videos
    */
	function getHeaderMoreOptions()
	{
		global $smartyvs;
		$smartyvs->assign("songCount", hwd_vs_tools::getTotalCategoryVideosCount(1));
		$smartyvs->assign("watchmeCount", hwd_vs_tools::getTotalCategoryVideosCount(2));
		$smartyvs->assign("theoryCount", hwd_vs_tools::getTotalCategoryVideosCount(3));
		$smartyvs->assign("searched", hwd_vs_tools::getLatestSearchs());
		$oResults = $smartyvs->fetch('headomoreptions.tpl');
		return $oResults;
		}
   
   /**
    * Edit video details
    */
    function editVideoInfo()
	{
		global $Itemid;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$app = & JFactory::getApplication();

		$video_id	= JRequest::getInt( 'video_id', 0 );

		$row = new hwdvids_video($db);
		$row->load( $video_id );

		$db->SetQuery("SELECT * FROM #__hwdvidsvideos WHERE id = $video_id");
		$row = $db->loadObject();

		// check component access settings and deny those without privileges
		if ($c->access_method == 0) {
			if (!hwd_vs_access::allowAccess( $c->gtree_mdrt, $c->gtree_mdrt_child, hwd_vs_access::userGID( $my->id ))) {
				if ($my->id == $row->user_id) {
					if ($my->id == "0") {
						$app->enqueueMessage(_HWDVIDS_ALERT_NOPERM);
						$app->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&Itemid='.$Itemid );
					}
					if ($c->allowvidedit == "0") {
						$app->enqueueMessage(_HWDVIDS_ALERT_NOPERM);
						$app->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&Itemid='.$Itemid );
					}
					// continue
				} else {
					$app->enqueueMessage(_HWDVIDS_ALERT_NOPERM);
					$app->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&Itemid='.$Itemid );
				}
			}
		}

		hwd_vs_html::editVideoInfo($row);
	}

   /**
    * Save editted video details
    */
	function saveVideoInfo()
	{
		global $Itemid;
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$c = hwd_vs_Config::get_instance();
		$app = & JFactory::getApplication();
		$session = JFactory::getSession();
		$row = new hwdvids_video($db);

		$uid = JRequest::getInt( 'owner', 0, 'post' );
		$rowid = JRequest::getInt( 'id', 0, 'post' );
		$referrer = JRequest::getVar( 'referrer', JRoute::_(JURI::root( true ) . '/index.php?option=com_hwdvideoshare&Itemid='.$Itemid ));
		if(strpos($referrer, "ajax=yes") !== false)
			$referrer = str_replace("ajax=yes&", "", $referrer);
		if (!hwd_vs_access::checkAccess($c->gtree_mdrt, $c->gtree_mdrt_child, 1, 0, _HWDVIDS_TITLE_NOACCESS, _HWDVIDS_ALERT_REGISTERFORACCESS, _HWDVIDS_ALERT_NOT_AUTHORIZED, "exclamation.png", 0, "", 0, "core.frontend.moderator"))
		{
			if ($my->id == $uid) {
				if ($my->id == "0") {
					$app->enqueueMessage(_HWDVIDS_ALERT_NOPERM);
					$app->redirect( $referrer );
				}
				if ($c->allowvidedit == "0") {
					$app->enqueueMessage(_HWDVIDS_ALERT_NOPERM);
					$app->redirect( $referrer );
				}
				// continue
			} else {
				$app->enqueueMessage(_HWDVIDS_ALERT_NOPERM);
				$app->redirect( $referrer );
			}
		}

		$row->load( $rowid );
		$old_category = $row->category_id;

		$file_name_org   = $_FILES['thumbnail_file']['name'];
		$file_ext        = substr($file_name_org, strrpos($file_name_org, '.') + 1);
		$file_ext        = strtolower($file_ext);

		$thumbnail = '';
		if ($_FILES['thumbnail_file']['tmp_name'] !== "") {

			if ($row->video_type == "local" || $row->video_type == "swf" || $row->video_type == "mp4")
			{
				$videocode = $row->video_id;
				$thumbnail = $file_ext;
			}
			else
			{
				$videocode = "tp-".$row->id;
				$thumbnail = "tp-".$row->id.".".$file_ext;
			}

			$base_Dir = PATH_HWDVS_DIR.DS."thumbs".DS;
			$upload_result = hwd_vs_tools::uploadFile("thumbnail_file", $videocode, $base_Dir, 2, "jpg,jpeg,png,gif", 1);

			if ($upload_result[0] == "0")
			{
				$msg = $upload_result[1];
				$app->enqueueMessage($msg);
				$app->redirect( JRoute::_(JURI::root( true ) . '/index.php?option=com_hwdvideoshare&Itemid='.$Itemid.'&task=editvideo&video_id='.$row->id ));
			}
			else
			{
				require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'libraries'.DS.'thumbnail.inc.php');

				$thumb_path_s = PATH_HWDVS_DIR.DS."thumbs".DS."$videocode.$file_ext";
				$thumb_path_l = PATH_HWDVS_DIR.DS."thumbs".DS."l_$videocode.$file_ext";

				$twidth_s = round($c->con_thumb_n);
				$theight_s = round($c->con_thumb_n*$c->tar_fb);
				$twidth_l = round($c->con_thumb_l);
				$theight_l = round($c->con_thumb_l*$c->tar_fb);

				list($width, $height, $type, $attr) = @getimagesize($thumb_path_s);
				$ratio = $width/$height;

				//echo $thumb_path_s."<br />".$ratio."<br />".$width."<br />".$height."<br />".$c->tar_fb."<br />".$twidth_s."<br />".$theight_s;

				if ($ratio > 1)
				{
					$resized_l = new Thumbnail($thumb_path_s);
					$resized_l->resize($twidth_l,$twidth_l);
					$resized_l->cropFromCenter($twidth_l, $theight_l);
					$resized_l->save($thumb_path_l);
					$resized_l->destruct();

					$resized_s = new Thumbnail($thumb_path_s);
					$resized_s->resize($twidth_s,$twidth_s);
					$resized_s->cropFromCenter($twidth_s, $theight_s);
					$resized_s->save($thumb_path_s);
					$resized_s->destruct();
				}
				else
				{
					$resized_l = new Thumbnail($thumb_path_s);
					$resized_l->resize($twidth_l,2000);
					$resized_l->cropFromCenter($twidth_l, $theight_l);
					$resized_l->save($thumb_path_l);
					$resized_l->destruct();

					$resized_s = new Thumbnail($thumb_path_s);
					$resized_s->resize($twidth_s,1000);
					$resized_s->cropFromCenter($twidth_s, $theight_s);
					$resized_s->save($thumb_path_s);
					$resized_s->destruct();
				}
			}
		}
		else
		{
			//echo "No thumbnail uploaded";
		}

		$title = hwd_vs_tools::generatePostTitle();
		$description = hwd_vs_tools::generatePostDescription();
		$tags = hwd_vs_tools::generatePostTags();

		if ($c->multiple_cats == "1")
		{
			$categoryid = JRequest::getVar( "category_id", "0", "post" );
                        $category_id = null;
		}
                else
                {
                        $category_id = JRequest::getInt( "category_id", "0", "post" );
                }

		$password = Jrequest::getVar( 'hwdvspassword', '' );
		if (!empty($password))
		{
			$password = md5($password);
			$_POST['password'] 		= $password;
		}
		
		$ext_v_code  = Jrequest::getVar( 'video_id', '' );
		$ext_v_title = stripslashes(Jrequest::getVar( 'videotitle', '' ));
		$ext_v_descr = stripslashes(JRequest::getVar('description', '', 'post', 'string', JREQUEST_ALLOWRAW));
		$ext_v_keywo = Jrequest::getVar( 'tags', '' );
		$ext_v_durat = Jrequest::getVar( 'video_length', '' );		
		$title 				= hwd_vs_tools::generatePostTitle($ext_v_title);
		$description 		= hwd_vs_tools::generatePostDescription($ext_v_descr);
		$tags 				= hwd_vs_tools::generatePostTags($ext_v_keywo);
		$public_private 	= JRequest::getWord( "public_private", "public", "post" );
		$allow_comments 	= JRequest::getInt( "allow_comments", $c->shareoption2, "post" );
		$allow_embedding 	= JRequest::getInt( "allow_embedding", $c->shareoption3, "post" );
		$allow_ratings 		= JRequest::getInt( "allow_ratings", $c->shareoption4, "post" );
		
		$oStoringOutput = new JObject();
		$issearched = Jrequest::getVar( 'issearched', '0' );	
		$originalband = Jrequest::getVar( 'originalband', '' );
		$thirdpartyprovider = $app->getUserState( "hwdvs_song_source", "rdio" );
		if($issearched == '1'){
			//band and songs stuff
			$songindex = Jrequest::getVar( 'songindex', '' );
			$songarray = $session->get('songlist',null, 'songsearch');
			$oSongChosen = $songarray[intval(str_replace("songresults", "", $songindex))];
			if($thirdpartyprovider == 'userinput')
				$oSongChosen = Jrequest::getVar( 'songtitle', '' );
			$oStoringOutput = hwd_vs_tools::storeSong($oSongChosen,$thirdpartyprovider);
			$session->clear('songlist', 'songsearch');
		}
		$_POST['id'] 				= $rowid;
		$_POST['title'] 			= $title;
		$_POST['description'] 		= $description;
		$_POST['category_id'] 		= JRequest::getInt( 'category_id', 0 );
        $_POST['tags'] 				= $tags;
        if($oStoringOutput->oSongId)
			$_POST['song_id'] 			= $oStoringOutput->oSongId;
		if($oStoringOutput->oBandId)	
			$_POST['band_id'] 			= $oStoringOutput->oBandId;
		$_POST['language_id'] 		= Jrequest::getVar( 'language_id', '' );
		$_POST['level_id'] 			= Jrequest::getVar( 'level_id', '' );
		$_POST['genre_id'] 			= Jrequest::getVar( 'genre_id', '' );
		$_POST['intrument_id'] 		= Jrequest::getVar( 'intrument_id', '' );
		$_POST['ip_added'] 			= Jrequest::getVar( 'ip_added', '' );
		$_POST['original_autor'] 	= Jrequest::getVar( 'original_autor', '' );
		
		if (!empty($thumbnail))
		{
			$_POST['thumbnail'] 	= $thumbnail;
		}

		// bind it to the table
		if (!$row->bind($_POST))
		{
			echo "<script type=\"text/javascript\">alert('".$row->getError()."');window.history.go(-1);</script>\n";
			exit();
		}

		// Make sure the record is valid
   		if (!$row->check())
   		{
        	$this->setError($this->_db->getErrorMsg());
			echo "<script type=\"text/javascript\">alert('".$row->getError()."');window.history.go(-1);</script>\n";
			exit();
    	}

		// store it in the db
		if (!$row->store())
		{
			echo "<script type=\"text/javascript\">alert('".$row->getError()."');window.history.go(-1);</script>\n";
			exit();
                }

		if ($c->multiple_cats == "1")
		{
			hwd_vs_tools::applyCategoryLinks($row->id,$categoryid);
		}

		require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'libraries'.DS.'maintenance_recount.class.php');
		hwd_vs_recount::recountVideosInCategory($row->category_id);
		hwd_vs_recount::recountVideosInCategory($old_category_id);

		$msg = _HWDVIDS_ALERT_VIDEDITSAVED;
		$app->enqueueMessage($msg);
		$oRedirect = JRoute::_('index.php?option=com_hwdvideoshare&Itemid=66&task=viewvideo&video_id='.$rowid);
		$app->redirect( $oRedirect );
	}

   /**
	* Delete videos
	*/
	function deleteVideo()
	{
		global $Itemid;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$app = & JFactory::getApplication();

		$videoid	= JRequest::getInt( 'videoid', 0, 'post' );
		$url    	= Jrequest::getVar( 'url', '' );

		$row = new hwdvids_video($db);
		$row->load( $videoid );

		// check component access settings and deny those without privileges
		if ($c->access_method == 0) {
			if (!hwd_vs_access::allowAccess( $c->gtree_mdrt, $c->gtree_mdrt_child, hwd_vs_access::userGID( $my->id ))) {
				if ($my->id == $row->user_id) {
					if ($my->id == "0") {
						$app->enqueueMessage(_HWDVIDS_ALERT_NOPERM);
						if (!empty($url)) {
							$app->redirect( $url );
						} else {
							$app->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&Itemid='.$Itemid );
						}
					}
					if ($c->allowvidedit == "0") {
						$app->enqueueMessage(_HWDVIDS_ALERT_NOPERM);
						if (!empty($url)) {
							$app->redirect( $url );
						} else {
							$app->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&Itemid='.$Itemid );
						}

					}
					// continue
				} else {
					$app->enqueueMessage(_HWDVIDS_ALERT_NOPERM);
					if (!empty($url)) {
						$app->redirect( $url );
					} else {
						$app->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&Itemid='.$Itemid );
					}
				}
			}
		}

		$db->SetQuery("UPDATE #__hwdvidsvideos SET approved = 'deleted', published = 0, featured = 0 WHERE id = $videoid");
		$db->Query();

		if ( !$db->query() ) {
			echo "<script> alert('".$db->getErrorMsg()."'); window.history.go(-1); </script>\n";
			exit();
		}

		$app->enqueueMessage(_HWDVIDS_ALERT_ADMIN_USERVIDDEL);
		if (!empty($url)) {
			$app->redirect( $url );
		} else {
			$app->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&Itemid='.$Itemid );
		}
	}
   /**
	* Featured videos
	*/
	function featuredVideos()
	{
		global $limitstart, $Itemid, $hwdvs_joinv, $hwdvs_selectv;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();

		$limit 	= intval($c->vpp);

		$where = ' WHERE video.approved = "yes"';
		$where .= ' AND video.published = 1';
		$where .= ' AND video.featured = 1';

		$db->SetQuery( 'SELECT count(*)'
					 . ' FROM #__hwdvidsvideos AS video'
					 . $where
					 );
  		$total = $db->loadResult();
		echo $db->getErrorMsg();

		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $total, $limitstart, $limit );

		$query = 'SELECT'.$hwdvs_selectv
				. ' FROM #__hwdvidsvideos AS video'
				. $hwdvs_joinv
				. $where
				. ' ORDER BY video.date_uploaded DESC'
				;

		$db->SetQuery($query, $pageNav->limitstart, $pageNav->limit);
		$rows = $db->loadObjectList();

		hwd_vs_html::featuredVideos($rows, $pageNav, $total);
	}
   /**
	* Featured groups
	*/
	function featuredGroups()
	{
		global $limitstart, $Itemid, $hwdvs_joing, $hwdvs_selectg;
		$db = & JFactory::getDBO();
		$c = hwd_vs_Config::get_instance();

		$limit 	= intval($c->gpp);

		$where = ' WHERE g.published = 1';
		$where .= ' AND g.featured = 1';

		$db->SetQuery( 'SELECT count(*)'
					 . ' FROM #__hwdvidsgroups AS g'
					 . $where
					 );
  		$total = $db->loadResult();
		echo $db->getErrorMsg();

		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $total, $limitstart, $limit );

		$query = 'SELECT'.$hwdvs_selectg
				. ' FROM #__hwdvidsgroups AS g'
				. $hwdvs_joing
				. $where
				. ' ORDER BY g.id DESC'
				;

		$db->SetQuery($query, $pageNav->limitstart, $pageNav->limit);
		$rows = $db->loadObjectList();

		hwd_vs_html::featuredGroups($rows, $pageNav, $total);
	}
   /**
	* Featured groups
	*/
	function setUserTemplate()
	{
		global $Itemid;
		$app = & JFactory::getApplication();

		$hwdvstemplate	= JRequest::getCmd( 'hwdvstemplate' );
		$url	= JRequest::getVar( 'url' );
		$url	= urldecode($url);
		$states = explode("----", $hwdvstemplate);

		$app->setUserState( "com_hwdvideoshare.template_folder", $states[0] );
		$app->setUserState( "com_hwdvideoshare.template_element", $states[1] );

		$app->setUserState( "com_hwdphotoshare.template_folder", "hwdps-template" );
		$app->setUserState( "com_hwdphotoshare.template_element", $states[1] );

		$app->enqueueMessage("Your gallery theme has been changed.");
		$app->redirect( $url );
	}
   /**
    * Edit video details
    */
    function publishVideo()
	{
		global $option, $Itemid;
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$app = & JFactory::getApplication();

		$video_id	= JRequest::getInt( 'video_id', 0 );
		$publish	= JRequest::getInt( 'publish', 0 );

		// check component access settings and deny those without privileges
		if ($c->access_method == 0) {
			if (!hwd_vs_access::allowAccess( $c->gtree_mdrt, $c->gtree_mdrt_child, hwd_vs_access::userGID( $my->id ))) {
				if ($my->id == 0 || $video_id == 0) {
					return;
				}
			}
		}

		$db->setQuery( "UPDATE #__hwdvidsvideos"
						. "\nSET published =" . intval( $publish )
						. "\n WHERE id = $video_id"
						);
		if (!$db->query()) {
		echo "<script> alert('".$db->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
		}

		switch ( $publish ) {
			case 1:
				$msg = $total ._HWDVIDS_ALERT_ADMIN_VIDPUB." ";
				break;

			case 0:
			default:
				$msg = $total ._HWDVIDS_ALERT_ADMIN_VIDUNPUB." ";
				break;
		}

		$app->enqueueMessage($msg);
		$app->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&task=frontpage' );
	}
}
?>
