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
switch ($flag) {
    case 3 :
$icon = "Symbol_Up.png";
  $function= _ACT_LOGIN_ACTIV;
    break;

    case 4 :
$icon = "Refresh.png";
  $function= _ACT_UPDATE_ACTIV;
  if ($name==_ACT_YOU && $showyou) { $what.=_ACT_YOUR; } else {
    switch ($gender) {
      case "male" :
      $what.=_ACT_HIS;
      break;
      case "female" :
      $what.=_ACT_HER;
      break;
      default:
      $what.=_ACT_HIS_OTH;
    } 
  }
  if ($avatar_update) {
    $what.="<a class=\"activity_links\" href='$link_cb'>"._ACT_PROFILEPHOTO."</a>.";  
  } else {
    $what.="<a class=\"activity_links\" href='$link_cb'>"._ACT_PROFILE."</a>.";
  }
    break;

    case 6 :
$icon = "User.png";
  $function= _ACT_NEW_REG;
    break;

    case 7 :
$icon = "Users_Chat.png";
  $function= _ACT_FRIEND_ACTIV;
  if ($name==_ACT_YOU && $showyou) $what=_ACT_YOU_ARE_FRIEND;
    break;

}  
?>
