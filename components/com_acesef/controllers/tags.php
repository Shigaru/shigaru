<?php
/**
* @version		1.5.0
* @package		AceSEF
* @subpackage	AceSEF
* @copyright	2009-2012 JoomAce LLC, www.joomace.net
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
*/

//No Permision
defined( '_JEXEC' ) or die( 'Restricted access' );

// Imports
jimport('joomla.application.component.controller');

class AcesefControllerTags extends JController {

	function display() {
		$model =& $this->getModel('Tags');
		
		$view = $this->getView('Tags', 'html');	
		$view->setModel($model, true);	
		$view->display();		
	}
}