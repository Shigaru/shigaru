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

	echo "<div id=\"mod_wru_module\">";
	$wru_max_len = $params->get('whatru_max_char', 1);
	$db =& JFactory::getDBO();
	$roe = 0; // row odd/even counter variable
	echo '<div id="mod_wru_status" style="padding-top:'.$params->get('whatru_space', 1).'px"><ul>';

	foreach($statuses as $status){
	//look at the sessiontable if the user is online
		$query = 'SELECT COUNT(DISTINCT `username`) FROM `#__session` WHERE `username` = "'.$status->username.'"'; $db->setQuery($query);
		$ruo = $db->loadResult(); // fill var with status
		if($roe % 2 == 0) {$li_stat = "odd";}else{$li_stat = "even";}
		if($ruo == 1){$ruostatus = "online";}else{$ruostatus = "offline";}
		
		echo '<li class="li_'.$ruostatus.' '.$li_stat.'">';
		echo '<a href="' . JRoute::_('index.php?option=com_comprofiler&task=userProfile&user='.$status->user_id) . '"><span class="user user_'.$ruostatus.'">' . $status->username . "</span> " . modWhatruHelper::limitText($wru_max_len, stripslashes($status->cb_rustatus)). '</a>';
		echo'</li>';
        $roe++;
		}
	echo '</ul></div></div>';
?>