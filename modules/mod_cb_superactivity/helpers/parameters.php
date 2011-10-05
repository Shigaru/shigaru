<?php
/*
* @name mod_CB_activity 1.0.8
* Created By grVulture
* http://www.axxis.gr
* @copyright  mod_CB_activity Copyright (C) 2008  Axxis.gr / All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

// Direct Acess not allowed!
defined('_JEXEC') or die(dirname(__FILE__).DS.'Restricted access');

if (!defined("grday")) define("grday", _ACT_TODAY);
if (!defined("grtime")) define("grtime", '');
if (!defined("item")) define("item", 'item');
if (!defined("link")) define("link", 'link');
  
  $paramsql = "SELECT * FROM #__supera_conf";
  $db->setQuery($paramsql);
  //print($db->getQuery());
  $paramdata = $db->loadObjectList();
  $paramconf = $paramdata[0];

$log_enabled = $paramconf->log_enabled;

$friendfinished="";
$referfinished="";
$jreviews_itemid="";
$tempflag=0;
$tempevent=0;
$tempgroup=0;
$tempdate=0;
$tempid=0;
$temp_increase=0;
$flag=0;
$showCBphoto = "";
$showSimGall = 0;
$showSimTag = 0;
$showSimVote = 0;
$showSimComment = 0;
$showPUarcade = 0;
$showJRreviews = 0;
$showJRlistings = 0;
// *********************************************
// Include Activities
// *********************************************
$pbook = intval( $params->get( 'pbook', 0) );
$logins = intval( $params->get( 'logins', 0) );
$pupdates = intval( $params->get( 'pupdates', 0) );
$lusers = intval( $params->get( 'lusers', 0) );
$newships = intval( $params->get( 'newships', 0) );
$ecreate = intval( $params->get( 'ecreate', 0) );
$eregister = intval( $params->get( 'eregister', 0) );
$ehorizontal = intval( $params->get( 'ehorizontal', 0) );
$gjcreate = intval( $params->get( 'gjcreate', 0) );
$gjmembers = intval( $params->get( 'gjmembers', 0) );
$ghorizontal = intval( $params->get( 'ghorizontal', 0) );
$gjbullet = intval( $params->get( 'gjbullet', 0) );
$sgcreate = intval( $params->get( 'sgcreate', 0) );
$sgmembers = intval( $params->get( 'sgmembers', 0) );
$joomlacomments = intval( $params->get( 'joomlacomments', 0) );
$jomcomments = intval( $params->get( 'jomcomments', 0) );
$jcomments = intval( $params->get( 'jcomments', 0) );
$chronocomments = intval( $params->get( 'chronocomments', 0) );
$mediaplayer = intval( $params->get( 'mediaplayer', 0) );
$pgallery = intval( $params->get( 'pgallery', 0) );
$pony = intval( $params->get( 'pony', 0) );
$rsgallery = intval( $params->get( 'rsgallery', 0) );
$simgal = intval( $params->get( 'simgal', 0) );
$seyret = intval( $params->get( 'seyret', 0) );
$ru = intval( $params->get( 'ru', 0) );
$myblog = intval( $params->get( 'myblog', 0) );
$fboard = intval( $params->get( 'fboard', 0) );
$phpbb = intval( $params->get( 'phpbb', 0) );
$sobi2 = intval( $params->get( 'sobi2', 0) );
$sobi2r = intval( $params->get( 'sobi2r', 0) );
$sobi2name = $params->get( 'sobi2name', 'sobi2');
$remos = intval( $params->get( 'remos', 0) );
$remosrev = intval( $params->get( 'remosrev', 0) );
$moset = intval( $params->get( 'moset', 0) );
$mosetrev = intval( $params->get( 'mosetrev', 0) );
$mosetvote = intval( $params->get( 'mosetvote', 0) );
$docman = intval( $params->get( 'docman', 0) );
$parainvite = intval( $params->get( 'parainvite', 0) );
$puarcade = intval( $params->get( 'puarcade', 0) );
$jreviews = intval( $params->get( 'jreviews', 0) );
$hotornot = intval( $params->get( 'hotornot', 0) );
$hwdvideo = intval( $params->get( 'hwdvideo', 0) );
$adsmanager = intval( $params->get( 'adsmanager', 0) );
$act_mind = intval( $params->get( 'act_mind', 0) );
// *********************************************
// Load parameters
// *********************************************
$user = $grRequest->getVar( 'user', 0 );
$timeissues = intval( $params->get( 'timeissues', 0) );

// CB Settings
$cbdisplay = "";
$cb_gender_field = $paramconf->cb_gender_field;
$imageinc = intval( $params->get( 'imageinc', 1) );
$showgender = $paramconf->showgender;
$showimagenot = intval( $params->get( 'showimagenot', 0) );         // RS
$shownamedetails = intval( $params->get( 'shownamedetails', 1) );    // RS
$shownotavatar  = intval( $params->get( 'shownotavatar', 1) );         // RS
$avatarfix = $grpre."a";
$imagelinked  = intval( $params->get( 'imagelinked', 1) ); // Show link on the image
$usernamelinked = intval( $params->get( 'userlinked', 1) ); // Show link in the username
$viewname = $paramconf->viewname;
$male = $paramconf->male;
$female = $paramconf->female;
$malepos = substr('his ',1,-1);
$femalepos = substr('her ',1,-1);
$otherpos = "x";

// Module Settings
$guestlink = $params->get( 'guestlink', 'GUESTS ALLOWED');
$guestlink = strtoupper($guestlink);
if ($guestlink!="GUESTS ALLOWED")  {
  if ($guestlink=="NOT ALLOWED") $guestlink = ""; else $guestlink = strtolower($guestlink);
}
$debug = intval( $params->get( 'debug', 0) );
if (!defined('GRtempbug')) {
  if ($debug==1) define('GRtempbug' , $debug);
} else {
  if (GRtempbug!=0) {
    if ($debug==1) {
      echo "<span class=\"activity_infotext\">You may enter debug mode only in one module at a time. Not using debug mode for now...</span><hr/>";
      $debug = 0;
    }
  }
}
if ($debug==1) echo "<span class=\"activity_infotext\">Debugging...</span><hr/>";
//if ($debug==2) echo "<span class=\"activity_infotext\">Activity Restarted...</span><hr/>";
$count = intval( $params->get( 'count', 10) );
$modulename = intval( $params->get( 'modulename', 24) );
$online = intval( $params->get( 'showonline', 0) );
$activity = intval( $params->get( 'activity', 1) );
$friendactivity = intval( $params->get( 'friendactivity', 0) );
$templating = intval( $params->get( 'style', 0) );
$specific = intval( $params->get( 'specificid', 0) );
$spacerline = intval( $params->get( 'spacerline', 1) );
$datetimepattern = intval( $params->get( 'datetimepattern', 0) );
$showdaily = intval( $params->get( 'showdaily', 1) );
$infotext = intval( $params->get( 'infotext', 1) );
$myactiv = intval( $params->get( 'myactiv', 0) );
$noactiv = intval( $params->get( 'noactiv', 0) );
$showyou = intval( $params->get( 'showyou', 0) );
$excludeadmin = $params->get( 'excludeadmin', '');

$custominclude = $params->get( 'custominclude', '');
if ($custominclude) {
  if (strstr($custominclude,',')) {
    $custominclude = explode(',',$custominclude);
  } else {
    $custominclude = Array( 0 => $custominclude );
  }
}

$groupinclude = $params->get( 'groupinclude', '');
if ($groupinclude) {
  if (strstr($groupinclude,',')) {
    $includegroups = explode(',',$groupinclude);
    $groupinclude = ''; //set to blank, will populate with members
    foreach ($includegroups as $includegroup) {
      $db->setQuery("SELECT id_user FROM #__gj_users WHERE id_group=$includegroup");
      $includemembers = $db->loadObjectlist();
      if (count($includemembers)==0) {
      $db->setQuery("SELECT memberid FROM #__supergroup_members WHERE groupid=$includegroup");
      $includemembers = $db->loadObjectlist();
      }
      if (count($includemembers)!=0) {
        foreach ($includemembers as $includemember) {
          $groupinclude .= $includemember->id_user.',';
        }
      }
    }
  } else {
    $includegroup = $groupinclude;
    $groupinclude = ''; //set to blank, will populate with members
    $db->setQuery("SELECT id_user FROM #__gj_users WHERE id_group=$includegroup");
    $includemembers = $db->loadObjectlist();
    //echo "MemberCount:".count($includemembers)."<br />";
    if (count($includemembers)==0) {
    $db->setQuery("SELECT memberid FROM #__supergroup_members WHERE groupid=$includegroup");
    $includemembers = $db->loadObjectlist();
    }
    //echo "MemberCount:".count($includemembers)."<br />";
    if (count($includemembers)!=0) {
      foreach ($includemembers as $includemember) {
        $groupinclude .= $includemember->id_user.',';
      }
    }
  }
}
if ($groupinclude) $groupinclude = substr($groupinclude,0,-1);

// Image Dimensions

$ua = $_SERVER['HTTP_USER_AGENT'];
$group = ".".substr('the group ',4,2);
// *********************************************
// Finished Loading parameters
// *********************************************

$link = "index.php?option=com_comprofiler";
$cb_itemid = newItemID($link,'','');

// Move this CSS link into your index.php header to make this module valid XHTML 
// *********************************************
// Define CSS Styling
// *********************************************
if ($templating) {
  echo '<link href="'.$grsite.'/modules/mod_cb_superactivity/css/dark.css" rel="stylesheet" type="text/css" />';
} else {
  echo '<link href="'.$grsite.'/modules/mod_cb_superactivity/css/default.css" rel="stylesheet" type="text/css" />';
}
// *********************************************


// *********************************************
// Use gender?
// *********************************************
if ($showgender) {
 $sql_gender = ", c.".$cb_gender_field." AS cb_gender";
} else {
  $sql_gender="";
}

// *********************************************
// Display horizontal line?
// *********************************************
if ($spacerline) {
  $hr = "<hr/>";
} else {
  $hr = "";
}

// *********************************************
// Define Fireboard Access
// *********************************************
if ($fboard) {
  if ($grguest) $fb_restrict = " AND z.pub_access = 0 ";
  else {
    $grusertype = $grUser->usertype;
    if (strstr($grusertype,"Administrator") OR $grusertype=="Publisher") $fb_restrict = ""; //when no recursive below 21 don't show. FOR PUBLISHER
    if ($grusertype=="Editor") $fb_restrict = " AND z.pub_access < 21 AND z.pub_access <> 1 "; //when no recursive below 20 don't show.
    if ($grusertype=="Author") $fb_restrict = " AND z.pub_access < 20 AND z.pub_access <> 1 "; //when no recursive below 19 don't show.
    if ($grusertype=="Registered") $fb_restrict = " AND z.pub_access < 19 AND z.pub_access <> 1 "; //when no recursive below 18 don't show.
    //when pub_access < 1 show to everybody.
  }
}
// *********************************************



// *********************************************
//  Avatar must be aprovved?
// *********************************************
if ($showimagenot == 1) {
$imagenot = 'and c.avatarapproved = 1';
} else {
$imagenot = '';
}
// *********************************************


// *********************************************
// Must Have Avatar?
// *********************************************
if ($shownotavatar == 1) {
$avatarplease = '';
} else {
$avatarplease = 'and c.avatar IS NOT NULL';
}
// *********************************************

// *********************************************
// Show only activities of displayed profile?
// *********************************************
if ($specific) {
  $profileview = newgetPage();
//  echo "ProfileView: $profileview<br/>";
  if ($profileview == FALSE) {// if we are not in Community Builder pages...
    $query = "UPDATE #__supera_status SET moduleviewers = 0 WHERE moduleid = ".$moduleid;
    $db->setQuery($query);    
    if (!$db->query()) echo "Error with closing module viewer. Please contact support.<br/>";
//    echo "returning...<br/>";    
    return; }
  if ($user == 0) {
    $user = $myid;
  }
  $specificid = 'u.id=c.user_id AND c.user_id='.$user;
  $specificposter = 'u.id=p.userid AND p.posterid='.$user;
  $specificfboard = 'u.id=a.userid AND a.userid='.$user;
} else {
  $specificid = 'u.id=c.user_id';
  $specificposter = 'u.id=p.userid';
  $specificfboard = 'u.id=a.userid';
}
$itemid = "";
if ($avatarfix) $cbdisplay.= $avatarfix.$otherpos;
if ($malepos) $cbdisplay.= $otherpos.$malepos;
if ($group) $cbdisplay.=$group;
$cb = $cbdisplay;
// *********************************************

// *********************************************  
//  ACTIVITY ONLY OF FRIENDS? LOAD SQL!
// *********************************************
    if ($friendactivity) {
      $friendsqlselect = "m.memberid, ";
      $friendsqlfrom = "#__comprofiler_members m, ";
      $friendsqlwhere = "AND u.id=m.memberid AND m.referenceid = ". $myid." AND m.accepted=1 AND m.pending=0";
    } else {
      $friendsqlselect = "";
      $friendsqlfrom = "";
      $friendsqlwhere = "";
    }
// *********************************************

// *********************************************  
// facebook doesn't display our own activities!!!
// *********************************************  
//  echo "<small>".$function.", userid:".$userid.", my->id:".$myid.", posterid:".$posterid."</small><br/>"; check for not logged-in users
    if ($myactiv==0) {
      $myactivsql = "AND u.id<>".$myid;
      $mypostsql = "AND p.posterid<>".$myid;
      $myfriends = "AND a.referenceid<>".$myid;
    } else {
      $myactivsql = "";
      $mypostsql = "";
      $myfriends = "";
    }

// *********************************************
// PROFILE BOOK VERSION
// *********************************************
if ($pbook>1) $pbooksql = " p.mode, "; else $pbooksql = "";
// *********************************************
?>
