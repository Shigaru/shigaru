<?php
/**
* @version		1.5.0
* @package		AceSEF
* @subpackage	AceSEF
* @copyright	2009-2012 JoomAce LLC, www.joomace.net
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
*/

//No Permision
defined('_JEXEC') or die('Restricted access');

// Imports
jimport('joomla.application.component.model');

class AcesefModelTags extends JModel {
	
	protected $_total = null;
	protected $_query = null;
 	protected $_pagination = null;
	
	function __construct(){
        parent::__construct();
		
		$this->_buildViewQuery();
		
		$AcesefConfig = AcesefFactory::getConfig();
        $mainframe =& JFactory::getApplication();
 
        // Get pagination request variables
        $limit = $mainframe->getUserStateFromRequest('limit', 'limit', $AcesefConfig->tags_limit, 'int');
        $limitstart = JRequest::getVar('limitstart', 0, '', 'int');
 
        // Limit has been changed, adjust it
		$limitstart = ($limit != 0 ? (floor($limitstart / $limit) * $limit) : 0);
 
        $this->setState('limit', $limit);
        $this->setState('limitstart', $limitstart);
	}
	
	function getData() {
		$tag = AcesefUtility::cleanText(trim(JRequest::getString('tag', null)));

		$data = AceDatabase::loadObject("SELECT description FROM #__acesef_tags WHERE published = 1 AND title = '{$tag}'");
		
		return $data;
	}
	
	function getItems() {
		if (empty($this->_data)) {
            $this->_data = $this->_getList($this->_query, $this->getState('limitstart'), $this->getState('limit')); 
		}
		
        return $this->_data;
	}
	
	function _getTagsMap() {
		$map = AceDatabase::loadObjectList("SELECT tag, url_sef FROM #__acesef_tags_map", "tag");
		
		return $map;
	}
	
	function getTotal() {
		if (empty($this->_total)) {
			$this->_total = AceDatabase::loadResult("SELECT COUNT(u.id) FROM #__acesef_metadata AS m, #__acesef_urls AS u".$this->_buildViewWhere());	
		}
		return $this->_total;
	}
	
	function getPagination(){
        if (empty($this->_pagination)) {
            jimport('joomla.html.pagination');
            $this->_pagination = new JPagination($this->getTotal(), $this->getState('limitstart'), $this->getState('limit'));
        }
        return $this->_pagination;
	}
	
	function _buildViewQuery() {
		$where = $this->_buildViewWhere();
		
		$this->_query = "SELECT m.id, m.url_sef, m.title, m.description, m.keywords, u.url_real FROM #__acesef_metadata AS m, #__acesef_urls AS u {$where} ORDER BY m.title";
	}
	
	function _buildViewWhere() {
		$uri = JFactory::getURI();
		$where = array();
		
		$where[] = "m.url_sef = u.url_sef";
		$where[] = "m.published = 1";
		$where[] = "m.title != ''";
		$where[] = "m.keywords != ''";
		$where[] = "u.params LIKE '%published=1%'";
		$where[] = "u.params LIKE '%tags=1%'";
		$where[] = "u.params LIKE '%trashed=0%'";
		$where[] = "u.params LIKE '%notfound=0%'";
		
		$tag = trim(JRequest::getString('tag', null));
		
		if ($tag != '' && $tag != '0') {
			$tag = AcesefUtility::cleanText($tag);
			
			if (is_null($uri->getVar('limitstart'))) {
				self::updateHits($tag);
			}
			
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
			
			$ids = AceDatabase::loadResultArray("SELECT u.id FROM #__acesef_urls AS u, #__acesef_tags_map AS tm WHERE u.url_sef = tm.url_sef AND tm.tag = '{$tag}'");
			if (count($ids) > 0) {
				$where[] = "u.id NOT IN (" . implode(", ", $ids) . ")";
			}
		}
		
		// Execute
		$where = " WHERE " . implode(" AND ", $where);
		
		return $where;
	}
	
	function updateHits($tag) {
		AceDatabase::query("UPDATE #__acesef_tags SET hits = (hits+1) WHERE title = '{$tag}'");
	}
}