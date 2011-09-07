<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<form action="<?php echo acymailing::completeLink('user'); ?>" method="post" name="adminForm">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'USER_INFORMATIONS' ); ?></legend>
		<table cellspacing="1" align="center" width="100%">
		<?php if(acymailing::level(3)){ ?>
			<?php include(dirname(__FILE__).DS.'extrafields.modify.php'); ?>
		<?php }else{ ?>
			<tr>
				<td width="150" class="key">
					<label for="field_name">
					<?php echo JText::_( 'JOOMEXT_NAME' ); ?>
					</label>
				</td>
				<td>
				<?php
				if(empty($this->subscriber->userid)){
						echo '<input type="text" name="data[subscriber][name]" id="field_name" class="inputbox" size="40" value="'.$this->escape(@$this->subscriber->name).'" />';
				}else{
					echo $this->subscriber->name;
				}
				?>
				</td>
			</tr>
			<tr>
				<td class="key">
					<label for="field_email">
					<?php echo JText::_( 'JOOMEXT_EMAIL' ); ?>
					</label>
				</td>
				<td>
					<?php
					if(empty($this->subscriber->userid)){
						echo '<input class="inputbox" type="text" name="data[subscriber][email]" id="field_email" size="40" value="'.$this->escape(@$this->subscriber->email).'" />';
					}else{
						echo $this->subscriber->email;
					}
					?>
				</td>
			</tr>
			<tr>
				<td class="key">
					<?php echo JText::_( 'RECEIVE' ); ?>
				</td>
				<td>
				  <?php echo JHTML::_('select.booleanlist', "data[subscriber][html]" , '',$this->subscriber->html,JText::_('HTML'),JText::_('JOOMEXT_TEXT'),'user_html'); ?>
				</td>
			</tr>
		<?php }
			?>
		</table>
	</fieldset>
	<?php if($this->displayLists){?>
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'SUBSCRIPTION' ); ?></legend>
		<table cellspacing="1" align="center" width="100%">
			<thead>
				<tr>
					<th  class="title" nowrap="nowrap" align="center" width="150">
					<?php echo JText::_( 'SUBSCRIBE' );?>
					</th>
					<th  class="title" nowrap="nowrap" align="center">
					<?php echo JText::_( 'LIST' ); ?>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$k = 0;
				foreach($this->subscription as $row){
					if(empty($row->published) OR !$row->visible) continue;
					?>
				<tr class="<?php echo "row$k"; ?>">
					<td align="center" valign="top">
						<?php echo $this->status->display("data[listsub][".$row->listid."][status]",@$row->status); ?>
					</td>
					<td valign="top">
						<div class="list_name"><?php echo $row->name ?></div>
						<div class="list_description"><?php echo $row->description ?></div>
					</td>
				</tr>
				<?php
					$k = 1 - $k;
				} ?>
			</tbody>
		</table>
	</fieldset>
	<?php } ?>
	<br/>
	<input type="hidden" name="option" value="<?php echo ACYMAILING_COMPONENT; ?>" />
	<input type="hidden" name="task" value="savechanges" />
	<input type="hidden" name="ctrl" value="user" />
	<?php echo JHTML::_( 'form.token' ); ?>
	<input type="hidden" name="subid" value="<?php echo $this->subscriber->subid; ?>" />
	<input type="hidden" name="key" value="<?php echo $this->subscriber->key; ?>" />
	<input class="button" type="submit" onclick="return checkChangeForm();" value="<?php echo empty($this->subscriber->subid) ? JText::_('SUBSCRIBE',true) : JText::_('SAVE_CHANGES',true)?>"/>
</form>