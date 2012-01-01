<?php
/**
* @version 1.5.0
* @package Blank
* @copyright (C) 2006-2009 Tony Korologos @ http://www.tkserver.com
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

// no direct access
defined('_JEXEC') or die;


require_once( JApplicationHelper::getPath( 'class' ) );
require_once( JApplicationHelper::getPath( 'front_html' ) );


$currentDate =  JHTML::_('date', 'now', '%Y-%m-%d %H:%M:%S');
$user = &JFactory::getUser();
$database = &JFactory::getDBO(); 

$sql = "select count(user_id) from `#__karma_tb` where `user_id` = '$user->id' ";
	$database->setQuery($sql);
	$count = $database->loadResult();


$task = JRequest::getVar('task', '');
$act = JRequest::getVar('act', '');
$option = JRequest::getVar('option', '');
$itemid = JRequest::getVar('itemid', '');



switch($task){

default:
	break;


case "submitrating":
	submitrating();
	break;
	

	case "adminkarma":
	
	
$user_id = JRequest::getVar('user_id', '');
$var_karma = JRequest::getVar('monthly', '');
$total_karma = JRequest::getVar('yearly', '');
$rowsempty = JRequest::getVar('rowsempty', '');
	

		if ($rowsempty > 0) {
	
// delete old karma

				$sql = "DELETE FROM #__karma_tb WHERE `user_id` = '$user_id' LIMIT 1"  ;
				$database->setQuery($sql);
				$database->query();

				$sql = "INSERT INTO #__karma_tb (user_id, var_karma, total_karma) VALUES('$user_id', '$var_karma', '$total_karma')" ;
				$database->setQuery($sql);
				$database->query();

	} else {

// admin update karma
				$sql = "INSERT INTO #__karma_tb (user_id, var_karma, total_karma) VALUES('$user_id', '$var_karma', '$total_karma')" ;
				$database->setQuery($sql);
				$database->query();



}

echo 'User #'. $user_id . ' Karma updated.<br><br>';


echo '<a href="javascript:history.go(-1)">Click here to return to the previous page.</a>';	
 
// end admin karma
	

	break;
	
}	


function submitrating(){

	$err = 0;
	

$currentDate =  JHTML::_('date', 'now', '%Y-%m-%d %H:%M:%S');

		
		$database = &JFactory::getDbo();
		$database->setQuery("select count(user_id) from `#__karma_tb` where `user_id` = '" . $_POST['user_id'] . "'");
		$count = $database->loadResult();
		$row = $database->loadObjectList();
		
	if($count){
		$tbarr = array( "user_id" => $_POST['user_id'] );
	
		$karmaTb = new CLASS_karmaTb($database);
		
		if(!$karmaTb->bind($tbarr)){
			echo "Error: $karmaTb->_err";
			return false;
		}
		
		if(!$karmaTb->load()){
			echo "Error: $karmaTb->_err";
			return false;
		}
		
		//set new values
		if(intval($_POST['type']) == 1){
			$karmaTb->var_karma++;
			$karmaTb->total_karma++;
		} else if(intval($_POST['type']) == 0){
			$karmaTb->var_karma--;
			$karmaTb->total_karma--;
		}
		
		if(!$karmaTb->store()){
			echo "Error: $karmaTb->_err";
			return $false;
		}
	} else {
		if(intval($_POST['type']) == 1){
			$sql = "insert into `#__karma_tb` values('" . $_POST['user_id'] . "', '1', '1')";
		} else if(intval($_POST['type']) == 0){					
			$sql = "insert into `#__karma_tb` values('" . $_POST['user_id'] . "', '-1', '-1')";
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
		"type" => $_POST['type'],
		"timestamp" => $currentDate,
		"ip" => $_POST['ip']
		);
	
	$karmaLog = new CLASS_karmaLog($database);
	
	if(!$karmaLog->bind( $arr )){
		echo "Error: $karmaLog->_err";
		return false;
	}
	
	if(!$karmaLog->store()){
		echo "Error: $karmaLog->_err";
		return false;
	}
	
	echo "<h3>Rating submitted.</h3>";
}
?>
