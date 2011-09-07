<?php
defined('JPATH_BASE') or die();
class JElementTSGColor extends JElement
{
	var	$_name 			= 'TSGColor';
	function fetchElement($name, $value, &$node, $control_name)
	{
		$document	= &JFactory::getDocument();
		$option 	= JRequest::getCmd('option');
		$document->addScript(JURI::root().'/modules/mod_j_google_adsense/js/jscolor.js');
		$class = ( $node->attributes('class') ? 'class="'.$node->attributes('class').'"' : 'class="color"' );
        $value = htmlspecialchars(html_entity_decode($value, ENT_QUOTES), ENT_QUOTES);
        $background = ' style="background-color: '.$value.'"';
		$html ='<input type="text" name="'.$control_name.'['.$name.']" id="'.$control_name.$name.'" value="#'.$value.'" '.$class.' '.$background.' />';	
		return $html;
	}
}
?>