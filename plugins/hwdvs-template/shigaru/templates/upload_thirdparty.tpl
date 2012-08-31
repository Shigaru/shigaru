{* 
//////
//    @version [ Nightly Build ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2011 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
{literal}
<style>

    </style>
 {/literal}   
 <div class="content_box">
<h3>{$smarty.const._HWDVIDS_SHIGARU_ONEOFTWO}</h3>
{include file='header.tpl'}
 </div>
<script>
	var domain = "{$domain}";
	{literal}
	jQuery(document).ready(function() {	
	
			jQuery('#infograbbed').show();
				jQuery('#infograbbed #yes').click(function() { 
					//$('#fromhwdshare').hide();
					jQuery.unblockUI(); 
					return false; 
				});	
				jQuery.blockUI({ message: jQuery('#infograbbed'), css: { width: '600px' } }); 
				jQuery('#infograbbed #no').click(function() { 
					jQuery.unblockUI(); 
					return false; 
				});	
				
			/*var lastData;
			jQuery( "#songtitle" ).autocomplete({
					
					//define callback to format results
					source: function(req, add){
					
						//pass request to server
						jQuery.getJSON(domain+"index.php?option=com_hwdvideoshare&task=ajax_tinysong&callback=", req, function(data) {
							
							//create array for response objects
							var suggestions = [];
							
							//process response
							jQuery.each(data, function(i, val){
								suggestions.push(val.SongName+' ('+val.ArtistName+')');
							});
							
							//pass array to callback
							add(suggestions);
							lastData = data;
						});
					},
					
					//define select handler
					select: function(e, ui) {
						
						//create formatted friend
						var friend = ui.item.value,
							span = jQuery("<span>").text(friend),
							a = jQuery("<a>").addClass("remove").attr({
								href: "javascript:",
								title: "Remove " + friend
							}).text("x").appendTo(span);
						
						//add friend to friend div
						span.insertBefore("#songtitle");
					},
					
					//define select handler
					change: function() {
						
						//prevent 'to' field being updated and correct position
						jQuery("#songtitle").val("").css("top", 2);
					},
					delay: 700,
					search: function(event, ui) { 
						jQuery(ui.item).block();
					}
				});
				
				
				//add live handler for clicks on remove links
				jQuery(".remove").live("click", function(){
					//remove current
					jQuery(this).parent().remove();		
				});	*/
		});
</script>
{/literal}
<div class="f100 mtopl50">{$smarty.const._HWDVIDS_SHIGARU_FILLUPTHIS}</div>
<div id="infograbbed">
			<div>
				<p class="f100 mbot20">OK, we have been able to get the following information for this video. Feel free edit it, we are sure you can make it better ;-)</p>
			</div>
			<div class="fleft">
				<div><img src="{$thumburl}" title="{$videoInfo->video_title}" /></div>
				<div class="mtop12"><span>{$videoInfo->video_length} min</span></div>
				
			</div>
			<div class="fleft w70pc pad12">
				<div class="fright">
					<a href="#" target="_blank" title="Go to Youtube.com"></a>
				</div>	
				<div class="mbot20 mtop12">
					   <span class="fontbold">{$smarty.const._HWDVIDS_SHIGARU_TITLEVIDEO}</span>	
					  {$videoInfo->video_title}
					  <a href="#" class="fontbold mleft6" title="Click to edit">Edit</a>
				</div>
				<div class="mbot20">
					   <span class="fontbold">{$smarty.const._HWDVIDS_SHIGARU_VIDEODESCRIP}</span>	
					  {$descriptionplain}
					  <a href="#" class="fontbold mleft6" title="Click to edit">Edit</a>
				</div>
				<div class="mbot20">
					   <span class="fontbold">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_SEARCH_TAGS}</span>	
					  {$videoInfo->tags}
					  <a href="#" class="fontbold mleft6" title="Click to edit">Edit</a>
				</div>
            </div>
            <div class="clear"></div>
            <input type="button" class="mtop24 reddbuttonsubmit" id="yes" value="Ok" /> 

