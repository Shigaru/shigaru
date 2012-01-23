<?php


/**
* @package		Profile Completeness
* @copyright Copyright (C) 2009 -2010 Techjoomla, Tekdi Web Solutions . All rights reserved.
* @license GNU GPLv2 <http://www.gnu.org/licenses/old-licenses/gpl-2.0.html>
* @link     http://www.techjoomla.com
**/


global $Itemid;

$database = &JFactory::getDBO();
$my = &JFactory::getUser();

include(JPATH_SITE . '/administrator/components/com_comprofiler/ue_config.php');
include(JPATH_SITE . '/modules/mod_procomplete/english.php');

$document	=& JFactory::getDocument();
$css		= JURI::base().'modules/mod_procomplete/assets/mod_procomplete.css';
$document->addStyleSheet($css);

//Get Params 
$param_fields = $params->get('fields');
$count_field = count($param_fields);

$usersname = intval( $params->get( 'name', 1 ) );
$bar = intval( $params->get( 'bars', 2 ) );

$image = intval( $params->get( 'image', 1 ) );
$img_path = JURI::base() . "/images/comprofiler";

// Login if registered user
	
if(!$my->id) {
	echo JText::_( 'TWS_PLZ_LOGIN' );
	return;
}

if (is_array($param_fields))
{
$param_fields = implode(',', $param_fields);
}

$sql1 = "SELECT ".$param_fields." FROM #__comprofiler,#__users WHERE user_id = $my->id";
$database->setQuery($sql1);
$user_field = $database->loadRow();

if( !$user_field ) return true;

$flag=0;
foreach($user_field as $uf ){
	if($uf != " " && $uf != NULL){
		$flag = $flag + 1;
	}	
}
$perc = round(($flag/$count_field)* 100);
	
//Get Item id
$database->setQuery("SELECT id FROM #__menu WHERE link LIKE '%com_comprofiler%'");
$itemid = $database->loadResult();
$_Itemid = $itemid ? $itemid : $Itemid;

//Get login user information	
	
$query1 = "SELECT * FROM #__comprofiler WHERE user_id = $my->id AND approved =1 ";	
$database->setQuery( $query1 );
$users = $database->loadObjectList();

echo '<div><div style="width:98%">';
foreach($users as $user) {
	echo "<div style=\" margin: 0px; padding:0px; text-align:center\">";
	echo '<div style="margin:2px; padding:2px; border:1px solid #CCC;overflow:hidden;">';
	$link = JRoute::_('index.php?option=com_comprofiler&task=viewprofile&user=' . $user->user_id . '&Itemid=' . $_Itemid);		
	$link1 = JRoute::_('index.php?option=com_comprofiler&task=userDetails&Itemid=' . $_Itemid);		

	if( $user->avatar && $user->avatarapproved )	{
		if (substr_count($user->avatar, "/") == 0)	{
			$uimage = $img_path . '/tn' . $user->avatar;
		} else {
			$uimage = $img_path . '/' . $user->avatar;
		}
	} elseif ( $user->avatar ) {
	$uimage = JURI::base()."/components/com_comprofiler/plugin/language/default_language/images/tnpendphoto.jpg";
	} else {
	$uimage = JURI::base()."/components/com_comprofiler/plugin/language/default_language/images/tnnophoto.jpg";
	}

	if( $image == 1 ) {
	echo "<div style=\"width: {$ueConfig['thumbWidth']}px; height: {$ueConfig['thumbHeight']}px; margin:0px; padding:0px; float:left\">";
	echo "<a href=\"{$link}\"><img src=\"{$uimage}\" border=\"0\" /></a></div>";
	}
	
	if( $usersname == 1 ) {
	?>
	<div class=pro-uname>
		<a href="<?php echo $link; ?>"><?php echo $my->username; 
	echo '<br />';	
	echo $user->lastname;
	echo '</a><br /></div>';
	}
	echo '</div></div>';
}
echo '</div></div>';	
	
if( $bar == 2 || $bar == 0 ) {
	?>
	<div id="pro-comp-container">
		<div id="box">
			<div id="bar" style="width:<?php echo $perc.'%'; ?>;" ><?php echo $perc.'%'; ?></div>
		</div>
<?php
}
if( $bar == 2 || $bar == 1 ) {
	echo '<div class=pro-comp-ness>';
	echo JText::_( 'TWS_PROFILE' );
	echo $perc . "%";
	echo '<br />';
	echo JText::_( 'TWS_PROFILES' );
	 ?>
	<a href="<?php echo $link1; ?>">[Edit]</a></div></div>
<?php }
