<?php
// ********************************************************************************************
// Title          udde Instant Messages (uddeIM)
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

// 1: UddeIM 0.9

// nants delete user code (uncomment next line to activate it)
// $_PLUGINS->registerFunction( 'onAfterDeleteUser', 'userDeleted','getmypmsproTab' );

class getuddeimTab extends cbPMSHandler {

	var $config;
	var $absolute_path;
	var $mosConfig_lang;
	var $mosConfig_sitename;
	var $mosConfig_live_site;
	var $mosConfig_offset;
	var $myuserid;
	var $mygroupid;

	function getuddeimTab() {
		$this->cbPMSHandler();
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
		$this->mosConfig_offset = uddeIMgetOffset();
		$this->myuserid = uddeIMgetUserID();
		$this->mygroupid = uddeIMgetGroupID();
	}
	function _setStatusMenuSBstats($sbConfig, $user, &$params, $sbUserDetails) {
	}
	function _checkPMSinstalled($pmsType) {
		if (!file_exists($this->absolute_path.'/components/com_uddeim/uddeim.php')) {
			$this->_setErrorMSG(_UE_PMS_NOTINSTALLED);
			return false;
		}
		return true;
	}

	function _sendPMSuddesysMSG($udde_toid,$udde_fromid,$to,$from,$sub,$msg) {
		global $_CB_database; 
		
		$params = $this->params;
		$pmsType = (int)$params->get('pmsType', '1');
		$doObfuscate = (int)$params->get('doObfuscate', '0');

		require_once($this->absolute_path."/components/com_uddeim/crypt.class.php");

		$udde_sysm = "System";
		if($this->config->sysm_username) {
			$udde_sysm = $this->config->sysm_username;		
		}

		// format the message
		if($sub) {
			$udde_msg = "[b]".$sub."[/b]\n\n".$msg;
		} else {
			$udde_msg = $msg;
		}
		
		// now change the <strong> or <b> tags to BB Code
		$udde_msg = str_replace("<strong>","[b]",$udde_msg);
		$udde_msg = str_replace("<b>","[b]",$udde_msg);
		$udde_msg = str_replace("</strong>","[/b]",$udde_msg);
		$udde_msg = str_replace("</b>","[/b]",$udde_msg);
		
		// now change the links to BB code links
		$udde_msg = str_replace("<a href=\"", "[url=", $udde_msg);
		$udde_msg = str_replace("<a href=\\\"", "[url=", $udde_msg);		
		$udde_msg = str_replace("\">", "]", $udde_msg);
		$udde_msg = str_replace("\\\">", "]", $udde_msg);		
		$udde_msg = str_replace("</a>", "[/url]", $udde_msg);
		$udde_msg = str_replace("<br/>", "\n", $udde_msg);
		$udde_msg = str_replace("<br />", "\n", $udde_msg);
		$udde_msg = str_replace("<br>", "\n", $udde_msg);
		$udde_msg = str_replace("&amp;", "&", $udde_msg);
		
		// workaround
		// commands above made the closing bracket of the div to a ]
		// we change it back to a > here so that the next command can strip the div entirely
		$udde_msg = str_replace("cbNotice\\\"]", "cbNotice\\\">", $udde_msg);
		$udde_msg = str_replace("cbNotice]", "cbNotice\">", $udde_msg);
		$udde_msg = str_replace("cbNotice\\]", "cbNotice\">", $udde_msg);
		
		// now strip the remaining html tags
		$udde_msg = strip_tags($udde_msg);
		
		// get current time but recognize mosConfig Offset
		$udde_time=$this->_pmsUddeGetTime($this->config->timezone);
		
		// set the udde systemmessage username to the virtual sender
		if ($from)
			$udde_sysm=$from;
		
		// try to find the realnames settings of udde
		if($this->config->realnames) {
			$sql="SELECT name FROM #__users WHERE id=".(int) $udde_fromid;
			$_CB_database->setQuery($sql);
			$quereply=$_CB_database->loadResult();
			if($quereply) {
				$udde_sysm=$quereply;
			}
		}

		if ($doObfuscate) {
			$cm = $udde_msg;
			$cm = $this->_uddeUnescapeCrypt($cm);
			$cm = uddeIMencrypt($cm,$this->config->cryptkey,CRYPT_MODE_BASE64);
			$sql="INSERT INTO #__uddeim (fromid, toid, message, datum, systemmessage, disablereply, cryptmode, crypthash) VALUES (".$udde_fromid.", ".$udde_toid.", '".$cm."', ".$udde_time.", '".$udde_sysm."', 0, 1,'".md5($this->config->cryptkey)."')";
		} else {
			$cm = $udde_msg;
			$cm = $this->_uddeUnescape($cm);
			$cm = addslashes($cm);
			$sql="INSERT INTO #__uddeim (fromid, toid, message, datum, systemmessage, disablereply) VALUES (".$udde_fromid.", ".$udde_toid.", '".$cm."', ".$udde_time.", '".$udde_sysm."', 0)";
		}

		// escaping not necessary, already escaped before this internal function gets called now insert the message as system message 
		// REPLY IS NOT DISABLED AS THE SYSTEMMESSAGE USERNAME WILL CONTAIN A VALID USERNAME
		if($udde_fromid && $udde_toid) {
			$_CB_database->SetQuery($sql);
			if (!$_CB_database->query()) {
				die("SQL error" . $_CB_database->stderr(true));
			}
			$insID = $_CB_database->insertid();
			// E-Mail notification code
			$this->_pmsUddeNotify($insID, $udde_fromid, $udde_toid, $udde_msg, $udde_sysm);
		}
	}

