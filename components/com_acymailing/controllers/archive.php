<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class ArchiveController extends acymailingController{
	function view(){
		JRequest::setVar( 'layout', 'view'  );
		return parent::display();
	}
}