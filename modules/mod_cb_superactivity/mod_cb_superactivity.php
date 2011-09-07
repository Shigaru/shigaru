<?php
/*
* @name mod_CB_activity 1.0.8
* Created By grVulture
* http://www.axxis.gr
* @copyright  mod_CB_activity Copyright (C) 2008  Axxis.gr / All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

// Direct Acess not allowed!
// no direct access
defined('_JEXEC') or die(dirname(__FILE__).DS.'Restricted access');
global $sql_gender, $male, $female, $grguest, $guestlink, $debug, $grtable, $grRoute, $grFactory, $subdirchecked, $ehorizontal, $ghorizontal, $imageinc, $grsite, $grpath, $shownotavatar, $width_thumbcb, $height_thumbcb, $link_jc, $linkdate, $mainframe, $myid, $grpathtouser, $online, $imagelinked, $shownamedetails, $usernamelinked, $activity, $myactiv;


$version = "LIGHT";

$p = getcwd();
$p = str_replace('/modules/mod_cb_superactivity','',$p);

$grpopulate = TRUE;
$grFactory = new JFactory();
$grRoute = new JRoute();
$grRequest = new JRequest();
$grUser =& $grFactory->getUser(); 
$grguest = $grUser->guest;
$grusertype = '';
$myid = $grUser->id;
$what='';
$config =& $grFactory->getConfig();
$moduleid = $module->id;
$grtable = "#__supera_".$module->id;
$grpath = dirname(__FILE__);
$grsite  = JURI::base();
$grpre = "www.";
$db =& $grFactory->getDBO();

// COOKIE NOT NEEDED
//$visitoroffset = $_COOKIE['visitoroffset'];
//echo "VISITOFFSET: ".$visitoroffset.". ";
//echo date_default_timezone_get()."<br/>";
//$visitdate = time()+$visitoroffset;
//echo ". VISIT: ".$visitdate;
//echo "Visitor date/time is ".strftime($format,$visitdate);
//$server_visit_offset = $servertime - $visitdate;
//echo "Time difference from server is ".$server_visit_offset;

// TOTAL MANIPULATION OF TIME! WORKS ONLY IN J!1.5
$timeformat = '%Y-%m-%d %H:%M:%S';
$servertime = time();
$serverformat = date("Y-m-d H:i:s");
//echo "NOW it's $serverformat ($servertime) in server. ";
if (function_exists("date_default_timezone_set") and function_exists("date_default_timezone_get")) {
  $servertimezone = date_default_timezone_get();
  date_default_timezone_set('UTC');
  $php=0;
  $configOffset=$config->getValue('config.offset');
} else {
  $php=1;
  $configOffset=0;
}
$now = strftime($timeformat);
$nowJ =& $grFactory->getDate($now);
$nowJ->setOffset($configOffset);
$nowtime = $nowJ->toFormat(); // this is Joomla time NOW
$now = $nowJ->toFormat('%Y-%m-%d'); // this is Joomla time NOW
//echo "Joomlatime: $nowtime<br/>";
$gmtformat = date("Y-m-d H:i:s");
//echo "It is $gmtformat ";
if ($php==0) {
  date_default_timezone_set($servertimezone);
}
$gmttime = strtotime($gmtformat);
//echo "($gmttime) in GMT. ";
$nowexact = strtotime($nowtime); // this is Joomla time NOW
//echo "Joomla EXACT time: ".$nowexact;
$serveroffset = ($gmttime - $servertime)/3600;
//echo "Time difference: $serveroffset<br/>";


// Include the syndicate functions only once
include_once $grpath.'/helpers/functions.php';
require_once $grpath.'/helper.php';
newgrloadLanguage($grpath);
include $grpath.'/helpers/parameters.php';

if ($php==1 && $debug!=2) {
  echo "<span class=\"activity_small_text\"><b>WARNING:</b> Your server's PHP version is lower than PHP 5!";
  echo " Any versions prior to PHP 5 are more than 1 year old! They are considered outdated and not supported by PHP!";
  echo " Please upgrade your PHP version, put pressure on your hoster to do so, or change your hosting company!";
  echo " To hide this text, please set 'Debug Mode' to 'PHP 4'.<br/>";
  echo " <b>Notice:</b> Module may not function correctly using PHP 4.</span>";
}

if ($specific && !$profileview) return; // if specific profile activities, and not in profile pages

$db->setQuery("SELECT module FROM #__supera_versions WHERE versionid=1");
$data = $db->loadObjectList();
if ($data[0]->module != $version) grInitialization($version);
//echo substr($grtable,3)." - ";
//if (!mysql_num_rows( mysql_query("SHOW TABLES LIKE '%".substr($grtable,3)."'"))) {
$query = "SHOW TABLES LIKE '%".substr($grtable,3)."'";
  $db->setQuery($query);
  $data = $db->loadObjectList();
if (count($data)<1) {
  grinstall($moduleid);
  $grpopulate = FALSE;
} else {
  $grpopulate = addviewer($moduleid);
}
  if ($grpopulate) truncate($moduleid,$specific,$friendactivity);

if ($debug==1) include $grpath.'/helpers/error_handler.php';

$query = "select count(*) as num from ".$grtable;
$db->setQuery($query);
$data = $db->loadObjectList();
//echo $data[0]->num." DATA";
if ($data[0]->num < 1 OR $friendactivity OR $specific) {
  include $grpath.'/helpers/sql_loads.php';
}

  include $grpath.'/views/supera.php';

echo $output2;
?>
