<?php
/**
* CB Search Plugin - Extend the standard Joomla search function to include Community Builder profiles
* @version 1.0
* @creation June 2009
* @author Joe Palmer
* @authorEmail joe@softforge.co.uk
* @package CB Search Plugin
* @copyright (C) 2008 www.softforge.co.uk
* @license GNU/GPL
*/

// Ensure this file is being included by a parent file
defined( '_JEXEC' ) or die( 'Restricted access' );

// Include CB language file if exists
if ( @file_exists("components/com_comprofiler/plugin/language/default_language/default_language.php") ) {
    require_once("components/com_comprofiler/plugin/language/default_language/default_language.php");
}

// Register the search function inside Joomla API
$mainframe->registerEvent( 'onSearch', 'plgCbSearch' );
$mainframe->registerEvent( 'onSearchAreas', 'plgCbSearchAreas' );

function &plgCbSearchAreas() {
	$plugin =& JPluginHelper::getPlugin('search', 'cbsearch');
    $pluginParams = new JParameter( $plugin->params );
    static $areas = array();
    $areas['cbsearch'] = $pluginParams->def('search_result_section_name', 'Profiles');
    return $areas;
}

function plgCbSearch($text, $matchtype='', $order='', $areas=null) {
	
    if (is_array( $areas )) {
        if (!array_intersect( $areas, array_keys( plgCbSearchAreas() ) )) {
            return array();
        }
    }
	
    $database =& JFactory::getDBO();
    $plugin =& JPluginHelper::getPlugin('search', 'cbsearch');
    $pluginParams = new JParameter( $plugin->params );
    
    if (!trim($text)) return array();

    // This is the standard blacklist of fields which should never be searched or displayed. Change it if desired.
    // Later in that script this array will be merged with the blacklist array given with the plugin params.
    $stdBlacklist = array('id','text','title','browsernav','password','resultid','href','section','created',
        'sendEmail','gid','registerDate','lastvisitDate','activation','params','fbviewtype','fbordering',
        'fbsignature','acceptedterms','bannedreason','unbannedby','bannedby','unbanneddate','banneddate',
        'banned','cbactivation','registeripaddr','lastupdatedate','confirmed','approved','avatarapproved',
        'avatar','message_number_sent','message_last_sent','usertype');

    // Get the plugin params
    $Itemid = intval($pluginParams->def('Itemid', 1));
    $linked_title_format = intval($pluginParams->def('linked_title_format', 0));
    $section_name = trim($pluginParams->def('search_result_section_name', 'Profile'));
    $limit = intval($pluginParams->def('search_limit', 50));
    $display_result_fields = trim($pluginParams->def('display_result_fields', ''));
    $display_empty_fields = intval($pluginParams->def('display_empty_fields', 1));
    $date_result_field = trim($pluginParams->def('date_result_field', 'u.registerDate'));
    $advanced_order_field = trim($pluginParams->def('advanced_order_field', '0'));
    $advanced_order_field = $advanced_order_field=='0' ? $date_result_field : $advanced_order_field;
    $search_fields = trim($pluginParams->def('search_fields', ''));
    $search_fields = strlen($search_fields)>0 ? array_map('trim',explode(',',$search_fields)) : null;
    $blacklist_search_fields = trim($pluginParams->def('blacklist_search_fields', ''));
    $blacklist_search_fields = strlen($blacklist_search_fields)>0 ? array_map('trim',explode(',',$blacklist_search_fields)) : array();
    $blacklist_search_fields = array_merge($blacklist_search_fields, $stdBlacklist);

    // Collect all searchable table columns (char, varchar, *text) from table #__comprofiler
    $database->setQuery( 'SHOW FIELDS FROM #__comprofiler');
    $fields = $database->loadObjectList();
    foreach ($fields as $field) { // Ignore all blacklist and non character table columns
        if ( !in_array($field->Field, $blacklist_search_fields) &&
             (stristr($field->Type,'char')!==false || stristr($field->Type,'text')!==false) ) {
            if ( is_array($search_fields) ) { // Search only given search_fields from search plugin params?
                if ( in_array($field->Field, $search_fields) )
                    $colnames[] = "c.".$field->Field;
            } else $colnames[] = "c.".$field->Field; // No, no search_fields given so search all fields
        }
    }
    // CB integer field 'hits' Add here additional int field to display or to be searched (see also Load field titles)
    // Note that they may must be removed from the $stdBlacklist
    $colnames[] = "c.hits";
    // and finally columns from the #__users table
    $colnames[] = "u.username";
    $colnames[] = "u.name";

    // Load field 'titles'/'title defines' from table #__comprofiler_fields
    $database->setQuery("SELECT name, title FROM #__comprofiler_fields");
    $field_titles = $database->loadAssocList('name');
    // CB integer field 'hits' Add here additional col name language translations defines
    $field_titles['hits']['title'] = '_HEADER_HITS';

    // BEGIN WHERE clause depending on matchtype
    $where = '1=1';
    switch ($matchtype) {
        case 'exact': // Exact match of search string in one or more fields
            foreach ($colnames as $colname)
                $where .= "$colname = '$text' \n OR ";
                $where .= '1=0';
            break;
        case 'all': // Each search word must be found at least one time in one or more fields
            $words = explode(' ',$text);
            $where = '(';
            foreach ($words as $word) {
                foreach ($colnames as $colname)
                    $where .= "$colname LIKE '%$word%' \n OR ";
                $where = preg_replace("/ OR $/","",$where);
                $where .= ") AND (\n ";
            }
            $where .= '1=1)';
            break;
        case 'any':
        default: // Match one or more of the searched words in one of the fields
            $words = explode(' ',$text);
            $where = "(0=1)";
            foreach ($colnames as $colname) {
                $where .= " OR (0=1";
                foreach ($words as $word)
                    $where .= " OR $colname LIKE '%$word%'";
                $where .= ")";
            }
    }
    // Take care to search only for valid profiles
    $where .= "\n AND c.approved=1 AND c.confirmed=1 AND c.banned=0";
    $where .= "\n AND u.name NOT LIKE 'Message %'"; // Ignore a Forum Message Plugin if there is one
    // END WHERE

    // BEGIN ORDER BY clause depending on desired order
    switch ($order) {
        case 'popular':
            $order = 'c.hits DESC';
            break;
        case 'oldest':
            $order = "$advanced_order_field ASC";
            break;
        case 'newest':
            $order = "$advanced_order_field DESC";
            break;
        case 'alpha':
        case 'category':
        default:
            $order = 'u.name ASC';
    } 
    // END ORDER BY

    // Build query 'text' column with additional to be displayed result fields from search plugin params
    if ( strlen($display_result_fields) > 0 ) {
        $result = "CONCAT(''"; // Begin CONCAT
        $result_fields = array_map('trim',explode(',',$display_result_fields));
        foreach ($result_fields as $field)
            foreach ($colnames as $col) 
                if ( preg_match("/".preg_quote($field)."$/i",$col) ) {
                    $field_title = @$field_titles[$field]['title'];
                    // Some field titles in table #__comprofiler_fields are defines so try to get the definition
                    if ( defined($field_title) ) eval("\$field_title = $field_title;");
                    if ( $display_empty_fields )
                        $result .= ",'$field_title: ',IF($col,$col,'".mysql_real_escape_string(_UE_NO_DATA)."'),' '";
                    else $result .= ",IF(LENGTH($col)>0,CONCAT('$field_title: ',$col),''),' '";
                }
        $result .= ")"; // End CONCAT
    } else $result = "''";

    // Set the format of the linked 'title' column together with the avatar
    if ( $linked_title_format == 1 ) // Name (Username)
        $linked_title_format = "CONCAT(u.name,' (',u.username,')')";
    else if ( $linked_title_format == 2 ) // Firstname Lastname
        $linked_title_format = "CONCAT(c.firstname,' ',c.lastname)";
    else if ( $linked_title_format == 3 ) // Firstname Lastname (Username)
        $linked_title_format = "CONCAT(c.firstname,' ',c.lastname,' (',u.username,')')";
    else $linked_title_format = "CONCAT('',u.username)"; // 0 default is Username only

    // BEGIN SELECT statement
    $q = "SELECT DISTINCT u.*, c.*, $linked_title_format AS title, \n"
    ." $result AS text, \n"
    ." $date_result_field AS created, \n"
    ." '$section_name' AS section, \n"
    ." CONCAT('index.php?option=com_comprofiler&task=userProfile&user=',c.id,'&Itemid=$Itemid') AS href, \n"
    ." '2' AS browsernav, \n"
    ." u.id AS resultid \n"
    ." FROM #__comprofiler c \n"
    ." LEFT JOIN #__users u ON u.id = c.user_id \n"
    ." WHERE $where \n"
    ." ORDER BY $order";
    // END SELECT

    $database->setQuery($q, 0, $limit);
    $results = $database->loadObjectList();
    if ( ! $results ) return array(); // Nothing was found

    // Post SELECT - Find now the search text in all returned colums and append them 
    // to our 'text' column of the result row so that we finally see where all the matches are occured
    $words = array_map('trim',explode(' ',$text));
    for ($i=0; $i < count($results); $i++) {
        foreach (get_object_vars($results[$i]) as $k => $v) {
            // Ignore all unwanted columns, taking into account the blacklist
            // and the search_fields if given via the search plugin params
            if (is_array($v) or is_object($v) or $v === NULL or stristr($k,'password')!=false
                or in_array($k, $blacklist_search_fields)
                or (is_array($search_fields) && !in_array($k, $search_fields)) ) {
                continue;
            }
            foreach ($words as $word) { // Report for each word the matched fields
                if ( stristr($v,$word) != false) {
                    $field_title = @$field_titles[$k]['title'];
                    if ( defined($field_title) ) eval("\$field_title = $field_title;");
                    // but ignore dublicate matched fields
                    if ( strstr($results[$i]->text, "$field_title: $v ") == false)
                        $results[$i]->text .= "$field_title: $v ";
                        $results[$i]->text = str_replace("|*|", ", ", $results[$i]->text);
                }
            }
        }
    }

    return $results;
} // End plgCbSearch
?>