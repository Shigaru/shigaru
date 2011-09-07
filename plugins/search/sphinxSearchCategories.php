<?php

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

require_once(dirname(__file__) . '/sphinxapi.php');
require_once(dirname(__file__) . '/sphinxSearchCategories.lib.php');
require_once(JPATH_SITE.DS.'components'.DS.'com_content'.DS.'helpers'.DS.'route.php');
require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_search'.DS.'helpers'.DS.'search.php');

$mainframe->registerEvent( 'onSearch', 'plgSphinxSearchCategories' );
$mainframe->registerEvent( 'onSearchAreas', 'plgSphinxSearchCategoriesAreas' );

function plgSphinxSearchCategoriesAreas()
{
    static $areas = array(
        'categories' => 'Categories'
    );
    return $areas;
}

function plgSphinxSearchCategories( $text, $phrase='', $ordering='', $areas=null )
{
    $plugin		=& JPluginHelper::getPlugin('search', 'sphinxSearchCategories');
    $pluginParams	= new JParameter( $plugin->params );

    $pServer		= $pluginParams->get( 'server', 'localhost' );
    $pPort	 	= (int) $pluginParams->get( 'port', 3312 );
    $pIndex 		= $pluginParams->get( 'index' );
    $limit              = isset($_REQUEST['limit']) ? (int) $_REQUEST['limit'] : 50 ;
    if(0 === $limit) {
    	$limit = 1000;
    }

    $searchText = $text;
    if (is_array( $areas )) {
        if (!array_intersect( $areas, array_keys( plgSphinxSearchCategoriesAreas() ) )) {
            return array();
	}
    }

    // clean up our search text
    $text = trim( $text );
    if ($text == '') {
        return array();
    }

    $sphinxPlugin = new PlgSphinxSearchCategories($pServer, $pPort, $pIndex);
    $sphinxPlugin->setMatchMode($phrase);
    $sphinxPlugin->setOrder($ordering);
    $sphinxPlugin->setLimit(0, $limit);


    $sphinxPlugin->search($text);

    $results = $sphinxPlugin->getResults();

    // return results back to Joomla
    return $results;
}