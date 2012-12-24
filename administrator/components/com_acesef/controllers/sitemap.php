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
class AcesefControllerSitemap extends AcesefController {

	// Main constructer
	function __construct() 	{
		parent::__construct('sitemap');
	}
	
	// Apply changes
	function apply() {
		if(strlen($this->AcesefConfig->download_id) != 32){
			JError::raiseWarning(500, "Invalid Download-ID, please enter your Download-ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Save
		$this->_model->apply();
		
		// Return
		parent::route(JText::_('ACESEF_SITEMAP_SAVED'));
	}
	
	function generateItems() {
		if(strlen($this->AcesefConfig->download_id) != 32){
			JError::raiseWarning(500, "Invalid Download-ID, please enter your Download-ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
	
		// Action
		if ($this->_model->generateItems()) {
			$msg = JText::_('ACESEF_SITEMAP_ITEMS_GENERATED_OK');
		} else {
			$msg = JText::_('ACESEF_SITEMAP_ITEMS_GENERATED_NO');
		}
		
		// Return
		parent::route($msg);
	}
	
	// Generate XML
	function generateXML() {
		if(strlen($this->AcesefConfig->download_id) != 32){
			JError::raiseWarning(500, "Invalid Download-ID, please enter your Download-ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		$msg = AcesefSitemap::generateXML();
		
		// Return
		if($msg == ""){
			parent::route(JText::_('ACESEF_SITEMAP_GENERATED_OK'));
		} elseif($msg == "empty"){
			parent::route();
			JError::raiseWarning('100', JText::sprintf('ACESEF_SITEMAP_GENERATED_EMPTY'));
		} else {
			parent::route();
			JError::raiseWarning('100', JText::sprintf($msg));
		}
	}
	
	function cache() {
		if(strlen($this->AcesefConfig->download_id) != 32){
			JError::raiseWarning(500, "Invalid Download-ID, please enter your Download-ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
	
		// Action
		parent::updateCache($this->_context, 'url_sef', '*', 1, $this->_model);
		
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
		parent::updateCache($this->_context, 'url_sef', '*', 0, $this->_model);
		
		// Return
		parent::route();
	}
	
	function setParent() {
		if(strlen($this->AcesefConfig->download_id) != 32){
			JError::raiseWarning(500, "Invalid Download-ID, please enter your Download-ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		$parent = JRequest::getCmd('newparent', null, 'post');
		
		// Action
		parent::updateField($this->_context, 'sparent', $parent, $this->_model);
		
		// Return
		parent::route();
    }
	
	function setDate() {
		if(strlen($this->AcesefConfig->download_id) != 32){
			JError::raiseWarning(500, "Invalid Download-ID, please enter your Download-ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		$date = JRequest::getCmd('newdate', null, 'post');
		
		// Action
		parent::updateField($this->_context, 'sdate', $date, $this->_model);
		
		// Return
		parent::route();
    }
	
	function setFrequency() {
		if(strlen($this->AcesefConfig->download_id) != 32){
			JError::raiseWarning(500, "Invalid Download-ID, please enter your Download-ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		$frequency = JRequest::getCmd('newfrequency', null, 'post');
		
		// Action
		parent::updateField($this->_context, 'frequency', $frequency, $this->_model);
		
		// Return
		parent::route();
    }
	
	function setPriority() {
		if(strlen($this->AcesefConfig->download_id) != 32){
			JError::raiseWarning(500, "Invalid Download-ID, please enter your Download-ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		$priority = JRequest::getCmd('newpriority', null, 'post');
		
		// Action
		parent::updateField($this->_context, 'priority', $priority, $this->_model);
		
		// Return
		parent::route();
    }
	
	// Ping Google
	function pingGoogle() {
		if(strlen($this->AcesefConfig->download_id) != 32){
			JError::raiseWarning(500, "Invalid Download-ID, please enter your Download-ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		$msg = AcesefSitemap::pingGoogle();
		if($msg == ""){
			parent::route(JText::_('ACESEF_SITEMAP_PINGED_OK'));
		} else {
			parent::route();
			JError::raiseWarning('100', JText::sprintf('ACESEF_SITEMAP_PINGED_NO'." ".$msg));
		}
	}
	
	// Ping Yahoo
	function pingYahoo() {
		if(strlen($this->AcesefConfig->download_id) != 32){
			JError::raiseWarning(500, "Invalid Download-ID, please enter your Download-ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		$msg = AcesefSitemap::pingYahoo();
		if($msg == ""){
			parent::route(JText::_('ACESEF_SITEMAP_PINGED_OK'));
		} else {
			parent::route();
			JError::raiseWarning('100', JText::sprintf('ACESEF_SITEMAP_PINGED_NO'." ".$msg));
		}
	}
	
	// Ping Bing
	function pingBing() {
		if(strlen($this->AcesefConfig->download_id) != 32){
			JError::raiseWarning(500, "Invalid Download-ID, please enter your Download-ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		$msg = AcesefSitemap::pingBing();
		if($msg == ""){
			parent::route(JText::_('ACESEF_SITEMAP_PINGED_OK'));
		} else {
			parent::route();
			JError::raiseWarning('100', JText::sprintf('ACESEF_SITEMAP_PINGED_NO'." ".$msg));
		}
	}
	
	// Ping Services
	function pingServices() {
		if(strlen($this->AcesefConfig->download_id) != 32){
			JError::raiseWarning(500, "Invalid Download-ID, please enter your Download-ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		$services = explode(', ', $this->AcesefConfig->sm_ping_services);
		foreach ($services as $service) {
			$msg = implode(" | ", AcesefSitemap::pingServices($service));
			JError::raiseNotice('100', $msg);
		}
		// Return
		parent::route();
	}
	
	// Save parent field
	function saveParent() {
		if(strlen($this->AcesefConfig->download_id) != 32){
			JError::raiseWarning(500, "Invalid Download-ID, please enter your Download-ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Save
		$this->_model->saveParent();
		
		// Return
		parent::route(JText::_('ACESEF_SITEMAP_PARENT_SAVED'));
	}
        
	// Save order field
	function saveOrder() {
		if(strlen($this->AcesefConfig->download_id) != 32){
			JError::raiseWarning(500, "Invalid Download-ID, please enter your Download-ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Save
		$this->_model->saveOrder();
		
		// Return
		parent::route(JText::_('ACESEF_SITEMAP_ORDER_SAVED'));
	}
	
	// Order up
	function orderUp() {
		if(strlen($this->AcesefConfig->download_id) != 32){
			JError::raiseWarning(500, "Invalid Download-ID, please enter your Download-ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Save
		$this->_model->orderItem('-1');
		
		// Return
		parent::route(JText::_('ACESEF_SITEMAP_ORDER_SAVED'));
	}
	
	// Order down
	function orderDown() {
		if(strlen($this->AcesefConfig->download_id) != 32){
			JError::raiseWarning(500, "Invalid Download-ID, please enter your Download-ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Save
		$this->_model->orderItem('+1');
		
		// Return
		parent::route(JText::_('ACESEF_SITEMAP_ORDER_SAVED'));
	}
	
	// Save changes
	function editSave() {
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Get post
		$post = JRequest::get('post');
		
		// Save record
		$table = 'Acesef' . ucfirst($this->_context);
		if (!self::saveRecord($post, $table, $post['id'])) {
			return JError::raiseWarning(500, JText::_('ACESEF_COMMON_RECORD_SAVED_NOT'));
		} else {
			if (!empty($post['meta_title'])) {
				$this->_model->_saveMetaTitle($post['url_sef'], $post['meta_title']);
			}
			
			if ($post['modal'] == '1') {
				// Display message
				JFactory::getApplication()->enqueueMessage(JText::_('ACESEF_COMMON_RECORD_SAVED'));
			} else {
				// Return
				self::route(JText::_('ACESEF_COMMON_RECORD_SAVED'));
			}
		}
	}
	
	// Apply changes
	function editApply() {
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Get post
		$post = JRequest::get('post');
		
		// Save record
		$table = 'Acesef' . ucfirst($this->_context);
		if (!self::saveRecord($post, $table, $post['id'])) {
			return JError::raiseWarning(500, JText::_('ACESEF_COMMON_RECORD_SAVED_NOT'));
		} else {
			if (!empty($post['meta_title'])) {
				$this->_model->_saveMetaTitle($post['url_sef'], $post['meta_title']);
			}
			
			if ($post['modal'] == '1') {
				// Return
				$this->setRedirect('index.php?option='.$this->_option.'&controller='.$this->_context.'&task=edit&cid[]='.$post['id'].'&tmpl=component', JText::_('ACESEF_COMMON_RECORD_SAVED'));
			} else {
				// Return
				$this->setRedirect('index.php?option='.$this->_option.'&controller='.$this->_context.'&task=edit&cid[]='.$post['id'], JText::_('ACESEF_COMMON_RECORD_SAVED'));
			}
		}
	}
}