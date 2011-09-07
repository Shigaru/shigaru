<?php
/*
* @name CB_activity 1.18
* Created By grVulture
* http://www.axxis.gr
* @copyright  mod_CB_activity Copyright (C) 2008  Axxis.gr / All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

// Direct Acess not allowed!
// no direct access
defined('_JEXEC') or die(dirname(__FILE__).DS.'Restricted access');

function plug_cb_plugin_superactivity_uninstall() {
$grFactory = new JFactory();

    $db		=& $grFactory->getDBO();
		
    $query = "DROP TABLE #__supera_cb_tab";
  	$db->setQuery($query);
		if (!$db->query()) echo "Error deleting database table #__supera_cb_tab. Please do it manually.<br/>";
}
?>
