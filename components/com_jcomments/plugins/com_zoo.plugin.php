<?php
/**
 * JComments plugin for Zoo (zoo.yootheme.com) objects support
 *
 * @version 2.0
 * @package JComments
 * @author Sergey M. Litvinov (smart@joomlatune.ru)
 * @copyright (C) 2006-2009 by Sergey M. Litvinov (http://www.joomlatune.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 **/
(defined('_VALID_MOS') OR defined('_JEXEC')) or die('Direct Access to this location is not allowed.');

class jc_com_zoo extends JCommentsPlugin
{
	function getTitles($ids)
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( 'SELECT id, name as title FROM #__zoo_core_item WHERE id IN (' . implode(',', $ids) . ')' );
		return $db->loadObjectList('id');
	}

	function getObjectTitle($id)
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery('SELECT name FROM #__zoo_core_item WHERE id = ' . $id);
		return $db->loadResult();
	}

	function getObjectLink($id)
	{
		$link = 'index.php?option=com_zoo&view=item&item_id='. $id;

		require_once(JPATH_SITE.DS.'includes'.DS.'application.php');

		$component = & JComponentHelper::getComponent('com_zoo');
		$menus	= & JSite::getMenu();
		$items	= $menus->getItems('componentid', $component->id);

		if (count($items)) {
			$link .= "&Itemid=" . $items[0]->id;
		}

		$link = JRoute::_($link);
		return $link;
	}

	function getObjectOwner($id)
	{
		$db = & JCommentsFactory::getDBO();
		$query = "SELECT created_by FROM #__zoo_core_item WHERE id = " . $id;
		$db->setQuery( $query );
		$userid = $db->loadResult();
		
		return intval( $userid );
	}
}
?>