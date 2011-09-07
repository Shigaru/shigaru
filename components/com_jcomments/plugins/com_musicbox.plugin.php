<?php
/**
 * JComments plugin for MusicBox albums support
 *
 * @version 2.0
 * @package JComments
 * @author Sergey M. Litvinov (smart@joomlatune.ru)
 * @copyright (C) 2006-2009 by Sergey M. Litvinov (http://www.joomlatune.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 **/
(defined('_VALID_MOS') OR defined('_JEXEC')) or die('Direct Access to this location is not allowed.');

class jc_com_musicbox extends JCommentsPlugin
{
	function getObjectTitle($id)
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( 'SELECT title FROM #__musicboxalbum WHERE published = 1 AND id = ' . $id );
		return $db->loadResult();
	}

	function getObjectLink($id)
	{
		$_Itemid = JCommentsPlugin::getItemid( 'com_musicbox' );
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( 'SELECT catid FROM #__musicboxalbum WHERE id = ' . $id );
		$catid = $db->loadResult();
		$link = sefRelToAbs( "index.php?option=com_musicbox&amp;task=view&amp;catid=" . $catid . "&amp;id=" . $id . "&amp;Itemid=" . $_Itemid );
		return $link;
	}

	function getObjectOwner($id)
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( 'SELECT created_by FROM #__musicboxalbum WHERE id = ' . $id );
		$userid = $db->loadResult();
		
		return $userid;
	}
}
?>