<?php
/**
* @version		1.5.0
* @package		AceSEF
* @subpackage	AceSEF
* @copyright	2009-2012 JoomAce LLC, www.joomace.net
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
*/

// No permission
defined('_JEXEC') or die('Restricted Access');

// Controller Class
class AcesefControllerTags extends AcesefController {
	
	// Main constructer
	function __construct() 	{
		parent::__construct('tags');
	}

	// Modal
	function modal() {		
		$view = $this->getView(ucfirst($this->_context), 'html');
		$view->setModel($this->_model, true);
		$view->view('modal');
	}
	
	function generateTags() {
		if(strlen($this->AcesefConfig->download_id) != 32){
			JError::raiseWarning(500, "Invalid Download-ID, please enter your Download-ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
	
		// Action
		if ($this->_model->generateTags()) {
			$msg = JText::_('ACESEF_TAGS_GENERATED_OK');
		} else {
			$msg = JText::_('ACESEF_TAGS_GENERATED_NO');
		}
		
		// Return
		parent::route($msg);
	}
	
	function cache() {
		if(strlen($this->AcesefConfig->download_id) != 32){
			JError::raiseWarning(500, "Invalid Download-ID, please enter your Download-ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
	
		// Action
		parent::updateCache($this->_context, 'title', '*', 1, $this->_model);
		
		// Return
		parent::route();
	}
	
	function uncache() {
		if(strlen($this->AcesefConfig->download_id) != 32){
			JError::raiseWarning(500, "Invalid Download-ID, please enter your Download-ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
	
		// Action
		parent::updateCache($this->_context, 'title', '*', 0, $this->_model);
		
		// Return
		parent::route();
	}
	
	function saveOrder() {
		if(strlen($this->AcesefConfig->download_id) != 32){
			JError::raiseWarning(500, "Invalid Download-ID, please enter your Download-ID in Configuration section.");
			return;
		}
		
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		$cid = JRequest::getVar('cid', array(), 'post', 'array');
		JArrayHelper::toInteger($cid);

		if ($this->_model->saveOrder($cid)) {
			$msg = JText::_('New ordering saved');
		} else {
			$msg = $this->_model->getError();
		}
		
		// Return
		parent::route($msg);
	}
	
	function orderUp() {
		if(strlen($this->AcesefConfig->download_id) != 32){
			JError::raiseWarning(500, "Invalid Download-ID, please enter your Download-ID in Configuration section.");
			return;
		}
		
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		$cid = JRequest::getVar('cid', array(), 'post', 'array');
		JArrayHelper::toInteger($cid);

		if (isset($cid[0]) && $cid[0]) {
			$id = $cid[0];
		} else {
			parent::route(JText::_('No Items Selected'));
		}

		if ($this->_model->orderItem($id, -1)) {
			$msg = JText::_('Tag moved up');
		} else {
			$msg = $this->_model->getError();
		}
		
		// Return
		parent::route($msg);
	}
	
	function orderDown() {
		if(strlen($this->AcesefConfig->download_id) != 32){
			JError::raiseWarning(500, "Invalid Download-ID, please enter your Download-ID in Configuration section.");
			return;
		}
		
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		$cid = JRequest::getVar('cid', array(), 'post', 'array');
		JArrayHelper::toInteger($cid);

		if (isset($cid[0]) && $cid[0]) {
			$id = $cid[0];
		} else {
			parent::route(JText::_('No Items Selected'));
		}

		if ($this->_model->orderItem($id, 1)) {
			$msg = JText::_('Tag moved down');
		} else {
			$msg = $this->_model->getError();
		}
		
		// Return
		parent::route($msg);
	}
}
?>