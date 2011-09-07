<?php
/**
* @version		$Id: default.php for Google Ad Manager module 2009-04-03 andreas berger $
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
defined('_JEXEC') or die('Restricted access'); ?>

{begam}
<?php 
$gamcode=$code["ident"][0]."/".$code["ident"][1];

if(array_key_exists ("attr1",$code)!=FALSE){
	$gamcode.="/";
	$gamcode.=$code["attr1"][0].",".$code["attr1"][1];
	if(array_key_exists ("attr2",$code)!=FALSE){$gamcode.=";".$code["attr2"][0].",".$code["attr2"][1];};
	if(array_key_exists ("attr3",$code)!=FALSE){$gamcode.=";".$code["attr3"][0].",".$code["attr3"][1];};
	if(array_key_exists ("attr4",$code)!=FALSE){$gamcode.=";".$code["attr4"][0].",".$code["attr4"][1];};
	if(array_key_exists ("attr5",$code)!=FALSE){$gamcode.=";".$code["attr5"][0].",".$code["attr5"][1];};
}
if(array_key_exists ("pageattr1",$code)!=FALSE||array_key_exists ("slotattr1",$code)!=FALSE){
	if(array_key_exists ("attr1",$code)!=FALSE){$gamcode.="/";}else{$gamcode.="//";};

	if(array_key_exists ("pageattr1",$code)!=FALSE){$gamcode.=$code["pageattr1"][0].",".$code["pageattr1"][1];};
	if(array_key_exists ("pageattr2",$code)!=FALSE){$gamcode.=";".$code["pageattr2"][0].",".$code["pageattr2"][1];};
	if(array_key_exists ("pageattr3",$code)!=FALSE){$gamcode.=";".$code["pageattr3"][0].",".$code["pageattr3"][1];};
	if(array_key_exists ("pageattr4",$code)!=FALSE){$gamcode.=";".$code["pageattr4"][0].",".$code["pageattr4"][1];};
	if(array_key_exists ("pageattr5",$code)!=FALSE){$gamcode.=";".$code["pageattr5"][0].",".$code["pageattr5"][1];};

	if(array_key_exists ("pageattr1",$code)!=FALSE&&array_key_exists ("slotattr1",$code)!=FALSE){
		if(array_key_exists ("slotattr1",$code)!=FALSE){$gamcode.=$code["ident"][1].",".$code["slotattr1"][0].",".$code["slotattr1"][1];};
		if(array_key_exists ("slotattr2",$code)!=FALSE){$gamcode.=";".$code["ident"][1].",".$code["slotattr2"][0].",".$code["slotattr2"][1];};
		if(array_key_exists ("slotattr3",$code)!=FALSE){$gamcode.=";".$code["ident"][1].",".$code["slotattr3"][0].",".$code["slotattr3"][1];};
		if(array_key_exists ("slotattr4",$code)!=FALSE){$gamcode.=";".$code["ident"][1].",".$code["slotattr4"][0].",".$code["slotattr4"][1];};
		if(array_key_exists ("slotattr5",$code)!=FALSE){$gamcode.=";".$code["ident"][1].",".$code["slotattr5"][0].",".$code["slotattr5"][1];};
	}
}

echo $gamcode;
?> 
{/begam}