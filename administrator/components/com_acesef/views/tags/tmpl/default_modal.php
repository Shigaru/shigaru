<?php
/**
* @version		1.5.0
* @package		AceSEF
* @subpackage	AceSEF
* @copyright	2009-2012 JoomAce LLC, www.joomace.net
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
*/

// No Permission
defined('_JEXEC') or die('Restricted access');

?>

<form action="index.php?option=com_acesef&amp;controller=tags&amp;task=modal&amp;tmpl=component&amp;tag=title" method="post" name="adminForm" id="adminForm">
	<table class="adminlist">
		<thead>
			<tr>
				<th width="13">
					<?php echo JText::_('ACESEF_COMMON_NUM'); ?>
				</th>
				<th width="45%" class="title">
					<?php echo JHTML::_('grid.sort', JText::_('ACESEF_COMMON_TITLE'), 'title', $this->lists['order_dir'], $this->lists['order']); ?>
				</th>
				<th width="20%" class="title">
					<?php echo JHTML::_('grid.sort', JText::_('Alias'), 'alias', $this->lists['order_dir'], $this->lists['order']); ?>
				</th>
				<th width="50" class="title">
					<?php echo JText::_('Items'); ?>
				</th>
				<?php if ($this->AcesefConfig->ui_tags_published == 1) { ?>
				<th width="50" nowrap="nowrap">
					<?php echo JHTML::_('grid.sort', JText::_('Published'), 'published', $this->lists['order_dir'], $this->lists['order']); ?>
				</th>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_tags_hits == 1) { ?>
				<th width="30" nowrap="nowrap">
					<?php echo JHTML::_('grid.sort', JText::_('Hits'), 'hits', $this->lists['order_dir'], $this->lists['order']); ?>
				</th>
				<?php }	?>
			</tr>
			<tr>
				<th nowrap="nowrap">
					&nbsp;
				</th>
				<th nowrap="nowrap">
					<?php echo $this->lists['search_title']; ?>
				</th>
				<th nowrap="nowrap">
					<?php echo $this->lists['search_alias']; ?>
				</th>
				<th nowrap="nowrap">
					&nbsp;
				</th>
				<?php if ($this->AcesefConfig->ui_tags_published == 1) { ?>
				<th nowrap="nowrap">
					<?php echo $this->lists['published_list']; ?>
				</th>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_tags_hits == 1) { ?>
				<th nowrap="nowrap">
					<?php echo $this->lists['search_hits']; ?>
				</th>
				<?php }	?>
			</tr>
		</thead>
		<tbody>
		<?php
		$k = 0;
		$n = count($this->items);
		for ($i=0; $i < $n; $i++) {
			$row = &$this->items[$i];
			$checked = JHTML::_('grid.id', $i, $row->id);
			
			// URLs
			$urls = 0;
			if (isset($this->counts[$row->id])) {
				$urls = $this->counts[$row->id];
			}
			
			// Published icon
			if ($this->AcesefConfig->ui_tags_published == 1) {
				$published_icon = $this->getIcon($i, $row->published ? 'unpublish' : 'publish', $row->published ? 'icon-16-published-on.png' : 'icon-16-published-off.png');
			}
			
			?>
			<tr class="<?php echo "row$k"; ?>">
				<td>
					<?php echo $this->pagination->getRowOffset($i); ?>
				</td>
				<td>
					<a style="cursor: pointer;" onclick="window.parent.selectTag('<?php echo str_replace(array("'", "\""), array("\\'", ""),$row->title); ?>', '<?php echo JRequest::getVar('tag'); ?>');">
						<?php echo htmlspecialchars($row->title, ENT_QUOTES, 'UTF-8'); ?>
					</a>
				</td>
				<td>
					<a style="cursor: pointer;" onclick="window.parent.selectTag('<?php echo str_replace(array("'", "\""), array("\\'", ""),$row->title); ?>', '<?php echo JRequest::getVar('tag'); ?>');">
						<?php echo htmlspecialchars($row->alias, ENT_QUOTES, 'UTF-8'); ?>
					</a>
				</td>
				<td align="center">
					<?php echo $urls; ?>
				</td>
				<?php if ($this->AcesefConfig->ui_tags_published == 1) { ?>
				<td align="center">
					<?php echo $published_icon;?>
				</td>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_tags_hits == 1) { ?>
				<td align="center">
					<?php echo $row->hits;?>
				</td>
				<?php }	?>
			</tr>
			<?php
			$k = 1 - $k;
		}
		?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="<?php echo $this->colspan;?>">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
	</table>

	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_dir']; ?>" />
</form>