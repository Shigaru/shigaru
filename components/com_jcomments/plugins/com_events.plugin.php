<?php
/**
 * JComments plugin for Events support
 *
 * @version 2.0
 * @package JComments
 * @author Sergey M. Litvinov (smart@joomlatune.ru)
 * @copyright (C) 2006-2009 by Sergey M. Litvinov (http://www.joomlatune.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 **/
(defined('_VALID_MOS') OR defined('_JEXEC')) or die('Direct Access to this location is not allowed.');

class jc_com_events extends JCommentsPlugin
{

	function getObjectTitle($id)
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( 'SELECT title FROM #__events WHERE id = ' . $id );
		return $db->loadResult();
	}

	function getObjectLink($id)
	{
		$_Itemid = JCommentsPlugin::getItemid( 'com_events' );

		$db = & JCommentsFactory::getDBO();
		$db->setQuery( "SELECT id, publish_up FROM #__events WHERE id=$id" );

		if (JCOMMENTS_JVERSION == '1.5') {
			$event = $db->loadObject();
		} else {
			$db->loadObject($event);
		}

		if ($event != null) {
			$dates = '';
			$regs = array();
        		if (ereg("([0-9]{4})-([0-9]{2})-([0-9]{2})[ ]([0-9]{2}):([0-9]{2}):([0-9]{2})",$event->publish_up,$regs)) {
				$y = $regs[1];
				$m = min( 12, max( 1, $regs[2] ) );
				$d = $regs[3];
				$d = max( 1, $d );
				
				$dates = '&amp;year='.$y.'&amp;month='.$m.'&amp;day='.$d;
			} 
		}

		$link = sefRelToAbs( "index.php?option=com_events&amp;task=view_detail&amp;agid=" . $id . $dates . "&amp;Itemid=" . $_Itemid );
		return $link;
	}

	function getObjectOwner($id)
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( 'SELECT created_by FROM #__events WHERE id = ' . $id );
		$userid = $db->loadResult();
		
		return $userid;
	}
}
?>