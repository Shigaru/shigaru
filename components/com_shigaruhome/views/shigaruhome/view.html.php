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

class ShigaruhomeViewShigaruhome extends JView
{
	function display($tpl = null)
	{
		require_once(JPATH_SITE.DS.'components'.DS.'com_shigaruhome'.DS.'shigaruhome.class.php');
		$f = new shigaruHome;
		$oTotalVideosCount = $f->getTotalVideosCount();
		$oTotalTutosVideosCount = $f->getTotalCategoryVideosCount("1");
		$oTotalTheoryVideosCount = $f->getTotalCategoryVideosCount("2");
		$oTotalWatchmeVideosCount = $f->getTotalCategoryVideosCount("3");
		$this->assignRef( 'oTotalVideosCount', $oTotalVideosCount );
		$this->assignRef( 'oTotalTutosVideosCount', $oTotalTutosVideosCount );
		$this->assignRef( 'oTotalTheoryVideosCount', $oTotalTheoryVideosCount );
		$this->assignRef( 'oTotalWatchmeVideosCount', $oTotalWatchmeVideosCount );

		parent::display($tpl);
	}
}
