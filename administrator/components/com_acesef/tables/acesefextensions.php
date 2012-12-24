<?php
/**
* @version		1.5.0
* @package		AceSEF
* @subpackage	AceSEF
* @copyright	2009-2012 JoomAce LLC, www.joomace.net
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
*/

// No Permission
defined('JPATH_BASE') or die('Restricted Access');

class TableAcesefExtensions extends JTable {

	var $id 	 			= null;
	var $name				= null;
	var $extension			= null;
	var $params				= null;

	function __construct(& $db) {
		parent::__construct('#__acesef_extensions', 'id', $db);
	}
	
	function bind($array) {
		if (is_array($array['params'])) {
			$registry = new JRegistry();
			$registry->loadArray($array['params']);
			$array['params'] = $registry->toString('INI');
		}
		
		return parent::bind($array);
	}
}