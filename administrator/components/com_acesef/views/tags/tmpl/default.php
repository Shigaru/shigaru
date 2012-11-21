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

<script language="javascript">
	function apply() {
		var selection = document.getElementById('tags_selection').value;
		var action = document.getElementById('tags_action').value;
		
		if (action == 'sep') {
			return;
		}
		
		if (selection == 'selected' && document.adminForm.boxchecked.value == 0) {
			alert('Please make a selection from the list');
			return;
		}
		
		// If delete, show warning
		if (action == 'delete') {
			if (!confirm('<?php echo JText::_("ACESEF_TOOLBAR_CONFIRM_DELETE"); ?>')) {
				return;
			}
		}
		
		// Call the action
		document.adminForm.selection.value = selection;
		submitbutton(action);
	}
	
	function resetFilters() {
		document.adminForm.search_title.value = '';
		document.adminForm.search_alias.value = '';
		document.adminForm.filter_published.value = '-1';
		document.adminForm.search_order.value = '';
		document.adminForm.search_hits.value = '';
		document.adminForm.search_id.value = '';
		
		document.adminForm.submit();
	}
</script>

<form action="index.php?option=com_acesef&amp;controller=tags&amp;task=view" method="post" name="adminForm" id="adminForm">
	<table class="adminlist">
		<thead>
			<tr>
				<th width="13">
					<?php echo JText::_('ACESEF_COMMON_NUM'); ?>
				</th>
				<th width="20">
					<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
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
				<?php if ($this->AcesefConfig->ui_tags_ordering == 1) { ?>
				<th width="80" nowrap="nowrap">
					<?php echo JHTML::_('grid.sort', JText::_('Order'), 'ordering', $this->lists['order_dir'], $this->lists['order']); ?>
					<?php echo JHTML::_('grid.order', $this->items); ?>
				</th>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_tags_cached == 1) { ?>
				<th width="50" nowrap="nowrap">
					<?php echo JText::_('ACESEF_COMMON_CACHED'); ?>
				</th>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_tags_hits == 1) { ?>
				<th width="30" nowrap="nowrap">
					<?php echo JHTML::_('grid.sort', JText::_('Hits'), 'hits', $this->lists['order_dir'], $this->lists['order']); ?>
				</th>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_tags_id == 1) { ?>
				<th width="30" nowrap="nowrap">
					<?php echo JHTML::_('grid.sort', 'ID', 'id', $this->lists['order_dir'], $this->lists['order']); ?>
				</th>
				<?php }	?>
			</tr>
			<tr>
				<th nowrap="nowrap" colspan="2">
					<?php echo $this->lists['reset_filters']; ?>
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
				<?php if ($this->AcesefConfig->ui_tags_ordering == 1) { ?>
				<th nowrap="nowrap">
					<?php echo $this->lists['search_order']; ?>
				</th>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_tags_cached == 1) { ?>
				<th nowrap="nowrap">
					&nbsp;
				</th>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_tags_hits == 1) { ?>
				<th nowrap="nowrap">
					<?php echo $this->lists['search_hits']; ?>
				</th>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_tags_id == 1) { ?>
				<th nowrap="nowrap">
					<?php echo $this->lists['search_id']; ?>
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
			
			// Cache icon
			if ($this->AcesefConfig->ui_tags_cached == 1) {
				$cached = false;
				if (isset($this->cache[$row->title])) {
					$cached = true;
				}
				$cached_icon = $this->getIcon($i, $cached ? 'uncache' : 'cache', $cached ? 'icon-16-cache-on.png' : 'icon-16-cache-off.png');
			}
			
			$map_link = JRoute::_('index.php?option=com_acesef&controller=tagsmap&task=view&tag='.$row->title.'&amp;tmpl=component');
			
			$edit_link = JRoute::_('index.php?option=com_acesef&controller=tags&task=edit&cid[]='.$row->id.'&amp;tmpl=component');
			
			?>
			<tr class="<?php echo "row$k"; ?>">
				<td>
					<?php echo $this->pagination->getRowOffset($i); ?>
				</td>
				<td>
					<?php echo $checked; ?>
				</td>
				<td>
					<a href="<?php echo $edit_link; ?>" style="cursor:pointer" class="modal" rel="{handler: 'iframe', size: {x: 600, y: 350}}">
						<?php echo $row->title; ?></a>
					</a>
				</td>
				<td>
					<a href="<?php echo $edit_link; ?>" style="cursor:pointer" class="modal" rel="{handler: 'iframe', size: {x: 600, y: 350}}">
						<?php echo $row->alias; ?>
					</a>
				</td>
				<td align="center">
					<a href="<?php echo $map_link; ?>" style="cursor:pointer" class="modal" rel="{handler: 'iframe', size: {x: 700, y: 500}}">
						<?php echo $urls; ?>&nbsp;<img src="components/com_acesef/assets/images/icon-10-external.png" />
					</a>
				</td>
				<?php if ($this->AcesefConfig->ui_tags_published == 1) { ?>
				<td align="center">
					<?php echo $published_icon;?>
				</td>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_tags_ordering == 1) { ?>
				<td align="right">
					<span><?php echo $this->pagination->orderUpIcon($i, true, 'orderup', 'Move Up', $this->ordering); ?></span>
					<span><?php echo $this->pagination->orderDownIcon($i, $n, true, 'orderdown', 'Move Down', $this->ordering); ?></span>
					<?php $disabled = $this->ordering ?  '' : 'disabled="disabled"'; ?>
					<input type="text" name="order[]" size="5" value="<?php echo $row->ordering; ?>" <?php echo $disabled ?> class="text_area" style="text-align: center" />
				</td>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_tags_cached == 1) { ?>
				<td align="center">
					<?php echo $cached_icon;?>
				</td>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_tags_hits == 1) { ?>
				<td align="center">
					<?php echo $row->hits;?>
				</td>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_tags_id == 1) { ?>
				<td align="center">
					<?php echo $row->id;?>
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

	<input type="hidden" name="option" value="com_acesef" />
	<input type="hidden" name="controller" value="tags" />
	<input type="hidden" name="task" value="view" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_dir']; ?>" />
	<input type="hidden" name="selection" value="selected" />
	<?php echo JHTML::_('form.token'); ?>
</form>