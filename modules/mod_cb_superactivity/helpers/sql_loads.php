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

$count = intval( $params->get( 'count', 10) );
//echo "Number of entries given to the module parameters= ".$count."<br/>";
// *********************************************
// SQL LOAD's
// *********************************************
$auto_incr=0; //keep track of auto increment

// Most Popular Users
if ($modulename==5) {
  $sql = "SELECT u.id, u.username, u.name, c.avatar".$sql_gender.", count(*) as num FROM #__comprofiler_views v, #__comprofiler c, #__users u where v.profile_id = c.id and c.user_id = u.id  $imagenot $avatarplease and c.approved = 1 and c.confirmed = 1 and u.block = 0 and c.banned = 0 group by u.id order by num desc limit " . $count;
  $db->setQuery($sql);
  //print($db->getQuery());
  $data = $db->loadObjectList();
  include $grpath.'/helpers/sqlloop.php';
  return;
}

// Latest Login 3
if ($logins) {
        $sql = "select $friendsqlselect u.id, u.username, u.name, c.avatar".$sql_gender.", u.lastvisitDate AS actidate  FROM $friendsqlfrom #__users u,#__comprofiler c WHERE $specificid $myactivsql and c.approved = 1 and c.confirmed = 1 and c.banned = 0 $imagenot $avatarplease $friendsqlwhere and u.block = 0 GROUP BY u.id  ORDER BY u.lastvisitDate desc limit " . $count;
        $what = _ACT_WAS_HERE;
        $flag = 3;
  $db->setQuery($sql);
  //print($db->getQuery());
  $data = $db->loadObjectList();
  include $grpath.'/helpers/sqlloop.php';
}

// Last Updated Profile 4
if ($pupdates) {
        $sql = "select $friendsqlselect u.id, u.username, u.name, c.avatar_update, c.avatar".$sql_gender.", c.lastupdatedate AS actidate  FROM $friendsqlfrom #__users u, #__comprofiler c where $specificid $myactivsql and c.lastupdatedate > '0000-00-00 00:00:00' and c.approved = 1 $imagenot $avatarplease $friendsqlwhere and c.confirmed = 1 and c.banned = 0 and u.block = 0 order by c.lastupdatedate desc limit " . $count;
        $what = _ACT_UPDATED;
        $flag = 4;
  $db->setQuery($sql);
  //print($db->getQuery());
  $data = $db->loadObjectList();
  include $grpath.'/helpers/sqlloop.php';
}
  
// Latest Users 6
if ($lusers) {
        $sql = "SELECT $friendsqlselect u.id, u.username, u.name, c.avatar".$sql_gender.", u.registerDate AS actidate FROM $friendsqlfrom #__users u, #__comprofiler c  WHERE $specificid $myactivsql and c.approved = 1 and c.confirmed = 1 $imagenot  $avatarplease $friendsqlwhere and c.banned = 0 and u.block = 0 order by u.registerDate desc limit " . $count;
        $what = _ACT_JOINED;
        $flag = 6;
  $db->setQuery($sql);
  //print($db->getQuery());
  $data = $db->loadObjectList();
  include $grpath.'/helpers/sqlloop.php';
}
  
// Latest Friendships 7
if ($newships) {
        $sql = "select $friendsqlselect u.id, u.username, u.name, c.avatar".$sql_gender.", a.referenceid, a.membersince AS actidate FROM $friendsqlfrom #__users u, #__comprofiler c, #__comprofiler_members a WHERE $specificid $myactivsql $imagenot $avatarplease $friendsqlwhere $myfriends and  u.id = a.memberid and a.accepted=1 AND a.pending=0 order by a.membersince desc limit " . $count;
        $what = _ACT_IS_FRIENDS;
        $flag = 7;
  $db->setQuery($sql);
  //print($db->getQuery());
  $data = $db->loadObjectList();
  include $grpath.'/helpers/sqlloop.php';
}

?>
