<?php /* Smarty version 2.6.26, created on 2011-12-10 19:05:42
         compiled from featured_videos_01.tpl */ ?>

<div id="whitebox">
				<div class="whiteboxHeader random">
					<div>
							<h6>
							<?php echo @_HWDVIDS_RANDOM_VIDEOS; ?>

							</h6>
						</div>
					
				</div>	
				<div id="whitebox_m">
					<div class="padding">
							<center>
								<?php echo $this->_tpl_vars['featured_video_player']; ?>

								<div id="randonvideodescrip"> <?php echo $this->_tpl_vars['featured_video_details']->title; ?>
</div>
								<div id="randonvideoautor"><?php echo @_HWDVIDS_INFO_SHARED; ?>
<?php echo $this->_tpl_vars['featured_video_details']->uploader; ?>
</div>
								<div><b><?php echo @_HWDVIDS_DESC; ?>
&#58;</b> <?php echo $this->_tpl_vars['featured_video_details']->description_truncated; ?>
 <a href="<?php echo $this->_tpl_vars['featured_video_details']->videourl; ?>
" tittle="<?php echo @_HWDVIDS_MORE; ?>
"><?php echo @_HWDVIDS_MORE; ?>
 &raquo;</a></div>
								<div style="clear:both;"></div>
							</center>
					</div>
				</div>

				<div id="whitebox_b">
					<div id="whitebox_bl">
						<div id="whitebox_br"></div>
					</div>
				</div>
		</div>
  