<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class JElementTermscontent extends JElement
{
	function fetchElement($name, $value, &$node, $control_name)
	{
		JHTML::_('behavior.modal','a.modal');
		$link = 'index.php?option=com_content&amp;task=element&amp;tmpl=component&amp;object=content';
		$text = '<input class="inputbox" id="'.$control_name.'termscontent" name="'.$control_name.'[termscontent]" type="text" size="20" value="'.$value.'">';
		$text .= '<a class="modal" id="termscontent" title="'.JText::_('Select one content which will be displayed for the Terms & Conditions').'"  href="'.$link.'" rel="{handler: \'iframe\', size: {x: 650, y: 375}}"><button onclick="return false">'.JText::_('Select').'</button></a>';
		$js = "function jSelectArticle(id, title, object) {
			document.getElementById('".$control_name."termscontent').value = id;
			document.getElementById('sbox-window').close();
		}";
		$doc =& JFactory::getDocument();
		$doc->addScriptDeclaration($js);
		return $text;
	}
}