<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<div class="iframedoc" id="iframedoc"></div>
<form action="index.php?tmpl=component&amp;option=<?php echo ACYMAILING_COMPONENT ?>&amp;ctrl=send" method="post" name="adminForm" autocomplete="off">
	<div>
	<?php if(empty($this->values->nbqueue)){
		if(!empty($this->lists)){?>
		<fieldset class="adminform">
		<legend><?php echo JText::_( 'NEWSLETTER_SENT_TO' ); ?></legend>
			<table class="adminlist" cellspacing="1" align="center">
				<tbody>
					<?php
					$k = 0;
					foreach($this->lists as $row){
					?>
					<tr class="<?php echo "row$k"; ?>">
						<td>
							<?php
							$text = str_replace(array("'",'"'),array("&#039;",'&quot;'),$row->description);
							$title = str_replace(array("'",'"'),array("&#039;",'&quot;'),$row->name);
							echo JHTML::_('tooltip', $text, $title, 'tooltip.png', $title);
							echo ' ( '.$row->nbsub.' )';
							 ?>
						</td>
					</tr>
					<?php
						$k = 1 - $k;
					} ?>
				</tbody>
			</table>
		</fieldset>
		<?php if(!empty($this->values->alreadySent)){
				acymailing::display(JText::sprintf('ALREADY_SENT',$this->values->alreadySent).'<br/>'.JText::_('REMOVE_ALREADY_SENT').'<br/>'.JHTML::_('select.booleanlist', "onlynew",'','',JText::_('JOOMEXT_YES'),JText::_('SEND_TO_ALL')),'warning');
			}
		}else{ acymailing::display(JText::_( 'EMAIL_AFFECT' ),'warning');}}else{
		acymailing::display(JText::sprintf('NB_PENDING_EMAIL',$this->values->nbqueue,$this->mail->subject).'<br/>'.JText::_('SEND_CONTINUE'),'info');
		?>
		<input type="hidden" name="totalsend" value="<?php echo $this->values->nbqueue; ?>" />
		<?php
	}
	?>
	<?php if(!empty($this->mail->mailid) AND (!empty($this->lists) OR !empty($this->values->nbqueue))){?>
		<input type="submit" value="<?php echo empty($this->values->nbqueue) ? JText::_('SEND') : JText::_('CONTINUE')?>">
	<?php }?>
	</div>
	<div class="clr"></div>
	<input type="hidden" name="cid[]" value="<?php echo $this->mail->mailid; ?>" />
	<input type="hidden" name="option" value="<?php echo ACYMAILING_COMPONENT; ?>" />
	<input type="hidden" name="task" value="<?php echo empty($this->values->nbqueue) ? 'send' : 'continuesend'; ?>" />
	<input type="hidden" name="ctrl" value="send" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>