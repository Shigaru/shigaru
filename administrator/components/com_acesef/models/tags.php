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
class AcesefModelTags extends AcesefModel {
	
	// Main constructer
	function __construct()	{
		parent::__construct('tags');
		
		$this->_getUserStates();
		$this->_buildViewQuery();
	}
	
	function generateTags() {
		$where = " WHERE u.url_sef = m.url_sef AND m.published = '1' AND u.params LIKE '%published=1%' AND u.params LIKE '%notfound=0%' AND u.params LIKE '%trashed=0%'";
		$rows = AceDatabase::loadObjectList("SELECT u.url_sef, u.url_real, m.keywords FROM #__acesef_urls AS u, #__acesef_metadata AS m {$where}");
		
		if (!is_array($rows) || empty($rows)) {
			return false;
		}
		
		foreach ($rows as $row) {
			$component = AcesefUtility::getOptionFromRealURL($row->url_real);
			
			$ext_params = AcesefCache::getExtensionParams($component);
			if (!$ext_params) {
				$ext_params = new JParameter('');
			}
			
			AcesefTags::autoTags($row->keywords, $component, $ext_params, $row->url_sef, $row->url_real);
		}
		
    	return true;
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
        $act[] = JHTML::_('select.option', 'backup', JText::_('ACESEF_TOOLBAR_BACKUP'));
        $toolbar->action = JHTML::_('select.genericlist', $act, 'tags_action', 'class="inputbox" size="1"');
		
		// Selections
        $sel[] = JHTML::_('select.option', 'selected', JText::_('ACESEF_TOOLBAR_SELECTED'));
        $sel[] = JHTML::_('select.option', 'filtered', JText::_('ACESEF_TOOLBAR_FILTERED'));
        $toolbar->selection = JHTML::_('select.genericlist', $sel, 'tags_selection', 'class="inputbox" size="1"');
		
		// Button
        $toolbar->button = '<input type="button" value="'.JText::_('ACESEF_COMMON_APPLY').'" onclick="apply();" />';
		
		return $toolbar;
	}
	
	function saveOrder($items) {
		$total		= count($items);
		$row		= AcesefFactory::getTable('AcesefTags');
		$groupings	= array();

		$order = JRequest::getVar('order', array(), 'post', 'array');
		JArrayHelper::toInteger($order);

		// update ordering values
		for($i=0; $i < $total; $i++) {
			$row->load( $items[$i] );
			// track parents
			$groupings[] = $row->parent;
			if ($row->ordering != $order[$i]) {
				$row->ordering = $order[$i];
				if (!$row->store()) {
					$this->setError($row->getError());
					return false;
				}
			}
		}

		// execute updateOrder for each parent group
		$groupings = array_unique($groupings);
		foreach ($groupings as $group){
			$row->reorder('published >=0');
		}

		return true;
	}

	function orderItem($id, $movement) {
		$row = AcesefFactory::getTable('AcesefTags');
		$row->load($id);
		
		if (!$row->move($movement)) {
			$this->setError($row->getError());
			return false;
		}
		
		return true;
	}
	
	function _getUserStates() {
		$this->filter_order		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.filter_order',		'filter_order',		'title');
		$this->filter_order_Dir	= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.filter_order_Dir',	'filter_order_Dir',	'ASC');
		$this->search_title		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.search_title', 	'search_title', 	'');
        $this->search_alias		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.search_alias', 	'search_alias', 	'');
		$this->filter_published	= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.filter_published',	'filter_published',	'-1');
		$this->search_order		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.search_order', 	'search_order', 	'');
		$this->search_hits		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.search_hits', 		'search_hits', 		'');
		$this->search_id		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.search_id', 		'search_id', 		'');
		$this->search_title		= JString::strtolower($this->search_title);
		$this->search_alias		= JString::strtolower($this->search_alias);
		$this->search_order		= JString::strtolower($this->search_order);
		$this->search_hits		= JString::strtolower($this->search_hits);
		$this->search_id		= JString::strtolower($this->search_id);
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
        $lists['search_title'] = "<input type=\"text\" name=\"search_title\" value=\"{$this->search_title}\" size=\"30\" maxlength=\"255\" onchange=\"document.adminForm.submit();\" />";
		
		// Search alias
        $lists['search_alias'] = "<input type=\"text\" name=\"search_alias\" value=\"{$this->search_alias}\" size=\"30\" maxlength=\"255\" onchange=\"document.adminForm.submit();\" />";

		// Published Filter
        if ($this->AcesefConfig->ui_tags_published == 1) {
			$published_list[] = JHTML::_('select.option', '-1', JText::_('ACESEF_COMMON_SELECT'));
			$published_list[] = JHTML::_('select.option', '1', JText::_('ACESEF_COMMON_YES'));
			$published_list[] = JHTML::_('select.option', '0', JText::_('No'));
	   	   	$lists['published_list'] = JHTML::_('select.genericlist', $published_list, 'filter_published', 'class="inputbox" size="1"'.$javascript, 'value', 'text', $this->filter_published);
        }
        
		// Search htis
        if ($this->AcesefConfig->ui_tags_ordering == 1) {
        	$lists['search_order'] = "<input type=\"text\" name=\"search_order\" value=\"{$this->search_order}\" size=\"5\" maxlength=\"10\" onchange=\"document.adminForm.submit();\" style=\"text-align: center\" />";
        }
        
		// Search htis
        if ($this->AcesefConfig->ui_tags_hits == 1) {
        	$lists['search_hits'] = "<input type=\"text\" name=\"search_hits\" value=\"{$this->search_hits}\" size=\"3\" maxlength=\"10\" onchange=\"document.adminForm.submit();\" style=\"text-align: center\" />";
        }
        
		// Search ID
        if ($this->AcesefConfig->ui_tags_id == 1) {
        	$lists['search_id'] = "<input type=\"text\" name=\"search_id\" value=\"{$this->search_id}\" size=\"3\" maxlength=\"10\" onchange=\"document.adminForm.submit();\" style=\"text-align: center\" />";
        }
        
		return $lists;
	}
	
	function getCache() {
		$urls = array();
		
		$cache = AcesefFactory::getCache();
		$urls = $cache->load('tags');
		
		return $urls;
	}

	// Query filters
	function _buildViewWhere() {
		$where = array();
		
		// Search title
		if ($this->search_title != '') {
			$src = parent::secureQuery($this->search_title, true);
			$where[] = "LOWER(title) LIKE {$src}";
		}
		
		// Search alias
		if ($this->search_alias != '') {
			$src = parent::secureQuery($this->search_alias, true);
			$where[] = "LOWER(alias) LIKE {$src}";
		}
		
		// Published Filter
		if ($this->filter_published != '-1') {
			$src = parent::secureQuery($this->filter_published);
			$where[] = "published = {$src}";
		}
		
		// Search ID
		if ($this->search_hits != '') {
			$src = parent::secureQuery($this->search_hits);
			$where[]= "hits = {$src}";
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