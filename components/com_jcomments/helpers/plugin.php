<?php
/**
 * JComments - Joomla Comment System
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
 * Joomla plugins helper
 * 
 * @static
 * @package JComments
 * @subpackage Helpers
 **/
class JCommentsPluginHelper
{
	/**
	 * Loads all the plugin files for a particular type if no specific plugin is specified
	 * otherwise only the specific pugin is loaded.
	 *
	 * @access public
	 * @param string $type The plugin type, relates to the sub-directory in the plugins directory
	 * @return boolean True if success
	 */
        function importPlugin( $type = 'jcomments' )
        {
		if (JCOMMENTS_JVERSION == '1.5') {
			JPluginHelper::importPlugin($type);
		} else if (JCOMMENTS_JVERSION == '1.0') {
			global $_MAMBOTS;
			$_MAMBOTS->loadBotGroup($type);
		}
        }

	/**
	 * Triggers an event by dispatching arguments to all observers that handle
	 * the event and returning their return values.
	 *
	 * @access public
	 * @param string $event The event name
	 * @param array	$args An array of arguments
	 * @return array An array of results from each function call
	 */
        function trigger( $event, $args )
        {
		if (JCOMMENTS_JVERSION == '1.5') {
			$dispatcher = & JDispatcher::getInstance();
			$dispatcher->trigger($event, $args);
		} else if (JCOMMENTS_JVERSION == '1.0') {
			global $_MAMBOTS;
			$_MAMBOTS->trigger($event, $args, false);
		}
	}


	/**
	 * Gets the parameter object for a plugin
	 *
	 * @access public
	 * @param string $pluginName The plugin name
	 * @param string $type The plugin type, relates to the sub-directory in the plugins directory
	 * @return object A JParameter object (mosParameters for J1.0)
	 */
	function getParams($pluginName, $type = 'content')
	{
	
		if (JCOMMENTS_JVERSION == '1.5') {
 			$plugin	= & JPluginHelper::getPlugin($type, $pluginName);
		 	$pluginParams = new JParameter($plugin->params);
		} else {
			static $mambotParams = array();
			$paramKey = $type . '_' . $pluginName;

			if (!isset($mambotParams[$paramKey])) {
				$dbo = & JCommentsFactory::getDBO();
				$dbo->setQuery("SELECT params FROM #__mambots WHERE element = '$pluginName' AND folder = '$type'");
				$mambotParams[$paramKey] = $dbo->loadResult();
			}

			$data = $mambotParams[$paramKey];
			$pluginParams = new mosParameters($data);
		}
		return $pluginParams;
	}
}
?>