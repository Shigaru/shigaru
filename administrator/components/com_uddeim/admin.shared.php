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

// some global variables
$versionstring	= "uddeIM 2.0/2010-03-01/stable";		// version string for about boxes
$checkversion	= "2.0";							// version as above for check for update - this is the version we have
$checkhotfix	= "0";								// version as above for check for update - this is the version we have
$configversion	= "1.5";							// this is the version number of the configuration file we expect to load

function uddeIMcheckJversion() {			// stolen from Cummunity Builder, -1 = Mambo>=4.6, 0 = Mambo <=4.5/J1.0, 1 = J1.5
	// API version:
	// =0 = mambo 4.5.0-4.5.3+Joomla 1.0.x
	// =1 = Joomla! 1.5
	// =2 = Joomla! 1.6
	// >2 = newer ones: maybe compatible
	// <0 = -1: Mambo 4.6
	$version = uddeIMgetVersion();
	if ($version->PRODUCT == "Mambo") {
		if ( strncasecmp( $version->RELEASE, "4.6", 3 ) < 0 ) {
			$ver = 0;
		} else {
			$ver = -1;
		}
	} elseif ($version->PRODUCT == "Elxis") {
		$ver = 0;
	} elseif ($version->PRODUCT == "MiaCMS") {
		$ver = -1;
	} elseif ($version->PRODUCT == "Joomla!" || $version->PRODUCT == "Accessible Joomla!") {
		if (!strncasecmp($version->RELEASE, "1.6", 3)) {
			$ver = 2;
		} else if (strncasecmp($version->RELEASE, "1.0", 3)) {
			$ver = 1;
		} else {
			$ver = 0;
		}
	} else {
		$ver = 0;
	}
	return $ver;
}

function uddeIMshowTick($value,$opacity=false) {
	$temp="";
	if ($opacity)
		$temp = "style='opacity: 0.30; -moz-opacity: 0.30; filter:alpha(opacity=30);' ";
	echo "<img ".$temp."src='images/".($value ? "tick.png" : "publish_x.png")."' alt='".($value ? _UDDEADM_USERSET_YES : _UDDEADM_USERSET_NO)."' border='0' height='12' width='12' />";
}

function uddeIMcheckPlugin($plugin) {
	$pathtoadmin = uddeIMgetPath('admin');
	$pathtouser = uddeIMgetPath('user');
	switch($plugin) {
		case 'spamcontrol':	$plugin = $pathtoadmin.'/admin.spamcontrol.php';
							break;
		case 'pfrontend':	$plugin = $pathtouser.'/pfrontend.php';
							break;
		case 'rss':			$plugin = $pathtouser.'/rss.php';
							break;
		case 'attachment':	$plugin = $pathtouser.'/attachment.php';
							break;
		default:			return null;
	}
	if (file_exists($plugin) && is_file($plugin))
		return $plugin;
	return null;
}

function uddeIMcheckCB() {
	return uddeIMfileExists("/components/com_comprofiler/comprofiler.php");
}

function uddeIMcheckCBE() {
	return uddeIMfileExists("/administrator/components/com_comprofiler/enhanced_admin/enhanced_config.php");
}

function uddeIMcheckCBE2() {
	return uddeIMfileExists("/administrator/components/com_cbe/enhanced_admin/enhanced_config.php");
}

function uddeIMcheckFB() {
	return uddeIMfileExists("/components/com_fireboard/fireboard.php");
}

function uddeIMcheckAG() {
	return uddeIMfileExists("/components/com_agora/agora.php");
}

function uddeIMcheckKU() {
	return uddeIMfileExists("/components/com_kunena/kunena.php");
}

function uddeIMcheckJS() {
	return uddeIMfileExists("/components/com_community/community.php");
}

function uddeIMcheckBB() {
	return uddeIMfileExists("/components/com_joobb/joobb.php");
}

function uddeIMcheckAUP() {
	return uddeIMfileExists("/components/com_alphauserpoints/helper.php");
}

function uddeIMquoteSmart($source) { 
	$database = uddeIMgetDatabase();
	if (get_magic_quotes_gpc()) { 
		$source = stripslashes($source); 
	}
	$source = $database->getEscaped( $source );
//	if (function_exists('mysql_real_escape_string')) {
//		mysql_real_escape_string($source); 
//	} else {
//		mysql_escape_string($source); 
//	} 
	return $source; 
} 

