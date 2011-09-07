<?php
/**
* @Copyright Freestyle Joomla (C) 2010
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
*     
* This file is part of Freestyle Support Portal
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
* 
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
* 
* You should have received a copy of the GNU General Public License
* along with this program.  If not, see <http://www.gnu.org/licenses/>.
**/
?>
<?php defined('_JEXEC') or die('Restricted access'); ?>


<?php echo JHTML::_( 'form.token' ); ?>

<script language="javascript" type="text/javascript">
<!--
function submitbutton(pressbutton) {
        var form = document.adminForm;
        if (pressbutton == 'cancel') {
                submitform( pressbutton );
                return;
        }

        <?php
			$editor =& JFactory::getEditor();
			echo $editor->save( 'description' );
        ?>
        submitform(pressbutton);
}
//-->
</script>

<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col100">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Details' ); ?></legend>

		<table class="admintable">
		<tr>
			<td width="100" align="right" class="key">
				<label for="title">
					<?php echo JText::_( 'Title' ); ?>:
				</label>
			</td>
			<td>
				<input class="text_area" type="text" name="title" id="title" size="32" maxlength="250" value="<?php echo JView::escape($this->faqcat->title);?>" />
			</td>
		</tr>
		<tr>
			<td width="100" align="right" class="key">
				<label for="image">
					<?php echo JText::_( 'Image' ); ?>:
				</label>
			</td>
			<td>
				<?php echo $this->lists['images']; ?>
				(Found in images/fsf/faqcats)
			</td>
		</tr>		
		<tr>
			<td width="100" align="right" class="key">
				<label for="description">
					<?php echo JText::_( 'Description' ); ?>:
				</label>
			</td>
			<td>
				<?php
				$editor =& JFactory::getEditor();
				echo $editor->display('description', $this->faqcat->description, '550', '200', '60', '20', array('pagebreak', 'readmore'));
				?>
            </td>

		</tr>
	</table>
	</fieldset>
</div>
<div class="clr"></div>

<input type="hidden" name="option" value="com_fsf" />
<input type="hidden" name="id" value="<?php echo $this->faqcat->id; ?>" />
<input type="hidden" name="ordering" value="<?php echo $this->faqcat->ordering; ?>" />
<input type="hidden" name="published" value="<?php echo $this->faqcat->published; ?>" />
<input type="hidden" name="task" value="save" />
<input type="hidden" name="controller" value="faqcat" />
</form>
