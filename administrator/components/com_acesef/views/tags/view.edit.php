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
class AcesefViewTags extends AcesefView {
	
	// Edit
	function edit($tpl = null) {		
		// Get row
		$model =& $this->getModel();
		$row = $model->getEditData('AcesefTags');
		
		// Toolbar
		JToolBarHelper::title(JText::_('ACESEF_COMMON_TAGS').': '.$row->title, 'acesef');
		JToolBarHelper::custom('editSave', 'save1.png', 'save1.png', JText::_('ACESEF_COMMON_SAVE'), false);
		JToolBarHelper::custom('editApply', 'apply1.png', 'apply1.png', JText::_('ACESEF_COMMON_APPLY'), false);
		JToolBarHelper::custom('editCancel', 'cancel1.png', 'cancel1.png', JText::_('ACESEF_COMMON_CANCEL'), false);
		JToolBarHelper::divider();
		$this->toolbar->appendButton('Popup', 'help1', JText::_('ACESEF_COMMON_HELP'), 'http://www.joomace.net/support/docs/acesef/user-manual/tags?tmpl=component', 650, 500);
		
		// Published list
		$select_published = array();
		$select_published[] = JHTML::_('select.option', $this->AcesefConfig->tags_published, JText::_('Use Global'));
		$select_published[] = JHTML::_('select.option', '1', JText::_('ACESEF_COMMON_YES'));
		$select_published[] = JHTML::_('select.option', '0', JText::_('No'));
   	   	$lists['published'] = JHTML::_('select.genericlist', $select_published, 'published', 'class="inputbox" size="1 "','value', 'text', $row->published);
		
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