	function _sendPMSuddeimMSG($udde_toid,$udde_fromid,$to,$from,$sub,$msg) {
		global $_CB_database; 
		
		$params = $this->params;
		$pmsType = (int)$params->get('pmsType', '1');
		$doObfuscate = (int)$params->get('doObfuscate', '0');

		require_once($this->absolute_path."/components/com_uddeim/crypt.class.php");

		// format the message
		if($sub) { // is actually impossible
			$udde_msg = "[b]".$sub."[/b]\n\n".$msg;
		} else {
			$udde_msg = $msg;
		}
		
		// now strip the remaining html tags
		$udde_msg = strip_tags($udde_msg);
		// escaping dangerous stuff not necessary, already escaped before this internal function gets called
		
		// get current time but recognize mosConfig Offset
		$udde_time=$this->_pmsUddeGetTime($this->config->timezone);
		
		if ($doObfuscate) {
			$cm = $udde_msg;
			$cm = $this->_uddeUnescapeCrypt($cm);
			$cm = uddeIMencrypt($cm,$this->config->cryptkey,CRYPT_MODE_BASE64);
   			$sql="INSERT INTO #__uddeim (fromid, toid, message, datum, cryptmode, crypthash) VALUES (".$udde_fromid.", ".$udde_toid.", '".$cm."', ".$udde_time.",1,'".md5($this->config->cryptkey)."')";
		} else {
			$cm = $udde_msg;
			$cm = $this->_uddeUnescape($cm);
 			$sql="INSERT INTO #__uddeim (fromid, toid, message, datum) VALUES (".$udde_fromid.", ".$udde_toid.", '".$cm."', ".$udde_time.")";
		}

		if($udde_fromid && $udde_toid) {
			$_CB_database->SetQuery($sql);
			if (!$_CB_database->query()) {
				die("SQL error" . $_CB_database->stderr(true));
			}
			$insID = $_CB_database->insertid();
			// E-Mail notification code
			$this->_pmsUddeNotify($insID, $udde_fromid, $udde_toid, $udde_msg, "");
		}
	}
	
