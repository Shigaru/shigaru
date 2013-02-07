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
<script type="text/javascript" src="{$domain}templates/rhuk_milkyway/js/chosen.jquery.min.js"></script>
<div class="content_box">
<h3>{$smarty.const._HWDVIDS_SHIGARU_ONEOFTWO}</h3>
{include file='header.tpl'}
 </div>
<script>
	var domain 				= "{$domain}";
	var currentLang 		= "{$currentlang}";
	var fromError 			= {$fromerror};
	var selectedgenre 		= "{$selectedgenre}";
	var selectedtype 		= "{$selectedtype}";
	var selectedtareyou 	= "{$selectedtareyou}";
	var selectedtinst 		= "{$selectedtinst}";
	var selectedband 		= "{$selectedband}";
	var selectedsong 		= "{$selectedsong}";
	var selectedlevel 		= "{$selectedlevel}";
	var selectedlang 		= "{$selectedlang}";
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
		//jQuery('select#genre_id,select#language_id,select#intrument_id').addClass('fleft').addClass('w30pc').chosen({allow_single_deselect:true});
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
				
				
		}else{
				jQuery("#language_id").val(currentLang);
				jQuery('#category_id').val(selectedtype);
				jQuery('#genre_id').val(selectedgenre);
				jQuery("#intrument_id").val(selectedtinst);
				jQuery("#original_autor").val(selectedtareyou);
				jQuery("#originalband").val(selectedband);
				jQuery("#songtitle").val(selectedsong);
				jQuery("#level_id").val(selectedlevel);
				jQuery("#language_id").val(selectedlang);
				
				if(jQuery('#category_id').val()=='1' || jQuery('#category_id').val()=='2'){
						if(selectedband !='' )
							jQuery('.songtutorialfields').fadeIn(500);
							else
								jQuery('#songtitle').parent().fadeIn(500);
				}
			}
			jQuery('#category_id').change(function() {	
				if(jQuery(this).val()=='1' || jQuery(this).val()=='2'){
					if(isSearched && !isSearchedSuccess){
							jQuery('.songtutorialfields').fadeIn(500);
						}else {
							jQuery('#songtitle').parent().fadeIn(500);
						}
				jQuery('#genrehint').fadeOut();
				}else{
					jQuery('.songtutorialfields').slideUp();
					if(jQuery(this).val()=='3')
					jQuery('#genrehint').fadeIn();
					else
					jQuery('#genrehint').fadeOut();
				}
				
						
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

			var videovalidator =	jQuery('#formElem').validate( {
					ignoreTitle : true,
					errorClass: 'result_warning fontred',
					// debug: true,
					cbIsOnKeyUp: false,
					highlight: function( element, errorClass ) {
						jQuery( element ).parent().addClass( 'validationError' );
					},
					unhighlight: function( element, errorClass ) {
						if ( this.errorList.length == 0 ) {
							firstInvalidFieldFound = 0;
						}
						if(jQuery( element ).parent().hasClass( 'validationError' )){
							jQuery( element ).parent().removeClass( 'validationError' ).next().fadeOut();
							}
					},
					errorElement: 'span',
					errorPlacement: function(error, element) {
						if(!element.parent().next().hasClass('result_warning')){
							jQuery(error[0]).prepend('<span class="icon-minus-sign pad6 mright6"></span>').insertAfter(element.parent());
							error.css('cursor','pointer');
							element.parent().next().click(function(){
								jQuery(this).fadeOut();
								});
						}else if(element.parent().next().hasClass('result_warning')){
								element.parent().next().fadeIn();
							}
						
					},
					rules: {
						originalband: {required: function(element){
							return ((jQuery("#category_id").val() == '1' && !isSearchedSuccess && jQuery(element).is(":visible")))
						  }
						 },
						 songtitle: {required: function(element){
							return ((jQuery("#category_id").val() == '1'))
						  }
						 }
						 
					}, messages: {
						originalband: {
							required: "Please add a band for this song / tune"
						},
						songtitle: {
							required: "Please insert the name of the song / tune in this box"
						}
					},
					submitHandler: function(form) {
					   jQuery("#registerButton").attr("disabled", "disabled").attr("value","Submitting...");;
					   form.submit();
					 },
					beforeSubmit: function() { 
						tinyMCE.activeEditor.save();
						return false;
					}
				} );
				
				
			var lastData;
			
			function initiateSearch(paramSecondTry){
				if(jQuery('#songtitle').valid() || (jQuery('#songtitle').val().length > 2 && jQuery('#category_id').val() == '2')){
					isSearched = true;
					jQuery('#tryhere').hide();
					if(inputPattern != jQuery('#songtitle').val() || paramSecondTry){
						inputPattern = jQuery('#songtitle').val();	
						jQuery( '#songresults' ).css('box-shadow','none').html('<div class="mtop25 pad12 tcenter" id="loadingMessage"></div><div class="mleft12 fontbold f120"></div>');
						searchSong(inputPattern,paramSecondTry);
								jQuery.blockUI({ 
									message: jQuery('#search-form'),
									css: { 
										width: '40%', 
										height: '80%', 
										top: '10%', 
										left: '30%',  
										'text-align':'left'
									} 
								});	
								
							} else{
								jQuery('#tryhere').show();
								jQuery.blockUI({ 
									message: jQuery('#search-form'),
									css: { 
										width: '40%', 
										height: '80%', 
										top: '10%', 
										left: '30%',  
										'text-align':'left'
									} 
								});	
								}
					}		
				}
			
			function searchSong(paramPattern,paramSecondTry){
				var oSecondTryParam = (paramSecondTry)?'&redosearch=1':'&redosearch=0';				
				jQuery.ajax({
						  url: domain+"index.php?option=com_hwdvideoshare&task=ajax_searchsong&pattern="+paramPattern+oSecondTryParam,
						  context: document.body
						}).done(function(data) {
							jQuery('.blockUI #close').click(function(){jQuery.unblockUI();isSearchedSuccess = false; jQuery('#issearched').val('0'); jQuery('#originalband').parent().fadeIn(500);});
							if(jQuery.trim(data).length > 0){
								var oHeight = 0;
								if(!paramSecondTry)
									oHeight = (jQuery( '.blockMsg' ).height()-(jQuery( '#search-form .novideos' ).height()*2)-50)+'px';
										else
											oHeight = (jQuery( '.blockMsg' ).height()-(jQuery( '#search-form .novideos' ).height())-25)+'px';
							jQuery( '#songresults' ).css({
								'height':oHeight,
								'box-shadow':'1px 4px 13px #ccc'
								}).empty();
							jQuery('<div class="results dispnon"><ul class="unstyled">'+data+'</ul>').clone().appendTo( '#songresults' );
							jQuery('.blockUI .results').fadeIn('slow',function(){
								if(!paramSecondTry)
									jQuery('#tryhere').fadeIn();
								});
							jQuery('.blockUI .results li').click(function(){
								jQuery('#songtitle').val(jQuery(this).find('div span.songname').html());
								jQuery('#songindex').val(jQuery(this).attr('id'));
								jQuery('#issearched').val('1');
								jQuery('#originalband').parent().slideUp(500);
								jQuery.unblockUI();
								isSearchedSuccess = true;
								});
							} else{
								jQuery('#songresults').html('<div class="padding novideos pad12 fontbold tcenter"><span class="icon-tint"></span>No matching songs for these text. You might want to re-enter text. If you are sure about the name of the song just close this window and we will store it as a new song</div>');
								}	
						});
				}
			
			var inputPattern;
			var isSearched = false;
			var isSearchedSuccess = false;
			
			jQuery( "#tryhere" ).click(function(e){
					 e.preventDefault();
					 initiateSearch(true);
				});
			
			jQuery( ".step .butn-info" ).click(function(e){
					 e.preventDefault();
					 initiateSearch(false);
					});
		});
