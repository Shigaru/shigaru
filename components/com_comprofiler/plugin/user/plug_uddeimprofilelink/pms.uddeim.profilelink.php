<?php
// ********************************************************************************************
// Title          udde Instant Messages Profilelink (uddeIM)
// Description    Instant Messages System for Mambo 4.5 / Joomla 1.0 / Joomla 1.5
// Author         © 2007-2009 Stephan Slabihoud
// License        This is free software and you may redistribute it under the GPL.
//                uddeIM comes with absolutely no warranty.
//                Use at your own risk. For details, see the license at
//                http://www.gnu.org/licenses/gpl.txt
//                Other licenses can be found in LICENSES folder.
//                Redistributing this file is only allowed when keeping the header unchanged.
// ********************************************************************************************

if (!(defined('_JEXEC') || defined('_VALID_MOS'))) { die( 'Direct Access to this location is not allowed.' ); }

class getuddeimLinkTab extends cbTabHandler {

	var $config;
	var $absolute_path;
	var $mosConfig_lang;
	var $mosConfig_sitename;
	var $mosConfig_live_site;
	var $myuserid;
	var $mygroupid;
	var $pathtoadmin;

	function getuddeimLinkTab() {
		$this->cbTabHandler();
		$uddeim_isadmin = 0;
		if ( defined( 'JPATH_ADMINISTRATOR' ) ) {
			$ver = new JVersion();
			if (!strncasecmp($ver->RELEASE, "1.6", 3)) {
				require_once(JPATH_SITE.'/components/com_uddeim/uddeimlib16.php');
			} else {
				require_once(JPATH_SITE.'/components/com_uddeim/uddeimlib15.php');
			}
		} else {
			global $mainframe;
			require_once($mainframe->getCfg('absolute_path').'/components/com_uddeim/uddeimlib10.php');
		}

		$this->absolute_path = uddeIMgetPath('absolute_path');

		if(file_exists($this->absolute_path."/administrator/components/com_uddeim/config.class.php")) {
			include_once($this->absolute_path."/administrator/components/com_uddeim/config.class.php");
		}
		$this->config = new uddeimconfigclass();
		$this->mosConfig_lang = uddeIMgetLang();
		$this->mosConfig_sitename = uddeIMgetSitename();
		$this->mosConfig_live_site = uddeIMgetPath('live_site');
		$this->pathtoadmin = uddeIMgetPath('admin');
		$this->myuserid = uddeIMgetUserID();
		$this->mygroupid = uddeIMgetGroupID();
	}

	function _checkPMSinstalled($pmsType) {
		if (!file_exists($this->absolute_path.'/components/com_uddeim/uddeim.php')) {
			$this->_setErrorMSG(_UE_PMS_NOTINSTALLED);
			return false;
		}
		return true;
	}
	
	function getDisplayTab($tab,$user,$ui) {
		global $_CB_database;

		$myself = $this->myuserid;
		if ($myself == $user->id)
			return null;

		$my_gid = (int)$this->_uddeIMgetGID($myself);

		$this->_getLanguageFile();

		$params = $this->params;
		$showTitle = $params->get('showTitlePL', "1");
		$noUserlist = $params->get('noUserlistPL', "0");
		$noTo = $params->get('noToPL', "0");
		$textLink = $params->get('textLinkPL', "Send Private Message");

		// check blocking
		if ($this->config->blocksystem) {
			$sql="SELECT count(id) FROM #__uddeim_blocks WHERE blocker=".(int)$user->id." AND blocked=".(int)$myself;
			$_CB_database->setQuery($sql);
			$isblocked=$_CB_database->loadResult();
			if ($isblocked) {
				return null;	// don't show a box when user is blocked
			}
		}
		// now check group blocking
		if ($my_gid==18) {		// I am a registered user, so check if I am allowed to send to this group
			$is_group_blocked = $this->_uddeIMisRecipientBlockedReg($myself, $user->id, $this->config);
			if ($is_group_blocked) {
				return null;
			}
		}

		$value = 0;
		if ($noUserlist)
			$value += 3;
		if ($noTo)
			$value += 4;

		$link = $this->_getPMSlink($user->id);
		if ($value)
			$link .= "&nouserlist=".(int)$value;

		$return = "";
		if($showTitle) $return .= "<div class=\"titleCell\" style=\"width:95%; align: left; text-align:left; margin-left: 0px;\">"
							.$this->_unHtmlspecialchars($this->_getLangDefinition($tab->title))."</div>\n";

		if($tab->description != null)
			$return .= "<div class=\"tab_Description\">".$this->_unHtmlspecialchars($this->_getLangDefinition($tab->description))."</div>\n";

		$return .= "<div class=\"fieldCell\" style=\"text-align:left;width:95%;\">";
		$return .= "<a href='".$link."'>".$textLink."</a>";
		$return .= "</div>";

		return $return;
    }
		