	/**
	* Sends a PMS message
	* @param int userId of receiver (ESCAPED)
	* @param int userId of sender (ESCAPED)
	* @param string subject of PMS message (ESCAPED Subject) 
	* @param string body of PMS message (html, ESCAPED Body)
	* @param boolean false: real user-to-user message = default; true: system-Generated by an action from user $fromid (if non-null)
	* @param boolean false: subject and message body UNESCAPED = default; true: ESCAPED
	* @return boolean : true for OK, or false if ErrorMSG generated. Special error: _UE_PMS_TYPE_UNSUPPORTED : if anonym fromid>=0 sysgenerated unsupported
	*/
	function sendUserPMS($toid, $fromid, $subject, $message, $systemGenerated=false, $escaped=false) {
		global $_CB_database;

		$params = $this->params;
		$pmsType = (int)$params->get('pmsType', '1');

		if (!$this->_checkPMSinstalled($pmsType)) {
			return false;
		}

		$toid	= (int) $toid;
		$fromid	= (int) $fromid;
		if (!$escaped) {
			$subject = $_CB_database->getEscaped($subject);
			$message = $_CB_database->getEscaped($message);
		}

		if ($systemGenerated && !$fromid) {
			if (in_array($pmsType,array(90,91,92))) {
				$this->_setErrorMSG(_UE_PMS_TYPE_UNSUPPORTED);
				return false;
			}
		}

		if ($fromid) {
			$sql="SELECT username FROM #__users WHERE id=".(int)$fromid;
			$_CB_database->setQuery($sql);
			$from = $_CB_database->loadResult();
		} else {
			$from = null;
		}

		$sql="SELECT username FROM #__users WHERE id=".(int)$toid;
		$_CB_database->setQuery($sql);
		$to = $_CB_database->loadResult(); 

		if($systemGenerated || !$fromid) {
			$this->_sendPMSuddesysMSG($toid,$fromid,$to,$from,$subject,$message);
		} else {
			$this->_sendPMSuddeimMSG($toid,$fromid,$to,$from,$subject,$message);				
		}
		return true;
	}
	/**
	* returns all the parameters needed for a hyperlink or a menu entry to do a pms action
	* @param int userId of receiver
	* @param int userId of sender
	* @param string subject of PMS message
	* @param string body of PMS message
	* @param int kind of link: 1: link to compose new PMS message for $toid user. 2: link to inbox of $fromid user; 3: outbox, 4: trashbox,
	  5: link to edit pms options
	* @return mixed array of string {"caption" => menu-text ,"url" => NON-sefRelToAbs relative url-link, "tooltip" => description} or false and errorMSG
	*/
	function getPMSlink($toid, $fromid, $subject, $message, $kind) {
		global $_CB_database;

		$params = $this->params;
		$pmsType = (int)$params->get('pmsType', '1');

		if (!$this->_checkPMSinstalled($pmsType)) {
			return false;
		}

		$pmsurlBase="index.php?option=com_uddeim";
		$pmsurlSend=$pmsurlBase."&amp;task=new&amp;recip=".$toid;
		$pmsurlInbox=$pmsurlBase."&amp;task=inbox";
		$pmsurlOutbox=$pmsurlBase."&amp;task=outbox";
		$pmsurlTrashbox=$pmsurlBase."&amp;task=trashcan";
		$pmsurlOptions=$pmsurlBase."&amp;task=settings";

		// first try to find a published link
		$item_id = $this->_uddeIMgetItemid($this->config);
		$pms_id = $item_id;
		if ($pms_id) {
			$pmsitemid = "&amp;Itemid=".$pms_id;
		} else {
			$pmsitemid = null;
		}

		switch($kind) {
			case 1:
				return array("caption"	=> $params->get('pmsMenuText', _UE_PM_USER),
							 "url"		=> $pmsurlSend.$pmsitemid,
							 "tooltip"	=> $params->get('pmsMenuDesc', _UE_MENU_PM_USER_DESC));
				break;
			case 2:
				return array("caption"	=> $params->get('pmsMenuInboxText', _UE_PM_INBOX),
							 "url"		=> $pmsurlInbox.$pmsitemid,
							 "tooltip"	=> $params->get('pmsMenuInboxDesc', _UE_MENU_PM_INBOX_DESC));
				break;
			case 3:
				return array("caption"	=> $params->get('pmsMenuOutboxText', _UE_PM_OUTBOX),
							 "url"		=> $pmsurlOutbox.$pmsitemid,
							 "tooltip"	=> $params->get('pmsMenuOutboxDesc', _UE_MENU_PM_OUTBOX_DESC));
				break;
			case 4:
				return array("caption"	=> $params->get('pmsMenuTrashboxText', _UE_PM_TRASHBOX),
							 "url"		=> $pmsurlTrashbox.$pmsitemid,
							 "tooltip"	=> $params->get('pmsMenuTrashboxDesc', _UE_MENU_PM_TRASHBOX_DESC));
				break;
			case 5:
				return array("caption"	=> $params->get('pmsMenuOptionsText', _UE_PM_OPTIONS),
							 "url"		=> $pmsurlOptions.$pmsitemid,
							 "tooltip"	=> $params->get('pmsMenuOptionsDesc', _UE_MENU_PM_OPTIONS_DESC));
				break;
			default:
			break;
		}
		$this->_setErrorMSG("Function not supported by this PMS type");
		return false;
	}
	/**
	* gets PMS system capabilities
	* @return mixed array of string {"subject" => boolean ,"body" => boolean} or false if ErrorMSG generated
	*/
	function getPMScapabilites() {
		$params = $this->params;
		$pmsType = (int)$params->get('pmsType', '1');

		if (!$this->_checkPMSinstalled($pmsType)) {
			return false;
		}
		
		$capacity = array( "subject" => true, "body" => true);
		return $capacity;
	}
	/**
	* gets PMS unread messages count
	* @param	int user id
	* @return	mixed number of messages unread by user $userid or false if ErrorMSG generated
	*/
	function getPMSunreadCount($userid) {
		global $_CB_database;

		$params = $this->params;
		$pmsType = (int)$params->get('pmsType', '1');

		if (!$this->_checkPMSinstalled($pmsType)) {
			return false;
		}

		$sql="SELECT count(id) FROM #__uddeim WHERE toread=0 AND toid=".(int) $userid;
		$_CB_database->setQuery($sql);
		$total_pms = $_CB_database->loadResult();	

		return $total_pms;
	}

