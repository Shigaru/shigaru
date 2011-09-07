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

<?php

// No direct access

defined('_JEXEC') or die('Restricted access'); ?>
<div class="component-header"><div class="componentheading">Frequently Asked Questions</div></div>

<?php if ($this->showcats) : ?>
	<div class="fsf_spacer fsf_spacer contentheading">Please select your question category</div>
	<div class="fsf_faq_catlist" id='fsf_faq_catlist'>
		<?php $colwidth = floor(100 / $this->num_cat_colums) . "%"; ?>
		<?php $column = 1 ?>
		<table width='100%' cellspacing="0" cellpadding="0">
		
		<?php if (!$this->hide_allfaqs) : ?>
	    	<tr><td width='<?php echo $colwidth; ?>' class='fsf_faq_cat_col_first' valign="top">
				<div class='faq_category'>
					<div class='faq_category_image'>
	    				<img src='<?php echo JURI::root( true ); ?>/components/com_fsf/assets/allfaqs.png' width='64' height='64'>
					</div>
					<div class='faq_category_head'>
						<?php if ($this->curcatid == 0) : ?><b><?php endif; ?>
						<A class="fsf_highlight" href='<?php echo JRoute::_( '&limitstart=&catid=' . 0 );?>'>All FAQs</a>
						<?php if ($this->curcatid == 0) : ?></b><?php endif; ?>
					</div>
					<div class='faq_category_desc'>View all frequently asked questions.</div>
				</div>
			<div class='faq_category_faqlist'></div>
       <?php 
            if ($column == $this->num_cat_colums)
                echo "</td></tr>";
            else 
                echo "</td>";
                
            $column++;
            if ($column > $this->num_cat_colums)
                $column = 1;
        ?>
        <?php endif; ?>
		
	    <?php if (!$this->hide_search) : ?>
        <?php
                if ($column == 1)
                echo "<tr><td width='$colwidth' class='fsf_faq_cat_col_first' valign='top'>";
            else 
                echo "<td width='$colwidth' class='fsf_faq_cat_col' valign='top'>";        
        ?>
           	<div class='faq_category'>
	    		<div class='faq_category_image'>
	    			<img src='<?php echo JURI::root( true ); ?>/components/com_fsf/assets/search.png' width='64' height='64'>
	    		</div>
				<div class='faq_category_head' style="padding-top:6px;padding-bottom:6px;">
					<?php if ($this->curcatid == -1) : ?><b><?php endif; ?>
					Search FAQs
					<?php if ($this->curcatid == -1) : ?></b><?php endif; ?>
</div>
		<form action="<?php echo JRoute::_( 'index.php?option=com_fsf&view=faq&catid=' . $this->curcatid );?>" method="post" name="adminForm">
		<input type='hidden' name='catid' value='<?php echo $this->curcatid; ?>' />
		<input type='hidden' name='enable_pages' value='<?php echo $this->enable_pages; ?>' />
		<input type='hidden' name='view_mode' value='<?php echo $this->view_mode; ?>' />
				<input name='search' value='<?php echo JView::escape($this->search); ?>'><input type=submit value=Search >
				</form>
			</div>
			<div class='faq_category_faqlist'></div>
	    <?php 
	        if ($column == $this->num_cat_colums)
	            echo "</td></tr>";
	        else 
	            echo "</td>";
	            
	        $column++;
	        if ($column > $this->num_cat_colums)
	            $column = 1;
	    ?>
	    <?php endif; ?>
	    
		<?php foreach ($this->catlist as $cat) : ?>
        <?php
        	if ($column == 1)
        		echo "<tr><td width='$colwidth' class='fsf_faq_cat_col_first' valign='top'>";
        	else 
        		echo "<td width='$colwidth' class='fsf_faq_cat_col' valign='top'>";        
        ?>
		<?php include "components/com_fsf/views/faq/snippet/_cat.php" ?>
	    <?php 
	        if ($column == $this->num_cat_colums)
	            echo "</td></tr>";
	        else 
	            echo "</td>";
	            
	        $column++;
	        if ($column > $this->num_cat_colums)
	            $column = 1;
	    ?>
		<?php endforeach; ?>
	    
    
	    <?php 
	        if ($column > 1)
	        { 
	    		while ($column <= $this->num_cat_colums)
	    		{
	    			echo "<td class='fsf_faq_cat_col' valign='top'><div class='faq_category'></div></td>";	
	    			$column++;
	    		}
	            echo "</tr>"; 
	            $column = 1;
	        }
	    ?>
	 
 	    <tr><td colspan='<?php echo $this->num_cat_colums; ?>'>
	    	<div class='faq_category_footer'></div>
	    </td></tr>
	    </table>
	</div>


