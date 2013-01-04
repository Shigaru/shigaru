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
							. "\nWHERE videoid = $cid"
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
                $c = hwd_vs_Config::get_instance();
                
		$db = & JFactory::getDBO();
		
		
		$band;$band_id;$song;$song_id;
		if($category_id!=3){
			//band and songs stuff
			$band = Jrequest::getVar( 'originalband', '' );
			$band_id = hwd_vs_tools::checkBand($band);
			$song = Jrequest::getVar( 'songtitle', '' );
			$song_id = hwd_vs_tools::checkSong($song);
			if($song !=''){
				if($band_id==null && $band !=''){
						$band_id = hwd_vs_tools::addBand($band);
						$song_id = hwd_vs_tools::addSong($song,$band_id);
					}else{
							if($song_id==null){
								$song_id = hwd_vs_tools::addSong($song,$band_id);
							}
						}
			}		
			
		}
		$_POST['song_id'] 			= $song_id;
		$_POST['band_id'] 			= $band_id;
		
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
