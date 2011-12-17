<?php /* Smarty version 2.6.26, created on 2011-12-10 19:19:39
         compiled from upload_local.tpl */ ?>
 <?php echo ' 
<style>
        span.reference{
            position:fixed;
            left:5px;
            top:5px;
            font-size:10px;
            text-shadow:1px 1px 1px #fff;
        }
        span.reference a{
            color:#555;
            text-decoration:none;
			text-transform:uppercase;
        }
        span.reference a:hover{
            color:#000;
            
        }
        h1{
            color:#ccc;
            font-size:36px;
            text-shadow:1px 1px 1px #fff;
            padding:20px;
        }
    </style>
 '; ?>
   
<div class="headerText mtop12"><?php echo @_HWDVIDS_SHIGARU_ONEOFTWO; ?>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="f100 f120"><?php echo @_HWDVIDS_SHIGARU_FILLUPTHIS; ?>
</div>

<div id="contentSliderForm" class="clear">
	<div id="wrapperSliderForm">
		<div id="steps">
				<form id="formElem" name="formElem" action="<?php echo $this->_tpl_vars['form_upload']; ?>
" method="post">
						<fieldset class="step">
							<legend><?php echo @_HWDVIDS_SHIGARU_SHIGAR_VIDEO_DETAILS; ?>
 <div class="f80 tblack fright"><?php echo @_HWDVIDS_SHIGARU_MANDATORYFIELDS; ?>
</div></legend>
								<p>
									<label for="category_id"><?php echo @_HWDVIDS_SHIGARU_TYPEVIDEO; ?>
 <font class="required">*</font></label>
								   <?php echo $this->_tpl_vars['categoryselect']; ?>

								</p>
								<p>
									<label for="videotitle"><?php echo @_HWDVIDS_SHIGARU_TITLEVIDEO; ?>
 <font class="required">*</font></label>
									<input type="text" id="videotitle" name="videotitle" size="40" value="<?php echo $this->_tpl_vars['videoInfo']->video_title; ?>
" class="required" AUTOCOMPLETE=ON minlength="2"/>
									 <br />
									<span class="fieldexplanation"><?php echo @_HWDVIDS_SHIGARU_EXAMPLETITLE; ?>
</span>
								</p>
							   
								<div id="wysigyginfovideo">
									<label for="description"><?php echo @_HWDVIDS_SHIGARU_VIDEODESCRIP; ?>
 <font class="required">*</font></label>	
									<br />
									 
									
									 <?php echo $this->_tpl_vars['description']; ?>

									<span class="clear fnone fieldexplanation"><?php echo @_HWDVIDS_SHIGARU_TEXTDESCRIPTION; ?>
</span>
								   
								 </div>
							   
								
					  </fieldset>
					  <fieldset class="step">
							<legend><?php echo @_HWDVIDS_SHIGARU_SHIGAR_SONG_INFO; ?>
 <div class="f80 tblack fright"><?php echo @_HWDVIDS_SHIGARU_MANDATORYFIELDS; ?>
</div></legend>
							
								 <p>
									<label for="originalband"><?php echo @_HWDVIDS_SHIGARU_ORIGINBAND; ?>
 <font class="required">*</font></label>
									<input type="text" value="" id="originalband" name="originalband" size="40" class="required" placeholder="Enter Band Name..." minlength="2"/>
									<br />
									<span class="fieldexplanation"><?php echo @_HWDVIDS_SHIGARU_INFOTOBETTERCATEG; ?>
</span>
								</p>
								<p>
									<label for="songtitle"><?php echo @_HWDVIDS_SHIGARU_SONGTITLE; ?>
 <font class="required">*</font></label>
									<input type="text" value="" id="songtitle" name="songtitle" size="40" placeholder="Enter Song Title..." class="required" minlength="2"/>
									<br />
								   <span class="fieldexplanation"><?php echo @_HWDVIDS_SHIGARU_INFOTOBETTERCATEG; ?>
</span>
								</p>
							 
							  
							   <p>
									<label for="genre_id"><?php echo @_HWDVIDS_SHIGARU_SHIGAR_MUSIC_GENRE; ?>
 <font class="required">*</font></label>
									<?php echo $this->_tpl_vars['genresCombo']; ?>

								</p>       
								<p>
									<label for="intrument_id"><?php echo @_HWDVIDS_SHIGARU_SHIGAR_INSTRUMENT; ?>
 <font class="required">*</font></label>
									<?php echo $this->_tpl_vars['instrumentsCombo']; ?>

								</p>   
								 <p>
									<label for="level_id"><?php echo @_HWDVIDS_SHIGARU_SHIGAR_LEVEL; ?>
 <font class="required">*</font></label>
									<?php echo $this->_tpl_vars['levelsCombo']; ?>

								</p>
								
								<p>
									<label for="tags"><?php echo @_HWDVIDS_SHIGARU_SHIGAR_SEARCH_TAGS; ?>
 <font class="required">*</font></label>
									<input type="text" value="<?php echo $this->_tpl_vars['videoInfo']->tags; ?>
