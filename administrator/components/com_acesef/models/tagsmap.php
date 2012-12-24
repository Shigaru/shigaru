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
class AcesefModelTagsMap extends AcesefModel {
	
	// Main constructer
	function __construct()	{
		parent::__construct('tagsmap', 'tags_map');
		
		$this->_getUserStates();
		$this->_buildViewQuery();
	}
	
	function getToolbarSelections() {
		$toolbar = new stdClass();
		
        // Actions
		$act[] = JHTML::_('select.option', 'publish', JText::_('ACESEF_COMMON_PUBLISH'));
		$act[] = JHTML::_('select.option', 'unpublish', JText::_('ACESEF_TOOLBAR_PUBLISH_UN'));
        $toolbar->action = JHTML::_('select.genericlist', $act, 'tags_action', 'class="inputbox" size="1"');
		
		// Selections
        $sel[] = JHTML::_('select.option', 'selected', JText::_('ACESEF_TOOLBAR_SELECTED'));
        $sel[] = JHTML::_('select.option', 'filtered', JText::_('ACESEF_TOOLBAR_FILTERED'));
        $toolbar->selection = JHTML::_('select.genericlist', $sel, 'tags_selection', 'class="inputbox" size="1"');
		
		// Button
        $toolbar->button = '<input type="button" value="'.JText::_('ACESEF_COMMON_APPLY').'" onclick="apply();" />';
		
		return $toolbar;
	}
	
	function _getUserStates() {
		$this->filter_order		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.filter_order',		'filter_order',		'u.url_sef');
		$this->filter_order_Dir	= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.filter_order_Dir',	'filter_order_Dir',	'ASC');
		$this->search_url		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.search_url', 		'search_url', 		'');
		$this->search_url		= JString::strtolower($this->search_url);
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
		
		// Search title
        $lists['search_url'] = "<input type=\"text\" name=\"search_url\" value=\"{$this->search_url}\" size=\"50\" maxlength=\"255\" onchange=\"document.adminForm.submit();\" />";
        
		return $lists;
	}
	
	// Publish
	function publish($url_sef) {
		$tag = JRequest::getString('tag', null);
		if (!$tag) {
			return false;
		}
		
		// Delete entry
		AceDatabase::query("DELETE FROM #__acesef_tags_map WHERE tag = '{$tag}' AND url_sef = '{$url_sef}'");
		
		return true;
	}
	
	// Unpublish
	function unpublish($url_sef) {
		$tag = JRequest::getString('tag', null);
		if (!$tag) {
			return false;
		}
		
		// Prevent duplicates
		$return = AceDatabase::loadResult("SELECT url_sef FROM #__acesef_tags_map WHERE tag = '{$tag}' AND url_sef = '{$url_sef}'");
		if ($return) {
			return false;
		}
		
		// Enter entry
		AceDatabase::query("INSERT INTO #__acesef_tags_map (tag, url_sef) VALUES ('{$tag}', '{$url_sef}')");
		
		return true;
	}
	
	function getTotal() {
		if (empty($this->_total)) {			
			$this->_total = AceDatabase::loadResult("SELECT COUNT(u.id) FROM #__acesef_urls AS u, #__acesef_metadata AS m".$this->_buildViewWhere());	
		}
		return $this->_total;
	}
	
	function _buildViewQuery() {
		$where = $this->_buildViewWhere();
		$orderby = " ORDER BY {$this->filter_order} {$this->filter_order_Dir}";
		
		$this->_query = "SELECT u.id, u.url_sef FROM #__acesef_urls AS u, #__acesef_metadata AS m {$where}{$orderby}";
	}
	
	function _buildViewWhere() {
		$uri = JFactory::getURI();
		$where = array();
		
		$where[] = "m.url_sef = u.url_sef";
		$where[] = "m.published = 1";
		$where[] = "m.title != ''";
		$where[] = "m.keywords != ''";
		$where[] = "u.used != 1";
		$where[] = "u.params LIKE '%tags=1%'";
		$where[] = "u.params LIKE '%published=1%'";
		$where[] = "u.params LIKE '%trashed=0%'";
		
		$tag = JRequest::getString('tag', null);
		$tag = trim($tag);
		
		if ($tag != '' && $tag != '0') {			
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
			
			$tag1 = $this->_db->Quote($this->_db->getEscaped($tag, true).",%", false);
			$tag2 = $this->_db->Quote("%, ".$this->_db->getEscaped($tag, true).",%", false);
			$tag3 = $this->_db->Quote("%, ".$this->_db->getEscaped($tag, true), false);
			$where[] = "(m.keywords LIKE {$tag1} OR m.keywords LIKE {$tag2} OR m.keywords LIKE {$tag3})";
		}
		
		// Search ID
		if ($this->search_url != '') {
			$src = parent::secureQuery($this->search_url, true);
			$where[]= "u.url_sef LIKE {$src}";
		}
		
		// Execute
		$where = " WHERE " . implode(" AND ", $where);
		
		return $where;
	}
}
?>