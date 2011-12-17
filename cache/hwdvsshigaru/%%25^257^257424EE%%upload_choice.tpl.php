<?php /* Smarty version 2.6.26, created on 2011-12-10 19:01:53
         compiled from upload_choice.tpl */ ?>
<div class="headerText mtop12"><?php echo @_HWDVIDS_SHIGARU_SUBMIT_TO_SHIGARU; ?>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="f100 f120"><?php echo @_HWDVIDS_SHIGARU_THANKYOU; ?>
 <span class="boldred"><?php echo $this->_tpl_vars['username']; ?>
</span> <?php echo @_HWDVIDS_SHIGARU_SUBMIT_THANKYOU_DECIDING; ?>
</div>
<script type="text/javascript">
	<?php echo '
		jQuery(document).ready(function(){
			jQuery(".inputtext").click(function () {
				  jQuery("#videouploadwrap ul li").removeClass("active");
				  jQuery(this).parents(\'.upoptions\').get(0).addClass("active",1500); 	
			});
		});
	'; ?>

</script>
	

<div id="videouploadwrap">
	<ul>
		<li class="upoptions"><span class="fontbold mbot12"><?php echo @_HWDVIDS_SHIGARU_SUBMIT_URL; ?>
</span>
			<br />
			<div  class="mtop24 tright">
				<form name="videoupload" action="<?php echo $this->_tpl_vars['form_upload']; ?>
" method="post">

					  <?php echo @_HWDVIDS_VURL; ?>
 <input name="videourl" value="" class="inputtext mbot12" size="42" />
					  <br />
					  <span class="mright6"><?php echo @_HWDVIDS_TITLE_SUPWEB; ?>
</span>
					  <?php echo $this->_tpl_vars['supported_websites']; ?>

					  <br class="clear"/>
					  <input type="submit" name="send"  class="button fnone mtop12" value="<?php echo @_HWDVIDS_SHIGARU_SUBMITURL; ?>
" />
					  <input type="hidden" name="videotype" value="thirdparty" />
					</form>
				</div>
			
		</li>		
		<li class="upoptions">
				<span class="fontbold mbot12"><?php echo @_HWDVIDS_SHIGARU_SUBMIT_UPLOADPC; ?>
</span>
				<br />
					<div  class="mtop24 tright">
						<form name="videoupload" action="<?php echo $this->_tpl_vars['form_upload']; ?>
" method="post">
								  <label for="example1_field"><?php echo @_HWDVIDS_FLASHUPDL_startMessage; ?>
</label>
								  <input name="MAX_FILE_SIZE" value="<?php echo $this->_tpl_vars['max_upld']; ?>
" type="hidden" />
								  <input class="inputtext" size="42" name="myFile" id="example1_field" type="file" />
								   <input type="hidden" name="uploadpage" value="1" />
								   <input type="hidden" name="videotype" value="00" />
						 <div  class="mtop24 tright">
							 <div class="fright w70">
								<span class="boldred"><?php echo @_HWDVIDS_SHIGARU_FORMATSACCEPTED; ?>
</span> 
								<br />
								<?php echo @_HWDVIDS_INFO_ALLUPLD; ?>
 <?php echo $this->_tpl_vars['allowed_formats']; ?>

								<br />
								<?php echo @_HWDVIDS_SHIGARU_OR; ?>
 <?php echo $this->_tpl_vars['allowed_formats']; ?>

								<br />
								<span class="boldred"><?php echo @_HWDVIDS_SHIGARU_FILESIZE; ?>
</span> 
								<br />
								<ul class="mbot12">
									<li><?php echo @_HWDVIDS_SHIGARU_NOTOVER; ?>
</li>
									<li><?php echo @_HWDVIDS_SHIGARU_UNDERMIN; ?>
</li>
									<li><?php echo @_HWDVIDS_SHIGARU_LONGVIDEO; ?>
</li>
								</ul>	
							</div>
							
							<br class="clear"/>
							 <input type="submit" name="send"  class="button fnone mtop12" value="<?php echo @_HWDVIDS_SHIGARU_UPLOADVIDEO; ?>
" />
						</div>		 
						</form>
					</div>	
		 
		
		</li>
		
		
	</ul>


        <!--<select name="videotype">
          <option value="00"></option>
          <option value="thirdparty" <?php echo $this->_tpl_vars['tpselect']; ?>
></option>
        </select>-->
 
</div>

<div>
  <table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
      <td width="150"></td>
      <td></td>
    </tr>
  </table>
</div>

</form>

<div id="uploadlegal">
	<h1 class="fontbold f15em"><?php echo @_HWDVIDS_SHIGARU_IMPORTANT; ?>
</h1>
	<ul>
		<li><span class="tblack"><?php echo @_HWDVIDS_SHIGARU_BYCLICKING; ?>
</span></li>
		<li><span class="tblack"><?php echo @_HWDVIDS_SHIGARU_YOURIP; ?>
 <?php echo $this->_tpl_vars['ipaddress']; ?>
</span></li>
		<li><span class="tblack"><?php echo @_HWDVIDS_SHIGARU_VIDEOREVIEWED; ?>
</span></li>
		<li><span class="tblack"><?php echo @_HWDVIDS_SHIGARU_LEGALADVERT; ?>
</span></li>
	</ul>

</div>


