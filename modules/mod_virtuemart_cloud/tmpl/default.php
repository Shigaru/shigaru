<?php
/**
 * @version		$Id: mod_virtuemart_cloud.php 1.3.2
 * @package		mod_virtuemart_cloud
 * @copyright	Copyright (C) 2008,2009 Danny Buytaert, All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @author      Danny Buytaert
 * @link        http://www.joomlafreak.be
 *
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
if ($result_text ) {

	if ($format_list == 1) {
		echo "<ul>";
	}

	$Y = 0;
	foreach ($words_array_count_filtered as $k => $v) {

		if ($v) {
				
			$Y++;
			$vrate = '';
			if ($show_numbers == 1) {
				$vrate = $v;
			}
			$mycolor = modVirtuemartCloudHelper :: color_generator($params);
			$size = $minimum_fontsize + ($average_fontsize * (($v - $minimum_count) / $average_count));
			$vmlink = JRoute :: _("index.php?option=com_virtuemart&amp;page=shop.browse" . $searchlimit . $keywordsearch . $k);
			//ul li list or not
			if ($params->get('format_list', 0) == 1) {
				echo "<li>";
			}
			//show links or not
			if ($params->get('show_link', 1) == 1) {
				echo "<a href=\"" . $vmlink . "\" ";
			} else {
				echo "<span ";
			}
			echo "style=\"";
			//show color
			if ($params->get('color_usecolor', 1) == 1) {
				echo "color:" . $mycolor . ";";
			}
			//show fontsize
			echo "font-size: " . $size . $css_fontsize_length . ";\" title=\"" . $k . "\">" . $k . $sep_numberleft . $vrate . $sep_numberright . "";
			//show links or not
			if ($params->get('show_link', 1) == 1) {
				echo "</a>";
			} else {
				echo "</span> ";
			}
			echo $separator . "\n";
			//ul li list or not
			if ($params->get('format_list', 0) == 1) {
				echo "</li>";
			}
		}
	}
	if ($format_list == 1) {
		echo "</ul>";
	}

}
?>