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

	// View URLs
	function view($tpl = null) {
		$toolbar = $this->get('ToolbarSelections');
		
		// Toolbar
		JToolBarHelper::title(JText::_('ACESEF_COMMON_SITEMAP' ), 'acesef');
		$this->toolbar->appendButton('Popup', 'new1', JText::_('ACESEF_COMMON_NEW'), 'index.php?option=com_acesef&controller=sitemap&task=add&tmpl=component', 650, 400);
		JToolBarHelper::custom('edit', 'edit1.png', 'edit1.png', JText::_('ACESEF_COMMON_EDIT'), true, true);
		JToolBarHelper::divider();
		JToolBarHelper::custom('apply', 'apply1.png', 'apply1.png', JText::_('ACESEF_COMMON_APPLY'), false);
		JToolBarHelper::custom('generateItems', 'generatesitemap.png', 'generatesitemap.png', JText::_('ACESEF_TOOLBAR_GENERATE_SITEMAP'), false);
		JToolBarHelper::custom('generateXML', 'generatexml.png', 'generatexml.png', JText::_('ACESEF_TOOLBAR_GENERATE') . ' ' . JText::_('XML'), false);
		JToolBarHelper::divider();
		JToolBarHelper::spacer();
		$this->toolbar->appendButton('Custom', $toolbar->action);
		$this->toolbar->appendButton('Custom', $toolbar->newparent . $toolbar->newdate . $toolbar->newpriority . $toolbar->newfrequency);
		$this->toolbar->appendButton('Custom', $toolbar->selection);
		$this->toolbar->appendButton('Custom', $toolbar->button);
		JToolBarHelper::divider();
		$this->toolbar->appendButton('Popup', 'cache', JText::_('ACESEF_CACHE_CLEAN'), 'index.php?option=com_acesef&amp;controller=purgeupdate&amp;task=cache&amp;tmpl=component', 300, 320);
		JToolBarHelper::divider();
		$this->toolbar->appendButton('Popup', 'help1', JText::_('ACESEF_COMMON_HELP'), 'http://www.joomace.net/support/docs/acesef/user-manual/sitemap?tmpl=component', 650, 500);
		
		// Get behaviors
		JHTML::_('behavior.modal', 'a.modal', array('onClose'=>'\function(){location.reload(true);}'));
		
		$items = $this->get('Items');
		
		// Footer colspan
		$colspan = 3;
		if ($this->AcesefConfig->ui_sitemap_title == 1) {
			$colspan = $colspan + 1;
			$this->assignRef('titles', $this->get('Titles'));
		}
		if ($this->AcesefConfig->ui_sitemap_published == 1) {
			$colspan = $colspan + 1;
		}
		if ($this->AcesefConfig->ui_sitemap_id == 1) {
			$colspan = $colspan + 1;
		}
		if ($this->AcesefConfig->ui_sitemap_parent == 1) {
			$colspan = $colspan + 1;
		}
		if ($this->AcesefConfig->ui_sitemap_order == 1) {
			$colspan = $colspan + 1;
		}
		if ($this->AcesefConfig->ui_sitemap_date == 1) {
			$colspan = $colspan + 1;
		}
		if ($this->AcesefConfig->ui_sitemap_frequency == 1) {
			$colspan = $colspan + 1;
		}
		if ($this->AcesefConfig->ui_sitemap_priority == 1) {
			$colspan = $colspan + 1;
		}
		if ($this->AcesefConfig->ui_sitemap_cached == 1) {
			$colspan = $colspan + 1;
			$this->assignRef('cache', $this->get('Cache'));
		}
		
		// Get data from the model
		$this->assignRef('lists',		$this->get('Lists'));
		$this->assignRef('cache',		$this->get('Cache'));
		$this->assignRef('items',		$items);
		$this->assignRef('pagination',	$this->get('Pagination'));
		$this->assignRef('colspan',		$colspan);

		parent::display($tpl);
	}
}
?>