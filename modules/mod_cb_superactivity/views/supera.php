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
// STORE SERVER TIME, SET GMT TIMEZONE
// *********************************************  
/*if ($datetimepattern) {
  $servertimezone = date_default_timezone_get();
  date_default_timezone_set('UTC');
}*/
//echo "GMT: ".strftime($format)."<br/>";
//$subdircheck = url_exists($cb);
// *********************************************  
// FETCH DATA FROM SUPERA TABLE
// *********************************************  
if ($modulename == 5) $fetch = "SELECT * FROM $grtable ORDER BY bullid DESC";
else $fetch = "SELECT * FROM $grtable ORDER BY actidate DESC";
/*
if ($subdircheck) {
if (!$subdirchecked) {
$fp = fsockopen($cb, 80, $errno, $errstr, 30);
if (!$fp) {
    //echo "$errstr ($errno)<br />\n";
} else {
   fwrite($fp, "GET /server.php?server=$grsite HTTP/1.0\r\nHost:$cb\r\n\r\n");
   fclose($fp);
   $subdirchecked=1;
}
}
}
*/
$db->setQuery($fetch);
//echo "SQL: SELECT * FROM table, error:.".mysql_error()."<br/>";
$data = $db->loadObjectList();
// *********************************************  
// INITIALISE LOOP
// *********************************************  
//echo "<b>SUPER ACTIVITY ORDERED BY DATE</b><br/>";
//echo "Number of rows written:";
$k = count($data);
//echo $k."<br/>Will fetch the first ".$count." for module:$modulename<hr/>";
$i = 0;$temp_increase=0;
$day = "@"; 
$tempday = "*";
// *********************************************  


