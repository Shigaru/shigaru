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
		var selection = document.getElementById('bookmarks_selection').value;
		var action = document.getElementById('bookmarks_action').value;
		
		if (action == 'sep') {
			return;
		}
		
		if (selection == 'selected' && document.adminForm.boxchecked.value == 0) {
			alert('Please make a selection from the list');
			return;
		}
		
		// If delete, show warning
		if (action == 'delete') {
			if (!confirm('Are you sure you want to delete records?')) {
				return;
			}
		}
		
		// Call the action
		document.adminForm.selection.value = selection;
		submitbutton(action);
	}
	
	function resetFilters() {
		document.adminForm.search_name.value = '';
		document.adminForm.filter_type.value = '-1';
		document.adminForm.search_ph.value = '';
		document.adminForm.filter_published.value = '-1';
		document.adminForm.search_id.value = '';
		
		document.adminForm.submit();
	}
</script>

<form action="index.php?option=com_acesef&amp;controller=bookmarks&amp;task=view" method="post" name="adminForm" id="adminForm">
	<table class="adminlist">
		<thead>
			<tr>
				<th width="13" nowrap="nowrap">
					<?php echo JText::_('ACESEF_COMMON_NUM'); ?>
				</th>
				<th width="20" nowrap="nowrap">
					<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
				</th>
				<th nowrap="nowrap">
					<?php echo JHTML::_('grid.sort', JText::_('ACESEF_BOOKMARKS_NAME'), 'name', $this->lists['order_dir'], $this->lists['order']); ?>
				</th>
				<th width="60" nowrap="nowrap">
					<?php echo JHTML::_('grid.sort', JText::_('ACESEF_BOOKMARKS_TYPE'), 'btype', $this->lists['order_dir'], $this->lists['order']); ?>
				</th>
				<th width="140" nowrap="nowrap">
					<?php echo JHTML::_('grid.sort', JText::_('ACESEF_BOOKMARKS_PLACEHOLDER'), 'placeholder', $this->lists['order_dir'], $this->lists['order']); ?>
				</th>
				<?php if ($this->AcesefConfig->ui_bookmarks_published == 1) { ?>
				<th width="60" nowrap="nowrap">
					<?php echo JHTML::_('grid.sort', JText::_('Published'), 'published', $this->lists['order_dir'], $this->lists['order']); ?>
				</th>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_bookmarks_id == 1) { ?>
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
					<?php echo $this->lists['search_name']; ?>
				</th>
				<th nowrap="nowrap">
					<?php echo $this->lists['type_list']; ?>
				</th>
				<th nowrap="nowrap">
					<?php echo $this->lists['search_ph']; ?>
				</th>
				<?php if ($this->AcesefConfig->ui_bookmarks_published == 1) { ?>
				<th nowrap="nowrap">
					<?php echo $this->lists['published_list']; ?>
				</th>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_bookmarks_id == 1) { ?>
				<th nowrap="nowrap">
					<?php echo $this->lists['search_id']; ?>
				</th>
				<?php }	?>
			</tr>
		</thead>
		<tbody>
		<?php
		$k = 0;
		for ($i=0, $n=count($this->items); $i < $n; $i++) {
			$row = &$this->items[$i];
			$checked = JHTML::_('grid.id', $i, $row->id);
			
			switch ($row->btype) {
				case 'icon':
					$type = JText::_('ACESEF_BOOKMARKS_TYPE_1');
					break;
				case 'iconset':
					$type = JText::_('ACESEF_BOOKMARKS_TYPE_2');
					break;
				case 'badge':
					$type = JText::_('ACESEF_BOOKMARKS_TYPE_3');
					break;
			}
			
			// Published icon
			if ($this->AcesefConfig->ui_bookmarks_published == 1) {
				$published_icon = $this->getIcon($i, $row->published ? 'unpublish' : 'publish', $row->published ? 'icon-16-published-on.png' : 'icon-16-published-off.png');
			}
			
			?>
			<tr class="<?php echo "row$k"; ?>">
				<td>
					<?php echo $this->pagination->getRowOffset($i); ?>
				</td>
				<td>
					<?php echo $checked; ?>
				</td>
				<td>
					<?php
					$link = JRoute::_('index.php?option=com_acesef&controller=bookmarks&task=edit&cid[]='.$row->id.'&amp;tmpl=component');?>
					<a href="<?php echo $link; ?>" style="cursor:pointer" class="modal" rel="{handler: 'iframe', size: {x: 600, y: 370}}">
						<?php echo $row->name; ?>
					</a>
				</td>
				<td align="center">
					<?php echo $type; ?>
				</td>
				<td>
					<?php echo $row->placeholder; ?>
				</td>
				<?php if ($this->AcesefConfig->ui_bookmarks_published == 1) { ?>
				<td align="center">
					<?php echo $published_icon;?>
				</td>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_bookmarks_id == 1) { ?>
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
	<input type="hidden" name="controller" value="bookmarks" />
	<input type="hidden" name="task" value="view" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_dir']; ?>" />
	<input type="hidden" name="selection" value="selected" />
	<?php echo JHTML::_('form.token'); ?>
</form>