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

class JElementURLs extends JElement {

	var	$_name = 'URLs';

	function fetchElement($name, $value, &$node, $control_name) {
		$doc 		= &JFactory::getDocument();
		$fieldName	= $control_name.'['.$name.']';

		JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_acesef'.DS.'tables');
		$tag = &JTable::getInstance('AcesefSefUrls', 'Table');
		if ($value)	{
			$tag->loadByID($value);
		}
		else {
			$tag->url_sef = JText::_('Select URL');
		}

		$js = "
		function selectURL(id, url_sef, object) {
			document.getElementById(object + '_id').value = id;
			document.getElementById(object + '_name').value = url_sef;
			document.getElementById('sbox-window').close();
		}";
		$doc->addScriptDeclaration($js);

		$link = 'index.php?option=com_acesef&amp;controller=sefurls&amp;task=url&amp;tmpl=component&amp;id='.$name;

		JHTML::_('behavior.modal', 'a.modal');

		$html = "\n".'<div style="float: left;"><input style="background: #ffffff;" type="text" id="'.$name.'_name" size="45" value="'.htmlspecialchars($tag->url_sef, ENT_QUOTES, 'UTF-8').'" disabled="disabled" /></div>';
		$html .= '<div class="button2-left"><div class="blank"><a class="modal" title="'.JText::_('Select URL').'"  href="'.$link.'" rel="{handler: \'iframe\', size: {x: 900, y: 500}}">'.JText::_('Select URL').'</a></div></div>'."\n";
		$html .= "\n".'<input type="hidden" id="'.$name.'_id" name="'.$fieldName.'" value="'.(int)$value.'" />';

		return $html;
	}
}