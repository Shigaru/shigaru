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
class hwd_vs_standard
{
    /**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */
    function rate()
	{
	global $database, $my, $acl, $mosConfig_absolute_path, $mosConfig_mailfrom, $mosConfig_fromname, $mosConfig_live_site, $Itemid, $mosConfig_sitename;

		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$ip = $_SERVER['REMOTE_ADDR'];

		$rating = JRequest::getInt( 'rating', 0, 'request' );
		$videoid = JRequest::getInt( 'videoid', 0, 'request' );

		if ($my->id == "0" || !$my->id || empty($my->id)) {
			$where = ' WHERE a.ip = "'.$ip.'"';
		} else {
			$where = ' WHERE a.userid = '.$my->id;
		}
		$where .= ' AND a.videoid = '.$videoid;

		if ($rating > 5) die(_HWDVIDS_ALERT_INVALVOTE); // kill the script because normal users will never see this.
		if ($rating < 0) die(_HWDVIDS_ALERT_INVALVOTE); // kill the script because normal users will never see this.

		//Current Video Details
		$query = 'SELECT *'
				. ' FROM #__hwdvidsvideos'
				. ' WHERE id = '.$videoid
				;
		$db->SetQuery( $query );
    	$row = $db->loadObject();

		if ($row->rating_number_votes < 1) {
			$count = 0;
		} else {
			$count = $row->rating_number_votes; //how many votes total
		}
		$tense = ($count==1) ? _HWDVIDS_INFO_M_VOTE : _HWDVIDS_INFO_M_VOTES; //plural form votes/vote

		$rating0 = @number_format($row->rating_total_points/$count,0);
		$rating1 = @number_format($row->rating_total_points/$count,1);

		// check if user has voted already
		$db->SetQuery( 'SELECT count(*)'
					. ' FROM #__hwdvidsrating AS a'
					. $where
					);
		$total = $db->loadResult();

		// Stop if user not logged in and guest rating blocked
		if ($c->allowgr == 0 && (!$my->id || $my->id == 0)) {

			hwd_vs_tools::infomessage(1, 0, _HWDVIDS_AJAX_LOG2RATE, _HWDVIDS_ALERT_LOG2RATE, "exclamation.png", 1);

		} else if ( $total>0 ) {

			hwd_vs_tools::infomessage(1, 0, _HWDVIDS_AJAX_ALREADYRATE, _HWDVIDS_AJAX_ALREADYRATE, "exclamation.png", 1);

		} else {

			//update rating details
			$rating_number_votes = $row->rating_number_votes + 1;
			$rating_total_points = $row->rating_total_points + $rating;
			$new_rating = $rating_total_points / $rating_number_votes;

			$db->setQuery( "UPDATE #__hwdvidsvideos"
					 . "\nSET rating_number_votes = $rating_number_votes, rating_total_points = $rating_total_points, updated_rating = $new_rating"
				   . "\nWHERE id = $videoid"
				   );

			if (!$db->query()) {
				echo "<script> alert('".$db->getErrorMsg()."'); window.history.go(-1); </script>\n";
				exit();
			}

			// mark video as rated by this user
			$row = new hwdvids_rating($db);

			$_POST['userid'] = $my->id;
			$_POST['videoid'] = $videoid;
			$_POST['ip'] = $ip;
			$_POST['date'] = date('Y-m-d H:i:s');

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

			$api_AUP = JPATH_SITE.DS.'components'.DS.'com_alphauserpoints'.DS.'helper.php';
			if ( file_exists($api_AUP))
			{
				require_once ($api_AUP);
				AlphaUserPointsHelper::newpoints( 'plgaup_rateVideo_hwdvs' );
			}

			//connecting to the database to get some information
			$numbers['total_votes'] = $rating_number_votes;
			$numbers['total_value'] = $rating_total_points;

			$count = $numbers['total_votes']; //how many votes total
			$current_rating = $numbers['total_value']; //total number of rating added together and stored
			$sum = $rating+$current_rating; // add together the current vote value and the total vote value

			hwd_vs_tools::infomessage(1, 0, _HWDVIDS_AJAX_RATEADDED, _HWDVIDS_AJAX_RATEADDED, "exclamation.png", 1);

		}

		hwd_vs_tools::logRating( $videoid, $rating );
		return;

	}
    /**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */
    function addFavourite()
	{
	global $database, $my, $acl, $mosConfig_absolute_path, $mosConfig_mailfrom, $mosConfig_fromname, $mosConfig_live_site, $Itemid, $mosConfig_sitename;
	$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();

		if (!$my->id) {
			hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_UPLDFAIL, _HWDVIDS_ALERT_LOG2ADDF, "exclamation.png", 1);
			return;
		}