</div>
<div id="contentSliderForm" class="clear">
	<div id="wrapperSliderForm">
		<div id="steps">
			<form id="formElem" name="formElem" action="{$form_tp}" method="post">
			
			 <fieldset class="step">
						<legend>{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_VIDEO_DETAILS} <div class="f80 tblack fright">{$smarty.const._HWDVIDS_SHIGARU_MANDATORYFIELDS}</div></legend>
                            <p>
								<label for="category_id">{$smarty.const._HWDVIDS_SHIGARU_TYPEVIDEO} <font class="required">*</font></label>
                               {$categoryselect}
                               <div class="clear"></div>
                            </p>
							<p id="titlebox" class="dispnon">
                                <label for="videotitle">{$smarty.const._HWDVIDS_SHIGARU_TITLEVIDEO} <font class="required">*</font></label>
                                <input type="text" id="videotitle" name="videotitle" size="40" value="{$videoInfo->video_title}" class="required" AUTOCOMPLETE=ON minlength="2"/>
                                 <br />
								<span class="fieldexplanation">{$smarty.const._HWDVIDS_SHIGARU_EXAMPLETITLE}</span>
                            </p>                           
                            <div class="dispnon" id="wysigyginfovideo">
								<label for="description">{$smarty.const._HWDVIDS_SHIGARU_VIDEODESCRIP} <font class="required">*</font></label>	
								<br />
								 
								
								 {$description}
							    <span class="clear fnone fieldexplanation">{$smarty.const._HWDVIDS_SHIGARU_TEXTDESCRIPTION}</span>
							   
                             </div>
                           
                            
				  
						
							 <p>
                                <label for="originalband">{$smarty.const._HWDVIDS_SHIGARU_ORIGINBAND} <font class="required">*</font></label>
                                <input type="text" value="" id="originalband" name="originalband" size="40" class="required" placeholder="Enter Band Name..." minlength="2"/>
                                <br />
                                <span class="fieldexplanation">{$smarty.const._HWDVIDS_SHIGARU_INFOTOBETTERCATEG}</span>
                            </p>
                            <p>
                                <label for="songtitle">{$smarty.const._HWDVIDS_SHIGARU_SONGTITLE} <font class="required">*</font></label>
                                <input type="text" value="" id="songtitle" name="songtitle" size="40" placeholder="Enter Song Title..."/>
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
                            
                            <p id="tagsbox" class="dispnon">
                                <label for="tags">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_SEARCH_TAGS} <font class="required">*</font></label>
                                <input type="text" value="{$videoInfo->tags}" class="required" id="tags" name="tags" size="40"/>
                                <br />
								<span class="fieldexplanation">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_SEARCH_TAGS_INFO}</span>
                            </p>
							
				 		  
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
                                <label for="security_code">{$smarty.const._HWDVIDS_INFO_SECURECODE} <font class="required">*</font></label>
                                <input id="security_code" class="required" placeholder="Enter code" class="required mbot6" id="security_code" name="security_code" type="text" />
                                <br class="clear"/>
                                <span class="ml35pt">
                                {$captcha}
								</span>
								
                            </p>
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
                        <input type="hidden" value="{$username}" id="shigaruuser" name="shigaruuser"/>
                        <input type="hidden" value="{$ipaddress}" id="ip_address" name="ip_address"/>
                        <input type="hidden" name="videotype" value="{$videotype}" />
						<input type="hidden" name="video_id" value="{$videoInfo->video_id}" />
						<input type="hidden" name="video_length" value="{$videoInfo->video_length}" />
						<input type="hidden" name="infopassed" value="{$infoPassed}" />
						<input type="hidden" name="ip_added" value="{$ipaddress}" />
						<input name="embeddump" value="{$videourl}" class="inputbox" type="hidden" />
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



