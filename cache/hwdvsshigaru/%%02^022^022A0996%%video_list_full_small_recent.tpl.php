<?php /* Smarty version 2.6.26, created on 2011-12-10 19:01:48
         compiled from video_list_full_small_recent.tpl */ ?>

<!--
<div class="box">
<div style="width:<?php echo $this->_tpl_vars['thumbwidth']; ?>
px;"><?php echo $this->_tpl_vars['data']->thumbnail; ?>
</div>
<div >

<div class="listtitle"><?php echo $this->_tpl_vars['data']->title; ?>
 <?php echo $this->_tpl_vars['data']->editvideo; ?>
 <?php echo $this->_tpl_vars['data']->deletevideo; ?>
 <?php echo $this->_tpl_vars['data']->publishvideo; ?>
</div>
<div class="listviews"><?php echo $this->_tpl_vars['data']->views; ?>
 <?php echo @_HWDVIDS_INFO_VIEWS; ?>
</div>
<div class="listcat"><?php echo @_HWDVIDS_INFO_CATEGORY; ?>
: <?php echo $this->_tpl_vars['data']->category; ?>
</div>
<?php if ($this->_tpl_vars['data']->showrating): ?><div class="listrating"><?php echo $this->_tpl_vars['data']->rating; ?>
</div><?php endif; ?>
<div class="listuploader"><?php echo $this->_tpl_vars['data']->uploader; ?>
</div>
     
</div>
<div style="clear:both;"></div>
</div>
-->



<div class="box">
<div class="listthumb"><?php echo $this->_tpl_vars['data']->thumbnail; ?>
</div>
<div >

<div class="listtitle"><?php echo $this->_tpl_vars['data']->title; ?>
 <?php echo $this->_tpl_vars['data']->editvideo; ?>
 <?php echo $this->_tpl_vars['data']->deletevideo; ?>
</div>
<div class="listshared"><?php echo @_HWDVIDS_INFO_SHARED; ?>
  <?php echo $this->_tpl_vars['data']->uploader; ?>
 </div>
<div class="listviews"><?php echo $this->_tpl_vars['data']->upload_date; ?>
</div>
     
</div>
<div style="clear:both;"></div>
</div>











