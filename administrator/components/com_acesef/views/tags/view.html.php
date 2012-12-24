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

	// View URLs
	function view($tpl = null) {
		$toolbar = $this->get('ToolbarSelections');
		
		// Toolbar
		JToolBarHelper::title(JText::_('ACESEF_COMMON_TAGS' ), 'acesef');
		$this->toolbar->appendButton('Popup', 'new1', JText::_('ACESEF_COMMON_NEW'), 'index.php?option=com_acesef&controller=tags&task=add&tmpl=component', 600, 350);
		JToolBarHelper::custom('edit', 'edit1.png', 'edit1.png', JText::_('ACESEF_COMMON_EDIT'), true);
		JToolBarHelper::divider();
		JToolBarHelper::custom('generateTags', 'generatetags.png', 'generatetags.png', JText::_('ACESEF_TOOLBAR_GENERATE_TAGS'), false);
		JToolBarHelper::divider();
		JToolBarHelper::spacer();
		$this->toolbar->appendButton('Custom', $toolbar->action);
		$this->toolbar->appendButton('Custom', $toolbar->selection);
		$this->toolbar->appendButton('Custom', $toolbar->button);
		JToolBarHelper::divider();
		$this->toolbar->appendButton('Popup', 'cache', JText::_('ACESEF_CACHE_CLEAN'), 'index.php?option=com_acesef&amp;controller=purgeupdate&amp;task=cache&amp;tmpl=component', 300, 320);
		JToolBarHelper::divider();
		$this->toolbar->appendButton('Popup', 'help1', JText::_('ACESEF_COMMON_HELP'), 'http://www.joomace.net/support/docs/acesef/user-manual/tags?tmpl=component', 650, 500);
		
		// Get behaviors
		JHTML::_('behavior.modal', 'a.modal', array('onClose'=>'\function(){location.reload(true);}'));
		
		// Footer colspan
		$colspan = 5;
		if ($this->AcesefConfig->ui_tags_published == 1) {
			$colspan = $colspan + 1;
		}
		if ($this->AcesefConfig->ui_tags_ordering == 1) {
			$colspan = $colspan + 1;
		}
		if ($this->AcesefConfig->ui_tags_cached == 1) {
			$colspan = $colspan + 1;
			$this->assignRef('cache', $this->get('Cache'));
		}
		if ($this->AcesefConfig->ui_tags_hits == 1) {
			$colspan = $colspan + 1;
		}
		if ($this->AcesefConfig->ui_tags_id == 1) {
			$colspan = $colspan + 1;
		}
		
		$lists = $this->get('Lists');
		$ordering = ($lists['order'] == 'ordering');
		
		$items = $this->get('Items');
		
		// Get data from the model
		$this->assignRef('items',		$items);
		$this->assignRef('pagination',	$this->get('Pagination'));
		$this->assignRef('counts',		self::getCounts($items));
		$this->assignRef('lists',		$lists);
		$this->assignRef('ordering',	$ordering);
		$this->assignRef('colspan',		$colspan);

		parent::display($tpl);
	}
	
	function getCounts($tags) {
		$counts = array();
		
		if (!empty($tags)) {
			foreach ($tags as $tag) {
				if ($tag->title != '') {
					$counts[$tag->id] = self::_getURLs($tag->title);
				}
			}
		}
		
		return $counts;
	}
	
	function _getURLs($tag) {
		$where = self::_getWhere($tag);
    	$rows = AceDatabase::loadResult("SELECT COUNT(u.id) FROM #__acesef_urls AS u, #__acesef_metadata AS m {$where}");
		
    	return $rows;
	}
	
	function _getWhere($tag) {
		$db = JFactory::getDBO();
		
		$where = array();
		$where[] = "m.url_sef = u.url_sef";
		$where[] = "m.published = 1";
		$where[] = "m.title != ''";
		$where[] = "m.keywords != ''";
		$where[] = "u.params LIKE '%tags=1%'";
		$where[] = "u.params LIKE '%published=1%'";
		$where[] = "u.params LIKE '%trashed=0%'";
		
		$components = AcesefFactory::getConfig()->tags_components;
		if (is_array($components) && !empty($components)) {
			$com = "(";
			foreach ($components as $component) {
				$com .= "u.url_real LIKE '%option={$component}%' OR ";
			}
			$com = rtrim($com, ' OR ');
			$com .= ")";
			$where[] = $com;
		}
		
		$tag1 = $db->Quote($db->getEscaped($tag, true).",%", false);
		$tag2 = $db->Quote("%, ".$db->getEscaped($tag, true).",%", false);
		$tag3 = $db->Quote("%, ".$db->getEscaped($tag, true), false);
		$where[] = "(m.keywords LIKE {$tag1} OR m.keywords LIKE {$tag2} OR m.keywords LIKE {$tag3})";
		
		$where = " WHERE " . implode(" AND ", $where);
		
		return $where;
	}
}
?>