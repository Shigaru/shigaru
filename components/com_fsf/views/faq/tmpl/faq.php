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
<?php if ($this->tmpl) echo "<div class='fsf_popup_gap'>"; ?>
<div class="component-header"><div class="componentheading">Frequently Asked Question</div></div>
<div class="fsf_faq_question">
	<strong><?php echo $this->faq['question']; ?></strong>
</div>
<div class='fsf_faq_answer_single'>
	<?php 
		echo $this->faq['answer']; 
		if ($this->faq['fullanswer'])
		{
			echo $this->faq['fullanswer']; 
		}
	?>
	</span>
</div>	
<?php if ($this->tmpl) echo "</div>"; ?>

<?php include "components/com_fsf/_powered.php" ?>