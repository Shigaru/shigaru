<?php
/**
 * @version		$Id: view.html.php 14401 2010-01-26 14:10:00Z louis $
 * @package		Joomla
 * @subpackage	Weblinks
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport( 'joomla.application.component.view');

/**
 * HTML View class for the WebLinks component
 *
 * @static
 * @package		Joomla
 * @subpackage	Weblinks
 * @since 1.0
 */
class SearchViewSearch extends JView
{
	function display($tpl = null)
	{
		global $mainframe;

		require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'helpers'.DS.'search.php' );
		require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'config.hwdvideoshare.php');
		require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_hwdvideoshare'.DS.'helpers'.DS.'initialise.php');
		hwdvsInitialise::language();
		// Initialize some variables
		$pathway  =& $mainframe->getPathway();
		$uri      =& JFactory::getURI();

		$error	= '';
		$rows	= null;
		$total	= 0;

		// Get some data from the model
		$areas      = &$this->get('areas');
		$state 		= &$this->get('state');
		$searchword = $state->get('keyword');

		$params = &$mainframe->getParams();

		$menus	= &JSite::getMenu();
		$menu	= $menus->getActive();

		// because the application sets a default page title, we need to get it
		// right from the menu item itself
		if (is_object( $menu )) {
			$menu_params = new JParameter( $menu->params );
			if (!$menu_params->get( 'page_title')) {
				$params->set('page_title',	JText::_( 'Search' ));
			}
		} else {
			$params->set('page_title',	JText::_( 'Search' ));
		}

		$document	= &JFactory::getDocument();
		$document->setTitle( $params->get( 'page_title' ) );

		// Get the parameters of the active menu item
		$params	= &$mainframe->getParams();

		// built select lists
		$orders = array();
		$orders[] = JHTML::_('select.option',  'newest', JText::_( 'Newest first' ) );
		$orders[] = JHTML::_('select.option',  'oldest', JText::_( 'Oldest first' ) );
		$orders[] = JHTML::_('select.option',  'popular', JText::_( 'Most popular' ) );
		$orders[] = JHTML::_('select.option',  'alpha', JText::_( 'Alphabetical' ) );
		$orders[] = JHTML::_('select.option',  'category', JText::_( 'Section/Category' ) );

		$lists = array();
		$lists['ordering'] = JHTML::_('select.genericlist',   $orders, 'ordering', 'class="inputbox"', 'value', 'text', $state->get('ordering') );

		$searchphrases 		= array();
		$searchphrases[] 	= JHTML::_('select.option',  'all', JText::_( 'All words' ) );
		$searchphrases[] 	= JHTML::_('select.option',  'any', JText::_( 'Any words' ) );
		$searchphrases[] 	= JHTML::_('select.option',  'exact', JText::_( 'Exact phrase' ) );
		$lists['searchphrase' ]= JHTML::_('select.radiolist',  $searchphrases, 'searchphrase', '', 'value', 'text', $state->get('match') );

		// log the search
		SearchHelper::logSearch( $searchword);

		//limit searchword

		if(SearchHelper::limitSearchWord($searchword)) {
			$error = JText::_( 'SEARCH_MESSAGE' );
		}

		//sanatise searchword
		if(SearchHelper::santiseSearchWord($searchword, $state->get('match'))) {
			$error = JText::_( 'IGNOREKEYWORD' );
		}

		if (!$searchword && count( JRequest::get('post') ) ) {
			$error = JText::_( 'Enter a search keyword' );
		}

		// put the filtered results back into the model
		// for next release, the checks should be done in the model perhaps...
		$state->set('keyword', $searchword);
		if(!$error || strlen($searchword)=== 0)
		{
			$results	= &$this->get('data' );
			$total		= &$this->get('total');
			$pagination	= &$this->get('pagination');

			require_once (JPATH_SITE.DS.'components'.DS.'com_content'.DS.'helpers'.DS.'route.php');

			for ($i=0; $i < count($results); $i++)
			{
				$row = &$results[$i]->text;

				if ($state->get('match') == 'exact')
				{
					$searchwords = array($searchword);
					$needle = $searchword;
				}
				else
				{
					$searchwords = preg_split("/\s+/u", $searchword);
					$needle = $searchwords[0];
				}

				$row = SearchHelper::prepareSearchContent( $row, 200, $needle );
				$searchwords = array_unique( $searchwords );
				$searchRegex = '#(';
				$x = 0;
				foreach ($searchwords as $k => $hlword)
				{
					$searchRegex .= ($x == 0 ? '' : '|');
					$searchRegex .= preg_quote($hlword, '#');
					$x++;
				}
				$searchRegex .= ')#iu';

				$row = preg_replace($searchRegex, '<span class="highlight">\0</span>', $row );

				$result =& $results[$i];
			    if ($result->created) {
				    $created = JHTML::Date ( $result->created );
			    }
			    else {
				    $created = '';
			    }

			    $result->created	= $created;
			    $result->count		= $i + 1;
			}
		}
		
		$instrumentsCombo = SearchViewSearch::generateVideoCombos('id as a, instrument as b','hwdvidsinstruments','id','intrument_id',true,true,true);		
		$levelsCombo = SearchViewSearch::generateVideoCombos('id as a, label as b','hwdvidslevels','id','level_id',true,false,true);		
		$languagesCombo = SearchViewSearch::generateVideoCombos('code as a, code as b','languages','id','language_id',true,false,true);	
		$genresCombo = SearchViewSearch::generateVideoCombos('id as a, genre as b','hwdvidsgenres','id','genre_id',true,true,true);		
		
		$this->result	= JText::sprintf( 'TOTALRESULTSFOUND', $total );
		
		$this->assignRef('pagination',  $pagination);
		$this->assignRef('results',		$results);
		$this->assignRef('lists',		$lists);
		$this->assignRef('params',		$params);

		$this->assign('ordering',		$state->get('ordering'));
		$this->assign('searchword',		$searchword);
		$this->assign('searchphrase',	$state->get('match'));
		$this->assign('searchareas',	$areas);
		$this->assign('instrumentsCombo',	$instrumentsCombo);
		$this->assign('levelsCombo',	$levelsCombo);
		$this->assign('languagesCombo',	$languagesCombo);
		$this->assign('genresCombo',	$genresCombo);

		$this->assign('total',			$total);
		$this->assign('error',			$error);
		$this->assign('action', 	    $uri->toString());
			
		parent::display($tpl);
	}
	
	function getLatestSearchs() {
		$db = & JFactory::getDBO();
		$query = 'SELECT search_term FROM #__core_log_searches'; 
		$query .= ' WHERE 1  ORDER BY hits  DESC';
		$query .= ' LIMIT 0,6';
		$db->setQuery($query);
		$db->loadObjectList();
		
		$wordList = $db->loadResultArray();
		$wordListFormat = '';
		$counter = 0;
		foreach ($wordList as &$value) {
		 if($value!='' && $value!=' '){	
			if($counter === 0)
				$wordListFormat .= SearchViewSearch::getAnchor($value);
				else
					$wordListFormat .= ', '.SearchViewSearch::getAnchor($value);
			$counter++;		
			}		
			
			
		}
		return $wordListFormat;
		}
		

		
	function getAnchor($word) {
		$searchLink = '<a href="'.JURI::base().'index.php?option=com_search&searchphrase=all&ordering=newest&limit=10&searchword='.$word.'&r='.rand().'" title="'.JText::_('View results for ').$word.'">'.$word.'</a>';
			return $searchLink ;
		}
		
	function getGruopAndBandNames() {
		$db = & JFactory::getDBO(); 
		$query = 'SELECT label as song FROM #__hwdvidssongs'; 
		$query .= ' WHERE 1 ORDER BY label';
		$db->setQuery($query);
		$db->loadObjectList();
		$arrSongs = $db->loadResultArray();
		$query = 'SELECT label as band FROM #__hwdvidsbands'; 
		$query .= ' WHERE 1 ORDER BY label';
		$db->setQuery($query);
		$db->loadObjectList();
		$arrBands = $db->loadResultArray();
		$wordList = array_merge($arrSongs, $arrBands);
		$i 	= 0;
		$autocomplete='[';
		foreach($wordList as $item => $string){
			if($i === 0)
				$autocomplete .= "'".$string."'";
				else
					$autocomplete .= ",'".$string."'";
			$i++;
		}
		$autocomplete.=']';
		return $autocomplete;
		}	
		
		/**
     * Generates an HTML select simple for an object list
     * @param string $fields fields to be selected (fields a and b mandatory)
     * @param string $tablename table to query
     * @param string $orderby order column
     * @return       $code 
     */
    function generateVideoCombos($fields,$tablename,$orderby,$elementid, $selectquestion=true,$others=false,$required=true){
		$db =& JFactory::getDBO();
		$db->setQuery("SELECT DISTINCT ".$fields." from #__".$tablename." ORDER BY ".$orderby.";"
		                );
		if($selectquestion)                
			$options[] = JHTML::_('select.option', '', constant('_HWDVIDS_SHIGARU_SHIGAR_COMBO_SELECT'));                
		$mitems = $db->loadObjectList();
		  foreach($mitems as $mitem) :
			$options[] = JHTML::_('select.option', $mitem->a, constant($mitem->b));
		  endforeach;
		if($others)
			$options[] = JHTML::_('select.option', 'OTHER', constant('_HWDVIDS_SHIGARU_SHIGAR_COMBO_OTHER'));      
		$classCombo;
		if($required)
			$classCombo = 'class="inputbox required"';
			else
				$classCombo='class="inputbox"';
			
		  ## Create <select name="month" class="inputbox"></select> ##
		  $code = JHTML::_('select.genericlist', $options, $elementid, $classCombo, 'value', 'text', $default);
		
		return $code;
		}
}
