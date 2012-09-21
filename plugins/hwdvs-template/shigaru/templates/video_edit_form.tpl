{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
<div id="contentSliderForm" class="clear">
	<div id="wrapperSliderForm">
		<div id="steps">
		   <form name="videoupload" action="{$form_save_video}" method="post" onsubmit="return chkform()" enctype="multipart/form-data">
			 <fieldset class="step">
				 
				 <legend>{$smarty.const._HWDVIDS_TITLE_EDITVID}</legend>
				 
                      <p>
						<label for="category_id">{$smarty.const._HWDVIDS_SHIGARU_TYPEVIDEO} <font class="required">*</font></label>
					   {$categoryselect}
					   <div class="clear"></div>
					</p>
					<p>
						<label for="category_id">{$smarty.const._HWDVIDS_TITLE_NEWTHUMB}</label>
						<div class="edit-videopreview fleft">{$thumbnail}</div>
						<div class="fleft newthumbinput"><input type="file" name="thumbnail_file" value="" size="30"></div>
						<div class="clear"></div>
						<span class="fieldexplanation">{$smarty.const._HWDVIDS_DETAILS_NEWTHUMB_DESC}</span>
					</p>
					<p>
						<label for="title">{$smarty.const._HWDVIDS_SHIGARU_TITLEVIDEO}</label>
						<input type="text" class="required" value="{$titleplain}" size="40" name="title" id="title">
						<div class="clear"></div>
						</p>
                    <p>
						<label for="description">{$smarty.const._HWDVIDS_SHIGARU_VIDEODESCRIP}</label>
						<div id="wysigyginfovideo">
							  {$description}
						 </div>
						 <div class="clear"></div>
						</p>
					<p>
						<label for="tags">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_SEARCH_TAGS} <font class="required">*</font></label>
						<input type="text" value="{$tags}" class="required" id="tags" name="tags" size="40"/>
						<div class="clear"></div>
						</p>			     
					<p class="songtutorialfields">
						<label for="originalband">{$smarty.const._HWDVIDS_SHIGARU_ORIGINBAND} <font class="required">*</font></label>
						<input type="text" value="" id="originalband" name="originalband" size="20" class="required" placeholder="Enter Band Name..." minlength="2"/>
						<br class="clear"/>
						</p>
					<p class="songtutorialfields">
						<label for="songtitle">{$smarty.const._HWDVIDS_SHIGARU_SONGTITLE} <font class="required">*</font></label>
						<input type="text" value="" id="songtitle" name="songtitle" size="20" placeholder="Enter Song Title..."/>
						<br class="clear"/>
					  </p>
				   <p>
						<label for="genre_id">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_MUSIC_GENRE} <font class="required">*</font></label>
						{$genresCombo}
						<div class="clear"></div>
					</p>       
					<p>
						<label for="intrument_id">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_INSTRUMENT} <font class="required">*</font></label>
						{$instrumentsCombo}
						<div class="clear"></div>
					</p>   
					 <p>
						<label for="level_id">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_LEVEL} <font class="required">*</font></label>
						{$levelsCombo}
						<div class="clear"></div>
					</p>
					
					<p id="originalautorfields">
						<label for="original_autor">{$smarty.const._HWDVIDS_SHIGARU_AREYOUCREATOR} <font class="required">*</font></label>
						<label class="fnone fnormal">{$smarty.const._HWDVIDS_SHIGARU_YES}<input type="radio" name="original_autor" value="1"></label>
						<label class="fnone fnormal">{$smarty.const._HWDVIDS_SHIGARU_NO}<input type="radio" name="original_autor" checked="true" value="0"></label>
						<div class="clear"></div>
						</p> 
					<p>
						<label for="language_id">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_VIDEO_LANGUAGE} <font class="required">*</font></label>
						{$languagesCombo}
						<div class="clear"></div>
					</p>   
					<p class="submit">
						<button id="registerButton" type="submit">{$smarty.const._HWDVIDS_BUTTON_ADD}</button>
					</p>
				   </fieldset>
					
					{if $print_sharingoptions}
					  {include file='sharingoptions.tpl'}
					{/if}

					<input type="hidden" name="referrer" value="{$referrer}" />
					<input type="hidden" name="id" value="{$rowid}" />
					<input type="hidden" name="owner" value="{$rowuid}" />
				</form>
				</div>
		</div>
	</div>





