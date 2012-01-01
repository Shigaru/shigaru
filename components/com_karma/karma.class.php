<?php
/**
* @version 1.5.0
* @package Blank
* @copyright (C) 2006-2009 Tony Korologos @ http://www.tkserver.com
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

// no direct access
defined('_JEXEC') or die;


	class CLASS_karma{
	function getConfig($name = ''){
		// J1.0 global $database;
		$database = &JFactory::getDBO(); 

		if($name != ''){
			$sql = "select `value` from `#__karma_conf` where `name` = '$name' limit 1";
			$database->setQuery($sql);
			return $database->loadResult();
		}
		return false;
	}
	
	function setConfig($name = '', $value = ''){
	// J1.0 global $database;
		$database = &JFactory::getDBO(); 
				
		if($name != ''){
			$sql = "update `#__karma_conf` set `value` = '$value' where `name` = '$name'";
			$database->setQuery($sql);
			return $database->query();
		}
		return false;
	}
}



// J1.0 class CLASS_karmaTb extends mosDbTable{
class CLASS_karmaTb extends Jtable{
	
	/* @var int */
	var $user_id = NULL;
	
	/* @var int */
	var $var_karma = NULL;
	
	/* @var int */
	var $total_karma = NULL;
	
	function CLASS_karmaTb(&$db){
		// J1.0 if(!$this->mosDbTable("#__karma_tb", "user_id", $database))
		if(!parent::__construct("#__karma_tb", "user_id", $db))
		
			return false;
		return true;
	}
}

// J1.0 class CLASS_karmaLog extends mosObTable{
class CLASS_karmaLog extends jTable{

	/* @var int primary key */
	var $id = NULL;
	
	/* @var int */
	var $user_id = NULL;
	
	/* @var int */
	var $my_id = NULL;
	
	/* @var int */
	var $type = NULL;
	
	/* @var string */
	var $timestamp = NULL;
	
	/* @var string */
	var $ip  = NULL;
	
	function CLASS_karmaLog(&$db){
		// J1.0 $this->mosDbTable('#__karma_log', 'id', $database); 
		parent::__construct('#__karma_log', 'id', $db); 
		
	}
}
?>
