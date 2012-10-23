<?php

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

require_once(dirname(__file__) . '/sphinxapi.php');
require_once(dirname(__file__) . '/sphinxSearchContacts.lib.php');
require_once(JPATH_SITE.DS.'components'.DS.'com_content'.DS.'helpers'.DS.'route.php');
require_once(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_search'.DS.'helpers'.DS.'search.php');

$mainframe->registerEvent( 'onSearch', 'plgSphinxSearchContacts' );
$mainframe->registerEvent( 'onSearchAreas', 'plgSphinxSearchContactsAreas' );

function plgSphinxSearchContactsAreas()
{
    static $areas = array(
        'contacts' => 'Contacts'
    );
    return $areas;
}

function plgSphinxSearchContacts( $text, $phrase='', $ordering='', $areas=null )
{
    $plugin		=& JPluginHelper::getPlugin('search', 'sphinxSearchContacts');
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
        if (!array_intersect( $areas, array_keys( plgSphinxSearchContactsAreas() ) )) {
            return array();
	}
    }

    // clean up our search text
    $text = trim( $text );


    $sphinxPlugin = new PlgSphinxSearchContacts($pServer, $pPort, $pIndex);
    $sphinxPlugin->setMatchMode($phrase);
    $sphinxPlugin->setOrder($ordering);
    $sphinxPlugin->setLimit(0, $limit);


    $sphinxPlugin->search($text);

    $results = $sphinxPlugin->getResults();

    // return results back to Joomla
    return $results;
}
