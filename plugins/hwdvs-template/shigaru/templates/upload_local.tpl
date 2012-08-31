{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
<div class="headerText mtop12">{$smarty.const._HWDVIDS_SHIGARU_ONEOFTWO}</div>
{include file='header.tpl'}
<div class="f100 f120">{$smarty.const._HWDVIDS_SHIGARU_FILLUPTHIS}</div>

<div id="contentSliderForm" class="clear">
	<div id="wrapperSliderForm">
		<div id="steps">
				<form id="formElem" name="formElem" action="{$form_upload}" method="post">
						<fieldset class="step">
							<legend>{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_VIDEO_DETAILS} <div class="f80 tblack fright">{$smarty.const._HWDVIDS_SHIGARU_MANDATORYFIELDS}</div></legend>
								<p>
									<label for="category_id">{$smarty.const._HWDVIDS_SHIGARU_TYPEVIDEO} <font class="required">*</font></label>
								   {$categoryselect}
								</p>
								<p>
									<label for="videotitle">{$smarty.const._HWDVIDS_SHIGARU_TITLEVIDEO} <font class="required">*</font></label>
									<input type="text" id="videotitle" name="videotitle" size="40" value="{$videoInfo->video_title}" class="required" AUTOCOMPLETE=ON minlength="2"/>
									 <br />
									<span class="fieldexplanation">{$smarty.const._HWDVIDS_SHIGARU_EXAMPLETITLE}</span>
								</p>
							   
								<div id="wysigyginfovideo">
									<label for="description">{$smarty.const._HWDVIDS_SHIGARU_VIDEODESCRIP} <font class="required">*</font></label>	
									<br />
									 
									
									 {$description}
									<span class="clear fnone fieldexplanation">{$smarty.const._HWDVIDS_SHIGARU_TEXTDESCRIPTION}</span>
								   
								 </div>
							   
								
					  </fieldset>
					  <fieldset class="step">
							<legend>{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_SONG_INFO} <div class="f80 tblack fright">{$smarty.const._HWDVIDS_SHIGARU_MANDATORYFIELDS}</div></legend>
							
								 <p>
									<label for="originalband">{$smarty.const._HWDVIDS_SHIGARU_ORIGINBAND} <font class="required">*</font></label>
									<input type="text" value="" id="originalband" name="originalband" size="40" class="required" placeholder="Enter Band Name..." minlength="2"/>
									<br />
									<span class="fieldexplanation">{$smarty.const._HWDVIDS_SHIGARU_INFOTOBETTERCATEG}</span>
								</p>
								<p>
									<label for="songtitle">{$smarty.const._HWDVIDS_SHIGARU_SONGTITLE} <font class="required">*</font></label>
									<input type="text" value="" id="songtitle" name="songtitle" size="40" placeholder="Enter Song Title..." class="required" minlength="2"/>
									<br />
								   <span class="fieldexplanation">{$smarty.const._HWDVIDS_SHIGARU_INFOTOBETTERCATEG}</span>
								</p>
							 
							  
							   <p>
									<label for="genre_id">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_MUSIC_GENRE} <font class="required">*</font></label>
									{$genresCombo}
								</p>       
								<p>
									<label for="intrument_id">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_INSTRUMENT} <font class="required">*</font></label>
									{$instrumentsCombo}
								</p>   
								 <p>
									<label for="level_id">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_LEVEL} <font class="required">*</font></label>
									{$levelsCombo}
								</p>
								
								<p>
									<label for="tags">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_SEARCH_TAGS} <font class="required">*</font></label>
									<input type="text" value="{$videoInfo->tags}" class="required" id="tags" name="tags" size="40"/>
									<br />
									<span class="fieldexplanation">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_SEARCH_TAGS_INFO}</span>
								</p>
								
					  </fieldset>
					   <fieldset class="step">
							<legend>{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_ADDTIONAL_DETAILS} <div class="f80 tblack fright">{$smarty.const._HWDVIDS_SHIGARU_MANDATORYFIELDS}</div></legend>
								  
								<p>
									<label for="original_autor">{$smarty.const._HWDVIDS_SHIGARU_AREYOUCREATOR} <font class="required">*</font></label>
									<label class="fnone fnormal">{$smarty.const._HWDVIDS_SHIGARU_YES}<input type="radio" name="original_autor" value="1"></label>
									<label class="fnone fnormal">{$smarty.const._HWDVIDS_SHIGARU_NO}<input type="radio" name="original_autor" checked="true" value="0"></label>
									<br />
									<span class="fieldexplanation">{$smarty.const._HWDVIDS_SHIGARU_COPYRIGHTREASONS}</span>
								</p> 
								<p>
									<label for="language_id">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_VIDEO_LANGUAGE} <font class="required">*</font></label>
									{$languagesCombo}
								</p>
								<p>
									<label for="ip_address">{$smarty.const._HWDVIDS_SHIGARU_YOURIP} <font class="required">*</font></label>
									<input type="text" value="{$ipaddress}" disabled="disabled" class="required" id="ip_address" name="ip_address" size="40"/>
								</p>   
								<p>
									<label for="security_code">{$smarty.const._HWDVIDS_INFO_SECURECODE} <font class="required">*</font></label>
									<input id="security_code" class="required" placeholder="Enter code" class="required mbot6" id="security_code" name="security_code" type="text" />
									<br class="clear"/>
									<span class="ml35pt">
									{$captcha}
									</span>
									
								</p>
								 <p>
									<label for="shigaruuser">{$smarty.const._HWDVIDS_SHIGARU_SHIGARUUSER} <font class="required">*</font></label>
									<input type="text" value="{$username}" class="required" disabled="disabled" class="required" id="shigaruuser" name="shigaruuser" size="40"/>
								</p>
							
					</fieldset>
					<fieldset class="step">
								<legend>{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_CONFIRMATION}</legend>
								<p>
									Everything in the form was correctly filled 
									if all the steps have a green checkmark icon.
									A red checkmark icon indicates that some field 
									is missing or filled out with invalid data. In this
									last step the user can confirm the submission of
									the form.
								</p>
								<p class="submit">
									<button id="registerButton" type="submit">{$smarty.const._HWDVIDS_BUTTON_ADD}</button>
								</p>
					 </fieldset>   

				<input type="hidden" name="videotype" value="local" />
				<input type="hidden" name="ip_added" value="{$ipaddress}" />
				{include file='sharingoptions.tpl'}
				</form>
				</div>
				<div id="navigations" style="display:none;clear:both;">
					<ul>
						<li class="selected">
							<a href="#">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_VIDEO_DETAILS}</a>
						</li>
						<li>
							<a href="#">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_SONG_INFO}</a>
						</li>
						<li>
							<a href="#">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_ADDTIONAL_DETAILS}</a>
						</li>
						<li>
							<a href="#">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_CONFIRMATION}</a>
						</li>
					</ul>
				</div>
		</div>
	</div>



