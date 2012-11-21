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

		// Link must begin with http
		if (form.link.value.match(/^www/) && !form.link.value.match(/^http/)) {
			alert('The Link must begin with http://');
		} else {
			submitform(pressbutton);
		}
	}
	
	<?php if ($this->AcesefConfig->jquery_mode == 1) { ?>
	$(document).ready(function(){
		$("#word").autocomplete('components/com_acesef/library/autocompleters/tags.php');
	});

	$(document).ready(function(){
		$("#link").autocomplete('components/com_acesef/library/autocompleters/sefurls.php');
	});
	<?php } ?>
</script>

<form action="index.php?option=com_acesef&amp;controller=ilinks&amp;task=edit&cid[]=<?php echo $this->row->id; ?>&amp;tmpl=component" method="post" name="adminForm" id="adminForm">
	<?php
	if ($tmpl == 'component') {
		?>
		<fieldset class="adminform">
			<table class="toolbar1">
				<tr>
					<td class="desc" width="550px">
						<?php
							$text = "New Internal Link";
							if ($task != 'add') {
								$text = $this->row->word; 
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
						<?php echo JText::_('ACESEF_ILINKS_WORD'); ?>
					</label>
				</td>
				<td width="80%">
					<input class="inputbox" type="text" name="word" id="word" size="70" value="<?php echo $this->row->word; ?>" />
				</td>
			</tr>
			<tr>
				<td width="20%" class="key2">
					<label for="name">
						<?php echo JText::_('ACESEF_ILINKS_LINK'); ?>
					</label>
				</td>
				<td width="80%">
					<input class="inputbox" type="text" name="link" id="link" size="70" value="<?php echo $this->row->link; ?>" />
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
				<td width="20%" class="key2">
					<label for="name">
						<?php echo JText::_('ACESEF_ILINKS_NOFOLLOW'); ?>
					</label>
				</td>
				<td width="80%">
					<?php echo $this->lists['nofollow']; ?>
				</td>
			</tr>
			<tr>
				<td width="20%" class="key2">
					<label for="name">
						<?php echo JText::_('ACESEF_ILINKS_BLANK'); ?>
					</label>
				</td>
				<td width="80%">
					<?php echo $this->lists['blank']; ?>
				</td>
			</tr>
			<tr>
				<td width="20%" class="key2">
					<label for="name">
						<?php echo JText::_('ACESEF_ILINKS_LIMIT'); ?>
					</label>
				</td>
				<td width="80%">
					<input type="text" name="ilimit" id="ilimit" class="inputbox" size="7" value="<?php echo $this->row->ilimit; ?>" />
				</td>
			</tr>
		</table>
	</fieldset>
	<input type="hidden" name="option" value="com_acesef" />
	<input type="hidden" name="controller" value="ilinks" />
	<input type="hidden" name="task" value="edit" />
	<input type="hidden" name="modal" value="0" />
	<input type="hidden" name="id" value="<?php echo $this->row->id; ?>" />
	<?php echo JHTML::_('form.token'); ?>
</form>