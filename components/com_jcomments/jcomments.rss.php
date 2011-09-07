<?php
/**
 * JComments - Joomla Comment System
 *
 * Export comments to rss
 *
 * @version 2.0
 * @package JComments
 * @author Sergey M. Litvinov (smart@joomlatune.ru)
 * @copyright (C) 2006-2009 by Sergey M. Litvinov (http://www.joomlatune.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
 * If you fork this to create your own project,
 * please make a reference to JComments someplace in your code
 * and provide a link to http://www.joomlatune.ru
 **/

// ensure this file is being included by a parent file
(defined('_VALID_MOS') or defined('_JEXEC')) or die('Direct Access to this location is not allowed.');

// define directory separator short constant
if (!defined('DS')) {
	define('DS', DIRECTORY_SEPARATOR);
}

class JoomlaTuneFeedItem
{
	var $title = "";
	var $link = "";
	var $description = "";
	var $author = "";
	var $category = "";
	var $pubDate = "";
	var $source = "";
}

class JoomlaTuneFeed
{
	var $encoding = "";
	var $timezone = "+0000";
	var $offset = "";
	var $title = "";
	var $link = "";
	var $syndicationURL = "";
	var $description = "";
	var $lastBuildDate = "";
	var $pubDate = "";
	var $copyright = "";
	var $items = array();

	function __construct()
	{
		$this->items = array();
	}

	function JoomlaTuneFeed()
	{
		$args = func_get_args();
		call_user_func_array(array(&$this, '__construct'), $args);
	}

	function addItem( &$item )
	{
		$item->source = $this->link;
		$this->items[] = $item;
	}

	function htmlspecialchars($str)
	{
		return (strtoupper($this->encoding) == 'UTF-8') ? htmlspecialchars($str, ENT_COMPAT, 'UTF-8') : htmlspecialchars($str);
	}

	function setOffset($offset)
	{
		$h = intval($offset);
		$m = ($offset - intval($offset)) * 60;
		$this->offset = $offset;
		$this->timezone = (($offset > 0) ? '+' : '-') . sprintf("%02d%02d", $h, $m);
	}

	function toRFC822($date = 'now')
	{
		if ($date == 'now' || empty($date)) {
			$date = strtotime(gmdate("M d Y H:i:s", time()));
		} else if (is_string($date)) {
			$date = strtotime($date);
		}

		if ($this->offset != '') {
			$date = $date + $this->offset * 3600;
		}

		return date('D, d M Y H:i:s', $date) . ' ' . $this->timezone;
	}

	function render()
	{
		$this->link = str_replace('&amp;', '&', $this->link);
		$this->link = str_replace('&', '&amp;', $this->link);

		$feed = "<rss version=\"2.0\">\n";
		$feed.= "	<channel>\n";
		$feed.= "		<title>".$this->title."</title>\n";
		$feed.= "		<description>".$this->description."</description>\n";
		$feed.= "		<link>".$this->link."</link>\n";
		$feed.= "		<lastBuildDate>".$this->htmlspecialchars($this->toRFC822())."</lastBuildDate>\n";
		$feed.= "		<generator>JComments</generator>\n";

		for ($i=0; $i<count($this->items); $i++)
		{
			$this->items[$i]->link = str_replace('&amp;', '&', $this->items[$i]->link);
			$this->items[$i]->link = str_replace('&', '&amp;', $this->items[$i]->link);

			$feed.= "		<item>\n";
			$feed.= "			<title>".$this->htmlspecialchars(strip_tags($this->items[$i]->title))."</title>\n";
			$feed.= "			<link>".$this->items[$i]->link."</link>\n";
			$feed.= "			<description><![CDATA[".$this->items[$i]->description."]]></description>\n";

			if ($this->items[$i]->author!="") {
				$feed.= "			<author>".$this->htmlspecialchars($this->items[$i]->author)."</author>\n";
			}

			if ($this->items[$i]->date!="") {
				$feed.= "			<pubDate>".$this->htmlspecialchars($this->toRFC822($this->items[$i]->date))."</pubDate>\n";
			}
			$feed.= "		</item>\n";
		}
		$feed.= "	</channel>\n";
		$feed.= "</rss>\n";
		return $feed;
	}

	function display()
	{
		$rss = $this->render();

		if (!headers_sent()) {
			header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 900) . ' GMT');
			header('Content-Type: application/rss+xml; charset=' . $this->encoding);
		}
	        echo "<?xml version=\"1.0\" encoding=\"".$this->encoding."\"?>\n";
		echo $rss;
	}
}

