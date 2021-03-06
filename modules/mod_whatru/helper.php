<?php
/**
* What are you doing module
* @version 1.1
* @package plug_cbwhatru
* @subpackage whatru.php
* @author Chatura Dilan Perera
* @copyright (C) Chatura Dilan Perera
* @license Limited  http://www.gnu.org/copyleft/gpl.html GNU/GPL
* @final 1.0
*/

// no direct access
	defined( '_JEXEC' ) or die ( 'Restricted access' );

class modWhatruHelper {
 	function displayStatus($params){
		  	$db = JFactory::getDBO();
			if ($params->get('whatru_timeframeswitch') == 0){
			$query = "SELECT cb_rustatus, cb_rustatustime, user_id, username"
				. " FROM #__comprofiler c"
				. " INNER JOIN #__users u ON c.user_id=u.id"
				. " WHERE cb_rustatus<>''"
			    . " AND TIMEDIFF(NOW(),cb_rustatustime) <=".$params->get('whatru_timeframe')
				. " ORDER BY ".modWhatruHelper::getOrder($params)
				. " LIMIT ".$params->get('whatru_users_params', 1);
				} else {
			$query = "SELECT cb_rustatus, cb_rustatustime, user_id, username"
				. " FROM #__comprofiler c"
				. " INNER JOIN #__users u ON c.user_id=u.id"
				. " WHERE cb_rustatus<>''"
				. " ORDER BY ".modWhatruHelper::getOrder($params)
				. " LIMIT ".$params->get('whatru_users_params', 1);
			}
			$db->setQuery($query);
			$rows = $db->loadObjectList();		
			return $rows;
			}

	function getOrder($params){		
		if($params->get('whatru_users_sort_order', 1) == 'random'){
			$theOrder = "RAND()";
		}else if($params->get('whatru_users_sort_order', 1) == 'ascending'){
			$theOrder = "cb_rustatustime ASC";
		}else if($params->get('whatru_users_sort_order', 1) == 'descending'){
			$theOrder = "cb_rustatustime DESC";
		}
		return $theOrder;
	}

	function limitText($maxlen ,$text){
		$length = strlen($text);
		if($maxlen >= $length){
			return $text;
		}else{
			return substr($text, 0, $maxlen) . "...";
		}
	}
}

?>
