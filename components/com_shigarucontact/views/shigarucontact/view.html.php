<?php
/**
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://docs.joomla.org/Developing_a_Model-View-Controller_Component_-_Part_1
 * @license    GNU/GPL
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view');

/**
 * HTML View class for the HelloWorld Component
 *
 * @package    HelloWorld
 */

class ShigarucontactViewShigarucontact extends JView
{
	function display($tpl = null)
	{
		$lang = JFactory::getLanguage();	
		$user =& JFactory::getUser();
		$currentlang = substr($lang->getTag(),0,2);
		$islogged = ($user->id)?1:0;
		$editor      =& JFactory::getEditor();
		$this->assignRef( 'description', $editor->display("message",stripslashes($row->description),350,250,40,20,1) );
		$this->assignRef( 'currentlang', $currentlang );
		$this->assignRef( 'islogged', $islogged );
		parent::display($tpl);
	}
}
