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
class AcesefViewIlinks extends AcesefView {
	
	// Edit
	function edit($tpl = null) {		
		// Get row
		$model =& $this->getModel();
		$row = $model->getEditData('AcesefIlinks');
		
		// Toolbar
		JToolBarHelper::title(JText::_('ACESEF_COMMON_ILINKS').': '.$row->word, 'acesef');
		JToolBarHelper::custom('editSave', 'save1.png', 'save1.png', JText::_('ACESEF_COMMON_SAVE'), false);
		JToolBarHelper::custom('editApply', 'apply1.png', 'apply1.png', JText::_('ACESEF_COMMON_APPLY'), false);
		JToolBarHelper::custom('editCancel', 'cancel1.png', 'cancel1.png', JText::_('ACESEF_COMMON_CANCEL'), false);
		JToolBarHelper::divider();
		$this->toolbar->appendButton('Popup', 'help1', JText::_('ACESEF_COMMON_HELP'), 'http://www.joomace.net/support/docs/acesef/user-manual/internal-links?tmpl=component', 650, 500);
		
		// Published list
		$select_published = array();
		$select_published[] = JHTML::_('select.option', $this->AcesefConfig->ilinks_published, JText::_('Use Global'));
		$select_published[] = JHTML::_('select.option', '1', JText::_('ACESEF_COMMON_YES'));
		$select_published[] = JHTML::_('select.option', '0', JText::_('No'));
   	   	$lists['published'] = JHTML::_('select.genericlist', $select_published, 'published', 'class="inputbox" size="1 "','value', 'text', $row->published);
		
		// Nofollow list
		$select_nofollow = array();
		$select_nofollow[] = JHTML::_('select.option', $this->AcesefConfig->ilinks_nofollow, JText::_('Use Global'));
		$select_nofollow[] = JHTML::_('select.option', '0', JText::_('No'));
		$select_nofollow[] = JHTML::_('select.option', '1', JText::_('ACESEF_COMMON_YES'));
   	   	$lists['nofollow'] = JHTML::_('select.genericlist', $select_nofollow, 'nofollow', 'class="inputbox" size="1 "','value', 'text', $row->nofollow);
		
		// Target_blank list
		$select_blank = array();
		$select_blank[] = JHTML::_('select.option', $this->AcesefConfig->ilinks_blank, JText::_('Use Global'));
		$select_blank[] = JHTML::_('select.option', '0', JText::_('No'));
		$select_blank[] = JHTML::_('select.option', '1', JText::_('ACESEF_COMMON_YES'));
   	   	$lists['blank'] = JHTML::_('select.genericlist', $select_blank, 'iblank', 'class="inputbox" size="1 "','value', 'text', $row->iblank);
		
		if ($row->ilimit == "") {
			$row->ilimit = $this->AcesefConfig->ilinks_limit;
		}
		
		// Get jQuery
		if ($this->AcesefConfig->jquery_mode == 1) {
			$this->document->addScript('components/com_acesef/assets/js/jquery-1.4.2.min.js');
			$this->document->addScript('components/com_acesef/assets/js/jquery.bgiframe.min.js');
			$this->document->addScript('components/com_acesef/assets/js/jquery.autocomplete.js');
		}
		
		// Assign values
		$this->assignRef('row', 	$row);
		$this->assignRef('lists', 	$lists);

		parent::display($tpl);
	}
}
?>