function uddetime($timezone = 0) {
	$mosConfig_offset = uddeIMgetOffset();
	$rightnow=time()+(($mosConfig_offset+$timezone)*3600);
	return $rightnow;
}

function uddeDate($ofwhat, $config) {
	global $udde_smon, $udde_lmon, $udde_sweekday, $udde_lweekday;

	$monat=trim(date('m', $ofwhat));
	$monat=doubleval($monat);
	$wochentag=trim(date('w', $ofwhat));

	$wert=date($config->datumsformat, $ofwhat);

	$ori_sweekday=date('D', $ofwhat);
	$ori_lweekday=date('l', $ofwhat);
	$ori_smonth=date('M', $ofwhat);
	$ori_lmonth=date('F', $ofwhat);

	if (strstr($config->datumsformat, "l")) {
		$wert=str_replace($ori_lweekday, $udde_lweekday[$wochentag], $wert);
	}
	if (strstr($config->datumsformat, "F")) {
		$wert=str_replace($ori_lmonth, $udde_lmon[$monat], $wert);
	}
	if (strstr($config->datumsformat, "D")) {
		$wert=str_replace($ori_sweekday, $udde_sweekday[$wochentag], $wert);
	}
	if (strstr($config->datumsformat, "M")) {
		$wert=str_replace($ori_smonth, $udde_smon[$monat], $wert);
	}
	return $wert;
}

function uddeLdate($ofwhat, $config) {
	global $udde_smon, $udde_lmon, $udde_sweekday, $udde_lweekday;

	$monat=trim(date('m', $ofwhat));
	$monat=doubleval($monat);
	$wochentag=trim(date('w', $ofwhat));

	$wert=date($config->ldatumsformat, $ofwhat);

	$ori_sweekday=date('D', $ofwhat);
	$ori_lweekday=date('l', $ofwhat);
	$ori_smonth=date('M', $ofwhat);
	$ori_lmonth=date('F', $ofwhat);

	if (strstr($config->ldatumsformat, "l")) {
		$wert=str_replace($ori_lweekday, $udde_lweekday[$wochentag], $wert);
	}
	if (strstr($config->ldatumsformat, "F")) {
		$wert=str_replace($ori_lmonth, $udde_lmon[$monat], $wert);
	}
	if (strstr($config->ldatumsformat, "D")) {
		$wert=str_replace($ori_sweekday, $udde_sweekday[$wochentag], $wert);
	}
	if (strstr($config->ldatumsformat, "M")) {
		$wert=str_replace($ori_smonth, $udde_smon[$monat], $wert);
	}
	return $wert;
}

function uddeIMgetCharsetalias($notalias) {
	$notalias=strtoupper($notalias);
	switch ($notalias) {
		case "ISO-8859-1":			$analias="ISO-8859-1";		break;
		case "ISO88591":			$analias="ISO-8859-1";		break;
		case "ISO8859-1":			$analias="ISO-8859-1";		break;
		case "ISO-8859-8":			$analias="ISO-8859-8";		break;
		case "ISO8859-8":			$analias="ISO-8859-8";		break;
		case "ISO-8859-15":			$analias="ISO-8859-15";		break;
		case "ISO8859-15":			$analias="ISO-8859-15";		break;
		case "UTF8":				$analias="UTF-8";			break;
		case "UTF-8":				$analias="UTF-8";			break;
		case "CP866":				$analias="cp866";			break;
		case "IBM866":				$analias="cp866";			break;
		case "866":					$analias="cp866";			break;
		case "CP1251":				$analias="cp1251";			break;
		case "1251":				$analias="cp1251";			break;
		case "WINDOWS-1251":		$analias="cp1251";			break;
		case "WINDOWS1251":			$analias="cp1251";			break;			
		case "WIN-1251":			$analias="cp1251";			break;
		case "CP1252":				$analias="cp1252";			break;
		case "1252":				$analias="cp1252";			break;
		case "WINDOWS-1252":		$analias="cp1252";			break;
		case "WINDOWS1252":			$analias="cp1252";			break;			
		case "KOI8-R":				$analias="KOI8-R";			break;
		case "KOI8R":				$analias="KOI8-R";			break;
		case "KOI8-RU":				$analias="KOI8-R";			break;
		case "BIG5":				$analias="BIG5";			break;
		case "950":					$analias="BIG5";			break;
		case "GB2312":				$analias="GB2312";			break;
		case "936":					$analias="GB2312";			break;
		case "BIG5-HKSCS":			$analias="BIG5-HKSCS";		break;
		case "SHIFT_JIS":			$analias="Shift_JIS";		break;
		case "SJIS":				$analias="Shift_JIS";		break;
		case "932":					$analias="Shift_JIS";		break;
		case "EUC-JP":				$analias="EUC-JP";			break;
		case "EUCJP":				$analias="EUC-JP";			break;
		default:					$analias="ISO-8859-1";		break;
	}
	return $analias;
}

