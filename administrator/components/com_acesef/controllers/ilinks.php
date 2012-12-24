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
class AcesefControllerIlinks extends AcesefController {
	
	// Main constructer
	function __construct() 	{
		parent::__construct('ilinks');
	}
	
	// Nofollow
	function nofollow() {
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Action
		parent::updateField($this->_context, 'nofollow', 1, $this->_model);
		
		// Return
		parent::route();
		//echo '<img src="components/com_acesef/assets/images/icon-16-nofollow-on.png" border="0" />';
	}
	
	// Unnofollow
	function unnofollow() {
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Action
		parent::updateField($this->_context, 'nofollow', 0, $this->_model);
		
		// Return
		parent::route();
	}
	
	// Blank
	function blank() {
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Action
		parent::updateField($this->_context, 'iblank ', 1, $this->_model);
		
		// Return
		parent::route();
	}
	
	// Unblank
	function unblank() {
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Action
		parent::updateField($this->_context, 'iblank ', 0, $this->_model);
		
		// Return
		parent::route();
	}
	
	function cache() {
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
	
		// Action
		parent::updateCache($this->_context, 'word', '*', 1, $this->_model);
		
		// Return
		parent::route();
	}
	
	function uncache() {
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
	
		// Action
		parent::updateCache($this->_context, 'word', '*', 0, $this->_model);
		
		// Return
		parent::route();
	}
}
?>