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
<?php ('_JEXEC') or die('Restricted access'); ?>

	<?php if ($this->view_mode == 'allononepage') : ?>
	<div class='fsf_faq_inline'>
		<div class="fsf_faq_question">
			<strong><?php echo $faq['question']; ?></strong>
		</div>
		<div class='fsf_faq_answer'>
			<?php 
			    echo $faq['answer']; 
			    if ($faq['fullanswer'])
			    {
			        echo $faq['fullanswer']; 
			    }
			?>
		</div>	
	</div>	
	<?php elseif ($this->view_mode == 'questionwithtooltip'): ?>	
	<div class='fsf_faq'>
		<div class="fsf_faq_question">
			
			<?php $text = $faq['answer']; 
			if ($faq['fullanswer'])
				$text .= "<div class='fsf_faq_more'><a href='#'>click for more...</a></div>";
				
			$text = htmlentities($text);
			$text = str_replace("'", "", $text);
			$question = htmlentities($faq['question']);
			$question = str_replace("'", "", $question);
			
			$output = '<div class="fsf_faq_question"><strong>' . $question;
			$output .= '</strong></div><div class="fsf_faq_answer_tip">';
			$output .= $text;
			$output .= '</span></div>'	
			/*
			// strip out link tags for the tooltip
			while (stripos($text,"</a>") > 0)
				$text = str_ireplace("</a>","",$text);
				
			while (stripos($text,"<a") > 0)
			{
				$start = substr($text,0,stripos($text,"<a"));
				$text = substr($text,stripos($text,"<a") + 2);
				$text = $start . substr($text,strpos($text,">")+1);	
			}*/
			
			?>
			<a href='<?php echo JRoute::_( '&faqid=' . $faq['id'] ); ?>' class='fsf_tip fsf_highlight' title='Title::<?php echo $output ?>'>
				<?php echo $faq['question']; ?>
			</a>
		</div>  
	</div>	
	<?php elseif ($this->view_mode == 'questionwithlink'): ?>	
	<div class='fsf_faq'>
		<div class="fsf_faq_question">
			<a class='fsf_highlight' href='<?php echo JRoute::_( '&faqid=' . $faq['id'] ); ?>'>
			    <?php echo $faq['question']; ?>
			</a>
		</div>
	</div>	
	<?php elseif ($this->view_mode == 'questionwithpopup'): ?>	
	<div class='fsf_faq'>
		<div class="fsf_faq_question">
			<a class="modal fsf_highlight" href='<?php echo JRoute::_( '&tmpl=component&faqid=' . $faq['id'] ); ?>' rel="{handler: 'iframe', size: {x: 650, y: 375}}">
			    <?php echo $faq['question']; ?>
			</a>
		</div>		
	</div>	
	<?php elseif ($this->view_mode == 'accordian'): ?>	
	<div class='fsf_faq'>
		<div class="fsf_faq_question" style='cursor: pointer;'>
			<a class='fsf_highlight' href="javascript:function Z(){Z=''}Z()"><?php echo $faq['question']; ?></a>
		</div>
		<div class='fsf_faq_answer'>
			<?php 
			    echo $faq['answer']; 
			    if ($faq['fullanswer'])
			    {
			        echo $faq['fullanswer']; 
			    }
			?>
		</div>	
	</div>
	<?php endif; ?>
