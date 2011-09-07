<?php
/**
 * JComments - Joomla Comment System
 *
 * Service functions for JComments system plugin
 *
 * @version 2.0
 * @package JComments
 * @subpackage Helpers
 * @author Sergey M. Litvinov (smart@joomlatune.ru)
 * @copyright (C) 2006-2009 by Sergey M. Litvinov (http://www.joomlatune.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
 * If you fork this to create your own project, 
 * please make a reference to JComments someplace in your code 
 * and provide a link to http://www.joomlatune.ru
 **/

/**
 * JComments System Plugin Helper
 * 
 * @static
 * @package JComments
 * @subpackage Helpers
 */
class JCommentsSystemPluginHelper
{
	/**
	 *
	 * @access private
	 * @return string
	 */
	function getCompressedJS($html=false)
	{
		$link = JCommentsFactory::getLink('gzip') . '&amp;target=js';
		if ($html) {
			return '<script src="' . $link  . '" type="text/javascript"></script>';
		} else {
			return $link;
		}
	}

	/**
	 *
	 * @access private
	 * @return string
	 */
	function getCoreJS($html=false)
	{
		if (JCOMMENTS_JVERSION == '1.0') {
			global $mainframe;
			$baseUrl = $mainframe->getCfg('live_site');
		} else {
			$baseUrl = JURI::base(true);
		}

		$link = $baseUrl . '/components/com_jcomments/js/jcomments-v2.1.js?v=2';

		if ($html) {
			return  '<script src="' . $link . '" type="text/javascript"></script>';
		} else {
			return $link;
		}
	}

	/**
	 *
	 * @access private
	 * @return string
	 */
	function getCSS($template = '', $isFilePath = false)
	{
		global $mainframe;

		if (empty($template)) {
			$config = & JCommentsCfg::getInstance();
			$template = $config->get('template');
		}

		$cssFile = 'style.css?v=10';
		
		if (JCOMMENTS_JVERSION == '1.0') {
			global $mosConfig_live_site, $mosConfig_absolute_path;
			$cssUrl = ($isFilePath ? $mosConfig_absolute_path : $mosConfig_live_site) . '/components/com_jcomments/tpl/' . $template . '/' . $cssFile;
		} else {
			$cssPath = JPATH_SITE . DS . 'templates' . DS . $mainframe->getTemplate() . DS . 'jcomments' . DS . $template . DS . 'style.css';
			$cssUrl = ($isFilePath ? JPATH_SITE : JURI::base(true)) . '/templates/' . $mainframe->getTemplate() . '/jcomments/' . $template . '/' . $cssFile;
			
			if (!is_file($cssPath)) {
				$cssUrl = ($isFilePath ? JPATH_SITE : JURI::base(true)) . '/components/com_jcomments/tpl/' . $template . '/' . $cssFile;
			}
		}
			
		return $cssUrl;
	}

	/**
	 *
	 * @access private
	 * @return string
	 */
	function getAjaxJS($html=false)
	{
		if (JCOMMENTS_JVERSION == '1.0') {
			global $mainframe;
			$baseUrl = $mainframe->getCfg('live_site');
		} else {
			$baseUrl = JURI::base(true);
		}

		$link = $baseUrl . '/components/com_jcomments/libraries/joomlatune/ajax.js';

		if ($html) {
			return  '<script src="' . $link . '" type="text/javascript"></script>';
		} else {
			return $link;
		}
	}
}
?>