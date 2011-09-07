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

jimport( 'joomla.application.component.model' );
require_once (JPATH_SITE.DS.'components'.DS.'com_fsf'.DS.'paginationex.php');

class FsfModelFaq extends JModel
{
	var $_total = null;

	var $_pagination = null;

	var $_curcatid = 0;

	var $_curcattitle = "";
	var $_curcatimage = "";
	var $_curcatdesc = "";

	var $_search = "";

	var $_catlist = "";
	
	var $_enable_pages = 0;



	function __construct()
	{
		parent::__construct();

		global $mainframe, $option;

		// Get pagination request variables
        $params =& $mainframe->getPageParameters('com_fsf');
        $this->_enable_pages = $params->get('enable_pages',1);
       
        	
		$limit = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', 10, 'int');
		if ($this->_enable_pages == 0)
			$limit = 999999;
		
		$limitstart = JRequest::getVar('limitstart', 0, '', 'int');

		// In case limit has been changed, adjust it
		$limitstart = ($limit != 0 ? (floor($limitstart / $limit) * $limit) : 0);

		$this->setState('limit', $limit);
		$this->setState('limitstart', $limitstart);

		$this->_curcatid = JRequest::getVar('catid', 0);
		$this->_search = JRequest::getVar('search', "");

		$this->_catlist = $this->_getCatList();

		if ($this->_search != "")
		{
			$this->_curcattitle = "Search Results";
			$this->_curcatid = -1;
			$this->_curcatimage = "/components/com_fsf/assets/search.png";
		} else if ($this->_curcatid == 0) {
			$this->_curcattitle = "All FAQs";
			$this->_curcatimage = "/components/com_fsf/assets/allfaqs.png";
		} else {
			foreach ($this->_catlist as $cat)
			{
				if ($cat['id'] == $this->_curcatid)
				{
					$this->_curcattitle = $cat['title'];
					$this->_curcatimage = $cat['image'];
					$this->_curcatdesc = $cat['description'];
				}
			}
		}
	}

 	function &_getCatList( )
    {
        $db =& JFactory::getDBO();
        $query = "SELECT * FROM #__fsf_faq_cat WHERE published = 1 ORDER BY ordering";

		$db->setQuery($query);
        $rows = $db->loadAssocList();
        return $rows;
    }
    
    function &getFaq()
    {
        $db =& JFactory::getDBO();
        $faqid = JRequest::getVar('faqid', 0, '', 'int');
        $query = "SELECT f.id, f.question, f.answer, f.fullanswer, f.published, f.ordering, c.title, f.faq_cat_id FROM #__fsf_faq_faq as f LEFT JOIN #__fsf_faq_cat as c ON f.faq_cat_id = c.id WHERE f.published = 1 AND f.id = " . $faqid;

        $db->setQuery($query);
        $rows = $db->loadAssoc();
        return $rows;        
    }

   	function _buildQuery()
	{
		$query = "SELECT * FROM #__fsf_faq_faq";
		if ($this->_search != "")
		{
			$words = explode(" ",$this->_search);
			
			$query .= " WHERE published = 1 AND (";
			
			foreach($words as $word)
			{
				$searches[] = "(question LIKE '%" . mysql_real_escape_string($word) . "%' OR answer LIKE '%" . mysql_real_escape_string($word) . "%')";
			}
			
			$query .= implode(" AND ",$searches);
			$query .= ")";
			
		} else if ($this->_curcatid > 0)
		{
			$query .= " WHERE published = 1 AND  faq_cat_id = '" . mysql_real_escape_string($this->_curcatid) . "'";
		} else {
			$query .= " WHERE published = 1 ";
		}

		$query .= " ORDER BY ordering";
		return $query;
	}

	function &getData()
	{
        // if data hasn't already been obtained, load it
        if (empty($this->_data)) {
            $query = $this->_buildQuery();
            if ($this->_enable_pages)
            {
				$this->_db->setQuery( $query, $this->getState('limitstart'), $this->getState('limit') );
			} else {
				$this->_db->setQuery( $query );
			}
			$this->_data = $this->_db->loadAssocList();
        }
        return $this->_data;
	}
	
	function &getAllData()
	{
    	$query = $this->_buildQuery();
		$this->_db->setQuery( $query );
		//echo $query."<br>";
		$blar = $this->_db->loadAssocList();
		//print_r($blar);
		return $blar;
	}

	function getTotal()
	{
        // Load the content if it doesn't already exist
        if (empty($this->_total)) {
            $query = $this->_buildQuery();
            $this->_total = $this->_getListCount($query);
        }
        return $this->_total;
	}

	function &getPagination()
	{
        // Load the content if it doesn't already exist
        if (empty($this->_pagination)) {
            jimport('joomla.html.pagination');
            $this->_pagination = new JPaginationEx($this->getTotal(), $this->getState('limitstart'), $this->getState('limit') );
        }
        return $this->_pagination;
	}
	
	function &getAllfaqs()
	{
		$query = "SELECT f.id, f.question, f.answer, f.fullanswer, c.title FROM #__fsf_faq_faq as f LEFT JOIN #__fsf_faq_cat as c ON f.faq_cat_id = c.id WHERE f.published = 1 ";
		$catid = JRequest::getVar('catid',0, '', 'int');
		if ($catid > 0)
			$query .= " AND f.faq_cat_id = $catid ";
		$query .= " ORDER BY c.ordering, f.ordering";	
        $db =& JFactory::getDBO();
        $db->setQuery($query);
        $rows = $db->loadAssocList();
        return $rows;        
	}

	function getSearch()
	{
		return $this->_search;
	}

	function getCurCatID()
	{
		return $this->_curcatid;
	}

	function getCurCatTitle()
	{
		return $this->_curcattitle;
	}

	function getCurCatImage()
	{
		return $this->_curcatimage;
	}

	function getCurCatDesc()
	{
		return $this->_curcatdesc;
	}

	function getCatList( )
	{
		return $this->_catlist;
	}

}
