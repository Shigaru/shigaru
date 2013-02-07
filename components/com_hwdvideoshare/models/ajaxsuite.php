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
class hwd_vs_ajax
{
    /**
     */
    function rate()
	{
		header('Content-type: text/html; charset=utf-8');
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$ip = $_SERVER['REMOTE_ADDR'];

		$rating = JRequest::getInt( 'rating', 0, 'request' );
		$videoid = JRequest::getInt( 'item_id', 0, 'request' );

		if ($my->id == "0" || !$my->id || empty($my->id))
		{
			$where = ' WHERE ip = "'.$ip.'"';
		}
		else
		{
			$where = ' WHERE userid = '.$my->id;
		}
		$where .= ' AND videoid = '.$videoid;

		if ($rating > 5) die(_HWDVIDS_ALERT_INVALVOTE); // kill the script because normal users will never see this.
		if ($rating < 0) die(_HWDVIDS_ALERT_INVALVOTE); // kill the script because normal users will never see this.

		$query = "SELECT * FROM #__hwdvidsvideos WHERE id = $videoid";
		$db->SetQuery( $query );
    	$row = $db->loadObject();

		if (!isset($row->rating_number_votes)) die("Could not load a video to rate"); // kill the script because normal users will never see this.

		if ($row->rating_number_votes < 1)
		{
			$count = 0;
		}
		else
		{
			$count = $row->rating_number_votes; //how many votes total
		}
		$tense = ($count==1) ? _HWDVIDS_INFO_M_VOTE : _HWDVIDS_INFO_M_VOTES; //plural form votes/vote

		$rating0 = @number_format($row->rating_total_points/$count,0);
		$rating1 = @number_format($row->rating_total_points/$count,1);

		$allowReVote = 0;
		if ($allowReVote == 1)
		{
			$where .= " AND date >= DATE_SUB(NOW(),INTERVAL 1 DAY)";
		}
		$db->SetQuery("SELECT count(*) FROM #__hwdvidsrating $where");
		$total = $db->loadResult();
		$code='<ul class="rating rated'.$rating0.'star">
			  <li id="l1" class="rate one"><a href="'.JURI::root( true ).'/index.php?option=com_hwdvideoshare&task=ajax_rate&format=raw&item_id='.$row->id.'&rating=1" title="1 Star">1</a></li>
			  <li id="l2" class="rate two"><a href="'.JURI::root( true ).'/index.php?option=com_hwdvideoshare&task=ajax_rate&format=raw&item_id='.$row->id.'&rating=2" title="2 Stars">2</a></li>
			  <li id="l3" class="rate three"><a href="'.JURI::root( true ).'/index.php?option=com_hwdvideoshare&task=ajax_rate&format=raw&item_id='.$row->id.'&rating=3" title="3 Stars">3</a></li>
			  <li id="l4" class="rate four"><a href="'.JURI::root( true ).'/index.php?option=com_hwdvideoshare&task=ajax_rate&format=raw&item_id='.$row->id.'&rating=4" title="4 Stars">4</a></li>
			  <li id="l5" class="rate five"><a href="'.JURI::root( true ).'/index.php?option=com_hwdvideoshare&task=ajax_rate&format=raw&item_id='.$row->id.'&rating=5" title="5 Stars">5</a></li>
		</ul>';
		// Stop if user not logged in and guest rating blocked
		if ((!$my->id || $my->id == 0)) {
			$code.='<span class="fleft">'._HWDVIDS_AJAX_LOG2RATE.'</span>';
			$code.='<div class="clear fleft">'._HWDVIDS_INFO_RATED.'<strong> '.$rating1.'</strong> ('.$count.' '.$tense.')</div>
			 <i class="pad4 icon-spinner icon-spin fleft" style="display:none;"></i>';
		} else if ( $total>0 ) {
			$code.='<span class="fleft">'._HWDVIDS_AJAX_ALREADYRATE.'</span>';
			$code.='<div class="clear fleft">'._HWDVIDS_INFO_RATED.'<strong> '.$rating1.'</strong> ('.$count.' '.$tense.')</div>
			 <i class="pad4 icon-spinner icon-spin fleft" style="display:none;"></i>';
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
			
			//connecting to the database to get some information
			$numbers['total_votes'] = $rating_number_votes;
			$numbers['total_value'] = $rating_total_points;

			$count = $numbers['total_votes']; //how many votes total
			$current_rating = $numbers['total_value']; //total number of rating added together and stored
			$sum = $rating+$current_rating; // add together the current vote value and the total vote value

			$code='<ul class="rating rated'.@number_format($new_rating,0).'star">
			  <li id="l1" class="rate one"><a href="'.JURI::root( true ).'/index.php?option=com_hwdvideoshare&task=ajax_rate&format=raw&item_id='.$row->id.'&rating=1" title="1 Star">1</a></li>
			  <li id="l2" class="rate two"><a href="'.JURI::root( true ).'/index.php?option=com_hwdvideoshare&task=ajax_rate&format=raw&item_id='.$row->id.'&rating=2" title="2 Stars">2</a></li>
			  <li id="l3" class="rate three"><a href="'.JURI::root( true ).'/index.php?option=com_hwdvideoshare&task=ajax_rate&format=raw&item_id='.$row->id.'&rating=3" title="3 Stars">3</a></li>
			  <li id="l4" class="rate four"><a href="'.JURI::root( true ).'/index.php?option=com_hwdvideoshare&task=ajax_rate&format=raw&item_id='.$row->id.'&rating=4" title="4 Stars">4</a></li>
			  <li id="l5" class="rate five"><a href="'.JURI::root( true ).'/index.php?option=com_hwdvideoshare&task=ajax_rate&format=raw&item_id='.$row->id.'&rating=5" title="5 Stars">5</a></li>
			</ul>';
			$code.='<span class="fleft fontblue">'._HWDVIDS_ALERT_THANKSVOTER.'</span>';
			$code.='<div class="clear fleft">'._HWDVIDS_INFO_RATED.'<strong> '.@number_format($new_rating,1).'</strong> ('.$count.' '.$tense.')</div>
			 <i class="pad4 icon-spinner icon-spin fleft" style="display:none;"></i>';
			
		}
		
		echo $code;
		hwd_vs_tools::logRating( $videoid, $rating );

		exit;
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
		$code = hwd_vs_tools::searchSong($term);
		echo $code;
		exit;
		}
		
