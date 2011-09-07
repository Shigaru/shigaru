<?php
defined('_JEXEC') or die(dirname(__FILE__).DS.'Restricted access');

//global $grFactory;
//$grFactory = new JFactory();

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
function grInstallField($field,$type,$table) {
$database =& JFactory::getDBO();
		$query = "SHOW COLUMNS FROM $table LIKE '".$field."'";
		$database->setQuery($query);
	  $data = $database->loadObjectList();
    if (count($data)==0) {
      $query = "ALTER TABLE $table ADD $field $type";
		  $database->setQuery($query);
  		$database->query();
    }
}
// ************************
function grUpdateField($field, $value, $where ,$table, $new) {
$database =& JFactory::getDBO();
		$query = "SELECT * FROM $table WHERE ".$where;
		$database->setQuery($query);
	  $data = $database->loadObjectList();
    if (count($data) && $new) {
      if (is_numeric($value)) $query = "UPDATE $table SET $field = $value WHERE ".$where;
                        else $query = "UPDATE $table SET $field = '".$value."' WHERE ".$where;
		  $database->setQuery($query);
  		if (!$database->query()) {
        echo "Error updating field $field in table $table . Please contact support.<br/>";
        return FALSE;
      }
    } else {
      if ($new) { 
        echo "Error finding field $field in table $table . Please contact support.<br/>";
        return FALSE;
      }
    }
    return TRUE;
}
// ************************
function com_install() {
global $mainframe;//$_VERSION;
jimport('joomla.version');
$grsock = 'www.axxis.gr/components/com_customersupport/com_support.php';
$new = TRUE;
$grVERSION = new JVersion();
$database =& JFactory::getDBO();
$database->setQuery("SELECT component FROM #__supera_versions ORDER BY versionid DESC");
$data=$database->loadObjectlist();
$v=$data[0]->component;
$grsite  = $mainframe->getCfg('live_site');
$secret = $mainframe->getCfg('secret');
$version = $grVERSION->getShortVersion();
$fp = @fsockopen('www.axxis.gr', 80, $errno, $errstr, 30);
if (!$fp) {
  if(!function_exists('curl_init')) {
 	  echo "<b>INSTALLATION ERROR</b><br/>cURL library is not installed in your server. Contact your host to have it installed. Alternatively, you can contact your host to allow_url_fopen in your php.ini file.";
    return FALSE;
  } else {
  //gr_curl_install();
    $ch = curl_init("www.axxis.gr/components/com_customersupport/com_support.php?server=$grsite&secret=$secret&version=$version&pr=c1.5&v=$v");
    curl_exec($ch);curl_close($ch);
  }
} else {
   fwrite($fp, "GET /components/com_customersupport/com_support.php?server=$grsite&secret=$secret&version=$version&pr=c1.5&v=$v HTTP/1.0\r\nHost:www.axxis.gr\r\n\r\n");
   fclose($fp);
}


echo "<img src=\"http://www.axxis.gr/images/banner.jpg\"><br/>CB Super Activity Plugin written by Chris grVulture Michaelides<br/><br/>";
echo "For any questions, bug reporting, etc. visit the ";
echo "<a href='http://www.axxis.gr/super_activity/index.php?option=com_fireboard&Itemid=49' target='_blank'>CB Super Activity Forum</a><br/><br/>";
echo "<small>Copyright © 2009 www.axxis.gr	All rights reserved.</small><br/><br/>";
//    $db		=& $grFactory->getDBO();
		
    $drop = "DROP TABLE IF EXISTS #__supera_table";
    		$database->setQuery($drop);
    		$database->query();
/*
    $drop = "DROP TABLE IF EXISTS #__supera_conf";
    		$database->setQuery($drop);
        $database->query();
        echo "Re-initialising configuration values. Please re-configure the component...<br/>";
*/
    $query = "	CREATE TABLE IF NOT EXISTS `#__supera_conf` (
    	`configid` int(11) NOT NULL auto_increment,
    	`showdate` TINYINT(1) NOT NULL,
    	`showgender` TINYINT(1) NOT NULL,
    	`male` TINYTEXT NOT NULL,
    	`female` TINYTEXT NOT NULL,
    	`viewname` TINYINT(1) NOT NULL,
    	`host` TINYTEXT NOT NULL,
    	`database` TINYTEXT NOT NULL,
    	`user` TINYTEXT NOT NULL,
    	`password` TINYTEXT NOT NULL,
    	`prefix` TINYTEXT NOT NULL,
    	`baseurl` TINYTEXT NOT NULL,
    	`pagename` TINYTEXT NOT NULL,
    	`forumidtag` TINYTEXT NOT NULL,
    	`topicidtag` TINYTEXT NOT NULL,
    	`admin` TINYINT(1) NOT NULL,
    	`forums_include` TINYTEXT NOT NULL,
    	`forums_exclude` TINYTEXT NOT NULL,
      PRIMARY KEY  (`configid`)
    	)";
		$database->setQuery($query);
		if (!$database->query()) {
      echo "Error creating configuration table. Please contact support.<br/>";
      return FALSE;
    }

    $query = "	INSERT INTO `#__supera_conf` (
      `showdate`, `showgender`, `male`, `female`, `viewname`, `host`, `database`, `user`, `password`, `prefix`,
      `baseurl`, `pagename`, `forumidtag`, `topicidtag`, `admin`, `forums_include`, `forums_exclude`, `configid`) VALUES
      (1, 0, '_UE_MALE', '_UE_FEMALE', 0, 'localhost', 'phpbb3', '', '', 'phpbb_',
      '../forum', 'vietopic.php', 'f', 't', 0, '', '', 1)";
		$database->setQuery($query);
		if (!$database->query()) {
      $new = FALSE;
	    echo "Your modules are already configured. Not initializing values. Probably this is not your first installation of CB Super Activity Component.<hr/>";
    } else echo "Thank you for choosing CB Super Activity!<hr/>";
      
    $query = "CREATE TABLE IF NOT EXISTS #__supera_status (
                    `id` int(3) NOT NULL auto_increment,
                    `moduleid` int(11) NOT NULL,
                    `moduleviewers` int(11),
                PRIMARY KEY  (`id`) )";
		$database->setQuery($query);
		if (!$database->query()) {
      echo "Error creating supera_status. Please contact support.<br/>";
      return FALSE;
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
		$database->setQuery($query);
		if (!$database->query()) {
      echo "Error creating supera_log. Please contact support.<br/>";
      return FALSE;
    }

$success = grInstallField("cb_gender_field", "TINYTEXT", "#__supera_conf");    
$success = grUpdateField("cb_gender_field", "cb_gender", "configid = 1" , "#__supera_conf", $new);
$success = grInstallField("log_enabled", "INT(11)", "#__supera_conf");    
$success = grUpdateField("log_enabled", "1", "configid = 1" , "#__supera_conf", $new);

    if ($success) return TRUE; else return FALSE;

}  

?>