	/**
	* Generates the HTML to display the user profile tab
	* @param object tab reflecting the tab database entry
	* @param object mosUser reflecting the user being displayed
	* @param int 1 for front-end, 2 for back-end
	* @returns mixed : either string HTML for tab content, or false if ErrorMSG generated
	*/
	function getDisplayTab($tab,$user,$ui) {
		global $_POST, $_CB_OneTwoRowsStyleToggle, $_CB_database;

		$myself = $this->myuserid;
		if (!$myself) {
			return null;
		}

		$usermy = uddeIMgetMy();
		$return = "";

		$params = $this->params;
		$pmsType = (int)$params->get('pmsType', '1');
		$showTitle		= $params->get('showTitle', "1");
		$showSubject	= $params->get('showSubject', "1");
		$width			= $params->get('width', "30");
		$height			= $params->get('height', "5");

		$capabilities = $this->getPMScapabilites();

		if (!$this->_checkPMSinstalled($pmsType) || ($capabilities === false)) {
			return false;
		}
		if ($myself == $user->id) {		// do not send messages to myself
			return null;
		}

		$my_gid = (int)$this->_uddeIMgetGID($myself);

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
		
		$newsub = null;
		$newmsg = null;

		// send PMS from this tab form input:
		if ( cbGetParam( $_POST, $this->_getPagingParamName("sndnewmsg") ) == _UE_PM_SENDMESSAGE ) {
			$sender = $this->_getReqParam("sender", null);
			$recip = $this->_getReqParam("recip", null);
			if ( $sender && $recip && ($sender==$myself) && ($recip==$user->id) ) {
				$newsub = htmlspecialchars($this->_getReqParam("newsub", null));	//urldecode done in _getReqParam
				$newmsg = $this->_getReqParam("newmsg", null);
//				$newmsg = htmlspecialchars($this->_getReqParam("newmsg", null));	//don't allow html input on user profile!

				if ( ( $newsub || $newmsg ) && isset( $_POST[$this->_getPagingParamName( "protect" )] ) ) {
					$parts	=	explode( '_', $this->_getReqParam('protect', '' ) );

					if ((count($parts)==3) && ($parts[0]=='cbpms1') && (strlen($parts[2])==32) && ($parts[1]==md5($parts[2].$user->id.$user->lastvisitDate.$usermy->password.$usermy->lastvisitDate))) {
						if (!$newsub && $capabilities["subject"]) $newsub = _UE_PM_PROFILEMSG;
						if ($this->sendUserPMS($recip, $sender, $newsub, $newmsg, $systemGenerated=false, $escaped=true)) {
							$return .= "\n<script type='text/javascript'>alert('"._UE_PM_SENTSUCCESS."')</script>";
							$newsub = null;
							$newmsg = null;
						} else {
							$return .= "\n<script type='text/javascript'>alert('".$this->getErrorMSG()."')</script>";
						}
					} else {
						$return .= "\n<script type='text/javascript'>alert('"._UE_SESSIONTIMEOUT." "._UE_PM_NOTSENT." "._UE_TRYAGAIN."')</script>";
					}
				} else {
					$return .= "\n<script type='text/javascript'>alert('"._UE_PM_EMPTYMESSAGE." "._UE_PM_NOTSENT."')</script>";
				}
			}
		}

		// display Quick Message tab:
		$return .= "\n\t<div class=\"sectiontableentry".$_CB_OneTwoRowsStyleToggle."\" style=\"padding-bottom:5px;\">\n";
		$_CB_OneTwoRowsStyleToggle = ($_CB_OneTwoRowsStyleToggle == 1 ? 2 : 1);
		if($showTitle) $return .= "\t\t<div class=\"titleCell\" style=\"align: left; text-align:left; margin-left: 0px;\">"
							.$this->_unHtmlspecialchars($this->_getLangDefinition($tab->title)).(($showSubject && $capabilities["subject"])?"" : ":")."</div>\n";
		$return .= $this->_writeTabDescription( $tab, $user );

		$base_url = $this->_getAbsURLwithParam(array());
		$return .= '<form method="post" action="'.$base_url.'">';
		$return .= '<table cellspacing="0" cellpadding="5" class="contentpane" style="border:0px;align:left;width:90%;">';
		if ($showSubject && $capabilities["subject"]) {
			$return .= '<tr><td><b>'._UE_EMAILFORMSUBJECT.'</b></td>';
			$return .= '<td><input type="text" class="inputbox" name="'.$this->_getPagingParamName("newsub")
					.'" size="'.($width-8).'" value="'.stripslashes($newsub).'" /></td></tr>';
			$return .= '<tr><td colspan="2"><b>'._UE_EMAILFORMMESSAGE.'</b></td></tr>';
		}
		$return .= '<tr><td colspan="2"><textarea name="'.$this->_getPagingParamName("newmsg")
				.'" class="inputbox" rows="'.$height.'" cols="'.$width.'">'.stripslashes($newmsg).'</textarea></td></tr>';
		$return .= '<tr><td colspan="2"><input type="submit" class="button" name="'.$this->_getPagingParamName("sndnewmsg").'" value="'._UE_PM_SENDMESSAGE.'" /></td></tr>';
		$return .= '</table>';
		$return .= "<input type=\"hidden\"  name=\"".$this->_getPagingParamName("sender")."\" value=\"$myself\" />";
		$return .= "<input type=\"hidden\"  name=\"".$this->_getPagingParamName("recip")."\" value=\"$user->id\" />";

		$salt	=	cbMakeRandomString( 32 );
		$return .= "<input type=\"hidden\"  name=\"".$this->_getPagingParamName("protect")."\" value=\""
				. 'cbpms1_' . md5($salt.$user->id.$user->lastvisitDate.$usermy->password.$usermy->lastvisitDate) . '_' . $salt . "\" />";

		$return .= '</form>';
		$return .= "</div>";

		return $return;
	}
	
