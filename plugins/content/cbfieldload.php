<?php

/* Community Builder field load plugin for Joomla 1.5 - Version 1.0
-------------------------------------------------------------------
Copyright (C) 2009 Joomduck. All rights reserved.
Website: www.joomduck.com
E-mail: support@joomduck.com
Developer: Den KD
Created: February 2009
Llicense: Commercial
This is copyrighted commercial software - you may NOT redistribute this file or any of its part! */


// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$mainframe->registerEvent( 'onPrepareContent', 'plgLoadCbField' );


// This plugin loads cb field in content

function plgLoadCbField( &$row, &$params, $page=0 )
{
	$db =& JFactory::getDBO();
	
	if ( JString::strpos( $row->text, 'fld' ) === false ) {
		return true;
	}
 	$regex = '/{fld\s*.*?}/i';
	preg_match_all( $regex, $row->text, $matches );
 	$count = count( $matches[0] );
 	if ( $count ) {
 		plgProcessCbField( $row, $matches, $count, $regex );
	}
}

function plgProcessCbField ( &$row, &$matches, $count, $regex )
{
 	for ( $i=0; $i < $count; $i++ )
	{
 		$load = str_replace( 'fld', '', $matches[0][$i] );
 		$load = str_replace( '{', '', $load );
 		$load = str_replace( '}', '', $load );
 		$load = trim( $load );

		$fields	= plgLoadField( $load );
		$row->text 	= preg_replace( '{'. $matches[0][$i] .'}', $fields, $row->text );
 	}
	$row->text = preg_replace( $regex, '', $row->text );
}


function plgLoadField( $fieldname )
{
 
  global $_CB_framework;        
$db = &JFactory::getDBO();
$db->setQuery("SELECT  u.*, c.* FROM #__users AS u JOIN #__comprofiler as c WHERE u.id=".$_CB_framework->displayedUser()." AND c.id=".$_CB_framework->displayedUser());
$rows = $db->loadObjectList();
$obrabotka	=	str_replace( "|*|", ", ", $rows[0]->$fieldname );
return $obrabotka;


}

//------


$mainframe->registerEvent( 'onPrepareContent', 'plgLoadImg' );

function plgLoadImg( &$row, &$params, $page=0 )
{
	$db =& JFactory::getDBO();
	
	if ( JString::strpos( $row->text, 'img' ) === false ) {
		return true;
	}
	 	$regex = "/{img\s*.*?}/i";

	preg_match_all( $regex, $row->text, $matches );
 	$count = count( $matches[0] );
 	if ( $count ) {
 		plgProcessImg( $row, $matches, $count, $regex );
	}
}

function plgProcessImg( &$row, &$matches, $count, $regex )
{
 	for ( $i=0; $i < $count; $i++ )
	{
 		$load = str_replace( 'img', '', $matches[0][$i] );
 		$load = str_replace( '{', '', $load );
 		$load = str_replace( '}', '', $load );
 		$load = trim( $load );

		$fields	= plgLoadImage( $load );
		$row->text 	= preg_replace( '{'. $matches[0][$i] .'}', $fields, $row->text );
 	}
	$row->text = preg_replace( $regex, '', $row->text );
}

function plgLoadImage( $userimg )
{
	  global $_CB_framework;    
	      
$live_site	= $_CB_framework->getCfg( 'live_site' );
$db = &JFactory::getDBO();
$db->setQuery("SELECT * FROM #__comprofiler WHERE id =" .$_CB_framework->displayedUser());
$rows = $db->loadObjectList();
$userimgapproved = $userimg."approved";
if ($rows[0]->$userimgapproved == 1) {
if ($rows[0]->$userimg != NULL) {
	return '<img src="'. $live_site .'/images/comprofiler/'.($rows[0]->$userimg).'" />';}
}
else {
return '';

}}

//------

$mainframe->registerEvent( 'onPrepareContent', 'plgLoadCheckbox' );

function plgLoadCheckbox( &$row, &$params, $page=0 )
{
	$db =& JFactory::getDBO();
	
	if ( JString::strpos( $row->text, 'cbx' ) === false ) {
		return true;
	}
	 	$regex = "/{cbx\s*.*?}/i";

	preg_match_all( $regex, $row->text, $matches );

 	$count = count( $matches[0] );
 	if ( $count ) {
 		plgProcessCheckbox( $row, $matches, $count, $regex );
	}
}

function plgProcessCheckbox ( &$row, &$matches, $count, $regex )
{
 	for ( $i=0; $i < $count; $i++ )
	{
 		$load = str_replace( 'cbx', '', $matches[0][$i] );
 		$load = str_replace( '{', '', $load );
 		$load = str_replace( '}', '', $load );
 		$load = trim( $load );

		$fields	= plgLoadCbx( $load );
		$row->text 	= preg_replace( '{'. $matches[0][$i] .'}', $fields, $row->text );
 	}

	$row->text = preg_replace( $regex, '', $row->text );
}

function plgLoadCbx( $checkbox )
{
	  global $_CB_framework;        
	
$db = &JFactory::getDBO();
$db->setQuery("SELECT * FROM #__comprofiler WHERE id =".$_CB_framework->displayedUser());
$rows = $db->loadObjectList();
if ($rows[0]->$checkbox == 1) {
	return JText::_( 'Yes' );
}
else {
return JText::_( 'No' );
}
}

//------


$mainframe->registerEvent( 'onPrepareContent', 'plgLoadFieldname' );

function plgLoadFieldname( &$row, &$params, $page=0 )
{
	$db =& JFactory::getDBO();
	if ( JString::strpos( $row->text, 'ftl' ) === false ) {
		return true;
	}
	 	$regex = "/{ftl\s*.*?}/i";
	preg_match_all( $regex, $row->text, $matches );
 	$count = count( $matches[0] );
 	if ( $count ) {
 		plgProcessFieldname( $row, $matches, $count, $regex );
	}
}

function plgProcessFieldname ( &$row, &$matches, $count, $regex )
{
 	for ( $i=0; $i < $count; $i++ )
	{
 		$load = str_replace( 'ftl', '', $matches[0][$i] );
 		$load = str_replace( '{', '', $load );
 		$load = str_replace( '}', '', $load );
 		$load = trim( $load );

		$fields	= plgLoadFn( $load );
		$row->text 	= preg_replace( '{'. $matches[0][$i] .'}', $fields, $row->text );
 	}

	$row->text = preg_replace( $regex, '', $row->text );
}

function plgLoadFn( $fieldname )
{
	  global $_CB_framework;
	
$db = &JFactory::getDBO();
$db->setQuery("SELECT * FROM #__comprofiler_fields WHERE name = '".$fieldname."'");
$rows = $db->loadObjectList();
	return JText::_( $rows[0]->title );
}
