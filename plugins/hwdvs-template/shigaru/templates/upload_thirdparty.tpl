{* 
//////
//    @version [ Nightly Build ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2011 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
<script type="text/javascript" src="{$domain}components/com_comprofiler/js/jquery-1.5.2/jquery.validate.min.js?v=020b12f257965e65"></script>
<script type="text/javascript" src="{$domain}templates/rhuk_milkyway/js/jquery.tagsinput.min.js"></script>
<link rel="stylesheet" type="text/css" href="{$domain}templates/rhuk_milkyway/css/jquery.tagsinput.css" />
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
	var currentLang = "{$currentlang}";
	var fromError = {$fromerror};
	{literal}
	function showGrabbedInfo(){
				
				jQuery('#infograbbed').show();
				jQuery('#tags').tagsInput({width:'auto'});
				jQuery('#infograbbed #yesall').click(function() {
					jQuery.unblockUI({onUnblock: function() { jQuery('#infograbbed').hide(); }}); 
					jQuery('#infograbbed').hide();
					return false; 
				});	
				
				var oObjectwidth = jQuery('#infograbbed').width();
				var oWindowWidth = jQuery(window).width();
				var oWindowHeight = jQuery(window).height();
				var oLeftPosition  = (oWindowWidth - oObjectwidth) / 2;
				var oObjectHeight = jQuery('#infograbbed').height()+110;
				var oTopPosition  = ((oWindowHeight - oObjectHeight)) / 2;
				if(oTopPosition < 100){
						jQuery('#infograbbed #fields').css({'height':(oWindowHeight-150)+'px','overflow-y':'auto'});
						oTopPosition = 25;
					}
				
				jQuery.blockUI({ message: jQuery('#infograbbed'), css : { border : 'none', height: 'auto', 'cursor': 'auto', 'width': (oObjectwidth+20)+'px', 'top': oTopPosition, 'left' : oLeftPosition   } });
				jQuery('#infograbbed #no').click(function() { 
					jQuery.unblockUI({onUnblock: function() { jQuery('#infograbbed').hide(); }}); 
					return false; 
				});	
			}
	jQuery(document).ready(function() {
		if(fromError ==0){	
				
				showGrabbedInfo();
				jQuery("#language_id").val(currentLang);
				jQuery("#intrument_id").val("103");
				jQuery("#level_id").val("30");
				jQuery('#infograbbed .w80pc .mbot20 a.fontbold').click(function() { 
					var oId= jQuery(this).attr('id');
					oId = oId.substring(oId.indexOf('-')+1,oId.length);
					var isEditor = oId.indexOf('descrip');
					var $this = (isEditor > -1)?jQuery('#'+oId+'box'):jQuery('#grabbed-description');
					var $clicked = jQuery(this);
					jQuery('.viewmode,#yesall').hide();
					if(isEditor != -1){
						$clicked.parent().siblings('.usermessages').find('.fieldexplanation').css({'margin':'-12px 0 0 0'});
					}
					//$clicked.parent().parent().siblings('.fright').css({'margin-top':'-45px'});
					$clicked.parent().siblings('.usermessages').css({'margin-top':'-63px'});
					$clicked.parent().siblings('.usermessages').fadeIn('slow');
					$clicked.parent().parent().find('.usermessages input.required').keyup(function() {
						jQuery(this).parent().siblings('.current').find('.grabbedtext').html(jQuery(this).val());
						return false; 
					});
					$clicked.parent().parent().find('.usermessages input#yes').click(function() {
						jQuery('.viewmode,#yesall').fadeIn('slow');
						$clicked.parent().siblings('.usermessages').hide(); 
						if(isEditor == -1){
							$clicked.siblings('.grabbedtext').html($clicked.parent().parent().find('.usermessages input.required').val());
							
						}else{
							$clicked.siblings('.grabbedtext').html(tinyMCE.activeEditor.getContent());
							tinyMCE.activeEditor.save();
						}
						
						if((jQuery(window).height()/3 < 300)){
									jQuery('.blockUI .grabbedtext').css({'max-height':'50px'});
									jQuery('.blockUI .grabbedtext').jScrollPane({showArrows:true});
								}
						return false;  
					});
					$clicked.parent().parent().find('.usermessages a#cancel').click(function() {
						jQuery('.viewmode,#yesall').fadeIn('slow');
						$clicked.parent().siblings('.usermessages').hide(); 
						return false;  
					});
					
					return false; 
				});	
				
				
		}
			jQuery('#category_id').change(function() {	
				if(jQuery(this).val()=='1' || jQuery(this).val()=='2')
				jQuery('.songtutorialfields').fadeIn(500,function () {
				  });
				else
					jQuery('.songtutorialfields').slideUp();
			});	
			
			jQuery.extend(jQuery.validator.messages, {
					required: "This field is required.",
					remote: "Please fix this field.",
					email: "Please enter a valid email address.",
					url: "Please enter a valid URL.",
					date: "Please enter a valid date.",
					dateISO: "Please enter a valid date (ISO).",
					number: "Please enter a valid number.",
					digits: "Please enter only digits.",
					creditcard: "Please enter a valid credit card number.",
					equalTo: "Please enter the same password again.",
					accept: "Please enter a value with a valid extension.",
					maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
					minlength: jQuery.validator.format("Please enter at least {0} characters."),
					rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
					range: jQuery.validator.format("Please enter a value between {0} and {1}."),
					max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
					min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
			});
			
			
			var firstInvalidFieldFound	=	0;

				jQuery('#formElem').validate( {
					ignoreTitle : true,
					errorClass: 'cb_result_warning',
					// debug: true,
					cbIsOnKeyUp: false,
					highlight: function( element, errorClass ) {
						jQuery( element ).parent().addClass( 'cbValidationError' );		// tables
					},
					unhighlight: function( element, errorClass ) {
						if ( this.errorList.length == 0 ) {
							firstInvalidFieldFound = 0;
						}
						jQuery( element ).parent().removeClass( 'cbValidationError' );		// tables
					},
					errorElement: 'div',
					errorPlacement: function(error, element) {
						var promptTopPosition, promptleftPosition, marginTopSize;
						var element = jQuery(element);
						var fieldWidth = element.width();
						var promptHeight = 25;
						var offset = element.position();
						promptTopPosition = offset.top;
						promptleftPosition = offset.left;
						promptleftPosition += fieldWidth;
						if(promptleftPosition < 500){
							promptleftPosition =500;
							}
						element.parent().append( error[0] ).children('.cb_result_warning').click(function(){
							jQuery(this).fadeOut();
							});
						error.css('position', 'absolute');
						error.css('cursor', 'pointer');
						error.css('left', promptleftPosition);
						error.css('top', promptTopPosition);
					},
					rules: {
						originalband: {required: function(element){
						  return jQuery("#category_id").val() == '1'}
						 },
						 songtitle: {required: function(element){
						  return jQuery("#category_id").val() == '1'}
						 }
						 
					}, messages: {
						originalband: {
							required: "Please add a band for this song / tune"
						},
						songtitle: {
							required: "Please insert the name of the song / tune in this box"
						}
					},
					beforeSubmit: function() { 
						tinyMCE.activeEditor.save();
						return false;
					}
				} );
				
				
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
<form id="formElem" name="formElem" action="{$form_tp}" method="post">
<div id="infograbbed">
		<div id="fields">
			<div>
				<p class="f120 mbot20 pad12 fontbold">OK, we have been able to get the following information for this video. Feel free to edit it, we are sure you can make it better ;-)</p>
			</div>
			<div class="fleft">
				<div class="mtop25"><img src="{$thumburl}" title="{$videoInfo->video_title}" /></div>
				<div class="mtop12"><span>{$videoInfo->video_length} min</span></div>
				
			</div>
			<div class="fleft w80pc pad12 mtopl25">
				<div class="fright">
					<a href="{$videourl}" target="_blank" title="Go to Youtube.com"></a>
				</div>	
				<div class="mtop12 mbot20">
					<div class="viewmode">
						<span class="fontbold">{$smarty.const._HWDVIDS_SHIGARU_TITLEVIDEO}</span>	<a href="#" id="grabbed-title" class="fontbold mleft6" title="Click to edit">(Edit)</a>
						<span class="grabbedtext">{$titleplain}</span>
						
					</div> 
					<div class="usermessages dispnon">
							<p id="titlebox">
                                <label for="videotitle">{$smarty.const._HWDVIDS_SHIGARU_TITLEVIDEO}</label>
                                <input type="text" class="required" value="{$titleplain}" size="40" name="videotitle" id="videotitle">
                                 <br>
								<span class="fieldexplanation"><span class="fontbold">Example:</span> {$smarty.const._HWDVIDS_SHIGARU_EXAMPLETITLE}</span>
                            </p>
                            <div class="current">
								<span class="fontbold">Current text: </span>
								<span class="grabbedtext">{$titleplain}</span>
							</div>
							<div class="clear"></div>
							<a href="#" id="cancel" class="fontbold mleft6" title="Click to cancel the changes">Cancel</a>
							<input type="button" value="{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_SAVECHANG}" id="yes" class="mtop24 reddbuttonsubmit">
					</div>
				</div>
				<div class="mbot20">
						<div class="viewmode">
							<span class="fontbold">{$smarty.const._HWDVIDS_SHIGARU_VIDEODESCRIP}</span>	<a href="#" id="grabbed-descrip" class="fontbold mleft6" title="Click to edit">(Edit)</a>
							<span id="descgrabbedtext" class="grabbedtext">{$descriptionplain}</span>
							
						</div> 
						<div class="usermessages dispnon">
								<p id="titlebox">
									<label for="videotitle">{$smarty.const._HWDVIDS_SHIGARU_VIDEODESCRIP}</label>
									<div id="wysigyginfovideo">
										  {$description}
									 </div>
									 <br>
									<span class="fieldexplanation"><span class="fontbold">Example:</span> {$smarty.const._HWDVIDS_SHIGARU_TEXTDESCRIPTION}</span>
								</p>
								<div class="current">
								</div>
								<div class="clear"></div>
								 <a href="#" id="cancel" class="fontbold mleft6" title="Click to cancel the changes">Cancel</a>
								<input type="button" value="{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_SAVECHANG}" id="yes" class="mtop24 reddbuttonsubmit">
						</div>				 
					  
				</div>
				<div class="mbot20">
					<div class="viewmode">
					   <span class="fontbold">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_SEARCH_TAGS}</span>	<a href="#" id="grabbed-tags" class="fontbold mleft6" title="Click to edit">(Edit)</a>
					  <span class="grabbedtext">{$videoInfo->tags}</span>
					  
					</div> 
						<div class="usermessages dispnon">
								<p id="tagsbox">
									<label for="tags">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_SEARCH_TAGS} <font class="required">*</font></label>
									<input type="text" value="{$videoInfo->tags}" class="required" id="tags" name="tags" size="40"/>
									<br />
									<span class="fieldexplanation">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_SEARCH_TAGS_INFO}</span>
								</p>
								<div class="clear"></div>
								<a href="#" id="cancel" class="fontbold mleft6" title="Click to cancel the changes">Cancel</a>
								<input type="button" value="{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_SAVECHANG}" id="yes" class="mtop24 reddbuttonsubmit">
						</div>	  
				</div>
            </div>
            <div class="clear"></div>
         </div>   
            <input type="button" class="mtop24 mbot20 reddbuttonsubmit" id="yesall" value="Ok" /> 

