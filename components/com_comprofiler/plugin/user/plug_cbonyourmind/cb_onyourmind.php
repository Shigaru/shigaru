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
global $grsite, $height_thumbcb, $width_thumbcb;

$grsite  = JURI::base();

$_PLUGINS->registerFunction( 'onUserProfileDisplay', 'mindItemID','cbonyourmindTab' );
$_PLUGINS->registerFunction( 'onUserProfileDisplay', 'mindAvatar','cbonyourmindTab' );
$_PLUGINS->registerFunction( 'onUserProfileDisplay', 'mindurl_exists','cbonyourmindTab' );
$_PLUGINS->registerFunction( 'onUserProfileDisplay', 'mindcheck_links','cbonyourmindTab' );
$_PLUGINS->registerFunction( 'onUserProfileDisplay', 'mindcheck_helper','cbonyourmindTab' );

class cbonyourmindTab extends cbTabHandler {
function cbonyourmindTab() {
	$this->cbTabHandler();
}

// ************************
// FIND URL (FOR GROUPIMAGES)
// ************************
function mindurl_exists($url) {
    $hdrs = @get_headers($url);
    return is_array($hdrs) ? preg_match('/^HTTP\\/\\d+\\.\\d+\\s+2\\d\\d\\s+.*$/',$hdrs[0]) : false;
} 
// ************************
// ************************
// CHECK STRING FOR LINKS
// ************************
function mindcheck_links($string) {
  if (strstr($string,"http://") || strstr($string,"www.")) {
    $urls = explode(" ",$string);
    if (count($urls)) {
      $string_returned = "";
      foreach ($urls as $url) {
        if (strstr($url,"http://") || strstr($url,"www.")) {
          $string_returned .= $this->mindcheck_helper($url)."&nbsp;";
        } else {
          $string_returned .= "<span class=\"activity_status\" >".stripslashes($url)."</span>&nbsp;";
        }
      }
      return $string_returned;
    } else {
      return $this->mindcheck_helper($string); 
    }
  } else {
    return "<span class=\"activity_status\" >".stripslashes($string)."</span>";
  }
}
function mindcheck_helper($string) {
  $check = @$this->mindurl_exists($string);
  if ($check) return "<a class=\"activity_status\" href='$string' target='_blank'>".stripslashes($string)."</a>";
  else {
    if (!strstr($string,"http://")) {
      $string2 = "http://".$string;
      $check = @$this->mindurl_exists($string2);
      if ($check) return "<a class=\"activity_status\" href='$string2' target='_blank'>".stripslashes($string)."</a>";
      else return "<span class=\"activity_status\" >".stripslashes($string)."</span>";
    } else return "<span class=\"activity_status\" >".stripslashes($string)."</span>";
  }
}
// ************************
// ************************
// FETCH ITEMID
// ************************
function mindItemID($link, $id, $notlike) {
  $db = JFactory::getDBO();
  
//  if ($id) $id = "&id=".$id; SET BY THE CALL
  $sql = "SELECT id FROM #__menu WHERE link = '$link$id' AND published=1";
//  if ($link=="index.php?option=com_content&view=article") $sql = "SELECT id FROM #__menu WHERE link = '$link$id'";
  $db->setQuery($sql);
  //print($db->getQuery());
  $data = $db->loadObjectList();
  if (count($data)==0) {
    if ($notlike) $notlike = "AND link NOT LIKE '$notlike'";
    $sql = "SELECT id FROM #__menu WHERE link LIKE '$link%' AND published=1 $notlike";
    $db->setQuery($sql);
    //print($db->getQuery());
    $data = $db->loadObjectList();
  }
//  echo count($data);
  $itemid = $data[0]->id;
  if ($itemid) {
    $itemid="&amp;Itemid=".$itemid;
  }
  return $itemid;
}
// ************************
// ************************
// Resize Avatar
// ************************
function mindAvatar($img) {
global $grsite, $height_thumbcb, $width_thumbcb;

  if ($img != NULL) {
    if (ereg("^gallery", $img) == false) {
      $img = "tn" . $img;
    }
    $avatarimg = "<img $height_thumbcb $width_thumbcb src=\"$grsite/images/comprofiler/$img\">";
  } else {
        include './administrator/components/com_comprofiler/ue_config.php';
        $templatedir = $ueConfig['templatedir'];
                $tn_photo="tnnophoto_n.png";
        $avatarimg = "<img $height_thumbcb $width_thumbcb src=\"$grsite/components/com_comprofiler/plugin/templates/$templatedir/images/avatar/$tn_photo\">";
      //} else {$avatarimg = "";}
  }
  return $avatarimg;
}
// ************************

function getDisplayTab($tab,$user,$ui) {
global $grsite, $height_thumbcb, $width_thumbcb;

$params = $this->params;
$start_text = $params->get( 'start_text', "What's on your mind?");
$start_button = $params->get( 'start_button', "Share");
$showname = intval($params->get( 'showname', 1));
$names = intval($params->get( 'names', 1));
$includeavatar = intval($params->get( 'includeavatar', 1));

$link = "index.php?option=com_comprofiler";
$cb_itemid = $this->mindItemID($link,'','');
$grFactory = new JFactory();
$grUser = $grFactory->getUser(); 
$grguest = $grUser->guest;
$grRoute = new JRoute();
$myid = $grUser->id;
$grpath = dirname(__FILE__);
$grsite  = JURI::base();
$db = $grFactory->getDBO();
$id = $user->id;
if (!$grguest) $grusertype = $grUser->usertype;

  $return = '<link href="'.$grsite.'/components/com_comprofiler/plugin/user/plug_cbonyourmind/css/default.css" rel="stylesheet" type="text/css" />';
  $return.= "<!-- What's on your mind? from http://www.axxis.gr -->";

$return .= "<input type=\"hidden\" id=\"dirname\" value=\"$grsite\">";

	$document = $grFactory->getDocument();
	$ajaxjs = $grsite.'/components/com_comprofiler/plugin/user/plug_cbonyourmind/ajax.js';
	$document->addScript($ajaxjs);

  $sql = "SELECT u.id, u.username, u.name, c.avatar FROM #__comprofiler c, #__users u WHERE c.user_id = u.id  AND u.id = $id";
  $db->setQuery($sql);
  //print($db->getQuery());
  $data = $db->loadObjectList();
  if ($names) {
    $name = $data[0]->username;
  } else {
    $name = $db->getEscaped($data[0]->name);
  }
  
  $sql = "SELECT id,mind FROM #__onyourmind WHERE userid = $id ORDER BY date DESC";
  $db->setQuery($sql);
  //print($db->getQuery());
  $datm = $db->loadObjectList();
  isset($datm[0]) ? $mind = $datm[0]->mind : $mind = '';
  if ($mind=='_gr_cleared_') $mind='';
  
$img = $data[0]->avatar;
$avatar = $this->mindAvatar($img);
$link_cb_mind = $grRoute->_("index.php?option=com_comprofiler&amp;task=userProfile&amp;user=$myid$cb_itemid");
$return .= "<div>";
if ($showname) $return .= "<h1 style='display:inline;'>$name</h1>";
if ($mind) {
  $return .= " <span id='mind_header'>".$this->mindcheck_links($mind);
  if ($id==$myid || strstr($grusertype,"Administrator"))
    $return .= " <a href='javascript:deletemind(".$datm[0]->id.")'><img src='$grsite/components/com_comprofiler/plugin/user/plug_cbonyourmind/cancel.png' height='10' /></a>";
} else $return .= " <span id='mind_header'>";
  $return .= "</span>";
$return .= "</div>";
if ($id==$myid) {
  $return .= '<div id="mind_div" class="mind_wrapper">';
    $return .= '<div class="mind_inner">';
      if ($includeavatar) $return .= "<a href=\"$link_cb_mind\">$avatar</a>";
      $return .= '<input type="hidden" id="mind_id" value="'.$myid.'" />';
      $return .= '<input type="hidden" id="start_text" value="'.$start_text.'" />';
      $return .= '<input type="hidden" id="mind_self" value="'.substr($grsite,0,-1).$_SERVER['REQUEST_URI']."#grtime=".time().'" />';
    $return .= "</div>";
    $return .= '<div class="mind_text">';
      $return .= '<textarea id="mind_text" name="mind_text" onfocus="focus_blur()" onblur="focus_blur()" class="mind_text">'.$start_text.'</textarea><br />';
    $return .= "</div>";
    $return .= '<div class="mind_button"><input type="button" id="mind_button" value="'.$start_button.'" onclick="mind_share()" /></div>';
  $return .= "</div>";
  $return .= '<div id="mind_process" class="mind_gif">';
  $return .= '<img src="'.$grsite.'/components/com_comprofiler/plugin/user/plug_cbonyourmind/9.gif" />';
  $return .= "</div>";
}
return $return;
}
}
?>
