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

// Model Class
class AcesefModelBookmarks extends AcesefModel {
	
	// Main constructer
	function __construct() {
		parent::__construct('bookmarks');
		
		$this->_getUserStates();
		$this->_buildViewQuery();
	}
	
	function _getUserStates() {
		$this->filter_order		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.filter_order',		'filter_order',		'name');
		$this->filter_order_Dir	= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.filter_order_Dir',	'filter_order_Dir',	'ASC');
        $this->search_name		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.search_name', 		'search_name', 		'');
		$this->filter_type		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.filter_type', 		'filter_type', 		'-1');
		$this->search_ph		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.search_ph', 		'search_ph', 		'');
		$this->filter_published	= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.filter_published',	'filter_published',	'-1');
		$this->search_id		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.search_id', 		'search_id', 		'');
		$this->search_name		= JString::strtolower($this->search_name);
		$this->search_ph		= JString::strtolower($this->search_ph);
		$this->search_id		= JString::strtolower($this->search_id);
	}
	
	function getToolbarSelections() {
		$toolbar = new stdClass();
		
        // Actions
        $act[] = JHTML::_('select.option', 'delete', JText::_('ACESEF_COMMON_DELETE'));
		$act[] = JHTML::_('select.option', 'sep', '---');
		if ($this->AcesefConfig->ui_bookmarks_published == 1) {
	        $act[] = JHTML::_('select.option', 'publish', JText::_('ACESEF_COMMON_PUBLISH'));
	        $act[] = JHTML::_('select.option', 'unpublish', JText::_('ACESEF_TOOLBAR_PUBLISH_UN'));
			$act[] = JHTML::_('select.option', 'sep', '---');
		}
        $act[] = JHTML::_('select.option', 'backup', JText::_('ACESEF_TOOLBAR_BACKUP'));
        $toolbar->action = JHTML::_('select.genericlist', $act, 'bookmarks_action', 'class="inputbox" size="1"');
		
		// Selections
        $sel[] = JHTML::_('select.option', 'selected', JText::_('ACESEF_TOOLBAR_SELECTED'));
        $sel[] = JHTML::_('select.option', 'filtered', JText::_('ACESEF_TOOLBAR_FILTERED'));
        $toolbar->selection = JHTML::_('select.genericlist', $sel, 'bookmarks_selection', 'class="inputbox" size="1"');
		
		// Button
        $toolbar->button = '<input type="button" value="'.JText::_('ACESEF_COMMON_APPLY').'" onclick="apply();" />';
		
		return $toolbar;
	}
	
	function getLists() {
		$lists = array();

		// Table ordering
		$lists['order_dir'] = $this->filter_order_Dir;
		$lists['order'] 	= $this->filter_order;
		
		// Reset filters
		$lists['reset_filters'] = '<button onclick="resetFilters();">'. JText::_('ACESEF_TOOLBAR_RESET') .'</button>';
	
		// Filter's action
		$javascript = 'onchange="document.adminForm.submit();"';
		
		// Search name
        $lists['search_name'] = "<input type=\"text\" name=\"search_name\" value=\"{$this->search_name}\" size=\"40\" maxlength=\"255\" onchange=\"document.adminForm.submit();\" />";
		
		// Type Filter
		$type_list[] = JHTML::_('select.option', '-1', JText::_('ACESEF_COMMON_SELECT'));
		$type_list[] = JHTML::_('select.option', 'icon', JText::_('ACESEF_BOOKMARKS_TYPE_1'));
		$type_list[] = JHTML::_('select.option', 'iconset', JText::_('ACESEF_BOOKMARKS_TYPE_2'));
		$type_list[] = JHTML::_('select.option', 'badge', JText::_('ACESEF_BOOKMARKS_TYPE_3'));
   	   	$lists['type_list'] = JHTML::_('select.genericlist', $type_list, 'filter_type', 'class="inputbox" size="1"'.$javascript, 'value', 'text', $this->filter_type);
		
		// Search placeholder
        $lists['search_ph'] = "<input type=\"text\" name=\"search_ph\" value=\"{$this->search_ph}\" size=\"30\" maxlength=\"255\" onchange=\"document.adminForm.submit();\" />";

		// Published Filter
        if ($this->AcesefConfig->ui_bookmarks_published == 1) {
			$published_list[] = JHTML::_('select.option', '-1', JText::_('ACESEF_COMMON_SELECT'));
			$published_list[] = JHTML::_('select.option', '1', JText::_('ACESEF_COMMON_YES'));
			$published_list[] = JHTML::_('select.option', '0', JText::_('No'));
	   	   	$lists['published_list'] = JHTML::_('select.genericlist', $published_list, 'filter_published', 'class="inputbox" size="1"'.$javascript, 'value', 'text', $this->filter_published);
        }
        
		// Search ID
        if ($this->AcesefConfig->ui_bookmarks_id == 1) {
        	$lists['search_id'] = "<input type=\"text\" name=\"search_id\" value=\"{$this->search_id}\" size=\"3\" maxlength=\"10\" onchange=\"document.adminForm.submit();\" style=\"text-align: center\" />";
        }
        
		return $lists;
	}

	// Query filters
	function _buildViewWhere() {
		$where = array();
		
		// Search name
		if ($this->search_name != '') {
			$src = parent::secureQuery($this->search_name, true);
			$where[] = "LOWER(name) LIKE {$src}";
		}
		
		// Type Filter
		if ($this->filter_type != -1) {
			$filter_type = $this->_db->getEscaped($this->filter_type);
			$where[] = "btype = '".$filter_type."'";
		}
		
		// Search placeholder
		if ($this->search_ph != '') {
			$src = parent::secureQuery($this->search_ph, true);
			$where[] = "LOWER(placeholder) LIKE {$src}";
		}
		
		// Published Filter
		if ($this->filter_published != -1) {
			$src = parent::secureQuery($this->filter_published);
			$where[] = "published = {$src}";
		}
		
		// Search ID
		if ($this->search_id != '') {
			$src = parent::secureQuery($this->search_id);
			$where[]= "id = {$src}";
		}
		
		// Execute
		$where = (count($where) ? ' WHERE '. implode(' AND ', $where) : '');
		
		return $where;
	}
}
?>