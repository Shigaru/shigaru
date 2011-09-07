<?php

// no direct access
if ( ! ( defined( '_VALID_CB' ) || defined( '_JEXEC' ) || defined( '_VALID_MOS' ) ) ) { die( 'Direct Access to this location is not allowed.' ); }

global $cbgrFactory;

if (defined('_JEXEC')) $cbgrFactory = new JFactory(); else $cbgrFactory = 0;

$_PLUGINS->registerFunction( 'onAfterUserUpdate', 'grProfileUpdate', 'grUpdatesTab' );
$_PLUGINS->registerFunction( 'onAfterUserAvatarUpdate', 'grAvatarUpdate', 'grUpdatesTab' );

class grUpdatesTab extends cbPluginHandler {
	function grUpdatesTab() {
		$this->cbPluginHandler();
	}
	
	function grProfileUpdate ($row) {
  global $cbgrFactory, $database;
    if ($cbgrFactory!=0) $db		=& $cbgrFactory->getDBO(); else $db = $database;
    $query = "UPDATE #__comprofiler SET avatar_update = 0 WHERE user_id = ".$row->id;
    $db->setQuery($query);    
    $db->query();
	}
	
	function grAvatarUpdate ($row) {
  global $cbgrFactory, $database;
    if ($cbgrFactory!=0) $db		=& $cbgrFactory->getDBO(); else $db = $database;
    $query = "UPDATE #__comprofiler SET avatar_update = 1 WHERE user_id = ".$row->id;
    $db->setQuery($query);    
    $db->query();
	}
	
}

?>