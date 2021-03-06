<?php
/**
 * CB JComments - CommunityBuilder plugin displays a tab with the last user comments
 *
 * @version 1.0
 * @package JComments plugin for CommunityBuilder
 * @author smart (smart@joomlatune.ru)
 * @copyright (C) 2006-2007 by smart (http://www.joomlatune.ru)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
 **/

(defined('_VALID_MOS') OR defined('_JEXEC')) or die('Direct Access to this location is not allowed.');

class JCommentsTab extends cbTabHandler
{
	function JCommentsTab()
	{
		$this->cbTabHandler();
	}
	
	function getDisplayTab($tab, $user, $ui)
	{
		global $mainframe, $my;

		$params = $this->params;
		$params->def('count', 5);
		$params->def('length', 20);
		$params->def('object_group', 'com_content');

		$comments = $mainframe->getCfg('absolute_path') . '/components/com_jcomments/jcomments.php';
		$content = '';

		if (is_file($comments)) {
			require_once($comments);

			$dbo = & JCommentsFactory::getDBO();

			$object_group = str_replace(' ', '',trim($params->get('object_group')));
			$count = (int) $params->get('count');

			if ($object_group == 'com_content') {

				$where = array();
				$where[] = "cc.published = 1";
				$where[] = "cc.object_group = 'com_content'";
				$where[] = "cc.userid = '$user->id'";
				$where[] = "c.access <= '$my->gid'";
				$where[] = "(c.publish_up = '0000-00-00 00:00:00' OR c.publish_up <= NOW())";
				$where[] = "(c.publish_down = '0000-00-00 00:00:00' OR c.publish_down >= NOW())";

				$query = "SELECT cc.id, cc.comment, cc.object_id, cc.object_group, cc.date, c.title"
					. "\n FROM #__jcomments AS cc"
					. "\n LEFT JOIN #__content AS c ON c.id = cc.object_id"
					. "\n WHERE " . implode(' AND ', $where)
					. "\n ORDER BY cc.date DESC"
					;
			} else {
				$groups = explode( ',', $object_group );

				$query = "SELECT cc.id, cc.comment, cc.object_id, cc.object_group, cc.date, '' as title "
					. "\n FROM #__jcomments AS cc"
					. "\n WHERE cc.published = 1" 
					. "\n AND cc.userid = '$user->id'"
					. (count($groups) ? "\n   AND (cc.object_group = '" . implode("' OR cc.object_group='", $groups) . "')" : '')
					. "\n ORDER BY cc.date DESC"
					;
			}

			$dbo->setQuery($query, 0, $count);
			$rows = $dbo->loadObjectList();
			$content = '';
			
			if (sizeof($rows)) {
				//var_dump($rows);
				$content .= '<ul class="jclist">'."\n";

				$bbcode = & JCommentsFactory::getBBCode();
				$smiles = & JCommentsFactory::getSmiles();

			        $smilesList = $smiles->get();

				$label4more = _UE_MORE;
				$maxlen = intval( $params->get( 'length' ));

				$lastArticleId = -1;
				$c = true;
				foreach ($rows as $row) {
					$thumbnail='';
					$query = 'SELECT a.thumbnail'
						. ' FROM #__hwdvidsvideos AS a'
						. ' WHERE a.id = '.$row->object_id
						. ' AND a.published = 1'
						. ' AND a.approved = "yes"'
						. ' ORDER BY a.date_uploaded'
						. ' LIMIT 0, 1'
						;
					$dbo->SetQuery($query);
					$group_video = $dbo->loadObject();
					http://localhost/shigaru/hwdvideos/thumbs/tp-219.jpg
					if($group_video->thumbnail)
						$thumbnail = '<img src="'.JURI::base()."hwdvideos/thumbs/".$group_video->thumbnail.'" alt="'.$label4more.'" border="0" width="100" height="75" title="" class="thumb0">';
						else
							$thumbnail = '<img src="'.JURI::base()."hwdvideos/thumbs/default_thumb.jpg".'" alt="'.$label4more.'" border="0" width="100" height="75" title="" class="thumb0">';;
					$link  = JCommentsObjectHelper::getLink($row->object_id, $row->object_group) . '#comment-' . $row->id;

					if ($row->title == '') {
						$row->title  = JCommentsObjectHelper::getTitle($row->object_id, $row->object_group);
					}

					$title = JCommentsText::cleanText($row->comment);
					$title = JCommentsText::substr($title, $maxlen);

					$link_title = str_replace('"', '', $title);
					$link_text = $title;

					switch($params->get('showsmiles')) {
						case 1:
							$link_text = $smiles->replace($link_text);
							break;
						case 2:
							$link_text = $smiles->strip($link_text);
							break;
					}

					if ($row->object_id != $lastArticleId) {
					        if ($lastArticleId != -1) {
					        	$content .= '</ul></li>';
					        }

						$content .= '<li '.(($c = !$c)?' class="odd"':'class="even"').'>' . $row->title .$thumbnail. '<ul>';
						$lastArticleId = $row->object_id;
					}

					$content .= '<li>'
							
							. '<p>' . $link_text . '</p>'
							. date('Y-m-d H:i:s', strtotime($row->date))
							. '<a href="' . $link . '" title="' . $link_title . '">' . $label4more . '</a></li>'."\n";

				}
				$content .= '</ul>'."\n";
			}else{
				$content = 'NO comments for this user';
				}
		}
		return $content;
	}
}	
?>
