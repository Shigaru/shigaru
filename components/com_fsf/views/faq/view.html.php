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

jimport( 'joomla.application.component.view');

class FsfViewFaq extends JView
{
    function display($tpl = null)
    {
        global $mainframe;
        
        $faqid = JRequest::getVar('faqid', 0, '', 'int'); 
        
        $params =& $mainframe->getPageParameters('com_fsf');
        
		JHTML::_('behavior.tooltip');
        JHTML::_('behavior.modal', 'a.modal');

        if ($faqid > 0)
        {
            $tmpl = JRequest::getVar('tmpl'); 
            $this->assignRef( 'tmpl', $tmpl );
            $this->setLayout("faq");
            $faq =& $this->get("Faq");
            $this->assignRef( 'faq', $faq );
            
            $pathway =& $mainframe->getPathway();
            $pathway->addItem($faq['title'], JRoute::_( '&limitstart=&faqid=&catid=' . $faq['faq_cat_id'] ) );
            $pathway->addItem($faq['question']);
            
		    $document =& JFactory::getDocument();
		    $document->setTitle(JText::_('FAQs - ' . $faq['title']));
            
            parent::display();    
            return;
        }  
 
        $always_show_cats = $params->get('always_show_cats',0);
        $always_show_faqs = $params->get('always_show_faqs',0);
        $hide_allfaqs = $params->get('hide_allfaqs',0);
        $hide_search = $params->get('hide_search',0);
        $view_mode = $params->get('view_mode','questionwithpopup');
        $view_mode_cat = $params->get('view_mode_cat','list');
        $view_mode_incat = $params->get('view_mode_incat','list');
        $enable_pages = $params->get('enable_pages',1);
        
        $num_cat_colums = $params->get('num_cat_colums',1);
        if ($num_cat_colums < 1 && !$num_cat_colums) $num_cat_colums = 1;
        if ($view_mode_cat != "list") $num_cat_colums = 1;
    
    	$catlist =& $this->get("CatList");
        $this->assignRef( 'catlist', $catlist );

        $search =& $this->get("Search");
        $this->assignRef( 'search', $search );
        
        $curcattitle =& $this->get("CurCatTitle");
        $this->assignRef( 'curcattitle', $curcattitle );

        $curcatimage =& $this->get("CurCatImage");
        $this->assignRef( 'curcatimage', $curcatimage );

        $curcatdesc =& $this->get("CurCatDesc");
        $this->assignRef( 'curcatdesc', $curcatdesc );

        $curcatid = $this->get("CurCatID");

        // Get data from the model
        $items =& $this->get('Data');
        $pagination =& $this->get('Pagination');
        
        if ($view_mode_cat == "inline" || $view_mode_cat == "accordian")
        {
        	$alldata =& $this->get("AllData");
        	foreach ($catlist as &$cat)
        	{
        		$catid = $cat['id'];
        		foreach ($alldata as &$faq)
        		{
        			if ($faq['faq_cat_id'] == $catid)
        			{
        				$cat['faqs'][] = &$faq;
					}	
				}
			}  	
		}

        // push data into the template
        $this->assignRef('items', $items);
        $this->assignRef('pagination', $pagination);

        $showfaqs = true;
        $showcats = true;
        
        // do we have a category specified???
        if (JRequest::getVar('catid', -2) == -2 && JRequest::getVar('search', '') == '')
        {
            // no cat specified
            if (!$always_show_faqs)
            {
                $showfaqs = false;
                $curcatid = -2;
            } else {
                $pathway =& $mainframe->getPathway();
                $pathway->addItem($curcattitle);
           }
        } else {
            // got a cat specced
            $pathway =& $mainframe->getPathway();
            $pathway->addItem($curcattitle);

            if (!$always_show_cats)
            {
                $showcats = false;   
            }
        }

		$pagetitle = "FAQS";
		if ($curcattitle)
			$pagetitle .= " - " . $curcattitle;           
	    $document =& JFactory::getDocument();
	    $document->setTitle(JText::_($pagetitle));

        $this->assign( 'curcatid', $curcatid );
        
        $this->assign('showcats', $showcats);
        $this->assign('showfaqs', $showfaqs);
        $this->assign('hide_allfaqs', $hide_allfaqs);
        $this->assign('hide_search', $hide_search);
        $this->assign('view_mode', $view_mode);
        $this->assign('num_cat_colums', $num_cat_colums);
		$this->assign('view_mode_cat', $view_mode_cat);
		$this->assign('view_mode_incat', $view_mode_incat);
		$this->assign('enable_pages', $enable_pages);
		
        parent::display($tpl);
    }
}