function uddeIMgetCharsetMailalias($analias) {
	$analias=strtoupper($analias);
	switch ($analias) {
		case "ISO8859-1":			$notalias="ISO-8859-1";		break;
		case "ISO88591":			$notalias="ISO-8859-1";		break;			
		case "ISO-8859-1":			$notalias="ISO-8859-1";		break;
		case "ISO-8859-8":			$notalias="ISO-8859-8";		break;
		case "ISO8859-8":			$notalias="ISO-8859-8";		break;
		case "ISO-8859-15":			$notalias="ISO-8859-15";	break;
		case "ISO8859-15":			$notalias="ISO-8859-15";	break;
		case "UTF8":				$notalias="UTF-8";			break;
		case "UTF-8":				$notalias="UTF-8";			break;
		case "IBM866":				$notalias="ibm866";			break;
		case "866":					$notalias="ibm866";			break;
		case "CP866":				$notalias="ibm866";			break;
		case "CP1251":				$notalias="Windows-1251";	break;
		case "WINDOWS-1251":		$notalias="Windows-1251";	break;
		case "WINDOWS1251":			$notalias="Windows-1251";	break;			
		case "WIN-1251":			$notalias="Windows-1251";	break;
		case "1251":				$notalias="Windows-1251";	break;
		case "CP1252":				$notalias="Windows-1252";	break;
		case "WINDOWS1252":			$notalias="Windows-1252";	break;			
		case "WINDOWS-1252":		$notalias="Windows-1252";	break;
		case "1252":				$notalias="Windows-1252";	break;
		case "KOI8-RU":				$notalias="KOI8-R";			break;
		case "KOI8R":				$notalias="KOI8-R";			break;
		case "KOI8-R":				$notalias="KOI8-R";			break;		
		case "BIG5":				$notalias="Big5";			break;		
		case "950":					$notalias="Big5";			break;
		case "GB2312":				$notalias="GB2312";			break;			
		case "936":					$notalias="GB2312";			break;
		case "BIG5-HKSCS":			$notalias="BIG5-HKSCS";		break;
		case "SJIS":				$notalias="Shift_JIS";		break;
		case "SHIFT_JIS":			$notalias="Shift_JIS";		break;			
		case "932":					$notalias="Shift_JIS";		break;
		case "EUC-JP":				$notalias="EUC-JP";			break;
		case "EUCJP":				$notalias="EUC-JP";			break;
		default:					$notalias=$analias;			break;
	}
	if(!$notalias) {
		$notalias="ISO-8859-1";
	}
	return $notalias;
}

function uddeIMloadLanguage($pathtoadmin, $config) {
	$mosConfig_lang = uddeIMgetLang();
	// Get right language file or use english
	$postfix = "";
	$usedlanguage="";
	if ($config->languagecharset)
		$postfix = ".utf8";
	if (file_exists($pathtoadmin.'/language'.$postfix.'/'.$mosConfig_lang.'.php')) {
		include($pathtoadmin.'/language'.$postfix.'/'.$mosConfig_lang.'.php');
		$usedlanguage='/language'.$postfix.'/'.$mosConfig_lang.'.php';
	} elseif (file_exists($pathtoadmin.'/language'.$postfix.'/english.php')) {
		include($pathtoadmin.'/language'.$postfix.'/english.php');
		$usedlanguage='/language'.$postfix.'/english.php';
	} elseif (file_exists($pathtoadmin.'/language/english.php')) {
		include($pathtoadmin.'/language/english.php');
		$usedlanguage='/language/english.php';
	}
	// register vars from language file
	$GLOBALS['udde_smon'] = $udde_smon;
	$GLOBALS['udde_lmon'] = $udde_lmon;
	$GLOBALS['udde_sweekday'] = $udde_sweekday;
	$GLOBALS['udde_lweekday'] = $udde_lweekday;
	return $usedlanguage;
}

