<?php
// ensure this file is being included by a parent file
(defined('_VALID_MOS') OR defined('_JEXEC')) or die('Direct Access to this location is not allowed.');
/*
*
* Comments list template. Displays comments list with header and navigation (pagination) 
*
* Шаблон для отображения списка комментариев. 
*
* Данный шаблон отображает непосредственно список.
* Шаблон отображения одиночного комментария (элемента списка) находится в файле tpl_comment.php
*
* В данный шаблон уже сформированные элементы приходят в переменной comments-items, 
* либо в comment-item (если требуется отобразить один элемент списка, см. комментарии ниже)
*
*/
class jtt_tpl_tree extends JoomlaTuneTemplate
{
	function render() 
	{
		$comments = $this->getVar('comments-items');

		if (isset($comments)) {
			$this->getHeader();
?>
<div class="comments-list" id="comments-list-0">
<?php
			$i = 0;
			
			$count = count($comments);
			$currentLevel = 0;
		
			foreach($comments as $id => $comment) {
				if ($currentLevel < $comment->level) {
?>
        </div>
	<div class="comments-list" id="comments-list-<?php echo $comment->parent; ?>">
<?php				
				} else {
					$j = 0;
	
					if ($currentLevel >= $comment->level) {
						$j = $currentLevel - $comment->level;
					} else if ($comment->level > 0 && $i == $count - 1) {
						$j = $comment->level;
					}

					while($j > 0) {
?>
	</div>
<?php
						$j--;
					}
				}
?>
		<div class="<?php echo ($i%2 ? 'odd' : 'even'); ?>" id="comment-item-<?php echo $id; ?>">
<?php
				echo $comment->html;

				if ($comment->children == 0) {
?>
		</div>
<?php
				}
				
				if ($comment->level > 0 && $i == $count - 1) {
					$j = $comment->level;
				}

				while($j > 0) {
?>
	</div>
<?php                           	$j--;
				}

				$i++;
				$currentLevel = $comment->level;
			}
?>
</div>
<div id="comments-list-footer"><?php echo $this->getFooter();?></div>
<?php
		} else {
			// display single comment item (works when new comment is added)

			// Этот фрагмент шаблона работает, если добавлен новый комментарий
			// и отключена страничная навигация. В этом случае обновляется не весь список,
			// а только одна строка добавляется в список.
			$comment = $this->getVar('comment-item');

			if (isset($comment)) {
				$i = $this->getVar('comment-modulo');
				$id = $this->getVar('comment-id');
?>
	<div class="<?php echo ($i%2 ? 'odd' : 'even'); ?>" id="comment-item-<?php echo $id; ?>"><?php echo $comment; ?></div>
<?php
			} else {
?>
<div class="comments-list" id="comments-list-0"></div>
<?php
			}
		}

	}

	/*
	*
	* Display comments header and small buttons: rss and refresh
	*
	* Отображает заголовок комментариев и 2 маленькие иконки: RSS и Refresh. По клику на иконке Refresh вызовется
	* функция jcomments.showPage, которая просто запросит с сервера текущую страницу списка комментариев.
	*
	*/
	function getHeader()
	{
		$object_id = $this->getVar('comment-object_id');
		$object_group = $this->getVar('comment-object_group');

		$btnRSS = '';
		$btnRefresh = '';
		
		if ($this->getVar('comments-refresh', 1) == 1) {
			$btnRefresh = '<a class="refresh" href="#" title="'.JText::_('REFRESH').'" onclick="jcomments.showPage('.$object_id.',\''. $object_group . '\',0);return false;">&nbsp;</a>';
		}

		if ($this->getVar('comments-rss') == 1) {
			$link = $this->getVar('rssurl');
			$btnRSS = '<a class="rss" href="'.$link.'" title="'.JText::_('RSS').'" target="_blank">&nbsp;</a>';
		}
?>
<h4><?php echo JText::_('HEADER'); ?><?php echo $btnRSS; ?><?php echo $btnRefresh; ?></h4>
<?php
	}

	/*
	*
	* Display RSS feed and/or Refresh buttons after comments list
	*
	* Отображает ссылку с иконкой на RSS-ленту и/или ссылку "Обновить список комментариев"
	* после списка комментариев текущего объекта. Ссылка RSS отображается только в том случае, 
	* если в настройках компонента разрешен экспорт комментариев в RSS.
	*
	*/
	function getFooter()
	{
		$footer = '';

		$object_id = $this->getVar('comment-object_id');
		$object_group = $this->getVar('comment-object_group');

		$lines = array();

		if ($this->getVar('comments-refresh', 1) == 1) {
			$lines[] = '<a class="refresh" href="#" title="'.JText::_('REFRESH').'" onclick="jcomments.showPage('.$object_id.',\''. $object_group . '\',0);return false;">'.JText::_('REFRESH').'</a>';
		}

		if ($this->getVar('comments-rss', 1) == 1) {
			$link = $this->getVar('rssurl');
			$lines[] = '<a class="rss" href="'.$link.'" target="_blank">'.JText::_('RSS').'</a>';
		}

		if ($this->getVar('comments-can-subscribe', 0) == 1) {
			$isSubscribed = $this->getVar('comments-user-subscribed', 0);

			$text = $isSubscribed ? JText::_('Unsubscribe') : JText::_('Subscribe');
			$func = $isSubscribed ? 'unsubscribe' : 'subscribe';

			$lines[] = '<a id="comments-subscription" class="subscribe" href="#" title="' . $text . '" onclick="jcomments.' . $func . '('.$object_id.',\''. $object_group . '\');return false;">'. $text .'</a>';
		}

		if (count($lines)) {
			$footer = implode('<br />', $lines);			
		}

		return $footer;
	}
}
?>