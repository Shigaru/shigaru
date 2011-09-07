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



class modVirtuemartcloudHelper {



	function clean_text($input_text, $tipo_low_param)

	//this function clean ups the text

	{

		$input_text = strip_tags($input_text); //Strip HTML and PHP tags from a string

		$input_text = trim($input_text); //Strip whitespace from the beginning and end of a string

		$input_text = html_entity_decode($input_text); //Convert all HTML entities to their applicable characters

		$input_text = preg_replace('/\s\s+/', ' ', $input_text); // Removes spaces of more than 1 character

		$input_text = str_replace('_', '-', $input_text);

		$input_text = str_replace('-', ' ', $input_text);

		$input_text = str_replace('+', ' ', $input_text);

		$input_text = str_replace('\'', ' ', $input_text);

		$input_text = str_replace('\\', '-', $input_text);

		$input_text = str_replace('/', ' ', $input_text);

		$input_text = str_replace('{mosimage}', '', $input_text);

		$input_text = str_replace('{mospagebreak}', '', $input_text);

		$input_text = preg_replace('|["<>!()$%?&^#:;,.*=]|i', '', $input_text); // Removes special characters


		//make loowercase

		if($tipo_low_param==0)
		{		$input_text = strtolower($input_text);}

		if($tipo_low_param==1)
		{		$input_text = modZonlineCloudHelper::strtolower_utf8($input_text);}

		if($tipo_low_param==2)
		{		$input_text = mb_strtolower($input_text,"UTF-8");}


		return $input_text;

	}



	function getTexttoTag($params) {



		global $mainframe;



		$db = & JFactory :: getDBO();



		//get some parameters

		$filterspecial = $params->get('filterspecial', 'all'); //show Featured & Discounted Products ?

		$sql_select = $params->get('sql_select','name_short'); //what fiels will be used to create tags ( name, short desc, full desc)

		$limit = intval($params->get('max_records', 100)); //Max. Last Rows in Database Query (very important for good performances)

		$searchfunction = $params->get('searchfunction', 'normalsearch'); //Search results from?

		$checkstock = (bool) ($params->get('checkstock', 0)); //check stock?

		$vmcategory_id = JRequest :: getVar('category_id', '0', '', 'int');

		$auto_category_tag = ($params->get('auto_category_tag', 0)); // This show only tags from Products in the actual Category the customer browses in

		$tagchild = (bool) ($params->get('tagchild', 1)); //Create tags from child products name



		$tagcategory_id = $params->get('tagcategory_id', null); // tag products from this category(s) only

		if ($vmcategory_id == '') {

			$auto_category_tag = 0;

		}



		//select from

		switch ($sql_select) {

			case "name" :

				$selectfilter = "p.product_name";

				break;

			case "name_short" :

				$selectfilter = "p.product_name, p.product_s_desc";

				break;

			case "name_full" :

				$selectfilter = "p.product_name, p.product_desc";

				break;

			case "short" :

				$selectfilter = "p.product_s_desc";

				break;

			case "full" :

				$selectfilter = "p.product_desc";

				break;

			case "name_short_full" :

				$selectfilter = "p.product_name, p.product_s_desc, p.product_desc";

				break;

			case "short_full" :

				$selectfilter = "p.product_s_desc, p.product_desc";

				break;

			default :

				$selectfilter = "p.product_name";

				break;



		}





		//Tag only discounted or special products

		switch ($filterspecial) {

			case "all" :

				$qfilter = "";

				break;

			case "featured" :

				$qfilter = " AND (p.product_special='Y') ";

				break;

			case "discounted" :

				$qfilter = " AND (p.product_discount_id > 0) ";

				break;

			case "featured_and_discounted" :

				$qfilter = " AND (p.product_special='Y' OR p.product_discount_id > 0) ";

				break;

			default :

				$qfilter = "";

				break;

		}

		if ($tagcategory_id) {

			// BEGIN - MultiCategory Display - deneb

			$cat_ids = explode(",", $tagcategory_id);

			if (count($cat_ids) > 1 ) {

				$multi_cats = 1;

			}
			else {
				$multi_cats = NULL;
			}

			// END - MultiCategory Display - deneb

			$q = "SELECT $selectfilter FROM #__vm_product p ";

			$q .= "LEFT JOIN #__vm_product_category_xref pc ON pc.product_id = p.product_id  ";

			// BEGIN - MultiCategory Display - deneb

			if ($multi_cats) {

				$i = 1;

				$q .= "WHERE (";

				foreach ($cat_ids as $cat_id) {

					if ($i == count($cat_ids)) {

						$q .= "(pc.category_id='$cat_id')";

					} else {

						$q .= "(pc.category_id='$cat_id') OR \n";

					}

					$i++;

				}

				$q .= ")  \n";

			} else {

				$q .= "WHERE pc.category_id='$tagcategory_id' \n";

			}

			// END - MultiCategory Display - deneb



			//Auto Category Tag

			if ($auto_category_tag == 1) {

				$q .= "AND pc.category_id = '$vmcategory_id' ";

			}

			//show childs

			if ($tagchild == FALSE) {

				$q .= " AND (p.product_parent_id='' OR p.product_parent_id='0') ";

			}

			//checkstock

			if ($checkstock == TRUE) {

				$q .= " AND p.product_in_stock > 0 ";

			}

			//only published products

			$q .= " AND p.product_publish='Y' ";

			//filter special and or discounted products

			$q .= $qfilter;

			$q .= "LIMIT 0," . $limit . " ";

		} else {

			$q = "SELECT $selectfilter FROM #__vm_product p ";

			$q .= "LEFT JOIN #__vm_product_category_xref pc ON pc.product_id = p.product_id ";
			$q .= "LEFT JOIN #__vm_category c ON c.category_id = pc.category_id WHERE ";

			//Auto Category Tag

			if ($auto_category_tag == 1) {

				$q .= "pc.category_id = '$vmcategory_id' AND ";

			}

			//show childs

			if ($tagchild == FALSE) {

				$q .= "(p.product_parent_id='' OR p.product_parent_id='0') AND ";

			}

			//checkstock

			if ($checkstock == TRUE) {

				$q .= "p.product_in_stock > 0  AND ";

			}

			//only published products

			$q .= "p.product_publish='Y' AND category_publish = 'Y' ";

			//filter special and or discounted products

			$q .= $qfilter;

			$q .= "LIMIT 0," . $limit . " ";

		}



		$db->setQuery($q);

		$result = $db->loadObjectList();



		if ($db->getErrorNum()) {

			JError :: raiseWarning(500, $db->stderr(true));

		}



		return $result;

	}