function uddeIMcheckConfig($pathtouser, $pathtoadmin, &$config) {
	$mosConfig_sitename = uddeIMgetSitename();
	// adjust non acceptable values

	if ((int)$config->ReadMessagesLifespan<1) 		{ $config->ReadMessagesLifespan = 1; }
	if ((int)$config->ReadMessagesLifespan>60000) 	{ $config->ReadMessagesLifespan = 60000; }

	if ((int)$config->UnreadMessagesLifespan<1)		{ $config->UnreadMessagesLifespan = 1; }
	if ((int)$config->UnreadMessagesLifespan>60000)	{ $config->UnreadMessagesLifespan = 60000; }

	if ((int)$config->SentMessagesLifespan<1) 		{ $config->SentMessagesLifespan = 1; }
	if ((int)$config->SentMessagesLifespan>60000) 	{ $config->SentMessagesLifespan = 60000; }

	if ((float)$config->TrashLifespan<0.01)			{ $config->TrashLifespan = 0.01; }
	if ((float)$config->TrashLifespan>60000)		{ $config->TrashLifespan = 60000; }

	if ((int)$config->firstwordsinbox<8) 			{ $config->firstwordsinbox = 8; }
	if ((int)$config->firstwordsinbox>1024) 		{ $config->firstwordsinbox = 1024; }

	if ((int)$config->longwaitingdays<14) 			{ $config->longwaitingdays = 14; }
	if ((int)$config->longwaitingdays>32768) 		{ $config->longwaitingdays = 32768; }

	if ((int)$config->maxlength<0)		 			{ $config->maxlength = 0; }
	if ((int)$config->maxlength>65536) 				{ $config->maxlength = 65536; }

	if ((int)$config->maxarchive<10)		 		{ $config->maxarchive = 10; }
	if ((int)$config->perpage<0)		 			{ $config->perpage = 0; }
	if ((int)$config->inboxlimit<0)		 			{ $config->inboxlimit = 0; }
	if ((int)$config->maxrecipients<0)		 		{ $config->maxrecipients = 0; }

	if ((int)$config->captchalen<1)		 			{ $config->captchalen = 1;	}
	if ((int)$config->captchalen>8)		 			{ $config->captchalen = 8;	}

	if ((int)$config->maxonlists<1)		 			{ $config->maxonlists = 1; }
	if ((int)$config->timedelay<0)		 			{ $config->timedelay = 0; }

	if ((int)$config->rows<1)		 				{ $config->rows = 1; }
	if ((int)$config->cols<10)		 				{ $config->cols = 10; }
	if ((int)$config->width<0)			 			{ $config->width = 0; }
	if ((int)$config->rsslimit<0)		 			{ $config->rsslimit = 0; }

	if ((int)$config->maxsizeattachment<0)		 	{ $config->maxsizeattachment = 0; }
	if ((int)$config->maxattachments<0)			 	{ $config->maxattachments = 0; }

	if(!$config->charset) 							{ $config->charset="ISO8859-1"; }
	if(!$config->mailcharset) 						{ $config->mailcharset="ISO8859-1";	}
	if(!$config->sysm_username) 					{ $config->sysm_username=$mosConfig_sitename; }

	$plugin_attachment = 0;
	if (uddeIMcheckPlugin('attachment'))
		$plugin_attachment = 1;

	$plugin_rss = 0;
	if (uddeIMcheckPlugin('rss'))
		$plugin_rss = 1;

	$plugin_public = 0;
	if (uddeIMcheckPlugin('pfrontend'))
		$plugin_public = 1;

	$plugin_spamcontrol = 0;
	if (uddeIMcheckPlugin('spamcontrol'))
		$plugin_spamcontrol = 1;

	if (!$plugin_attachment) {
		$config->enableattachment = 0;
	}
	if (!$plugin_rss) {
		$config->enablerss = 0;
	}
	if (!$plugin_public) {
		$config->pubfrontend = 0;
	}
	if (!$plugin_spamcontrol) {
		$config->reportspam = 0;
	}
}

