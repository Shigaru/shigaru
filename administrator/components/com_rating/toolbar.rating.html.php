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

class TOOLBAR_rating{
	function _config(){
		JToolBarHelper::save();
		JToolBarHelper::cancel();
	}
	
	function _default(){
		JToolBarHelper::cancel();
	}
	
	function _management(){

//		JToolBarHelper::addNew('resetallpositive', 'Reset All Positive');
//		JToolBarHelper::addNew('resetalltotal', 'Reset All Total');
		JToolBarHelper::editListX('edit');
		JToolBarHelper::spacer();
//		JToolBarHelper::deleteList('Reset Positive?', 'resetpositive', 'Reset Positive');
//		JToolBarHelper::deleteList('Reset Total?', 'resettotal', 'Reset Total');
		JToolBarHelper::spacer();
		JToolBarHelper::cancel();

	}
	
	function _edit(){

		JToolBarHelper::back();		
		JToolBarHelper::deleteList('delete rating?', 'deleterating', 'delete');
		JToolBarHelper::cancel();

	}
}
?>
