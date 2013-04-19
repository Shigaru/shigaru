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

class hwdvids_BE_videos
{
   /**
	* show videos
	*/
	function showvideos()
	{
		global $limit, $limitstart, $option;
  		$db =& JFactory::getDBO();
		$app = & JFactory::getApplication();

		jimport( 'joomla.filesystem.file' );

		$search 		  = $app->getUserStateFromRequest( $option.'search', 'search', '' );
		$search 		  = $db->getEscaped( trim( strtolower( $search ) ) );
		$filter_order     = $app->getUserStateFromRequest( $option.'filter_order', 'filter_order', 'date_uploaded', 'cmd' );
		$filter_order_Dir = $app->getUserStateFromRequest( $option.'filter_order_Dir', 'filter_order_Dir', 'desc', 'word' );
		$category_id      = $app->getUserStateFromRequest( $option.'category_id', 'category_id', '' );
		$featuredOnly     = $app->getUserStateFromRequest( $option.'featuredOnly', 'featuredOnly', '' );

		if ($filter_order !== "ordering")
		{
			$filter_secondary = ", ordering";
		}
		else
		{
			if ($featuredOnly && file_exists(JPATH_SITE.DS.'media'.DS.'hwdvsfeatured.order'))
			{
				$orderString = JFile::read(JPATH_SITE.DS.'media'.DS.'hwdvsfeatured.order');
				$featuredArray = explode(",", $orderString);
				$total = count($featuredArray);
				for ($i = 0; $i < $total; $i ++)
				{
					$featuredArray[$i] = intval($featuredArray[$i]);
				}
				$featuredOrder = implode(",",$featuredArray);
				$featuredOrderString =

				$filter_order     = "FIELD( id, $featuredOrder )";
				$filter_order_Dir = "";
				$filter_secondary = "";
			}
			else
			{
				$filter_order     = "category_id";
				$filter_order_Dir = "asc";
				$filter_secondary = ", ordering";
			}
		}

		$where = ' WHERE published >= 0';
		if (!empty($search))
		{
			$where.= " AND LOWER(title) LIKE '%$search%'";
		}
		if ($category_id == "none")
		{
			$where.= " AND category_id = 0";
		}
		else if (!empty($category_id))
		{
			$where.= " AND category_id = $category_id";
		}

		if ($featuredOnly == 1)
		{
			$where.= " AND featured = 1";
		}

		$db->SetQuery("SELECT count(*) FROM #__hwdvidsvideos $where");
		$total = $db->loadResult();

		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $total, $limitstart, $limit );

		$query = "SELECT * FROM #__hwdvidsvideos $where ORDER BY $filter_order $filter_order_Dir $filter_secondary";
		$db->SetQuery( $query, $pageNav->limitstart, $pageNav->limit );
		$rows = $db->loadObjectList();

