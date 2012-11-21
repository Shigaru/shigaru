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
class AcesefControllerBookmarks extends AcesefController {
	
	// Main constructer
	function __construct() 	{
		parent::__construct('bookmarks');
	}
	
	// Save changes
	function editSave() {
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Get post
		$post = JRequest::get('post');
		if (isset($post['placeholder'])) {
			$post['placeholder'] = '{acesef '.$post['placeholder'].'}';
		}
		$post['html'] = JRequest::getVar('html', '', 'post', 'string', JREQUEST_ALLOWRAW);
		
		// Save record
		$table = 'Acesef' . ucfirst($this->_context);
		if (!AcesefController::saveRecord($post, $table, $post['id'])) {
			return JError::raiseWarning(500, JText::_('ACESEF_COMMON_RECORD_SAVED_NOT'));
		} else {
			if ($post['modal'] == '1') {
				// Display message
				JFactory::getApplication()->enqueueMessage(JText::_('ACESEF_COMMON_RECORD_SAVED'));
			} else {
				// Return
				parent::route(JText::_('ACESEF_COMMON_RECORD_SAVED'));
			}
		}
	}
	
	// Apply changes
	function editApply() {
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Get post
		$post = JRequest::get('post');
		if (isset($post['placeholder'])) {
			$post['placeholder'] = '{acesef '.$post['placeholder'].'}';
		}
		$post['html'] = JRequest::getVar('html', '', 'post', 'string', JREQUEST_ALLOWRAW);
		
		// Save record
		$table = 'Acesef' . ucfirst($this->_context);
		if (!AcesefController::saveRecord($post, $table, $post['id'])) {
			return JError::raiseWarning(500, JText::_('ACESEF_COMMON_RECORD_SAVED_NOT'));
		} else {
			if ($post['modal']== '1') {
				// Return
				$this->setRedirect('index.php?option='.$this->_option.'&controller='.$this->_context.'&task=edit&cid[]='.$post['id'].'&tmpl=component', JText::_('ACESEF_COMMON_RECORD_SAVED'));
			} else {
				// Return
				$this->setRedirect('index.php?option='.$this->_option.'&controller='.$this->_context.'&task=edit&cid[]='.$post['id'], JText::_('ACESEF_COMMON_RECORD_SAVED'));
			}
		}
	}
}
?>