	function ajax_showtabs(){
		header('Content-type: text/html; charset=utf-8');
		echo "<META NAME=\"ROBOTS\" CONTENT=\"NOINDEX, NOFOLLOW\">";
		$showtab = JRequest::getVar( 'showtab', '' );
		$listtype = JRequest::getVar( 'listtype', '' );
		$daterang = JRequest::getVar( 'when', '' );
		$code = hwd_vs_tools::showTabContent($showtab,$listtype,$daterang);
		print $code;
		exit;
		}
		
	function ajax_getactioncount(){
		header('Content-type: text/html; charset=utf-8');
		echo "<META NAME=\"ROBOTS\" CONTENT=\"NOINDEX, NOFOLLOW\">";
		$action = JRequest::getVar( 'action', '' );
		$item_id 	   = Jrequest::getVar( 'item_id', null );
		$code = hwd_vs_tools::getActionCount($action,$item_id);
		print $code;
		exit;
		}
		
	function ajax_like(){
		header('Content-type: text/html; charset=utf-8');
		$likeid        = Jrequest::getVar( 'likeid', null );
		$item_id 	   = Jrequest::getVar( 'item_id', null );
		$item_type     = JRequest::getWord( 'item_type', 'video' );
		$code = hwd_vs_tools::doLikeUnLike($likeid,$item_id,$item_type);
		print $code;
		exit;
		}	
	
	function ajax_getVideoCount(){
		header('Content-type: text/html; charset=utf-8');
		$code = hwd_vs_tools::cometLongPolling();
		print $code;
		exit;
		}
		
	function ajax_search()	{
		header('Content-type: text/html; charset=utf-8');
		echo "<META NAME=\"ROBOTS\" CONTENT=\"NOINDEX, NOFOLLOW\">";
		$app = & JFactory::getApplication();
		$uri = & JFactory::getURI();
		$pageURL = $uri->toString();
		
		require_once(JPATH_SITE.DS.'components'.DS.'com_hwdvideoshare'.DS.'models'.DS.'core.php');
		hwd_vs_core::displayResults();
		}
	
    /**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */

