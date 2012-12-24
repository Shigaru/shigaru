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
class AcesefViewSitemap extends AcesefView {

	// Edit URL
	function edit($tpl = null) {
		// Get data from model
		$model =& $this->getModel();
		$row = $model->getEditData('AcesefSitemap');
		
		// Toolbar
		JToolBarHelper::title(JText::_('ACESEF_COMMON_SITEMAP').': '.$row->url_sef, 'acesef');
		JToolBarHelper::custom('editSave', 'save1.png', 'save1.png', JText::_('ACESEF_COMMON_SAVE'), false);
		JToolBarHelper::custom('editApply', 'apply1.png', 'apply1.png', JText::_('ACESEF_COMMON_APPLY'), false);
		JToolBarHelper::custom('editCancel', 'cancel1.png', 'cancel1.png', JText::_('ACESEF_COMMON_CANCEL'), false);
		JToolBarHelper::divider();
		$this->toolbar->appendButton('Popup', 'help1', JText::_('ACESEF_COMMON_HELP'), 'http://www.joomace.net/support/docs/acesef/user-manual/sitemap?tmpl=component', 650, 500);
		
		// Date
		if($row->sdate == '0000-00-00' || $row->sdate == ''){
			$row->sdate = date('Y-m-d');
		}
		
		// Frequency
		if($row->frequency == ''){
			$row->frequency = $this->AcesefConfig->sm_freq;
		}
		
		// Priority
		if($row->priority == ''){
			$row->priority = $this->AcesefConfig->sm_priority;
		}
		
		// Priority
		if($row->sparent == ''){
			$row->sparent = '0';
		}
		
		// Get jQuery
		if ($this->AcesefConfig->jquery_mode == 1) {
			$this->document->addScript('components/com_acesef/assets/js/jquery-1.4.2.min.js');
			$this->document->addScript('components/com_acesef/assets/js/jquery.bgiframe.min.js');
			$this->document->addScript('components/com_acesef/assets/js/jquery.autocomplete.js');
		}
		
		// Assign values
		$this->assignRef('row', $row);
		
		parent::display($tpl);
	}
}