<?php
/**
* @Copyright Freestyle Joomla (C) 2010
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
*     
* This file is part of Freestyle Support Portal
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
* 
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
* 
* You should have received a copy of the GNU General Public License
* along with this program.  If not, see <http://www.gnu.org/licenses/>.
**/
?>
<?php

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Include the syndicate functions only once

$css = JRoute::_( "index.php?option=com_fst&view=css&layout=default" );
$document =& JFactory::getDocument();
$document->addStyleSheet($css); 

$listtype = $params->get('listtype');

$db =& JFactory::getDBO();

$query = "SELECT * FROM #__fsf_faq_cat WHERE published = 1 ORDER BY ordering";

$db->setQuery($query);
$rows = $db->loadAssocList();

$itemid = $params->get('pagefaq');
	
require( JModuleHelper::getLayoutPath( 'mod_fsf_cats', 'faqcat' ) );



?>