	function _uddeIMgetGID($myself) {
		global $_CB_database;
		$sql="SELECT gid FROM #__users WHERE id=".(int)$myself;
		$_CB_database->setQuery($sql);
		$my_gid=$_CB_database->loadResult();
		return $my_gid;
	}

	function _uddeIMisRecipientBlockedReg($myself, $toid, $config) {
		global $_CB_database;
		$togid = -1;		// default group (uddeim intern) for public users
		if ($toid)			// we have an id, so get group for this user
			$togid = (int)$this->_uddeIMgetGID($toid);
		if (!$togid)
			$togid = -1;	// we could not find a group, so assume it is a Public user
		$acl = explode(",",$config->blockgroups);
		if (!is_array($acl))
			$acl = array();
		$blocked = 0;
		if (in_array($togid, $acl)) {	// either we have a recipient GID or recipient is a Public user (GID=-1), so we check if this user is blocked
			$blocked = 1;				// yes, it is
		}
		if ($blocked && $config->unblockCBconnections) {	// unblock CB connections?
			// Am I on the recipients user list?
			$sql = "SELECT count(m.memberid) FROM #__comprofiler_members AS m, #__users AS u WHERE m.memberid=u.id AND u.block=0 AND m.referenceid=".(int)$toid." AND m.memberid=".(int)$myself;
			$_CB_database->setQuery($sql);
			$friends=(int)$_CB_database->loadResult();	// this person might be on the connections list
			if ($friends>0)						// yes, its on the list, so allow as recipient
				$blocked = 0;
		}
		return $blocked;
	}

	function _getPMSlink($toid) {
		global $_CB_database;

		$pmsurlSend="index.php?option=com_uddeim&task=new&recip=".$toid;
		$item_id = $this->_uddeIMgetItemid($this->config);
		if ($item_id) {
			$pmsurlSend .= "&Itemid=".$item_id;
		}
		return $pmsurlSend;
	}

	function _uddeIMgetItemid($config) {
		global $_CB_database;
		if ($config->overwriteitemid)
			return (int)$config->useitemid;
		// first try to find a published link
		$sql="SELECT id FROM #__menu WHERE link LIKE '%com_uddeim%' AND published=1 AND access".
				($this->mygroupid==0 ? "=" : "<=").$this->mygroupid." LIMIT 1";
		$_CB_database->setQuery($sql);
		$found = (int)$_CB_database->loadResult();
		if (!$found) {
			// when no published link has been found, try to find an unpublished one
			$sql="SELECT id FROM #__menu WHERE link LIKE '%com_uddeim%' AND published=0 AND access".
					($this->mygroupid==0 ? "=" : "<=").$this->mygroupid." LIMIT 1";
			$_CB_database->setQuery($sql);
			$found = (int)$_CB_database->loadResult();
		}
		return $found;
	}

	function _getLanguageFile() {
		if(!defined('_UDDEIM_INBOX')) {
			$postfix = "";
			if ($this->config->languagecharset)
				$postfix = ".utf8";
			if (file_exists($this->pathtoadmin.'/language'.$postfix.'/'.$this->mosConfig_lang.'.php')) {
				include_once($this->pathtoadmin.'/language'.$postfix.'/'.$this->mosConfig_lang.'.php');
			} elseif (file_exists($this->pathtoadmin.'/language'.$postfix.'/english.php')) {
				include_once($this->pathtoadmin.'/language'.$postfix.'/english.php');
			} elseif (file_exists($this->pathtoadmin.'/language/english.php')) {
				include_once($this->pathtoadmin.'/language/english.php');
			}
		}
	}
	function _unHtmlspecialchars( $text ) {
		return str_replace( array( "&amp;", "&quot;", "&#039;", "&lt;", "&gt;" ), array( "&", "\"", "'", "<", ">" ), $text );
	}
	function _getLangDefinition($text) {
		// check for '::' as a workaround of bug #42770 in PHP 5.2.4 with optimizers:
		if ( ( strpos( $text, '::' ) === false ) && defined( $text ) ) {
			$returnText		=	constant( $text ); 
		} else {
			$returnText		=	$text;
		}
		return $returnText;
	}
}
