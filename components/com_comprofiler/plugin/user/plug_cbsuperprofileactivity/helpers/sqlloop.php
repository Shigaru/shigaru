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
// LOOP FOR EVERY USER FOUND
// *********************************************
$k = count($data);
$i = 0;
//echo "<br/>Count(data):$k<br/>";
while ($i < $k) {
// *********************************************
// INITIATE BLANK FIELDS
// *********************************************
$access='';
$avatar_update=0;
$userid=0;
$usernames='';
$uname='';
$avatarimg='';
$gender='';
$postername='';
$posterid=0;
$rsimagename='';
$rstitle='';
$rsimageid=0;
$newfriend=0;
$eventid=0;
$eventtitle='';
$eventdescription='';
$eventdate='0000-00-00';
$eventlocation=0;
$eventimage='';
$groupid=0;
$grouptitle='';
$groupdescr='';
$groupimg='';
$bulletin='';
$bullid=0;
$contentid=0;
$content1='';
$comment='';
$cb_photo='';
$cb_thumb='';
$fbsubject='';
$fbid=0;
$fbthread=0;
$fbcatid=0;
$fbaccess='';
$fbrecurse='';
$fbOK=FALSE;
$seyrettitle='';
$seyretid=0;
$picturelink='';
$actidate='0000-00-00';
$origdate='0000-00-00';
$rustatus="";
$viewer=0;

if ($count == $i) $k=$count; // if in profilebook entries we reach the number given by user, stop loop
//echo "entered loop, i=".$i.", k=".$k."<br/>";
// *********************************************
//             DEFINE TABLE ENTRIES
// *********************************************
$dat = $data[$i];

//if ($flag==3) echo "OrigDate is ".$dat->actidate." , will transform to ";
if ($modulename!=5) {
  $origdate = $dat->actidate;
  $actidate =& $grFactory->getDate($origdate);
}
/*  if ($flag==3) {
    $actidate = $actidate->toFormat();
    echo $actidate." in ".date_default_timezone_get()."<hr/>";
    $actidate = $grFactory->getDate($origdate);
  }
  */

$userid = $dat->id;
$usernames = $dat->username;
$avatarimg = $dat->avatar;
$uname = $db->getEscaped($dat->name);
$viewer = $myid;

if ($showgender) {
switch ($dat->cb_gender) {
  case $male :
    $gender="male";
    break;
  case $female :
    $gender="female";
    break;
  default:
    $gender="other";
  }
}
//if ($dat->cb_gender == "_UE_MALE") {$gender="male";} else {$gender="female";}
if ($flag==3) {
  $actidate->setOffset($configOffset);
}

if ($flag==4) {
  if ($dat->avatar_update) $avatar_update=1;
  $actidate->setOffset($serveroffset+$configOffset);
}

if ($flag==6) {
  $actidate->setOffset($serveroffset+$configOffset);
}

if ($flag==7) {
  $newfriend = $dat->referenceid;
  $actidate->setOffset($serveroffset);
    }

if ($modulename==5) {
  $bullid = $dat->num;
  $actidate='0000-00-00';
  $origdate='0000-00-00';
} else {
  if ($timeissues) $actidate = $origdate; else  $actidate = $actidate->toFormat();
//  echo $actidate."<hr/>";
}


// *********************************************
//      ***END*** DEFINE TABLE ENTRIES
// *********************************************

$auto_incr ++;
if ($flag!=16) $fbOK = TRUE;
if ($fbOK) {
$append = "INSERT INTO $grtable (`userid`, `username`, `uname`, `cavatar`, `cbgender`, `postername`, `posterid`, 
                                        `rsimagename`, `rsimagetitle`, `rsimageid`, `referenceid`, `avatar_update`, 
                                        `eventid`, `eventtitle`, `eventdescription`, `eventdates`, `eventlocid`, `eventimage`,
                                        `groupid`, `grouptitle`, `groupdescr`, `groupimage`, `bullid`, `bulletin`, 
                                        `contentid`, `content`, `comment`,
                                        `pgfilename`, `pgitemtitle`, 
                                        `fbsubject`, `fbid`, `fbthread`, `fbcatid`, 
                                        `seyrettitle`, `seyretid`, `picturelink`,
                                        `actidate`, `flag`, `what`, `rustatus`, `viewer`, `origdate`, `friend`) VALUES              
                        ($userid, '$usernames', '$uname', '$avatarimg', '$gender', '$postername', $posterid,
                         '$rsimagename', '$rstitle', $rsimageid, $newfriend, $avatar_update, 
                         $eventid, '$eventtitle', '$eventdescription', '$eventdate', $eventlocation, '$eventimage',
                         $groupid, '$grouptitle', '$groupdescr', '$groupimg', $bullid, '$bulletin', 
                         $contentid, '$content1', '$comment',
                         '$cb_thumb', '$cb_photo',
                         '$fbsubject', $fbid, $fbthread, $fbcatid, 
                         '$seyrettitle', $seyretid, '$picturelink',
                         '$actidate', $flag, '$what', '$rustatus', $viewer, '$origdate', $friendactivity)";     

		$db->setQuery($append);
		if (!$db->query()) {
			echo "Error with $usernames activity: Flag:$flag - Count:$i - Actidate:$actidate. Please contact support.<br/>";
//			return false;
		}
}
// *********************************************
$i ++;
if ($link=='index.php?option=com_simgallery' && $flag==16) $flag=$tempflag;
//$shownid = $dat->u.id; // FOR BRINGING UP THE CORRECT USER, FRIEND OR SPECIFIC
/*echo 
"userID:".$userid.
" username:".$usernames.
" Name:".$uname.
" Avatar:".$avatarimg.
" gender:".$gender."<br/>".
" postername:".$postername.
" posterid:".$posterid."<br/>".
" rsimage:".$rsimagename.
" rstitle:".$rsimagetitle.
" rsimageid:".$rsimageid."<br/>".
" newfriend:".$newfriend."<br/>".
" eventID:".$eventid.
" eventTitle:".$eventtitle.
" eventDescr:".$eventdescription.
" eventDate:".$eventdate.
" eventLoc:".$eventlocation.
" eventImage:".$eventimage."<br/>".
" groupID:".$groupid.
" groupTitle:".$grouptitle.
" groupDescr:".$groupdescr.
" groupImg:".$groupimg."<br/>".
" contentID:".$contentid.
" content1:".$content1.
" comment:".$comment."<br/>".
" cbphoto:".$cb_photo.
" cbthumb:".$cb_thumb."<br/>".
" fbsubject:".$fbsubject.
" fbid:".$fbid.
" fbthread:".$fbthread.
" fbcatid:".$fbcatid."<br/>".
" seytetTitle:".$seyret_title.
" seyretID:".$seyret_id.
" picturelink:".$picturelink."<br/>".
" ACTIDATE:".$actidate.
" flag:".$flag.
" WHAT:".$what.
"<hr/>";
*/
}
?>
