<?php
/**
 * CB JComments - CommunityBuilder plugin displays a tab with the last user comments
 *
 * @version 2.0
 * @package JComments plugin for CommunityBuilder
 * @author smart (smart@joomlatune.ru)
 * @copyright (C) 2006-2012 by smart (http://www.joomlatune.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
 **/

if (!(defined('_VALID_CB') || defined('_JEXEC'))) {die;}

class JCommentsMyLatestComments extends cbTabHandler
{
	function JCommentsMyLatestComments()
	{
		$this->cbTabHandler();
	}
	
	function getDisplayTab($tab, $user, $ui)
	{
		$content = '';

		$comments = JPATH_SITE . '/components/com_jcomments/jcomments.php';

		if (is_file($comments)) {
			require_once($comments);


			$params = $this->params;
			$params->def('count', 5);
			$params->def('limit_comment_text', 100);
			// $params->def('source', 'com_content');

			$db = JFactory::getDBO();

			$source = trim(str_replace(' ', '', $params->get('source')));
			if (!is_array($source)) {
				$source = explode(',', $source);
			}

			$count = (int) $params->get('count');

			if (version_compare(JVERSION,'1.6.0','ge')) {
				$access = array_unique(JAccess::getAuthorisedViewLevels(JFactory::getUser()->get('id')));
				$access[] = 0; // for backward compability
			} else {
				$access = JFactory::getUser()->get('aid', 0);
			}

			$where = array();
			$where[] = 'c.published = 1';
			$where[] = 'c.deleted = 0';
			$where[] = "c.userid = '$user->id'";
			$where[] = "o.link <> ''";
			$where[] = (is_array($access) ? "o.access IN (" . implode(',', $access) . ")" : " o.access <= " . (int) $access);

			$joins = array();

			if (count($source) == 1 && $source[0] == 'com_content') {
				$date = JFactory::getDate();
				$now = $date->toMySQL();

				$joins[] = 'JOIN #__content AS cc ON cc.id = o.object_id';
				$joins[] = 'LEFT JOIN #__categories AS ct ON ct.id = cc.catid';

				$where[] = "c.object_group = 'com_content'";
				$where[] = "(cc.publish_up = '0000-00-00 00:00:00' OR cc.publish_up <= '$now')";
				$where[] = "(cc.publish_down = '0000-00-00 00:00:00' OR cc.publish_down >= '$now')";
			} else if (count($source)) {
				$where[] = "c.object_group in ('" . implode("','", $source) . "')";
			}

			$query = "SELECT c.id, c.userid, c.comment, c.title, c.name, c.username, c.email, c.date, c.object_id, c.object_group, '' as avatar"
				. ", o.title AS object_title, o.link AS object_link, o.access AS object_access, o.userid AS object_owner"
				. " FROM #__jcomments AS c"
				. " JOIN #__jcomments_objects AS o ON c.object_id = o.object_id AND c.object_group = o.object_group AND c.lang = o.lang"
				. (count($joins) ? ' ' . implode(' ', $joins) : '')
				. (count($where) ? ' WHERE  ' . implode(' AND ', $where) : '')
				. " ORDER BY c.date DESC"
				;

			$db->setQuery($query, 0, $count);
			$list = $db->loadObjectList();

			if (count($list)) {

				$document = JFactory::getDocument();
				$document->addStylesheet('components/com_comprofiler/plugin/user/plug_cbjcomments/css/style.css');

				$config = JCommentsFactory::getConfig();
				$bbcode = JCommentsFactory::getBBCode();
				$smiles = JCommentsFactory::getSmiles();

				$show_comment_title = $params->get('show_comment_title', 0);
				$show_readmore = $params->get('show_readmore', 0);
				$show_smiles = $params->get('show_smiles', 0);
				$limit_comment_text = $params->get('limit_comment_text', 100);
				$date_format = $params->get('date_format', 'd.m.Y H:i');

				// prepare comments list
				foreach($list as &$item) {

					$item->displayObjectTitle = $item->object_title;

					$item->displayCommentDate = JHTML::_('date', $item->date, $date_format);
					$item->displayCommentTitle = JCommentsText::censor($item->title);
					$item->displayCommentLink = $item->object_link . '#comment-' . $item->id;

					$text = JCommentsText::censor($item->comment);
					$text = $bbcode->filter($text, true);
					$text = JCommentsText::fixLongWords($text, $config->getInt('word_maxlength'), ' ');
					$text = JCommentsText::cleanText($text);

					if ($limit_comment_text && JString::strlen($text) > $limit_comment_text) {
						$text = self::truncateText($text, $limit_comment_text - 1);
					}

					switch($show_smiles) {
						case 1:
							$text = $smiles->replace($text);
							break;
						case 2:
							$text = $smiles->strip($text);
							break;
					}

					$item->displayCommentText = $text;
					$item->readmoreText = $params->get( 'readmore', 'Readmore...' );
				}

				// group comments by objects
				$list = self::groupBy($list, 'object_title');

				$content = '<ul class="cb-jcomments-latest">';

				// display comments list
				foreach ($list as $group_name => $group)
				{
					$content .= '<li>';

					if ( $group[0]->object_link != '') {
						$content .= '<h4><a href="' . $group[0]->object_link . '">' . $group_name . '</a></h4>';
					} else {
						$content .= $group_name;
					}

					$content .= '<ul>';
					
					foreach ($group as $item) {

						$content .= '<li>';
						$content .= '<div class="comment rounded">';
						$content .= '<span class="date">' . $item->displayCommentDate . '</span>';
					
						if ($show_comment_title && $item->displayCommentTitle) {
							$content .= '<a class="title" href="' . $item->displayCommentLink . '">';
							$content .= $item->displayCommentTitle;
							$content .= '</a>';
						}

						$content .= '<div>';
						$content .= $item->displayCommentText;

						if ($show_readmore) {
							$content .= '<p class="cb-jcomments-readmore">';
							$content .= '<a href="' . $item->displayCommentLink . '">' . $item->readmoreText . '</a>';
							$content .= '</p>';
						}

						$content .= '</div>';
						$content .= '</div>';
						$content .= '</li>';
					}
					$content .= '</ul>';
					$content .= '</li>';
				}
				$content .= '</ul>';
			}
		}
		return $content;
	}