	//****************************************************************************
	// UddeIM specific private methods:
	
	/**
	 * Udde PMS notification by email depending on user's settings
	 *
	 * @access private
	 * @param int $savefromid
	 * @param int $savetoid
	 * @param string $savemessage
	 * @param boolean $udde_sysm
	 */

	function _pmsUddeNotify($var_msgid, $savefromid, $savetoid, $savemessage, $udde_sysm) {
		global $_CB_database;
		
		$params = $this->params;
		$pmsType = (int)$params->get('pmsType', '1');

		if ($this->config->notifydefault>0 || $this->config->popupdefault>0) {
			$sql="SELECT count(id) FROM #__uddeim_emn WHERE userid=".(int)$savetoid;
			$_CB_database->setQuery($sql);
			$entryexists=$_CB_database->loadResult();
			if (!$entryexists) {
				$sql="INSERT INTO #__uddeim_emn (status, popup, userid) VALUES (".(int)$this->config->notifydefault.", ".(int)$this->config->popupdefault.", ".(int)$savetoid.")";
				$_CB_database->setQuery($sql);
				$ret=$_CB_database->query();
			}
		}

		$itisareply = (isset($this->config->quotedivider) ? stristr($savemessage, $this->config->quotedivider) : false);

		$sql="SELECT userid FROM #__session WHERE userid=".(int) $savetoid;
		$_CB_database->setQuery($sql);
		$currentlyonline=$_CB_database->loadResult();
		
		if ($this->config->allowemailnotify==1) {
			$sql="SELECT status FROM #__uddeim_emn WHERE userid=".(int) $savetoid;
			$_CB_database->setQuery($sql);
			$ison=$_CB_database->loadResult();
			if (($ison==1) || ($ison==2 && !$currentlyonline) || ($ison==10 && !$itisareply) || ($ison==20 && !$currentlyonline && !$itisareply))  {
				$this->_pmsUddeDispatchEMN($var_msgid, $savefromid, $savetoid, $savemessage, 0, $udde_sysm); // 0 stands for normal (not forgetmenot)
			}
		} elseif ($this->config->allowemailnotify==2) {
			$sql="SELECT gid FROM #__users WHERE id=".(int) $savetoid;
			$_CB_database->setQuery($sql);
			$my_gid=$_CB_database->loadResult();
			if ($my_gid==24||$my_gid==25) {
				$sql="SELECT status FROM #__uddeim_emn WHERE userid=".(int) $savetoid;
				$_CB_database->setQuery($sql);
				$ison=$_CB_database->loadResult();
				if (($ison==1) || ($ison==2 && !$currentlyonline) || ($ison==10 && !$itisareply) || ($ison==20 && !$currentlyonline && !$itisareply))  {
					$this->_pmsUddeDispatchEMN($var_msgid, $savefromid, $savetoid, $savemessage, 0, $udde_sysm);  // 0 stands for normal (not forgetmenot)
				} 	
			}	
		}
	}
	
