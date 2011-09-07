<?php
/*
* @name mod_CB_activity 1.26
* Created By grVulture
* http://www.axxis.gr
* @copyright  mod_CB_activity Copyright (C) 2008  Axxis.gr / All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

// Direct Acess not allowed!
defined('_JEXEC') or die(dirname(__FILE__).DS.'Restricted access');

switch ($flag) {
  case 3:
//  echo "logins flag entered";
if (!$logins) {  $startshow=0;}//echo "logins not selected. exiting...";} else {echo "logins selected. displaying...";}
  break;
  case 4:
if (!$pupdates) {  $startshow=0;}
  break;
  case 6:
  //echo "lusers flag entered";
if (!$lusers) {  $startshow=0;}//echo "lusers not selected. exiting...";} else {echo "lusers selected. displaying...";}
  break;
  case 7:
if (!$newships) {  $startshow=0;}
// *********************************************  
// NOW WE HAVE TO MAKE SURE THAT NEW FRIENDSHIPS
// DON'T GET DISPLAYED TWICE
// *********************************************  
    if (strstr($friendfinished,"|".$userid."|")) {
      $startshow=0;
      $tempid=$userid;
      $tempdate=$actidate;
    }
  break;
}
?>