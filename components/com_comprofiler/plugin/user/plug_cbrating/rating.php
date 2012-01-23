<?php
/**
* @version $Id$
* @package plug_cbrating
* @subpackage rating.php
* @author H.Lindlbauer, cbkarma by A. Korologos & M. Galang
* @copyright (C) 2007 lbm-services.de
* @license Limited  http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

/** ensure this file is being included by a parent file */
if ( ! ( defined( '_VALID_CB' ) || defined( '_JEXEC' ) || defined( '_VALID_MOS' ) ) ) { die( 'Direct Access to this location is not allowed.' ); }

$lang = &JFactory::getLanguage();
$lgtag = $lang->getTag(); 
if ( $lgtag == "de-DE") {
	require_once('language/de-DE.php');	
} else {
	require_once('language/default_language.php');	
}


class getratingTab extends cbTabHandler {
	/**
	 * Construnctor
	 */
	function getratingTab() {
		$this->cbTabHandler();
	}
	
	/**
	* Generates the HTML to display the user profile tab
	* @param object tab reflecting the tab database entry
	* @param object mosUser reflecting the user being displayed
	* @param int 1 for front-end, 2 for back-end
	* @returns mixed : either string HTML for tab content, or false if ErrorMSG generated
	*/
	function getDisplayTab($tab,$user,$ui) {
		global $REMOTE_ADDR;
		$my =&JFactory::getUser();
		$database = &JFactory::getDBO();

		$myIP = $REMOTE_ADDR; 
		$currentDate = JHTML::_('date', 'now',"%Y-%m-%d");
		$return = null;
		
		//com_rating class
		require_once(JPATH_SITE . "/components/com_rating/rating.class.php");
		$limit=CLASS_rating::getConfig('limit');		
		//js includes
		$return .= "<script type=\"text/javascript\" language=\"javascript\" src=\"".JURI::base()."/components/com_comprofiler/plugin/user/plug_cbrating/js/prototype.lite.js\"></script>";
		$return .= "<script type=\"text/javascript\" language=\"javascript\" src=\"".JURI::base()."/components/com_comprofiler/plugin/user/plug_cbrating/js/moo.ajax.js\"></script>";
		$return .= "<script type=\"text/javascript\" language=\"javascript\" src=\"".JURI::base()."/components/com_comprofiler/plugin/user/plug_cbrating/js/rating.js\"></script>";
		//get current rating values
		$sql = "select * from `#__rating_tb` where `user_id` = '$user->id' limit 1";
		$database->setQuery($sql);
		$row = $database->loadObjectList();
		$row=$row[0];
		if ($row && $row->total_rating > 0) $rating =  round(($row->var_rating / $row->total_rating ), 3) ; //var_rating used for positive Bewertungen here
		else $rating = 0;
		$stars = round($rating*6);
		$return .= "<table border=\"0\" width=\"80%\"><tr><td><strong>". _RATING. " </strong></td><td> ";
		$return .= "<span onclick=\"getdetails('" . $user->id. "', '" . $my->id. "', '" . $myIP ."', 1 , '" .$limit.  "')\" style=\"cursor:pointer;\">"; // details
			for ($x = 0 ; $x < $stars ; $x++) {
				$return .= "<img src=\"".JURI::base()."/components/com_comprofiler/plugin/user/plug_cbrating/image/thumbup.gif\" border=\"0\" alt=\"\"/>";
			}
		if ($stars < 6) {
			for ($y=0; $y < (6 - $stars); $y++) {
			$return .= "<img src=\"".JURI::base()."/components/com_comprofiler/plugin/user/plug_cbrating/image/thumbup_grey.gif\" border=\"0\" alt=\"\" />";
			}
		}
		$return .= "</span></td><td>" . ($rating *100). _POS_RATINGS. "</td></tr>";
		$return .= "<tr><td><strong>". _RATINGS.": </strong></td><td> " . $row->total_rating . "</td><td></td></tr></table><br />";
				
		//run a set of rule checking (for security)
		$valid = true;
		
		//Prevent users from rating themselves
		if($my->id == $user->id)
			$valid = false;
		
		$daylock=CLASS_rating::getConfig('daylock');
		if($this->matchUserIp($my->id, $user->id, $myIP) && $valid){
			//validate day lock
			if ( $daylock > 0) { 
				$valid_date = $this->offsetTimestamp($my->id, $user->id, $myIP, $daylock); // daylock set
				if(isset($valid_date) && $valid_date != ''){ 
					if(strtotime($valid_date) > strtotime($currentDate)){
						$valid = false;
					}
				} 
			} else {	// no daylock
					$valid = false; 
				}
		} else {
			//query DB for log entries with similar IP and user
			if($logs =& $this->fetchLogByIp($myIP, $user->id) != false){
				$log = $logs[0];
				if( ( trim($log->ip) != "") && ($log->ip == $myIP) && ($log->my_id != $my->id)){ 
					//If user has a previous similar IP log but different username, he might be spoofing
					//So therefore we prevent him from rating the user
					$valid = false;
				} elseif( ($daylock > 0) && ($log->ip != $myIP) && ($log->my_id == $my->id)){					
					//validate day lock
					$valid_date = $this->offsetTimestamp($my->id, $user->id, $myIP, CLASS_rating::getConfig('daylock')); // no daylock
					
					if(isset($valid_date) && $valid_date != ''){
						if(strtotime($valid_date) > strtotime($currentDate)){
							$valid = false;
						}
					} 
					$valid = false; 
					}
				
			}
		}
		
		if($valid && $my->id){
			$return .= "<br /><div id=\"ratebox\">";
			$return .= "<span style=\"font-size: 14px; font-weight: bold;\">"._RATE_USER."  </span>";
			$return .= "<input type=\"text\" id=\"bgtext\" name=\"bgtext\" size=\"55\" maxlength=\"200\" value=\"Insert your user rating text here.\" />";
			$return .= "&nbsp;&nbsp;<span style=\"cursor:pointer; font-size: 14px; font-weight: bold;\" onClick=\"rate('" . $user->id. "', '" . $my->id. "', '" . $myIP . "', '" . $my->username . "', '0');\"><img src=\"".JURI::base()."/components/com_comprofiler/plugin/user/plug_cbrating/image/thumbup.gif\" alt=\"rate positive\" /></span>&nbsp;";
			$return .= "<span style=\"cursor:pointer; font-size: 14px; font-weight: bold;\" onClick=\"rate('" . $user->id. "', '" . $my->id. "', '" . $myIP . "', '" . $my->username . "',  '1');\"><img src=\"".JURI::base()."/components/com_comprofiler/plugin/user/plug_cbrating/image/thumb.gif\" alt=\"rate neutral\" /></span>&nbsp;";
			$return .= "<span style=\"cursor:pointer; font-size: 14px; font-weight: bold;\" onClick=\"rate('" . $user->id. "', '" . $my->id. "', '" . $myIP . "', '" . $my->username . "', '2');\"><img src=\"".JURI::base()."/components/com_comprofiler/plugin/user/plug_cbrating/image/thumbdown.gif\" alt=\"rate negative\" /></span>";
			$return .= "</div>";
		}
		$return .= "<div id=\"details\"></div>";
		return $return;
	} // end or getDisplayTab function
	
	function matchUserIp($myid, $userid, $ip){
		$database = &JFactory::getDBO();
		$sql = "select count(id) from `#__rating_log` where `my_id` = '$myid' and `user_id` = '$userid' and `ip` = '$ip'";
		$database->setQuery($sql);
		
		return intval($database->loadResult());
	}
	
	function fetchLogByIP($ip, $userid){
		$database = &JFactory::getDBO();
		
		$sql = "select * from `#__rating_log` where `ip` = '$ip' and `user_id` = '$userid' order by `timestamp` DESC";
		$database->setQuery($sql);
		$rows = $database->loadObjectList();
		
		if(count($rows)){
			return $rows;
		}
		return false;
	}
	
	function offsetTimestamp($myid, $userid, $ip, $offset){
		$database = &JFactory::getDBO();
		
		$sql = "select date(DATE_ADD(`timestamp`,INTERVAL $offset DAY)) as date \n" .
			"from `#__rating_log` \n" .
			"where `user_id` = '$userid' \n" .
			"and `my_id` = '$myid' \n".
			"and `ip` = '$ip' \n".
			"order by `timestamp` DESC \n" .
			"limit 1 \n";
			
		$database->setQuery($sql);
		return $database->loadResult();
	}
	
} // end of the world. :)
?>