function uddeIMdoShowAllUsers($myself, $my_gid, $config, $mode, $enabled=1, $defaultvalue=0) {						
	$database = uddeIMgetDatabase();

	$sep=",";
	if ($config->separator==1)
		$sep=";";

	if (uddeIMcheckJversion()>=2) {		// J1.6
		$hide = "";
		if ($config->hideusers)
			$hide = "AND u.id NOT IN (".uddeIMquoteSmart($config->hideusers).") ";

		$hide2 = "";
		if (uddeIMisReggedOnly($my_gid) && $config->blockgroups)
			$hide2 = "AND g.id NOT IN (".uddeIMquoteSmart($config->blockgroups).") ";

		switch ($config->hideallusers) {
			case 3:		// special users
				$sql="SELECT u.".($config->realnames ? "name" : "username")." AS displayname, u.id 
						FROM (jos_users AS u INNER JOIN jos_user_usergroup_map AS um ON u.id=um.user_id) 
							INNER JOIN jos_usergroups AS g ON um.group_id=g.id 
							WHERE u.block=0 AND g.id NOT IN (3,4,5,6,7,8) AND u.id<>".$myself." ".$hide.$hide2."ORDER BY u.".($config->realnames ? "name" : "username");
				break;
			case 2:		// admins
				$sql="SELECT u.".($config->realnames ? "name" : "username")." AS displayname, u.id 
						FROM (jos_users AS u INNER JOIN jos_user_usergroup_map AS um ON u.id=um.user_id) 
							INNER JOIN jos_usergroups AS g ON um.group_id=g.id 
							WHERE u.block=0 AND g.id NOT IN (7,8) AND u.id<>".$myself." ".$hide.$hide2."ORDER BY u.".($config->realnames ? "name" : "username");
				break;
			case 1:		// superadmins
				$sql="SELECT u.".($config->realnames ? "name" : "username")." AS displayname, u.id 
						FROM (jos_users AS u INNER JOIN jos_user_usergroup_map AS um ON u.id=um.user_id) 
							INNER JOIN jos_usergroups AS g ON um.group_id=g.id 
							WHERE u.block=0 AND g.id NOT IN (8) AND u.id<>".$myself." ".$hide.$hide2."ORDER BY u.".($config->realnames ? "name" : "username");
				break;
			default:	// none
				$sql="SELECT u.".($config->realnames ? "name" : "username")." AS displayname, u.id 
						FROM jos_users AS u
							WHERE u.block=0 AND u.id<>".$myself." ".$hide.$hide2."ORDER BY u.".($config->realnames ? "name" : "username");
				break;
		}
		if (uddeIMisAdmin($my_gid))		// do not hide users when it is an admin
			$sql="SELECT ".($config->realnames ? "name" : "username")." AS displayname, id FROM #__users WHERE block=0 AND id<>".$myself." ORDER BY ".($config->realnames ? "name" : "username");
	} else {
		$hide = "";
		if ($config->hideusers)
			$hide = "AND id NOT IN (".uddeIMquoteSmart($config->hideusers).") ";

		$hide2 = "";
		if (uddeIMisReggedOnly($my_gid) && $config->blockgroups)
			$hide2 = "AND gid NOT IN (".uddeIMquoteSmart($config->blockgroups).") ";

		switch ($config->hideallusers) {
			case 3:		// special users
				$sql="SELECT ".($config->realnames ? "name" : "username")." AS displayname, id FROM #__users WHERE block=0 AND gid NOT IN (19,20,21,23,24,25) AND id<>".$myself." ".$hide.$hide2."ORDER BY ".($config->realnames ? "name" : "username");
				break;
			case 2:		// admins
				$sql="SELECT ".($config->realnames ? "name" : "username")." AS displayname, id FROM #__users WHERE block=0 AND gid NOT IN (24,25) AND id<>".$myself." ".$hide.$hide2."ORDER BY ".($config->realnames ? "name" : "username");
				break;
			case 1:		// superadmins
				$sql="SELECT ".($config->realnames ? "name" : "username")." AS displayname, id FROM #__users WHERE block=0 AND gid NOT IN (25) AND id<>".$myself." ".$hide.$hide2."ORDER BY ".($config->realnames ? "name" : "username");
				break;
			default:	// none
				$sql="SELECT ".($config->realnames ? "name" : "username")." AS displayname, id FROM #__users WHERE block=0 AND id<>".$myself." ".$hide.$hide2."ORDER BY ".($config->realnames ? "name" : "username");
				break;
		}
		if (uddeIMisAdmin($my_gid))		// do not hide users when it is an admin
			$sql="SELECT ".($config->realnames ? "name" : "username")." AS displayname, id FROM #__users WHERE block=0 AND id<>".$myself." ORDER BY ".($config->realnames ? "name" : "username");
	}
	$database->setQuery($sql);
	$rows=$database->loadObjectList();

	if ($mode==1) {					// CREATE NEW MESSAGE
		if ($config->allowmultipleuser)
			$allnames="<select size=\"1\" class=\"inputbox\" name=\"userlist\" onchange=\"document.sendeform.to_name.value=(document.sendeform.to_name.value.length>0 && document.sendeform.userlist.value.length>0) ? document.sendeform.to_name.value+'".$sep."'+document.sendeform.userlist.value : document.sendeform.userlist.value; return false;\">";
		else
			$allnames="<select size=\"1\" class=\"inputbox\" name=\"userlist\" onchange=\"document.sendeform.to_name.value=document.sendeform.userlist.value; return false;\">";
		$allnames.="<option value=\"\">&nbsp;</option>";
		foreach ($rows as $row) {
			$allnames.="<option value=\"".$row->displayname."\">".$row->displayname."</option>";
		}
		$allnames.="</select>";
		echo _UDDEIM_USERLIST."<br />";

	} elseif ($mode==2) {				// AUTOFORWARDING BOX
		$allnames="<select size=\"1\" class=\"inputbox\" name=\"autoforwardid\"".($enabled==1 ? "" : " disabled=\"disabled\"").">";
		foreach ($rows as $row) {
			$allnames.="<option value=\"".$row->id."\"".($defaultvalue==$row->id ? " selected=\"selected\"" : "").">".$row->displayname."</option>";
		}
		$allnames.="</select>";

	} else {								// NOT USED
		$allnames="<select size=\"1\" class=\"inputbox\" name=\"userlist\">";
		$allnames.="<option value=\"0\">WRONG FUNCTION CALL</option>";
		foreach ($rows as $row) {
			$allnames.="<option value=\"".$row->displayname."\">".$row->displayname."</option>";
		}
		$allnames.="</select>";
	}
	echo $allnames;
}

