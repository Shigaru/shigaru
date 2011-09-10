<?php /* Smarty version 2.6.26, created on 2011-09-10 17:44:28
         compiled from video_list_small_viewed.tpl */ ?>

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
<div class="listviews"> <?php echo @_HWDVIDS_INFO_PLAYS; ?>
 <br /> <span><?php echo $this->_tpl_vars['data']->views; ?>
</span></div>
     
</div>
<div style="clear:both;"></div>
</div>