<?php

/* Community Builder field insert button plugin for Joomla 1.5 - Version 1.0
----------------------------------------------------------------------------
Copyright (C) 2009 Joomduck. All rights reserved.
Website: www.joomduck.com
E-mail: support@joomduck.com
Developer: Den KD
Created: February 2009
License: Commercial
This is copyrighted commercial software - you may NOT redistribute this file or any of its part! */
 

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

class plgButtonCbFieldInsert extends JPlugin
{
	function plgButtonCbFieldInsert(& $subject, $config)
	{
		parent::__construct($subject, $config);
	}

	function onDisplay($name)
	{
		global $mainframe;

		$doc = & JFactory::getDocument();
		$template = $mainframe->getTemplate();
		
		
			$_css = "
			.cbfieldinsert {
				background: transparent url(../plugins/editors-xtd/cbfieldinsert/button.png) no-repeat scroll 100% 0pt;
			}
			.cbfieldinsert:hover {
				background: transparent url(../plugins/editors-xtd/cbfieldinsert/button_hover.png) no-repeat scroll 100% 0pt;
			}
			";

		$doc->addStyleDeclaration( $_css );

		$link = 'index.php?option=com_cbprofilepro&amp;task=ins_cbfield&amp;tmpl=component&amp;e_name='.$name;

		JHTML::_('behavior.modal');

		$button = new JObject();
		$button->set('modal', true);
		$button->set('link', $link);
		$button->set('text', JText::_('CB Field Insert'));
		$button->set('name', 'cbfieldinsert');
		$button->set('options', "{handler: 'iframe', size: {x: 500, y: 500}}");

		return $button;
	}
}