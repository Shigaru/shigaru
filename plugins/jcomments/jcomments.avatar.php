<?php
/**
 * JComments - Joomla Comment System
 *
 * Enable avatar support for JComments
 *
 * This plugin support loading user avatars from:
 *
 * - Agora Forum
 * - CommunityBuilder
 * - Contacts
 * - FireBoard Forum
 * - Gravatar
 * - IDoBlog
 * - K2
 * - Kunena Forum
 * - JooBB Forum
 * - JomSocial
 * - iJoomla Magazine
 * - phpBB3 - Blogomunity p8pbb bridge
 * - phpBB3 - JFusion bridge
 * - phpBB3 - RokBridge
 * - vBulletin
 *
 * @version 1.0
 * @package JComments
 * @author Sergey M. Litvinov (smart@joomlatune.ru)
 * @copyright (C) 2006-2009 by Sergey M. Litvinov (http://www.joomlatune.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
 * If you fork this to create your own project, 
 * please make a reference to JComments someplace in your code 
 * and provide a link to http://www.joomlatune.ru
 **/

// ensure this file is being included by a parent file
(defined('_VALID_MOS') OR defined('_JEXEC')) or die('Direct Access to this location is not allowed.');

if (JCOMMENTS_JVERSION == '1.0') {
	global $_MAMBOTS;
	$_MAMBOTS->registerFunction('onPrepareAvatar', 'plgJCommentsAvatar');
	$_MAMBOTS->registerFunction('onPrepareAvatars', 'plgJCommentsAvatars');
} else if (JCOMMENTS_JVERSION == '1.5') {
	global $mainframe;
	$mainframe->registerEvent('onPrepareAvatar', 'plgJCommentsAvatar');
	$mainframe->registerEvent('onPrepareAvatars', 'plgJCommentsAvatars');
}

function plgJCommentsGetGravatar($email)
{
        global $mainframe;
	return 'http://www.gravatar.com/avatar.php?gravatar_id='. md5(strtolower($email)) .'&amp;default=' . urlencode($mainframe->getCfg('live_site') . '/components/com_jcomments/images/no_avatar.png');
}

function plgJCommentsAvatarImg($avatar, $alt = '')
{
	return '<img src="' . $avatar . '" alt="' . $alt . '" border="0" />';;
}

function plgJCommentsAvatarAppendLink($avatar, $link, $target)
{
	return ($link != '') ? ('<a href="'. $link  . '"' . $target . '>' . $avatar . '</a>') : $avatar;
}

function plgJCommentsAvatar( &$comment )
{
	$comments = array();
	$comments[0] =& $comment;
	plgJCommentsAvatars($comments);
}

