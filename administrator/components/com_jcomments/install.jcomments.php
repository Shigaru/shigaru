<?php
/**
 * JComments - Joomla Comment System
 *
 * Backend install handler
 *
 * @version 2.0
 * @package JComments
 * @subpackage Installer
 * @author Sergey M. Litvinov (smart@joomlatune.ru)
 * @copyright (C) 2006-2009 by Sergey M. Litvinov (http://www.joomlatune.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
 * If you fork this to create your own project,
 * please make a reference to JComments someplace in your code
 * and provide a link to http://www.joomlatune.ru
 **/

// ensure this file is being included by a parent file
(defined('_VALID_MOS') OR defined('_JEXEC')) or die('Direct Access to this location is not allowed.');

// define directory separator short constant
if (!defined('DS')) {
	define('DS', DIRECTORY_SEPARATOR);
}

function com_install()
{
	if (defined('_JEXEC') && class_exists('JApplication')) {
		$config = &JFactory::getConfig();
		$config->setValue('config.live_site', substr_replace(JURI::root(), '', -1, 1));
		$url = JURI::root() . 'administrator/index.php?option=com_jcomments&task=postinstall';
	} else {
		global $mainframe;
	        // prepare language files
		require_once (dirname(__FILE__) . DS . 'install' . DS . 'helpers' . DS . 'language.php');
		JCommentsInstallerLanguageHelper::convertLanguages();	
		$url = $mainframe->getCfg('live_site') . '/administrator/index2.php?option=com_jcomments&task=postinstall';
	}

	if (headers_sent()) {
		echo ("<script>document.location.href='$url';</script>\n");
	} else {
		header('Location: ' . $url);
	}
}
?>