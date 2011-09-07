<?php
/**
 * JComments - Joomla Comment System
 *
 * CSS & JavaScript deflate class
 *
 * @version 2.0
 * @package JComments
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

class JCommentsGzip
{
	/*
	 * Compresses the javascript or css code for more efficient delivery
	 *
	 * @access private
	 */
	function processRequest()
	{
		$target = JCommentsInput::getParam($_REQUEST, 'target', '');

		switch($target) {
			case 'css':
				include_once (JCOMMENTS_HELPERS . DS . 'system.php');

				$config = & JCommentsFactory::getConfig();

				$filename = JCommentsSystemPluginHelper::getCSS(null, true);

				require_once (JCOMMENTS_LIBRARIES . DS . 'joomlatune' . DS . 'optimizer.php');
				$optimizer = & JoomlaTuneOptimizer::getInstance();
				$optimizer->compress($filename);
				break;
			case 'js':
				$files = array();
				$files[] = JCOMMENTS_LIBRARIES . DS . 'joomlatune' . DS . 'ajax.js';
				$files[] = JCOMMENTS_BASE . DS . 'js' . DS . 'jcomments-v2.1.js';

				require_once (JCOMMENTS_LIBRARIES . DS . 'joomlatune' . DS . 'optimizer.php');
				$optimizer = & JoomlaTuneOptimizer::getInstance();
				$optimizer->compress($files, 'javascript');
				break;
			default:
				header('HTTP/1.0 404 Not Found');
				break;
		}
		exit;
	}
}
?>