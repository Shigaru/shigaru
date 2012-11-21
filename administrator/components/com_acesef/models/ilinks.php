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
class AcesefModelIlinks extends AcesefModel {
	
	// Main constructer
	function __construct()	{
		parent::__construct('ilinks');
		
		$this->_getUserStates();
		$this->_buildViewQuery();
	}
	
	function _getUserStates() {
		$this->filter_order		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.filter_order',		'filter_order',		'word');
		$this->filter_order_Dir	= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.filter_order_Dir',	'filter_order_Dir',	'ASC');
		$this->search_link		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.search_link', 		'search_link', 		'');
        $this->search_word		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.search_word', 		'search_word', 		'');
		$this->filter_published	= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.filter_published',	'filter_published',	'-1');
		$this->filter_nofollow	= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.filter_nofollow', 	'filter_nofollow', 	'-1');
		$this->filter_blank		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.filter_blank',		'filter_blank',		'-1');
		$this->filter_limit_val	= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.filter_limit_val', 'filter_limit_val', '0');
		$this->search_limit		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.search_limit', 	'search_limit', 	'');
		$this->search_id		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.search_id', 		'search_id', 		'');
		$this->search_link		= JString::strtolower($this->search_link);
		$this->search_word		= JString::strtolower($this->search_word);
		$this->search_limit		= JString::strtolower($this->search_limit);
		$this->search_id		= JString::strtolower($this->search_id);
	}
	
	function getToolbarSelections() {
		$toolbar = new stdClass();
		
        // Actions
        $act[] = JHTML::_('select.option', 'delete', JText::_('ACESEF_COMMON_DELETE'));
		$act[] = JHTML::_('select.option', 'sep', '---');
		if ($this->AcesefConfig->ui_ilinks_published == 1) {
	        $act[] = JHTML::_('select.option', 'publish', JText::_('ACESEF_COMMON_PUBLISH'));
	        $act[] = JHTML::_('select.option', 'unpublish', JText::_('ACESEF_TOOLBAR_PUBLISH_UN'));
			$act[] = JHTML::_('select.option', 'sep', '---');
		}
		if ($this->AcesefConfig->ui_ilinks_nofollow == 1) {
	        $act[] = JHTML::_('select.option', 'nofollow', JText::_('ACESEF_TOOLBAR_NOFOLLOW'));
	        $act[] = JHTML::_('select.option', 'unnofollow', JText::_('ACESEF_TOOLBAR_NOFOLLOW_UN'));
			$act[] = JHTML::_('select.option', 'sep', '---');
		}
		if ($this->AcesefConfig->ui_ilinks_blank == 1) {
	        $act[] = JHTML::_('select.option', 'blank', JText::_('ACESEF_TOOLBAR_NEWWINDOW'));
	        $act[] = JHTML::_('select.option', 'unblank', JText::_('ACESEF_TOOLBAR_NEWWINDOW_UN'));
			$act[] = JHTML::_('select.option', 'sep', '---');
		}
        $act[] = JHTML::_('select.option', 'backup', JText::_('ACESEF_TOOLBAR_BACKUP'));
        $toolbar->action = JHTML::_('select.genericlist', $act, 'ilinks_action', 'class="inputbox" size="1"');
		
		// Selections
        $sel[] = JHTML::_('select.option', 'selected', JText::_('ACESEF_TOOLBAR_SELECTED'));
        $sel[] = JHTML::_('select.option', 'filtered', JText::_('ACESEF_TOOLBAR_FILTERED'));
        $toolbar->selection = JHTML::_('select.genericlist', $sel, 'ilinks_selection', 'class="inputbox" size="1"');
		
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
		
		// Search word
        $lists['search_word'] = "<input type=\"text\" name=\"search_word\" value=\"{$this->search_word}\" size=\"30\" maxlength=\"255\" onchange=\"document.adminForm.submit();\" />";
		
		// Search link
        $lists['search_link'] = "<input type=\"text\" name=\"search_link\" value=\"{$this->search_link}\" size=\"50\" maxlength=\"255\" onchange=\"document.adminForm.submit();\" />";

		// Published Filter
        if ($this->AcesefConfig->ui_ilinks_published == 1) {
			$published_list[] = JHTML::_('select.option', '-1', JText::_('ACESEF_COMMON_SELECT'));
			$published_list[] = JHTML::_('select.option', '1', JText::_('ACESEF_COMMON_YES'));
			$published_list[] = JHTML::_('select.option', '0', JText::_('No'));
	   	   	$lists['published_list'] = JHTML::_('select.genericlist', $published_list, 'filter_published', 'class="inputbox" size="1"'.$javascript, 'value', 'text', $this->filter_published);
        }
        
		// Nofollow Filter
        if ($this->AcesefConfig->ui_ilinks_nofollow == 1) {
			$nofollow_list[] = JHTML::_('select.option', '-1', JText::_('ACESEF_COMMON_SELECT'));
			$nofollow_list[] = JHTML::_('select.option', '1', JText::_('ACESEF_COMMON_YES'));
			$nofollow_list[] = JHTML::_('select.option', '0', JText::_('No'));
	   	   	$lists['nofollow_list'] = JHTML::_('select.genericlist', $nofollow_list, 'filter_nofollow', 'class="inputbox" size="1"'.$javascript, 'value', 'text', $this->filter_nofollow);
        }
        
		// Target _blank Filter
        if ($this->AcesefConfig->ui_ilinks_blank == 1) {
			$blank_list[] = JHTML::_('select.option', '-1', JText::_('ACESEF_COMMON_SELECT'));
			$blank_list[] = JHTML::_('select.option', '1', JText::_('ACESEF_COMMON_YES'));
			$blank_list[] = JHTML::_('select.option', '0', JText::_('No'));
	   	   	$lists['blank_list'] = JHTML::_('select.genericlist', $blank_list, 'filter_blank', 'class="inputbox" size="1"'.$javascript, 'value', 'text', $this->filter_blank);
        }
        
		// Limit value
        if ($this->AcesefConfig->ui_ilinks_limit == 1) {
			$limit_val[] = JHTML::_('select.option', '0', '=');
			$limit_val[] = JHTML::_('select.option', '1', '>');
			$limit_val[] = JHTML::_('select.option', '2', '<');
	   	   	$lists['limit_val'] = JHTML::_('select.genericlist', $limit_val, 'filter_limit_val', 'class="inputbox" size="1"'.$javascript, 'value', 'text', $this->filter_limit_val);
			
	        $lists['search_limit'] = "<input type=\"text\" name=\"search_limit\" value=\"{$this->search_limit}\" size=\"3\" maxlength=\"10\" onchange=\"document.adminForm.submit();\" style=\"text-align: center\" />";
        }
        
		// Search ID
        if ($this->AcesefConfig->ui_ilinks_id == 1) {
        	$lists['search_id'] = "<input type=\"text\" name=\"search_id\" value=\"{$this->search_id}\" size=\"3\" maxlength=\"10\" onchange=\"document.adminForm.submit();\" style=\"text-align: center\" />";
        }
        
		return $lists;
	}
	