</script>
{/literal}


    <div id="search-form" class="dispnon curdef">
		<a id="close" class="close"></a>
		<div class="padding novideos pad12 fontbold tcenter"><span class="icon-info-sign fontgreen pad6 f120"></span>To make a selection simply click on a song title</div>
		<div id="songresults" >
		</div>
		<div id="tryhere" class="dispnon fontbold padding novideos pad12 tcenter">Couldn't find the song title? Try <a href="#" title="Click on this link to get search more search results"  class="fontred">here</a></div>
	</div>

<div class="f100 mtopl50">{$smarty.const._HWDVIDS_SHIGARU_FILLUPTHIS}</div>
<form id="formElem" name="formElem" action="{$form_tp}" method="post">
<div id="infograbbed">
		<div id="fields">
			<div>
				<p class="f120 mbot20 pad12 fontbold">OK, we have been able to get the following information for this video. Feel free to edit it, we are sure you can make it better ;-)</p>
			</div>
			<div class="fleft">
				<div class="mtop25"><img src="{$videoInfo->thumbnail}" title="{$videoInfo->video_title}" /></div>
				<div class="mtop12"><span>{$videoInfo->video_length} min</span></div>
				
			</div>
			<div class="fleft w80pc pad12 mtopl25">
				<div class="fright">
					<a href="{$videourl}" target="_blank" class="{$videoInfo->videoclass}" title="Go to Youtube.com"></a>
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
					  <span class="grabbedtext">{$videoInfo->tags},how to play, how to, Learn how, learn to, lesson, teach, tutorial, teacher, explained, class, music, learn how, educational, instructional, learning, watch, repeat, visual, break down, step by step</span>
					  
					</div> 
						<div class="usermessages dispnon">
								<p id="tagsbox">
									<label for="tags">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_SEARCH_TAGS} <font class="required">*</font></label>
									<input type="text" value="{$videoInfo->tags},how to play, how to, Learn how, learn to, lesson, teach, tutorial, teacher, explained, class, music, learn how, educational, instructional, learning, watch, repeat, visual, break down, step by step" class="required" id="tags" name="tags" size="40"/>
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
                            <p class="clearfix">
								<label for="category_id">{$smarty.const._HWDVIDS_SHIGARU_TYPEVIDEO} <font class="required">*</font></label>
                               {$categoryselect}
								<div class="clear"></div>
                            </p>  
                            <p class="songtutorialfields dispnon clearfix">
								<label for="originalband">{$smarty.const._HWDVIDS_SHIGARU_ORIGINBAND} <font class="required">*</font></label>
								<input type="text" value="" id="originalband" name="originalband" size="40" class="required" placeholder="Enter Band Name..." minlength="2"/>
								<br class="clear"/>
							</p>   
                            <p class="songtutorialfields dispnon clearfix">     
								<label for="songtitle">{$smarty.const._HWDVIDS_SHIGARU_SONGTITLE} <font class="required">*</font></label>
								<input type="text" value="" id="songtitle" name="songtitle" size="25" placeholder="Enter the song title and click the button" minlength="3"/>
								<a href="#" class="mleft12 mtop2 fleft butn butn-small butn-info" title="Click on the button to retrieve for the song"><span class="icon-search bradius5 mright6"></span>Retrieve info</a>
                               <div class="clear"></div>
							</p>
                           <p class="clearfix">
                                <label for="genre_id">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_MUSIC_GENRE} <font class="required">*</font></label>
                                {$genresCombo}
                                <span id="genrehint" class="dispnon f80 fleft mleft12 mtop12"><span class="icon-key pad6 fontgreen"></span> Select &quot;Instructional &amp; theory&quot; if not applicable or if you are unsure</span>
                                <div class="clear"></div>
                            </p>       
							<p class="clearfix">
                                <label for="intrument_id">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_INSTRUMENT} <font class="required">*</font></label>
                                {$instrumentsCombo}
                                <div class="clear"></div>
                            </p>   
							 <p class="clearfix">
                                <label for="level_id">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_LEVEL} <font class="required">*</font></label>
                                {$levelsCombo}
                                <div class="clear"></div>
                            </p>
							
				 		  
                            <p class="clearfix" id="originalautorfields">
                                <label for="original_autor">{$smarty.const._HWDVIDS_SHIGARU_AREYOUCREATOR} <font class="required">*</font></label>
								<label class="fnone fnormal">{$smarty.const._HWDVIDS_SHIGARU_YES}<input type="radio" {if $selectedtareyou eq 1}checked="true"{/if} name="original_autor" value="1"></label>
								<label class="fnone fnormal">{$smarty.const._HWDVIDS_SHIGARU_NO}<input type="radio" name="original_autor" {if $selectedtareyou eq 0}checked="true"{/if} value="0"></label>
								<div class="clear"></div>
								<span class="fieldexplanation">{$smarty.const._HWDVIDS_SHIGARU_COPYRIGHTREASONS}</span>
                            </p> 
                            <p class="clearfix">
                                <label for="language_id">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_VIDEO_LANGUAGE} <font class="required">*</font></label>
                                {$languagesCombo}
                                <div class="clear"></div>
                            </p>   
                            <p class="clearfix">
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
                        <input type="hidden" value="{$videoInfo->video_title}" name="videotitle" id="videotitle">    
                        <input type="hidden" value="{$username}" id="shigaruuser" name="shigaruuser"/>
                        <input type="hidden" value="{$ipaddress}" id="ip_address" name="ip_address"/>
                        <input type="hidden" name="videotype" value="{$videotype}" />
						<input type="hidden" name="video_id" value="{$videoInfo->video_id}" />
						<input type="hidden" name="video_length" value="{$videoInfo->video_length}" />
						<input type="hidden" name="infopassed" value="{$infoPassed}" />
						<input type="hidden" name="ip_added" value="{$ipaddress}" />
						<input type="hidden" name="songindex" id="songindex" value="{$videoInfo->songindex}" />
						<input type="hidden" name="issearched" id="issearched" value="{$videoInfo->issearched}" />
						<input type="hidden" name="thumbnailgrab" value="{$videoInfo->thumbnail}" />
						<input name="embeddump" value="{$videourl}" class="inputbox" type="hidden" />
						{include file='sharingoptions.tpl'}
				</form>
				</div>
		</div>
	</div>
{if $fromerror eq 1}
</div>
{/if}


