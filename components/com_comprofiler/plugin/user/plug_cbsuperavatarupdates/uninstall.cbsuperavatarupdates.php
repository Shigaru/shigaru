<?php
/*
* @name CB_activity 1.18
* Created By grVulture
* http://www.axxis.gr
* @copyright  mod_CB_activity Copyright (C) 2008  Axxis.gr / All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

/** ensure this file is being included by a parent file */
if ( ! ( defined( '_JEXEC' ) || defined( '_VALID_MOS' ) ) ) { die(); }

// ************************
function plug_cb_plugin_super_avatar_update_uninstall() {
global $database;

if (defined('_JEXEC')) $database	=& JFactory::getDBO();

$return = "";
		
  	$database->setQuery("ALTER TABLE #__comprofiler DROP COLUMN avatar_update");
		if (!$database->query()) $return.= "Error deleting tab table. Please contact support.<br/>";
    
  return $return;

}
?>
