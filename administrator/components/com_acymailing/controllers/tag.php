<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class TagController extends acymailingController{
	function __construct($config = array())
	{
		parent::__construct($config);
		JHTML::_('behavior.tooltip');
		$this->registerDefaultTask('tag');
	}
	function tag(){
		JRequest::setVar( 'layout', 'tag'  );
		return parent::display();
	}
}