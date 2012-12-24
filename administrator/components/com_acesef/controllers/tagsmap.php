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
class AcesefControllerTagsMap extends AcesefController {
	
	// Main constructer
	function __construct() {
		parent::__construct('tagsmap', 'tags_map');
	}
	
	// Publish
	function publish() {
		if(strlen($this->AcesefConfig->download_id) != 32){
			JError::raiseWarning(500, "Invalid Download-ID, please enter your Download-ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Action
		$urls = self::_getURLs();
		if (is_array($urls) && !empty($urls)) {
			foreach($urls as $url) {
				$this->_model->publish($url);
			}
		}
		
		// Return
		$tag = trim(JRequest::getString('tag'));
		$this->setRedirect('index.php?option='.$this->_option.'&controller='.$this->_context.'&task=view&tag='.$tag.'&tmpl=component');
	}
	
	// Unpublish
	function unpublish() {
		if(strlen($this->AcesefConfig->download_id) != 32){
			JError::raiseWarning(500, "Invalid Download-ID, please enter your Download-ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Action
		$urls = self::_getURLs();
		if (is_array($urls) && !empty($urls)) {
			foreach($urls as $url) {
				$this->_model->unpublish($url);
			}
		}
		
		// Return
		$tag = trim(JRequest::getString('tag'));
		$this->setRedirect('index.php?option='.$this->_option.'&controller='.$this->_context.'&task=view&tag='.$tag.'&tmpl=component');
	}
	
	function _getURLs() {
		$where = parent::_getWhere($this->_model, 'u.');
		if (!$urls = AceDatabase::loadResultArray("SELECT u.url_sef FROM #__acesef_urls AS u, #__acesef_metadata AS m {$where}")) {
			return false;
		}
		
		return $urls;
	}
}
?>