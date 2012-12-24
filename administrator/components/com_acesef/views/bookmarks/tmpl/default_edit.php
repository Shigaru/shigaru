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

// Get task and tmpl vars
$tmpl = JRequest::getVar('tmpl');
$task = JRequest::getVar('task');
?>

<script language="javascript">
	function submitbutton(pressbutton){
		// Check if is modal ivew
		<?php if ($tmpl == 'component') { ?>
		document.adminForm.modal.value = '1';
		<?php } ?>
		
		submitform(pressbutton);
	}
</script>

<form action="index.php?option=com_acesef&amp;controller=bookmarks&amp;task=edit&cid[]=<?php echo $this->row->id; ?>&amp;tmpl=component" method="post" name="adminForm" id="adminForm">
	<?php
	if ($tmpl == 'component') {
		?>
		<fieldset class="adminform">
			<table class="toolbar1">
				<tr>
					<td class="desc" width="550px">
						<?php
							$text = "New Social Bookmark";
							if ($task != 'add') {
								$text = $this->row->name; 
							}
							
							echo '<h3>'.$text.'</h3>';
						?>
					</td>
					<td>
						<a href="#" onclick="javascript: submitbutton('editSave'); window.top.setTimeout('window.parent.document.getElementById(\'sbox-window\').close();', 1000);" class="toolbar1"><span class="icon-32-save1" title="<?php echo JText::_('ACESEF_COMMON_SAVE'); ?>"></span><?php echo JText::_('ACESEF_COMMON_SAVE'); ?></a>
					</td>
					<?php if ($task != 'add') {	?>
					<td>
						<a href="#" onclick="javascript: submitbutton('editApply');" class="toolbar1"><span class="icon-32-apply1" title="<?php echo JText::_('ACESEF_COMMON_APPLY'); ?>"></span><?php echo JText::_('ACESEF_COMMON_APPLY'); ?></a>
					</td>
					<?php }	?>
					<td>
						<a href="#" onclick="javascript: submitbutton('editCancel'); window.top.setTimeout('window.parent.document.getElementById(\'sbox-window\').close();', 1000);" class="toolbar1"><span class="icon-32-cancel1" title="<?php echo JText::_('ACESEF_COMMON_CANCEL'); ?>"></span><?php echo JText::_('ACESEF_COMMON_CANCEL'); ?></a>
					</td>
				</tr>
			</table>
		</fieldset>
		<?php
	}
	?>
	<fieldset class="adminform">
		<legend><?php echo JText::_('ACESEF_BOOKMARKS_EDIT_LEGEND'); ?></legend>
		<table class="admintable">
			<tr>
				<td width="20%" class="key2">
					<label for="name">
						<?php echo JText::_('ACESEF_BOOKMARKS_NAME'); ?>
					</label>
				</td>
				<td width="80%">
					<input class="inputbox" type="text" name="name" id="name" size="50" value="<?php echo $this->row->name; ?>" />
				</td>
			</tr>
			<tr>
				<td width="20%" class="key2">
					<label for="name">
						<?php echo JText::_('ACESEF_BOOKMARKS_TYPE'); ?>
					</label>
				</td>
				<td width="80%">
					<?php echo $this->lists['type']; ?>
				</td>
			</tr>
			<tr>
				<td width="20%" class="key2">
					<label for="name">
						<?php echo JText::_('ACESEF_BOOKMARKS_PLACEHOLDER'); ?>
					</label>
				</td>
				<td width="80%">
					{acesef &nbsp;<input type="text" name="placeholder" id="placeholder" class="inputbox" size="15" value="<?php echo $this->row->placeholder; ?>" />}
				</td>
			</tr>
			<tr>
				<td width="20%" class="key2">
					<label for="name">
						<?php echo JText::_('HTML'); ?>
					</label>
				</td>
				<td width="80%">
					<textarea name="html" id="html" rows="4" cols="50" class="text_area"><?php echo $this->row->html; ?></textarea>
				</td>
			</tr>
			<tr>
				<td width="20%" class="key2">
					<label for="name">
						<?php echo JText::_('Published'); ?>
					</label>
				</td>
				<td width="80%">
					<?php echo $this->lists['published']; ?>
				</td>
			</tr>
		</table>
	</fieldset>
	<input type="hidden" name="option" value="com_acesef" />
	<input type="hidden" name="controller" value="bookmarks" />
	<input type="hidden" name="task" value="edit" />
	<input type="hidden" name="modal" value="0" />
	<input type="hidden" name="id" value="<?php echo $this->row->id; ?>" />
	<?php echo JHTML::_('form.token'); ?>
</form>