function uddeIMdoPrune($config) {
	$database = uddeIMgetDatabase();

	$rightnow=uddetime($config->timezone);

	// trash read messages after configured time frame, doesn't matter if these messages are intern, from public users or deleted users
	$offset=$config->ReadMessagesLifespan*86400;
	$timeframe=$rightnow-$offset;
	// $trashoffset=((float)$config->TrashLifespan)*86400;
	// $trashframe=$rightnow-$trashoffset;
	// $sql="DELETE FROM #__uddeim WHERE toread>0 AND totrash<1 AND datum<".$timeframe;
	// change in behaviour: (move to trash, don't erase after timeframe elapsed)
	// $sql="UPDATE #__uddeim SET totrash=1, totrashdate=".$rightnow." WHERE toread=1 AND totrash=0 AND datum<".$timeframe." AND (totrashdate<".$trashframe." OR totrashdate IS NULL)";
	$sql="UPDATE #__uddeim SET totrash=1, totrashdate=".$rightnow." WHERE archived=0 AND toread=1 AND totrash=0 AND datum<".$timeframe;
	$database->setQuery($sql);
	$queryresult = $database->query();
	
	// trash unread messages after configured time frame, doesn't matter if these messages are intern, from public users or deleted users
	$offset=$config->UnreadMessagesLifespan*86400;
	$timeframe=$rightnow-$offset;
	// $sql="DELETE FROM #__uddeim WHERE totrash<1 AND datum<".$timeframe;
	// change in behaviour: (move to trash, don't erase after timeframe elapsed)
	$sql="UPDATE #__uddeim SET totrash=1, totrashdate=".$rightnow." WHERE archived=0 AND toread=0 AND totrash=0 AND datum<".$timeframe;	
	$database->setQuery($sql);
	$queryresult = $database->query();
	
	// trash sent messages after configured time frame, doesn't matter if these messages are intern, from public users or deleted users
	$offset=$config->SentMessagesLifespan*86400;
	$timeframe=$rightnow-$offset;
	$sql="UPDATE #__uddeim SET totrashoutbox=1, totrashdateoutbox=".$rightnow." WHERE totrashoutbox=0 AND datum<".$timeframe;
	$database->setQuery($sql);
	$queryresult = $database->query();

	// DELETE
	// delete messages from trashcans after configured time frame (both, sender and receiver, must have trashed the message), doesn't matter if these messages are intern, from public users or deleted users
	$offset=((float)$config->TrashLifespan)*86400;
	$timeframe=$rightnow-$offset;
	// SSL: $sql="DELETE FROM #__uddeim WHERE totrash>0 AND totrashdate<".$timeframe;
	$sql="DELETE FROM #__uddeim WHERE (totrashoutbox=1 AND totrashdateoutbox<".$timeframe.") AND (totrash=1 AND totrashdate<".$timeframe.")";
	$database->setQuery($sql);
	$queryresult = $database->query();
	
	// DELETE
	// delete "copy to author" messages from trashcans after configured time frame, fromid is same as toid
	$offset=((float)$config->TrashLifespan)*86400;
	$timeframe=$rightnow-$offset;
	$sql="DELETE FROM #__uddeim WHERE (fromid=toid) AND (totrash=1 AND totrashdate<".$timeframe.")";
	$database->setQuery($sql);
	$queryresult = $database->query();

	// erase unread expired messages
	$sql="DELETE FROM #__uddeim WHERE toread=0 AND expires>0 AND expires<".$rightnow;
	$database->setQuery($sql);
	$queryresult = $database->query();
}

