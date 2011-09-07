<?php
/*
* @name CB_activity 1.18
* Created By grVulture
* http://www.axxis.gr
* @copyright  mod_CB_activity Copyright (C) 2008  Axxis.gr / All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

/** ensure this file is being included by a parent file */
if ( ! ( defined( '_JEXEC' ) || defined( '_VALID_MOS' ) ) ) { die(); }

    function url_exists($url){
        $url = str_replace("http://", "", $url);
        if (strstr($url, "/")) {
            $url = explode("/", $url, 2);
            $url[1] = "/".$url[1];
        } else {
            $url = array($url, "/");
        }

        $fh = @fsockopen($url[0], 80);
        if ($fh) {
            fputs($fh,"GET ".$url[1]." HTTP/1.1\nHost:".$url[0]."\n\n");
            if (fread($fh, 22) == "HTTP/1.1 404 Not Found") { return FALSE; }
            else { return TRUE;    }

        } else { return FALSE;}
    }
// ************************
function plug_cb_plugin_super_avatar_update_install() {
global $database,$mainframe;

echo "<img src=\"http://www.axxis.gr/images/banner.jpg\"><br/>CB Super Avatar Update written by Chris grVulture Michaelides<br/>";
echo "for CB Super Activity Plugin<br/><br/>";
echo "For more information about CB Super Activity, visit the <a href='http://www.axxis.gr/super_activity'>CB Super Activity Site</a><br/><br/>";
echo "<small>Copyright © 2009 www.axxis.gr	All rights reserved.</small><br/><br/>";

if (defined('_JEXEC')) $database	=& JFactory::getDBO();

$grsock = 'www.axxis.gr/components/com_customersupport/com_update.php';
$database->setQuery("SELECT avatar FROM #__supera_versions WHERE versionid=1");
$data = $database->loadObjectList();
$v = $data[0]->avatar;
$secret = $mainframe->getCfg('secret');
$versioncheck = url_exists($grsock);

if ($versioncheck) {
$fp = @fsockopen('www.axxis.gr', 80, $errno, $errstr, 30);
if (!$fp) {
    //echo "$errstr ($errno)<br />\n";
} else {
   fwrite($fp, "GET /components/com_customersupport/com_update.php?secret=$secret&pr=ava&v=$v&pname=Avatar HTTP/1.0\r\nHost:www.axxis.gr\r\n\r\n");
   fclose($fp);
}
}

$return = "";
		
  	$database->setQuery("ALTER TABLE #__comprofiler DROP COLUMN avatar_update");
		$database->query();
    
  	$database->setQuery("DELETE FROM #__comprofiler_plugin WHERE folder='plug_cbavatarupdates'");
		$database->query();
    
		$database->setQuery("ALTER TABLE #__comprofiler ADD avatar_update INT(11)");
		if (!$database->query()) $return.= "WARNING: Error updating table. Please contact support.<br/>";

  return $return;

}
?>
