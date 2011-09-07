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
$output .= "<table class=\"activity_table\"><tr>";
  $receiver = "";
  $tempid = $userid;
// *********************************************  
// Latest Friendships
// *********************************************  
if ($flag==7) {
    $posterid = $newfriend;
    $postersql = "select u.name, u.username, c.avatar FROM #__users u, #__comprofiler c WHERE u.id=c.user_id AND user_id = ".$posterid;
    $db->setQuery($postersql);
    $datposter = $db->loadObject();
    $posterimg = $datposter->avatar;
    if ($viewname == 0) {
      $postername = $datposter->username;
    } else {
      $postername = stripslashes($datposter->name);
    }
  if ($showgender) {
    $db->setQuery("SELECT $cb_gender_field AS cb_gender FROM #__comprofiler WHERE user_id=$posterid");
    $receiver_data = $db->loadObjectlist();
    $receiver_gender = $receiver_data[0]->cb_gender;
    switch ($receiver_gender) {
      case $male :
        $receiver_gender="male";
        break;
      case $female :
        $receiver_gender="female";
        break;
      default:
        $receiver_gender="other";
      }
  } else $receiver_gender = "other";
  $friendfinished.='|'.$posterid.'|';
  $receiver = newfetchuser($postername,$posterimg,$posterid,$cb_itemid,$receiver_gender);
  //--------------------
//  $name = $postername;
//  $userid = $posterid;
//  $img = $posterimg;
}
// *********************************************  
$echo = newfetchuser($name,$img,$userid,$cb_itemid,$gender);

if ($ecreate!=2) { // FOR EVENT FEED...
  $output .= $echo;
} else {
  if ($flag!=8) $output .= $echo;
} 

if ($activity) {

$output .= "<span class=\"activity_text\">";
// *********************************************
// DISPLAY WHAT THE USER DID ($what)
// *********************************************
if ($ecreate!=2) { // FOR EVENT FEED...
  $output .= $what;
} else {
  if ($flag!=8) $output .= $what;
}
$output .= "</span>";

  $output .= $receiver; // for profilebook entries
}
$output .= "</td></tr></table>";
?>
