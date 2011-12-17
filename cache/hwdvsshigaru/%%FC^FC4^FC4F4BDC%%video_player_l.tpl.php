<?php /* Smarty version 2.6.26, created on 2011-12-10 19:03:22
         compiled from video_player_l.tpl */ ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript" src="<?php echo $this->_tpl_vars['link_home']; ?>
/plugins/hwdvs-template/default/js/tabber.js"></script>

<?php if ($this->_tpl_vars['print_nextprev'] || $this->_tpl_vars['print_videourl'] || $this->_tpl_vars['print_embedcode'] || $this->_tpl_vars['print_uservideolist'] || $this->_tpl_vars['print_relatedlist']): ?>
<div class="sic-container">
  
  <div>
<?php endif; ?>  



        <div id="videoTitle" class="fleft">
				  <div>
					 <div class="fleft titleText">
					 <?php echo $this->_tpl_vars['videoplayer']->titleText; ?>
 <?php echo $this->_tpl_vars['videoplayer']->editvideo; ?>
 <?php echo $this->_tpl_vars['videoplayer']->deletevideo; ?>

					 </div>
					 <div class="fright">
							<div class="fleft mright6"><?php echo @_HWDVIDS_INFO_SHARED; ?>
<br /><?php echo $this->_tpl_vars['videoplayer']->username; ?>
</div><div class="fleft"><?php echo $this->_tpl_vars['videoplayer']->avatar; ?>
</div>
					</div>
				  </div>
				  <div class="padding clear"><center><?php echo $this->_tpl_vars['videoplayer']->player; ?>
</center></div>
				 
      </div>  
      
      <div id="infocontext" class="fleft">
		  <div><span><?php echo @_HWDVIDS_INFO_PLAYS; ?>
</span><br /><b><?php echo $this->_tpl_vars['videoplayer']->views; ?>
</b></div>
		  <div><span><?php echo @_HWDVIDS_SHIGARU_DATEADDED; ?>
</span><br /><?php echo $this->_tpl_vars['videoplayer']->upload_date; ?>
</div>
		  <div><span><?php echo @_HWDVIDS_SHIGARU_VIDEOLEVEL; ?>
</span><br /><?php echo $this->_tpl_vars['videoplayer']->level; ?>
</div>
		  <div><span><?php echo @_HWDVIDS_SHIGARU_INSTRUMENT; ?>
</span><br /><?php echo $this->_tpl_vars['videoplayer']->instrument; ?>
</div>
		  <div><span><?php echo @_HWDVIDS_SHIGARU_GENRE; ?>
</span><br /><?php echo $this->_tpl_vars['videoplayer']->genre; ?>
</div>
		  <div><span><?php echo @_HWDVIDS_SHIGARU_LANGUAGE; ?>
</span><br /><?php echo $this->_tpl_vars['videoplayer']->language; ?>
</div>
		  <div><span><?php echo @_HWDVIDS_SELECT_RATING; ?>
</span><br /><?php echo $this->_tpl_vars['videoplayer']->ratingsystem; ?>
</div>
		  <div><span><?php echo @_HWDVIDS_INFO_NOCOMM; ?>
</span><br /><?php echo $this->_tpl_vars['videoplayer']->commentsNum; ?>
</div>
		  <div>
				  <?php if ($this->_tpl_vars['print_nextprev']): ?>
					<?php echo $this->_tpl_vars['videoplayer']->nextprev; ?>

				  <?php endif; ?>
		  </div>
		  <div>		  
				  <?php if ($this->_tpl_vars['print_videourl']): ?>
					 <form name="vlink" action="#"><?php echo @_HWDVIDS_TITLE_PERMALINK; ?>
<input type="text" value="<?php echo $this->_tpl_vars['videoplayer']->videourl; ?>
" name="vlink" /></form>
				  <?php endif; ?>
		  </div>		  
		</div>
		<div>
		</div>
	  </div> 

      
        <div class="clear">   </div>  
			<div class="padding"><strong><?php echo @_HWDVIDS_DESC; ?>
</strong><br /><p id="truncateMe"><?php echo $this->_tpl_vars['videoplayer']->description; ?>
</p></div>
			


	<div class="standard">
	  <div class="padding">
            <div id="addremfav"><?php echo $this->_tpl_vars['videoplayer']->favourties; ?>
</div>
            <div><?php echo $this->_tpl_vars['videoplayer']->reportmedia; ?>
</div>
          
         <!-- <div><?php echo $this->_tpl_vars['videoplayer']->vieworiginal; ?>
</div> -->
          <div style="padding: 5px 0;"><?php echo $this->_tpl_vars['videoplayer']->switchquality; ?>
</div>
          <div class="padding"><?php echo $this->_tpl_vars['videoplayer']->socialbmlinks; ?>
</div> 
		  <div class="padding"><?php if ($this->_tpl_vars['print_addtogroup']): ?><?php echo $this->_tpl_vars['videoplayer']->addtogroup; ?>
<div id="add2groupresponse"></div><?php endif; ?></div>
		  <div class="padding"><?php if ($this->_tpl_vars['print_addtoplaylist']): ?><?php echo $this->_tpl_vars['videoplayer']->addtoplaylist; ?>
