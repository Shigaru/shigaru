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
class AcesefViewBookmarks extends AcesefView {
	
	// Edit
	function edit($tpl = null) {
		// Get data from model
		$model =& $this->getModel();
		$row = $model->getEditData('AcesefBookmarks');
		
		// Toolbar
		JToolBarHelper::title(JText::_('ACESEF_COMMON_BOOKMARKS').': '.$row->name, 'acesef');
		JToolBarHelper::custom('editSave', 'save1.png', 'save1.png', JText::_('ACESEF_COMMON_SAVE'), false);
		JToolBarHelper::custom('editApply', 'apply1.png', 'apply1.png', JText::_('ACESEF_COMMON_APPLY'), false);
		JToolBarHelper::custom('editCancel', 'cancel1.png', 'cancel1.png', JText::_('ACESEF_COMMON_CANCEL'), false);
		JToolBarHelper::divider();
		$this->toolbar->appendButton('Popup', 'help1', JText::_('ACESEF_COMMON_HELP'), 'http://www.joomace.net/support/docs/acesef/user-manual/social-bookmarks?tmpl=component', 650, 500);
		
		// Published list
		$select_published = array();
		$select_published[] = JHTML::_('select.option', $this->AcesefConfig->ilinks_published, JText::_('Use Global'));
		$select_published[] = JHTML::_('select.option', '1', JText::_('ACESEF_COMMON_YES'));
		$select_published[] = JHTML::_('select.option', '0', JText::_('No'));
   	   	$lists['published'] = JHTML::_('select.genericlist', $select_published, 'published', 'class="inputbox" size="1 "','value', 'text', $row->published);
		
		// Type list
		$select_type = array();
		$select_type[] = JHTML::_('select.option', $this->AcesefConfig->bookmarks_type, JText::_('Use Global'));
		$select_type[] = JHTML::_('select.option', 'icon', JText::_('ACESEF_BOOKMARKS_TYPE_1'));
		$select_type[] = JHTML::_('select.option', 'iconset', JText::_('ACESEF_BOOKMARKS_TYPE_2'));
		$select_type[] = JHTML::_('select.option', 'badge', JText::_('ACESEF_BOOKMARKS_TYPE_3'));
   	   	$lists['type'] = JHTML::_('select.genericlist', $select_type, 'btype', 'class="inputbox" size="1 "','value', 'text', $row->btype);
		
		// Modify placeholder
		$row->placeholder = str_replace('{acesef ', '', $row->placeholder);
		$row->placeholder = str_replace('}', '', $row->placeholder);
		
		// Assign values
		$this->assignRef('row', 	$row);
		$this->assignRef('lists', 	$lists);

		parent::display($tpl);
	}
}
?>