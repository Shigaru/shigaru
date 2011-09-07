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

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.view' );

//SENC
class FsfsViewFaqs extends JView
{
 
    function display($tpl = null)
    {
        JToolBarHelper::title( JText::_( 'FAQ Manager' ), 'generic.png' );
        JToolBarHelper::deleteList();
        JToolBarHelper::editListX();
        JToolBarHelper::addNewX();

        $lists =  $this->get('Lists');
        $this->assignRef( 'data', $this->get('Data') );
        $this->assignRef( 'pagination', $this->get('Pagination'));

		$query = 'SELECT id, title FROM #__fsf_faq_cat ORDER BY ordering';

		$db	= & JFactory::getDBO();
		$categories[] = JHTML::_('select.option', '0', JText::_('Select Category'), 'id', 'title');
		$db->setQuery($query);
		$categories = array_merge($categories, $db->loadObjectList());

		$lists['cats'] = JHTML::_('select.genericlist',  $categories, 'faq_cat_id', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'id', 'title', $lists['faq_cat_id']);

		$categories = array();
		$categories[] = JHTML::_('select.option', '-1', JText::_('Is Published'), 'id', 'title');
		$categories[] = JHTML::_('select.option', '1', JText::_('Published'), 'id', 'title');
		$categories[] = JHTML::_('select.option', '0', JText::_('Unpublished'), 'id', 'title');
		$lists['published'] = JHTML::_('select.genericlist',  $categories, 'ispublished', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'id', 'title', $lists['ispublished']);


		$this->assignRef( 'lists', $lists );

        parent::display($tpl);
    }
}
//EENC
