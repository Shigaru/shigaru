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

// *********************************************
// used in displaying activities
// *********************************************
$seyret_link = "";
$fb_link = "";
$link_photo = "";
$link_thumb = "";
$link_poster = "";
$eventlink = "";
$posterimg = "";
$link_cb_noSEF = "";
$commentoutput = "";
$echo = "";
$rustatus = "";
// *********************************************
$friendly=0;
$viewer=0;
$avatar_update=0;
$userid=0;
$usernames="";
$uname="";
$img="";
$gender="";
$itemid = "";
$link_cb = "";
//$link_mail = sefRelToAbs("index.php?option=com_comprofiler&task=emailUser&uid=$dat->userid");
$postername="";
$posterid=0;
$rsimagename="";
$rsimagetitle="";
$rsimageid=0;
$newfriend=0;
$eventid=0;
$eventtitle="";
$eventdescription="";
$eventdate="";
$eventlocation=0;
$eventimage="";
$groupid=0;
$grouptitle="";
$groupdescr="";
$groupimg="";
$bullid=0;
$bulletin="";
$contentid=0;
$content1="";
$comment="";
$cb_thumb="";
$cb_photo="";
$fbsubject="";
$fbid=0;
$fbthread=0;
$fbcatid=0;
$seyret_title="";
$seyret_id=0;
$picturelink="";
$actidate="";
$flag =0;
$what="";
$rustatus="";

$dat = $data[$i];

$userid=$dat->userid;
$link_cb = $grRoute->_("index.php?option=com_comprofiler&amp;task=userProfile&amp;user=$userid$cb_itemid");
$output2="";
$link_cb_noSEF = "index.php?option=com_comprofiler&amp;task=userProfile&amp;user=$userid$cb_itemid";
if ($guestlink!='GUESTS ALLOWED' && $grguest) $link_cb=$guestlink;

$origdate=$dat->origdate;
$friendly=$dat->friend;
$viewer=$dat->viewer;
$avatar_update=$dat->avatar_update;
$usernames=$dat->username;
$uname=$dat->uname;
$img=$dat->cavatar;
$gender=$dat->cbgender;
//$link_mail = sefRelToAbs("index.php?option=com_comprofiler&task=emailUser&uid=$dat->userid");
$postername=$dat->postername;
$posterid=$dat->posterid;
$rsimagename=$dat->rsimagename;
$rsimagetitle=$dat->rsimagetitle;
$rsimageid=$dat->rsimageid;
$newfriend=$dat->referenceid;
$eventid=$dat->eventid;
$eventtitle=$dat->eventtitle;
$eventdescription=$dat->eventdescription;
$eventdate=$dat->eventdates;
$eventlocation=$dat->eventlocid;
$eventimage=$dat->eventimage;
$groupid=$dat->groupid;
$grouptitle=$dat->grouptitle;
$groupdescr=$dat->groupdescr;
$groupimg=$dat->groupimage;
$bullid=$dat->bullid;
$bulletin=$dat->bulletin;
$contentid=$dat->contentid;
$content1=$dat->content;
$comment=$dat->comment;
$cb_thumb=$dat->pgfilename;
$cb_photo=$dat->pgitemtitle;
$fbsubject=$dat->fbsubject;
$fbid=$dat->fbid;
$fbthread=$dat->fbthread;
$fbcatid=$dat->fbcatid;
$seyret_title=$dat->seyrettitle;
$seyret_id=$dat->seyretid;
$picturelink=$dat->picturelink;
$actidate=$dat->actidate;
$flag =$dat->flag;
$what=$dat->what;
$rustatus=$dat->rustatus;

if ($viewname == 0) {
  $name = $dat->username;
} else {
  $name = $dat->uname;
}
?>
