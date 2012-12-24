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
		var form = document.adminForm;
		
		// Check if is modal ivew
		<?php if ($tmpl == 'component') { ?>
		form.modal.value = '1';
		<?php } ?>
		
		if (pressbutton == 'editCancel') {
			submitform(pressbutton);
			return;
		}

		submitform(pressbutton);
	}
	
	<?php if ($this->AcesefConfig->jquery_mode == 1) { ?>
	$(document).ready(function(){
		$("#title").autocomplete('components/com_acesef/library/autocompleters/keywords.php');
	});
	<?php } ?>
</script>

<form action="index.php?option=com_acesef&amp;controller=tags&amp;task=edit&cid[]=<?php echo $this->row->id; ?>&amp;tmpl=component" method="post" name="adminForm" id="adminForm">
	<?php
	if ($tmpl == 'component') {
		?>
		<fieldset class="adminform">
			<table class="toolbar1">
				<tr>
					<td class="desc" width="550px">
						<?php
							$text = "New Tag";
							if ($task != 'add') {
								$text = $this->row->title; 
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
		<legend><?php echo JText::_('ACESEF_ILINKS_EDIT_LEGEND'); ?></legend>
		<table class="admintable">
			<tr>
				<td width="20%" class="key2">
					<label for="name">
						<?php echo JText::_('ACESEF_COMMON_TITLE'); ?>
					</label>
				</td>
				<td width="80%">
					<input class="inputbox" type="text" name="title" id="title" size="70" value="<?php echo $this->row->title; ?>" />
				</td>
			</tr>
			<tr>
				<td width="20%" class="key2">
					<label for="name">
						<?php echo JText::_('Alias'); ?>
					</label>
				</td>
				<td width="80%">
					<input class="inputbox" type="text" name="alias" id="alias" size="70" value="<?php echo $this->row->alias; ?>" />
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
			<tr>
				<td width="23%" class="key2">
					<label for="name">
						<?php echo JText::_('Description'); ?>
					</label>
				</td>
				<td width="77%">
					<textarea class="text_area" name="description" rows="3" cols="55"><?php echo AcesefUtility::replaceSpecialChars(htmlspecialchars($this->row->description), true); ?></textarea>
				</td>
			</tr>
		</table>
	</fieldset>
	<input type="hidden" name="option" value="com_acesef" />
	<input type="hidden" name="controller" value="tags" />
	<input type="hidden" name="task" value="edit" />
	<input type="hidden" name="modal" value="0" />
	<input type="hidden" name="id" value="<?php echo $this->row->id; ?>" />
	<?php echo JHTML::_('form.token'); ?>
</form>