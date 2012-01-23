<?php
/**
* @version 2.0
* @package com_rating
* @author H.Lindlbauer, cbkarma by A. Korologos & M. Galang
* @copyright (C) 2007,2008,2009 lbm-services.de
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
error_reporting(E_ALL);

require_once( $mainframe->getPath('class') );
require_once( $mainframe->getPath('admin_html') );

$option = JRequest::getVar( 'option', '');
$task 	= JRequest::getVar( 'task', '');
$act 	= JRequest::getVar( 'act', '');

switch($task){
case "config":
	showConfig($option);
	break;
case "management":
	showManagement($option);
	break;
	
case "save":
	save($option);
	$mainframe->redirect("index2.php?option=$option&task=config", "Saved");
	break;
case "cancel":
	$mainframe->redirect('index2.php', 'Cancelled');
	break;
case "edit":
	edit($option);
	break;
case "saveedited":
	saveedited($option);
	break;
case "resettotal":
	resetTotal($option);
	break;
case "resetpositive":
	resetPositive($option);
	break;
case "resetalltotal":
	resetAllTotal($option);
	break;
case "resetallpositive":
	resetallPositive($option);
	break;
case "deleterating":
	deleteRating($option);
	break;
}

function showConfig($option){
	$configObj = new stdclass;
	$configObj->ipprotect = CLASS_rating::getConfig('ipprotect');
	$configObj->daylock = CLASS_rating::getConfig('daylock');
	$configObj->limit = CLASS_rating::getConfig('limit');	
	ADMIN_html::showConfig($configObj, $option);
}

function save($option){
	$database = &JFactory::getDBO();
	
	//$ipprotect = intval(mosGetParam($_POST, 'ipprotect', ''));
	$daylock = intval(JRequest::getVar( 'daylock', '','POST'));
	$limit 	 = intval(JRequest::getVar( 'limit', '','POST'));
	//CLASS_rating::setConfig('ipprotect', $ipprotect);
	CLASS_rating::setConfig('daylock', $daylock);
	CLASS_rating::setConfig('limit', $limit);	
}

function showManagement($option){
	$database = &JFactory::getDBO();
	global $mainframe;
	
	//$limit 	= intval( $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', $mosConfig_list_limit ) );
	$limit  = $mainframe->getUserStateFromRequest( 'global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int' );
	//$limitstart = intval( $mainframe->getUserStateFromRequest( "view{$option}limitstart", 'limitstart', 0 ) );
	$limitstart = $mainframe->getUserStateFromRequest( $option.'limitstart', 'limitstart', 0, 'int' );
	$sql = "select count(id) from `#__users` where 1 \n";
	$database->setQuery($sql);
	$total = $database->loadResult();

	//require_once( JPATH_SITE . '/administrator/includes/pageNavigation.php' );
	//$pageNav = new mosPageNav( $total, $limitstart, $limit );
	jimport('joomla.html.pagination');
	$pageNav = new JPagination( $total, $limitstart, $limit );


	
	$sql = "select a.id, a.name, a.username, a.email, b.var_rating, b.total_rating \n" .
		"from `#__users` as a LEFT JOIN `#__rating_tb` as b \n" .
		"on a.id = b.user_id \n" .
		"order by a.id ASC \n".
		"limit $pageNav->limitstart, $pageNav->limit \n";
	
	$database->setQuery($sql);
	$rows = $database->loadObjectList();
	
	ADMIN_html::showManagement($rows, $pageNav, $option);
}

function edit($option){
	$database = &JFactory::getDBO();
	
	$user = intval(JRequest::getVar( 'user', '','GET'));
	if( !isset($user) || $user == '' ) { $users = JRequest::getVar( 'cid', array(0),'POST'); $user= $users[0]; }

	$ratingTb = new CLASS_ratingTb($database);
	$ratingTb->load($user);
	$sql = "SELECT * FROM `#__rating_log` WHERE `user_id` = " . $user . " ORDER BY timestamp DESC ";
	$database->setQuery($sql);
	$ratings = $database->loadObjectList();

	$userObj = & JTable::getInstance( 'user' );
	$userObj->load($user);
	
	ADMIN_html::edit($ratingTb, $ratings, $userObj, $option);
}

function saveedited($option){	
	$database = &JFactory::getDBO();
	
	$obj = new stdclass;
	$obj->user_id = JRequest::getVar( 'user_id', '','POST');
	$obj->var_rating = JRequest::getVar( 'var_rating', '','POST');
	$obj->total_rating = JRequest::getVar( 'total_rating', '','POST');

	$sql = "SELECT count(user_id) FROM `#__rating_tb` WHERE `user_id` = '$obj->user_id' \n";
	$database->setQuery($sql);
	$count = $database->loadResult();

	if($count){
		$database->updateObject("#__rating_tb", $obj, "user_id");
	} else {
		$database->insertObject("#__rating_tb", $obj);
	}
	
	$mainframe->redirect("index2.php?option=$option&task=management", "Edited");
}

function resetTotal($option){
	$database = &JFactory::getDBO();

	$cid = JRequest::getVar( 'cid', array(0),'POST');
	$cids = implode(',', $cid);
	
	$sql = "update `#__rating_tb` set `total_rating` = '0' where `user_id` in ($cids)";
	$database->setQuery($sql);
	
	if($database->query()){
		$msg = "Reset Successful";
	} else {
		$msg = "Error: Database Query";
	}
	
	$mainframe->redirect("index2.php?option=$option&task=management", $msg);
}

function resetPositive($option){
	$database = &JFactory::getDBO();
	
	$cid = JRequest::getVar( 'cid', array(0),'POST');
	$cids = implode(',', $cid);
	
	$sql = "update `#__rating_tb` set `var_rating` = '0' where `user_id` in ($cids)";
	$database->setQuery($sql);

	
	if($database->query()){
		//clear logs
		$sql = "delete from `#__rating_log` where `user_id` in ($cids)";
		$database->setQuery($sql);
		$database->query();

		$msg = "Reset Successful";
	} else {
		$msg = "Error: Database Query";
	}
	
	$mainframe->redirect("index2.php?option=$option&task=management", $msg);
}

function resetallPositive($option){
	$database = &JFactory::getDBO();
	
	$sql = "update `#__rating_tb` set `var_rating` = '0' where 1";
	$database->setQuery($sql);
	
	if($database->query()){
		//clear logs
		$sql = "delete from `#__rating_log` where 1";
		$database->setQuery($sql);
		$database->query();
	
		$msg = "Reset Successful";		
	} else {
		$msg = "Error: Database Query";
	}
	
	$mainframe->redirect("index2.php?option=$option&task=management", $msg);
}

function resetAllTotal($option){
	$database = &JFactory::getDBO();
	
	$sql = "update `#__rating_tb` set `total_rating` = '0' where 1";
	$database->setQuery($sql);
	
	if($database->query()){
		$mainframe->redirect("index2.php?option=$option&task=management", "Reset Succesful");
	} else {
		$mainframe->redirect("index2.php?option=$option&task=management", "Error: Database Query");
	}
}

function deleteRating($option){
	$database = &JFactory::getDBO();
	
	$cid = JRequest::getVar( 'cid', array(0),'POST');
	$cids = implode(',', $cid);
	$row = array();
	
	foreach ($cid as $id) {
	$sql = "SELECT user_id,type FROM `#__rating_log` WHERE `id` = $id";
	$database->setQuery($sql);
	$row = $database->loadObject();
		if (intval($row->type) === 0 ) { // wenn positiv alle Werte um 1 runtersetzen
			$sql = "UPDATE `#__rating_tb` SET var_rating=var_rating-1, total_rating=total_rating-1  WHERE `user_id` = $row->user_id";
			$database->setQuery($sql);
		} 
		else if (intval($row->type) > 0) { // wenn nicht positiv, nur total_rating um 1 runtersetzen
			$sql = "UPDATE `#__rating_tb` SET total_rating=total_rating-1  WHERE `user_id` = $row->user_id";
			$database->setQuery($sql);
		}
		if($database->query()){
			$msg = "Ratings list successfully updated.";
		} else {
			$msg = "Error: Database Query";
		}

	}

	$sql = "DELETE FROM `#__rating_log` WHERE `id` IN ($cids)";
		$database->setQuery($sql);
		$database->query();

	// wenn alles ok, Ratings aus _log loeschen
	//http://localhost/joomla15/administrator/index2.php?option=com_rating&task=edit&user=62	
	//$mainframe->redirect("index2.php?option=$option&task=management", $msg);
	$mainframe->redirect("index2.php?option=$option&task=edit&user=$row->user_id", $msg);
}


?>
