<?php
/**
 * JComments plugin for IDoBlog items support
 *
 * @version 2.0
 * @package JComments
 * @author Sergey M. Litvinov (smart@joomlatune.ru)
 * @copyright (C) 2006-2009 by Sergey M. Litvinov (http://www.joomlatune.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 **/
(defined('_VALID_MOS') OR defined('_JEXEC')) or die('Direct Access to this location is not allowed.');

class jc_com_idoblog extends JCommentsPlugin
{

	function getObjectTitle($id)
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( 'SELECT title FROM #__content WHERE id = ' . $id );
		return $db->loadResult();
	}

	function getObjectLink($id)
	{
		if (JCOMMENTS_JVERSION == '1.5') {
			require_once(JPATH_ROOT.DS.'components'.DS.'com_content'.DS.'helpers'.DS.'route.php');

			$user =& JFactory::getUser();
			
			$query = 'SELECT a.*, u.name AS author, u.usertype, cc.title AS category, s.title AS section,' .
					' CASE WHEN CHAR_LENGTH(a.alias) THEN CONCAT_WS(":", a.id, a.alias) ELSE a.id END as slug,'.
					' CASE WHEN CHAR_LENGTH(cc.alias) THEN CONCAT_WS(":", cc.id, cc.alias) ELSE cc.id END as catslug,'.
					' g.name AS groups, s.published AS sec_pub, cc.published AS cat_pub, s.access AS sec_access, cc.access AS cat_access '.
					' FROM #__content AS a' .
					' LEFT JOIN #__categories AS cc ON cc.id = a.catid' .
					' LEFT JOIN #__sections AS s ON s.id = cc.section AND s.scope = "content"' .
					' LEFT JOIN #__users AS u ON u.id = a.created_by' .
					' LEFT JOIN #__groups AS g ON a.access = g.id'.
					' WHERE a.id = ' . $id;

			$db = & JCommentsFactory::getDBO();
			$db->setQuery( $query );
			$row = $db->loadObject();

			if ($row->access <= $user->get('aid', 0)) {
				$link = JRoute::_(ContentHelperRoute::getArticleRoute($row->slug, $row->catslug, $row->sectionid));
			} else {
				$link = JRoute::_("index.php?option=com_user&task=register");
			}
		}
		return $link;
	}

	function getObjectOwner($id)
	{
		$db = & JCommentsFactory::getDBO();
		$db->setQuery( 'SELECT created_by FROM #__content WHERE id = ' . $id );
		$userid = $db->loadResult();
		
		return $userid;
	}
}
?>