		hwdvids_HTML::showvideos($rows, $pageNav, $search, $category_id, $featuredOnly);
	}
   /**
	* edit videos
	*/
	function editvideos($cid)
	{
		global $option;
  		$db =& JFactory::getDBO();
		$my = & JFactory::getUser();
		$app = & JFactory::getApplication();

		$row = new hwdvids_video( $db );
		
		$row->load( $cid );
		$c = hwd_vs_Config::get_instance();
//var_dump($row);
        // get view count
        require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'libraries'.DS.'maintenance_recount.class.php');
        hwd_vs_recount::recountVideoViews($row->id);

		$db->SetQuery("SELECT *"
							. "\n FROM #__hwdvidsvideos"
							. "\n WHERE id = $cid");
		$row = $db->loadObject();

		$db->SetQuery("SELECT category_name"
							. "\n FROM #__hwdvidscategories"
							. "\n WHERE id = $row->category_id");
		$cat = $db->loadObject();

		if ($row->user_id == 0) {
			$usr->username = "Guest";
		} else {
			$db->SetQuery("SELECT username"
								. "\n FROM #__users"
								. "\n WHERE id = $row->user_id");
			$usr = $db->loadObject();
		}

		$db->SetQuery( "SELECT count(*)"
							. "\nFROM #__hwdvidsfavorites"
							. "\nWHERE item_id = $cid"
							);
		$favs = $db->loadResult();
		echo $db->getErrorMsg();
		if (empty($favs)) {$favs = 0;}

		$db->SetQuery( "SELECT count(*)"
							. "\nFROM #__hwdvidsflagged_videos"
							. "\nWHERE videoid = $cid"
							);
		$flagged = $db->loadResult();
		echo $db->getErrorMsg();
		if (empty($flagged)) {$flagged = 0;}

		$upld_thumbnail = JRequest::getInt( 'upld_thumbnail', 0, 'post' );
		if ($upld_thumbnail == "1") {

			$file_name_org   = $_FILES['thumbnail_file']['name'];
			$file_ext        = substr($file_name_org, strrpos($file_name_org, '.') + 1);

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
				$app->redirect( 'index.php?option=com_hwdvideoshare&Itemid='.$Itemid.'&task=editvidsA&hidemainmenu=1&cid='.$row->id );
			}
			else
			{
				include_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'libraries'.DS.'thumbnail.inc.php');

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

			// update db with new thumbnail
			$db->SetQuery("UPDATE #__hwdvidsvideos SET thumbnail = '$thumbnail' WHERE id = $row->id");
			$db->Query();
			if ( !$db->query() ) {
				echo "<script> alert('".$db->getErrorMsg()."'); window.history.go(-1); </script>\n";
				exit();
			}

			$msg = "Thumbnail was successfully uploaded";
			$app->enqueueMessage($msg);
			$app->redirect( 'index.php?option=com_hwdvideoshare&Itemid='.$Itemid.'&task=editvidsA&hidemainmenu=1&cid='.$row->id );
		}

		hwdvids_HTML::editvideos($row, $cat, $usr, $favs, $flagged);
	}
   /**
	* save videos
	*/
	function savevideo()
	{
		global $option, $task, $j16;
		$app = & JFactory::getApplication();
		$session = JFactory::getSession();
        $c = hwd_vs_Config::get_instance();      
		$db = & JFactory::getDBO();
		
		$oStoringOutput = new JObject();
		$issearched = Jrequest::getVar( 'issearched', '' );	
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
		}else{
			$oSongChosen = Jrequest::getVar( 'songtitle', '' );
			if($oSongChosen != '')
				$oStoringOutput = hwd_vs_tools::storeSong($oSongChosen,$thirdpartyprovider,0,$originalband);
			}
		if($oStoringOutput->oSongId)
			$_POST['song_id'] 			= $oStoringOutput->oSongId;
		if($oStoringOutput->oBandId)	
			$_POST['band_id'] 			= $oStoringOutput->oBandId;
		
		$row = new hwdvids_video($db);

		$requestarray = JRequest::get( 'default', 2 );
		$rawDescription = trim($requestarray['description']);

		$id 				= Jrequest::getInt( 'id', '' );
		$title 				= hwd_vs_tools::generatePostTitle();
		$description 		= hwd_vs_tools::generatePostDescription($rawDescription);
		$tags 				= hwd_vs_tools::generatePostTags();
		$views 				= Jrequest::getInt( 'views', '' );

                if ($c->multiple_cats == "1")
		{
			$categoryid = JRequest::getVar( "category_id", "0", "post" );
			$category_id = null;
		}
                else
                {
                        $category_id = JRequest::getInt( "category_id", "0", "post" );
                }

		if (!empty($views))
		{
			$db->SetQuery("SELECT count(*) FROM #__hwdvidslogs_views WHERE videoid = ".$id);
			$unarchived_count = $db->loadResult();
			$archived_count = $views - $unarchived_count;

			$db->SetQuery("SELECT count(*) FROM #__hwdvidslogs_archive WHERE videoid = ".$id);
			$total = $db->loadResult();

			if ($total > 0)
			{
				$db->SetQuery("UPDATE #__hwdvidslogs_archive SET views = $archived_count WHERE videoid = ".$id);
				if ( !$db->query() )
				{
					echo "<script> alert('".$db->getErrorMsg()."'); window.history.go(-1); </script>\n";
					exit();
				}
			}
			else
			{
				$row_new = new hwdvidslogs_archive($db);

				$_POST['id'] 			= null;
				$_POST['videoid'] 		= $id;
				$_POST['views'] 		= $archived_count;

				if (!$row_new->bind($_POST))
				{
					echo "<script> alert('".$row_new->getError()."'); window.history.go(-1); </script>\n";
					exit();
				}

				if (!$row_new->store())
				{
					echo "<script> alert('".$row_new -> getError()."'); window.history.go(-1); </script>\n";
					exit();
				}

				$_POST['id'] 			= $id;
			}
		}

		$password = Jrequest::getVar( 'hwdvspassword', '' );
		if (!empty($password))
		{
			$password = md5($password);
			$_POST['password'] 		= $password;
		}

		if ($_POST['public_private'] == "group")
		{
			$gtree_video = Jrequest::getVar( 'gtree_video', '' );
			if (!empty($gtree_video))
			{
				$_POST['password'] 		= $gtree_video;
			}
		}

		if ($_POST['public_private'] == "level")
		{
			$jacl_video = Jrequest::getVar( 'jacl_video', '' );
			if (!empty($jacl_video))
			{
				if (isset($jacl_video) && $jacl_video !== '') { $jacl_video = @implode(",", $jacl_video); }
				$_POST['password'] 		= $jacl_video;
			}
		}

		$_POST['title'] 			= $title;
		$_POST['description'] 		= $description;
		$_POST['tags'] 				= $tags;
		$_POST['category_id'] 		= JRequest::getInt( 'category_id', 0 );

		// bind it to the table
		if (!$row -> bind($_POST)) {
			echo "<script> alert('"
				.$row -> getError()
				."'); window.history.go(-1); </script>\n";
			exit();
		}

		// store it in the db
		if (!$row -> store()) {
			echo "<script> alert('"
				.$row -> getError()
				."'); window.history.go(-1); </script>\n";
			exit();
		}

		if ($c->multiple_cats == "1")
		{
			hwd_vs_tools::applyCategoryLinks($row->id,$categoryid);
		}

		$row->checkin();

                if ($j16)
                {
                        if (key_exists( 'rules', $_POST['jform'] ) && is_array( $_POST['jform']['rules'] ))
                        {
                                $registry = new JRegistry();
                                $registry->loadArray($_POST['jform']['rules']);
                                $rulesString = $registry->toString();
                                $rules = new JRules($registry->toString());
                        }

                        //
                        // Asset Tracking
                        //

                        $updateNulls = false;
                        $assetCheck = JTable::getInstance('Asset');
                        $assetCheck->loadByName('com_hwdvideoshare');

                        $parentId	= $assetCheck->id;
                        $name		= 'com_hwdvideoshare.video.'.(int) $row->id;
                        $title		= $row->title;

                        $asset	= JTable::getInstance('Asset');
                        $asset->loadByName($name);

                        // Check for an error.
                        if ($error = $asset->getError())
                        {
                                $this->setError($error);
                        }
                        else
                        {
                                // Prepare the asset to be stored.
                                $asset->parent_id	= $parentId;
                                $asset->name		= $name;
                                $asset->title		= $title;

                                if ($rules instanceof JRules) {
                                        $asset->rules = (string) $rules;
                                }

                                if (!$asset->check() || !$asset->store($updateNulls))
                                {
                                        print_r($asset->getError());
                                        exit;
                                        //return false;
                                }
                        }
                }

		include(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'libraries'.DS.'maintenance_recount.class.php');
		hwd_vs_recount::recountVideosInCategory($row->category_id);

		if ($task == "apply")
		{
			$app->enqueueMessage(_HWDVIDS_ALERT_VIDSAVED);
			$app->redirect( JURI::root( true ) . '/administrator/index.php?option=com_hwdvideoshare&task=editvidsA&hidemainmenu=1&cid='.$row->id );
		}
		else
		{
			$app->enqueueMessage(_HWDVIDS_ALERT_VIDSAVED);
			$app->redirect( JURI::root( true ) . '/administrator/index.php?option=com_hwdvideoshare&task=videos' );
		}
	}
   /**
	* cancel videos
	*/
	function cancelvideo()
	{
		global $option;
		$db = & JFactory::getDBO();
		$app = & JFactory::getApplication();

		$row = new hwdvids_video( $db );
		$row->bind( $_POST );
		$row->checkin();

		$app->enqueueMessage($msg);
		$app->redirect( JURI::root( true ) . '/administrator/index.php?option=com_hwdvideoshare&task=videos' );
	}
   /**
	* publish/unpublish videos
	*/
	function publishvid($cid=null, $publish=1)
	{
		global $task, $option;
  		$db =& JFactory::getDBO();
		$my = &JFactory::getUser();
		$app = & JFactory::getApplication();

		if (count( $cid ) < 1) {
			$action = $publish == 1 ? 'publish' : ($publish == -1 ? 'archive' : 'unpublish');
			echo "<script> alert('Select an item to $action'); window.history.go(-1);</script>\n";
			exit;
		}

		$total = count ( $cid );
		$cids = implode( ',', $cid );

		$db->setQuery( "UPDATE #__hwdvidsvideos"
						. "\nSET published =" . intval( $publish )
						. "\n WHERE id IN ( $cids )"
						. "\n AND ( checked_out = 0 OR ( checked_out = $my->id ) )"
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

		if (count( $cid ) == 1) {
			$row = new hwdvids_video( $db );
			$row->checkin( $cid[0] );
		}
		$app->enqueueMessage($msg);
		$app->redirect( JURI::root( true ) . '/administrator/index.php?option=com_hwdvideoshare&task=videos' );
	}
   /**
	* feature/unfeature videos
	*/
	function featurevid($cid=null, $publish=1)
	{
		global $task, $option;
  		$db =& JFactory::getDBO();
		$my = &JFactory::getUser();
		$app = & JFactory::getApplication();

		if (count( $cid ) < 1) {
			$action = $publish == 1 ? 'feature' : ($publish == -1 ? 'archive' : 'unfeature');
			echo "<script> alert('Select an item to $action'); window.history.go(-1);</script>\n";
			exit;
		}

		$total = count ( $cid );
		$cids = implode( ',', $cid );

		$db->setQuery( "UPDATE #__hwdvidsvideos"
						. "\nSET featured =" . intval( $publish )
						. "\n WHERE id IN ( $cids )"
						. "\n AND ( checked_out = 0 OR ( checked_out = $my->id ) )"
						);
		if (!$db->query()) {
		echo "<script> alert('".$db->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
		}

		switch ( $publish ) {
			case 1:
				$msg = $total ._HWDVIDS_ALERT_ADMIN_VIDFEAT." ";
				break;

			case 0:
			default:
				$msg = $total ._HWDVIDS_ALERT_ADMIN_VIDUNFEAT." ";
				break;
		}


		// update all non featured videos to ordering zero
		$db->setQuery( "UPDATE #__hwdvidsvideos"
						. "\n SET ordering = 0"
						. "\n WHERE featured = 0"
						);
		if (!$db->query()) {
		echo "<script> alert('".$db->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
		}
		// get the maximum ordering value
		$db->setQuery( "SELECT MAX(ordering) FROM #__hwdvidsvideos"
						. "\n WHERE featured = 1"
						);
		$maxorder = $db->loadResult();

		// get all featured videos
		$db->setQuery( "SELECT * FROM #__hwdvidsvideos"
						. "\n WHERE id IN ( $cids )"
						. "\n AND ordering = 0"
						);
		$rows = $db->loadObjectList();
		// reorder all featured videos that are set to zero order
		$neworder=$maxorder+1;
		for($i=0, $n=count( $rows ); $i < $n; $i++) {
		$row = $rows[$i];

			$db->setQuery( "UPDATE #__hwdvidsvideos"
							. "\n SET ordering =" . $neworder
							. "\n WHERE id =" . $row->id
							);
			if (!$db->query()) {
			echo "<script> alert('".$db->getErrorMsg()."'); window.history.go(-1); </script>\n";
			exit();
			}

		$neworder++;
		}


		if (count( $cid ) == 1) {
			$row = new hwdvids_video( $db );
			$row->checkin( $cid[0] );
		}
		$app->enqueueMessage($msg);
		$app->redirect( JURI::root( true ) . '/administrator/index.php?option=com_hwdvideoshare&task=videos' );

	}
   /**
	* delete videos
	*/
	function deletevids($cid)
	{
		global $option;
  		$db =& JFactory::getDBO();
		$app = & JFactory::getApplication();

		$total = count( $cid );
		$events = join(",", $cid);

		$db->SetQuery("UPDATE #__hwdvidsvideos SET approved = 'deleted', published = 0, featured = 0 WHERE id IN ($events)");
		$db->Query();

		if ( !$db->query() ) {
			echo "<script> alert('".$db->getErrorMsg()."'); window.history.go(-1); </script>\n";
			exit();
		}

		$msg = $total ._HWDVIDS_ALERT_ADMIN_VIDDEL." ";
		$app->enqueueMessage($msg);
		$app->redirect( JURI::root( true ) . '/administrator/index.php?option=com_hwdvideoshare&task=videos' );
	}
   /**
	*/
	function orderAll($uid, $inc)
	{
		$db = & JFactory::getDBO();
		$app = & JFactory::getApplication();

		$row = new hwdvids_video($db);
		$row->load($uid);

		if ( ! $row->move( $inc ) ) {
			$this->setError( $this->_db->getErrorMsg() );
			return false;
		}

		$msg = JText::_('New ordering saved');
		$app->enqueueMessage($msg);
		$app->redirect( JURI::root( true ) . '/administrator/index.php?option=com_hwdvideoshare&task=videos' );
	}
   /**
	*/
	function saveOrder()
	{
		$db = & JFactory::getDBO();
		$app = & JFactory::getApplication();

		$cid		= JRequest::getVar( 'cid', array(0), 'post', 'array' );
		$order		= JRequest::getVar( 'order', array (0), 'post', 'array' );
		$total		= count($cid);
		$conditions	= array ();

		JArrayHelper::toInteger($cid, array(0));
		JArrayHelper::toInteger($order, array(0));

		// Instantiate an article table object
    	$row = new hwdvids_video($db);

		// Update the ordering for items in the cid array
		for ($i = 0; $i < $total; $i ++)
		{
			$row->load( (int) $cid[$i] );
			if ($row->ordering != $order[$i]) {
				$row->ordering = $order[$i];
				if (!$row->store()) {
					JError::raiseError( 500, $db->getErrorMsg() );
					return false;
				}
				// remember to updateOrder this group
				$condition = 'category_id = '.(int) $row->category_id.' AND published >= 0';
				$found = false;
				foreach ($conditions as $cond)
					if ($cond[1] == $condition) {
						$found = true;
						break;
					}
				if (!$found)
					$conditions[] = array ($row->id, $condition);
			}
		}

		// execute updateOrder for each group
		foreach ($conditions as $cond)
		{
			$row->load($cond[0]);
			$row->reorder($cond[1]);
		}

		$msg = JText::_('New ordering saved');
		$app->enqueueMessage($msg);
		$app->redirect( JURI::root( true ) . '/administrator/index.php?option=com_hwdvideoshare&task=videos' );
	}
   /**
	*/
	function orderFeatured($uid, $inc)
	{
		$db = & JFactory::getDBO();
		$app = & JFactory::getApplication();

		jimport( 'joomla.filesystem.file' );

		if (file_exists(JPATH_SITE.DS.'media'.DS.'hwdvsfeatured.order'))
		{
			$orderString = JFile::read(JPATH_SITE.DS.'media'.DS.'hwdvsfeatured.order');
			$featuredArray = explode(",", $orderString);
			$total = count($featuredArray);
			for ($i = 0; $i < $total; $i ++)
			{
				$featuredArray[$i] = intval($featuredArray[$i]);
			}
		}
		$flippedArray = array_flip($featuredArray);
		$key1 = $flippedArray[$uid];
		$key2 = $key1 + $inc;

		$temp=$featuredArray[$key1];
		$featuredArray[$key1]=$featuredArray[$key2];
		$featuredArray[$key2]=$temp;

		$orderString = implode(",",$featuredArray);

		JFile::write(JPATH_SITE.DS.'media'.DS.'hwdvsfeatured.order',$orderString);

		$msg = JText::_('New ordering not saved');
		$app->enqueueMessage($msg);
		$app->redirect( JURI::root( true ) . '/administrator/index.php?option=com_hwdvideoshare&task=videos' );
	}
   /**
	*/
	function saveFeaturedOrder()
	{
		jimport( 'joomla.filesystem.file' );

		$db = & JFactory::getDBO();
		$app = & JFactory::getApplication();

		$cid		= JRequest::getVar( 'cid', array(0), 'post', 'array' );
		$order		= JRequest::getVar( 'order', array (0), 'post', 'array' );
		$total		= count($cid);
		$conditions	= array ();

		JArrayHelper::toInteger($cid, array(0));
		JArrayHelper::toInteger($order, array(0));

		// Instantiate an article table object
    	$row = new hwdvids_video($db);

		// Update the ordering for items in the cid array
		for ($i = 0; $i < $total; $i ++)
		{
			$featuredOrder[$cid[$i]] = $order[$i];
		}

		asort($featuredOrder);
		$orderString=null;
		foreach ($featuredOrder as $key => $val)
		{
			$orderString.="$key,";
		}

		JFile::write(JPATH_SITE.DS.'media'.DS.'hwdvsfeatured.order',$orderString);

		$msg = JText::_('New ordering saved');
		$app->enqueueMessage($msg);
		$app->redirect( JURI::root( true ) . '/administrator/index.php?option=com_hwdvideoshare&task=videos' );
	}
	
	 /**
     * adds a new row to the bands table
     *
     * 
     * @return        $$row->id
     */
	function addSong($paramSongObject, $paramAlbumId, $paramBandId) {
		$db = & JFactory::getDBO();
		$row = new hwdvidssongs($db);
		$temppostid = $_POST['id'] ;
	    $_POST['id'] 			= null;			
		$_POST['label'] 		= $paramSongObject->oSongName;
		$_POST['provider'] 		= $paramSongObject->oProvider;
		$_POST['album_id'] 		= $paramAlbumId;
		$_POST['band_id'] 		= $paramBandId;
		$_POST['external_url'] 	= $paramSongObject->oSongUrl;
		$_POST['external_id'] 	= $paramSongObject->oSongId;
		$_POST['embedding'] 	= $paramSongObject->oEmbedUrl;
		
		if (!$row->bind($_POST)){
			echo "<script type=\"text/javascript\">alert('".$row->getError()."');window.history.go(-1);</script>\n";
			exit();
		}
		
		if (!$row->store()){
			echo "<script type=\"text/javascript\">alert('".$row->getError()."');window.history.go(-1);</script>\n";
			exit();
		}
		$_POST['id'] 		= $temppostid;
		return $row->id;
    }
    
    /**
     * checks if the band is already in the list of bands
     *
     * 
     * @return        $bandMatched
     */
	function getSongById($song_id) {
		$db = & JFactory::getDBO();
		$query = 'SELECT label FROM #__hwdvidssongs AS a'; 
		$query .= ' WHERE a.id ='.$song_id;
		$db->setQuery($query);
		$db->loadObjectList();
		$bandList = $db->loadResultArray();
		if(sizeof($bandList)>0)
			$bandMatched = $bandList[0];
				else
					$bandMatched =null;
		return $bandMatched;
    }
    
    /**
     * checks if the band is already in the list of bands
     *
     * 
     * @return        $bandMatched
     */
	function checkSong($paramSongName, $paramSongId) {
		$db = & JFactory::getDBO();
		$query = 'SELECT a.id, label FROM #__hwdvidssongs AS a'; 
		$query .= ' WHERE ( a.external_id = "'.$paramSongId.'" AND a.external_id != "" AND a.external_id != 0) OR (a.label ="'.$paramSongName.'" AND a.external_id = "0" )';
		$db->setQuery($query);
		$db->loadObjectList();
		$bandList = $db->loadResultArray();
		$bandMatched = null;
		if(sizeof($bandList)>0)
			$bandMatched = $bandList[0];
		return $bandMatched;
    }
    
    /**
     * checks if the band is already in the list of bands
     *
     * 
     * @return        $bandMatched
     */
	function checkAlbum($paramAlbumName, $paramAlbumId) {
		$db = & JFactory::getDBO();
		$query = 'SELECT a.id, label FROM #__hwdvidsalbums AS a'; 
		$query .= ' WHERE a.external_id = "'.$paramAlbumId.'" AND a.external_id != "" AND a.external_id IS NOT NULL';
		$db->setQuery($query);
		$db->loadObjectList();
		$albumList = $db->loadResultArray();
		$albumMatched = null;
		if(sizeof($albumList)>0)
			$albumMatched = $albumList[0];
		return $albumMatched;
    }
    
    /**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */
    function doLikeUnLike($paramLikeid,$paramItem_id,$paramItem_type){
			$db = & JFactory::getDBO();
			$my = & JFactory::getUser();
			$response = 0;
			$likeid        = $paramLikeid;
			$user_id       = $my->id;
			$item_id 	   = $paramItem_id;
			$item_type     = $paramItem_type;
			$date_liked    = date('Y-m-d H:i:s');
			
			if($my->id){
				
				$row = new hwdvidslikes($db);

				$_POST['item_id'] 	= $item_id;
				$_POST['user_id'] 	= $user_id;
				$_POST['item_type'] = $item_type;
				$_POST['date_liked']= $date_liked;
				
				if($likeid){
					$likeid = str_replace("likeid", "", $paramLikeid);
					if (!$row->delete(intval($likeid))){
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
			}else{
				$response = _HWDVIDS_META_LOGTOLK;
				}					
						
			return $response;		
	}
    
    /**
     * adds a new row to the bands table
     *
     * 
     * @return        $$row->id
     */
	function addBand($paramSongObject) {
		$db = & JFactory::getDBO();
		$row = new hwdvidsbands($db);
		$temppostid = $_POST['id'] ;
		$_POST['id'] 				= null;
		$_POST['label'] 			= $paramSongObject->oBandName;
		$_POST['external_url'] 		= $paramSongObject->oBandUrl;
		$_POST['external_id'] 		= $paramSongObject->oBandId;
		
		if (!$row->bind($_POST)){
			echo "<script type=\"text/javascript\">alert('".$row->getError()."');window.history.go(-1);</script>\n";
			exit();
		}

		if (!$row->store()){
			echo "<script type=\"text/javascript\">alert('".$row->getError()."');window.history.go(-1);</script>\n";
			exit();
		}
		$_POST['id'] 		= $temppostid;
		return $row->id;
    }
    
    /**
     * adds a new row to the bands table
     *
     * 
     * @return        $$row->id
     */
	function addAlbum($paramSongObject,$paramBandId) {
		$db = & JFactory::getDBO();
		$row = new hwdvidsalbums($db);
		$temppostid = $_POST['id'] ;
		$_POST['id'] 				= null;
		$_POST['label'] 			= $paramSongObject->oAlbumName;
		$_POST['external_url'] 		= $paramSongObject->oAlbumUrl;
		$_POST['external_id'] 		= $paramSongObject->oAlbumId;
		$_POST['thumbnail'] 		= $paramSongObject->oAlbumThumbnail;
		$_POST['band_id'] 			= $paramBandId;
		
		if (!$row->bind($_POST)){
			echo "<script type=\"text/javascript\">alert('".$row->getError()."');window.history.go(-1);</script>\n";
			exit();
		}

		if (!$row->store()){
			echo "<script type=\"text/javascript\">alert('".$row->getError()."');window.history.go(-1);</script>\n";
			exit();
		}
		$_POST['id'] 		= $temppostid;
		return $row->id;
    }
    
    /**
     * checks if the band is already in the list of bands
     *
     * 
     * @return        $bandMatched
     */
	function getBandById($band_id) {
		$db = & JFactory::getDBO();
		$query = 'SELECT label FROM #__hwdvidsbands AS a'; 
		$query .= ' WHERE a.id ='.$band_id;
		$db->setQuery($query);
		$db->loadObjectList();
		$bandList = $db->loadResultArray();
		if(sizeof($bandList)>0)
			$bandMatched = $bandList[0];
				else
					$bandMatched =null;
		return $bandMatched;
    }
    
    
    /**
     * checks if the band is already in the list of bands
     *
     * 
     * @return        $bandMatched
     */
	function checkBand($paramBandName,$paramBandId) {
		$db = & JFactory::getDBO();
		$query = 'SELECT a.id,label FROM #__hwdvidsbands AS a'; 
		$query .= ' WHERE (a.external_id = "'.$paramBandId.'" AND a.external_id !="" AND a.external_id !="0") OR (a.label ="'.$paramBandName.'" AND (a.external_id IS NULL OR a.external_id = "0"))';
		$db->setQuery($query);
		$db->loadObjectList();
		$bandList = $db->loadResultArray();
		$bandMatched = null;
		if(sizeof($bandList)>0)
			$bandMatched = $bandList[0];
		return $bandMatched;
    }
    
    
    
    function storeSong($paramSongChosen,$paramprovider, $paramIsSearched = 1,$paramBandChosen = ''){

		$oSongObject = new stdClass();
		$oStoringOutput = new JObject();	
		/*echo '<pre>';
		var_dump('------------------------------------');
		var_dump($paramSongChosen);
		var_dump($paramprovider);
		var_dump($paramIsSearched);
		var_dump($paramBandChosen);
		var_dump('------------------------------------');
		*/
		if($paramIsSearched == '1'){
			switch($paramprovider){
				case 'rdio':
							$oSongObject->oSongName 		= $paramSongChosen->name;
							$oSongObject->oSongId 			= $paramSongChosen->key;
							$oSongObject->oSongUrl 			= $paramSongChosen->url;
							$oSongObject->oAlbumId   		= $paramSongChosen->albumKey; 
							$oSongObject->oAlbumName 		= $paramSongChosen->album;
							$oSongObject->oAlbumUrl  		= $paramSongChosen->albumUrl;
							$oSongObject->oAlbumThumbnail  	= $paramSongChosen->icon;
							$oSongObject->oBandId    		= $paramSongChosen->artistKey;
							$oSongObject->oBandName  		= $paramSongChosen->artist;
							$oSongObject->oBandUrl  		= $paramSongChosen->artistUrl;
							$oSongObject->oProvider  		= $paramprovider;
							$oSongObject->oEmbedUrl  		= $paramSongChosen->embedUrl;
							$oStoringOutput = hwdvids_BE_videos::doStoreSong($oSongObject);
							break;
				case 'grooveshark':
							$oSongObject->oSongName 	= $paramSongChosen->SongName;
							$oSongObject->oSongId 		= $paramSongChosen->SongID;
							$oSongObject->oSongUrl 		= $paramSongChosen->Url;
							$oSongObject->oAlbumId   	= $paramSongChosen->AlbumID; 
							$oSongObject->oAlbumName 	= $paramSongChosen->AlbumName;
							$oSongObject->oBandId    	= $paramSongChosen->ArtistID;
							$oSongObject->oBandName  	= $paramSongChosen->ArtistName;
							$oSongObject->oProvider  	= $paramprovider;
							$oStoringOutput = hwdvids_BE_videos::doStoreSong($oSongObject);
							break;
				
				}
			}else{
				$oSongObject->oSongName = $paramSongChosen;
				$oSongObject->oBandName = $paramBandChosen;
				$oSongObject->oProvider = 'userinput';
				$oBandId = hwdvids_BE_videos::checkBand($paramBandChosen,null);
						if(!$oBandId){
							$oSongObject->oBandId   = 0;
							$oBandId = hwdvids_BE_videos::addBand($oSongObject);
						}
				$oSongObject->oBandId = $oBandId;		
				$song_id 				= hwdvids_BE_videos::checkSong($oSongObject->oSongName,null);
				if($oSongObject->oSongName !=''){
					if($song_id==null){
						$song_id = hwdvids_BE_videos::addSong($oSongObject,null, $oBandId);
					}			
				}
				$oSongObject->oSongId = $song_id;
				$oStoringOutput = $oSongObject;
		/*var_dump($oStoringOutput);
		var_dump('------------------------------------');
		echo '</pre>';
			exit();	*/
				}	
			return $oStoringOutput;	
		}
    function doStoreSong($paramSongObject){
		$oSongId;
		$oBandId; 
		$oAlbumId;
		
		$oBandId = hwdvids_BE_videos::checkBand($paramSongObject->oBandName,$paramSongObject->oBandId);
		if(!$oBandId)
			$oBandId = hwdvids_BE_videos::addBand($paramSongObject);
		$oAlbumId = hwdvids_BE_videos::checkAlbum($paramSongObject->oAlbumName,$paramSongObject->oAlbumId);
		if(!$oAlbumId)
			$oAlbumId = hwdvids_BE_videos::addAlbum($paramSongObject,$oBandId);	
		$oSongId = hwdvids_BE_videos::checkSong($paramSongObject->oSongName,$paramSongObject->oSongId);
		if(!$oSongId)
			$oSongId = hwdvids_BE_videos::addSong($paramSongObject,$oAlbumId,$oBandId);	
		$storeResult = new JObject();	
		$storeResult->oSongId = $oSongId;	
		$storeResult->oBandId = $oBandId;	
		$storeResult->oAlbumId = $oAlbumId;
		return $storeResult;
    }
    
    function cometLongPolling(){
		$session =& JFactory::getSession();
		define('MESSAGE_POLL_MICROSECONDS', 500000);
		define('MESSAGE_TIMEOUT_SECONDS', 90);
		define('MESSAGE_TIMEOUT_SECONDS_BUFFER', 5);
		$oldCount = $session->get('songcount',null);
		session_write_close();
		set_time_limit(MESSAGE_TIMEOUT_SECONDS+MESSAGE_TIMEOUT_SECONDS_BUFFER);
		$counter = MESSAGE_TIMEOUT_SECONDS;
		$data = null;
		while($counter > 0)
		{
			if($data = hwd_vs_tools::getNewCount($oldCount)){
				break;
			}else{
				usleep(MESSAGE_POLL_MICROSECONDS);
				$counter -= MESSAGE_POLL_MICROSECONDS / 1000000;
			}
		}
		if(isset($data)){
			return $data;
			}else
				return 0;
		
	}
	
	function getLastVideoAdded(){
		$db = & JFactory::getDBO();
		// get video count
        $db->SetQuery( 'SELECT * 
						FROM  #__hwdvidsvideos 
						WHERE 1 
						ORDER BY ID DESC 
						LIMIT 0 , 1'
					 );
        $lastvideoadded = $db->loadObjectList();
        echo $db->getErrorMsg();
        return $lastvideoadded;
		}
	
	function getTotalVideosCount(){
		$db = & JFactory::getDBO();
		// get video count
        $db->SetQuery( 'SELECT count(*)'
					 . ' FROM #__hwdvidsvideos AS video'
					 );
        $total = $db->loadResult();
        echo $db->getErrorMsg();
        return $total;
		}
	
	function getNewCount($paramOldCount){
		$oCurrentTotal = hwd_vs_tools::getTotalVideosCount();
		return hwd_vs_tools::setLastVideoCount($oCurrentTotal,$paramOldCount);
		}
		
	function setLastVideoCount($paramTotal,$paramOldCount){
		global $Itemid, $smartyvs;
		$session = & JFactory::getSession();
		if($paramOldCount == $paramTotal)
			return null;
			else{
				session_start();
				$session->set('songcount', $paramTotal);
				$oVideoDetails = hwd_vs_tools::generateVideoListFromSql(hwd_vs_tools::getLastVideoAdded(), null, '100');
				$oHtml ='';
				foreach($oVideoDetails as $video){
					$smartyvs->assign("data", $video);
					$oHtml .= $smartyvs->fetch('notifications_newvideo.tpl');
				}
				return $oHtml;
			}
		}	
		
		function doGSSongSearch($query){
		 $session = JFactory::getSession();
		  $oResults = '';
		  $app = & JFactory::getApplication();
		 // grooveshark results
		  $apikey = '6b0984927cf2c46c8d527a419b5f2347';
		  $gsJsonurl = 'http://tinysong.com/s/' . urlencode($query) . '?format=json&limit=32&key='.$apikey;
		  $gsJson = file_get_contents($gsJsonurl,0,null,null);
		  $songResults = json_decode($gsJson);
		  if(count($songResults) < 1) $app->setUserState( "hwdvs_song_source", "userinput" );	
			else {
			  $albumplaceholder = JURI::root().'templates/rhuk_milkyway/images/placeholderalbum.png';
			  $app->setUserState( "hwdvs_song_source", "grooveshark" );	
			  foreach ($songResults as $gsSong) {
				$oResults .= '<li id="songresults'.$songcounter.'" class="clearfix pad12 curpointer"><img class="fleft" width="40" src="'.$albumplaceholder.'" alt="'.$gsSong->artist.'"><div class="w84 fleft mleft12"><span class="fontblack">Song: </span><span class="songname">' . $gsSong->SongName . '</span><span> (' . $gsSong->ArtistName . ')</span><br /><span class="fontblack">Album: </span><span> ' . $gsSong->AlbumName . '</span></div></li>';
				$songcounter++; 
			  }
			  $session->set('songlist', $songResults,'songsearch'); 
			}
			
			return $oResults;  
		 }

	 function searchSong($query, $limit = 10, $format = "json") {
		  $session = JFactory::getSession();
		  $oResults = '';
		  $app = & JFactory::getApplication();
		  // rdio results 
		  $redosearch = JRequest::getInt( 'redosearch', 0 );
		if($redosearch == 1 && $app->getUserState( "hwdvs_song_source" ) !="grooveshark"){
				$oResults .= hwdvids_BE_videos::doGSSongSearch($query);
				}else{		
				  // requires signed request
				  define('CONSUMER_KEY', 'kyw3rxth3ud6n4sqjn9xw4rz');
				  define('CONSUMER_SECRET', 'TvyMHEVhP4');
				  $rdio = new hwdRdio(CONSUMER_KEY, CONSUMER_SECRET);
				  $songResults = $rdio->search(
					array(
					  "query" => $query,
					  "types" => "Track",
					  "count" => 100,
					  "never_or" => "true"))->result->results;
				 $songcounter = 0;	  
				 $rdio_base_url = 'http://www.rdio.com';
					if(count($songResults) < 1) {
						$oResults .= hwdvids_BE_videos::doGSSongSearch($query);
					}else {
					  $app->setUserState( "hwdvs_song_source", "rdio" );		
					  foreach ($songResults as $rdioSong) {
						$oResults .= '<li id="songresults'.$songcounter.'" class="clearfix pad12 curpointer"><img class="fleft" width="40" src="'.$rdioSong->icon.'" alt="'.$rdioSong->artist.'" /><div class="w84 fleft mleft12"><span class="fontblack">Song: </span><span class="songname">' . $rdioSong->name . '</span> (<span>' . $rdioSong->artist . '</span>)<br /><span class="fontblack">Album: </span><span> ' . $rdioSong->album . '</span></div></li>';
						$songcounter++; 
					  }
					  $session->set('songlist', $songResults,'songsearch'); 
					}
					
			}
          
           
           return $oResults;  	  
	 }
    
    
    /**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */
	function ajax_searchsong(){
		header('Content-type: text/html; charset=utf-8');
		$c = hwd_vs_Config::get_instance();
		$my = & JFactory::getUser();
		$term = JRequest::getVar( 'pattern', '' );
		$code = hwdvids_BE_videos::searchSong($term);
		echo $code;
		exit;
		}
	
	/**
	* edit videos
	*/
	function changeuserselect($cid)
	{
  		$db =& JFactory::getDBO();
		$my = & JFactory::getUser();

		$row = new hwdvids_video( $db );
		$row->load( $cid );



$users = array();
$users[] = JHTML::_('select.option', '0', 'Guest');
$db->setQuery( "SELECT id AS value, username AS text FROM #__users" );
$users = array_merge( $users, $db->loadObjectList() );
$selected = $row->user_id;
$uploader_list = JHTML::_('select.genericlist', $users, 'user_id', 'class="inputbox"', 'value', 'text', $selected);






echo $uploader_list;exit;

	}

   /**
	* edit videos
	*/
	function updateVideoSource()
	{
		global $option, $j16;
  		$db =& JFactory::getDBO();
		$my = & JFactory::getUser();
		$app = & JFactory::getApplication();
		$c = hwd_vs_Config::get_instance();

		$video_type	= Jrequest::getVar( 'videotype', '0' );
		$video_id	= Jrequest::getVar( 'id', '0' );
		$updatedetails	= Jrequest::getVar( 'updatedetails', '0' );

		$admin_import = true;
		require_once(JPATH_SITE.DS.'components'.DS.'com_hwdvideoshare'.DS.'models'.DS.'uploads.php');

		$row = new hwdvids_video($db);
		$row->load( $video_id );

		if ($video_type == 1)
		{
			$requestarray = JRequest::get( 'default', 2 );
			$embeddump = $requestarray['embeddump'];
			$remote_verified = null;

			$parsedurl = parse_url($embeddump);
			if (empty($parsedurl['host'])) { $parsedurl['host'] = ''; }
			preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $parsedurl['host'], $regs);
			if (empty($regs['domain'])) { $regs['domain'] = ''; }

		if ($j16)
		{
			if ($regs['domain'] == 'youtube.com' && file_exists(JPATH_SITE.DS.'plugins'.DS.'hwdvs-thirdparty'.DS.'youtube'.DS.'youtube.php'))
			{
				require_once(JPATH_SITE.DS.'plugins'.DS.'hwdvs-thirdparty'.DS.'youtube'.DS.'youtube.php');
			}
			else if ($regs['domain'] == 'google.com' && file_exists(JPATH_SITE.DS.'plugins'.DS.'hwdvs-thirdparty'.DS.'google'.DS.'google.php'))
			{
				require_once(JPATH_SITE.DS.'plugins'.DS.'hwdvs-thirdparty'.DS.'google'.DS.'google.php');
			}
			else if (file_exists(JPATH_SITE.DS.'plugins'.DS.'hwdvs-thirdparty'.DS.'thirdpartysupportpack'.DS.$regs['domain'].'.php'))
			{
				require_once(JPATH_SITE.DS.'plugins'.DS.'hwdvs-thirdparty'.DS.'thirdpartysupportpack'.DS.$regs['domain'].'.php');
			}
			else
			{
				require_once(JPATH_SITE.DS.'plugins'.DS.'hwdvs-thirdparty'.DS.'remote'.DS.'remote.php');
				$regs['domain'] = 'remote';
			}
		}
		else
		{
			if ($regs['domain'] == 'youtube.com' && file_exists(JPATH_SITE.DS.'plugins'.DS.'hwdvs-thirdparty'.DS.'youtube.php'))
			{
				require_once(JPATH_SITE.DS.'plugins'.DS.'hwdvs-thirdparty'.DS.'youtube.php');
			}
			else if ($regs['domain'] == 'google.com' && file_exists(JPATH_SITE.DS.'plugins'.DS.'hwdvs-thirdparty'.DS.'google.php'))
			{
				require_once(JPATH_SITE.DS.'plugins'.DS.'hwdvs-thirdparty'.DS.'google.php');
			}
			else if (file_exists(JPATH_SITE.DS.'plugins'.DS.'hwdvs-thirdparty'.DS.$regs['domain'].'.php'))
			{
				require_once(JPATH_SITE.DS.'plugins'.DS.'hwdvs-thirdparty'.DS.$regs['domain'].'.php');
			}
			else
			{
				require_once(JPATH_SITE.DS.'plugins'.DS.'hwdvs-thirdparty'.DS.'remote.php');
				$regs['domain'] = 'remote';
			}
		}

		$failures = "";
		if (!isset($remote_verified)) {

			$cn = 'hwd_vs_tp_'.preg_replace("/[^a-zA-Z0-9s_-]/", "", $regs['domain']);
			$f_processc = preg_replace("/[^a-zA-Z0-9s_-]/", "", $regs['domain']).'processCode';
			$f_processi = preg_replace("/[^a-zA-Z0-9s_-]/", "", $regs['domain']).'processThumbnail';
			$f_processt = preg_replace("/[^a-zA-Z0-9s_-]/", "", $regs['domain']).'processTitle';
			$f_processd = preg_replace("/[^a-zA-Z0-9s_-]/", "", $regs['domain']).'processDescription';
			$f_processk = preg_replace("/[^a-zA-Z0-9s_-]/", "", $regs['domain']).'processKeywords';
			$f_processl = preg_replace("/[^a-zA-Z0-9s_-]/", "", $regs['domain']).'processDuration';

			$tp = new $cn();

			$ext_v_code  = $tp->$f_processc($embeddump);

			//check if already exists
			$db->SetQuery( 'SELECT count(*) FROM #__hwdvidsvideos WHERE video_id = "'.$ext_v_code[1].'"' );
			$duplicatecount = $db->loadResult();

			if ($duplicatecount > 0 && $admin_import == false) {
				hwd_vs_tools::infomessage(4, 0, _HWDVIDS_TITLE_UPLDFAIL, _HWDVIDS_ALERT_DUPLICATE, "exclamation.png", 0);
				return;
			} else if ($duplicatecount > 0 && $admin_import == true) {
				return false;
			}

			$ext_v_title = $tp->$f_processt($embeddump, @$ext_v_code[1]);
			$ext_v_descr = $tp->$f_processd($embeddump, @$ext_v_code[1]);
			$ext_v_keywo = $tp->$f_processk($embeddump, @$ext_v_code[1]);
			$ext_v_durat = $tp->$f_processl($embeddump, @$ext_v_code[1]);

			if ($ext_v_code[0] == "0")
			{
				if ($j16)
				{
					require_once(JPATH_SITE.DS.'plugins'.DS.'hwdvs-thirdparty'.DS.'remote'.DS.'remote.php');
					$regs['domain'] = 'remote';
				}
				else
				{
					require_once(JPATH_SITE.DS.'plugins'.DS.'hwdvs-thirdparty'.DS.'remote.php');
					$regs['domain'] = 'remote';
				}

				$tp = new hwd_vs_tp_remote();
				$ext_v_code  = $tp->remoteProcessCode($embeddump);
				$ext_v_title = $tp->remoteProcessTitle($embeddump, @$ext_v_code[1]);
				$ext_v_descr = $tp->remoteProcessDescription($embeddump, @$ext_v_code[1]);
				$ext_v_keywo = $tp->remoteProcessKeywords($embeddump, @$ext_v_code[1]);
				$ext_v_durat = $tp->remoteProcessDuration($embeddump, @$ext_v_code[1]);

				if ($ext_v_code[0] == "0") {
					hwd_vs_tools::infomessage(4, 0, _HWDVIDS_TITLE_UPLDFAIL, _HWDVIDS_INFO_TPPROCESSFAIL, "exclamation.png", 0);
					return;
				}

				//check if already exists
				$db->SetQuery( 'SELECT count(*) FROM #__hwdvidsvideos WHERE video_id = "'.$ext_v_code[1].'"' );
				$duplicatecount = $db->loadResult();

				if ($duplicatecount > 0 && $admin_import == false) {
					hwd_vs_tools::infomessage(4, 0, _HWDVIDS_TITLE_UPLDFAIL, _HWDVIDS_ALERT_DUPLICATE, "exclamation.png", 0);
					return;
				} else if ($duplicatecount > 0 && $admin_import == true) {
					return false;
				}
			}

			if ($ext_v_title[0] == 0) {$failures.=_HWDVIDS_INFO_TPTITLEFAIL."<br />";}
			if ($ext_v_descr[0] == 0) {$failures.=_HWDVIDS_INFO_TPDESCFAIL."<br />";}
			if ($ext_v_keywo[0] == 0) {$failures.=_HWDVIDS_INFO_TPKWFAIL."<br />";}
			if ($ext_v_durat[0] == 0) {$failures.=_HWDVIDS_INFO_TPDRFAIL."<br />";}

		} else if ($remote_verified == 0) {

			$error_msg = _HWDVIDS_ERROR_UPLDERR11."<br /><br />"._HWDVIDS_INFO_SUPPTPW."<br />".hwd_vs_tools::generateSupportedWebsiteList();
			hwd_vs_tools::infomessage(4, 0, _HWDVIDS_TITLE_UPLDFAIL, $error_msg, "exclamation.png", 1);
			return;

		}

		$title 				= hwd_vs_tools::generatePostTitle($ext_v_title[1]);
		$description 		= hwd_vs_tools::generatePostDescription($ext_v_descr[1]);
		$tags 				= hwd_vs_tools::generatePostTags($ext_v_keywo[1]);
		$category_id 		= JRequest::getInt( "category_id", "0", "post" );
		$public_private 	= JRequest::getWord( "public_private", "public", "post" );
		$allow_comments 	= JRequest::getInt( "allow_comments", $c->shareoption2, "post" );
		$allow_embedding 	= JRequest::getInt( "allow_embedding", $c->shareoption3, "post" );
		$allow_ratings 		= JRequest::getInt( "allow_ratings", $c->shareoption4, "post" );

			if (empty($title)) { $title = _HWDVIDS_UNKNOWN;}
			if (empty($description)) { $description = _HWDVIDS_UNKNOWN;}
			if (empty($tags)) { $tags = _HWDVIDS_UNKNOWN;}

			$_POST['video_type'] 		= $regs['domain'];
			$_POST['video_id'] 			= $ext_v_code[1];

			if ($updatedetails == "on") {
				$_POST['title'] 			= $title;
				$_POST['description'] 		= $description;
				$_POST['tags'] 				= $tags;
			}

			// bind it to the table
			if (!$row -> bind($_POST)) {
				echo "<script> alert('"
					.$row -> getError()
					."'); window.history.go(-1); </script>\n";
				exit();
			}

			// store it in the db
			if (!$row -> store()) {
				echo "<script> alert('"
					.$row -> getError()
					."'); window.history.go(-1); </script>\n";
				exit();
			}

			$row->checkin();

		}
		else if ($video_type == 2)
		{
			$data = explode(",", $row->video_id);
			$thumbnail = @$data[1];

			$requestarray = JRequest::get( 'default', 2 );
			$videourl = $requestarray['embeddump'];

			$validated_video_url = hwd_vs_tools::validateUrl($videourl);

			if (empty($validated_video_url))
			{
				$msg = _HWDVIDS_ALERT_VURLWRONG;
				$app->enqueueMessage($msg);
				$app->redirect(JURI::root( true )."/administrator/index.php?option=com_hwdvideoshare&task=editvidsA&hidemainmenu=1&cid=".$row->id);
			}

			$new_video_id = $validated_video_url.",".$thumbnail;

			$_POST['video_type'] 		= "remote";
			$_POST['video_id'] 			= $new_video_id;
			if (empty($row->thumbnail) && !empty($thumbnail))
			{
				$_POST['thumbnail'] 	= $thumbnail;
			}

			// bind it to the table
			if (!$row->bind($_POST))
			{
				echo "<script type=\"text/javascript\">alert('".$row->getError()."');window.history.go(-1);</script>\n";
				exit();
			}

			// store it in the db
			if (!$row->store())
			{
				echo "<script type=\"text/javascript\">alert('".$row->getError()."');window.history.go(-1);</script>\n";
				exit();
			}
			$row->checkin();
		}
		else if ($video_type == 3)
		{
			$data = explode(",", $row->video_id);
			$thumbnail = @$data[1];

			$requestarray = JRequest::get( 'default', 2 );
			$rtmpurl = $requestarray['embeddump'];
			$validated_rtmpurl = hwd_vs_tools::validateUrl($rtmpurl);

			if (empty($validated_rtmpurl))
			{
				$msg = _HWDVIDS_ALERT_VURLWRONG;
				$app->enqueueMessage($msg);
				$app->redirect(JURI::root( true )."/administrator/index.php?option=com_hwdvideoshare&task=editvidsA&hidemainmenu=1&cid=".$row->id);
			}

			$new_video_id = $validated_rtmpurl;

			$_POST['video_type'] 		= "rtmp";
			$_POST['video_id'] 			= $new_video_id;
			if (empty($row->thumbnail) && !empty($thumbnail))
			{
				$_POST['thumbnail'] 	= $thumbnail;
			}

			// bind it to the table
			if (!$row->bind($_POST))
			{
				echo "<script type=\"text/javascript\">alert('".$row->getError()."');window.history.go(-1);</script>\n";
				exit();
			}

			// store it in the db
			if (!$row->store())
			{
				echo "<script type=\"text/javascript\">alert('".$row->getError()."');window.history.go(-1);</script>\n";
				exit();
			}
			$row->checkin();
		}

		require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'libraries'.DS.'maintenance_recount.class.php');
		hwd_vs_recount::recountVideosInCategory($row->category_id);

		$app->enqueueMessage(_HWDVIDS_ALERT_VIDSAVED);
		$app->redirect( JURI::root( true ) . '/administrator/index.php?option=com_hwdvideoshare&task=editvidsA&hidemainmenu=1&cid='.$row->id );
	}

   /**
	* Convert seconds to HOURS:MINUTES:SECONDS format
	**/
	function sec2hms ($sec, $padHours = false)
	{

    // holds formatted string
    $hms = "";

    // there are 3600 seconds in an hour, so if we
    // divide total seconds by 3600 and throw away
    // the remainder, we've got the number of hours
    $hours = intval(intval($sec) / 3600);

    // add to $hms, with a leading 0 if asked for
    $hms .= ($padHours)
          ? str_pad($hours, 2, "0", STR_PAD_LEFT). ':'
          : $hours. ':';

    // dividing the total seconds by 60 will give us
    // the number of minutes, but we're interested in
    // minutes past the hour: to get that, we need to
    // divide by 60 again and keep the remainder
    $minutes = intval(($sec / 60) % 60);

    // then add to $hms (with a leading 0 if needed)
    $hms .= str_pad($minutes, 2, "0", STR_PAD_LEFT). ':';

    // seconds are simple - just divide the total
    // seconds by 60 and keep the remainder
    $seconds = intval($sec % 60);

    // add to $hms, again with a leading 0 if needed
    $hms .= str_pad($seconds, 2, "0", STR_PAD_LEFT);

    // done!
    return $hms;
	}

	function createThumbs( $pathToImages, $pathToThumbs, $thumbWidth )
	{
		  // echo "Creating thumbnail for $pathToImages <br />";

		  // load image and get image size
		  $img = imagecreatefromjpeg( $pathToImages );
		  $width = imagesx( $img );
		  $height = imagesy( $img );

		  // calculate thumbnail size
		  $new_width = $thumbWidth;
		  $new_height = floor( $height * ( $thumbWidth / $width ) );

		  // create a new temporary image
		  $tmp_img = imagecreatetruecolor( $new_width, $new_height );

		  // copy and resize old image into new image
		  imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

		  // save thumbnail into a file
		  imagejpeg( $tmp_img, $pathToThumbs );


	}
}
?>