</div>
<div id="contentSliderForm" class="clear">
	<div id="wrapperSliderForm">
		<div id="steps">
			
			
			 <fieldset class="step">
						<legend>{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_VIDEO_DETAILS}</legend>
                            <p>
								<label for="category_id">{$smarty.const._HWDVIDS_SHIGARU_TYPEVIDEO} <font class="required">*</font></label>
                               {$categoryselect}
                               <div class="clear"></div>
                            </p>     
							<p class="songtutorialfields">
								<label for="originalband">{$smarty.const._HWDVIDS_SHIGARU_ORIGINBAND} <font class="required">*</font></label>
								<input type="text" value="" id="originalband" name="originalband" size="20" class="required" placeholder="Enter Band Name..." minlength="2"/>
								<br class="clear"/>
								<span class="fieldexplanation">{$smarty.const._HWDVIDS_SHIGARU_INFOTOBETTERCATEG}</span>
							</p>
							<p class="songtutorialfields">
								<label for="songtitle">{$smarty.const._HWDVIDS_SHIGARU_SONGTITLE} <font class="required">*</font></label>
								<input type="text" value="" id="songtitle" name="songtitle" size="20" placeholder="Enter Song Title..."/>
								<br class="clear"/>
							   <span class="fieldexplanation">{$smarty.const._HWDVIDS_SHIGARU_INFOTOBETTERCATEG}</span>
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
								<span class="fieldexplanation">{$smarty.const._HWDVIDS_SHIGARU_COPYRIGHTREASONS}</span>
                            </p> 
                            <p>
                                <label for="language_id">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_VIDEO_LANGUAGE} <font class="required">*</font></label>
                                {$languagesCombo}
                                <div class="clear"></div>
                            </p>   
                            <p>
                                <span class="mleft30">
                                {$captcha}
								</span>
								<br class="clear"/>
                                <label for="security_code">{$smarty.const._HWDVIDS_INFO_SECURECODE} <font class="required">*</font></label>
                                <input id="security_code" class="required" placeholder="Enter code" class="required mbot6" id="security_code" name="security_code" type="text" />
                                <br class="clear"/>
                            </p>
                            <p class="submit fright">
                                <button id="registerButton" type="submit">{$smarty.const._HWDVIDS_BUTTON_ADD}</button>
                            </p>
                           </fieldset>
                        <input type="hidden" value="" name="videotitle" id="videotitle">    
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
		</div>
	</div>



