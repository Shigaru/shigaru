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
<form method="post">
<input type="submit" name="Save Setting" value="Save Settings"><br><br>
<input type="hidden" name="what" value="save">
<div id="tab_visual" class="col100">

	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Visual Settings' ); ?></legend>
		<table class="admintable">
			<tr>
				<td align="right" class="key" style="width:200px;">
					<label for="title">
						<?php echo JText::_( 'Use skin styling for pageination controls' ); ?>:
					</label>
				</td>
				<td>
					<input type='checkbox' name='skin_style' value='1' <?php if ($this->settings['skin_style'] == 1) { echo " checked='yes' "; } ?>>
				</td>
			</tr>
		</table>
	</fieldset>
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'CSS Settings' ); ?></legend>
		<table class="admintable">
			<tr>
				<td align="right" class="key" style="width:200px;">
					<label for="title">
						<?php echo JText::_( 'Highlight Colour' ); ?>:
					</label>
				</td>
				<td>
					<input name='css_hl' value='<?php echo $this->settings['css_hl'] ?>'>
				</td>
			</tr>
			<tr>
				<td align="right" class="key">
					<label for="title">
						<?php echo JText::_( 'Border Colour' ); ?>:
					</label>
				</td>
				<td>
					<input name='css_bo' value='<?php echo $this->settings['css_bo'] ?>'>
				</td>
			</tr>
			<tr>
				<td align="right" class="key">
					<label for="title">
						<?php echo JText::_( 'Tab Background Colour' ); ?>:
					</label>
				</td>
				<td>
					<input name='css_tb' value='<?php echo $this->settings['css_tb'] ?>'>
				</td>
			</tr>
		</table>
	</fieldset>

</div>

</form>
