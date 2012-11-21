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

	// View URLs
	function view($tpl = null) {
		$toolbar = $this->get('ToolbarSelections');
		
		// Toolbar
		JToolBarHelper::title(JText::_('ACESEF_COMMON_ILINKS' ), 'acesef');
		$this->toolbar->appendButton('Popup', 'new1', JText::_('ACESEF_COMMON_NEW'), 'index.php?option=com_acesef&controller=ilinks&task=add&tmpl=component', 600, 350);
		JToolBarHelper::custom('edit', 'edit1.png', 'edit1.png', JText::_('ACESEF_COMMON_EDIT'), true);
		JToolBarHelper::divider();
		JToolBarHelper::spacer();
		$this->toolbar->appendButton('Custom', $toolbar->action);
		$this->toolbar->appendButton('Custom', $toolbar->selection);
		$this->toolbar->appendButton('Custom', $toolbar->button);
		JToolBarHelper::divider();
		$this->toolbar->appendButton('Popup', 'cache', JText::_('ACESEF_CACHE_CLEAN'), 'index.php?option=com_acesef&amp;controller=purgeupdate&amp;task=cache&amp;tmpl=component', 300, 320);
		JToolBarHelper::divider();
		$this->toolbar->appendButton('Popup', 'help1', JText::_('ACESEF_COMMON_HELP'), 'http://www.joomace.net/support/docs/acesef/user-manual/internal-links?tmpl=component', 650, 500);
		
		// Get behaviors
		JHTML::_('behavior.modal', 'a.modal', array('onClose'=>'\function(){location.reload(true);}'));
		
		// Footer colspan
		$colspan = 5;
		if ($this->AcesefConfig->ui_ilinks_published == 1) {
			$colspan = $colspan + 1;
		}
		if ($this->AcesefConfig->ui_ilinks_nofollow == 1) {
			$colspan = $colspan + 1;
		}
		if ($this->AcesefConfig->ui_ilinks_blank == 1) {
			$colspan = $colspan + 1;
		}
		if ($this->AcesefConfig->ui_ilinks_limit == 1) {
			$colspan = $colspan + 1;
		}
		if ($this->AcesefConfig->ui_ilinks_cached == 1) {
			$colspan = $colspan + 1;
			$this->assignRef('cache', $this->get('Cache'));
		}
		if ($this->AcesefConfig->ui_ilinks_id == 1) {
			$colspan = $colspan + 1;
		}
		
		// Get data from the model
		$this->assignRef('items',		$this->get('Items'));
		$this->assignRef('pagination',	$this->get('Pagination'));
		$this->assignRef('lists',		$this->get('Lists'));
		$this->assignRef('colspan',		$colspan);

		parent::display($tpl);
	}
}
?>