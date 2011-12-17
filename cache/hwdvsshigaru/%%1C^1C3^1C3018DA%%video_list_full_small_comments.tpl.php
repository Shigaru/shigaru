<?php /* Smarty version 2.6.26, created on 2011-12-11 13:12:43
         compiled from video_list_full_small_comments.tpl */ ?>


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
<div class="listviews listcomments"><span class="dispnon"><?php echo @_HWDVIDS_INFO_NOCOMM; ?>
</span><?php echo $this->_tpl_vars['data']->comments; ?>
</div>
     
</div>
<div style="clear:both;"></div>
</div>


