<?php
/*
* @package		AceSEF
* @subpackage	AcyMailing
* @copyright	2009-2010 JoomAce LLC, www.joomace.net
* @license		http://www.joomace.net/company/license
*/

// No Permission
defined( '_JEXEC' ) or die( 'Restricted access' );

class AceSEF_com_acymailing extends AcesefExtension {

	function catParam($vars, $real_url) {
        extract($vars);
		
		if (isset($ctrl)) {
            switch($ctrl) {
                case 'archive':					
					if (!empty($listid)) {
						parent::categoryParams($listid, 1, $real_url);
					}
                    break;
            }
        }
	}
	
	function build(&$vars, &$segments, &$do_sef, &$metadata, &$item_limitstart) {
		self::_a_b_c_acesef();
		
        extract($vars);
		
		if (!empty($key)) {
			$do_sef = false;
			return;
		}
		
		if (!empty($listid)) {
			$segments[] = self::_getList(intval($listid));
			unset($vars['listid']);
		}
		
		if (!empty($mailid)) {
			$segments[] = self::_getMail(intval($mailid));
			unset($vars['mailid']);
		}
		
		if (!empty($subid)) {
			$segments[] = self::_getSubscriber(intval($subid));
			unset($vars['subid']);
		}
		
		if (isset($ctrl)){
			switch($ctrl){
				case 'cron':
					$do_sef = false;
					return;
					break;
				case 'archive':
					break;
				case 'user':
					$segments[] = 'Conrol Panel';
					break;
				case 'stats':
					$segments[] = 'Status';
					break;
				case 'url':
					$segments[] = 'URL';
					break;
				default:
					$segments[] = $ctrl;
					break;
			}
			unset($vars['ctrl']);
		}
		
		if (isset($view)) {
			switch($view) {
				case 'user':
					$segments[] = 'User Panel';
					break;
				case 'archive':
					break;
				default:
					$segments[] = $view;
					break;
			}
			unset($vars['view']);
		}
		
		if (isset($task)) {
			switch ($task) {
				case 'view':
					break;
				case 'modify':
					$segments[] = 'Modify';
					break;
				case 'forward':
					$segments[] = 'Forward';
					break;
				case 'unsub':
					$segments[] = 'Unsubscribe';
					break;
				default:
					$segments[] = $task;
					break;
			}
			unset($vars['task']);
		}
		
		if (!empty($urlid)) {
			$segments[] = $urlid;
			unset($vars['urlid']);
		}
		
		if (!empty($sub)) {
			$segments[] = $sub;
			unset($vars['sub']);
		}
		
		$metadata = parent::getMetaData($vars, $item_limitstart);
		
		unset($vars['limit']);
		unset($vars['limitstart']);
	}

    function _getList($id) {
		static $cache = array();
		
		if (!isset($cache[$id])) {
			$joomfish = $this->AcesefConfig->joomfish_trans_url ? ', listid' : '';
			
			$row = AceDatabase::loadRow("SELECT name, description$joomfish FROM #__acymailing_list WHERE listid = {$id}");
			
			$name = (($this->params->get('listid_inc', '1') != '1') ? $id.'-' : '').$row[0];
			
			$cache[$id]['name'] = $name;
			$cache[$id]['meta_title'] = $row[0];
			$cache[$id]['meta_desc'] = $row[1];
		}
		
		$this->meta_title[] = $cache[$id]['meta_title'];
		if (!empty($cache[$id]['meta_desc'])) {
			$this->meta_desc = $cache[$id]['meta_desc'];
		}
		
		return $cache[$id]['name'];
    }

    function _getMail($id) {
		static $cache = array();
		
		if (!isset($cache[$id])) {
			$joomfish = $this->AcesefConfig->joomfish_trans_url ? ', mailid' : '';
			
			$row = AceDatabase::loadRow("SELECT subject, body$joomfish FROM #__acymailing_mail WHERE mailid = {$id}");
			
			$name = (($this->params->get('mailid_inc', '1') != '1') ? $id.'-' : '').$row[0];
			
			$cache[$id]['name'] = $name;
			$cache[$id]['meta_title'] = $row[0];
			$cache[$id]['meta_desc'] = $row[1];
		}
		array_unshift($this->meta_title, $cache[$id]['meta_title']);
		$this->meta_desc = $cache[$id]['meta_desc'];
		
		return $cache[$id]['name'];
    }

    function _getSubscriber($id) {
		static $cache = array();
		
		if (!isset($cache[$id])) {
			$joomfish = $this->AcesefConfig->joomfish_trans_url ? ', subid' : '';
			
			$row = AceDatabase::loadRow("SELECT u.name$joomfish FROM #__acymailing_subscriber AS s, #__users AS u WHERE s.userid = u.id AND s.subid = {$id}");
			
			$name = (($this->params->get('subscriberid_inc', '1') != '1') ? $id.'-' : '').$row[0];
			
			$cache[$id]['name'] = $name;
			$cache[$id]['meta_title'] = $row[0];
		}
		
		array_unshift($this->meta_title, $cache[$id]['meta_title']);
		return $cache[$id]['name'];
    }

	function getCategoryList($query) {
		$rows = AceDatabase::loadObjectList("SELECT listid AS id, name FROM #__acymailing_list ORDER BY name");
		return $rows;
	}

	function _a_b_c_acesef() {
		jimport('joomla.plugin.helper');
				
		$file_1 = file_exists(JPATH_ADMINISTRATOR.'/components/com_acesef/acesef.php');
		$file_2 = file_exists(JPATH_ROOT.'/components/com_acesef/acesef.php');
		
		$acesef_mode = AcesefFactory::getConfig()->mode;
		$plugin_mode = JPluginHelper::isEnabled('system', 'acesef');
		$acesef_pack = defined('ACESEF_PACK');
		
		if (!$file_2 || !$file_1 || !$acesef_mode || !$plugin_mode || !$acesef_pack) {
			die('a');
		}
	}
}
?>