function plgJCommentsAvatars( &$comments )
{
        global $mainframe;

        $db = & JCommentsFactory::getDBO();

        require_once (JCOMMENTS_HELPERS . DS . 'plugin.php');
        $pluginParams = JCommentsPluginHelper::getParams('jcomments.avatar', 'jcomments');
 	$pluginParams->def('avatar_type', 'gravatar');
 	$pluginParams->def('avatar_link', 0);

	$avatar_type = $pluginParams->get('avatar_type');
	$avatar_link = $pluginParams->get('avatar_link');
	$avatar_link_target = $pluginParams->get('avatar_link_target');
	$avatar_noavatar = $pluginParams->get('avatar_noavatar');
	$avatar_custom_noavatar = $pluginParams->get('avatar_custom_noavatar');

	if ($avatar_link_target != '') {
		$avatar_link_target = ' target="' . $avatar_link_target . '"';
	}

	if ($avatar_type === 'fireboard') {
		$fireboardCfg = $mainframe->getCfg('absolute_path') . '/administrator/components/com_fireboard/fireboard_config.php';
		if (is_file($fireboardCfg)) {
			include_once ($fireboardCfg);
			if (intval($fbConfig['cb_profile']) == 1) {
				$avatar_type = 'cb';
			}
		}
 	}

	$users = array();
	for ($i=0,$n=count($comments); $i < $n; $i++) {
		if ($comments[$i]->userid != 0) {
			$users[] = $comments[$i]->userid;
		}
	}
	$users = array_unique($users);

 	switch($avatar_type) {
 	        case 'contacts':
			if (count($users)) {
			        $query = 'SELECT cd.user_id as userid, cd.image as avatar,'
					. ((JCOMMENTS_JVERSION == '1.5') ? ' CASE WHEN CHAR_LENGTH(cd.alias) THEN CONCAT_WS(":", cd.id, cd.alias) ELSE cd.id END as slug,' : '')
					. ((JCOMMENTS_JVERSION == '1.5') ? ' CASE WHEN CHAR_LENGTH(cc.alias) THEN CONCAT_WS(":", cc.id, cc.alias) ELSE cc.id END as catslug' : '')
					. ' FROM #__contact_details AS cd '
					. ' INNER JOIN #__categories AS cc on cd.catid = cc.id'
					. ' WHERE cd.user_id in (' . implode(',', $users)  . ')'
					;
			        $db->setQuery($query);
			        $avatars = $db->loadObjectList('userid');
				unset($users);
			} else {
				$avatars = array();
			}

			if (JCOMMENTS_JVERSION == '1.5') {
				$cparams = JComponentHelper::getParams('com_media');
				$imagePath = JURI::base() . '/' . $cparams->get('image_path');
			} else {
				$imagePath = $mainframe->getCfg('live_site') . '/images/stories';

				$db->setQuery("SELECT id FROM `#__menu` WHERE link LIKE '%com_contact%' AND published=1 AND access=0");
				$Itemid = $db->loadResult();
			}

			for ($i=0,$n=count($comments); $i < $n; $i++) {
				$userid = (int) $comments[$i]->userid;

				// link to profile
				if (JCOMMENTS_JVERSION == '1.5') {
					$comments[$i]->profileLink = $userid ? JRoute::_('index.php?option=com_contact&view=contact&id='.$avatars[$userid]->slug.'&catid='.$avatars[$userid]->catslug) : '';
				} else {
					$comments[$i]->profileLink = $userid ? sefRelToAbs('index.php?option=com_contact&task=view&contact_id='. $avatars[$userid]->id .'&Itemid='. $Itemid) : '';
				}

				// avatar
			        if (isset($avatars[$userid]) && $avatars[$userid]->avatar != '') {
					$comments[$i]->avatar =  plgJCommentsAvatarImg($imagePath . '/'. $avatars[$userid]->avatar);
				} else {
					$comments[$i]->avatar = '';
			        }
			}
			unset($avatars);
 	        	break;

		case 'fireboard':
			if (count($users)) {
			        $db->setQuery('SELECT userid, avatar FROM #__fb_users WHERE userid in (' . implode(',', $users)  . ')');
			        $avatars = $db->loadObjectList('userid');
				unset($users);
			} else {
				$avatars = array();
			}

			$avatarA1 = $mainframe->getCfg('absolute_path') . '/components/com_fireboard/avatars/';
			$avatarL1 = $mainframe->getCfg('live_site') . '/components/com_fireboard/avatars/';

			$avatarA2 = $mainframe->getCfg('absolute_path') . '/images/fbfiles/avatars/';
			$avatarL2 = $mainframe->getCfg('live_site') . '/images/fbfiles/avatars/';

			for ($i=0,$n=count($comments); $i < $n; $i++) {
				$userid = (int) $comments[$i]->userid;

				// link to profile
				$comments[$i]->profileLink = $userid ? sefRelToAbs('index.php?option=com_fireboard&func=fbprofile&task=showprf&userid=' . $userid) : '';

				// avatar
			        if (isset($avatars[$userid]) && $avatars[$userid]->avatar != '') {

			        	if (is_file($avatarA1 . $avatars[$userid]->avatar)) {
						$comments[$i]->avatar = plgJCommentsAvatarImg($avatarL1 . $avatars[$userid]->avatar);
					} else if (is_file($avatarA2 . $avatars[$userid]->avatar)) {
						$comments[$i]->avatar = plgJCommentsAvatarImg($avatarL2 . $avatars[$userid]->avatar);
					} else {
						$comments[$i]->avatar = '';
					}
				} else {
					$comments[$i]->avatar = '';
			        }
			}
			unset($avatars);
			break;

		case 'kunena':
			if (count($users)) {
			        $db->setQuery('SELECT userid, avatar FROM #__fb_users WHERE userid in (' . implode(',', $users)  . ')');
			        $avatars = $db->loadObjectList('userid');
				unset($users);
			} else {
				$avatars = array();
			}

			$avatarA = $mainframe->getCfg('absolute_path') . DS . 'images' . DS . 'fbfiles' . DS . 'avatars' . DS;
			$avatarL = $mainframe->getCfg('live_site') . '/images/fbfiles/avatars/';

			for ($i=0,$n=count($comments); $i < $n; $i++) {
				$userid = (int) $comments[$i]->userid;

				// link to profile
				$comments[$i]->profileLink = $userid ? JoomlaTuneRoute::_('index.php?option=com_kunena&func=fbprofile&userid=' . $userid) : '';

				// avatar
			        if (isset($avatars[$userid]) && $avatars[$userid]->avatar != '') {
			        	if (is_file($avatarA . $avatars[$userid]->avatar)) {
						$comments[$i]->avatar = plgJCommentsAvatarImg($avatarL . $avatars[$userid]->avatar);
					} else {
						$comments[$i]->avatar = '';
					}
				} else {
					$comments[$i]->avatar = '';
			        }
			}
			unset($avatars);
			break;

		case 'ccboard':
			if (count($users)) {
			        $db->setQuery('SELECT user_id, avatar FROM #__ccb_users WHERE user_id in (' . implode(',', $users)  . ')');
			        $avatars = $db->loadObjectList('user_id');
				unset($users);
			} else {
				$avatars = array();
			}

			$avatarA = $mainframe->getCfg('absolute_path') . DS . 'components' . DS . 'com_ccboard' . DS . 'assets' . DS . 'avatar' . DS;
			$avatarL = $mainframe->getCfg('live_site') . '/components/com_ccboard/assets/avatar/';

			for ($i=0,$n=count($comments); $i < $n; $i++) {
				$userid = (int) $comments[$i]->userid;

				// link to profile
				$comments[$i]->profileLink = $userid ? JoomlaTuneRoute::_('index.php?option=com_ccboard&view=myprofile&cid=' . $userid) : '';

				// avatar
			        if (isset($avatars[$userid]) && $avatars[$userid]->avatar != '') {
			        	if (is_file($avatarA . $avatars[$userid]->avatar)) {
						$comments[$i]->avatar = plgJCommentsAvatarImg($avatarL . $avatars[$userid]->avatar);
					} else {
						$comments[$i]->avatar = '';
					}
				} else {
					$comments[$i]->avatar = '';
			        }
			}
			unset($avatars);
			break;

		case 'cb':
			if (count($users)) {
			        $db->setQuery('SELECT user_id, avatar FROM #__comprofiler WHERE user_id in (' . implode(',', $users)  . ') AND avatarapproved = 1');
			        $avatars = $db->loadObjectList('user_id');
				unset($users);
			} else {
				$avatars = array();
			}

			if (!isset($GLOBALS['cbprofileitemid'])) {
    				$db->setQuery("SELECT id FROM #__menu WHERE link = 'index.php?option=com_comprofiler' AND published=1");
    				$_Itemid = $db->loadResult();

    				if (!$_Itemid) {
    					$db->setQuery("SELECT id FROM #__menu WHERE link = 'index.php?option=com_comprofiler&task=userslist' AND published=1");
	    				$_Itemid = $db->loadResult();
    				}

    				$GLOBALS['cbprofileitemid'] = (int) $_Itemid;
			}

			$_Itemid = $GLOBALS['cbprofileitemid'];

			if ($_Itemid != 0) {
				$_Itemid = '&Itemid=' . $_Itemid;
			} else {
				$_Itemid = '';
			}

			for ($i=0,$n=count($comments); $i < $n; $i++) {
				$userid = (int) $comments[$i]->userid;

				// link to profile
				$comments[$i]->profileLink = $userid ? JoomlaTuneRoute::_('index.php?option=com_comprofiler&task=userProfile&user=' . $userid . $_Itemid) : '';
			        
				// avatar
			        if (isset($avatars[$userid]) && !empty($avatars[$userid]->avatar)) {
					$tn = strpos($avatars[$userid]->avatar, 'gallery') === 0 ? '' : 'tn';
					$comments[$i]->avatar = plgJCommentsAvatarImg($mainframe->getCfg('live_site') . '/images/comprofiler/'. $tn . $avatars[$userid]->avatar);
				} else {
					$comments[$i]->avatar = '';
			        }
			}
			unset($avatars);
			break;


		case 'idoblog':
			if (count($users)) {
			        $db->setQuery('SELECT iduser, avatar FROM #__idoblog_users WHERE iduser in (' . implode(',', $users)  . ')');
			        $avatars = $db->loadObjectList('iduser');
				unset($users);
			} else {
				$avatars = array();
			}

			for ($i=0,$n=count($comments); $i < $n; $i++) {
				$userid = (int) $comments[$i]->userid;

				// profile link
				$comments[$i]->profileLink = $userid ? JRoute::_('index.php?option=com_idoblog&task=profile&userid=' . $userid) : '';

				// avatar
			        if (isset($avatars[$userid]) && $avatars[$userid]->avatar != '') {
					$comments[$i]->avatar = plgJCommentsAvatarImg($mainframe->getCfg('live_site') . '/images/idoblog/'. $avatars[$userid]->avatar);
				} else {
					$comments[$i]->avatar = '';
			        }
			}
			unset($avatars);
			break;

		case 'vb':
		        $bbpixelBridgeCfg = $mainframe->getCfg('absolute_path') . '/jvb_config.php';
			if (is_file($bbpixelBridgeCfg)) {
				include ($bbpixelBridgeCfg);
			} else {
				// old versions of bridge
			        $bbpixelBridgeCfg = $mainframe->getCfg('absolute_path') . '/pluginservices_config.php';
				if (is_file($bbpixelBridgeCfg)) {
					include($bbpixelBridgeCfg);
				}
			}

			for ($i=0,$n=count($comments); $i < $n; $i++) {

				$userid = (int) $comments[$i]->userid;

				// profile link
				$comments[$i]->profileLink = ($userid && $VB_ROOT_URL != '') ? $VB_ROOT_URL . '/member.php?u=' . $userid : '';

				// avatar
				if ($VB_ROOT_URL != '') {
					$comments[$i]->avatar = plgJCommentsAvatarImg($VB_ROOT_URL . '/image.php?u=' . $comments[$i]->userid . '&dateline=' . time());
				} else {
					$comments[$i]->avatar = '';
				}
			}
			break;

		case 'joostina':
			for ($i=0,$n=count($comments); $i < $n; $i++) {
				$userid = (int) $comments[$i]->userid;

				// profile link
				$comments[$i]->profileLink = '';

				// avatar
				$avatarFile = $mainframe->getCfg('absolute_path') . DS . 'images' . DS . 'avatars' . DS . 'mini' . DS . $userid . '.jpg';
				$avatarUrl = $mainframe->getCfg('live_site') . '/images/avatars/mini/' . $userid . '.jpg';

			        if ($userid && is_file($avatarFile)) {
					$comments[$i]->avatar = plgJCommentsAvatarImg($avatarUrl);
				} else {
					$comments[$i]->avatar = '';
			        }
			}
			unset($avatars);
			break;

		case 'agora':
			if (count($users)) {
			        $db->setQuery('SELECT id, jos_id FROM #__agora_users WHERE jos_id in (' . implode(',', $users)  . ')');
			        $avatars = $db->loadObjectList('jos_id');
				unset($users);
			} else {
				$avatars = array();
			}

			if ($avatar_link) {
    				$db->setQuery('SELECT id FROM #__menu WHERE link="index.php?option=com_agora"');
    				$_Itemid = $db->loadResult();
    				$agoraProfileLink = "index.php?option=com_agora&Itemid=" . $_Itemid . '&task=profile&id=';
			}

			$agoraCfgFile = $mainframe->getCfg('absolute_path') . DS . 'components' . DS . 'com_agora' . DS . 'cache' . DS . 'cache_config.php';
			$avatarsPath = '';

			if (is_file($agoraCfgFile)) {
				include_once($agoraCfgFile);
				$avatarsPath = $agora_config['o_avatars_dir'];
			}

			for ($i=0,$n=count($comments); $i < $n; $i++) {
				$userid = $comments[$i]->userid;

				// profile link
				$comments[$i]->profileLink = (intval($userid) && isset($agoraProfileLink)) ? JoomlaTuneRoute::_($agoraProfileLink . $avatars[$userid]->id) : '';

			        if (isset($avatars[$userid]) && $avatarsPath != '') {
        				$avatar_gif = $avatarsPath . '/' . $avatars[$userid]->id . '.gif';
        				$avatar_jpg = $avatarsPath . '/' . $avatars[$userid]->id . '.jpg';
        				$avatar_png = $avatarsPath . '/' . $avatars[$userid]->id . '.png';

        				if (file_exists($avatar_gif)) {
                				$avatarFile = $avatar_gif;
				        } else if (file_exists($avatar_jpg)) {
				        	$avatarFile = $avatar_jpg;
				        } else if (file_exists($avatar_png)) {
				        	$avatarFile = $avatar_png;
        				} else {
				                $avatarFile = '';
        				}

        				if ($avatarFile != '') {
						$comments[$i]->avatar = plgJCommentsAvatarImg($mainframe->getCfg('live_site') . '/' . $avatarFile);
					} else {
						$comments[$i]->avatar = '';
					}
				} else {
					$comments[$i]->avatar = '';
			        }
			}
			unset($avatars);
			break;

		case 'joobb':
			if (count($users)) {
			        $db->setQuery('SELECT id, avatar_file as avatar FROM #__joobb_users WHERE id in (' . implode(',', $users)  . ')');
			        $avatars = $db->loadObjectList('id');
				unset($users);
			} else {
				$avatars = array();
			}

			if ($avatar_link) {
    				$db->setQuery('SELECT id FROM #__menu WHERE link="index.php?option=com_joobb"');
    				$_Itemid = $db->loadResult();
    				$profileLink = "index.php?option=com_joobb&Itemid=" . $_Itemid . '&view=profile&id=';
			}

			$cfgFile = $mainframe->getCfg('absolute_path') . DS . 'components' . DS . 'com_joobb' . DS . 'system' . DS . 'joobbconfig.php';
			$avatarsPath = '';

			if (is_file($cfgFile)) {
				include_once($cfgFile);

				$joobbConfig =& JoobbConfig::getInstance();

				$avatarsPath = $joobbConfig->getAvatarSettings('avatar_path');

				for ($i=0,$n=count($comments); $i < $n; $i++) {
					$userid = (int) $comments[$i]->userid;

					// profile link
					$comments[$i]->profileLink = $userid ? JoomlaTuneRoute::_($profileLink . $avatars[$userid]->id) : '';

					// avatar
				        if (isset($avatars[$userid]) && $avatarsPath != '') {
        					$avatarFile = $avatarsPath . DS . $avatars[$userid]->avatar;

	        				if (file_exists(JPATH_SITE . DS . $avatarFile)) {
							$comments[$i]->avatar = plgJCommentsAvatarImg(JURI::root() . $avatarFile);
	        				} else {
							$comments[$i]->avatar = '';
        					}
					} else {
						$comments[$i]->avatar = '';
				        }
				}
			}
			unset($avatars);
			break;

		case 'ninjaboard':
			if (count($users)) {
			        $db->setQuery('SELECT id, avatar_file as avatar FROM #__ninjaboard_users WHERE id in (' . implode(',', $users)  . ')');
			        $avatars = $db->loadObjectList('id');
				unset($users);
			} else {
				$avatars = array();
			}

			if ($avatar_link) {
    				$db->setQuery('SELECT id FROM #__menu WHERE link="index.php?option=com_ninjaboard"');
    				$_Itemid = $db->loadResult();
    				$profileLink = "index.php?option=com_ninjaboard&Itemid=" . $_Itemid . '&view=profile&id=';
			}

			$cfgFile = $mainframe->getCfg('absolute_path') . DS . 'components' . DS . 'com_ninjaboard' . DS . 'system' . DS . 'ninjaboard.config.php';
			$avatarsPath = '';

			if (is_file($cfgFile)) {
				include_once($cfgFile);

				$ninjaboardConfig =& NinjaboardConfig::getInstance();

				$avatarsPath = $ninjaboardConfig->getAvatarSettings('avatar_path');

				for ($i=0,$n=count($comments); $i < $n; $i++) {
					$userid = (int) $comments[$i]->userid;

					// profile link
					$comments[$i]->profileLink = $userid ? JoomlaTuneRoute::_($profileLink . $avatars[$userid]->id) : '';

					// avatar
				        if (isset($avatars[$userid]) && $avatarsPath != '') {
        					$avatarFile = $avatarsPath . DS . $avatars[$userid]->avatar;

	        				if (file_exists(JPATH_SITE . DS . $avatarFile)) {
							$comments[$i]->avatar = plgJCommentsAvatarImg(JURI::root() . $avatarFile);
	        				} else {
							$comments[$i]->avatar = '';
        					}
					} else {
						$comments[$i]->avatar = '';
				        }
				}
			}
			unset($avatars);
			break;

		case 'magazine':
			if (count($users)) {
			        $db->setQuery('SELECT userid, images as avatar FROM #__magazine_users WHERE userid in (' . implode(',', $users)  . ')');
			        $avatars = $db->loadObjectList('userid');
				unset($users);
			} else {
				$avatars = array();
			}

			$_Itemid = '';

			if ((JCOMMENTS_JVERSION == '1.0') && ($avatar_link)) {
    				$db->setQuery('SELECT id FROM #__menu WHERE link="index.php?option=com_magazine"');
    				$_Itemid = $db->loadResult();

				if ($_Itemid != 0) {
					$_Itemid = '&Itemid=' . $_Itemid;
				} else {
					$_Itemid = '';
				}
			}

			for ($i=0,$n=count($comments); $i < $n; $i++) {
				$userid = (int) $comments[$i]->userid;

				// profile link
				if (JCOMMENTS_JVERSION == '1.5') {
					$comments[$i]->profileLink = $userid ? JRoute::_('index.php?option=com_magazine&func=author_articles&authorid=' . $userid) : '';
				} else {
					$comments[$i]->profileLink = $userid ? sefRelToAbs('index.php?option=com_magazine&func=author_articles&authorid=' . $userid . $_Itemid) : '';
				}

				// avatar
				$comments[$i]->avatar = '';
			        
			        if (isset($avatars[$userid]) && $avatars[$userid]->avatar != '') {
			        	$avatar = explode("\n", $avatars[$userid]->avatar);
			        	if (count($avatar) >= 1) {
			        		$avatar = $avatar[0];

				        	if (is_file(JPATH_SITE . DS . "images" . DS . $avatar)) {
							$comments[$i]->avatar = plgJCommentsAvatarImg($mainframe->getCfg('live_site') . '/images/'. $avatar);
						}
					}
			        }
			}

			unset($avatars);
			break;

		case 'jomsocial':
			if (count($users)) {
			        $db->setQuery('SELECT userid, thumb as avatar FROM #__community_users WHERE userid in (' . implode(',', $users)  . ')');
			        $avatars = $db->loadObjectList('userid');
				unset($users);
			} else {
				$avatars = array();
			}

			for ($i=0,$n=count($comments); $i < $n; $i++) {
				$userid = (int) $comments[$i]->userid;

				// profile link
				$comments[$i]->profileLink = $userid ? JRoute::_('index.php?option=com_community&view=profile&userid=' . $userid) : '';

				// avatar
			        if (isset($avatars[$userid]) && $avatars[$userid]->avatar != '') {
        				if (file_exists(JPATH_SITE . DS . $avatars[$userid]->avatar)) {
						$comments[$i]->avatar = plgJCommentsAvatarImg(JURI::base() . $avatars[$userid]->avatar);
        				} else {
						$comments[$i]->avatar = '';
       					}
				} else {
					$comments[$i]->avatar = '';
			        }
			}
			unset($avatars);
			break;

		case 'p8pbb':
			if (count($users)) {
				$users2 = array();			
				for ($i=0,$n=count($comments); $i < $n; $i++) {
					if ($comments[$i]->userid) {
						$users2[JString::strtolower($comments[$i]->username)] = 1;
					}
				}
				$users2 = array_keys($users2);
				
				// load data
				require_once(JPATH_SITE.DS.'components'.DS.'com_jmrphpbb'.DS.'helper.php');
				$phpbb_root_path = jmrphpbbHelper::getPath(true);
				$fdb =& JmrphpbbHelper::getForumDB();
				$query = 'SELECT user_id, user_avatar_type, user_avatar, username_clean FROM #__users WHERE username_clean IN (\'' . implode("','", $users2) . '\')';
				$fdb->setQuery($query);
				$avatars = $fdb->loadObjectList('username_clean');
				JmrphpbbHelper::_restoreDB('j');
				unset($users2);
			} else {
				$avatars = array();
			}

			// get bridge Itemid
			$menus =& JSite::getMenu();
			$items = $menus->getItems('link', 'index.php?option=com_jmrphpbb&view=index');
			$Itemid = (count($items) > 0) ? $items[0]->id : '0';
			
			for ($i=0, $n=count($comments); $i<$n; $i++) {
				$fusername = JString::strtolower($comments[$i]->username);
				
				if (!isset($avatars[$fusername])) {
					$comments[$i]->avatar = '';
					$comments[$i]->profileLink = '';
				} else {
					// profile link
					$comments[$i]->profileLink = JRoute::_('index.php?option=com_jmrphpbb&jview=members&mode=viewprofile&u='.$avatars[$fusername]->user_id.'&Itemid='.$Itemid);

					// avatar
					switch ($avatars[$fusername]->user_avatar_type) {
						case 1:
							$avatar_path = $phpbb_root_path . 'download/file.php?avatar=';
							break;
						
						case 3:
							$avatar_path = $phpbb_root_path . 'images/avatars/gallery' . '/';
							break;
						default:
							$avatar_path = '';
							break;
					}
					if ($avatar_path != '') {
						$comments[$i]->avatar = plgJCommentsAvatarImg($avatar_path . $avatars[$fusername]->user_avatar);
					} else {
						$comments[$i]->avatar = '';
					}
				}
			}
			unset($avatars);
			break;

		case 'phpbb3_jf':
			if (count($users)) {

				$users2 = array();
				for ($i=0,$n=count($comments); $i < $n; $i++) {
					if ($comments[$i]->userid) {
						$users2[JString::strtolower($comments[$i]->username)] = 1;
					}
				}
				$users2 = array_keys($users2);

				require_once(JPATH_ADMINISTRATOR .DS.'components'.DS.'com_jfusion'.DS.'models'.DS.'model.factory.php');
				$jfparams = JFusionFactory::getParams('phpbb3');
				$jfdb = JFusionFactory::getDatabase('phpbb3');

				$query = 'SELECT ' . $db->nameQuote('user_id') .', ' . $db->nameQuote('user_avatar_type') . ', ' . $db->nameQuote('user_avatar') . ', ' . $db->nameQuote('username_clean')
						. ' FROM ' . $db->nameQuote($jfparams->get('database_prefix') . 'users') 
						. ' WHERE ' . $db->nameQuote('username_clean') . 'in (\'' . implode("','", $users2) . '\')';
				$jfdb->setQuery($query);
				$avatars = $jfdb->loadObjectList('username_clean');

				unset($users2);
			} else {
				$avatars = array();
			}

			// get JFusion menu Itemid
			$menus = &JSite::getMenu();
			$items = $menus->getItems('link', 'index.php?option=com_jfusion');
			$Itemid = (count($items) > 0) ? $items[0]->id : '0';

			for ($i=0,$n=count($comments); $i < $n; $i++) {
				$fusername = JString::strtolower($comments[$i]->username);

				if (!isset($avatars[$fusername])) {
					$comments[$i]->avatar = '';
					$comments[$i]->profileLink = '';
				} else {
					// profile link
					$comments[$i]->profileLink = JRoute::_('index.php?mode=viewprofile&u=' . $avatars[$fusername]->user_id . '&jfile=memberlist.php&option=com_jfusion&Itemid=' . $Itemid);

					// avatar path
					switch ($avatars[$fusername]->user_avatar_type) {
						case 1:
							$avatar_path = $jfparams->get('source_url') . 'download/file.php?avatar=';
							break;

						case 3:
							$avatar_path = $jfparams->get('source_url') . 'images/avatars/gallery' . '/';
							break;

						default:
							$avatar_path = '';
							break;
					}

					if ($avatar_path != '' || $avatars[$fusername]->user_avatar_type == 2) {
						$comments[$i]->avatar = plgJCommentsAvatarImg($avatar_path . $avatars[$fusername]->user_avatar);
					} else {
						$comments[$i]->avatar = '';
					}
				} 
			}
			unset($avatars);
			break;

		case 'phpbb3_rb':
			// code by Darkick
			if (count($users)) {

				$users2 = array();
				for ($i=0,$n=count($comments); $i < $n; $i++) {
					if ($comments[$i]->userid) {
						$users2[$comments[$i]->username] = 1;
					}
				}
				$users2 = array_keys($users2);

				$table =& JTable::getInstance('component');
				$table->loadByOption('com_rokbridge');
				$rbparams = new JParameter($table->params, JPATH_ADMINISTRATOR.DS.'components'.DS.'com_rokbridge'.DS.'config.xml');
				$rbphpbb3_path = $rbparams->get('phpbb3_path');
				
				require_once(JPATH_BASE.DS.$rbphpbb3_path.DS.'config.php');
				$rbdb_options = array(
					'driver'	=> $dbms,
					'host'		=> $dbhost . ($dbport ? ':'.$dbport : ''),
					'database'	=> $dbname,
					'user'		=> $dbuser,
					'password'	=> $dbpasswd,
					'prefix'	=> $table_prefix
				);
				$rbdb = &JDatabase::getInstance($rbdb_options);

				$query = 'SELECT ' . $db->nameQuote('user_id') .', ' . $db->nameQuote('user_avatar_type') . ', ' . $db->nameQuote('user_avatar') . ', ' . $db->nameQuote('username')
						. ' FROM ' . $db->nameQuote('#__users') 
						. ' WHERE ' . $db->nameQuote('username') . ' IN (\'' . implode("','", $users2) . '\')';
				$rbdb->setQuery($query);
				$avatars = $rbdb->loadObjectList('username');

				unset($users2);
			} else {
				$avatars = array();
			}

			for ($i=0,$n=count($comments); $i < $n; $i++) {
				$fusername = $comments[$i]->username;

				if (!isset($avatars[$fusername])) {
					$comments[$i]->avatar = '';
					$comments[$i]->profileLink = '';
				} else {
					// profile link
					$comments[$i]->profileLink = JURI::base(). $rbphpbb3_path . '/memberlist.php?mode=viewprofile&amp;u=' . $avatars[$fusername]->user_id;

					// avatar path
					switch ($avatars[$fusername]->user_avatar_type) {
						case 1:
							$avatar_path = JURI::base(). $rbphpbb3_path . '/download/file.php?avatar=';
							break;

						case 3:
							$avatar_path = JURI::base(). $rbphpbb3_path . '/images/avatars/gallery' . '/';
							break;

						default:
							$avatar_path = '';
							break;
					}

					if ($avatar_path != '' || $avatars[$fusername]->user_avatar_type == 2) {
						$comments[$i]->avatar = plgJCommentsAvatarImg($avatar_path . $avatars[$fusername]->user_avatar);
					} else {
						$comments[$i]->avatar = '';
					}
				} 
			}
			unset($avatars);
			break;

		case 'k2':
			if (count($users)) {
			        $db->setQuery('SELECT userid, image as avatar FROM #__k2_users WHERE userid in (' . implode(',', $users)  . ')');
			        $avatars = $db->loadObjectList('userid');
				unset($users);
			} else {
				$avatars = array();
			}

			require_once (JPATH_SITE.DS.'components'.DS.'com_k2'.DS.'helpers'.DS.'route'.'.php');

			for ($i=0,$n=count($comments); $i < $n; $i++) {
				$userid = (int) $comments[$i]->userid;

				// profile link
				$comments[$i]->profileLink = $userid ? JRoute::_(K2HelperRoute::getUserRoute($userid)) : '';

				// avatar
			        if (isset($avatars[$userid]) && $avatars[$userid]->avatar != '') {
        				if (file_exists(JPATH_SITE . DS . 'media' . DS . 'k2' . DS . 'users' . DS . $avatars[$userid]->avatar)) {
						$comments[$i]->avatar = plgJCommentsAvatarImg(JURI::root() . 'media/k2/users/'. $avatars[$userid]->avatar);
        				} else {
						$comments[$i]->avatar = '';
       					}
				} else {
					$comments[$i]->avatar = '';
			        }
			}
			unset($avatars);
			break;

		case 'joomsuite_user':
			if (count($users)) {
			        $db->setQuery('SELECT id, username as avatar FROM #__users WHERE id in (' . implode(',', $users)  . ')');
			        $avatars = $db->loadObjectList('id');
				unset($users);
			} else {
				$avatars = array();
			}

			jimport('joomla.filesystem.file');
			$ini = JFile::read(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_juser'.DS.'config.ini');
			$params = new JParameter($ini);
			$avatarsPath = $params->get('general::avatars_dir');

			$menus = &JSite::getMenu();
			$items = $menus->getItems('link', 'index.php?option=com_juser');
			$_Itemid = (count($items) > 0) ? $items[0]->id : '';

			if ($_Itemid != '') {
				$_Itemid = '&Itemid=' . $_Itemid;
			}

			for ($i=0,$n=count($comments); $i < $n; $i++) {
				$userid = (int) $comments[$i]->userid;

				// profile link
				$comments[$i]->profileLink = $userid ? JRoute::_('index.php?option=com_juser&view=userlist&layout=profile&id=' . $userid . $_Itemid) : '';

				// avatar
				$comments[$i]->avatar = '';

				if ($userid) {
					$avatar = $avatarsPath.'/'.strtolower($avatars[$userid]->avatar).'.jpg';
					if (JFile::exists(JPATH_ROOT.DS.$avatar)) {
						$comments[$i]->avatar = plgJCommentsAvatarImg(JURI::root() . $avatar);
					}
				}
			}

			unset($avatars);
			break;

		case 'gravatar':
		default:
			for ($i=0,$n=count($comments); $i < $n; $i++) {
				// profile link
				$comments[$i]->profileLink = '';
				// avatar
				$comments[$i]->avatar = '<img src="http://www.gravatar.com/avatar.php?gravatar_id='. md5($comments[$i]->email) .'&default=' . urlencode($mainframe->getCfg('live_site') . '/components/com_jcomments/images/no_avatar.png') . '" alt="" border="0" />';
			}
			break;
 	}
 	unset($pluginParams, $users);

 	if ($avatar_custom_noavatar == '' && $avatar_noavatar == 'custom') {
		$avatar_noavatar = 'default'; 	
 	}

 	$default_noavatar = plgJCommentsAvatarImg($mainframe->getCfg('live_site') . '/components/com_jcomments/images/no_avatar.png');

	if ($avatar_custom_noavatar != '' && $avatar_custom_noavatar[0] != '/') {
		$avatar_custom_noavatar = '/' . $avatar_custom_noavatar;
	}

 	$custom_noavatar = plgJCommentsAvatarImg($mainframe->getCfg('live_site') . $avatar_custom_noavatar);

 	// set noavatar image
	for ($i=0,$n=count($comments); $i < $n; $i++) {
		if ($comments[$i]->avatar == '') {
			switch($avatar_noavatar) {
			
				case 'gravatar':
					$comments[$i]->avatar = plgJCommentsAvatarImg(plgJCommentsGetGravatar($comments[$i]->email));
					break;
				case 'custom':
					$comments[$i]->avatar = $custom_noavatar;
					break;
				case 'default':
					$comments[$i]->avatar = $default_noavatar;
					break;
			}
		}
		// avatar link
		if ($avatar_link && $comments[$i]->profileLink != '') {
			$comments[$i]->avatar = plgJCommentsAvatarAppendLink($comments[$i]->avatar, $comments[$i]->profileLink, $avatar_link_target);			
		}
	}

	return;
} 
?>