<?php endif; ?>
<?php if ($this->showfaqs) : ?>

	<div class='faq_category'>
	    <?php if ($this->curcatimage) : ?>
	    <div class='faq_category_image'>


			<?php if (substr($this->curcatimage,0,1) == "/") : ?>
			<img src='<?php echo JURI::root( true ); ?><?php echo $this->curcatimage; ?>' width='64' height='64'>
			<?php else: ?>
			<img src='<?php echo JURI::root( true ); ?>/images/fsf/faqcats/<?php echo $this->curcatimage; ?>' width='64' height='64'>
			<?php endif; ?>

	    </div>
	    <?php endif; ?>
<div class='fsf_spacer contentheading' style="padding-top:6px;padding-bottom:6px;">
			FAQs <?php if ($this->curcattitle) { echo " - " . $this->curcattitle; } ?>
</div>
			<div class='faq_category_desc'><?php echo $this->curcatdesc; ?></div>
	</div>
	<div class='fsf_clear'></div>
	
	<?php if ($this->curcatid == -1): ?>
	<div class='faq_category'>
	<div class='faq_category_image'>
	<img src='/components/com_fsf/assets/search.png' width='64' height='64'>
	</div>
	<div class='faq_category_head' style="padding-top:6px;padding-bottom:6px;">
	Search FAQs
	</div>
		<form action="<?php echo JRoute::_( 'index.php?option=com_fsf&view=faq&catid=' . $this->curcatid );?>" method="post" name="adminForm">
		<input type='hidden' name='catid' value='<?php echo $this->curcatid; ?>' />
		<input type='hidden' name='enable_pages' value='<?php echo $this->enable_pages; ?>' />
		<input type='hidden' name='view_mode' value='<?php echo $this->view_mode; ?>' />
				<input name='search' value='<?php echo JView::escape($this->search); ?>'><input type=submit value=Search >
		</form>
			</div>
			<div class='faq_category_faqlist'></div
	<?php endif; ?>
	
	
	<div class='fsf_faqs' id='fsf_faqs'>
	<?php foreach ($this->items as $faq) : ?>
	<?php include "components/com_fsf/views/faq/snippet/_faq.php" ?>
	<?php endforeach; ?>
	<?php if (count($this->items) == 0): ?>
	<div class="fsf_no_results">No faqs match your search criteria</div>
	<?php endif; ?>
	</div>

	<?php if ($this->enable_pages): ?>
		<form id="adminForm" action="<?php echo JRoute::_( 'index.php?option=com_fsf&view=faq&catid=' . $this->curcatid );?>" method="post" name="adminForm">
		<input type='hidden' name='catid' value='<?php echo $this->curcatid; ?>' />
		<input type='hidden' name='enable_pages' value='<?php echo $this->enable_pages; ?>' />
		<input type='hidden' name='view_mode' value='<?php echo $this->view_mode; ?>' />
	<?php echo $this->pagination->getListFooter(); ?>
		</form>
	<?php endif; ?>

<?php endif; ?>

	
<?php if ($this->view_mode_cat == "accordian") : ?>
<script>
	var myAccordion = new Accordion($('fsf_faq_catlist'), 'div.faq_category', 'div.faq_category_faqlist', {
		opacity: false,
		onActive: function(toggler, element){
			//toggler.setStyle('color', '#41464D');
		},
		onBackground: function(toggler, element){
			//toggler.setStyle('color', '#528CE0');
		}
	});
</script>
<?php elseif ($this->view_mode_incat == "accordian") : ?>
<script>
	var myAccordion = new Accordion($('faq_category_faqlist'), 'div.fsf_faq_question', 'div.fsf_faq_answer', {
opacity: false,
onActive: function(toggler, element){
//toggler.setStyle('color', '#41464D');
},
onBackground: function(toggler, element){
//toggler.setStyle('color', '#528CE0');
}
});
</script>
<?php endif; if ($this->view_mode == "accordian") : ?>
<script>
	var myAccordion = new Accordion($('fsf_faqs'), 'div.fsf_faq_question', 'div.fsf_faq_answer', {
		opacity: false,
		onActive: function(toggler, element){
			//toggler.setStyle('color', '#41464D');
		},
		onBackground: function(toggler, element){
			//toggler.setStyle('color', '#528CE0');
		}
	});
</script>
<?php endif; ?>

<?php if ($this->view_mode == 'questionwithtooltip' || $this->view_mode_incat == 'questionwithtooltip') : ?>
<script>
	var Tips4 = new Tips($$('.fsf_tip'), {
				className: 'fsf_custom_tip'
			});
</script>
<?php endif; ?>

<?php include "components/com_fsf/_powered.php" ?>