<?php 
/**
 * Joom!Fish - Multi Lingual extention and translation manager for Joomla!
 * Copyright (C) 2003-2009 Think Network GmbH, Munich
 *
 * All rights reserved.  The Joom!Fish project is a set of extentions for
 * the content management system Joomla!. It enables Joomla!
 * to manage multi lingual sites especially in all dynamic information
 * which are stored in the database.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307,USA.
 *
 * The "GNU General Public License" (GPL) is available at
 * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * -----------------------------------------------------------------------------
 * $Id: namesplusimages.php 1344 2009-06-18 11:50:09Z akede $
 * @package joomfish
 * @subpackage mod_jflanguageselection
 *
*/
// no direct access
defined('_JEXEC') or die('Restricted access');
$titleString= constant('Click on this linkf to display the language options');
$outString = '<div class="topbuttons" id="lang"><a href="#" class="dropper" title="'.$titleString.'"><span>'.$curLanguage->getName().'</span><span class="arrow"></span></a>';
$curLangImg = '/images/' .$curLanguage->get( 'image' );						
//<img src="' .JURI::base(true). $curLangImg. '" alt="' .$curLanguage->getName(). '" title="' .$curLanguage->getName(). '" border="0" class="langImg"/>
$outString .= '<div id="langDropMenu" class="floatingBox">
						  <ul class="jflanguageselection">';
$countryCount =0;					  
foreach( $langActive as $language )
{
	//$outString .= '<li' .$langActive. '>';
	$langActive = '';
	if( $language->code == $curLanguage->getTag() ) {
		if( !$show_active ) {
			continue;		// Not showing the active language
		} else {
			$langActive = ' id="active_language"';
		}
	}

	$href = JFModuleHTML::_createHRef ($language, $params);
	$langlIneClass = '';
	if($countryCount & 1){
		$langlIneClass='gray';
		}else{
			$langlIneClass='white';
			}
	
	if (isset($language->disabled) && $language->disabled){
		$outString .= '<li' .$langActive. ' style="opacity:0.5" class="opaque '.$langlIneClass.'">';
	}
	else {
		$outString .= '<li' .$langActive. ' class="'.$langlIneClass.'" onmouseover="hoverFuncAdd(this)" onmouseout="hoverFuncRemove(this)">';
	}
	if($type == 'namesplusimages') {
		if( isset($language->image) && $language->image!="" ) {
			$langImg = '/images/' .$language->image;
		} else {
			$langImg = '/components/com_joomfish/images/flags/' .$language->getLanguageCode() .".gif";
		}
		$outString .='<img src="' .JURI::base(true). $langImg. '" alt="' .$language->name. '" title="' .$language->name. '" border="0" class="langImg"/>';
	}

	if (isset($language->disabled) && $language->disabled){
			$outString .= '<span lang="' .$language->getLanguageCode(). '" xml:lang="' .$language->getLanguageCode(). '" >' .$language->name. '</span>';
		}
		else {
			$outString .= '<a href="' .$href. '" ><span lang="' .$language->getLanguageCode(). '" xml:lang="' .$language->getLanguageCode(). '">' .$language->name. '</span></a>';
	}

	$outString .= '</li>';
	$countryCount++;
}
$outString .= '</ul></div></div>';

echo $outString;