		$userid = $my->id;
		$videoid = JRequest::getInt( 'videoid', 0, 'request' );

		$where = ' WHERE a.userid = '.$userid;
		$where .= ' AND a.videoid = '.$videoid;

		$db->SetQuery( 'SELECT count(*)'
							. ' FROM #__hwdvidsfavorites AS a'
							. $where
							);
  		$total = $db->loadResult();

		if ( $total>0 ) {
			hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_UPLDFAIL, _HWDVIDS_ALERT_ALREADYFAV, "exclamation.png", 1);
			return;
		}

		$row = new hwdvids_favs($db);

		$_POST['userid'] = $userid;
		$_POST['videoid'] = $videoid;

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

		$api_AUP = JPATH_SITE.DS.'components'.DS.'com_alphauserpoints'.DS.'helper.php';
		if ( file_exists($api_AUP))
		{
			require_once ($api_AUP);
			AlphaUserPointsHelper::newpoints( 'plgaup_addVideoFavourite_hwdvs' );
		}

		hwd_vs_tools::logFavour( $videoid, 1 );
		hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_UPLDFAIL, _HWDVIDS_ALERT_FAVADDED, "exclamation.png", 1);
		return;
	}
    /**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */
    function removeFavourite()
	{
	global $database, $my, $acl, $mosConfig_absolute_path, $mosConfig_mailfrom, $mosConfig_fromname, $mosConfig_live_site, $Itemid, $mosConfig_sitename;
	$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();

		if (!$my->id) {
			hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_UPLDFAIL, _HWDVIDS_ALERT_LOG2REMF, "exclamation.png", 1);
			return;
		}

		$userid = $my->id;
		$videoid = JRequest::getInt( 'videoid', 0, 'request' );

		$where = ' WHERE userid = '.$userid;
		$where .= ' AND videoid = '.$videoid;

		$db->SetQuery( 'DELETE FROM #__hwdvidsfavorites'
							. $where
						    );

		if ( !$db->query() ) {
			echo "<script> alert('".$db->getErrorMsg()."'); window.history.go(-1); </script>\n";
			exit();
		}

		$api_AUP = JPATH_SITE.DS.'components'.DS.'com_alphauserpoints'.DS.'helper.php';
		if ( file_exists($api_AUP))
		{
			require_once ($api_AUP);
			AlphaUserPointsHelper::newpoints( 'plgaup_removeVideoFavourite_hwdvs' );
		}

		hwd_vs_tools::logFavour( $videoid, -1 );
		hwd_vs_tools::infomessage(4, 0, _HWDVIDS_TITLE_UPLDFAIL, _HWDVIDS_ALERT_FAVREM, "exclamation.png", 1);
		return;
	}
    /**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */
    function reportVideo()
	{
	global $database, $my, $acl, $mosConfig_absolute_path, $mosConfig_mailfrom, $mosConfig_fromname, $mosConfig_live_site, $Itemid, $mosConfig_sitename;
	$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();

		if (!$my->id) {
			hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_UPLDFAIL, _HWDVIDS_ALERT_LOG2FLAG, "exclamation.png", 1);
			return;
		}

		$userid = $my->id;
		$videoid = JRequest::getInt( 'videoid', 0, 'request' );

		$where = ' WHERE a.videoid = '.$videoid;

		$db->SetQuery( 'SELECT count(*)'
							. ' FROM #__hwdvidsflagged_videos AS a'
							. $where
							);
  		$total = $db->loadResult();

		if ( $total>0 ) {
			hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_UPLDFAIL, _HWDVIDS_ALERT_ALREADYFLAG, "exclamation.png", 1);
			return;
		}

		$row = new hwdvids_flagvid($db);

		$_POST['userid'] = $userid;
		$_POST['videoid'] = $videoid;
		$_POST['status'] = "UNREAD";
		$_POST['date'] = date('Y-m-d H:i:s');

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

		// mail admin notification
		if ($c->mailreportnotification == 1) {
			$jconfig = new jconfig();

			$mailbody = ""._HWDVIDS_MAIL_BODY9.$jconfig->sitename.".\n";
			$mailbody .= ""._HWDVIDS_MAIL_BODY10."\n";
			if (isset($videoid)) {
				$mailbody .= "".JURI::root()."index.php?option=com_hwdvideoshare&Itemid=".$Itemid."&task=viewvideo&video_id=".$videoid."\n\n";
			}
			$mailbody .= ""._HWDVIDS_MAIL_BODY11."\n";
			$mailbody .= JURI::root()."administrator";

			JUtility::sendMail( $jconfig->mailfrom, $jconfig->fromname, $c->mailnotifyaddress, _HWDVIDS_MAIL_SUBJECT4.$jconfig->sitename.' ', $mailbody );
		}

		hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_UPLDFAIL, _HWDVIDS_ALERT_SUCFLAGGED, "exclamation.png", 1);
		return;
	}
    /**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */
    function reportGroup()
	{
	global $my, $acl, $mosConfig_absolute_path, $mosConfig_mailfrom, $mosConfig_fromname, $mosConfig_live_site, $Itemid, $mosConfig_sitename;
	$c = hwd_vs_Config::get_instance();
	$db = & JFactory::getDBO();
	$my = & JFactory::getUser();
$app = & JFactory::getApplication();

		$url = Jrequest::getVar( 'url', '' );

		if (!$my->id) {
			$msg = _HWDVIDS_ALERT_LOG2FLAG;
			$app->enqueueMessage($msg);
			$app->redirect( $url );
		}

		$userid = $my->id;
		$groupid = JRequest::getInt( 'groupid', 0 );

		$where = ' WHERE a.groupid = '.$groupid;

		$db->SetQuery( 'SELECT count(*)'
							. ' FROM #__hwdvidsflagged_groups AS a'
							. $where
							);
  		$total = $db->loadResult();

		if ( $total>0 ) {
			$msg = _HWDVIDS_ALERT_ALREADYFLAG;
			$app->enqueueMessage($msg);
			$app->redirect( $url );
		}

		$row = new hwdvids_flaggroup($db);

		$_POST['userid'] = $userid;
		$_POST['groupid'] = $groupid;
		$_POST['status'] = "UNREAD";
		$_POST['date'] = date('Y-m-d H:i:s');

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

		// mail admin notification
		if ($c->mailreportnotification == 1) {
			$jconfig = new jconfig();

			$mailbody = ""._HWDVIDS_MAIL_BODY9.$jconfig->sitename.".\n";
			$mailbody .= ""._HWDVIDS_MAIL_BODY12."\n";
			if (isset($groupid)) {
				$mailbody .= "".JURI::root()."index.php?option=com_hwdvideoshare&Itemid=".$Itemid."&task=viewgroup&group_id=".$groupid."\n\n";
			}
			$mailbody .= ""._HWDVIDS_MAIL_BODY11."\n";
			$mailbody .= JURI::root()."administrator";

			JUtility::sendMail( $jconfig->mailfrom, $jconfig->fromname, $c->mailnotifyaddress, _HWDVIDS_MAIL_SUBJECT4.$jconfig->sitename.' ', $mailbody );
		}

		$msg = _HWDVIDS_ALERT_SUCFLAGGED;
		$app->enqueueMessage($msg);
		$app->redirect( $url );
	}
    /**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */
    function addVideoToGroup()
	{
	global $database, $my, $acl, $mosConfig_absolute_path, $mosConfig_mailfrom, $mosConfig_fromname, $mosConfig_live_site, $Itemid, $mosConfig_sitename;
		$db = & JFactory::getDBO();
		$c = hwd_vs_Config::get_instance();
		$url = Jrequest::getVar( 'url', '' );

		if (!$my->id) {
			hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_UPLDFAIL, _HWDVIDS_ALERT_LOG2AV2G, "exclamation.png", 1);
			return;
		}

		$userid = $my->id;
		$videoid = JRequest::getInt( 'videoid', '0' );
		$groupid = JRequest::getInt( 'groupid', '0' );

		$date = date('Y-m-d H:i:s');
		$published = 1;

		if ($groupid == 0) {
			hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_UPLDFAIL, _HWDVIDS_ALERTSELGROUP, "exclamation.png", 1);
			return;
		}

		$where = ' WHERE a.videoid = '.$videoid;
		$where .= ' AND a.groupid = '.$groupid;

		$db->SetQuery( 'SELECT count(*)'
							. ' FROM #__hwdvidsgroup_videos AS a'
							. $where
							);
  		$total = $db->loadResult();

		if ( $total>0 ) {
			hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_UPLDFAIL, _HWDVIDS_ALERT_ALREADYAV2G, "exclamation.png", 1);
			return;
		}

		$row = new hwdvids_groupvideo($db);

		$_POST['videoid'] = $videoid;
		$_POST['groupid'] = $groupid;
		$_POST['memberid'] = $userid;
		$_POST['date'] = $date;

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

		// perform maintenance
		require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'libraries'.DS.'maintenance_recount.class.php');
		hwd_vs_recount::recountVideosInGroup($groupid);

		hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_UPLDFAIL, _HWDVIDS_ALERT_SUCAV2G, "exclamation.png", 1);
		return;
	}

	function searchbyoption()	{
		
		$searchoption 	= JRequest::getVar( 'searchoption', '');
		$item_id 		= JRequest::getInt( 'item_id', 0 );
		
		switch($searchoption){
			case 'bsongssource':
					$song = hwd_vs_tools::getSongInfo($item_id);
					hwd_vs_html::songpage($song);
					break;
			case 'cbandsssource':
					$band = hwd_vs_tools::getBandInfo($item_id);
					hwd_vs_html::bandpage($band);
					break;
			case 'dalbumssource':
					$album = hwd_vs_tools::getAlbumInfo($item_id);
					hwd_vs_html::albumpage($album);
					break;				
			case 'avideossource':
					$row = hwd_vs_tools::getVideoInfo($item_id);
					hwd_vs_html::viewVideo($row);
					break;				
			}
		
		}
	
	function atozcounts()	{
		$db = & JFactory::getDBO();
		$query ='select count(*) FROM #__hwdvidssongs as song,#__hwdvidsvideos AS video, #__hwdvidsalbums as album 
								WHERE song.id = video.song_id AND TRIM( song.label ) !=  \'\' AND song.album_id != 0 AND song.band_id !=0 
								AND song.album_id = album.id AND video.published = 1 GROUP BY song.label';
		$db->setQuery($query);
         echo $db->getErrorMsg();
         $totalsongs = count($db->loadResultArray());
         $query ='select count(*) FROM #__hwdvidsbands as band,#__hwdvidsvideos AS video, #__hwdvidsalbums as album 
								WHERE band.id = video.band_id AND TRIM( band.label ) !=  \'\' AND album.band_id = band.id 
								AND video.published = 1 GROUP BY band.label';
		 $db->setQuery($query);
         echo $db->getErrorMsg();
         $totalbands = count($db->loadResultArray());
		return array ($totalbands,$totalsongs);
		}
	/**
     * Call to html component to render A to Z  page
     *
     * @return       Nothing
     */
	function atoz()	{
		$counts = hwd_vs_standard::atozcounts();
		hwd_vs_html::atoz($counts);
		return;
		}
		
	/**
     * Call to html component to render A to Z  page
     *
     * @return       Nothing
     */
	function atozbands()	{
		$counts = hwd_vs_standard::atozcounts();
		hwd_vs_html::atozbands($counts);
		return;
		}


    /**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */
    function viewNextVideo()
	{
		global $Itemid;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$app = & JFactory::getApplication();

		$video_id = JRequest::getInt( 'video_id', 0 );
		$category_id = JRequest::getInt( 'category_id', 0 );

		//Video Details
		$query = 'SELECT *'
				. ' FROM #__hwdvidsvideos' 
				. ' WHERE id = '.$video_id
				;
		$db->SetQuery( $query );
    	$current = $db->loadObject();

		if (!$current->date_uploaded) {
			$msg = _HWDVIDS_PGTPV;
			$app->enqueueMessage($msg);
			$app->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&task=viewvideo&Itemid='.$Itemid.'&video_id='.$video_id );
		}

        // sql search filters
        $where = ' WHERE category_id = '.$category_id;
        $where.= ' AND date_uploaded < "'.$current->date_uploaded.'"';
        $where.= ' AND published = 1';
        $where.= ' AND approved = "yes"';
        if (!$my->id) {
        $where.= ' AND public_private = "public"';
        }

		//Video Details
		$query = 'SELECT *'
				. ' FROM #__hwdvidsvideos'
				. $where
				. ' ORDER BY date_uploaded DESC'
				. ' LIMIT 0, 1';
				;
		$db->SetQuery( $query );
    	$row = $db->loadObject();
		echo $db->getErrorMsg();

		if (!$row->id) {
			$msg = _HWDVIDS_YHRTE;
			$app->enqueueMessage($msg);
			$app->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&task=viewvideo&Itemid='.$Itemid.'&video_id='.$video_id );
		}

		$app->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&task=viewvideo&Itemid='.$Itemid.'&video_id='.$row->id );

		return;
	}

    /**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */
    function viewPrevVideo()
	{
		global $Itemid;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$app = & JFactory::getApplication();

		$video_id = JRequest::getInt( 'video_id', 0 );
		$category_id = JRequest::getInt( 'category_id', 0 );

		//Video Details
		$query = 'SELECT *'
				. ' FROM #__hwdvidsvideos'
				. ' WHERE id = '.$video_id
				;
		$db->SetQuery( $query );
    	$current = $db->loadObject();

		if (!$current->date_uploaded) {
			$msg = _HWDVIDS_PGTNV;
			$app->enqueueMessage($msg);
			$app->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&task=viewvideo&Itemid='.$Itemid.'&video_id='.$video_id );
		}

        // sql search filters
        $where = ' WHERE category_id = '.$category_id;
        $where.= ' AND date_uploaded > "'.$current->date_uploaded.'"';
        $where.= ' AND published = 1';
        $where.= ' AND approved = "yes"';
        if (!$my->id) {
        $where.= ' AND public_private = "public"';
        }

		//Video Details
		$query = 'SELECT *'
				. ' FROM #__hwdvidsvideos'
				. $where
				. ' ORDER BY date_uploaded ASC'
				. ' LIMIT 0, 1';
				;
		$db->SetQuery( $query );
    	$row = $db->loadObject();
		echo $db->getErrorMsg();

		if (!$row->id) {
			$msg = _HWDVIDS_YHRTS;
			$app->enqueueMessage($msg);
			$app->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&task=viewvideo&Itemid='.$Itemid.'&video_id='.$video_id );
		}

		$app->redirect( JURI::root( true ) . '/index.php?option=com_hwdvideoshare&task=viewvideo&Itemid='.$Itemid.'&video_id='.$row->id );

		return;
	}



}
?>
