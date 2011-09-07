<?php
/**
 * JComments plugin for Seyret support
 *
 * @version 2.0
 * @package JComments
 * @author Sergey M. Litvinov (smart@joomlatune.ru)
 * @copyright (C) 2006-2009 by Sergey M. Litvinov (http://www.joomlatune.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 **/
(defined('_VALID_MOS') OR defined('_JEXEC')) or die('Direct Access to this location is not allowed.');

class jc_com_seyret extends JCommentsPlugin
{
	function getObjectTitle($id)
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( 'SELECT title FROM #__seyret_items WHERE published = 1 AND id = ' . $id );
		return $db->loadResult();
	}

	function getObjectLink($id)
	{
		$_Itemid = JCommentsPlugin::getItemid( 'com_seyret' );
		$link = JoomlaTuneRoute::_('index.php?option=com_seyret&amp;task=videodirectlink&amp;id=' . $id . '&amp;Itemid=' . $_Itemid);
		return $link;
	}
}
?>