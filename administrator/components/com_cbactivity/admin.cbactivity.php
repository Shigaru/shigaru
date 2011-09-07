<?php

defined('_JEXEC') or die();

JTable::addIncludePath(JPATH_COMPONENT.DS.'tables');
require_once(JPATH_COMPONENT.DS.'controller.php');
//require_once(JPATH_COMPONENT.DS.'tables/cbactivity.php');

global $config,$grFactory;
$config =& new JConfig;
$grFactory = new JFactory();
$controller = new cbactivityController();
$controller->registerDefaultTask('listMessages');
$task = JRequest::getCmd('task');
$act = JRequest::getCmd('act');
if ($act=="configure") $controller->execute($act);
else $controller->execute($task);
$controller->redirect();

// ************************
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

function admin_rotate($string) {
    $length = strlen($string);
    $result = '';
    for($i = 0; $i < $length; $i++) {
        $ascii = ord($string{$i});
        $rotated = $ascii;
        if ($ascii > 64 && $ascii < 91) {
            $rotated += -13;
            $rotated > 90 && $rotated += -90 + 64;
            $rotated < 65 && $rotated += -64 + 90;
        } elseif ($ascii > 96 && $ascii < 123) {
            $rotated += -13;
            $rotated > 122 && $rotated += -122 + 96;
            $rotated < 97 && $rotated += -96 + 122;
        }
        $result .= chr($rotated);
    }
    return $result;
}
?>