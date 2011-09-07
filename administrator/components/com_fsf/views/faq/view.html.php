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

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view' );

//SENC

class FsfsViewFaq extends JView
{

	function display($tpl = null)
	{
		global $mainframe;
		$faq		=& $this->get('Data');
		$isNew		= ($faq->id < 1);

		$text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'FAQ' ).': <small><small>[ ' . $text.' ]</small></small>' );
		JToolBarHelper::save();
		if ($isNew)  {
			JToolBarHelper::cancel();
		} else {
			// for existing items the button is renamed `close`
			JToolBarHelper::cancel( 'cancel', 'Close' );
		}

		$this->assignRef('faq',		$faq);

		$query = 'SELECT id, title' .
				' FROM #__fsf_faq_cat' .
				' ORDER BY ordering';
		$db	= & JFactory::getDBO();
		$db->setQuery($query);

		$sections = $db->loadObjectList();

		if (count($sections) < 1)
		{
			$link = JRoute::_('index.php?option=com_fsf&view=faqs',false);
			$mainframe->redirect($link,"You must create a FAQ category first");
			return;
					
		}
		
		$lists['catid'] = JHTML::_('select.genericlist',  $sections, 'faq_cat_id', 'class="inputbox" size="1" ', 'id', 'title', intval($faq->faq_cat_id));

		$this->assignRef('lists', $lists);

		parent::display($tpl);
	}
}
//EENC