	function strtolower_utf8($inputString) {

		$outputString = utf8_decode($inputString);

		$outputString = strtolower($outputString);

		$outputString = utf8_encode($outputString);

		return $outputString;

	}



	function shuffle_assoc(&$array) {

		// Function to randomize the array, but keep the key as seen on php.net/shuffle

		if (count($array) > 1) { //$keys needs to be an array, no need to shuffle 1 item anyway

			$keys = array_rand($array, count($array));



			foreach ($keys as $key)

			$new[$key] = $array[$key];



			$array = $new;

		}

		return true; //because it's a wannabe shuffle(), which returns true

	}

	function color_generator($params) { //de functie aanmaken

		$begincolor = $params->get('color_start', '004E00'); //start color ( not black)

		$endcolor = $params->get('color_end', 'FFFFFF'); //end color

		$begin = hexdec($begincolor); //de minimale waarde, dit is geen 000000 omdat je dat een hele grote kans hebt op zwart. nu is er geen kans meer op zwart.hexdec() zet de hexadecimale code om in een normaal decimaal getal(zoals wij het kennen)

		$end = hexdec($endcolor); //de maximale waarde, dit is gewoon wit. hexdec() zet de hexadecimale code om in een normaal decimaal getal(zoals wij het kennen)

		$color = dechex(rand($begin, $end)); //hier wordt de kleur gemaakt door een decimaal getal te kiezen en terug te zetten naar een hexadecimale code, daar gebruik ik dechex() voor.

		$color = ("#" . $color); //geeft de waarde van de net gekozen kleur door aan de pagina met een "#" teken ervoor zodat de browser weet dat het om een kleur gaat.

		return $color;

	}



}

?>