<?php
/**
* @version 2.1
* @package Blank
* @copyright (C) 2007,2008,2010 H.Lindlbauer, lbm-services.de
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
require_once( $mainframe->getPath('class') );
require_once( $mainframe->getPath('front_html') );

$task = JRequest::getVar( 'task', '');
$act = JRequest::getVar( 'act', '');
$option = JRequest::getVar( 'option', '');
$itemid = JRequest::getVar( 'Itemid', '');

switch($task){
case "submitrating":
	submitrating();
	break;
case "getdetails":
	getdetails();
	break;
case "submit_reply":	
	submit_reply();
	break;
default:
	break;
	
}

function submitrating(){
	$database = &JFactory::getDBO();
	
	$err = 0;
	
	$currentDate = JHTML::_('date', 'now', "%Y-%m-%d %H:%M:%S");
	
	$sql = "select count(user_id) from `#__rating_tb` where `user_id` = '" . $_POST['user_id'] . "'";
	$database->setQuery($sql);
	$count = $database->loadResult();
	
	if($count){
		$tbarr = array( "user_id" => $_POST['user_id'] );
	
		$ratingTb = new CLASS_ratingTb($database);
		
		if(!$ratingTb->bind($tbarr)){
			echo "Error: $ratingTb->_err";
			return false;
		}
		
		if(!$ratingTb->load()){
			echo "Error: $ratingTb->_err";
			return false;
		}
		
		//set new values
		if(intval($_POST['type']) === 0 ){
			$ratingTb->var_rating++;	// positives Rating
			$ratingTb->total_rating++;
		} else {
//			$ratingTb->var_rating--;
			$ratingTb->total_rating++; // alles andere: nur hochzählen
		}
		
		if(!$ratingTb->store()){
			echo "Error: $ratingTb->_err";
			return $false;
		}
	} else {	// neuen Satz anlegen, falls nicht vorhanden
		if(intval($_POST['type']) === 0){
			$sql = "insert into `#__rating_tb` values('" . $_POST['user_id'] . "', '1', '1')"; // positiv
		} else {					
			$sql = "insert into `#__rating_tb` values('" . $_POST['user_id'] . "', '0', '1')"; // alle anderen
		}

		$database->setQuery($sql);
		if(!$database->query()){
			return $false;
		}
	}
	//Log
	$arr = 
		array (
		"user_id" => $_POST['user_id'],
		"my_id" => $_POST['my_id'],
		"my_name" => $_POST['my_name'],
		"type" => $_POST['type'],
		"timestamp" => $currentDate,
		"ip" => $_POST['ip'],
		"text" => $_POST['text']
		);
	
	
	$ratingLog = new CLASS_ratingLog($database);
	
	if(!$ratingLog->bind( $arr )){
		echo "Error: $ratingLog->_err";
		return false;
	}
	
	if(!$ratingLog->store()){
		echo "Error: $ratingLog->_err";
		return false;
	}
	
	echo "<h3>Rating submitted.</h3>";
}

// eigene Funktion getdetails - alle Ratings per ajax laden
function getdetails() {
	
	$database =&JFactory::getDBO();
	$my =&JFactory::getUser();
	
	// Pagination Calc
	$page = intval($_POST['page']);
	if ($_POST['limit'] > 0){
	$sql = "select * from `#__rating_log` where `user_id` = '" . $_POST['user_id'] . "' ORDER BY timestamp DESC";
	$database->setQuery($sql);
	$res = $database->query(); 
	$total = $database->getNumRows($res);
	$pages = ceil($total / intval($_POST['limit']));
	if ($page > 1) $limit = "LIMIT " . (($page-1)* intval($_POST['limit'])) ."," .$_POST['limit'] ; 
	else $limit = "LIMIT " . $_POST['limit']; 
	} else { $limit = "";}
	//
	$sql = "select * from `#__rating_log` where `user_id` = '" . $_POST['user_id'] . "' ORDER BY timestamp DESC ".$limit;
	$database->setQuery($sql);
	$i=0;
	$return ="";
	if ($rows = $database->loadObjectList() ){
	echo "<br /><table border=\"0\" width=\"80%\">"; // table
//	echo "<tr><th></th><th align='left'>Rating</th><th align='left'>from</th><th align='left'>Date</th></tr>" ;
	echo "<tr><th></th><th align='left'>". JText::_('Rating') ."</th><th align='left'>". JText::_('Rated from') . "</th><th align='left'>". JText::_('Rated Date') ."</th></tr>" ;
		foreach ($rows as $row) {
			if ($row->type == 0) $thumb = "thumbup.gif";
			elseif ($row->type == 1) $thumb = "thumb.gif";
			elseif ($row->type == 2) $thumb = "thumbdown.gif";
			
			$return .= "<tr><td><img src=\"".JURI::base()."components/com_comprofiler/plugin/user/plug_cbrating/image/".$thumb."\" border=\"0\" alt=\"\" /></td><td>" . $row->text . "</td><td><a href=\"" . JRoute::_("index.php?option=com_comprofiler&task=userProfile&user=".$row->my_id."&Itemid=0") ."\">" .$row->my_name . "</a></td><td>" . JHTML::_( 'date',$row->timestamp, JText::_('DATE_FORMAT_LC2') ) . "</td><td>";
			if (( $my->id == $_POST['user_id']) && ($row->reply == "")) $return .= "<form><input type='button' class='button' value='".JText::_('Reply') ."' onclick=\"reply('reply',$i,".$row->id.", this );\" /><br /></form>";
			$return .= "</td></tr>";
			//if ( $row->reply != "" ) $return .= "<tr><td></td><td colspan='4'><b>Reply:</b>&nbsp;".$row->reply."</td></tr>";
			if ( $row->reply != "" ) $return .= "<tr><td></td><td colspan='4'><b>". JText::_('Reply') .":</b>&nbsp;".$row->reply."</td></tr>";			
			$i++;
		}	echo $return;
	echo "</table><div align=\"center\">";
	// Pagination
	if($pages > 1){
	for ($i=1;$i<=$pages;$i++){
		if ($i != $page) echo "<a href=\"javascript://\" onclick=\"getdetails('" . $_POST['user_id']. "', '" . $_POST['id']. "', '" . $_POST['myIP'] ."','".$i."','" .$_POST['limit'].  "');return false;\"  style=\"cursor:pointer;\">". $i ."</a>&nbsp;&nbsp;&nbsp;";
		else echo $i ."&nbsp;&nbsp;&nbsp;";
		}
	}
	echo "</div><div id=\"reply\" style=\"visibility: hidden;z-index: 10; background-color: white; padding: 2px; border: 1px solid black; width: 220px;\"><input id='rtext' type='text' size='40' maxlength='255' name='rtext' /><input type='hidden' id='rId' value='' /><input class='button' type='button' value='send' onclick=\"submit_reply();\" /><input class='button' type='button' value='close' onclick=\"document.getElementById('reply').style.visibility='hidden'\"/></div>";
	}
//	return false;
}

function submit_reply() {
	$database = &JFactory::getDBO();
	
	$sql = "update `#__rating_log` set reply='".$_POST['rtxt']. "' where `id` = '" . $_POST['rId'] . "'";
	$database->setQuery($sql);
	if(!$database->query()){
			return $false;
		}
	echo "<h3>". JText::_('Reply submitted') ."</h3>";


}


?>