<div id="add2playlistresponse"></div><?php endif; ?></div>
		  <span><?php echo @_HWDVIDS_SHIGARU_SEE_MORE_CATEGORY; ?>
</span>
		  
		  <?php echo $this->_tpl_vars['videoplayer']->category; ?>

          <div style="clear:both;"></div>
	    <div id="ajaxresponse"></div>
          <div style="clear:both;"></div>	
	  </div>
        </div>
      </div>
      

	  

	  
	  
	  <?php echo '
	  <script type="text/javascript">
	   
	  var len = 200;
	  var p = document.getElementById(\'truncateMe\');
	  if (p) {
	   
	    var trunc = p.innerHTML;
	    if (trunc.length > len) {
	   
	      /* Truncate the content of the P, then go back to the end of the
	         previous word to ensure that we don\'t truncate in the middle of
	         a word */
	      trunc = trunc.substring(0, len);
	      trunc = trunc.replace(/\\w+$/, \'\');
	   
	      /* Add an ellipses to the end and make it a link that expands
	         the paragraph back to its original size */
	      trunc += \'<a href="#" \' +
	        \'onclick="this.parentNode.innerHTML=\' +
	        \'unescape(\\\'\'+escape(p.innerHTML)+\'\\\');return false;">\' +
	        \'... [ More ]<\\/a>\';
	      p.innerHTML = trunc;
	    }
	  }
	   
	  </script>
	  '; ?>

	  
		

   
      
      </div>
      </div>
      
  
	
   


    

<?php if ($this->_tpl_vars['print_nextprev'] || $this->_tpl_vars['print_videourl'] || $this->_tpl_vars['print_embedcode'] || $this->_tpl_vars['print_uservideolist'] || $this->_tpl_vars['print_relatedlist']): ?>
  </div>
</div>
<?php endif; ?>
<div id="hwdvids">
<div class="sic-container">
  
  <div class="sic-right">
	  
	  <div class="standard">
      <div class="list">
        <div class="box">   
			<div id="tabs">
				<ul>
					<li><a href="#more-tabs-1"><?php echo @_HWDVIDS_RELATED; ?>
</a></li>
					<li><a href="#more-tabs-2"><?php echo @_HWDVIDS_TITLE_MOREBYUSR; ?>
 <?php echo $this->_tpl_vars['videoplayer']->uploader; ?>
</a></li>
					<li><a href="#more-tabs-3"><?php echo @_HWDVIDS_MORECATVIDS; ?>
</a></li>
				</ul>
	
	<div id="more-tabs-1" class="standard">
      <div class="scoller">
      <div class="list">
        <div class="box">
          <?php $_from = $this->_tpl_vars['listrelated']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['data']):
        $this->_foreach['outer']['iteration']++;
?>
	  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "video_list_small.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	  <div style="clear:both;"></div>
          <?php endforeach; endif; unset($_from); ?>
        </div>
      </div>  
      </div>
    </div>
    
    <div id="more-tabs-2" class="standard">
      <div class="scoller">
      <div class="list">
        <div class="box">
          <?php $_from = $this->_tpl_vars['userlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['data']):
        $this->_foreach['outer']['iteration']++;
?>
	  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "video_list_small.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	  <div style="clear:both;"></div>
          <?php endforeach; endif; unset($_from); ?>
        </div>
      </div>  
      </div>
    </div>
    
    <div id="more-tabs-3" class="standard">
      <div class="scoller">
      <div class="list">
        <div class="box">
          <?php $_from = $this->_tpl_vars['categoryvideolist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['data']):
        $this->_foreach['outer']['iteration']++;
?>
	  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "video_list_small.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	  <div style="clear:both;"></div>
          <?php endforeach; endif; unset($_from); ?>
        </div>
      </div>  
      </div>
    </div>
    
    
   </div> 
   </div>
</div> 
   </div>	  
	  
	  
</div>
  
  <div class="sic-center">
<div class="standard">
      <div class="list">
        <div class="box">   
	<div id="comments-tabs">
	<ul>
		<li><a href="#comments-tabs-1"><?php echo @_HWDVIDS_TITLE_VIDCOMMS; ?>
</a></li>
		<li><a href="#comments-tabs-2"><?php echo @_HWDVIDS_TAGS; ?>
</a></li>
	</ul>
	
	<div id="comments-tabs-1" class="standard">
      <div class="scoller">
      <div class="list">
        <div class="box">
          <?php if ($this->_tpl_vars['print_comments']): ?>
			  <?php echo $this->_tpl_vars['videoplayer']->comments; ?>

		<?php endif; ?> 
        </div>
      </div>  
      </div>
    </div>
    
    <div id="comments-tabs-2" class="standard">
      <div class="scoller">
      <div class="list">
        <div class="box">
			  <?php echo $this->_tpl_vars['videoplayer']->tags; ?>

	 
        </div>
      </div>  
      </div>
    </div>
    
    
    
   </div> 
   </div>
 </div> 
</div>   

<div style="clear:both;"></div>

