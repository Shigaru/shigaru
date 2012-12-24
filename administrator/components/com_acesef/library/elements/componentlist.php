<?php
/**
* @version		1.5.0
* @package		AceSEF
* @subpackage	AceSEF
* @copyright	2009-2012 JoomAce LLC, www.joomace.net
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
*/

// No Permission
defined('_JEXEC') or die('Restricted Access');

// Load AceSEF library
require_once(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_acesef'.DS.'library'.DS.'database.php');
require_once(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_acesef'.DS.'library'.DS.'utility.php');

class JElementComponentList extends JElement {

	var $_name = 'ComponentList';

	function fetchElement($name, $value, &$node, $control_name) {
		// Base name of the HTML control
		$ctrl = $control_name .'['. $name .']';

		// Construct the various argument calls that are supported
		$attribs = ' ';
		$attribs .= 'size="15"';
		$attribs .= 'class="inputbox"';
		$attribs .= ' multiple="multiple"';
		$ctrl .= '[]';
		
		$filter = "'com_sef', 'com_sh404sef', 'com_joomfish', 'com_config', 'com_media', 'com_installer', 'com_templates', 'com_plugins', 'com_modules', 'com_cpanel', 'com_cache', 'com_messages', 'com_menus', 'com_massmail', 'com_languages', 'com_users'";
		$components = AceDatabase::loadObjectList("SELECT `name`, `option` FROM `#__components` WHERE `parent` = '0' AND `option` != '' AND `option` NOT IN ({$filter}) ORDER BY `name`");
		
		$options = array();
		$options[] = array('option' => 'all', 'name' => JText::_('- All Components -'));
		
		foreach ($node->children() as $option) {
			$options[] = array('id' => $option->attributes('value'), 'name' => $option->data());
		}
		
		foreach ($components as $item){
			$options[] = array('option' => $item->option, 'name' => $item->name);
		}
		
		return JHTML::_('select.genericlist', $options, $ctrl, $attribs, 'option', 'name', $value, $control_name.$name);
	}
}