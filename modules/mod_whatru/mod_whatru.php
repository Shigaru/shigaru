<?php

/**

* What are you doing module

* @version 1.1

* @package plug_cbwhatru

* @subpackage whatru.php

* @author Chatura Dilan Perera

* @copyright (C) Chatura Dilan Perera

* @license Limited  http://www.gnu.org/copyleft/gpl.html GNU/GPL

* @final 1.0

*/


	// no direct access
	defined( '_JEXEC' ) or die ( 'Restricted access' );

	// Include the syndicate functions only once
	require_once( dirname(__FILE__).DS.'helper.php' );
	$statuses= modWhatruHelper::displayStatus($params);		
	require( JModuleHelper::getLayoutPath( 'mod_whatru'));
?>
