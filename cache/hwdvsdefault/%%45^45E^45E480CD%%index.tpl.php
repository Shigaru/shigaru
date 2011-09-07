<?php /* Smarty version 2.6.26, created on 2011-09-06 23:26:04
         compiled from index.tpl */ ?>

<div id="homepromo"><?php echo @_HWDVIDS_HOMEPROMO; ?>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if ($this->_tpl_vars['print_mostviewed'] || $this->_tpl_vars['print_mostviewed'] || $this->_tpl_vars['print_mostpopular']): ?>
<div class="sic-container">
  
  <div class="sic-left">
<div id="tabs">
	<ul>
		<li><a href="#tabs-1"><?php echo $this->_tpl_vars['title_mostpopular']; ?>
</a></li>
		<li><a href="#tabs-2"><?php echo @_HWDVIDS_MOST_RECENT; ?>
</a></li>
		<li><a href="#tabs-3"><?php echo $this->_tpl_vars['title_mostviewed']; ?>
</a></li>
		<li><a href="#tabs-4"><?php echo @_HWDVIDS_MOST_RATED; ?>
</a></li>
		<li><a href="#tabs-5"><?php echo @_HWDVIDS_MOST_COMMENTED; ?>
</a></li>
	</ul>

	<?php if ($this->_tpl_vars['print_mostpopular']): ?>
    <div id="tabs-1" class="standard">
      <div class="scoller">
      <div class="list">
        <div class="box">
          <?php $_from = $this->_tpl_vars['mostpopularlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['data']):
        $this->_foreach['outer']['iteration']++;
?>
	  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "video_list_small_popular.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	  <div style="clear:both;"></div>
          <?php endforeach; endif; unset($_from); ?>
        </div>
      </div>  
      </div>
      <div class="viewmore"><a href="<?php echo $this->_tpl_vars['featured_link']; ?>
" title="<?php echo @_HWDVIDS_WATCHMORE; ?>
"><?php echo @_HWDVIDS_WATCHMORE; ?>
</a></div>
    </div>
    
    <?php endif; ?>
    
    <?php if ($this->_tpl_vars['print_mostviewed']): ?>
    <div id="tabs-2" class="standard">
      <div class="scoller">
      <div class="list">
        <div class="box">
          <?php $_from = $this->_tpl_vars['mostviewedlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['data']):
        $this->_foreach['outer']['iteration']++;
?>
	  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "video_list_small_viewed.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	  <div style="clear:both;"></div>
          <?php endforeach; endif; unset($_from); ?>
        </div>
      </div>  
      </div>
      <div class="viewmore"><a href="<?php echo $this->_tpl_vars['featured_link']; ?>
" title="<?php echo @_HWDVIDS_WATCHMORE; ?>
"><?php echo @_HWDVIDS_WATCHMORE; ?>
</a></div>
    </div>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['print_mostviewed']): ?>
    <div id="tabs-3" class="standard">
      <div class="scoller">
      <div class="list">
        <div class="box">
          <?php $_from = $this->_tpl_vars['mostviewedlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['data']):
        $this->_foreach['outer']['iteration']++;
?>
	  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "video_list_small_viewed.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	  <div style="clear:both;"></div>
          <?php endforeach; endif; unset($_from); ?>
        </div>
      </div>  
      </div>
      <div class="viewmore"><a href="<?php echo $this->_tpl_vars['featured_link']; ?>
" title="<?php echo @_HWDVIDS_WATCHMORE; ?>
"><?php echo @_HWDVIDS_WATCHMORE; ?>
</a></div>
    </div>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['print_ads']): ?><?php if ($this->_tpl_vars['advert4']): ?><div class="standard"><div class="padding"><div id="hwdadverts-nopadding"><?php echo $this->_tpl_vars['advert4']; ?>
</div></div></div><?php endif; ?><?php endif; ?>
    
    <?php if ($this->_tpl_vars['print_mostfavoured']): ?>
    <div id="tabs-4" class="standard">
      <div class="scoller">
      <div class="list">
        <div class="box">
          <?php $_from = $this->_tpl_vars['mostfavouredlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['data']):
        $this->_foreach['outer']['iteration']++;
?>
	  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "video_list_small_favoured.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	  <div style="clear:both;"></div>
          <?php endforeach; endif; unset($_from); ?>
        </div>
      </div>  
      </div>
      <div class="viewmore"><a href="<?php echo $this->_tpl_vars['featured_link']; ?>
" title="<?php echo @_HWDVIDS_WATCHMORE; ?>
"><?php echo @_HWDVIDS_WATCHMORE; ?>
</a></div>
    </div>
    <?php endif; ?>
    
    <?php if ($this->_tpl_vars['print_mostfavoured']): ?>
    <div id="tabs-5" class="standard">
      <div class="scoller">
      <div class="list">
        <div class="box">
          <?php $_from = $this->_tpl_vars['mostfavouredlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['data']):
        $this->_foreach['outer']['iteration']++;
?>
	  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "video_list_small_favoured.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	  <div style="clear:both;"></div>
          <?php endforeach; endif; unset($_from); ?>
        </div>
      </div>  
      </div>
      <div class="viewmore"><a href="<?php echo $this->_tpl_vars['featured_link']; ?>
" title="<?php echo @_HWDVIDS_WATCHMORE; ?>
"><?php echo @_HWDVIDS_WATCHMORE; ?>
</a></div>	
    </div>
    <?php endif; ?>

    
	
    
    
	
  </div> <!-- fin tabs -->
  <div id="comments-tabs">
	<ul>
		<li><a href="#comments-tabs-1"><?php echo @_HWDVIDS_LATESTCOMM; ?>
</a></li>
		<li><a href="#comments-tabs-2"><?php echo @_HWDVIDS_POPUCOMM; ?>
</a></li>
		<li><a href="#comments-tabs-3"><?php echo @_HWDVIDS_POPUCOMM; ?>
</a></li>
		<li><a href="#comments-tabs-4"><?php echo @_HWDVIDS_POPUCOMM; ?>
</a></li>
		<li><a href="#comments-tabs-5"><?php echo @_HWDVIDS_TITLE_VIDCOMMS; ?>
</a></li>
	</ul>
	
	<div id="comments-tabs-1" class="standard">
      <div class="scoller h150">
      <div class="list">
        <div class="box">
          <?php echo $this->_tpl_vars['latestcomments']; ?>

        </div>
      </div>  
      </div>
    </div>
				
	<div id="comments-tabs-2" class="standard">
      <div class="scoller h150">
      <div class="list">
        <div class="box">
          <?php echo $this->_tpl_vars['mostpopularcomments']; ?>

        </div>
      </div>  
      </div>
    </div>
    
    <div id="comments-tabs-3" class="standard">
      <div class="scoller h150">
      <div class="list">
        <div class="box">
          <?php echo $this->_tpl_vars['whatareyou']; ?>

        </div>
      </div>  
      </div>
    </div>
    
    <div id="comments-tabs-4" class="standard">
      <div class="scoller h150">
      <div class="list">
        <div class="box">
          <?php echo $this->_tpl_vars['recentactivity']; ?>

        </div>
      </div>  
      </div>
    </div>
    
    <div id="comments-tabs-5" class="standard">
      <div class="scoller h150">
      <div class="list">
        <div class="box">
          <?php echo $this->_tpl_vars['topposters']; ?>

        </div>
      </div>  
      </div>
    </div>
    
    
    
    		
  </div> <!-- fin tabs -->
  
		
		
		 <div id="whitebox">
				<div class="whiteboxHeader">
						<div>
							<h6>
							<?php echo @_HWDVIDS_SHIGARU_ADS; ?>

							</h6>
						</div>
				</div>
				<div id="whitebox_m">
  
					<?php echo $this->_tpl_vars['google_adsense']; ?>

  
				</div>

				<div id="whitebox_b">
					<div id="whitebox_bl">
						<div id="whitebox_br"></div>
					</div>
				</div>
		</div>
 
 
 <br />
 
 
		
		<div id="whitebox" class="mtop12">
				<div class="whiteboxHeader">
					<div>
							<h6>
							<?php echo @_HWDVIDS_SHIGARU_TWITTER; ?>

							</h6>
						</div>
				</div>			
				
				<div id="whitebox_m">
					<?php echo $this->_tpl_vars['tweetdisplay']; ?>

				</div>
				
				<div id="whitebox_b">
					<div id="whitebox_bl">
						<div id="whitebox_br"></div>
					</div>
				</div>
		</div>
		
		<br />
		
		
		
		
		
		<div id="whitebox" class="mtop12">
				<div class="whiteboxHeader">
					<div>
							<h6>
							<?php echo @_HWDVIDS_SUBSCRIBE; ?>

							</h6>
						</div>
					
				</div>			
				

				<div id="whitebox_m">
					<?php echo $this->_tpl_vars['subscribe']; ?>

				</div>
				<div class="viewmore"><a href="/shigaru/index.php?option=com_acymailing&view=archive&Itemid=68" title="<?php echo @_HWDVIDS_SUBSARCHIVE; ?>
"><?php echo @_HWDVIDS_SUBSARCHIVE; ?>
</a></div>	

				
		</div>
		
		
		
		
		
		
 </div>
  

  <div class="sic-center">
<?php endif; ?>
  
    <?php if ($this->_tpl_vars['print_featured']): ?>
      <div class="hwdmodule-h3">
        <?php if ($this->_tpl_vars['print_featured_player']): ?>
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "featured_videos_01.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php else: ?>
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "featured_videos_02.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['print_ads']): ?><?php if ($this->_tpl_vars['advert3']): ?><div class="standard"><div class="padding"><div id="hwdadverts-nopadding"><?php echo $this->_tpl_vars['advert3']; ?>
</div></div></div><?php endif; ?><?php endif; ?>
    
    <?php if ($this->_tpl_vars['print_nowlist']): ?>
      <div class="hwdmodule-h4">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "video_beingwatched.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </div>
    <?php endif; ?>
 
 
 <div id="whitebox">
				<div class="whiteboxHeader">
						<div>
							<h6>
							<?php echo @_HWDVIDS_SHIGARU_ADS; ?>

							</h6>
						</div>
					
				</div>
				

				<div id="whitebox_m">
  
					<?php echo $this->_tpl_vars['google_adsense']; ?>

  
				</div>

				<div id="whitebox_b">
					<div id="whitebox_bl">
						<div id="whitebox_br"></div>
					</div>
				</div>
		</div>
 
 
 <br />
 
 
 
 
    
 <div id="tabs-tags">   
    <ul>
		<li><a href="#tabs-tags-1"><?php echo @_HWDVIDS_POP_BANDS; ?>
</a></li>
		<li><a href="#tabs-tags-2"><?php echo @_HWDVIDS_POP_TAGS; ?>
</a></li>
		<li><a href="#tabs-tags-3"><?php echo @_HWDVIDS_POP_GENRES; ?>
</a></li>
	</ul>
    
    <div id="tabs-tags-1" class="standard">
      <div class="scoller miniscoller">
      <div class="list">
        <div class="box">
          <?php echo $this->_tpl_vars['tagsList']; ?>

	  <div style="clear:both;"></div>
        </div>
      </div>  
      </div>
     </div>
    
    
    
    
    <div id="tabs-tags-2" class="standard">
      <div class="scoller miniscoller">
      <div class="list">
        <div class="box">
          <?php echo $this->_tpl_vars['instagsList']; ?>

	  <div style="clear:both;"></div>
        </div>
      </div>  
      </div>
     </div>
     
        
    <div id="tabs-tags-3" class="standard">
      <div class="scoller miniscoller">
      <div class="list">
        <div class="box">
          <?php echo $this->_tpl_vars['gentagsList']; ?>

	  <div style="clear:both;"></div>
        </div>
      </div>  
      </div>
     </div>
    
 </div>   
    
    
    <div id="whitebox">
				
					<div class="whiteboxHeader">
						<div>
							<h6>
							<?php echo @_HWDVIDS_SHIGARU_FACEFAN; ?>

							</h6>
						</div>
					</div>
				<div id="whitebox_m">
					<?php echo $this->_tpl_vars['facefan']; ?>

  
				</div>

				<div id="whitebox_b">
					<div id="whitebox_bl">
						<div id="whitebox_br"></div>
					</div>
				</div>
		</div>
		
	
    
    <br />
    
    
    <div id="whitebox">
				<div class="whiteboxHeader">
						<div>
							<h6>
							<?php echo @_HWDVIDS_SHIGARU_FOLLOW; ?>

							</h6>
						</div>
				</div>
				

				<div id="whitebox_m">
  
					<?php echo $this->_tpl_vars['socialmedialinks']; ?>

  
				</div>

				<div id="whitebox_b">
					<div id="whitebox_bl">
						<div id="whitebox_br"></div>
					</div>
				</div>
		</div>
		
	
    
    <br />
    
    
    
    
    <div id="whitebox">
				<div class="whiteboxHeader">
						<div>
							<h6>
							<?php echo @_HWDVIDS_DONATETO; ?>

							</h6>
						</div>
				</div>
				

				<div id="whitebox_m">
  
					<?php echo $this->_tpl_vars['donate']; ?>

  
				</div>

				<div id="whitebox_b">
					<div id="whitebox_bl">
						<div id="whitebox_br"></div>
					</div>
				</div>
		</div>
		
		
		
		
		
		
		
    
    
    
    
    
    
    
    <!--
    <div class="standard">
      <h2><?php echo @_HWDVIDS_RECENT; ?>
</h2>
      <?php if ($this->_tpl_vars['print_videolist']): ?>

          <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['data']):
        $this->_foreach['outer']['iteration']++;
?>
          <div class="videoBox">
	  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "video_list_full.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	  </div>
	  <?php if (($this->_foreach['outer']['iteration'] == $this->_foreach['outer']['total'])): ?>
	     <div style="clear:both;"></div>
	  <?php elseif (($this->_foreach['outer']['iteration']-1) % $this->_tpl_vars['vpr']- ( $this->_tpl_vars['vpr']-1 ) == 0): ?>
	     <div style="clear:both;"></div>
	  <?php endif; ?>
          <?php endforeach; endif; unset($_from); ?>
      
      <?php else: ?>
        <div class="padding"><?php echo @_HWDVIDS_INFO_NRV; ?>
</div>
      <?php endif; ?>
      <?php echo $this->_tpl_vars['pageNavigation']; ?>

    </div>
	-->
<?php if ($this->_tpl_vars['print_mostviewed'] || $this->_tpl_vars['print_mostviewed'] || $this->_tpl_vars['print_mostpopular']): ?>
  </div>
</div>
<?php endif; ?>
<div style="clear:both;"></div>

<!--<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>-->