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
//SENC

class TableFaq extends JTable
{

	var $id = null;

	var $question = null;

	var $answer = null;

	var $fullanswer = null;

   	var $ordering = 0;

   	var $faq_cat_id = 0;

   	var $title = null;
	
	function TableFaq(& $db) {
		parent::__construct('#__fsf_faq_faq', 'id', $db);
	}

	function check()
	{
		// make published by default and get a new order no
		if (!$this->id)
		{
			$this->set('ordering', $this->getNextOrder());
			$this->set('published', 1);
		}
		
		if (!$this->question)
			return false;

		return true;
	}
}
//EENC
