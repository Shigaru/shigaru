<?php

/**

* @version $Id: toolbar.cbjuice.php,v1.7Beta7 2010-03-27 

* @package CBUICE

* @subpackage CBJUICE

* @copyright (C) 2000 - 2005 Pronique Software and 2007 Jacobson Consulting Inc.

* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL

*   based on M3Port/Juice released as Free Software by Pronique software
* - Modded by billt/billt_3
* - added functionality to add users and with email notification option for Joomla
* - Modded by jciconsult, generalized to CB. edit functionality added
* - NOTE - THIS VERSION REQUIRES USE OF FIRST AND LAST NAME AT LEAST AS SEPARATE COMPROFILER FIELDS

*/


/** ensure this file is being included by a parent file */

if ( ! (  defined( '_JEXEC' ) || defined( '_VALID_MOS' ) ) ) { die( 'Direct Access to this location is not allowed.' ); }


if (defined('JPATH_ADMINISTRATOR')){

	$database = &JFactory::getDbo();
	$my = &JFactory::getUser();
	require_once(JApplicationHelper::getPath('toolbar_html'));

	} else {
	require_once( $mainframe->getPath( 'toolbar_html' ) );
	global $database,$my;
}




switch ( $task ) {

	default:

		TOOLBAR_usersimport::_DEFAULT();

		break;

}

?>