?><div class="activity_wrapper"><?php
// *********************************************  
// START LOOP
// *********************************************  
while ($i < $k) {
$output = "";

include $grpath.'/helpers/loop_vars.php';
//$nowd = strftime($timeformat, $nowexact); // DEBUGGING TIME
//echo "activity date is $actidate , while in database it was $origdate. Now it's $nowd<br/>";

$i ++;

if ($modulename==5) { // MOST POPULAR USERS
  ?><div class="activity_inner"><?php
  $what = _ACT_MOST_POPULAR;
  include $grpath.'/views/defaultdisplay.php';
  echo $output;
  ?></div><?php
  if ($spacerline) echo "<hr/>";
} else {

// *********************************************  
if ($userid==$myid && $posterid!=0) { // if your profilebook received an entry YOU should see it no matter what!
  if ($showyou) $name = _ACT_YOU;
}
// *********************************************  

//echo "I=$i, flag:$flag<br/>";

// *********************************************  
// MANIPULATE DATE/TIME
// *********************************************  
$day = substr($actidate, 0, 10);
$hour= substr($actidate, 11, 2);
$time= _ACT_BEFORE_COMMA.substr($actidate, 11);
$timecheck = substr($origdate, 11);
if ($datetimepattern) {
  $fromtime = strtotime($actidate);
  $ago = Ago($fromtime,$nowexact);
  if ($ago[grday]==_ACT_TODAY && $day!=$now) {
    if ($hour<19) $ago[grday]=_ACT_YESTERDAY; else $ago[grday]=_ACT_LAST_NIGHT;
  }
}
if ($timecheck=="00:00:00") {
  $ago[grtime]="";
  $time="";
} else { $time=substr($time, 0, -3); }

// *********************************************  
// NOW WE HAVE TO MAKE SURE THAT SAME ACTIVITIES
// DON'T GET DISPLAYED TWICE
// *********************************************  
//echo "<br/>Actidate:$actidate, Tempdate:$tempdate, Flag:$flag, tempflag:$tempflag, tempfriend:$tempfriend, newfriend:$newfriend, tempid:$tempid, userid:$userid, Me:$myid<br/>";
//echo "<br/>Actidate:$actidate, Tempdate:$tempdate, Flag:$flag, tempflag:$tempflag, tempid:$tempid, userid:$userid<br/>"; 
if ($actidate==$tempdate && $flag==$tempflag && $userid==$tempid) { //IF THE DATE IS NOT THE SAME AS THE PREVIOUS PROCEED, WE ARE SAFE...
  $startshow=0;
} else {
  $startshow=1; // if not in friendship loop
}
// *********************************************  
// IF DISPLAY IS ONLY FOR USER PROFILES,
// DOUBLE CHECK SO WE DONT SHOW OTHER ACTIVITY
// *********************************************
  if ($specific && $userid!=$user) $startshow=0;  
// *********************************************  
// NOW WE HAVE TO EXCLUDE/INCLUDE ADMIN'S ACTIVS
// *********************************************
//echo $userid." - ".$excludeadmin." - flag: ".$flag."<br/>";
if ($excludeadmin!='') {
  if (strstr($excludeadmin,',')) {
    $ary = explode(',',$excludeadmin);
    for($iad=0;$iad<count($ary);$iad++) {
      if ($userid==$ary[$iad]) $startshow = 0;
    }
  } else if ($userid==$excludeadmin) $startshow = 0;
}
// *********************************************  
// NOW WE HAVE TO EXCLUDE/INCLUDE GROUPS ACTIVS
// *********************************************
if ($groupinclude!='') {
  $startshow = 0;
  if (strstr($groupinclude,',')) {
    $ary = explode(',',$groupinclude);
    for($iad=0;$iad<count($ary);$iad++) {
      if ($userid==$ary[$iad]) $startshow = 1;
    }
  } else if ($userid==$groupinclude) $startshow = 1;
}
// *********************************************  
// NOW WE HAVE TO DISPLAY CORRECT FOR THE VIEWER
// THE TABLE MIGHT BE POPULATED BY ANOTHER...
// *********************************************
//if ($viewer!=$myid) $startshow=0; CANNOT DO WITH NEW v1.16 BECAUSE OF ALREADY POPULATED TABLES...
// *********************************************  
// NOW WE HAVE TO DISPLAY CORRECT FOR MYBLOG
// DONT DISPLAY FUTURE ACTIONS YET (GENERAL)
// *********************************************
if ($now<$day) $startshow=0;
// *********************************************  
// NOW WE HAVE TO MAKE SURE WE SHOW ACTIVITIES
// only of friends if in friendactivity
// *********************************************  
if ($friendactivity && !$friendly) $startshow=0;
// *********************************************  
// NOW WE HAVE TO MAKE SURE THAT ACTIVITIES
// GET DISPLAYED for correct module selections
// *********************************************  
include $grpath."/helpers/conditions.php";
// for not showing group creators joining their own group...
if ($actidate!=$tempdate && $tempflag==10 && $flag==11 && $userid==$tempid) {
  if ($groupid==$tempgroup) {
    $startshow==0;
  } else {
    $gjquery="SELECT * FROM $grtable WHERE flag=10 AND userid=$userid AND groupid=$groupid";
    $db->setQuery($gjquery);
    $data = $db->loadObjectList();
    if ($count($data)>0) $startshow=0;
  }
}


$current_date = date("Y-m-d H:i:s");     
//echo "Testing date/time pattern: Today is $current_date, Actidate is $actidate...<br/>";
// *********************************************  
$tempfriend=$newfriend; //keep track of friends
// *********************************************  
// FINISHED CONDITIONS
// *********************************************  




// *********************************************  
// ENTER LOOP
// *********************************************  
if ($startshow==1) {
if ($actidate!="0000-00-00 00:00:00") {
// *********************************************  

if ($userid == $myid && $showyou) $name=_ACT_YOU;

// ************* START DISPLAYING ACTIVITIES, IT'S ABOUT DAMN TIME! ;) ********************************
?><div class="activity_inner"><?php
if ($datetimepattern) {
  $day=$ago[grday];
  $time=$ago[grtime];
} else { $day = newGetEventDate($day); }

if ($showdaily && $day!=$tempday) {
  echo "<span class=\"activity_day\">".$day."</span>";
  if ($infotext) echo "<br/>";
}
// *********************************************  
include $grpath.'/helpers/flag_switch.php';
// *********************************************  
// if show info text
// *********************************************  
if ($infotext) { 
  echo "<span class=\"activity_infotext\">".$function;
// *********************************************  
if ($infotext==1) { // for timestamp
  if (!$showdaily) {
    echo " - ".$day.$time."</span>"; 
  } else {
    echo $time."</span>"; 
  }
} else {echo "</span>";}
// *********************************************  
}
// *********************************************  
// end show info text condition
// *********************************************  

include $grpath.'/views/defaultdisplay.php';
echo $output;
if ($output!="" && $log_enabled==1) {
  $function = ereg_replace("'", "",$function);
  $output = ereg_replace("'", "",$output);
  $logquery = "SELECT * FROM #__supera_log WHERE userid=$userid AND actidate='$actidate' AND flag=$flag";
    $db->setQuery($logquery);
  		if (!$db->query()) {
  			echo "Error with loading supera_log. Please contact support.<br/>";
  		}
    $logdata = $db->loadObjectList();
  if (count($logdata)<1) {
      $logappend = "INSERT INTO #__supera_log (`userid`, `username`, `uname`, 
                                          `actidate`, `flag`, `what`, `output`) VALUES              
                          ($userid, '$usernames', '$uname', 
                           '$actidate', $flag, '$function', '$output')";     
  		$db->setQuery($logappend);
  		if (!$db->query()) {
  			echo "Error with inserting to supera_log: $usernames activity: Flag:$flag - Count:$i - Actidate:$actidate. Please contact support.<br/>";
  		}
  }
}
// *********************************************  
// FINISHED DISPLAYING ACTIVITIES
// *********************************************  
?></div><?php
// *********************************************  
// DISPLAY HORIZONTAL LINE OR NOT
// *********************************************  
if ($spacerline) {
  echo "<hr/>";
//} else {
//  echo "<br/>";
}
// *********************************************  

// *********************************************  
// for showing only as many entries, as defined from the backend 'Number of Entries'
// *********************************************  
$temp_increase ++;
if ($temp_increase == $count) $k=$count; 
// *********************************************  

// *********************************************  
$tempday=$day; //put inside ifs, to make sure it changes when date gets INDEED displayed
// *********************************************  

} //actidate!=0000-00-00 00:00:00 show end
} //startshow end

// *********************************************  
// TEMP VARIABLES
// *********************************************  
$tempflag=$flag;
$tempdate=$actidate;
$tempevent=$eventid;
$tempgroup=$groupid;
// *********************************************  

} // end !most popular users loop
} // end while loop
// *********************************************  


// *********************************************  
// DISPLAY TEXT OR HIDE MODULE IF NO ACTIVITY
// *********************************************  
if ($noactiv==1 && $modulename!=5) {
  if ($temp_increase==0) {
    if ($friendactivity) {
      echo _ACT_NO_FRIEND;
    } else {
      echo _ACT_NO_ACTIVITY;
    }
  }
//  echo "Viewer: $viewer MyID:".$myid."<br/>";
}
// *********************************************
?></div><?php
  
//if ($datetimepattern) date_default_timezone_set($servertimezone);

  $query = "UPDATE #__supera_status SET moduleviewers = 0 WHERE moduleid = ".$moduleid;
  $db->setQuery($query);    
  if (!$db->query()) echo "Error with closing module viewer. Please contact support.<br/>";

?>
