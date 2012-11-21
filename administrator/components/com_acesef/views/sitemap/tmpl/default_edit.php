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
$tmpl = JRequest::getWord('tmpl');
$task = JRequest::getWord('task');
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
		$("#url_sef").autocomplete('components/com_acesef/library/autocompleters/sefurls.php');
	});
	<?php } ?>
</script>

<form action="index.php?option=com_acesef&amp;controller=sitemap&amp;task=edit&cid[]=<?php echo $this->row->id; ?>&amp;tmpl=component" method="post" name="adminForm" id="adminForm">
	<?php
	if ($tmpl == 'component') {
		?>
		<fieldset class="adminform">
			<table class="toolbar1">
				<tr>
					<td class="desc" width="550px">
						<?php
							$text = JText::_('ACESEF_COMMON_SITEMAP');
							if ($task != 'add') {
								$text = $this->row->url_sef; 
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
		<legend><?php echo JText::_('ACESEF_COMMON_SITEMAP'); ?></legend>
		<table class="admintable">
			<tr>
				<td width="20%" class="key2">
					<label for="name">
						<?php echo JText::_('ACESEF_URL_SEF_COMMON_URL_SEF'); ?>
					</label>
				</td>
				<td width="80%">
					<input class="inputbox" type="text" name="url_sef" id="url_sef" size="90" value="<?php echo $this->row->url_sef; ?>" />
				</td>
			</tr>
			<tr>
				<td width="23%" class="key2">
					<label for="name">
						<?php echo JText::_('ACESEF_SITEMAP_DATE'); ?>
					</label>
				</td>
				<td width="77%">
					<?php echo JHTML::calendar($this->row->sdate, 'sdate', 'sdate', '%Y-%m-%d', 'size="13"'); ?>
				</td>
			</tr>
			<tr>
				<td width="23%" class="key2">
					<label for="name">
						<?php echo JText::_('ACESEF_SITEMAP_FREQUENCY'); ?>
					</label>
				</td>
				<td width="77%">
					<?php echo JHTML::_('select.genericlist', AcesefSitemap::getFrequencyList(), 'frequency', 'class="inputbox" size="1 "','value', 'text', $this->row->frequency); ?>
				</td>
			</tr>
			<tr>
				<td width="23%" class="key2">
					<label for="name">
						<?php echo JText::_('ACESEF_SITEMAP_PRIORITY'); ?>
					</label>
				</td>
				<td width="77%">
					<?php echo JHTML::_('select.genericlist', AcesefSitemap::getPriorityList(), 'priority', 'class="inputbox" size="1 "','value', 'text', $this->row->priority); ?>
				</td>
			</tr>
			<tr>
				<td width="23%" class="key2">
					<label for="name">
						<?php echo JText::_('ACESEF_SITEMAP_PARENT'); ?>
					</label>
				</td>
				<td width="77%">
					<input class="inputbox" type="text" name="sparent" size="6" value="<?php echo $this->row->sparent; ?>" />
				</td>
			</tr>
		</table>
	</fieldset>
	<fieldset class="adminform">
		<legend><?php echo 'HTML ' . JText::_('ACESEF_COMMON_SITEMAP') . ' ' . JText::_('ACESEF_COMMON_TITLE'); ?></legend>
		<table class="admintable">
			<tr>
				<td width="20%" class="key2">
					<label for="name">
						<?php echo JText::_('ACESEF_COMMON_METADATA') . ' ' . JText::_('ACESEF_COMMON_TITLE'); ?>
					</label>
				</td>
				<td width="80%">
					<input class="inputbox" type="text" name="meta_title" id="meta_title" size="90" value="<?php echo $this->row->meta_title; ?>" />
				</td>
			</tr>
			<tr>
				<td width="20%" class="key2">
					<label for="name">
						<?php echo JText::_('Custom') . ' ' . JText::_('ACESEF_COMMON_TITLE'); ?>
					</label>
				</td>
				<td width="80%">
					<input class="inputbox" type="text" name="title" id="title" size="90" value="<?php echo $this->row->title; ?>" />
				</td>
			</tr>
		</table>
	</fieldset>
	
	<input type="hidden" name="option" value="com_acesef" />
	<input type="hidden" name="controller" value="sitemap" />
	<input type="hidden" name="task" value="edit" />
	<input type="hidden" name="modal" value="0" />
	<input type="hidden" name="id" value="<?php echo $this->row->id; ?>" />
	<?php echo JHTML::_('form.token'); ?>
</form>