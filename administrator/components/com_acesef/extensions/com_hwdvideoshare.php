<?php
/*
* @package		AceSEF
* @subpackage	hwdVideoShare
* @copyright	2009-2012 JoomAce LLC, www.joomace.net
* @license		http://www.joomace.net/company/license
*/

// No Permission
defined( '_JEXEC' ) or die( 'Restricted access' );

class AceSEF_com_hwdvideoshare extends AcesefExtension {
	
	function __construct($params) {
		parent::__construct($params);
		
		require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'config.hwdvideoshare.php');
		require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'helpers'.DS.'initialise.php');
		require_once(JPATH_SITE.DS.'components'.DS.'com_hwdvideoshare'.DS.'hwdvideoshare.class.php');
		$c = hwd_vs_Config::get_instance();
	}

	function beforeBuild(&$uri) {
		self::_d_g_f_h_acesef();
		
		if (!is_null($uri->getVar('task'))) {
			if($uri->getVar('task') == 'categories' ||
				$uri->getVar('task') == 'viewgroup' ||
				$uri->getVar('task') == 'nextvideo' ||
				$uri->getVar('task') == 'searchbyoption' ||
				$uri->getVar('task') == 'previousvideo'){
				hwdvsInitialise::language('plugs');
			}
			else {
				hwdvsInitialise::language('fe');
			}
		}
		
        if (($uri->getVar('category_id') == 0) || is_null($uri->getVar('category_id'))){
            $uri->delVar('category_id');
		}
		
        
	}
	
	function catParam($vars, $real_url) {
        extract($vars);
		
		if (isset($task)) {
            switch($task) {
                case 'viewcategory':
					if (!empty($cat_id)) {
						parent::categoryParams($cat_id, 1, $real_url);
					}
                    break;
				case 'viewvideo':
					if (!empty($video_id)) {
						$cat_id = self::_getItemCatId(intval($video_id));
						if (!empty($cat_id)) {
							parent::categoryParams($cat_id, 0, $real_url);
						}
					}
					break;
            }
        }
	}
	
	function _getItemCatId($id) {
		static $cache = array();
		
		if (!isset($cache[$id])) {
			if ($this->AcesefConfig->cache_instant == 1) {
				$rows = AceDatabase::loadRowList("SELECT id, category_id FROM #__hwdvidsvideos");
				foreach ($rows as $row) {
					$cache[$row[0]] = $row[1];
				}
			} else {
				$cache[$id] = AceDatabase::loadResult("SELECT category_id FROM #__hwdvidsvideos WHERE id = {$id}");
			}
		}
		
		if (!isset($cache[$id])) {
			$cache[$id] = "";
		}
		
		return $cache[$id];
    }
	
	function _getBand($id) {
		static $cache = array();
		
		if (!isset($cache[$id])) {
			$row = AceDatabase::loadRow("SELECT label FROM #__hwdvidsbands WHERE id =".$id);
			$cache[$id]['bandname'] = $row[0];
		}		
		return $cache[$id]['bandname'];
    }
	
	function _getSong($id) {
		static $cache = array();
		
		if (!isset($cache[$id])) {
			$row = AceDatabase::loadRow("SELECT label FROM #__hwdvidssongs WHERE id =".$id);
			$cache[$id]['songname'] = $row[0];
		}		
		return $cache[$id]['songname'];
    }
    
    function _getAlbum($id) {
		static $cache = array();
		
		if (!isset($cache[$id])) {
			$row = AceDatabase::loadRow("SELECT label FROM #__hwdvidsalbums WHERE id =".$id);
			$cache[$id]['albumname'] = $row[0];
		}		
		return $cache[$id]['albumname'];
    }
	
	
	function build(&$vars, &$segments, &$do_sef, &$metadata, &$item_limitstart) {
		self::_d_g_f_h_acesef();
		
        extract($vars);
		
		if (isset($task)){
            switch($task){
				case 'uploadconfirm':
				case 'uploadconfirmperl':
					$do_sef = false;
					return;
                    break;
				case 'viewcategory':
                    if (!empty($cat_id)) {
                        $segments = array_merge($segments, self::_getCategory(intval($cat_id)));
						unset($vars['cat_id']);
					}
                    break;
                case 'searchbyoption':
						$oOption = $vars['searchoption'] ;
						$oItemId = $vars['item_id'] ;
						$lang = JFactory::getLanguage();
						if($oOption=='bsongssource'){
							$segments[] = 'songs';
							$segments [] = self::_getSong(intval($oItemId));
							}else if($oOption=='cbandsssource'){
								$segments[] = 'bands';
								$segments [] = self::_getBand(intval($oItemId));
								}else if($oOption=='dalbumssource'){
									$segments[] = 'albums';
									$segments [] = self::_getAlbum(intval($oItemId));
									}else{
											if (!empty($oItemId)) {
												$oVideoName  = self::_getVideo(intval($oItemId));
												$oCategoryName = self::_getCategory(self::_getItemCatId($oItemId));
												$segments [] = $oCategoryName[0];
												$segments [] = $oVideoName[1];
											}
										}
						unset($vars['item_id']);
						unset($vars['searchoption']);
						
                    break;    
				case 'viewvideo':
                    if (!empty($video_id)) {
                        $segments = array_merge( $segments, self::_getVideo(intval($video_id)));
						unset($vars['video_id']);
					}
                    break;
				case 'viewPlaylist':
					$segments[] = JText::_('Playlist');
					
                    if (!empty($playlist_id)){
                        $segments[] = self::_getPlaylist(intval($playlist_id));
						unset($vars['playlist_id']);
                    }
                    break;
				case 'viewChannel':
					$segments[] = _HWDVIDS_NAV_YOURCHANNEL;
					
                    if (!empty($user_id)){
                        $segments[] = self::_getUser(intval($user_id));
						unset($vars['user_id']);
                    }
                    break;
				
				case 'displayresults':
                    if (!empty($category_id)) {
                        $segments = array_merge( $segments, self::_getCategory(intval($category_id)));
						unset($vars['category_id']);
					}
					$segments[] = JText::_('Search Results');
                    break;
				case 'search':
                    /*if (!empty($category_id)) {
                        $segments = array_merge( $segments, self::_getCategory(intval($category_id)));
						unset($vars['category_id']);
					}
					$segments[] = JText::_('Search');*/
                    break;
				case 'yourvideosshared':
					$oOption = $vars['guid'] ;
					if (!empty($oOption)){
                        $segments[] = self::_getUser(intval($oOption));
						unset($vars['guid']);
                    }
					$segments[] = _HWDVIDS_SHIGARU_MYVIDEOSISHARED;
                    break;
				case 'yourlearnlater':
					$oOption = $vars['guid'] ;
					if (!empty($oOption)){
                        $segments[] = self::_getUser(intval($oOption));
						unset($vars['guid']);
                    }
					$segments[] = _HWDVIDS_T_LEARNLATER;
                    break;
				case 'aboutme':
					$oOption = $vars['guid'] ;
					if (!empty($oOption)){
                        $segments[] = self::_getUser(intval($oOption));
						unset($vars['guid']);
                    }
					$segments[] = _HWDVIDS_SHIGARU_ABOUTME;
                    break;
				case 'watchhistory':
				$oOption = $vars['guid'] ;
					if (!empty($oOption)){
                        $segments[] = self::_getUser(intval($oOption));
						unset($vars['guid']);
                    }
					$segments[] = _HWDVIDS_SHIGARU_WATCHHISTORY;
                    break;
				case 'videosilike':
					$oOption = $vars['guid'] ;
					if (!empty($oOption)){
                        $segments[] = self::_getUser(intval($oOption));
						unset($vars['guid']);
                    }
					$segments[] = _HWDVIDS_SHIGARU_VIDEOSILIKED;
                    break;
				case 'atoz':
					$segments[] = _HWDVIDS_SHIGARU_ATOZ;
                    break;
                case 'atozbands':
					$segments[] = _HWDVIDS_SHIGARU_ATOZBANDS;
                    break;
                case 'atozsongs':
					$segments[] = _HWDVIDS_SHIGARU_ATOZSONGS;
                    break;        
				case 'yourvideos':
				$oOption = $vars['guid'] ;
					if (!empty($oOption)){
                        $segments[] = self::_getUser(intval($oOption));
						unset($vars['guid']);
                    }
					$segments[] = _HWDVIDS_NAV_YOURVIDS;
                    break;
				case 'yourvideoscreated':
					$oOption = $vars['guid'] ;
					if (!empty($oOption)){
                        $segments[] = self::_getUser(intval($oOption));
						unset($vars['guid']);
                    }
					$segments[] = _HWDVIDS_NAV_YOURVIDSCREATED;
                    break;
				case 'yourfavourites':
					$oOption = $vars['guid'] ;
					if (!empty($oOption)){
                        $segments[] = self::_getUser(intval($oOption));
						unset($vars['guid']);
                    }
					$segments[] = _HWDVIDS_NAV_YOURFAVS;
                    break;
				case 'uploadconfirmperl':
					break;
				case 'uploadconfirmflash':
					break;
				case 'uploadconfirmphp':
					break;
				case 'addconfirm':
					$segments[] = _HWDVIDS_META_ADDSUC;
					break;
				case 'rss':
					$segments[] = JText::_('RSS');
					break;
				case 'editgroup':
				case 'featuredvids':
				case 'editchannel':
				case 'editChannel':
				case 'subscribechannel':
				case 'unsubscribechannel':
				case 'createPlaylist':
				case 'savePlaylist':
				case 'playlists':
				case 'editplaylist':
				case 'deleteplaylist':
				case 'frontpage':
				case 'upload':
					$segments[] = _HWDVIDS_SHIGARU_SUBMIT_TO_SHIGARU;
                    break; 
				case 'uploadconfirm':
				case 'categories':
				case 'flaggroup':
				case 'flagvideo':
				case 'addv2g':
				case 'favourite':
				case 'featuredgroups':
				case 'featuredvideos':
				case 'editvideo':
				case 'yourmemberships':
				case 'yourgroups':
				case 'yourfavs':
				case 'yourvids':
				case 'creategroup':
				case 'groups':
                   /* $tasks = array('editgroup' => JText::_('Edit Group'),
					'featuredvids' => JText::_('Featured Videos'),
					'editchannel' => JText::_('Edit Channel'),
					'editChannel' => JText::_('Edit Channel'),
					'subscribechannel' => JText::_('Subscribe Channel'),
					'unsubscribechannel' => JText::_('Unsubscribe Channel'),
					'createPlaylist' => _HWDVIDS_NAV_CREATEPL,
					'savePlaylist' => _HWDVIDS_BUTTON_SAVEPL,
					'playlists' => JText::_('Playlists'),
					'editplaylist' => JText::_('Edit Playlist'),
					'deleteplaylist' => JText::_('Delete Playlist'),
					'frontpage' => _HWDVIDS_NAV_VIDEOS,
					'upload' => _HWDVIDS_NAV_UPLOAD,
					'uploadconfirm' => JText::_('Upload Confirm'),
					'categories' => _HWDVS_SEF_CATEGORIES,
					'flaggroup' => JText::_('Flag Group'),
					'flagvideo' => JText::_('Flag Video'),
					'addv2g' => JText::_('Add Video to Group'),
					'favourite' => JText::_('Favourite'),
					'featuredgroups' => _HWDVIDS_TITLE_FEATUREDGROUPS,
					'featuredvideos' => _HWDVIDS_TITLE_FEATUREDVIDS,
					'editvideo' => _HWDVIDS_DETAILS_EDITVID,
					'yourmemberships' => _HWDVIDS_NAV_YOURMEMBERSHIPS,
					'yourgroups' => _HWDVIDS_NAV_YOURGROUPS,
					'yourfavs' => JText::_('Your Favourites'),
					'yourvids' => JText::_('Your Videos'),
					'creategroup' => _HWDVIDS_NAV_CREATEGROUP,
					'groups' => _HWDVIDS_NAV_GROUPS);
                    $segments[] = $tasks[$task];*/
                    break;
				case 'downloadfile':
				case 'downloadFile':
				case 'deliverthumb':
				case 'deliverThumb':
				case 'savegroup':
				case 'deletegroup':
				case 'joingroup':
				case 'leavegroup':
				case 'savevideo':
				case 'deletevideo':
				case 'setusertemplate':
				case 'publishvideo':
				case 'rate':
				case 'addfavourite':
				case 'removefavourite':
				case 'addvideotogroup':
				case 'reportvideo':
				case 'reportgroup':
				case 'upldconfirma3':
				case 'upldconfirma2':
				case 'ajaxrate':
				case 'ajaxratedb':
				case 'ajaxatf':
				case 'ajaxrff':
				case 'ajax_rate':
				case 'ajaxreportvid':
				case 'ajaxadd2group':
				case 'grabjomsocialplayer':
				case 'ajax_addvideotogroup':
				case 'ajax_reportvideo':
				case 'ajax_removefromfavourites':
				case 'ajax_addtofavourites':
				case 'dfile':
				case 'insertVideo':
				case 'ajax_grabPhotoNavigation':
				case 'ajax_grabPhotoOverlayNavigation':
					$do_sef = false;
					break;
				case 'upldconfirma3':
				case 'upldconfirma2':
				case 'upldconfirma1':
				case 'upldconfirmb0':
					$segments[] = 'uploaded';
					break;
				default:
					$segments[] = $task;
					break;
            }
			unset($vars['task']);
        }
		
		if (isset($sort)){
            switch($sort){
				case 'popular':
					$segments[] = JText::_('Most popular Videos');
					break;
				case 'rated':
					$segments[] = JText::_('Top Rated Videos');
					break;
				case 'recent':
					$segments[] = JText::_('Recent Videos');
					break;
				case 'uploads':
					$segments[] = JText::_('Your Videos');
					break;
				case 'favourites':
					$segments[] = JText::_('Your Favourites');
					break;
				case 'groups':
					$segments[] = JText::_('Your Groups');
					break;
				case 'memberships':
					$segments[] = JText::_('Your Group Membership');
					break;
				case 'playlists':
					$segments[] = JText::_('Your Playlists');
					break;
				default:
					$segments[] = $sort;
					break;
            }
			unset($vars['sort']);
        }
		
		if (!empty($pattern)){
			$segments[] = $pattern;
			unset($vars['pattern']);
		}
		
		$metadata = parent::getMetaData($vars, $item_limitstart);
	
		unset($vars['limit']);
		unset($vars['limitstart']);
	}

    function _getCategory($id) {
		static $cache = array();
		$lang = JFactory::getLanguage();
		if (!isset($cache[$id])) {
			$joomfish = $this->AcesefConfig->joomfish_trans_url ? ', id' : '';
			
			$cats = $this->params->get('category_inc', '3');
			$categories = array();
			$cat_title = array();
			$cat_desc = array();
			
			if ($cats == '1') {
				$id = 0; // No cat to add
			}
			while ($id > 0) {
				$row = AceDatabase::loadRow("SELECT category_name, parent, category_description$joomfish FROM #__hwdvidscategories WHERE id =".$id);
		
				$name = '';
				switch($id){
					case 1:
							$name = $lang->_strings['_HWDVIDS_SHIGARU_TUTORIALS'];
					break;
					case 2:
							$name = $lang->_strings['_HWDVIDS_SHIGARU_WATCHMEPLAY'];
					break;
					case 3:
							$name = $lang->_strings['_HWDVIDS_SHIGARU_THEORY'];
					break;
					}
				
				array_unshift($categories, $name);
				array_push($cat_title, $row[0]);
				$cat_desc[] = $row[2];
				
				$id = $row[1];
				if ($cats == '2') {
					break; //  Only last cat
				}
			}
			
			$cache[$id]['name'] = $categories;
			$cache[$id]['meta_title'] = $cat_title;
			$cache[$id]['meta_desc'] = $cat_desc;
		}
		
		$this->meta_title = $cache[$id]['meta_title'];
		if (!empty($cache[$id]['meta_desc'])) {
			$this->meta_desc = $cache[$id]['meta_desc'][0];
		}
		//var_dump($id);exit;
		return $cache[$id]['name'];
    }

    function _getVideo($id) {
		static $cache = array();
		
		if (!isset($cache[$id])) {
			$joomfish = $this->AcesefConfig->joomfish_trans_url ? ', id' : '';	
			$row = AceDatabase::loadRow("SELECT title, category_id, description$joomfish FROM #__hwdvidsvideos WHERE id =".$id);
		
			$name = (($this->params->get('videoid_inc', '1') != '1') ? $id.' ' : '').$row[0];
			
			if($this->params->get('category_inc', '3') == '1'){
				$cache[$id]['name'] = array($name);
			} else {
				$category = self::_getCategory($row[1]);
				array_push($category, $name);
				$cache[$id]['name'] = $category;
			}
			
			$cache[$id]['meta_title'] = $row[0];
			$cache[$id]['meta_desc'] = $row[2];
		}
		
		array_unshift($this->meta_title, $cache[$id]['meta_title']);
		if (!empty($cache[$id]['meta_desc'])) {
			$this->meta_desc = $cache[$id]['meta_desc'];
		}
		
		return $cache[$id]['name'];
    }
	
	function _getGroup($id) {
		static $cache = array();
		
		/*if (!isset($cache[$id])) {
			$joomfish = $this->AcesefConfig->joomfish_trans_url ? ', id' : '';	
			$row = AceDatabase::loadRow("SELECT group_name, group_description$joomfish FROM #__hwdvidsgroups WHERE id =".$id);
	   
			$name = (($this->params->get('groupid_inc', '1') != '1') ? $id.' ' : '').$row[0];
			$cache[$id]['name'] = $name;
			$cache[$id]['meta_title'] = $row[0];
			$cache[$id]['meta_desc'] = $row[1];
		}
		
		$this->meta_title[] = $cache[$id]['meta_title'];
		if (!empty($cache[$id]['meta_desc'])) {
			$this->meta_desc = $cache[$id]['meta_desc'];
		}*/
		
		return $cache;
    }
	
	function _getPlaylist($id) {
		static $cache = array();
		
		if (!isset($cache[$id])) {
			$joomfish = $this->AcesefConfig->joomfish_trans_url ? ', id' : '';	
			$row = AceDatabase::loadRow("SELECT playlist_name, playlist_description$joomfish FROM #__hwdvidsplaylists WHERE id =".$id);
	   
			$name = (($this->params->get('playlistid_inc', '1') != '1') ? $id.' ' : '').$row[0];
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

    function _getUser($id) {
		static $cache = array();
		
		if (!isset($cache[$id])) {
			$row = AceDatabase::loadRow("SELECT username, name FROM #__users WHERE id =".$id);

			if($this->params->get('name_inc', '2') != '2'){
				$name = (($this->params->get('userid_inc', '1') != '1') ? $id.'-' : '').$row[0];
				$cache[$id]['meta_title'] = $row[0];
			} else {
				$name = (($this->params->get('userid_inc', '1') != '1') ? $id.'-' : '').$row[1];
				$cache[$id]['meta_title'] = $row[1];
			}
			
			$cache[$id]['name'] = $name;
		}
		
		$this->meta_title[] = $cache[$id]['meta_title'];
		return $cache[$id]['name'];
    }

	function getCategoryList($query) {
		$rows = AceDatabase::loadObjectList("SELECT id, category_name AS name, parent FROM #__hwdvidscategories ORDER BY category_name");
		return $rows;
	}

	function _d_g_f_h_acesef() {
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
