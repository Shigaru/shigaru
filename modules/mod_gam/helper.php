<?php
/**
* @version		$Id: helper.php for Google Ad Manager module 2009-04-03 andreas berger $
* @package		Joomla 1.5, Google Ad Manager Module 1.1.0
* @copyright	Copyright (C) 2005 - 2009 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
// no direct access
defined('_JEXEC') or die('Restricted access');

class modGamHelper
{
	function getCode(&$params)
	{
		$code=array();
		if(trim( $params->get('pubid') )!=""&&trim( $params->get('slot') )!=""){$code["ident"]=array(trim( $params->get('pubid') ),trim( $params->get('slot') ));};
		
		$attrcount=0;
		if(trim( $params->get('Attr01a') )!=""&&trim( $params->get('Attr01b') )!=""){$attrcount++;$code["attr".$attrcount]=array(trim( $params->get('Attr01a') ),trim( $params->get('Attr01b') ));};
		if(trim( $params->get('Attr02a') )!=""&&trim( $params->get('Attr02b') )!=""){$attrcount++;$code["attr".$attrcount]=array(trim( $params->get('Attr02a') ),trim( $params->get('Attr02b') ));};
		if(trim( $params->get('Attr03a') )!=""&&trim( $params->get('Attr03b') )!=""){$attrcount++;$code["attr".$attrcount]=array(trim( $params->get('Attr03a') ),trim( $params->get('Attr03b') ));};
		if(trim( $params->get('Attr04a') )!=""&&trim( $params->get('Attr04b') )!=""){$attrcount++;$code["attr".$attrcount]=array(trim( $params->get('Attr04a') ),trim( $params->get('Attr04b') ));};
		if(trim( $params->get('Attr05a') )!=""&&trim( $params->get('Attr05b') )!=""){$attrcount++;$code["attr".$attrcount]=array(trim( $params->get('Attr05a') ),trim( $params->get('Attr05b') ));};
		
		$attrcount=0;
		if(trim( $params->get('PageAttr01a') )!=""&&trim( $params->get('PageAttr01b') )!=""){$attrcount++;$code["pageattr".$attrcount]=array(trim( $params->get('PageAttr01a') ),trim( $params->get('PageAttr01b') ));};
		if(trim( $params->get('PageAttr02a') )!=""&&trim( $params->get('PageAttr02b') )!=""){$attrcount++;$code["pageattr".$attrcount]=array(trim( $params->get('PageAttr02a') ),trim( $params->get('PageAttr02b') ));};
		if(trim( $params->get('PageAttr03a') )!=""&&trim( $params->get('PageAttr03b') )!=""){$attrcount++;$code["pageattr".$attrcount]=array(trim( $params->get('PageAttr03a') ),trim( $params->get('PageAttr03b') ));};
		if(trim( $params->get('PageAttr04a') )!=""&&trim( $params->get('PageAttr04b') )!=""){$attrcount++;$code["pageattr".$attrcount]=array(trim( $params->get('PageAttr04a') ),trim( $params->get('PageAttr04b') ));};
		if(trim( $params->get('PageAttr05a') )!=""&&trim( $params->get('PageAttr05b') )!=""){$attrcount++;$code["pageattr".$attrcount]=array(trim( $params->get('PageAttr05a') ),trim( $params->get('PageAttr05b') ));};
		
		$attrcount=0;
		if(trim( $params->get('SlotAttr01a') )!=""&&trim( $params->get('SlotAttr01b') )!=""){$attrcount++;$code["slotattr".$attrcount]=array(trim( $params->get('SlotAttr01a') ),trim( $params->get('SlotAttr01b') ));};
		if(trim( $params->get('SlotAttr02a') )!=""&&trim( $params->get('SlotAttr02b') )!=""){$attrcount++;$code["slotattr".$attrcount]=array(trim( $params->get('SlotAttr02a') ),trim( $params->get('SlotAttr02b') ));};
		if(trim( $params->get('SlotAttr03a') )!=""&&trim( $params->get('SlotAttr03b') )!=""){$attrcount++;$code["slotattr".$attrcount]=array(trim( $params->get('SlotAttr03a') ),trim( $params->get('SlotAttr03b') ));};
		if(trim( $params->get('SlotAttr04a') )!=""&&trim( $params->get('SlotAttr04b') )!=""){$attrcount++;$code["slotattr".$attrcount]=array(trim( $params->get('SlotAttr04a') ),trim( $params->get('SlotAttr04b') ));};
		if(trim( $params->get('SlotAttr05a') )!=""&&trim( $params->get('SlotAttr05b') )!=""){$attrcount++;$code["slotattr".$attrcount]=array(trim( $params->get('SlotAttr05a') ),trim( $params->get('SlotAttr05b') ));};
		
		return $code;
    }
}