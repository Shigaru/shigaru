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
 * HTML View class for the  Component
 *
 * @package    
 */

class ShigarututorViewShigarututor extends JView
{
	function display($tpl = null)
	{
		require_once(JPATH_SITE.DS.'components'.DS.'com_shigarututor'.DS.'shigarututor.class.php');
		$f = new shigarututorTools;
		$oActivity = $f->getRecentChannelActivity();
		$greeting = "Shigaru Youtube Channel";
		$this->assignRef( 'activity', $oActivity );
		$this->assignRef( 'greeting', $greeting );

		parent::display($tpl);
	}
}
