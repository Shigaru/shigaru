<?php

if (!(defined('_JEXEC') || defined('_VALID_MOS'))) { die( 'Direct Access to this location is not allowed.' ); }

$uddeim_isadmin = 0;
if ( defined( 'JPATH_ADMINISTRATOR' ) ) {
	$ver = new JVersion();
	if (!strncasecmp($ver->RELEASE, "1.6", 3)) {
		require_once(JPATH_SITE.'/components/com_uddeim/uddeimlib16.php');
	} else {
		require_once(JPATH_SITE.'/components/com_uddeim/uddeimlib15.php');
	}
} else {
	global $mainframe;
	require_once($mainframe->getCfg('absolute_path').'/components/com_uddeim/uddeimlib10.php');
}

if ( defined( 'JPATH_ADMINISTRATOR' ) ) {
	$mainframe->registerEvent( 'onSearch', 'plgSearchUddeIM' );
	$mainframe->registerEvent( 'onSearchAreas', 'plgSearchUddeIMAreas' );
} else {
	global $mainframe;
	$_MAMBOTS->registerFunction( 'onSearch', 'botSearchUddeIM' );
}
	
$uddpathtoadmin = uddeIMgetPath('admin');
$uddmosConfig_lang = uddeIMgetLang();

require_once($uddpathtoadmin.'/config.class.php');
$uddconfig = new uddeimconfigclass();

if(!defined('_UDDEIM_INBOX')) {
	$uddpostfix = "";
	if ($uddconfig->languagecharset)
		$uddpostfix = ".utf8";
	if (file_exists($uddpathtoadmin.'/language'.$uddpostfix.'/'.$uddmosConfig_lang.'.php')) {
		include_once($uddpathtoadmin.'/language'.$uddpostfix.'/'.$uddmosConfig_lang.'.php');
	} elseif (file_exists($uddpathtoadmin.'/language'.$uddpostfix.'/english.php')) {
		include_once($uddpathtoadmin.'/language'.$uddpostfix.'/english.php');
	} elseif (file_exists($uddpathtoadmin.'/language/english.php')) {
		include_once($uddpathtoadmin.'/language/english.php');
	}
}

function &plgSearchUddeIMAreas() {
	static $areas = array(
		'messages' => _UDDEPLUGIN_MESSAGES
	);
	return $areas;
}

function plgSearchUddeIM( $text, $phrase='', $ordering='', $areas=null ) {
	if (is_array( $areas )) {
		if (!array_intersect( $areas, array_keys( plgSearchUddeIMAreas() ) )) {
			return array();
		}
	}
	return botSearchUddeIM( $text, $phrase, $ordering );
}

function botSearchUddeIM( $text, $phrase='', $ordering='' ) {
	
	if ( defined( 'JPATH_ADMINISTRATOR' ) ) {
		$database =& JFactory::getDBO();
		$user	=& JFactory::getUser();
		$userid	= $user->id;

		$plugin =& JPluginHelper::getPlugin('search', 'uddeim');
		$pluginParams = new JParameter( $plugin->params );
		$limit = $pluginParams->def( 'search_limit', 50 );
	} else {
		global $mainframe, $database, $my, $_MAMBOTS;
		$userid = $my->id;

		if ( !isset($_MAMBOTS->_search_mambot_params['uddeim']) ) {
			$query = "SELECT params FROM #__mambots WHERE element = 'uddeim.searchbot' AND folder = 'search'";
			$database->setQuery( $query );
			$database->loadObject($mambot);		
			$_MAMBOTS->_search_mambot_params['uddeim'] = $mambot;
		}
		$mambot = $_MAMBOTS->_search_mambot_params['uddeim'];	
		$botParams = new mosParameters( $mambot->params );
		$limit = $botParams->def( 'search_limit', 50 );
	}

	$text = trim( $text );
	if ($text == '') {
		return array();
	}

	$section = _UDDEPLUGIN_SEARCHSECTION;

	switch ( $ordering ) {
		case 'alpha':	$order = 'b.name ASC';
						break;
		case 'newest':	$order = 'a.datum DESC';
						break;
		case 'oldest':	$order = 'a.datum ASC';
						break;
		case 'category':
		case 'popular':
		default:		$order = 'a.datum ASC';
						break;
	}

	// ItemID missing
	$ttext = $database->Quote( '%'.$database->getEscaped( $text, true ).'%' );
	$tsection = $database->Quote( $database->getEscaped( $section, true ) );

	$query = "SELECT b.name AS title,"
	. "\n a.message AS text,"
	. "\n FROM_UNIXTIME(a.datum) AS created,"
	. "\n ".$tsection." AS section,"
	. "\n '2' AS browsernav,"
	. "\n CONCAT( 'index.php?option=com_uddeim&task=show&messageid=', a.id ) AS href"
	. "\n FROM #__uddeim AS a"
	. "\n INNER JOIN #__users AS b ON a.fromid = b.id"
	. "\n WHERE ( a.message LIKE ".$ttext
	. "\n OR b.name LIKE ".$ttext
	. "\n OR b.username LIKE ".$ttext
	. "\n )"
	. "\n AND a.toid = ".(int)$userid
	. "\n GROUP BY a.id"
	. "\n ORDER BY $order";
	$database->setQuery( $query, 0, $limit );
	$rows = $database->loadObjectList();
//	foreach($rows as $key => $row) {
//		$rows[$key]->href = 'index.php?option=com_uddeim&...';
//	}
	return $rows;
}