	/**
	 * Udde PMS notification by email
	 *
	 * @access private
	 * @param int $var_fromid
	 * @param int $var_toid
	 * @param string $var_message
	 * @param int $emn_option
	 * @param boolean $udde_sysm
	 */

	 function _pmsUddeDispatchEMN($var_msgid, $var_fromid, $var_toid, $var_message, $emn_option, $udde_sysm) {
		global $_CB_database;
		
		$adminpath = $this->absolute_path."/administrator/components/com_uddeim";

		$params = $this->params;
		$pmsType = (int)$params->get('pmsType', '1');
		$doObfuscate = (int)$params->get('doObfuscate', '0');

		// load the uddeim lang file		
		$postfix = "";
		if ($this->config->languagecharset)
			$postfix = ".utf8";
		if (file_exists($adminpath.'/language'.$postfix.'/'.$this->mosConfig_lang.'.php')) {
			include_once($adminpath.'/language'.$postfix.'/'.$this->mosConfig_lang.'.php');
		} elseif (file_exists($adminpath.'/language'.$postfix.'/english.php')) {
			include_once($adminpath.'/language'.$postfix.'/english.php');
		} elseif (file_exists($adminpath.'/language/english.php')) {
			include_once($adminpath.'/language/english.php');
		}

		// if e-mail traffic stopped, don't send.
		if (isset($this->config->emailtrafficenabled) && !($this->config->emailtrafficenabled > 0)) {
			return;
		}
		
		$sql = "SELECT ".($this->config->realnames ? "name" : "username")." FROM #__users WHERE `id`=".(int) $var_fromid;
		$_CB_database->setQuery($sql);
		$var_fromname=$_CB_database->loadResult();
		if (!$var_fromname) {
			$var_fromname=$this->config->sysm_username;
		}
		
		$sql = "SELECT ".($this->config->realnames ? "name" : "username")." AS displayname, email FROM #__users WHERE `id`=".(int) $var_toid;	
		$_CB_database->setQuery($sql);
		$results=$_CB_database->loadObjectList();
		foreach ($results as $result) {
			$var_toname = $result->displayname;
			$var_tomail = $result->email;
		}
		
		if (!$var_tomail) {
			return;
		}

		// Message cannot be encrypted here since cryptmode=2 is not supported
		// $doObfuscate = 0 or 1,
		$item_id = $this->_uddeIMgetItemid($this->config);
		$msglink = "index.php?option=com_uddeim&task=show&Itemid=".$item_id."&messageid=".$var_msgid;
		// $msglink = uddeIMsefRelToAbs("index.php?option=com_uddeim&task=show&Itemid=".$item_id."&messageid=".$var_msgid);
		// $msglink = uddeIMsefRelToAbs("index.php?option=com_uddeim&task=show&messageid=".$var_msgid);

		if ($emn_option==1) {
			$var_body = _UDDEIM_EMN_FORGETMENOT;
			$var_body = str_replace("%livesite%", $this->mosConfig_live_site, $var_body);
			$var_body = str_replace("%you%", $var_toname, $var_body);
			$var_body = str_replace("%site%", $this->mosConfig_sitename, $var_body);
			$var_body = str_replace("%msglink%", $msglink, $var_body);
		} else {
			if ($this->config->emailwithmessage==1) {
				$var_body = _UDDEIM_EMN_BODY_WITHMESSAGE;
				$var_body = str_replace("%livesite%", $this->mosConfig_live_site, $var_body);
				$var_body = str_replace("%you%", $var_toname, $var_body);
				$var_body = str_replace("%site%", $this->mosConfig_sitename, $var_body);	
				$var_body = str_replace("%msglink%", $msglink, $var_body);
				$var_body = str_replace("%user%", $var_fromname, $var_body);
				$var_body = str_replace("%pmessage%", $var_message, $var_body);	
			} else {
				$var_body = _UDDEIM_EMN_BODY_NOMESSAGE;
				$var_body = str_replace("%livesite%", $this->mosConfig_live_site, $var_body);
				$var_body = str_replace("%you%", $var_toname, $var_body);
				$var_body = str_replace("%site%", $this->mosConfig_sitename, $var_body);		
				$var_body = str_replace("%msglink%", $msglink, $var_body);
				$var_body = str_replace("%user%", $var_fromname, $var_body);			
			}
		}
		
		$subject = _UDDEIM_EMN_SUBJECT;
		$subject = str_replace("%livesite%", $this->mosConfig_live_site, $subject);
		$subject = str_replace("%site%", $this->mosConfig_sitename, $subject);
		$subject = str_replace("%you%", $var_toname, $subject);
		$subject = str_replace("%user%", $var_fromname, $subject);
		
		if (class_exists('JUtility'))
			$ret = JUTility::sendMail($this->config->emn_sendermail, $this->config->emn_sendername, $var_tomail, $subject, $this->_pmsMailcompatible($var_body), 0, null, null, null, null, null);
		else
		   $ret = mosMail($this->config->emn_sendermail, $this->config->emn_sendername, $var_tomail, $subject, $this->_pmsMailcompatible($var_body));

		if ($ret) {
			// set the remindersent status of this user to true
			$sql="SELECT count(id) FROM #__uddeim_emn WHERE userid=".(int) $var_toid;
			$_CB_database->setQuery($sql);
			$exists=$_CB_database->loadResult();
			if($exists) {
				$sql="UPDATE #__uddeim_emn SET remindersent=".(int) $this->_pmsUddeGetTime($this->config->timezone)." WHERE userid=".(int) $var_toid;
				$_CB_database->setQuery($sql);
				if (!$_CB_database->query()) {
					die("SQL error" . $_CB_database->stderr(true));
				}
			} else {
				$sql="INSERT INTO #__uddeim_emn (userid, status, remindersent) VALUES (".(int) $var_toid.", 0, ".(int) $this->_pmsUddeGetTime($this->config->timezone).")";
				$_CB_database->setQuery($sql);
				if (!$_CB_database->query()) {
					die("SQL error" . $_CB_database->stderr(true));
				} // end if database query
			} // end else
		} // end if mail
	} // end function

