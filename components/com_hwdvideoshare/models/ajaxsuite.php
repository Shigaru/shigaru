<?php
/**
 *    @version [ Masterton ]
 *    @package hwdVideoShare
 *    @copyright (C) 2007 - 2009 Highwood Design
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
class hwd_vs_ajax
{
    /**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */
    function rate()
	{
		header('Content-type: text/html; charset=utf-8');

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

		$code='<div id="hwdvsrb"><ul id="1001" class="rating rated'.$rating0.'star">
			  <li id="1" class="rate one"><a href="'.JURI::root( true ).'/index.php?option=com_hwdvideoshare&task=rate&videoid='.$row->id.'&rating=1" onclick="ajaxFunctionRate(1);return false;" title="1 Star">1</a></li>
			  <li id="2" class="rate two"><a href="'.JURI::root( true ).'/index.php?option=com_hwdvideoshare&task=rate&videoid='.$row->id.'&rating=2" onclick="ajaxFunctionRate(2);return false;" title="2 Stars">2</a></li>
			  <li id="3" class="rate three"><a href="'.JURI::root( true ).'/index.php?option=com_hwdvideoshare&task=rate&videoid='.$row->id.'&rating=3" onclick="ajaxFunctionRate(3);return false;" title="3 Stars">3</a></li>
			  <li id="4" class="rate four"><a href="'.JURI::root( true ).'/index.php?option=com_hwdvideoshare&task=rate&videoid='.$row->id.'&rating=4" onclick="ajaxFunctionRate(4);return false;" title="4 Stars">4</a></li>
			  <li id="5" class="rate five"><a href="'.JURI::root( true ).'/index.php?option=com_hwdvideoshare&task=rate&videoid='.$row->id.'&rating=5" onclick="ajaxFunctionRate(5);return false;" title="5 Stars">5</a></li>
		</ul>';

		// Stop if user not logged in and guest rating blocked
		if ($c->allowgr == 0 && (!$my->id || $my->id == 0)) {

			$code.=_HWDVIDS_INFO_RATED.'<strong> '.$rating1.'</strong> ('.$count.' '.$tense.')';
			$code.='<br /><p><span class="error">'._HWDVIDS_AJAX_LOG2RATE.'</span></p>';

		} else if ( $total>0 ) {

			$code.=_HWDVIDS_INFO_RATED.'<strong> '.$rating1.'</strong> ('.$count.' '.$tense.')';
			$code.='<br /><p><span class="error">'._HWDVIDS_AJAX_ALREADYRATE.'</span></p>';

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

			$code='<div id="hwdvsrb"><ul id="1001" class="rating rated'.@number_format($new_rating,0).'star">
			  <li id="1" class="rate one"><a href="'.JURI::root( true ).'/index.php?option=com_hwdvideoshare&task=rate&videoid='.$row->id.'&rating=1" onclick="ajaxFunctionRate(1);return false;" title="1 Star">1</a></li>
			  <li id="2" class="rate two"><a href="'.JURI::root( true ).'/index.php?option=com_hwdvideoshare&task=rate&videoid='.$row->id.'&rating=2" onclick="ajaxFunctionRate(2);return false;" title="2 Stars">2</a></li>
			  <li id="3" class="rate three"><a href="'.JURI::root( true ).'/index.php?option=com_hwdvideoshare&task=rate&videoid='.$row->id.'&rating=3" onclick="ajaxFunctionRate(3);return false;" title="3 Stars">3</a></li>
			  <li id="4" class="rate four"><a href="'.JURI::root( true ).'/index.php?option=com_hwdvideoshare&task=rate&videoid='.$row->id.'&rating=4" onclick="ajaxFunctionRate(4);return false;" title="4 Stars">4</a></li>
			  <li id="5" class="rate five"><a href="'.JURI::root( true ).'/index.php?option=com_hwdvideoshare&task=rate&videoid='.$row->id.'&rating=5" onclick="ajaxFunctionRate(5);return false;" title="5 Stars">5</a></li>
			</ul>';
			$code.=_HWDVIDS_INFO_RATED.'<strong> '.@number_format($new_rating,1).'</strong> ('.$count.' '.$tense.')';
			$code.='<br /><p><span class="success">'._HWDVIDS_ALERT_THANKSVOTER.'</span></p>';

		}

		$code.= '<script>
			$$(\'.rate\').each(function(element,i){
				element.addEvent(\'click\', function(){
					var myStyles = [\'0star\', \'1star\', \'2star\', \'3star\', \'4star\', \'5star\'];
					myStyles.each(function(myStyle){
						if(element.getParent().hasClass(myStyle)){
							element.getParent().removeClass(myStyle)
						}
					});
					myStyles.each(function(myStyle, index){
						if(index == element.id){
							element.getParent().toggleClass(myStyle);
							ajaxFunctionRate(element.id)
						}
					});

				});
			});
			</script>
			</div>';

		echo $code;
		hwd_vs_tools::logRating( $videoid, $rating );

		exit;
	}
    /**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */

    function addToFavourites()
	{
		header('Content-type: text/html; charset=utf-8');

		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();

		if (!$my->id) {
			echo _HWDVIDS_AJAX_LOG2FAV1;
			exit;
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
			echo _HWDVIDS_AJAX_ALREADYFAV;
			exit;
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
		echo _HWDVIDS_AJAX_ADDEDFAV;
		exit;
	}
    /**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */

    function removeFromFavourites()
	{
		header('Content-type: text/html; charset=utf-8');

		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();

		if (!$my->id) {
			echo _HWDVIDS_AJAX_LOG2FAV2;
			exit;
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
		echo _HWDVIDS_AJAX_REMFAV;
		exit;
	}
    /**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */

    function reportVideo()
	{
		header('Content-type: text/html; charset=utf-8');

		global $Itemid;
		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();

		if (!$my->id) {
			echo _HWDVIDS_AJAX_LOG2REPORT;
			exit;
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
			echo _HWDVIDS_AJAX_ALREADYREPORT;
			exit;
		}

		$row = new hwdvids_flagvid($db);

		$_POST['userid'] = $userid;
		$_POST['videoid'] = $videoid;
		$_POST['status'] = _HWDVIDS_UNREAD;
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

		echo _HWDVIDS_AJAX_VIDREPORT;
		exit;
	}
    /**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */

    function addVideoToGroup()
	{
		header('Content-type: text/html; charset=utf-8');

		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();

		if (!$my->id) {
			echo _HWDVIDS_AJAX_LOG2ADD2G;
			exit;
		}

		$user_id = $my->id;
		$videoid = JRequest::getInt( 'videoid', 0, 'request' );
		$groupid = JRequest::getInt( 'groupid', 0, 'request' );
		$date = date('Y-m-d H:i:s');
		$published = 1;

		if ($groupid == 0) {
			echo _HWDVIDS_ALERTSELGROUP;
			exit;
		}

		$where = ' WHERE a.videoid = '.$videoid;
		$where .= ' AND a.groupid = '.$groupid;

		$db->SetQuery( 'SELECT count(*)'
               		. ' FROM #__hwdvidsgroup_videos AS a'
               		. $where
               		);
  		$total = $db->loadResult();

		if ( $total>0 ) {
			echo _HWDVIDS_ALERT_ALREADYAV2G;
			exit;
		}

		$row = new hwdvids_groupvideo($db);

		$_POST['videoid'] = JRequest::getInt( 'videoid', 0, 'request' );
		$_POST['groupid'] = JRequest::getInt( 'groupid', 0, 'request' );
		$_POST['memberid'] = JRequest::getInt( 'userid', 0, 'request' );;
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

		echo _HWDVIDS_ALERT_SUCAV2G;
		exit;
	}
    /**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */
    function grabAjaxPlayer()
	{
		global $Itemid, $smartyvs, $hwdvs_selectv, $hwdvs_joinv;

		header('Content-type: text/html; charset=utf-8');
		print "<html><body style=\"margin:0;padding:0;overflow:hidden;\">";

		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$acl= & JFactory::getACL();
		$usersConfig = &JComponentHelper::getParams( 'com_users' );

		$video_id = JRequest::getInt( 'video_id', 0 );
		$template = JRequest::getVar( 'template', '' );
		$showdetails = JRequest::getInt( 'showdetails', '1' );
		$width = JRequest::getInt( 'width', null );
		$height = JRequest::getInt( 'height', null );
		$quality = JRequest::getWord( 'quality', 'hq' );

		// check component access settings and deny those without privileges
		if ($c->access_method == 0) {
			if (!hwd_vs_access::allowAccess( $c->gtree_plyr, $c->gtree_plyr_child, hwd_vs_access::userGID( $my->id ))) {
				if ( ($my->id < 1) && (!$usersConfig->get( 'allowUserRegistration' ) == '0' && hwd_vs_access::allowAccess( $c->gtree_upld, 'RECURSE', $acl->get_group_id('Registered','ARO') ) ) ) {
					hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_NOACCESS, _HWDVIDS_ALERT_REGISTERFORPLYR, "exclamation.png", 0, 0);
					exit;
				} else {
					hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_NOACCESS, _HWDVIDS_ALERT_PLYR_NOT_AUTHORIZED, "exclamation.png", 0, 0);
					exit;
				}
			}
		} else if ($c->access_method == 1) {
			if (!hwd_vs_access::allowLevelAccess( $c->accesslevel_upld, hwd_vs_access::userGID( $my->id ))) {
				hwd_vs_tools::infomessage(1, 0,  _HWDVIDS_TITLE_NOACCESS, _HWDVIDS_ALERT_PLYR_NOT_AUTHORIZED, "exclamation.png", 0, 0);
				exit;
			}
		}

        // check video can be viewed by user
        $where = ' WHERE video.published = 1';
        $where .= ' AND video.id = '.$video_id;
        $where .= ' AND video.approved = "yes"';
        if (!$my->id) {
        $where .= ' AND video.public_private = "public"';
        }

        $hwdvs_selectv_extended = $hwdvs_selectv.', access.access_v, access.access_v_r, access.access_lev_v';

        $query = 'SELECT'.$hwdvs_selectv_extended
                . ' FROM #__hwdvidsvideos AS video'
                . $hwdvs_joinv
			    . ' LEFT JOIN #__hwdvidscategories AS `access` ON access.id = video.category_id'
                . $where
                . ' ORDER BY video.date_uploaded DESC'
                ;
        $db->SetQuery($query);
        $row = $db->loadObject();

		// check component access settings and deny those without privileges
		if ($c->bviic == 1 && $row->category_id !== "0") {
			if ($c->access_method == 0) {
				if (!hwd_vs_access::allowAccess( $row->access_v, $row->access_v_r, hwd_vs_access::userGID( $my->id ))) {
					if ( ($my->id < 1) && (!$usersConfig->get( 'allowUserRegistration' ) == '0' && hwd_vs_access::allowAccess( $c->gtree_upld, 'RECURSE', $acl->get_group_id('Registered','ARO') ) ) ) {
						hwd_vs_tools::infomessage(2, 0, _HWDVIDS_TITLE_NOACCESS, _HWDVIDS_ALERT_REGISTERFORVCAT, "exclamation.png", 0, 0);
						exit;
					} else {
						hwd_vs_tools::infomessage(2, 0, _HWDVIDS_TITLE_NOACCESS, _HWDVIDS_ALERT_VCAT_NOT_AUTHORIZED, "exclamation.png", 0, 0);
						exit;
					}
				}
			} else if ($c->access_method == 1) {
				if (!hwd_vs_access::allowLevelAccess( $row->access_lev_v, hwd_vs_access::userGID( $my->id ))) {
					hwd_vs_tools::infomessage(2, 0,  _HWDVIDS_TITLE_NOACCESS, _HWDVIDS_ALERT_VCAT_NOT_AUTHORIZED, "exclamation.png", 0, 0);
					exit;
				}
			}
		}

		hwd_vs_tools::logViewing($row->id);
		require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'libraries'.DS.'maintenance_recount.class.php');

		if ($showdetails == 1) {
			$smartyvs->assign("showdetails", 1);
		}

		$videoplayer->thumbnail = hwd_vs_tools::generateVideoThumbnailLink($row->id, $row->video_id, $row->video_type, $row->thumbnail, 0, null, null, null);
		$videoplayer->title = stripslashes($row->title);
		$videoplayer->description = hwd_vs_tools::truncateText(strip_tags(stripslashes($row->description)), $c->trunvdesc);
		$videoplayer->duration = $row->video_length;
		$videoplayer->player = hwd_vs_tools::generateVideoPlayer($row, $width, $height, null, $quality);
		$videoplayer->videourl = hwd_vs_tools::generateVideoUrl($row);
		$videoplayer->embedcode = hwd_vs_tools::generateEmbedCode($row);
		$videoplayer->socialbmlinks = hwd_vs_tools::generateSocialBookmarks();
		$videoplayer->comments = hwd_vs_tools::generateVideoComments($row);
		$videoplayer->ratingsystem = hwd_vs_tools::generateRatingSystem($row);
		$videoplayer->comments = hwd_vs_tools::generateVideoComments($row);
		$videoplayer->deletevideo = hwd_vs_tools::generateDeleteVideoLink($row);
		$videoplayer->editvideo = hwd_vs_tools::generateEditVideoLink($row);
		$videoplayer->publishvideo = hwd_vs_tools::generatePublishVideoLink($row);
		$videoplayer->id = $row->id;
		$smartyvs->assign("videoplayer", $videoplayer);
		hwd_vs_javascript::ajaxRate($row);

		if (empty($template) || $template == '') {
			$html = $smartyvs->fetch('plug_jomsocial_ajax.tpl');
		} else if ($template == 'playeronly') {
			$html = $videoplayer->player;
		} else {
			$html = $smartyvs->fetch($template.'.tpl');
		}

		print $html;
		print "</body></html>";
		exit;
	}
    /**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */

    function addVideoToPlaylist()
	{
		header('Content-type: text/html; charset=utf-8');

		$c = hwd_vs_Config::get_instance();
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();

		if (!$my->id) {
			echo _HWDVIDS_AJAX_LOG2ADD2PL;
			exit;
		}

		$user_id = $my->id;
		$videoid = JRequest::getInt( 'videoid', 0, 'request' );
		$playlistid = JRequest::getInt( 'playlistid', 0, 'request' );
		$date = date('Y-m-d H:i:s');
		$published = 1;

		if ($playlistid == 0) {
			echo _HWDVIDS_ALERTSELGROUP;
			exit;
		}

		$row = new hwdvids_playlist($db);
		$row->load( $playlistid );

		if (empty($row->playlist_data)) {
			$playlist_data = $videoid;
		} else {
			$playlist_data = $row->playlist_data.",".$videoid;
		}

		$_POST['id'] 	   			   = $playlistid;
		$_POST['playlist_data']        = $playlist_data;

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
		//require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'libraries'.DS.'maintenance_recount.class.php');
		//hwd_vs_recount::recountVideosInGroup($groupid);

		echo _HWDVIDS_ALERT_SUCAV2PL;
		exit;
	}
}
?>