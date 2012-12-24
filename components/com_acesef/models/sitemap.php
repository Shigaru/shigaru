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

class AcesefModelSitemap extends JModel {
	
	private $params;
	private $_query = null;
	private $_total = null;
 	private $_pagination = null;
	
	function __construct(){
        parent::__construct();
 
        $mainframe =& JFactory::getApplication();
		$this->params = $mainframe->getParams();
		
		$this->AcesefConfig = AcesefFactory::getConfig();
		
		$this->_buildViewQuery();
 
        // Get pagination request variables
        $limit = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $this->params->get('display_num', $mainframe->getCfg('list_limit')), 'int');
        $limitstart = JRequest::getVar('limitstart', 0, '', 'int');
 
        // In case limit has been changed, adjust it
        $limitstart = ($limit != 0 ? (floor($limitstart / $limit) * $limit) : 0);
 
        $this->setState('limit', $limit);
        $this->setState('limitstart', $limitstart);
	}

	function getItems() {
		$items = array();
		
		$rows = $this->_getList($this->_query, $this->getState('limitstart'), $this->getState('limit'));
		
		if (empty($rows)) {
			return $items;
		}
		
		$children = array();
		foreach ($rows as $v) {
			$pt = $v->sparent;
			$list = @$children[$pt] ? $children[$pt] : array();
			array_push($list, $v);
			$children[$pt] = $list;
		}
		
		self::_getTitles($rows);
		
		$list = self::_buildTree(intval($rows[0]->sparent), '', array(), $children);
		
		foreach ($list as $id => $item) {
			$items[] = $item;
		}
		
        return $items;
	}

	function _buildTree($id, $indent, $list, &$children) {		
		if (@$children[$id]) {
			foreach ($children[$id] as $ch) {
				$id = $ch->id;

				if ($this->AcesefConfig->sm_dot_tree == 1) {
					$pre = '<strong>&middot;</strong>&nbsp;';
				}
				else {
					$pre = '<sup>|_</sup>&nbsp;';
				}
				
				$spacer = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				
				$ch->title = $ch->url_sef;
				if (isset($this->_titles[$ch->url_sef]) && (!empty($this->_titles[$ch->url_sef]->title) || !empty($this->_titles[$ch->url_sef]->meta_title))) {
					if (!empty($this->_titles[$ch->url_sef]->title)) {
						$title = $this->_titles[$ch->url_sef]->title;
					}
					else {
						$title = $this->_titles[$ch->url_sef]->meta_title;
					}
					
					$ch->title = AcesefUtility::replaceSpecialChars($title, true);
				}
				
				if ($ch->sparent == 0) {
					$txt = '<a href="'.$ch->url_sef.'">'.$ch->title.'</a>';
				} else {
					$txt = $pre . '<a href="'.$ch->url_sef.'">'.$ch->title.'</a>';
				}
				
				$list[$id] = $ch;
				$list[$id]->title = "{$indent}{$txt}";
				$list[$id]->children = count(@$children[$id]);
				$list = self::_buildTree($id, $indent . $spacer, $list, $children);
			}
		}
		
		return $list;
	}
	
	function _getTitles($rows) {
		if (empty($this->_titles)) {
			$items = '';
			foreach ($rows as $row) {
				$items .= $row->id.', ';
			}
			$items = rtrim($items, ', ');
			
			$select = 's.title, s.url_sef, m.title AS meta_title';
			$tables = '#__acesef_sitemap AS s LEFT JOIN #__acesef_metadata AS m ON s.url_sef = m.url_sef';
			
    		$this->_titles = AceDatabase::loadObjectList("SELECT {$select} FROM {$tables} WHERE s.id IN ({$items})", 'url_sef');
		}
		
		return $this->_titles;
	}
	
	function getPagination(){
        if (empty($this->_pagination)) {
            jimport('joomla.html.pagination');
            $this->_pagination = new JPagination($this->getTotal(), $this->getState('limitstart'), $this->getState('limit'));
        }
		
        return $this->_pagination;
	}
	
	function getTotal() {
		if (empty($this->_total)) {
			$this->_total = AceDatabase::loadResult("SELECT COUNT(*) FROM #__acesef_sitemap ".$this->_buildViewWhere());		
		}
		
		return $this->_total;
	}

	function _buildViewQuery() {
		$where = $this->_buildViewWhere();
		$this->_query = "SELECT * FROM #__acesef_sitemap {$where} ORDER BY sorder, url_sef";
	}
	
	function _buildViewWhere(){
		$components = $this->params->get('components', 'all');
		
		if ($components == 'all') {
			return ' WHERE published = 1';
		}
		
		$where = ' WHERE id = 0';
		
		// Get IDs
		if (is_array($components) && !empty($components)) {
			$com = "(";
			foreach ($components as $component) {
				$com .= "u.url_real LIKE '%option={$component}%' OR ";
			}
			$com = rtrim($com, ' OR ');
			$com .= ")";
			
			$ids = AceDatabase::loadResultArray("SELECT s.id FROM #__acesef_sitemap AS s, #__acesef_urls AS u WHERE s.url_sef = u.url_sef AND {$com} AND s.published = '1'");
		}
		else {
			$ids = AceDatabase::loadResultArray("SELECT s.id FROM #__acesef_sitemap AS s, #__acesef_urls AS u WHERE s.url_sef = u.url_sef AND u.url_real LIKE '%option={$components}%' AND s.published = '1'");
		}
		
		if (count($ids) > 0) {
			$where = ' WHERE id IN (' . implode(', ', $ids) . ')';
		}
		
		return $where;
	}
}