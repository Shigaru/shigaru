<?php 
/**
 * ZnCBMembers! by znjoomla.blogspot.com
 * 
 * @package    ZnJoomla.blogspot.com 
 * @subpackage Modules
 * @link http://znjoomla.blogspot.com/
 * @license        GNU/GPL, see http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * mod_zncbmembers is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );


require_once( dirname(__FILE__).DS.'helper.php' );
	jimport('joomla.enviroment.request');
	jimport('joomla.enviroment.uri');
	$live_path = JURI::base(true) . '/'; // define live site path
	$loadCssStyle = modzncbmembersHelper::loadCssStyle($live_path); // load CSS stylesheet
	$zncbmembers = modzncbmembersHelper::zngetusers($params);
	require( JModuleHelper::getLayoutPath( 'mod_zncbmembers' ) );

?>