" class="required" id="tags" name="tags" size="40"/>
									<br />
									<span class="fieldexplanation"><?php echo @_HWDVIDS_SHIGARU_SHIGAR_SEARCH_TAGS_INFO; ?>
</span>
								</p>
								
					  </fieldset>
					   <fieldset class="step">
							<legend><?php echo @_HWDVIDS_SHIGARU_SHIGAR_ADDTIONAL_DETAILS; ?>
 <div class="f80 tblack fright"><?php echo @_HWDVIDS_SHIGARU_MANDATORYFIELDS; ?>
</div></legend>
								  
								<p>
									<label for="original_autor"><?php echo @_HWDVIDS_SHIGARU_AREYOUCREATOR; ?>
 <font class="required">*</font></label>
									<label class="fnone fnormal"><?php echo @_HWDVIDS_SHIGARU_YES; ?>
<input type="radio" name="original_autor" value="1"></label>
									<label class="fnone fnormal"><?php echo @_HWDVIDS_SHIGARU_NO; ?>
<input type="radio" name="original_autor" checked="true" value="0"></label>
									<br />
									<span class="fieldexplanation"><?php echo @_HWDVIDS_SHIGARU_COPYRIGHTREASONS; ?>
</span>
								</p> 
								<p>
									<label for="language_id"><?php echo @_HWDVIDS_SHIGARU_SHIGAR_VIDEO_LANGUAGE; ?>
 <font class="required">*</font></label>
									<?php echo $this->_tpl_vars['languagesCombo']; ?>

								</p>
								<p>
									<label for="ip_address"><?php echo @_HWDVIDS_SHIGARU_YOURIP; ?>
 <font class="required">*</font></label>
									<input type="text" value="<?php echo $this->_tpl_vars['ipaddress']; ?>
" disabled="disabled" class="required" id="ip_address" name="ip_address" size="40"/>
								</p>   
								<p>
									<label for="security_code"><?php echo @_HWDVIDS_INFO_SECURECODE; ?>
 <font class="required">*</font></label>
									<input id="security_code" class="required" placeholder="Enter code" class="required mbot6" id="security_code" name="security_code" type="text" />
									<br class="clear"/>
									<span class="ml35pt">
									<?php echo $this->_tpl_vars['captcha']; ?>

									</span>
									
								</p>
								 <p>
									<label for="shigaruuser"><?php echo @_HWDVIDS_SHIGARU_SHIGARUUSER; ?>
 <font class="required">*</font></label>
									<input type="text" value="<?php echo $this->_tpl_vars['username']; ?>
" class="required" disabled="disabled" class="required" id="shigaruuser" name="shigaruuser" size="40"/>
								</p>
							
					</fieldset>
					<fieldset class="step">
								<legend><?php echo @_HWDVIDS_SHIGARU_SHIGAR_CONFIRMATION; ?>
</legend>
								<p>
									Everything in the form was correctly filled 
									if all the steps have a green checkmark icon.
									A red checkmark icon indicates that some field 
									is missing or filled out with invalid data. In this
									last step the user can confirm the submission of
									the form.
								</p>
								<p class="submit">
									<button id="registerButton" type="submit"><?php echo @_HWDVIDS_BUTTON_ADD; ?>
</button>
								</p>
					 </fieldset>   

				<input type="hidden" name="videotype" value="local" />
				<input type="hidden" name="ip_added" value="<?php echo $this->_tpl_vars['ipaddress']; ?>
" />
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sharingoptions.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				</form>
				</div>
				<div id="navigations" style="display:none;clear:both;">
					<ul>
						<li class="selected">
							<a href="#"><?php echo @_HWDVIDS_SHIGARU_SHIGAR_VIDEO_DETAILS; ?>
</a>
						</li>
						<li>
							<a href="#"><?php echo @_HWDVIDS_SHIGARU_SHIGAR_SONG_INFO; ?>
</a>
						</li>
						<li>
							<a href="#"><?php echo @_HWDVIDS_SHIGARU_SHIGAR_ADDTIONAL_DETAILS; ?>
</a>
						</li>
						<li>
							<a href="#"><?php echo @_HWDVIDS_SHIGARU_SHIGAR_CONFIRMATION; ?>
</a>
						</li>
					</ul>
				</div>
		</div>
	</div>


