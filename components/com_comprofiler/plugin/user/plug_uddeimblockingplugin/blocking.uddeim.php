<?php
// ********************************************************************************************
// Title          CB Plugin to add an tab for uddeIM's blocking function
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

class getUddeIMblockingTab extends cbTabHandler {

	var $config;
	var $absolute_path;
	var $pathtoadmin;
	var $pathtouser;
	var $pathtosite;
	var $mosConfig_lang;
	var $myuserid;
	var $mygroupid;

	function getUddeIMblockingTab() {
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
		$this->pathtoadmin   = uddeIMgetPath('absolute_path')."/administrator/components/com_uddeim";
		$this->pathtouser    = uddeIMgetPath('absolute_path')."/components/com_uddeim";
		$this->pathtosite    = uddeIMgetPath('live_site');

		if (file_exists( $this->pathtoadmin."/config.class.php" ))
			include_once( $this->pathtoadmin."/config.class.php" );
		if (file_exists( $this->pathtouser."/includes.db.php" ))
			include_once( $this->pathtouser."/includes.db.php" );
		if (file_exists( $this->pathtouser."/getpiclink.php" ))
			include_once( $this->pathtouser."/getpiclink.php" );
		$this->config = new uddeimconfigclass();

		$this->mosConfig_lang = uddeIMgetLang();
		$this->myuserid = uddeIMgetUserID();
		$this->mygroupid = uddeIMgetGroupID();
	}

	function getDisplayTab($tab,$user,$ui) {
		global $_CB_database;

		if (!$this->config->blocksystem)
			return null;

		if (!$this->myuserid)
			return null;

		$params = $this->params;
		$is_enabled = (int)$params->get('uddeIMblockingPlugEnabled', "1");

		$this->_getLanguageFile();

		$action  = uddeIMmosGetParam ($_GET, 'action', '');
		$blocker = (int)uddeIMmosGetParam ($_REQUEST, 'blocker', 0);
		$blocked = (int)uddeIMmosGetParam ($_REQUEST, 'blocked', 0);

		if ($is_enabled) {

			if ($action == "delete") {
				if ($blocked && $blocker && $blocker==$this->myuserid) {
					$sql = "DELETE FROM #__uddeim_blocks WHERE blocked=".$blocked." AND blocker=".$blocker;
					$_CB_database->setQuery( $sql );
					if (!$_CB_database->query())
						die("SQL error" . $_CB_database->stderr(true));
					$ret = '<fieldset><legend>'._UDDEIM_CBPLUG_BLOCKINGCFG.'</legend>';
					$ret .= _UDDEIM_CBPLUG_NOWUNBLOCKED;
					$ret .= "<br /><br /><a href='".uddeIMsefRelToAbs("index.php?option=com_comprofiler&task=userProfile&user=".$user->id."&tab=getUddeIMblockingTab")."'>"._UDDEIM_CBPLUG_CONT."</a>";
					$ret .= '</fieldset>';
					return $ret;
				}
			} elseif ($action == "add") {
				if ($blocked && $blocker && $blocker==$this->myuserid) {
					$_CB_database->setQuery("SELECT count(id) FROM #__uddeim_blocks WHERE blocker=".$blocker." AND blocked=".$blocked);
					$exists = (int)$_CB_database->loadResult();
					if (!$exists) {
						$sql = "INSERT INTO #__uddeim_blocks (blocker, blocked) VALUES (".$blocker.", ".$blocked.")";
						$_CB_database->setQuery( $sql );
						if (!$_CB_database->query())
							die("SQL error" . $_CB_database->stderr(true));
					}
					$ret = '<fieldset><legend>'._UDDEIM_CBPLUG_BLOCKINGCFG.'</legend>';
					$ret .= _UDDEIM_CBPLUG_NOWBLOCKED;
					$ret .= "<br /><br /><a href='".uddeIMsefRelToAbs("index.php?option=com_comprofiler&task=userProfile&user=".$user->id."&tab=getUddeIMblockingTab")."'>"._UDDEIM_CBPLUG_CONT."</a>";
					$ret .= '</fieldset>';
					return $ret;
				}
			} else {

				if ($user->id!=$this->myuserid) {
                     
					$_CB_database->setQuery("SELECT count(id) FROM #__uddeim_blocks WHERE blocker=".(int)$this->myuserid." AND blocked=".(int)$user->id);
					$is_blocked = (int)$_CB_database->loadResult();

					if ($is_blocked) {
						// $ret = '<form action="index.php?option=com_comprofiler&task=userProfile&user='.$user->id.'&tab=getUddeIMblockingTab&action=none" method="post">';
						$ret = '<fieldset><legend>'._UDDEIM_CBPLUG_BLOCKINGCFG.'</legend>';
						$ret .= _UDDEIM_CBPLUG_BLOCKED."<br /><br /><a href='".uddeIMsefRelToAbs("index.php?option=com_comprofiler&task=userProfile&user=".$user->id."&tab=getUddeIMblockingTab&blocker=".$this->myuserid."&blocked=".$user->id."&action=delete")."'>"._UDDEIM_CBPLUG_DOUNBLOCK."</a>";
						$ret .= '</fieldset>';
						return $ret;
					} else {
						// $ret = '<form action="index.php?option=com_comprofiler&task=userProfile&user='.$user->id.'&tab=getUddeIMblockingTab&action=none" method="post">';
						$ret = '<fieldset><legend>'._UDDEIM_CBPLUG_BLOCKINGCFG.'</legend>';
						$ret .= _UDDEIM_CBPLUG_UNBLOCKED."<br /><br /><a href='".uddeIMsefRelToAbs("index.php?option=com_comprofiler&task=userProfile&user=".$user->id."&tab=getUddeIMblockingTab&blocker=".$this->myuserid."&blocked=".$user->id."&action=add")."'>"._UDDEIM_CBPLUG_DOBLOCK."</a>";
						$ret .= '</fieldset>';
						return $ret;
					}

				} else {
						$blockedusers = uddeIMselectBlockerBlockedList($this->myuserid, $this->config);
						$howmanyblocks=count($blockedusers);
						// $ret = '<form action="index.php?option=com_comprofiler&task=userProfile&user='.$user->id.'&tab=getUddeIMblockingTab&action=none" method="post">';
						$ret = '<fieldset><legend>'._UDDEIM_CBPLUG_BLOCKINGCFG.'</legend>';
						if ($howmanyblocks) {
							$ret .= "<p>"._UDDEIM_BLOCKS_EXP."</p>\n";
							$ret .= "<p>"._UDDEIM_YOUBLOCKED_PRE.$howmanyblocks._UDDEIM_YOUBLOCKED_POST."</p>\n";
							foreach($blockedusers as $blockeduser) {
								if ($blockeduser->displayname)
									$ret .= uddeIMgetLinkOnly($blockeduser->blocked, "<b>".$blockeduser->displayname."</b>", $config);
								else
									$ret .= _UDDEADM_NONEORUNKNOWN;
								$ret .= "&nbsp;&nbsp;";
								$ret .= "<a href='".uddeIMsefRelToAbs("index.php?option=com_comprofiler&task=userProfile&user=".$user->id."&tab=getUddeIMblockingTab&blocker=".$blockeduser->blocker."&blocked=".$blockeduser->blocked."&action=delete")."'>"._UDDEIM_CBPLUG_UNBLOCKNOW."</a><br />";
							}
						} else {
							$ret .= "<p>"._UDDEIM_NOBODYBLOCKED."</p>\n";
						}

						$ret .= '</fieldset>';
						return $ret;
				}
			}
		}
		return null;
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
}
