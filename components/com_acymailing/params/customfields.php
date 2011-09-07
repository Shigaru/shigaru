<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class JElementCustomfields extends JElement
{
	function fetchElement($name, $value, &$node, $control_name)
	{
		JHTML::_('behavior.modal','a.modal');
		$link = 'index.php?option=com_acymailing&amp;tmpl=component&amp;ctrl=chooselist&amp;task=customfields&amp;values='.$value.'&amp;control='.$control_name;
		$text = '<input class="inputbox" id="'.$control_name.$name.'" name="'.$control_name.'['.$name.']" type="text" size="20" value="'.$value.'">';
		$text .= '<a class="modal" id="link'.$control_name.$name.'" title="'.JText::_('EXTRA_FIELDS').'"  href="'.$link.'" rel="{handler: \'iframe\', size: {x: 650, y: 375}}"><button onclick="return false">'.JText::_('Select').'</button></a>';
		return $text;
	}
}