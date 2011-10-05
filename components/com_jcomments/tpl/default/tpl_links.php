<?php
// ensure this file is being included by a parent file
(defined('_VALID_MOS') OR defined('_JEXEC')) or die('Direct Access to this location is not allowed.');
/*
*
* Template for links (Readmore and Add comment) attached to content items 
* on fronpage, blog-section or blog-category. Used from content mambot called jcomments.content plugin
*
* ������ ��� ����������� ������ ��������� � �������� ����������� � ����-�������� � ����-����������
* ������������ �� ������� jcomments.content
*
*/
class jtt_tpl_links extends JoomlaTuneTemplate
{
	/*
	*
	* Main template function
	*
	* ��������: ���� ������� render �������, ������ ���������� ��������!
	* 
	*/
	function render() 
	{
		$readmoreLink = $this->getReadmoreLink();
		$commentsLink = $this->getCommentsLink();

		if ($readmoreLink != '' || $commentsLink != '') {
?>
<?php echo $readmoreLink; ?> 


<div class="jcomments-links"><?php echo $commentsLink; ?></div>
<?php
        	}
	}

	/*
	*
	* Display Readmore link
	*
	* ���������� ������ "���������" (���� ��� ������ �������������� � ������ ������)
	* ���� � ���������� ������ "���������" ���������, �� ��� ��� ���� ���������� �� �����.
	*
	*/
	function getReadmoreLink() 
	{
		if ($this->getVar('readmore_link_hidden', 0) == 1) {
			return '';
		}

		$link  = $this->getVar('link-readmore');
		$text  = $this->getVar('link-readmore-text');
		$title = $this->getVar('link-readmore-title');

		return '<p class="readmore"><a class="readmore-link" href="'. $link .'" title="' . $title . '"><span class="round"><span>' . $text . '</span></span></a></p>';
	}

	/*
	*
	* Display Comments or Add comments link
	*
	* ����������:
	* - ������ ���� "�������� �����������" ���� ������������ ��� ��� � �������� �������� ������������
	* - ������ ���� "����������� (1)" ���� ������������� ����� ������ � �������� �������� ������������
	* - ����� "����������� (1)" ���� ������������� ����� ������, �� �������� ���������� ������������
	*
	*/
	function getCommentsLink()
	{
		if ($this->getVar('comments_link_hidden') == 1) {
			return '';
		}

		$style = $this->getVar('comments_link_style');
		$count = $this->getVar('comments-count');
		$link  = $this->getVar('link-comment');

		if ($count == 0) {
			return '<a href="' . $link . '#addcomments" class="comment-link">' . JText::_('Add comment') . '</a>';
		} else {
			
			$text = JText::sprintf('Read comments', $count);

			if ($this->getVar('use-plural-forms', 0)) {
				$comments_pf = JText::_('comments_pf');

				if ($comments_pf != '') {
					global $mainframe;
					$pf = JoomlaTuneLanguageTools::getPlural($mainframe->getCfg('lang'), $count, $comments_pf);
					if ($pf != '') {
						$text = JText::sprintf('COMMENTS2', $count, $pf);
					}
				}
			}

			switch($style) {
				case -1:
					return '<span class="comment-link">' . $text . '</span>';
					break;
				default:

					return '<a href="' . $link . '#comments" class="comment-link">' . $text . '</a>';
					break;
			}
		}
	}
}
?>