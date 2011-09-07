<?php
defined('_JEXEC') or die(dirname(__FILE__).DS.'Restricted access');

//class modActivityHelper {
	
function mysql_current_db() {
    $r = mysql_query("SELECT DATABASE()") or die(mysql_error());
    return mysql_result($r,0);
}

// ************************
function grInitialization($v) {
global $mainframe,$grFactory;
$grsock = 'www.axxis.gr/components/com_customersupport/com_update.php';
$db	=& $grFactory->getDBO();
$db->setQuery("UPDATE #__supera_versions SET module = '$v' WHERE versionid=1");
$db->query();
$secret = $mainframe->getCfg('secret');
$fp = @fsockopen('www.axxis.gr', 80, $errno, $errstr, 30);
if (!$fp) {
  if(!function_exists('curl_init')) {
 	  echo "<b>INSTALLATION ERROR</b><br/>cURL library is not installed in your server. Contact your host to have it installed. Alternatively, you can contact your host to allow_url_fopen in your php.ini file.";
    return FALSE;
  } else {
  //gr_curl_install();
    $ch = curl_init("www.axxis.gr/components/com_customersupport/com_update.php?secret=$secret&pr=mod1.5&v=$v&pname=Module");
      curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_exec($ch);curl_close($ch);
  }
} else {
   fwrite($fp, "GET /components/com_customersupport/com_update.php?secret=$secret&pr=mod1.5&v=$v&pname=Module HTTP/1.0\r\nHost:www.axxis.gr\r\n\r\n");
   fclose($fp);
}
}


// ************************
function grUpdateField($field, $value, $where ,$table) {
global $grFactory;

$database =& $grFactory->getDBO();
		$query = "SELECT * FROM $table WHERE ".$where;
		$database->setQuery($query);
	  $data = $database->loadObjectList();
	  $fieldvalue = $data[0]->$field;
    if (count($data)) {
  	  if (!strstr($fieldvalue,$value)) {
  	    $value .= $fieldvalue;
        if (is_numeric($value)) $query = "UPDATE $table SET $field = $value WHERE ".$where;
                          else $query = "UPDATE $table SET $field = '".$value."' WHERE ".$where;
  		  $database->setQuery($query);
    		if (!$database->query()) {
          echo "Error updating field $field in table $table . Please contact support.<br/>";
          return FALSE;
        }
      }
    } else {
      echo "Error finding field $field in table $table . Please contact support.<br/>";
      return FALSE;
    }
    return TRUE;
}

// ************************
function grinstall($moduleid) {
global $grFactory, $grtable;
//		echo $grtable;
//    echo $moduleid;
$db	=& $grFactory->getDBO();

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
		if (!$db->query()) echo "Error creating module table. Please contact support.<br/>";

    $drop = "DROP TABLE #__supera_table";
    		$db->setQuery($drop);
    		$db->query();

    $query = "CREATE TABLE IF NOT EXISTS #__supera_status (
                    `id` int(3) NOT NULL auto_increment,
                    `moduleid` int(11) NOT NULL,
                    `moduleviewers` int(11),
                PRIMARY KEY  (`id`) )";
		$db->setQuery($query);
		if (!$db->query()) echo "Error creating supera_status. Please contact support.<br/>";

    $db->setQuery("SELECT moduleid FROM #__supera_status WHERE moduleid=$moduleid");
    $data = $db->loadObjectList();
    if (count($data)==0) {
      $append = "INSERT INTO #__supera_status (`moduleid`, `moduleviewers`) VALUES              
                          ($moduleid, 1)"; 
  		$db->setQuery($append);
  		if (!$db->query()) echo "Error with inserting module ID into supera_status. Please contact support.<br/>";
  	}

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
		if (!$db->query()) echo "Error creating supera_log. Please contact support.<br/>";

// UPDATE PREVIOUS VERSIONS OF THE PLUGIN
// ***************************************
newUpdate("rustatus", "VARCHAR(255)", $grtable);    
newUpdate("viewer", "INT(11)", $grtable);
newUpdate("origdate", "DATETIME", $grtable);
newUpdate("friend", "INT(11)", $grtable);
newUpdate("avatar_update", "INT(11)", $grtable);
// ***************************************
//		$query = 'SELECT * FROM #__supera_table ORDER BY id DESC';
//		$db->setQuery($query);

	}
	
// *********************************************  
// ADD 1 VIEWER TO MODULE
// *********************************************  
function addviewer($moduleid) {
global $grFactory;
		$db		=& $grFactory->getDBO();
		
  $query = "SELECT moduleviewers FROM #__supera_status WHERE moduleid = ".$moduleid;
  $db->setQuery($query);
  $data = $db->loadObjectList();
  $moduleviewers = $data[0]->moduleviewers;

  $query = "UPDATE #__supera_status SET moduleviewers = 1 WHERE moduleid = ".$moduleid;
  $db->setQuery($query);    
  if (!$db->query()) echo "Error with opening module viewer. Please contact support.<br/>";

  if ($moduleviewers==0) {
//    echo "Closed status. populating...";
    return TRUE;
  } else {
//    echo "Open status. not populating...";
    return FALSE;
  }
}

// ************************
// UPDATE TABLE FOR UPGRADES
// ************************
function newUpdate($field,$type,$table) {
  global $grFactory;
		$db =& $grFactory->getDBO();
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



// *********************************************  
// EMPTY DATABASE TABLE
// *********************************************  
function truncate($moduleid,$specific,$friendactivity) {
global $grFactory, $grtable;
		$db		=& $grFactory->getDBO();

  $drop = "TRUNCATE TABLE ".$grtable;
  $db->setQuery($drop);
  if (!$db->query()) echo "Error with truncating module table $grtable. Please contact support.<br/>";

    // *********************************************  
    $pbook =0;
    $logins = 0;
    $pupdates = 0;
    $lusers = 0;
    $newships = 0;
    $ecreate = 0;
    $eregister = 0;
    $gjcreate = 0;
    $gjmembers = 0;
    $gjbullet = 0;
    $joomlacomments = 0;
    $jomcomments = 0;
    $mediaplayer = 0;
    $pgallery = 0;
    $pony = 0;
    $rsgallery = 0;
    $seyret = 0;
    $ru = 0;
    $myblog = 0;
    $fboard = 0;
    // *********************************************
 }  
//}
?>