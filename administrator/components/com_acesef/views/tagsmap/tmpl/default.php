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
		document.adminForm.url_sef.value = '';
		
		document.adminForm.submit();
	}
</script>

<form action="index.php?option=com_acesef&amp;controller=tagsmap&amp;task=view&amp;tag=<?php echo JRequest::getString('tag');?>&amp;tmpl=component" method="post" name="adminForm" id="adminForm">
	<table class="adminlist">
		<tbody>
			<tr>
				<td align="left">
					<h3><?php echo substr(trim(JRequest::getString('tag', null)), 0, 173); ?></h3>
				</td>
				<td width="220px" align="right">
					<?php echo $this->toolbar->action; ?>
					<?php echo $this->toolbar->selection; ?>
					<?php echo $this->toolbar->button; ?>
				</td>
			</tr>
		</tbody>
	</table>
	<table class="adminlist">
		<thead>
			<tr>
				<th width="13">
					<?php echo JText::_('ACESEF_COMMON_NUM'); ?>
				</th>
				<th width="20">
					<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
				</th>
				<th class="title">
					<?php echo JHTML::_('grid.sort', JText::_('ACESEF_URL_SEF_COMMON_URL_SEF'), 'u.url_sef', $this->lists['order_dir'], $this->lists['order']); ?>
				</th>
				<th width="50" nowrap="nowrap">
					<?php echo JText::_('Published'); ?>
				</th>
			</tr>
			<tr>
				<th nowrap="nowrap" colspan="2">
					<?php echo $this->lists['reset_filters']; ?>
				</th>
				<th nowrap="nowrap">
					<?php echo $this->lists['search_url']; ?>
				</th>
				<th nowrap="nowrap">
					&nbsp;
				</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$k = 0;
		$n = count($this->items);
		for ($i=0; $i < $n; $i++) {
			$row = &$this->items[$i];
			$checked = JHTML::_('grid.id', $i, $row->id);

			// Published icon
			$published_icon = "";
			$tag = JRequest::getString('tag', null);
			if ($tag) {
				$found = AceDatabase::loadResult("SELECT url_sef FROM #__acesef_tags_map WHERE url_sef = '{$row->url_sef}' AND tag = '{$tag}'");
				$published_icon = $this->getIcon($i, $found ? 'publish' : 'unpublish', $found ? 'icon-16-published-off.png' : 'icon-16-published-on.png');
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
					<?php echo $row->url_sef; ?>
				</td>
				<td align="center">
					<?php echo $published_icon;?>
				</td>
			</tr>
			<?php
			$k = 1 - $k;
		}
		?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="4">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
	</table>

	<input type="hidden" name="option" value="com_acesef" />
	<input type="hidden" name="controller" value="tagsmap" />
	<input type="hidden" name="task" value="view" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_dir']; ?>" />
	<input type="hidden" name="selection" value="selected" />
	<input type="hidden" name="tag_id" value="<?php echo $this->tag_id; ?>" />
	<?php echo JHTML::_('form.token'); ?>
</form>