    function addToFavourites()
	{
		header('Content-type: text/html; charset=utf-8');
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$response = 0;
		$videoid = JRequest::getVar( 'item_id', '' );
		
		if($my->id){
				$where = ' WHERE a.userid = '.$my->id;
				$where .= ' AND a.item_id = '.$videoid;

				$db->SetQuery( 'SELECT *'
							. ' FROM #__hwdvidsfavorites AS a'
							. $where
							);
				$favouredItem = $db->loadResultArray();
				$row = new hwdvids_favs($db);
				
				if ( sizeof($favouredItem)>0 ) {
					if (!$row->delete(intval($favouredItem[0]))){
						JError::raiseError(500, $row->getError() );
						$response = 0;
						}else{
							$response = 1;
							hwd_vs_tools::logFavour( $videoid, -1 );
							}
				}else{
						$_POST['userid'] = $my->id;
						$_POST['item_id'] = $videoid;
						$_POST['date'] = date('Y-m-d H:i:s');
						
						if (!$row->bind( $_POST )) {
								return JError::raiseWarning( 500, $row->getError() );
							}else{
								if (!$row->store()) {
										JError::raiseError(500, $row->getError() );
								}
								$response = $row->id;							
								hwd_vs_tools::logFavour( $videoid, 1 );
							}
						
				}
		}else{
			$response = _HWDVIDS_AJAX_LOG2FAV1;
			}		
		print $response;
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
		
		$db = & JFactory::getDBO();
		$my = & JFactory::getUser();
		$response = 0;
		$videoid = JRequest::getVar( 'item_id', '' );
		
		if($my->id){
				$where = ' WHERE a.videoid = '.$videoid.' AND a.userid = '.$my->id;
				$db->SetQuery( 'SELECT *'
               		. ' FROM #__hwdvidsflagged_videos AS a'
               		. $where
               		);
				$flaggedItem = $db->loadResultArray();
				$row = new hwdvids_flagvid($db);
				if ( sizeof($flaggedItem)>0 ) {
					if (!$row->delete(intval($flaggedItem[0]))){
						JError::raiseError(500, $row->getError() );
						$response = 0;
						}else
							$response = 1;
				}else{
					

					$_POST['userid'] = $my->id;
					$_POST['videoid'] = $videoid;
					$_POST['status'] = "UNREAD";
					$_POST['date'] = date('Y-m-d H:i:s');
					
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
			$response = _HWDVIDS_AJAX_LOG2REPORT;
			}

		print $response;
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
		echo "<META NAME=\"ROBOTS\" CONTENT=\"NOINDEX, NOFOLLOW\">";

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
		global $Itemid, $smartyvs, $hwdvs_selectv, $hwdvs_joinv, $hwdvsItemid, $hwdvsAjaxPlayer;

		header('Content-type: text/html; charset=utf-8');

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
		$quality = JRequest::getWord( 'quality', 'hd' );
		$autostart = JRequest::getInt( 'autostart', null );
		$hwdvsAjaxPlayer = true;

		if (!hwd_vs_access::allowAccess( $c->gtree_plyr, $c->gtree_plyr_child, hwd_vs_access::userGID( $my->id ))) {
			if ( ($my->id < 1) && (!$usersConfig->get( 'allowUserRegistration' ) == '0' && hwd_vs_access::allowAccess( $c->gtree_upld, 'RECURSE', $acl->get_group_id('Registered','ARO') ) ) ) {
				hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_NOACCESS, _HWDVIDS_ALERT_REGISTERFORPLYR, "exclamation.png", 0, 0);
				exit;
			} else {
				hwd_vs_tools::infomessage(1, 0, _HWDVIDS_TITLE_NOACCESS, _HWDVIDS_ALERT_PLYR_NOT_AUTHORIZED, "exclamation.png", 0, 0);
				exit;
			}
		}

        $where = ' WHERE video.id = '.$video_id;

		$query = "SELECT".$hwdvs_selectv." FROM #__hwdvidsvideos AS video ".$hwdvs_joinv." ".$where;
        $db->SetQuery($query);
        $row = $db->loadObject();

		if (!hwd_vs_tools::validateVideoAccess($row))
		{
			exit;
		}

		hwd_vs_tools::logViewing($row->id);
		require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'libraries'.DS.'maintenance_recount.class.php');

		if ($showdetails == 1) {
			$smartyvs->assign("showdetails", 1);
		}

		$videoplayer = hwd_vs_tools::generateVideoDetails($row, $width, $height, null, $Itemid, null, null, $autostart);
		$smartyvs->assign("videoplayer", $videoplayer);
		hwd_vs_javascript::ajaxRate($row);

		if (empty($template) || $template == '')
		{
			$html = $smartyvs->fetch('plug_jomsocial_ajax.tpl');
		}
		else if ($template == 'playeronly')
		{
			$html = $videoplayer->player;
		}
		else if ($template == 'multibox')
		{
			$link = JRoute::_("index.php?option=com_hwdvideoshare&task=viewvideo&Itemid=$hwdvsItemid&video_id=".$row->id);
			$html = "<style type=\"text/css\">body {overflow:hidden;background-color:black;margin:0;padding:0;}</style>";
			$html.= "<div style=\"position:absolute;top:10px;left:20px;\"><a href=\"$link\" target=\"_top\">View Full Video Details</a></div>";
			$html.= "$videoplayer->player";
		}
		else
		{
			$html = $smartyvs->fetch($template.'.tpl');
		}

		print $html;
		exit;
	}
    /**
     * Outputs frontpage HTML
     *
     * @return       Nothing
     */

    function managePlaylistItems()
	{
		require_once(JPATH_SITE.DS.'components'.DS.'com_hwdvideoshare'.DS.'models'.DS.'playlists.php');
		header('Content-type: text/html; charset=utf-8');
		$playlist_id 	   = Jrequest::getVar( 'playlist_id', null );
		if(!$playlist_id)
			$code = hwd_vs_playlists::createAndAddVideo();
			else
				$code = hwd_vs_playlists::addRemoveItemPlaylist($playlist_id);
		print $code;
		exit;
	}	
}
?>
