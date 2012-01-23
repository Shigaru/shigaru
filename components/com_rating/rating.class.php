<?php
/**
* @version 2.0
* @package Blank
* @copyright (C) 2009 lbm-services.de
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class CLASS_rating{
	function getConfig($name = ''){
		$database = &JFactory::getDBO();
		
		if($name != ''){
			$sql = "select `value` from `#__rating_conf` where `name` = '$name' limit 1";
			$database->setQuery($sql);
			return $database->loadResult();
		}
		return false;
	}
	
	function setConfig($name = '', $value = ''){
		$database = &JFactory::getDBO();
		
		if($name != ''){
			$sql = "update `#__rating_conf` set `value` = '$value' where `name` = '$name'";
			$database->setQuery($sql);
			return $database->query();
		}
		return false;
	}
}

class CLASS_ratingTb extends JTable{
	
	/* @var int */
	var $user_id = NULL;
	
	/* @var int */
	var $var_rating = NULL;
	
	/* @var int */
	var $total_rating = NULL;
	
	function __construct(&$database)
        {
                parent::__construct( '#__rating_tb', 'user_id', $database );
        }

	
/*	function CLASS_ratingTb(&$database){
		if(!$this->mosDbTable("#__rating_tb", "user_id", $database))
			return false;
		return true;
	}
*/
}

class CLASS_ratingLog extends JTable{
	/* @var int primary key */
	var $id = NULL;
	
	/* @var int */
	var $user_id = NULL;
	
	/* @var int */
	var $my_id = NULL;
	
	/* @var string */
	var $my_name = NULL;
	
	/* @var int */
	var $type = NULL;
	
	/* @var string */
	var $timestamp = NULL;
	
	/* @var string */
	var $ip  = NULL;
	
	/* @var string */	
	var $text = NULL;

	/* @var string */	
	var $reply = NULL;
	
function __construct(&$database)
    {
       parent::__construct( '#__rating_log', 'id', $database); 
	}
}
?>
