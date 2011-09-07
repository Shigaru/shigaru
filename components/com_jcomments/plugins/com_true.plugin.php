<?php
/**
 * JComments plugin for TrueGallery objects support
 *
 * @version 2.0
 * @package JComments
 * @author Sergey M. Litvinov (smart@joomlatune.ru)
 * @copyright (C) 2006-2009 by Sergey M. Litvinov (http://www.joomlatune.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 **/
(defined('_VALID_MOS') OR defined('_JEXEC')) or die('Direct Access to this location is not allowed.');

class jc_com_true extends JCommentsPlugin
{
	function getTitles($ids)
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( 'SELECT id, imgtitle as title FROM #__true WHERE id IN (' . implode(',', $ids) . ')' );
		return $db->loadObjectList('id');
	}

	function getObjectTitle($id)
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( 'SELECT imgtitle FROM #__true WHERE id = ' . $id );
		return $db->loadResult();
	}

	function getObjectLink($id)
	{
		$_Itemid = JCommentsPlugin::getItemid( 'com_true' );
		if (!$_Itemid) {
			$_Itemid = 1;
		}

		$db = & JCommentsFactory::getDBO();
		$db->setQuery( 'SELECT catid FROM #__true WHERE id = ' . $id );
		$catid = $db->loadResult();

		$link = JoomlaTuneRoute::_('index.php?option=com_true&amp;func=detail&amp;id=' . $id . '&amp;catid=' . $catid . '&amp;Itemid=' . $_Itemid);
		return $link;
	}

	function getObjectOwner($id) {

		$dbo = & JCommentsFactory::getDBO();
		$dbo->setQuery('SELECT owner FROM #__true WHERE id = ' . $id);
		$userid = $dbo->loadResult();
		
		return intval($userid);
	}

	function getCategories($filter = '') {

		$db = & JCommentsFactory::getDBO();

		$query = "SELECT c.cid as `value`, c.name AS `text`"
			. "\n FROM #__true_catg AS c"
			. (($filter != '') ? "\n WHERE c.cid IN ( ".$filter." )" : '')
			. "\n ORDER BY c.ordering"
			;
		$db->setQuery($query);
		$rows = $db->loadObjectList();

		return $rows;
	}
}
?>