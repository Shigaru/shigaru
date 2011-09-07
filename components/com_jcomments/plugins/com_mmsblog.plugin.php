<?php
/**
 * JComments plugin for mmsBlog support
 *
 * @version 2.0
 * @package JComments
 * @author majus (m_rausch@gmx.de)
 * @copyright (C) 2009 by majus
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 **/
(defined('_VALID_MOS') OR defined('_JEXEC')) or die('Direct Access to this location is not allowed.');

class jc_com_mmsblog extends JCommentsPlugin
{
	function getObjectTitle($id)
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( 'SELECT subject FROM #__mmsblog_item WHERE id = ' . $id );
		return $db->loadResult();
	}

	function getObjectLink($id)
	{
		$_Itemid = JCommentsPlugin::getItemid('com_mmsblog');
		$link = JRoute::_('index.php?option=com_mmsblog&amp;view=item&amp;id='. $id .'&amp;Itemid='. $_Itemid);
		return $link;
	}
}
?>