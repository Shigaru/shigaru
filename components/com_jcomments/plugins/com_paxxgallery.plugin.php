<?php
/**
 * JComments plugin for PAXXGallery photo objects support
 *
 * @version 2.0
 * @package JComments
 * @author Sergey M. Litvinov (smart@joomlatune.ru)
 * @copyright (C) 2006-2009 by Sergey M. Litvinov (http://www.joomlatune.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 **/
(defined('_VALID_MOS') OR defined('_JEXEC')) or die('Direct Access to this location is not allowed.');

class jc_com_paxxgallery extends JCommentsPlugin
{
	function getObjectTitle($id)
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( 'SELECT name FROM #__paxxfiles WHERE published = 1 AND id = ' . $id );
		return $db->loadResult();
	}

	function getObjectLink($id)
	{
		$_Itemid = JCommentsPlugin::getItemid( 'com_paxxgallery' );

		$db = & JCommentsFactory::getDBO();
		$db->setQuery( 'SELECT gid FROM #__paxxfiles WHERE id = ' . $id );
		$gid = $db->loadResult();

		$link = sefRelToAbs( "index.php?option=com_paxxgallery&amp;task=view&amp;gid='.$gid.'&amp;iid=" . $id . "&amp;Itemid=" . $_Itemid );
		return $link;
	}

	function getObjectOwner($id)
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( 'SELECT userid FROM #__paxxfiles WHERE id = ' . $id );
		$userid = $db->loadResult();
		
		return $userid;
	}
}
?>