	function _pmsMailcompatible($string) {
		$string = str_replace('\\n', '#!CRLF!#', $string);
		$string = stripslashes($string);
	    $string = preg_replace("/(\[b\])(.*?)(\[\/b\])/si","\\2",$string);
	    $string = preg_replace("/(\[u\])(.*?)(\[\/u\])/si","\\2",$string);
		$string = preg_replace("/(\[i\])(.*?)(\[\/i\])/si","\\2",$string);
		$string = preg_replace("/\[size=([1-7])\](.+?)\[\/size\]/si","\\2",$string);
		$string = preg_replace("%\[color=(.*?)\](.*?)\[/color\]%si","\\2",$string);
		$string = preg_replace("/(\[ul\])(.*?)(\[\/ul\])/si","\\2",$string);
		$string = preg_replace("/(\[ol\])(.*?)(\[\/ol\])/si","\\2",$string);
		$string = preg_replace("/(\[li\])(.*?)(\[\/li\])/si","\\2\\n",$string);
		$string = preg_replace('/\[url\](.*?)javascript(.*?)\[\/url\]/si','',$string);
		$string = preg_replace('/\[url=(.*?)javascript(.*?)\](.*?)\[\/url\]/si','',$string);
		$string = preg_replace("/\[url\](.*?)\[\/url\]/si","\\1",$string);
		$string = preg_replace("/\[url=(.*?)\](.*?)\[\/url\]/si","\\2 (\\1)",$string);	
		$string = preg_replace("/\[url=(.*?)\]/si","",$string);	
		$string = preg_replace("/\[img size=([0-9][0-9][0-9])\](.*?)\[\/img\]/si","",$string);
		$string = preg_replace("/\[img size=([0-9][0-9])\](.*?)\[\/img\]/si","",$string);
		$string = preg_replace("/\[img\](.*?)\[\/img\]/si","",$string);
		$string = preg_replace("/<img(.*?)javascript(.*?)>/si",'',$string);	
		$string = preg_replace("/\[img size=([0-9][0-9][0-9])\]]/si","",$string);
		$string = preg_replace("/\[img size=([0-9][0-9])\]]/si","",$string);
		$string = str_replace(array("[i]","[/i]","[b]","[/b]","[u]","[/u]","[ul]","[/ul]","[ol]","[/ol]","[li]","[/li]"), "", $string);
	    $string = preg_replace('/\[url=(.*?)javascript(.*?)\]/si','',$string);	
	    $string = preg_replace("/\[img size=([0-9][0-9][0-9])\]/si","",$string);
	    $string = preg_replace("/\[img size=([0-9][0-9])\]/si","",$string);
	    $string = preg_replace("/\[size=([1-7])\]/si","",$string);
	    $string = preg_replace("%\[color=(.*?)\]%si","",$string);
		$string = str_replace(array("[img]","[/img]","[url]","[/url]","[/color]","[/size]"), "", $string);
		$string = str_replace("#!CRLF!#", "\n", $string);	 
		return $string;
	}	
		
