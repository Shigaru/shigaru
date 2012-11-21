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
		var selection = document.getElementById('ilinks_selection').value;
		var action = document.getElementById('ilinks_action').value;
		
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
	
	/*function ajaxFunction(func, field){
		new Ajax('<?php echo JRoute::_('index.php?option=com_acesef&controller=ilinks&format=raw&task=nofollow', false); ?>',
			{method: 'get',
			onRequest: document.getElementById(field).innerHTML = '<img src="components/com_acesef/images/indicator.gif" />,
			update: $(field)
			}).request();
	}*/
	
	function resetFilters() {
		document.adminForm.search_word.value = '';
		document.adminForm.search_link.value = '';
		document.adminForm.filter_published.value = '-1';
		document.adminForm.filter_nofollow.value = '-1';
		document.adminForm.filter_blank.value = '-1';
		document.adminForm.filter_limit_val.value = '0';
		document.adminForm.search_limit.value = '';
		document.adminForm.search_id.value = '';
		
		document.adminForm.submit();
	}
</script>

<form action="index.php?option=com_acesef&amp;controller=ilinks&amp;task=view" method="post" name="adminForm" id="adminForm">
	<table class="adminlist">
		<thead>
			<tr>
				<th width="13">
					<?php echo JText::_('ACESEF_COMMON_NUM'); ?>
				</th>
				<th width="20">
					<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
				</th>
				<th width="40%" class="title">
					<?php echo JHTML::_('grid.sort', JText::_('ACESEF_ILINKS_LINK'), 'link', $this->lists['order_dir'], $this->lists['order']); ?>
				</th>
				<th width="40%" class="title">
					<?php echo JHTML::_('grid.sort', JText::_('ACESEF_ILINKS_WORD'), 'word', $this->lists['order_dir'], $this->lists['order']); ?>
				</th>
				<?php if ($this->AcesefConfig->ui_ilinks_published == 1) { ?>
				<th width="50" nowrap="nowrap">
					<?php echo JHTML::_('grid.sort', JText::_('Published'), 'published', $this->lists['order_dir'], $this->lists['order']); ?>
				</th>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_ilinks_nofollow == 1) { ?>
				<th width="50" nowrap="nowrap">
					<?php echo JHTML::_('grid.sort', JText::_('ACESEF_ILINKS_NOFOLLOW'), 'nofollow', $this->lists['order_dir'], $this->lists['order']); ?>
				</th>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_ilinks_blank == 1) { ?>
				<th width="50" nowrap="nowrap">
					<?php echo JHTML::_('grid.sort', JText::_('ACESEF_ILINKS_BLANK'), 'iblank', $this->lists['order_dir'], $this->lists['order']); ?>
				</th>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_ilinks_limit == 1) { ?>
				<th width="60" nowrap="nowrap">
					<?php echo JHTML::_('grid.sort', JText::_('ACESEF_ILINKS_LIMIT'), 'ilimit', $this->lists['order_dir'], $this->lists['order']); ?>
				</th>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_ilinks_cached == 1) { ?>
				<th width="50" nowrap="nowrap">
					<?php echo JText::_('ACESEF_COMMON_CACHED'); ?>
				</th>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_ilinks_id == 1) { ?>
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
					<?php echo $this->lists['search_link']; ?>
				</th>
				<th nowrap="nowrap">
					<?php echo $this->lists['search_word']; ?>
				</th>
				<?php if ($this->AcesefConfig->ui_ilinks_published == 1) { ?>
				<th nowrap="nowrap">
					<?php echo $this->lists['published_list']; ?>
				</th>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_ilinks_nofollow == 1) { ?>
				<th nowrap="nowrap">
					<?php echo $this->lists['nofollow_list']; ?>
				</th>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_ilinks_blank == 1) { ?>
				<th nowrap="nowrap">
					<?php echo $this->lists['blank_list']; ?>
				</th>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_ilinks_limit == 1) { ?>
				<th nowrap="nowrap">
					<?php echo $this->lists['limit_val']; ?>
					<?php echo $this->lists['search_limit']; ?>
				</th>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_ilinks_cached == 1) { ?>
				<th nowrap="nowrap">
					&nbsp;
				</th>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_ilinks_id == 1) { ?>
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
			
			// Published icon
			if ($this->AcesefConfig->ui_ilinks_published == 1) {
				$published_icon = $this->getIcon($i, $row->published ? 'unpublish' : 'publish', $row->published ? 'icon-16-published-on.png' : 'icon-16-published-off.png');
			}
			
			// Nofollow icon
			if ($this->AcesefConfig->ui_ilinks_nofollow == 1) {
				$nofollow_icon = $this->getIcon($i, $row->nofollow ? 'unnofollow' : 'nofollow', $row->nofollow ? 'icon-16-nofollow-on.png' : 'icon-16-nofollow-off.png');
				//$nofollow_icon = $this->getIconAjax($row->id, $row->nofollow ? 'unnofollow' : 'nofollow', $row->nofollow ? 'icon-16-nofollow-on.png' : 'icon-16-nofollow-off.png');
			}
			
			// Target _blank icon
			if ($this->AcesefConfig->ui_ilinks_blank == 1) {
				$blank_icon = $this->getIcon($i, $row->iblank ? 'unblank' : 'blank', $row->iblank ? 'icon-16-blank-on.png' : 'icon-16-blank-off.png');
			}
			
			// Cache icon
			if ($this->AcesefConfig->ui_ilinks_cached == 1) {
				$cached = false;
				if (isset($this->cache[$row->word])) {
					$cached = true;
				}
				$cached_icon = $this->getIcon($i, $cached ? 'uncache' : 'cache', $cached ? 'icon-16-cache-on.png' : 'icon-16-cache-off.png');
			}
			
			$link = $row->link;
			if (strpos($link, 'http') !== 0) {
				$domain = AcesefURI::getDomain();
				$link = $domain.$link;
			}
			
			$edit_link = JRoute::_('index.php?option=com_acesef&controller=ilinks&task=edit&cid[]='.$row->id.'&amp;tmpl=component');
			
			?>
			<tr class="<?php echo "row$k"; ?>">
				<td>
					<?php echo $this->pagination->getRowOffset($i); ?>
				</td>
				<td>
					<?php echo $checked; ?>
				</td>
				<td>
					<a href="<?php echo $link; ?>" title="<?php echo JText::_('ACESEF_URL_SEF_TOOLTIP_SEF_URL'); ?>" target="_blank">
					<?php echo substr($row->link, 0, 173); ?></a>
				</td>
				<td>
					<a href="<?php echo $edit_link; ?>" style="cursor:pointer" class="modal" rel="{handler: 'iframe', size: {x: 600, y: 350}}">
						<?php echo $row->word; ?>
					</a>
				</td>
				<?php if ($this->AcesefConfig->ui_ilinks_published == 1) { ?>
				<td align="center">
					<?php echo $published_icon;?>
				</td>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_ilinks_nofollow == 1) { ?>
				<td align="center">
					<?php echo $nofollow_icon;?>
				</td>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_ilinks_blank == 1) { ?>
				<td align="center">
					<?php echo $blank_icon;?>
				</td>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_ilinks_limit == 1) { ?>
				<td align="center">
					<?php echo $row->ilimit;?>
				</td>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_ilinks_cached == 1) { ?>
				<td align="center">
					<?php echo $cached_icon;?>
				</td>
				<?php }	?>
				<?php if ($this->AcesefConfig->ui_ilinks_id == 1) { ?>
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
	<input type="hidden" name="controller" value="ilinks" />
	<input type="hidden" name="task" value="view" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_dir']; ?>" />
	<input type="hidden" name="selection" value="selected" />
	<?php echo JHTML::_('form.token'); ?>
</form>