<?php
/**
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://docs.joomla.org/Developing_a_Model-View-Controller_Component_-_Part_1
 * @license    GNU/GPL
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');

/**
 * Hello World Component Controller
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class ShigaruhomeController extends JController
{
	/**
	 * Method to display the view
	 *
	 * @access    public
	 */
	function display()
	{
		parent::display();
	}
	
	/**
	 * Method to get a json object of videos for the select type
	 *
	 * @access    public
	 */
	function getvideolist()
	{
	  require_once(JPATH_SITE.DS.'components'.DS.'com_shigaruhome'.DS.'shigaruhome.class.php');
	  $list_type = Jrequest::getVar( 'list_type', 'liked' );
	  $f = new shigaruHome;
	  $oVideoList = $f->getVideoList($list_type);
	  echo json_encode($oVideoList);
	  exit;
	}

}
