<?php
/**
* @version $Id$
* @package plug_cbkarma
* @subpackage karma.php
* @author Tony Korologos with inspiration from M. Galang.
* @copyright (C) 2006-2009 www.tkserver.com Tony Korologos
* @license Limited  http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

/** ensure this file is being included by a parent file */
defined('_JEXEC') or die;

class getkarmaTab extends cbTabHandler {
	/**
	 * Construnctor
	 */
	function getkarmaTab() {
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
	// J1.0	global $db, $my, $mosConfig_live_site, $mosConfig_absolute_path;


		$url = JUri::base(true);
		$path = JPATH_SITE.DS;
		$my = &JFactory::getUser();
		$myIP = $_SERVER['REMOTE_ADDR']; 
		$currentDate =  JHTML::_('date', 'now', '%Y-%m-%d %H:%M:%S');
		$isModerator=isModerator($my->id);
		$return = null;
		
		//com_karma class
		require_once($path .  "/components/com_karma/karma.class.php");
		
		//js includes
		$return .= "<script type=\"text/javascript\" language=\"javascript\" src=\"$url/components/com_comprofiler/plugin/user/plug_cbkarma/js/prototype.lite.js\"></script>";
		$return .= "<script type=\"text/javascript\" language=\"javascript\" src=\"$url/components/com_comprofiler/plugin/user/plug_cbkarma/js/moo.ajax.js\"></script>";
		$return .= "<script type=\"text/javascript\" language=\"javascript\" src=\"$url/components/com_comprofiler/plugin/user/plug_cbkarma/js/karma.js\"></script>";
		
		//get current karma values
		$db = &JFactory::getDbo();
		$db->setQuery("select var_karma as var_karma from `#__karma_tb` where `user_id` = '$user->id' limit 1");
		$var_karma = $db->loadResult();
		
		$db->setQuery("select total_karma as total_karma from `#__karma_tb` where `user_id` = '$user->id' limit 1");
		$total_karma = $db->loadResult();
		
		$rowsempty = $total_karma;
		
		$return .= "<strong>This month's karma: </strong> " . $var_karma . "<br />";
		$return .= "<strong>Total karma: </strong> " . $total_karma . "<br />";
	

		//run a set of rule checking (for security)
		$valid = true;
		
		//Prevent users from rating themselves
		if($my->id == $user->id)
			$valid = false;
		
		if($this->matchUserIp($my->id, $user->id, $myIP) && $valid){
			//validate day lock
			$valid_date = $this->offsetTimestamp($my->id, $user->id, $myIP, CLASS_karma::getConfig('daylock'));
						
			if(isset($valid_date) && $valid_date != ''){
				if(strtotime($valid_date) > strtotime($currentDate)){
					$valid = false;
				}
			}
		} else {
			//query DB for log entries with similar IP and user
			if($logs =& $this->fetchLogByIp($myIP, $user->id) != false){
				$log = $logs[0];
				
				if(($log->ip == $myIP) && ($log->my_id != $my->id)){ 
					//If user has a previous similar IP log but different username, he might be spoofing
					//So therefore we prevent him from rating the user
					$valid = false;
				} elseif(($log->ip != $myIP) && ($log->my_id == $my->id)){					
					//validate day lock
					$valid_date = $this->offsetTimestamp($my->id, $user->id, $myIP, CLASS_karma::getConfig('daylock'));
					
					if(isset($valid_date) && $valid_date != ''){
						if(strtotime($valid_date) > strtotime($currentDate)){
							$valid = false;
						}
					}
				}
			}
		}
		
		if($valid && $my->id){
			$return .= "<br /><div id=\"ratebox\">";
			$return .= "<span style=\"font-size: 14px; font-weight: bold;\">Rate this user: </span>";
			$return .= "<span style=\"cursor:pointer; font-size: 14px; font-weight: bold;\" onClick=\"rateKarma('" . $user->id. "', '" . $my->id. "', '" . $myIP . "', '1');\"><img src=\"$url/components/com_comprofiler/plugin/user/plug_cbkarma/image/thumbup.gif\" /></span>&nbsp;";
			$return .= "<span style=\"cursor:pointer; font-size: 14px; font-weight: bold;\" onClick=\"rateKarma('" . $user->id. "', '" . $my->id. "', '" . $myIP . "', '0');\"><img src=\"$url/components/com_comprofiler/plugin/user/plug_cbkarma/image/thumbdown.gif\" /></span>";
			$return .= "</div>";
		}
		
		if ($isModerator) { $return .='<form name="karmaform" method="post" action="index.php?option=com_karma&task=adminkarma">
  <strong>(Admin)</strong> Monthly:
  <input name="monthly" type="text" id="monthly" size="3">
  Total:
  <input name="yearly" type="text" id="yearly" size="3">
  <input name="user_id" type="hidden" value="'. $user->id . '">
  <input name="rowsempty" type="hidden" value="'. $rowsempty . '">
    <input type="submit" name="button" id="button" value="Submit">

</form>';}
		
		return $return;
	} // end or getDisplayTab function
	
	function matchUserIp($myid, $userid, $ip){
$db = &JFactory::getDBO(); 
		$sql = "select count(id) from `#__karma_log` where `my_id` = '$myid' and `user_id` = '$userid' and `ip` = '$ip'";
		$db->setQuery($sql);
		
		return intval($db->loadResult());
	}
	
	function fetchLogByIP($ip, $userid){
$db = &JFactory::getDBO(); 
		
		$sql = "select * from `#__karma_log` where `ip` = '$ip' and `user_id` = '$userid' order by `timestamp` DESC";
		$db->setQuery($sql);
		$rows = $db->loadObjectList();
		
		if(count($rows)){
			return $rows;
		}
		return false;
	}
	
	function offsetTimestamp($myid, $userid, $ip, $offset){
$db = &JFactory::getDBO(); 
		
		$sql = "select date(DATE_ADD(`timestamp`,INTERVAL $offset DAY)) as date \n" .
			"from `#__karma_log` \n" .
			"where `user_id` = '$userid' \n" .
			"and `my_id` = '$myid' \n".
			"and `ip` = '$ip' \n".
			"order by `timestamp` DESC \n" .
			"limit 1 \n";
			
		$db->setQuery($sql);
		return $db->loadResult();
	}
	
} // end of the world. :)
?>