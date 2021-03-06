<?php 
/**
 * Joom!Fish - Multi Lingual extention and translation manager for Joomla!
 * Copyright (C) 2003 - 2012, Think Network GmbH, Munich
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
 * $Id: namesplusimages.php 1592 2012-01-20 12:51:08Z akede $
 * @package joomfish
 * @subpackage mod_jflanguageselection
 *
*/
// no direct access
defined('_JEXEC') or die('Restricted access');

//echo '<pre>';var_dump($langActive);echo '</pre>';
$outString ='';
$counter = 0;
$langlist = '';
foreach( $langActive as $language )
{
	
	$langActive = '';
	$langActiveIcon = '';
	
	$href = JFModuleHTML::_createHRef ($language, $params);
	$langImg = JFModuleHTML::getLanguageImageSource($language);
	if($counter == 0){
		$langlist .= '<ul class="jflanguageselection dropdown-menu">';
		}
	if( $language->code == $curLanguage->getTag() ) {
		$outString .= '<a href="'.$href.'" class="bradius5 tshadowwhite fontsig tdecnone">'.'<img src="' .JURI::base(true). $langImg. '" alt="' .$language->title_native. '" title="' .$language->title_native. '" border="0" class="mright6"/>'.strtoupper($language->shortcode).' <span class="icon-caret-down"></span> </a>';
		$langActive = ' ';
	}

	$langlist .= '<li' .$langActive. '> ';
	$langlist .= '<a href="' .$href. '" class="tdecnone">';
	$langlist .=' <img src="' .JURI::base(true). $langImg. '" alt="' .$language->title_native. '" title="' .$language->title_native. '" border="0" class="mright6"/>'.strtoupper($language->shortcode);
	$langlist .= '</a></li>';
	if(count($langActive) == $counter){
		$langlist .= '</ul>';
		$outString .= $langActiveIcon.$langlist;		
		}
	$counter++;
}
echo $outString;


