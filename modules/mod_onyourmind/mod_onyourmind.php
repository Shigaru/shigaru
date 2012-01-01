<?php
/*
* @name mod_onyourmind
* Created By grVulture
* http://www.axxis.gr
* @copyright  mod_CB_activity Copyright (C) 2009  Axxis.gr / All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

// Direct Acess not allowed!
// no direct access
defined('_JEXEC') or die(dirname(__FILE__).DS.'Restricted access');
global $grsite, $height_thumbcb, $width_thumbcb;

$start_text = $params->get( 'start_text', "What's on your mind?");
$start_button = $params->get( 'start_button', "Share");

$link = "index.php?option=com_comprofiler";
$cb_itemid = mod_mindItemID($link,'','');
$grFactory = new JFactory();
$grUser = $grFactory->getUser(); 
$grguest = $grUser->guest;
if ($grguest) return;
$grRoute = new JRoute();
$myid = $grUser->id;
$grpath = dirname(__FILE__);
$grsite  = JURI::base();
$db = $grFactory->getDBO();

  echo '<link href="'.$grsite.'/modules/mod_onyourmind/css/default.css" rel="stylesheet" type="text/css" />';
  echo "<!-- What's on your mind? from http://www.axxis.gr -->";

echo "<input type=\"hidden\" id=\"dirname\" value=\"$grsite\">";

	$document = $grFactory->getDocument();
	$ajaxjs = JURI::root().'modules/mod_onyourmind/ajax.js';
	$document->addScript($ajaxjs);

//======================== CREATE TABLE ========================================
    $query = "CREATE TABLE IF NOT EXISTS #__onyourmind (
                    `id` int(3) NOT NULL auto_increment,
                    `userid` int(11) NOT NULL,
                    `date` datetime NOT NULL default '0000-00-00 00:00:00',
                    `mind` text,
                PRIMARY KEY  (`id`) )";
		$db->setQuery($query);
		if (!$db->query()) echo "Error creating supera_log. Please contact support.<br/>";
//==============================================================================
  $sql = "SELECT u.id, c.avatar FROM #__comprofiler c, #__users u WHERE c.user_id = u.id  AND u.id = $myid";
  $db->setQuery($sql);
  //print($db->getQuery());
  $data = $db->loadObjectList();
  
$img = $data[0]->avatar;
$avatar = mindAvatar($img);
$link_cb_mind = $grRoute->_("index.php?option=com_comprofiler&amp;task=userProfile&amp;user=$myid$cb_itemid");
?>
<div id="mind_div" class="mind_wrapper">
  <div class="mind_inner">
    <a href="<?=$link_cb_mind;?>"><?=$avatar;?></a>
    <input type="hidden" id="mind_id" value="<?=$myid;?>" />
    <input type="hidden" id="start_text" value="<?=$start_text;?>" />
    <input type="hidden" id="mind_self" value="<?=substr($grsite,0,-1).$_SERVER['REQUEST_URI']."#grtime=".time();?>" />
  </div>
  <div class="mind_text">
    <textarea id="mind_text" name="mind_text" onfocus="focus_blur()" onblur="focus_blur()" class="mind_text"><?php echo $start_text; ?></textarea><br />
  </div>
  <div class="mind_button"><input type="button" id="mind_button" value="<?=$start_button;?>" onclick="mind_share()" /></div>
</div>
<div id="mind_process" class="mind_gif">
<img src="<?=$grsite."modules/mod_onyourmind/9.gif";?>" />
</div>
<br style="clear:both;" />
<?php


// ************************
// FETCH ITEMID
// ************************
function mod_mindItemID($link, $id, $notlike) {
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
        include '.'.DS.'administrator'.DS.'components'.DS.'com_comprofiler'.DS.'ue_config.php';
        $templatedir = $ueConfig['templatedir'];
                $tn_photo="tnnophoto_n.png";
        $avatarimg = "<img $height_thumbcb $width_thumbcb src=\"$grsite/components/com_comprofiler/plugin/templates/$templatedir/images/avatar/$tn_photo\">";
      //} else {$avatarimg = "";}
  }
  return $avatarimg;
}
// ************************
?>
