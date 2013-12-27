<?php
/*
* @name CB custom user menu
* Created By grVulture
* http://www.axxis.gr
* @copyright Copyright (C) 2011  Axxis.gr / All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

// Direct Acess not allowed!
// no direct access
defined('_JEXEC') or die(dirname(__FILE__).DS.'Restricted access');

$grcss = //mycss
$document = JFactory::getDocument();
//$document->addStyleSheet( $grcss, 'text/css' );

class cbcustommenuTab extends cbTabHandler {
function cbcustommenuTab() {
	$this->cbTabHandler();
}

function getDisplayTab($tab,$user,$ui) {
global $_CB_framework, $_CB_database, $ueConfig, $mainframe;
$pathtouser = dirname(__FILE__);
$language = $this->loadlanguage($pathtouser);
//==============================================================================
// get parameters
$params = $this->params;
$messenger = $params->get( 'messenger', 'index.php?option=com_supermessenger');
$messenger.= $this->newItemID($messenger,'','');
$s = $params->get( 'usernames', 'u.name');
$shownames = $params->get( 'shownames', 1);
$online = $params->get( 'showonline', 1);
$icons = $params->get( 'showicons', 1);
$text = $params->get( 'showtext', 1);
// set parameters
$grsite  = JURI::base();
$grRoute = new JRoute();
$grUser = JFactory::getUser(); 
$myid = $grUser->id;
$cb_itemid = '&Itemid='.JRequest::getVar('Itemid');

$linkmyphoto = $grRoute->_("index.php?option=com_comprofiler&task=userAvatar".$cb_itemid);
$linkeditprofile = $grRoute->_("index.php?option=com_comprofiler&task=userProfile&task=userDetails".$cb_itemid);
$linkremphoto = $grRoute->_("index.php?option=com_comprofiler&amp;task=manageConnections".$cb_itemid);
$link_cb = $grRoute->_("$link&amp;task=userProfile&amp;user=".$user->id.$cb_itemid);

  $database = JFactory::getDBO();
    $sql = "select u.id, u.username, u.name from #__users u, #__comprofiler c where u.id = ".$user->id." AND u.id = c.user_id";
    $database->setQuery($sql);
    $data = $database->loadObjectList();
    $dat = $data[0];
    $userid = $dat->id;
    
    if ($s == "u.name") {$usernames = $dat->name;}
    else {$usernames = $dat->username;}
    $echo = "<div id='custommenu'>";
    //if ($user->id == $myid OR $user->id == 0) {
	 $echo.= '	<div class="usermessages" style="display:none; cursor: default"> 
	<div id="flagquestionwrap">         
		<div><a id="no" class="close"></a></div>
		<h1>'._UE_AREYOUSUREREMOVEIMAGE.'?</h1> 
        <input type="button" class="reddbuttonsubmit" id="yes" value="Go" /> 
	</div>         
</div>';
      $echo.= '<a id="aaboutme" href="#" class="current">'._UE_ABOUTME.'</a>&nbsp;|&nbsp;';
      $echo.= '<a id="avideossubmi" href="#">'._UE_VIDEOSUBMITED.'</a>&nbsp;|&nbsp;';
      $echo.= '<a id="afavour" href="#">'._UE_FAVOURITES.'</a>&nbsp;|&nbsp;';
      $echo.= '<a id="acomments" href="#">'._UE_COMMENTS.'</a>';
    //} 
    
    /*else {
      if ($online) $echo.= $this->newOnline($user->id).'&nbsp;&nbsp;';
      if ($shownames) $echo.= '<BIG><b>'.$usernames.'</b></BIG>&nbsp;|&nbsp;';
      $sql = "select a.* FROM #__comprofiler_members a  WHERE a.referenceid=".$myid." and a.memberid=".$user->id;
      $database->setQuery($sql);
      $rows = $database->loadObjectList();

        $linkreportuser = $grRoute->_("index.php?option=com_comprofiler&task=reportUser&uid=".$user->id.$cb_itemid);
        $linkaddfriend = $grRoute->_("index.php?option=com_comprofiler&amp;task=addConnection&amp;act=connection&amp;connectionid=".$user->id.$cb_itemid);
        $linkremovefriend = $grRoute->_("index.php?option=com_comprofiler&amp;task=removeConnection&amp;act=connection&amp;connectionid=".$user->id.$cb_itemid);

      if (count($rows) > 0) {
        $row = $rows[0];
        if (($row->accepted == 1) && ($row->pending == 0)) {
          $echo.= "<a href=\"$linkremovefriend\" title=\""._custommenu_REMOVE_FRIEND."\">";
          if ($icons) $echo.= "<img src=\"".JURI::base()."components/com_comprofiler/plugin/user/plug_cbusermenu/delete.png\" alt=\""._custommenu_REMOVE_FRIEND."\"/>";
          if ($text) $echo.= "&nbsp;"._custommenu_REMOVE_FRIEND;
          $echo.= "</a>";
          $echo.= "&nbsp;&nbsp;<a href=\"$linkreportuser\" title=\""._custommenu_REPORT_USER."\">";
          if ($icons) $echo.= "<img src=\"".JURI::base()."components/com_comprofiler/plugin/user/plug_cbusermenu/stop.jpg\" alt=\""._custommenu_REPORT_USER."\"/>";
          if ($text) $echo.= "&nbsp;"._custommenu_REPORT_USER;
          $echo.= "</a>";
        } else if (($row->accepted == 1) && ($row->pending == 1)) {
          $echo.= "<a href=\"$linkremovefriend\" title\""._custommenu_REVOKE_FRIEND."\">";
          if ($icons) $echo.= "<img src=\"".JURI::base()."components/com_comprofiler/plugin/user/plug_cbusermenu/delete.png\" alt=\""._custommenu_REVOKE_FRIEND."\"/>";
          if ($text) $echo.= "&nbsp;"._custommenu_REVOKE_FRIEND;
          $echo.= "</a>";
          $echo.= "&nbsp;&nbsp;<a href=\"$linkreportuser\" title=\""._custommenu_REPORT_USER."\">";
          if ($icons) $echo.= "<img src=\"".JURI::base()."components/com_comprofiler/plugin/user/plug_cbusermenu/stop.jpg\" alt=\""._custommenu_REPORT_USER."\"/>";
          if ($text) $echo.= "&nbsp;"._custommenu_REPORT_USER;
          $echo.= "</a>";
        }

      } else {
          $echo.= "<a href=\"$linkaddfriend\" title=\""._custommenu_ADD_FRIEND."\">";
          if ($icons) $echo.= "<img src=\"".JURI::base()."components/com_comprofiler/plugin/user/plug_cbusermenu/add.png\" alt=\""._custommenu_ADD_FRIEND."\"/>";
          if ($text) $echo.= "&nbsp;"._custommenu_ADD_FRIEND;
          $echo.= "</a>";
          $echo.= "&nbsp;&nbsp;<a href=\"$linkreportuser\" title=\""._custommenu_REPORT_USER."\">";
          if ($icons) $echo.= "<img src=\"".JURI::base()."components/com_comprofiler/plugin/user/plug_cbusermenu/stop.jpg\" alt=\""._custommenu_REPORT_USER."\"/>";
          if ($text) $echo.= "&nbsp;"._custommenu_REPORT_USER;
          $echo.= "</a>";
      }
    } */   
    $echo.= "</div>";
  return $echo;
}
//	
//==============================================================================
//    FUNCTIONS
//==============================================================================
// ************************
// FETCH ITEMID
// ************************
function newItemID($link, $id, $notlike) {
  $database = JFactory::getDBO();
//  if ($id) $id = "&id=".$id; SET BY THE CALL
  $sql = "SELECT id FROM #__menu WHERE link = '$link$id' AND published=1";
//  if ($link=="index.php?option=com_content&view=article") $sql = "SELECT id FROM #__menu WHERE link = '$link$id'";
  $database->setQuery($sql);
  //print($db->getQuery());
  $data = $database->loadObjectList();
  if (count($data)==0) {
    if ($notlike) $notlike = "AND link NOT LIKE '$notlike'";
    $sql = "SELECT id FROM #__menu WHERE link LIKE '$link%' AND published=1 $notlike";
    $database->setQuery($sql);
    //print($db->getQuery());
    $data = $database->loadObjectList();
  }
//  echo count($data);
  $itemid = $data[0]->id;
  if ($itemid) {
    $itemid="&amp;Itemid=".$itemid;
  }
  return $itemid;
}
// ************************