	function getCache() {
		$urls = array();
		
		$cache = AcesefFactory::getCache();
		$urls = $cache->load('ilinks');
		
		return $urls;
	}

	// Query filters
	function _buildViewWhere() {
		$where = array();
		
		// Search word
		if ($this->search_word != '') {
			$src = parent::secureQuery($this->search_word, true);
			$where[] = "LOWER(word) LIKE {$src}";
		}
		
		// Search link
		if ($this->search_link != '') {
			$src = parent::secureQuery($this->search_link, true);
			$where[] = "LOWER(link) LIKE {$src}";
		}
		
		// Published Filter
		if ($this->filter_published != -1) {
			$src = parent::secureQuery($this->filter_published);
			$where[] = "published = {$src}";
		}
		
		// Nofollow Filter
		if ($this->filter_nofollow != -1) {
			$src = parent::secureQuery($this->filter_nofollow);
			$where[] = "nofollow = {$src}";
		}
		
		// Blank Filter
		if ($this->filter_blank != -1) {
			$src = parent::secureQuery($this->filter_blank);
			$where[] = "iblank = {$src}";
		}
		
		// Search limit
		if ($this->search_limit != '') {
			$val = parent::secureQuery($this->filter_limit_val);
			$val = ($val == 0) ? '=' : (($val == 1) ? '>' : '<');
			$limit = parent::secureQuery($this->search_limit);
			$where[]= "ilimit {$val} {$limit}";
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