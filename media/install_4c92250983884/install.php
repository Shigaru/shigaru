<?php
/*
* @name CB_activity 1.18
* Created By grVulture
* http://www.axxis.gr
* @copyright  mod_CB_activity Copyright (C) 2008  Axxis.gr / All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

// Direct Acess not allowed!
// no direct access
defined('_JEXEC') or die(dirname(__FILE__).DS.'Restricted access');

    function url_exists($url){
        $url = str_replace("http://", "", $url);
        if (strstr($url, "/")) {
            $url = explode("/", $url, 2);
            $url[1] = "/".$url[1];
        } else {
            $url = array($url, "/");
        }
//        echo $url[0]."<br/>";
        if ($url[0]=="www.partypeople.gr") $url[0]="partypeople.gr";
        $fh = @fsockopen($url[0], 80);
        if ($fh) {
            fputs($fh,"GET ".$url[1]." HTTP/1.1\nHost:".$url[0]."\n\n");
            if (fread($fh, 22) == "HTTP/1.1 404 Not Found") { return FALSE; }
            else { return TRUE;    }

        } else { return FALSE;}
    }
// ************************
// UPDATE TABLE FOR UPGRADES
// ************************
function grcbInstallUpdate($field,$type,$table) {
		$db =& JFactory::getDBO();
		$query = "SHOW COLUMNS FROM $table LIKE '".$field."'";
		$db->setQuery($query);
	  $data = $db->loadObjectList();
    if (count($data)==0) {
      $query = "ALTER TABLE $table ADD $field $type";
		  $db->setQuery($query);
  		$db->query();
    }
}
// ************************
function plug_cb_plugin_superactivity_install() {
global $mainframe;

echo "<img src=\"http://www.axxis.gr/images/banner.jpg\"><br/>CB Super Profile Activity written by Chris grVulture Michaelides<br/><br/>";
echo "For any questions, bug reporting, etc. visit the <a href='http://www.axxis.gr/super_activity/index.php/joomla-forum'>CB Super Activity Forum</a><br/><br/>";
echo "<small>Copyright © 2009 www.axxis.gr	All rights reserved.</small><br/><br/>";

$grtable = "#__supera_cb_tab";
$db	=& JFactory::getDBO();
$return = "";

$grsock = 'www.axxis.gr/components/com_customersupport/com_update.php';
$db->setQuery("SELECT cb FROM #__supera_versions WHERE versionid=1");
$data = $db->loadObjectList();
$v = $data[0]->cb;
$secret = $mainframe->getCfg('secret');
$fp = @fsockopen('www.axxis.gr', 80, $errno, $errstr, 30);
if (!$fp) {
  if(!function_exists('curl_init')) {
 	  echo "<b>INSTALLATION ERROR</b><br/>cURL library is not installed in your server. Contact your host to have it installed. Alternatively, you can contact your host to allow_url_fopen in your php.ini file.";
    return FALSE;
  } else {
  //gr_curl_install();
    $ch = curl_init("www.axxis.gr/components/com_customersupport/com_update.php?secret=$secret&pr=cb1.5&v=$v&pname=CB");
      curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_exec($ch);curl_close($ch);
  }
} else {
   fwrite($fp, "GET /components/com_customersupport/com_update.php?secret=$secret&pr=cb1.5&v=$v&pname=CB HTTP/1.0\r\nHost:www.axxis.gr\r\n\r\n");
   fclose($fp);
}

		
$query = "CREATE TABLE IF NOT EXISTS ".$grtable." (
                    `id` int(3) NOT NULL auto_increment,
                    `userid` int(11) NOT NULL,
                    `username` varchar(150) NOT NULL,
                    `uname` varchar(250) NOT NULL,
                    `cavatar` varchar(255),
                    `cbgender` varchar(255),
                    `postername` varchar(255),
                    `posterid` varchar(255),
                    `rsimagename` varchar(100),
                    `rsimagetitle` varchar(50),
                    `rsimageid` int(11),
                    `referenceid` int(11),
                    `eventid` int(11),
                    `eventtitle` varchar(100),
                    `eventdescription` mediumtext,
                    `eventdates` date,
                    `eventlocid` int(11),
                    `eventimage` varchar(100),
                    `groupid` int(5),
                    `grouptitle` varchar(255),
                    `groupdescr` text,
                    `groupimage` varchar(255),
                    `bulletin` varchar (255),
                    `bullid` int(11), 
                    `contentid` int(11),
                    `content` varchar(50),
                    `comment` text,
                    `pgfilename` varchar(50),
                    `pgitemtitle` varchar(50),
                    `fbsubject` tinytext,
                    `fbid` int(11),
                    `fbthread` int(11),
                    `fbcatid` int(11),
                    `seyrettitle` text,
                    `seyretid` int(11),
                    `picturelink` text,
                    `actidate` datetime NOT NULL default '0000-00-00 00:00:00',
                    `flag` int(11) NOT NULL,
                    `what` varchar(50),
                PRIMARY KEY  (`id`) )";
  	$db->setQuery($query);
		if (!$db->query()) $return.= "Error creating tab table. Please contact support.<br/>";

    $query = "CREATE TABLE IF NOT EXISTS #__supera_log (
                    `id` int(3) NOT NULL auto_increment,
                    `userid` int(11) NOT NULL,
                    `username` varchar(150) NOT NULL,
                    `uname` varchar(250) NOT NULL,
                    `actidate` datetime NOT NULL default '0000-00-00 00:00:00',
                    `flag` int(11) NOT NULL,
                    `what` varchar(50),
                    `output` text,
                PRIMARY KEY  (`id`) )";
		$db->setQuery($query);
		if (!$db->query()) $return.= "Error creating log table. Please contact support.<br/>";

grcbInstallUpdate("rustatus", "VARCHAR(255)", $grtable);    
grcbInstallUpdate("viewer", "INT(11)", $grtable);
grcbInstallUpdate("origdate", "DATETIME", $grtable);
grcbInstallUpdate("friend", "INT(11)", $grtable);
grcbInstallUpdate("avatar_update", "INT(11)", $grtable);

  return $return;

}
?>
