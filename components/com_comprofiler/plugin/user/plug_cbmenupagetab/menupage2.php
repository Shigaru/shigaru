<?php

/** ensure this file is being included by a parent file */
defined('_JEXEC') or die('Restricted access');

?>


<?php

/**
 * Basic tab extender. Any plugin that needs to display a tab in the user profile
 * needs to have such a class. Also, currently, even plugins that do not display tabs (e.g., auto-welcome plugin)
 * need to have such a class if they are to access plugin parameters (see $this->params statement).
 */

class getMenuPageTab2 extends cbTabHandler {

	/**
	 * Construnctor
	 */

	function getMenuPageTab2() {
		$this->cbTabHandler();
	}

	/**
	* Generates the HTML to display the user profile tab
	* @param object tab reflecting the tab database entry
	* @param object mosUser reflecting the user being displayed
	* @param int 1 for front-end, 2 for back-end
	* @returns mixed : either string HTML for tab content, or false if ErrorMSG generated
	*/

	function getDisplayTab($tab,$user,$ui) {
		
		$params = $this->params; // get parameters (plugin and related tab
		$menuitem_id = 'index.php?option=com_hwdvideoshare&task=yourfavourites&format=raw&guid='.$user->user_id;
		
		// Use ItemID to retrieve full url for menu item	
		
		$db =& JFactory::getDBO();

		$query = "SELECT link FROM #__menu WHERE id = ".$menuitem_id;
		$db->setQuery($query, 0, intval($params->get('count')));
		$rows = $db->loadObjectList();
		//print_r($rows); //LCD
		
		//$link = JRoute::_($rows[0]->link);
		$link = $rows[0]->link;
		$link = $link.'&Itemid='.$menuitem_id;
		$link = $link.'&tmpl=component&print=1';
		//echo "<br />link: ".$link;

		//$page = 'index2.php?option=com_civicrm&view=Dashboard&Itemid=65';
		$page = $link;
		$fullurl = JURI::base().$menuitem_id;
		//echo $fullurl.'<br />';
		
		//$fullpath = str_replace('index.php','',$_SERVER['PHP_SELF']).$page;
		//echo $fullpath.'<br />';		
		
		//$url = '<iframe width="100%" id="pageinsert" name="pageinsert" src="'.$page.'" scrolling="no" frameborder="no" class="autoHeight" ></iframe>';
		//return $url;
		
		$content = "<div id=\"pageload2\">\n";
		
		$content .= "<script type='text/javascript'>
					<!--
					ajaxinclude(\"".$fullurl."\")
					-->
					</script>";
		
		$content .= "</div>";
		$content .= "</div>";
		return $content;

	} // end or getDisplayTab function

} // end of getMenuPageTab class

?>
