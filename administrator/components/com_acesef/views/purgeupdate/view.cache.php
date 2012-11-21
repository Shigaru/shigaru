<?php
/**
* @version		1.5.0
* @package		AceSEF
* @subpackage	AceSEF
* @copyright	2009-2012 JoomAce LLC, www.joomace.net
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
*/

// No Permission
defined('_JEXEC') or die('Restricted Access');

// View Class
class AcesefViewPurgeUpdate extends AcesefView {

	// Display purge
	function display($tpl = null) {
		// Get data from the model
		$this->assignRef('count', $this->get('CountCache'));
		
		parent::display($tpl);
	}
}