<?php
/**
 * @version		$Id: mod_virtuemart_cloud.php 1.3.2
 * @package		mod_virtuemart_cloud
 * @copyright	Copyright (C) 2008,2009 Danny Buytaert, All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @author      Danny Buytaert
 * @link        http://www.joomlafreak.be
 *
 * Based on the zaragoza clouds www.zaragozaonline.com
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// check if Virtuemart is installed and enabled
jimport('joomla.application.component.helper');
if (!JComponentHelper::isEnabled('com_virtuemart', true))
{
	JError::raiseWarning(0, JText::_("Virtuemart Cloud module works only if Virtuemart is installed and enabled."));

}

// Include the virtuemart cloud module functions only once
require_once (dirname(__FILE__) . DS . 'helper.php');

/*
 * Get the parameters of the module
 */
//The number of words to display (default 40)
$max_items = intval($params->get('max_items', 40));
//Ordering options
$ordering = $params->get('ordering', 1);

//Select format: List/Cloud Cloud=
$format_list = $params->get('format_list', 0);

//Maximum word length
$maximum_word_length = intval($params->get('maximum_word_length', 20));

//Minimum word length
$minimum_word_length = intval($params->get('minimum_word_length', 3));

//Maximum fontsize
$maximum_fontsize = intval($params->get('maximum_fontsize', 32));

//minimum fontsize
$minimum_fontsize = intval($params->get('minimum_fontsize', 10));

//Tag font size length unit (px,%,em,ex)
$css_fontsize_length = $params->get('css_fontsize_length', 'px');

//Search results from? Default search shows default search page. Advanced search shows default category page
$searchfunction = $params->get('searchfunction', 'normalsearch');

//Black list / Stopwords  not usefuly
$blacklist = $params->get('blacklist');

//White list /Currently removed from VM Cloud
//$whitelist = $params->get( 'listaforzada' );

//separator between words,Word separator.Default is a non-breaking space.
$separator = $params->get('separator','&nbsp;');
//Strtolower function options. if tou have UTF8 problems change the strtolower function option.
$tipo_low = $params->get('tipo_low', 0);

//Show number, // Show a number how many times the word is used
$show_numbers = $params->get('show_numbers', 0);

// Separator on the left side of the number
$show_numbers_left_separator = $params->get('show_numbers_left_separator', '(');

// Separator on the right side of the number
$show_numbers_right_separator = $params->get('show_numbers_right_separator', ')');
// use the color function
$showcolor = $params->get('color_useColor', 1 ) ;

$sql_select = $params->get('sql_select','name_short'); //what fiels will be used to create tags ( name, short desc, full desc)


//Show the separaors left and right only when
if ($show_numbers == 1) {
	$sep_numberleft = $show_numbers_left_separator;
	$sep_numberright = $show_numbers_right_separator;
} else {
	$sep_numberleft = "";
	$sep_numberright = "";
}

//search in
switch ($searchfunction) {
	case "normalsearch" :
		$searchlimit = "";
		break;
	case "name" :
		$searchlimit = "&amp;search_limiter=name";
		break;
	case "desc" :
		$searchlimit = "&amp;search_limiter=desc";
		break;
	case "full" :
		$searchlimit = "&amp;search_limiter=full";
		break;
	default :
		$searchlimit = "";
		break;
}

// use keyword or keyword1 ( keyword1 used for advanced search function, as seen in shop_browse_queries.php)
if ($searchfunction == "normalsearch") {
	$keywordsearch = "&amp;keyword=";
} else {
	$keywordsearch = "&amp;keyword1=";
}
$result = null;
//Get the result of the SQL Query from the helper file
$result_text = modVirtuemartCloudHelper :: getTexttoTag($params);


// if there are results show it.
if ($result_text) {
	//loop through the results and create and array

	foreach ($result_text as $record) {
		{
			switch ($sql_select) {
				case "name" :
					$large_chain[] = modVirtuemartCloudHelper :: clean_text($record->product_name, $tipo_low);
					break;
				case "name_short" :
					$large_chain[] = modVirtuemartCloudHelper :: clean_text($record->product_name, $tipo_low) .
					modVirtuemartCloudHelper :: clean_text($record->product_s_desc, $tipo_low);
					break;
				case "name_full" :
					$large_chain[] = modVirtuemartCloudHelper :: clean_text($record->product_name, $tipo_low) .
					modVirtuemartCloudHelper :: clean_text($record->product_desc, $tipo_low);
					break;
				case "short" :
					$large_chain[]= modVirtuemartCloudHelper :: clean_text($record->product_s_desc, $tipo_low);
					break;
				case "full" :
					$large_chain[] = modVirtuemartCloudHelper :: clean_text($record->product_desc, $tipo_low);
					break;
				case "name_short_full" :
					$large_chain[] = modVirtuemartCloudHelper :: clean_text($record->product_name, $tipo_low) .
					modVirtuemartCloudHelper :: clean_text($record->product_desc, $tipo_low).
					modVirtuemartCloudHelper :: clean_text($record->product_s_desc, $tipo_low);
					break;
				case "short_full" :
					$large_chain[] = modVirtuemartCloudHelper :: clean_text($record->product_desc, $tipo_low).
					modVirtuemartCloudHelper :: clean_text($record->product_s_desc, $tipo_low);
					break;
				default :
					$large_chain[]  = modVirtuemartCloudHelper :: clean_text($record->product_name, $tipo_low);
					break;
			}
		}
	}
	//Join array elements with a string ' '
	$large_chain = implode(' ', $large_chain);
	//Split the given string by a regular expression.
	$words_array = preg_split("/ /", $large_chain);
	//Counts all the values of an array
	$words_array_count = array_count_values($words_array);
	//remove the words from the blacklist
	if ($blacklist)
	{
		$blacklist_array = explode(",", $blacklist);
		foreach ($blacklist_array as $black_word) {
			if (isset ($words_array_count[trim($black_word)])) {
				unset ($words_array_count[trim($black_word)]);
			}
		}
	}
	//Original White list, currently removed from VM CLoud
	//lista forzada siempre salen
	//$listaforzada_array = explode (",",$listaforzada);
	//foreach($listaforzada_array as $palabra_blanca)
	//{	$palabra_blanca_array = explode ("=",$palabra_blanca);
	//$words_array_count_filtered[$palabra_blanca_array[0]] = $palabra_blanca_array[1];
	//}

	arsort($words_array_count); //Order by highest to lowest rate?

	$i = 1;
	foreach ($words_array_count as $k => $v) {

		if ($i <= $max_items AND strlen($k) >= $minimum_word_length AND strlen($k) <= $maximum_word_length) {
			$words_array_count_filtered[$k] = $v;
			$i++;
		}

	}

	$average_fontsize = $maximum_fontsize - $minimum_fontsize;
	$minimum_count = min(array_values($words_array_count_filtered));
	$maximum_count = max(array_values($words_array_count_filtered));
	$average_count = $maximum_count - $minimum_count;
	if ($average_count == "0") {
		$average_count = "1";
	}

	switch ($ordering) {
		case 0 :
			break;
		case 1 :
			ksort($words_array_count_filtered);
			break;
		case 2 :
			krsort($words_array_count_filtered);
			break;
		case 3 :
			arsort($words_array_count_filtered);
			break;
		case 4 :
			asort($words_array_count_filtered);
			break;
		case 5 :
			modVirtuemartCloudHelper :: shuffle_assoc($words_array_count_filtered);
			break;
		default :
	}
}

require (JModuleHelper :: getLayoutPath('mod_virtuemart_cloud'));