<?php

/* Community Builder Profile Pro plugin for Community Builder
----------------------------------------------------------------------------
Copyright (C) 2009 Joomduck. All rights reserved.
Website: www.joomduck.com
E-mail: support@joomduck.com
Developer: Den KD
Created: February 2009
License: Commercial
This is copyrighted commercial software - you may NOT redistribute this file or any of its part! */

if ( ! ( defined( '_VALID_CB' ) || defined( '_JEXEC' ) || defined( '_VALID_MOS' ) ) ) { die( 'Direct Access to this location is not allowed.' ); }

require_once (JPATH_SITE . '/components/com_content/helpers/route.php');
$lg = &JFactory::getLanguage();
$language = $lg->get('backwardlang');
if(file_exists(JPATH_SITE . '/components/com_comprofiler/plugin/user/plug_cbprofilepro/lang/'.$language.'.php')){
require_once(JPATH_SITE . '/components/com_comprofiler/plugin/user/plug_cbprofilepro/lang/'.$language.'.php'); }

class getpro extends cbTabHandler {
		function getList($items)
		{
			global $mainframe, $_CB_database;
			$contentprofile = $this->params;
			$db 	=& JFactory::getDBO();
			$user 	=& JFactory::getUser();
			$aid	= $user->get('aid', 0);
			$contentConfig	= &JComponentHelper::getParams( 'com_content' );
			$noauth			= !$contentConfig->get('shownoauth');
			jimport('joomla.utilities.date');
			$date = new JDate();
			$now = $date->toMySQL();
			$nullDate = $db->getNullDate();
			$contentprofile = $this->params;
			$userchoose = $contentprofile->get('userchoose');
			$artid = $contentprofile->get('profilearticleid');
			$arttitle = $contentprofile->get('profilearticletitle');

if ($userchoose == 'no') {
$userchosen = '';
if ( $artid == null ) {
$putid = '';
}else{
$putid = 'AND a.id = '.$artid.'';	}
if ( $arttitle == null )
{  
$puttitle = '';
}else{	
$puttitle = 'AND a.title = "'.$arttitle.'"';	
}} else {
global $_CB_framework;        
$db = &JFactory::getDBO();
$db->setQuery("SELECT * FROM #__comprofiler WHERE id=".$_CB_framework->displayedUser());
$rows = $db->loadObjectList();
$articlechosentitle = $rows[0]->cb_profilechoose;
if($articlechosentitle == null) {
$userchosen = '';
if ( $artid == null ) {
$putid = '';
}else{
$putid = 'AND a.id = '.$artid.'';
}			
if ( $arttitle == null ) {  
$puttitle = '';
}else{	
$puttitle = 'AND a.title = "'.$arttitle.'"';	
}} else {
$userchosen = 'AND a.title = "'.$articlechosentitle.'"';
$putid = '';
$puttitle = '';
}}
		$query = 'SELECT a.* FROM #__content AS a';
		$query .=	' WHERE a.state = 1 '.$putid.''.$puttitle.''.$userchosen.'';
		$db->setQuery($query, 0, $items);
		$rows = $db->loadObjectList();
  		global $mainframe;
  		JPluginHelper::importPlugin('content');
  		$dispatcher	   =& JDispatcher::getInstance();
  		$params 	   =& $mainframe->getParams('com_content');
  		$limitstart	= JRequest::getVar('limitstart', 0, '', 'int');
  
  		for($i=0;$i<count($rows);$i++) {
  		  $rows[$i]->text = $rows[$i]->introtext;
  		  $results = $dispatcher->trigger('onPrepareContent', array (& $rows[$i], & $params, $limitstart));
   		  $rows[$i]->introtext = $rows[$i]->text;
      	}
			return $rows;
		}

		function getpro() {
		$this->cbTabHandler();
		}
	
		function getDisplayTab($tab,$user,$ui) {
		$catids = preg_split('/[\n,]|<br \/>/', 1);
	
$contents = $themes = array();
for ($i = 0; $i < count($catids); $i ++) {
$temp = split(':',$catids[$i]);
	if(isset($temp[0])) $catid = $temp[0];
	if($catid) {
  	$rows = getpro::getList(1);
  	if(count($rows)) {
    $contents[] = $rows;
    $themes[] = isset($temp[1])? $temp[1]:'';
    } }$row = $rows[$i];
	}
	
	$contentprofile = $this->params;
	$artid = $contentprofile->get('profilearticleid');
	$arttitle = $contentprofile->get('profilearticletitle');
	$userchoose = $contentprofile->get('userchoose');
			
		$return		=	'';
		if ($userchoose == 'no') {		
		if( $artid == null && $arttitle == null ) {
		$return .= JText::_( 'No profile page specified' );		
} else {
//	$return		.=	($row->title);
$return		.=	($row->introtext); }} else {

	global $_CB_framework;  
	$db = &JFactory::getDBO();
	$db->setQuery("SELECT * FROM #__comprofiler WHERE id=".$_CB_framework->displayedUser());
	$crows = $db->loadObjectList();
	$articlechosentitle = $crows[0]->cb_profilechoose;
	
	if ($articlechosentitle == null) {
	if( $artid == null && $arttitle == null ) {		
	$return .= JText::_( 'No profile page specified' );
} else {
//	$return		.=	($row->title);
$return		.=	($row->introtext);
}} else {
//	$return		.=	($row->title);
$return		.=	($row->introtext);
}} return  $return;
	}}
 ?>