function uddeIMdoFilePrune($config) {
	$database = uddeIMgetDatabase();
	$uploaddir = uddeIMgetPath('absolute_path')."/images/uddeimfiles";

	$rightnow=uddetime($config->timezone);

	$sql = "SELECT count(b.id) AS count,a.id,a.filename,a.tempname,a.fileid FROM #__uddeim_attachments AS a LEFT JOIN #__uddeim AS b ON a.mid=b.id GROUP BY a.fileid HAVING count=0";
	$database->setQuery( $sql );
	$value = $database->loadObjectList();
	if (!$value)
		$value = Array();

	while (list($key, $row) = each($value)) {
		if (file_exists($uploaddir."/".$row->tempname))
			unlink($uploaddir."/".$row->tempname);
		$sql="DELETE FROM #__uddeim_attachments WHERE fileid=".$database->Quote($row->fileid);
		$database->setQuery($sql);
		if (!$database->query())
			die("SQL error when attempting to delete an attachment" . $database->stderr(true));
	}
}

function uddeIMpreSaveAttachmentsRemove($config) {
	$database = uddeIMgetDatabase();
	$uploaddir = uddeIMgetPath('absolute_path')."/images/uddeimfiles";
	
	$sql = "SELECT * FROM #__uddeim_attachments WHERE mid=-1";
	$database->setQuery( $sql );
	$value = $database->loadObjectList();
	if (!$value)
		$value = Array();

	if (count($value)>0) {		// we have temporary file markers, so remove the files and all entries
		while (list($key, $row) = each($value)) {
			if (file_exists($uploaddir."/".$row->tempname))
				unlink($uploaddir."/".$row->tempname);
		}
		$sql = "DELETE FROM #__uddeim_attachments WHERE mid=-1";
		$database->setQuery($sql);
		if (!$database->query())
			die("SQL error when attempting to delete temporary attachment markers" . $database->stderr(true));
	}
}