class JCommentsRSS
{
	function feedLastComments()
	{
		global $mainframe;

		$config = & JCommentsFactory::getConfig();

		if ($config->get('enable_rss') == '1') {

			$object_id = (int) JCommentsInput::getParam($_REQUEST, 'object_id', 0);
			$object_group = trim(strip_tags(JCommentsInput::getParam($_REQUEST, 'object_group', 'com_content')));
			$limit = (int) JCommentsInput::getParam($_REQUEST, 'limit', 100);

			// if no group or id specified - return 404
			if ($object_id == 0 || $object_group == '') {
				header('HTTP/1.0 404 Not Found');

				if (JCOMMENTS_JVERSION == '1.5') {
					JError::raiseError(404, JText::_("Resource Not Found"));
				} else {
					$_404_template = $mainframe->getCfg('absolute_path') . DS . 'templates' . DS . '404.php';
					if (is_file($_404_template)) {
						require_once ($_404_template);
					}
				}
				exit(404);
			}

			$object_title = JCommentsObjectHelper::getTitle($object_id, $object_group);
			$object_link = JCommentsObjectHelper::getLink($object_id, $object_group);
			$object_link = JCommentsFactory::getAbsLink($object_link);

			$iso = explode('=', _ISO);
			$charset = strtolower($iso[1]);

			if (JCOMMENTS_JVERSION == '1.5') {
				$offset = $mainframe->getCfg('offset');
			} else {
				$offset = $mainframe->getCfg('offset') + date( 'O' ) / 100;
			}

			$rss = new JoomlaTuneFeed();
			$rss->setOffset($offset);
			$rss->encoding = $charset;
			$rss->title = $object_title;
			$rss->link = $object_link;
			$rss->syndicationURL = $object_link;
			$rss->description = JText::_('COMMENTS_FOR') . ' ' . $rss->title;

			$object_link = str_replace('amp;', '', $object_link);

			$db = & JCommentsFactory::getDBO();

			$query = "SELECT id, title, userid, name, username, date, UNIX_TIMESTAMP(date) as date_ts, comment "
					. "\nFROM #__jcomments "
					. "\nWHERE object_id = '" . $object_id . "'"
					. "\nAND object_group ='" . $object_group . "'"
					. (JCommentsMultilingual::isEnabled() ? "\nAND lang = '" . JCommentsMultilingual::getLanguage() . "'" : "")
					. "\nAND published = '1'"
					. "\nORDER BY date DESC"
					;
			$db->setQuery($query, 0, $limit);
			$rows = $db->loadObjectList();

			foreach ($rows as $row) {
				$comment = JCommentsText::cleanText($row->comment);
				$author = JComments::getCommentAuthorName($row);

				if ($comment != '') {
					$item = new JoomlaTuneFeedItem();
					$item->title = ($row->title != '') ? $row->title : $author . ' ' . JText::_('WROTE');
					$item->link = $object_link . '#comment-' . $row->id;
					$item->description = $comment;
					$item->source = $object_link;

					if (JCOMMENTS_JVERSION == '1.5') {
						$item->date = $row->date;
					} else {
						$date = strtotime($row->date) - $offset * 3600;
						$item->date = date('Y-m-d H:i:s', $date);
					}

					$item->author = $author;
					$rss->addItem($item);
				}
			}

			$rss->display();

			unset($rows, $rss);
			exit();
		}
	}

	function feedLastCommentsGlobal()
	{
		global $mainframe;

		$config = & JCommentsFactory::getConfig();

		if ($config->get('enable_rss') == '1') {

			$object_group = trim(strip_tags(JCommentsInput::getParam($_REQUEST, 'object_group', '')));
			$limit = (int) JCommentsInput::getParam($_GET, 'limit', 100);

			$iso = explode('=', _ISO);
			$charset = strtolower($iso[1]);

			if (JCOMMENTS_JVERSION == '1.5') {
				$offset = $mainframe->getCfg('offset');
			} else {
				$offset = $mainframe->getCfg('offset') + date( 'O' ) / 100;
			}

			$rss = new JoomlaTuneFeed();
			$rss->setOffset($offset);
			$rss->encoding = $charset;
			$rss->title = JText::_('HEADER');
			$rss->link = $mainframe->getCfg('live_site');
			$rss->syndicationURL = $mainframe->getCfg('live_site');
			$rss->description = JText::_('COMMENTS_FOR') . ' ' . $mainframe->getCfg('sitename');

			if ($object_group != '') {
				$groups = explode(',', $object_group);
			} else {
				$groups = array();
			}

			$db = & JCommentsFactory::getDBO();

			$query = "SELECT id, title, object_id, object_group, userid, name, username, date, UNIX_TIMESTAMP(date) as date_ts, comment"
					. "\nFROM #__jcomments "
					. "\nWHERE published = '1'"
					. ((count($groups) > 0) ? "\n   AND (object_group = '" . implode("' OR object_group='", $groups) . "')" : '')
					. (JCommentsMultilingual::isEnabled() ? "\nAND lang = '" . JCommentsMultilingual::getLanguage() . "'" : "")
					. "\nORDER BY date DESC"
					;
			$db->setQuery($query, 0, $limit);
			$rows = $db->loadObjectList();

			foreach ($rows as $row) {
				$comment = JCommentsText::cleanText($row->comment);
				$author = JComments::getCommentAuthorName($row);

				if ($comment != '') {
					$object_title = JCommentsObjectHelper::getTitle($row->object_id, $row->object_group);
					$object_link = JCommentsObjectHelper::getLink($row->object_id, $row->object_group);
					$object_link = str_replace('amp;', '', $object_link);

					$object_link = JCommentsFactory::getAbsLink($object_link);

					$item = new JoomlaTuneFeedItem();
					$item->title = $object_title;
					$item->link = $object_link . '#comment-' . $row->id;
					$item->description = $author . ' ' . JText::_('WROTE') . ' &quot;' . $comment . '&quot;';
					$item->source = $object_link;
					
					if (JCOMMENTS_JVERSION == '1.5') {
						$item->date = $row->date;
					} else {
						$date = strtotime($row->date) - $offset * 3600;
						$item->date = date('Y-m-d H:i:s', $date);
					}

					$item->author = $author;
					$rss->addItem($item);
				}
			}

			$rss->display();

			unset($rows, $rss);
			exit();
		}
	}
}
?>