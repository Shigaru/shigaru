<?php /* Smarty version 2.6.26, created on 2011-09-11 03:57:04
         compiled from video_list_full.tpl */ ?>

<div class="box">
	<?php if ($this->_tpl_vars['hwdvsTemplateOverride']['show_thumbnail'] == 1): ?>
		<div class="listThumbnail" <?php if ($this->_tpl_vars['hwdvsTemplateOverride']['wrapText'] == 1): ?>style="float:left;"<?php endif; ?>>
			<?php echo $this->_tpl_vars['data']->thumbnail; ?>

		</div>
		<?php if ($this->_tpl_vars['hwdvsTemplateOverride']['wrapText'] == 0): ?><div style="clear:both;height:3px;"></div><?php endif; ?>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['hwdvsTemplateOverride']['show_avatar'] == 1): ?>
		<div style="float:right;"><?php echo $this->_tpl_vars['data']->avatar; ?>
</div>
	<?php endif; ?>
	<div>
		<?php if ($this->_tpl_vars['hwdvsTemplateOverride']['show_title'] == 1): ?>
			<div><strong><?php echo $this->_tpl_vars['data']->title; ?>
</strong> <?php echo $this->_tpl_vars['data']->editvideo; ?>
 <?php echo $this->_tpl_vars['data']->deletevideo; ?>
 <?php echo $this->_tpl_vars['data']->publishvideo; ?>
 <?php echo $this->_tpl_vars['data']->approvevideo; ?>
</div>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['hwdvsTemplateOverride']['show_views'] == 1): ?>
			<div style="font-style:italic;font-size:90%;"><?php echo $this->_tpl_vars['data']->views; ?>
 <?php echo @_HWDVIDS_INFO_VIEWS; ?>
</div>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['hwdvsTemplateOverride']['show_category'] == 1): ?>
			<div><?php echo @_HWDVIDS_INFO_CATEGORY; ?>
: <?php echo $this->_tpl_vars['data']->category; ?>
</div>
		<?php endif; ?>		
		<?php if ($this->_tpl_vars['hwdvsTemplateOverride']['show_rating'] == 1 && $this->_tpl_vars['data']->showrating): ?>
			<div><?php echo $this->_tpl_vars['data']->rating; ?>
</div>
		<?php endif; ?>			
		<?php if ($this->_tpl_vars['hwdvsTemplateOverride']['show_uploader'] == 1): ?>
			<div><?php echo $this->_tpl_vars['data']->uploader; ?>
</div>
		<?php endif; ?>		
		<?php if ($this->_tpl_vars['hwdvsTemplateOverride']['show_description'] == 1): ?>
			<div><?php echo $this->_tpl_vars['data']->description; ?>
</div>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['hwdvsTemplateOverride']['show_tags'] == 1): ?>
			<div><?php echo $this->_tpl_vars['data']->tags; ?>
</div>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['hwdvsTemplateOverride']['show_duration'] == 1): ?>
			<div><?php echo $this->_tpl_vars['data']->duration; ?>
</div>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['hwdvsTemplateOverride']['show_upload_date'] == 1): ?>
			<div><?php echo $this->_tpl_vars['data']->upload_date; ?>
</div>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['hwdvsTemplateOverride']['show_comments'] == 1): ?>
			<div><?php echo $this->_tpl_vars['data']->comments; ?>
 <?php echo @_HWDVIDS_COMMENTS; ?>
</div>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['hwdvsTemplateOverride']['show_timesince'] == 1): ?>
			<div><?php echo $this->_tpl_vars['data']->timesince; ?>
</div>
		<?php endif; ?>		
	</div>
	<div style="clear:both;"></div>
</div>