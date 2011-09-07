<?php
/**
 * JComments plugin for k2 (k2.joomlaworks.gr) objects support
 *
 * @version 2.0
 * @package JComments
 * @author Sergey M. Litvinov (smart@joomlatune.ru)
 * @copyright (C) 2006-2009 by Sergey M. Litvinov (http://www.joomlatune.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 **/
(defined('_VALID_MOS') OR defined('_JEXEC')) or die('Direct Access to this location is not allowed.');

class jc_com_k2 extends JCommentsPlugin
{
	function getTitles($ids)
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( 'SELECT id, title FROM #__k2_items WHERE id IN (' . implode(',', $ids) . ')' );
		return $db->loadObjectList('id');
	}

	function getObjectTitle($id)
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery('SELECT title FROM #__k2_items WHERE id = ' . $id);
		return $db->loadResult();
	}

	function getObjectLink($id)
	{

		$db = & JCommentsFactory::getDBO();
		$db->setQuery( 'SELECT alias FROM #__k2_items WHERE id = ' . $id );
		$alias = $db->loadResult();

		$link = 'index.php?option=com_k2&view=item&id='. $id . ':' . $alias;

		require_once(JPATH_SITE.DS.'includes'.DS.'application.php');

		$component = & JComponentHelper::getComponent('com_k2');
		$menus = & JSite::getMenu();
		$items = $menus->getItems('componentid', $component->id);

		if (count($items)) {
			$link .= "&Itemid=" . $items[0]->id;
		}

		$link = JRoute::_($link);
		return $link;
	}

	function getObjectOwner($id)
	{
		$db = & JCommentsFactory::getDBO();
		$query = "SELECT created_by FROM #__k2_items WHERE id = " . $id;
		$db->setQuery( $query );
		$userid = $db->loadResult();
		
		return intval( $userid );
	}
}
?>