	protected static function truncateText($string, $limit)
	{
		$prevSpace = JString::strrpos(JString::substr($string, 0, $limit), ' ');
		$prevLength = $prevSpace !== false ? $limit - max(0, $prevSpace) : $limit;

		$nextSpace = JString::strpos($string, ' ', $limit + 1);
		$nextLength = $nextSpace !== false ? max($nextSpace, $limit) - $limit : $limit;

		$length = 0;

		if ($prevSpace !== false && $nextSpace !== false) {
			$length = $prevLength < $nextLength ? $prevSpace : $nextSpace;
		} elseif ($prevSpace !== false && $nextSpace === false) {
			$length = $length - $prevLength < $length*0.1 ? $prevSpace : $length;
		} elseif ($prevSpace === false && $nextSpace !== false) {
			$length = $nextLength - $length < $length*0.1 ? $nextSpace : $length;
		}

		if ($length > 0) {
			$limit = $length;
		}

		$text = JString::substr($string, 0, $limit);
		if (!preg_match('#(\.|\?|\!)$#ismu', $text)) {
			$text = preg_replace('#\s?(\,|\;|\:|\-)$#ismu', '', $text) . ' ...';
		}

		return $text;
	}

	protected static function groupBy($list, $fieldName, $grouping_direction = 'ksort')
	{
		$grouped = array();

		if (!is_array($list)) {
			if ($list == '') {
				return $grouped;
			}

			$list = array($list);
		}

		foreach($list as $key => $item) {
			if (!isset($grouped[$item->$fieldName])) {
				$grouped[$item->$fieldName] = array();
			}
			$grouped[$item->$fieldName][] = $item;
			unset($list[$key]);
		}

		$grouping_direction($grouped);

		return $grouped;
	}
}

class JCommentsProfileComments extends cbTabHandler
{
	function JCommentsProfileComments()
	{
		$this->cbTabHandler();
	}
	
	function getDisplayTab($tab, $user, $ui)
	{
		$content = '';

		$comments = JPATH_SITE . '/components/com_jcomments/jcomments.php';
		
		if (is_file($comments)) {
			require_once($comments);
			$content = JComments::show($user->id,'com_comprofiler');
		}

		return $content;
	}
}
?>