function loadLanguage($pathtouser) {
	$usedlanguage="";
  $templang = JFactory::getLanguage();
  if (!defined('_custommenu_ADD_FRIEND')) {
  	if (file_exists($pathtouser.DS.'language'.DS.$templang->get('backwardlang').'.php')) {
  		include_once($pathtouser.DS.'language'.DS.$templang->get('backwardlang').'.php');
  		$usedlanguage=DS.'language'.DS.$templang->get('backwardlang').'.php';
  	} else {
      $newlang = strtolower($templang->get('name'));
      if (strstr($newlang,'(')) {
        $newlang = explode('(',$newlang);
        $newlang = trim($newlang[0]);
      }
      if (file_exists($pathtouser.DS.'language'.DS.$newlang.'.php')) {
    		include_once($pathtouser.DS.'language'.DS.$newlang.'.php');
  	   	$usedlanguage=DS.'language'.DS.$newlang.'.php';
  	  } else {
    		  include_once($pathtouser.DS.'language'.DS.'english.php');
  	   	  $usedlanguage=DS.'language'.DS.'english.php';
  	  }
  	}
  }
	// register vars from language file
	return $usedlanguage;
}

  // ************************
  // SHOW ONLINE INFO IMAGE
  // ************************
  function newOnline($userid) {
  	$db = JFactory::getDBO();
    $sql = "SELECT s.userid FROM #__session s WHERE s.userid = ". $userid;
    $db->setQuery($sql);
    $session = $db->loadObjectList();
    if (count($session) > 0) {
      $ongif = "<img width=5 height=5 src='".JURI::base()."components/com_comprofiler/plugin/user/plug_cbusermenu/online.gif' alt='online' border='0'/>";
    } else {
      $ongif = "<img width=5 height=5 src='".JURI::base()."components/com_comprofiler/plugin/user/plug_cbusermenu/offline.gif' alt='offline' border='0'/>";
    }
    return $ongif;
  }
  // ************************

} // end CLASS
?>