	function _pmsUddeGetTime($timezone = 0) {
		$rightnow=time()+(($this->mosConfig_offset+$timezone)*3600);
		return $rightnow;
	}

// nants delete user code (not yet activated)
	function userDeleted($user, $success) {
		global $_CB_database,$ueConfig;

		$params = $this->params;
		$pmsType = (int)$params->get('pmsType', '1');

		if (!$this->_checkPMSinstalled($pmsType)) {
			return false;
		}

		$query_pms_delete = "DELETE FROM #__uddeim WHERE fromid='" . (int) $user->id ."' OR toid='" . (int) $user->id . "'";
		$query_pms_delete_extra1 = "DELETE FROM #__uddeim_emn WHERE userid='" . (int) $user->id . "'";
		$query_pms_delete_extra2 = "DELETE FROM #__uddeim_blocks WHERE blocker='" . (int) $user->id . "' OR blocked='" . (int) $user->id . "'";

		print "Deleting pms data for user ".$user->id;
		$_CB_database->setQuery( $query_pms_delete );
		if (!$_CB_database->query()) {
			$this->_setErrorMSG("SQL error " . $query_pms_delete . $_CB_database->stderr(true));
			return false;			
		}
		$_CB_database->setQuery( $query_pms_delete_extra1 );
		if (!$_CB_database->query()) {
			$this->_setErrorMSG("SQL error " . $query_pms_delete_extra1 . $_CB_database->stderr(true));
			return false;			
		}			
		$_CB_database->setQuery( $query_pms_delete_extra2 );
		if (!$_CB_database->query()) {
			$this->_setErrorMSG("SQL error " . $query_pms_delete_extra2 . $_CB_database->stderr(true));
			return false;			
		}			
		return true;
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
	function _uddeUnescapeCrypt($cm) {
		$cm = str_replace("\\\\", "&backslash;", $cm);	// protect escaped slashes
		$cm = str_replace("\\n", "\n", $cm);			// convert newlines to "real" newlines
		$cm = str_replace("\\r", "\r", $cm);
		$cm = str_replace("&backslash;", "\\\\", $cm);	// back to slashes
	//	$cm = str_replace("&amp;", "&", $cm);			// repair all encoded html entities
	//	$cm = html_entity_decode($cm);

	//	$cm = str_replace("&quot;", "\"", $cm);
	//	$cm = str_replace("&gt;", ">", $cm);
	//	$cm = str_replace("&lt;", "<", $cm);
	//	$cm = str_replace("&", "&amp;", $cm);
		return $cm;
	}

	function _uddeUnescape($cm) {
	//	$cm = str_replace("&amp;", "&", $cm);			// repair all encoded html entities
	//	$cm = html_entity_decode($cm);

	//	$cm = str_replace("&quot;", "\"", $cm);
	//	$cm = str_replace("&gt;", ">", $cm);
	//	$cm = str_replace("&lt;", "<", $cm);
	//	$cm = str_replace("&", "&amp;", $cm);
		return $cm;
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
}	// end class getmypmsproTab.

