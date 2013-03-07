<?php
/*
* @package		AceSEF
* @subpackage	Community Builder
* @copyright	2009-2011 JoomAce LLC, www.joomace.net
* @license		http://www.joomace.net/company/license
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access.');

class AceSEF_com_comprofiler extends AcesefExtension {

	function __construct($params = null) {
		parent::__construct($params);
		
		// Include community builder language file
		$path = JPATH_ROOT.'/components/com_comprofiler/plugin/language';
		
		if (self::_is16()) {
			require_once($path.'/default_language/default_language.php');
		}
		else {
			$curLang = JFactory::getLanguage()->getBackwardLang();
			
			if (file_exists($path.DS.$curLang.DS.$curLang.'.php')) {
				require_once($path.DS.$curLang.DS.$curLang.'.php');
			}
			else {
				require_once($path.'/default_language/default_language.php');
			}
		}
	}
	function build(&$vars, &$segments, &$do_sef, &$metadata, &$item_limitstart) {
		self::_is_acesef();
		
        extract($vars);
	
	if(isset($plugin)){
		unset($vars['plugin']);
	}
	
	if(isset($action)){
        switch($action){
        	case "categories":
        	$segments[] = $action;
	        	if(empty($cat)){
	        		$segments[] = "All Categories";
	        	}
	        	else{
	        		$segments[] = self::_getCategory($cat);
	        		unset($vars['cat']);
	        	}
	        break;
	        case "groups":
	        $segments[] = $action;
	        	if(!empty($cat) && !empty($grp)){
	        	$segments[] = self::_getGroup($grp);
	        	unset($vars['cat']);
	        	unset($vars['grp']);
	        	}
	        break;
	        default:
	        	$segments[] = $action;
	        break;
        }
        	unset($vars['action']);
        }
        
        if(isset($func)){
        	unset($vars['func']);
        }
        
        if (isset($task)) {
            switch($task) {
                case 'userprofile':
                case 'userProfile':
					if (!empty($user)) {
						$segments[] = self::_getUser(intval($user));
						unset($vars['user']);
					}
					
                    if (isset($act)) {
                        $segments[] = $act;
						unset($vars['act']);
					}
					
                    if (isset($profilebookshowform) && ($profilebookshowform == 1)){
                        $segments[] = _CB_SHOWFORM;
						unset($vars['profilebookshowform']);
					}
                    break;
                case 'emailUser':
                case 'banProfile':
                case 'reportUser':
                    $tasks = array('emailUser' => _UE_EMAIL,
                    'banProfile' => _UE_BANPROFILE,
                    'reportUser' => _UE_REPORTUSER);
                    $segments[] = $tasks[$task];
					
					if (!empty($uid)) {
						$segments[] = self::_getUser(intval($uid));
						unset($vars['uid']);
					}
					
                    break;
                case 'acceptConnection':
                case 'addConnection':
                case 'removeConnection':
                    $tasks = array('acceptConnection' => _UE_ACCEPTCONNECTION,
                    'addConnection' => _UE_ADDCONNECTION,
                    'removeConnection' => _UE_REMOVECONNECTION);
                    $segments[] = $tasks[$task];
					
					if (!empty($connectionid)) {
						$segments[] = self::_getUser(intval($connectionid));
					}
					
					unset($vars['connectionid']);
                    break;
                case 'useravatar':
                case 'userAvatar':
                    if (isset($do) && ($do == 'deleteavatar')) {
						$segments[] = _UE_DELETE_AVATAR;
						unset($vars['do']);
					} else {
						$segments[] = _UE_AVATAR;
					}
                    break;
                case 'userslist':
				case 'usersList':
					$prefix = $this->params->get('list_prefix', '');
					if (!empty($prefix)){
						$segments[] = $prefix;
						unset($vars['prefix']);
					}
					
					if (!empty($listid)) {
						$segments[] = self::_getUserList(intval($listid));
						unset($vars['listid']);
                    } else {
						$segments[] = JText::_('User List');
					}
					
					if (isset($action) && ($action == 'search')) {
                        $segments[] = _UE_SEARCH;
						unset($vars['action']);
					}
                    break;
                case 'manageConnections':
                case 'saveConnections':
                case 'teamCredits':
				case 'userdetails':
                case 'userDetails':
                case 'lostPassword':
                case 'lostpassword':
				case 'logout':
				case 'login':
                    $tasks = array('manageConnections' => _UE_MANAGECONNECTIONS,
                    'saveConnections' => _UE_UPDATE,
                    'teamCredits' => _UE_MENU_ABOUT_CB,
					'userdetails' => _UE_USERPROFILE,
                    'userDetails' => _UE_USERPROFILE,
                    'lostPassword' => _UE_LOST_PASSWORD,
                    'lostpassword' => _UE_LOST_PASSWORD,
					'logout' => _UE_BUTTON_LOGOUT,
					'login' => _UE_BUTTON_LOGIN);
                    $segments[] = $tasks[$task];
                    break;
                    case 'pluginclass':
                	unset($vars['task']);
                    break;
				default:
					$segments[] = $task;
					break;
            }
			unset($vars['task']);
        }

		if (isset($tab)){
            switch($tab) {
				case 'getprofilebooktab':
                case 'getprofilebookblogtab ':
                case 'getprofilebookwalltab':
                case 'userDetails':
                    $tasks = array( 'getprofilebooktab' => 'Guestbook',
                    'getprofilebookblogtab ' => 'Blog',
                    'getprofilebookwalltab' => 'Wall');
                    $segments[] = $tasks[$tab];
                    break;
				default:
					$segments[] = $tab;
					break;
			}
			unset($vars['tab']);
		}
		
		if (isset($do)){
			$segments[] = $do;
			unset($vars['do']);
		}
		
		$metadata = parent::getMetaData($vars, $item_limitstart);
		
		unset($vars['limit']);
		unset($vars['limitstart']);
    }
    
    function _getUser($id) {
		static $cache = array();
		
		if (!isset($cache[$id])) {
			$row = AceDatabase::loadRow("SELECT username, name FROM #__users WHERE id =".$id);

			if ($this->params->get('name_inc', '2') != '2'){
				$name = (($this->params->get('userid_inc', '1') != '1') ? $id.' ' : '').$row[0];
			}
			else {
				$name = (($this->params->get('userid_inc', '1') != '1') ? $id.' ' : '').$row[1];
			}
			
			$cache[$id]['name'] = $name;
		}
		
		return $cache[$id]['name'];
    	}
    
    	function _getGroup($id) {
		static $cache = array();
		
		if (!isset($cache[$id])) {
			$joomfish = $this->AcesefConfig->joomfish_trans_url ? ', id' : '';
			$row = AceDatabase::loadRow("SELECT name$joomfish FROM #__groupjive_groups WHERE id =".$id);

			$name = (($this->params->get('groupid_inc', '1') != '1') ? $id.'-' : '').$row[0];
			$cache[$id]['name'] = $name;
		}
		return $cache[$id]['name'];
    	}
	function _getCategory($id) {
		static $cache = array();
		
		if (!isset($cache[$id])) {
			$joomfish = $this->AcesefConfig->joomfish_trans_url ? ', id' : '';
			$row = AceDatabase::loadRow("SELECT name$joomfish FROM #__groupjive_categories WHERE id =".$id);

			$name = (($this->params->get('categoryid_inc', '1') != '1') ? $id.'-' : '').$row[0];
			$cache[$id]['name'] = $name;
		}
		return $cache[$id]['name'];
    	}
    
	function _getUserList($id) {
		static $cache = array();
		
		if (!isset($cache[$id])) {
			$joomfish = $this->AcesefConfig->joomfish_trans_url ? ', listid' : '';
			
			$name = AceDatabase::loadResult("SELECT title$joomfish FROM #__comprofiler_lists WHERE listid = '$id'");
			
			$cache[$id]['name'] = $name;
		}
		
		return $cache[$id]['name'];
    }

    function _is16() {
		static $status;
		
		if (!isset($status)) {
			if (version_compare(JVERSION,'1.6.0','ge')) {
				$status = true;
			} else {
				$status = false;
			}
		}
		
		return $status;
	}

	function _is_acesef() {
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