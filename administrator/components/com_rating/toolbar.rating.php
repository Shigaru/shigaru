<?php
/**
* @version 2.0
* @package com_rating
* @author H.Lindlbauer, cbkarma by A. Korologos & M. Galang
* @copyright (C) 2007,2009 lbm-services.de
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

require_once( $mainframe->getPath('toolbar_html') );

$task = JRequest::getVar( 'task', '');

switch($task){
default:
	TOOLBAR_rating::_default();
	break;
case "config":
	TOOLBAR_rating::_config();
	break;
case "management":
	TOOLBAR_rating::_management();
	break;
case "edit":
	TOOLBAR_rating::_edit();
	break;
break;
}
?>
