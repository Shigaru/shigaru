<?php
/**
 * @version		$Id: controller.php 14401 2010-01-26 14:10:00Z louis $
 * @package		Joomla
 * @subpackage	Content
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant to the
 * GNU General Public License, and as distributed it includes or is derivative
 * of works licensed under the GNU General Public License or other free or open
 * source software licenses. See COPYRIGHT.php for copyright notices and
 * details.
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport('joomla.application.component.controller');

/**
 * Search Component Controller
 *
 * @package		Joomla
 * @subpackage	Search
 * @since 1.5
 */
class SearchController extends JController
{
	/**
	 * Method to show the search view
	 *
	 * @access	public
	 * @since	1.5
	 */
	function display()
	{
		JRequest::setVar('view','search'); // force it to be the polls view
		parent::display();
	}

	function search()
	{
		// slashes cause errors, <> get stripped anyway later on. # causes problems.
		$badchars = array('#','>','<','\\'); 
		$searchword = trim(str_replace($badchars, '', JRequest::getString('searchword', null, 'post')));
		// if searchword enclosed in double quotes, strip quotes and do exact match
		if (substr($searchword,0,1) == '"' && substr($searchword, -1) == '"') { 
			$post['searchword'] = substr($searchword,1,-1);
			JRequest::setVar('searchphrase', 'exact');
		}
		else {
			$post['searchword'] = $searchword;
		}
		$post['ordering']	= JRequest::getWord('ordering', null, 'post');
		$post['searchphrase']	= JRequest::getWord('searchphrase', 'all', 'post');
		$post['limit']  = JRequest::getInt('limit', null, 'post');
		if($post['limit'] === null) unset($post['limit']);

		$areas = JRequest::getVar('areas', null, 'post', 'array');
		if ($areas) {
			foreach($areas as $area)
			{
				$post['areas'][] = JFilterInput::clean($area, 'cmd');
			}
		}
		
		// set Itemid id for links from menu
		$menu = &JSite::getMenu();
		$items	= $menu->getItems('link', 'index.php?option=com_search&view=search');

		if(isset($items[0])) {
			$post['Itemid'] = $items[0]->id;
		} else if (JRequest::getInt('Itemid') > 0) { //use Itemid from requesting page only if there is no existing menu
			$post['Itemid'] = JRequest::getInt('Itemid');
		} 
		
		unset($post['task']);
		unset($post['submit']);

		$uri = JURI::getInstance();
		$uri->setQuery($post);
		$uri->setVar('option', 'com_search');

		
		$this->setRedirect(JRoute::_('index.php'.$uri->toString(array('query', 'fragment')), false));
	}
	
	function getLatestSearchs() {
		$db = & JFactory::getDBO();
		$query = 'SELECT search_term FROM #__core_log_searches'; 
		$query .= ' WHERE 1  ORDER BY hits  DESC';
		$query .= ' LIMIT 0,4';
		$db->setQuery($query);
		$db->loadObjectList();
		
		$wordList = $db->loadResultArray();
		$wordListFormat = '';
		$counter = 0;
		foreach ($wordList as &$value) {
			if($counter === 0)
				$wordListFormat .= SearchController::getAnchor($value);
				else
					$wordListFormat .= ', '.SearchController::getAnchor($value);
			$counter++;
		}
		return $wordListFormat;
		}
		

		
	function getAnchor($word) {
			$searchLink = '<a href="'.JURI::base().'index.php?option=com_search&view=search&searchphrase=any&ordering=category&limit=10&searchword='.$word.'&tmpl=component&r='.rand().'" title="'.JText::_('View results for ').$word.'">'.$word.'</a>';
			return $searchLink ;
		}
}
