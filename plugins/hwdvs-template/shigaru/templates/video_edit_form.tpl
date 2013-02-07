{* 
//////
//    @version [ Masterton ]
//    @package hwdVideoShare
//    @copyright (C) 2007 - 2009 Highwood Design
//    @license http://creativecommons.org/licenses/by-nc-nd/3.0/
//////
*}
<script type="text/javascript" src="{$domain}components/com_comprofiler/js/jquery-1.5.2/jquery.validate.min.js?v=020b12f257965e65"></script>
<script type="text/javascript" src="{$domain}templates/rhuk_milkyway/js/jquery.tagsinput.min.js"></script>
<link rel="stylesheet" type="text/css" href="{$domain}templates/rhuk_milkyway/css/jquery.tagsinput.css" />
<script type="text/javascript">
	
	var intrument_id = "{$intrument_id}";
	var level_id = "{$level_id}";
	var genre_id = "{$genre_id}";
	var language_id = "{$language_id}";
	var category_id = "{$category_id}";
	{literal}
	jQuery(document).ready(function() {
		
			jQuery('#category_id').val(category_id);
			if(genre_id=='0')
				jQuery('#genre_id').val('OTHER');
				else
				jQuery('#genre_id').val(genre_id);
			if(intrument_id=='0')
				jQuery('#intrument_id').val('OTHER');
				else
				jQuery('#intrument_id').val(intrument_id);
			jQuery('#level_id').val(level_id);
			jQuery('#language_id').val(language_id);
			if(category_id=='1' || category_id=='2')
				jQuery('.songtutorialfields').fadeIn(500,function () {
				  });
				  
				  
		
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
			jQuery('#tags').tagsInput({width:'auto'});
			
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
							  url: "index.php?option=com_hwdvideoshare&task=ajax_searchsong&pattern="+paramPattern+oSecondTryParam,
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
									jQuery('#originalband').val(jQuery(this).find('div span.songname').next().html()).parent().slideUp(500);
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
		
		jQuery('#registerButton').click(function(){
					tinyMCE.activeEditor.save();	
			});
		
		
		jQuery('#videoupload').validate( {
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
				
{/literal}	
</script>	
<div id="search-form" class="dispnon curdef">
		<a id="close" class="close"></a>
		<div class="padding novideos pad12 fontbold tcenter"><span class="icon-info-sign fontgreen pad6 f120"></span>To make a selection simply click on a song title</div>
		<div id="songresults" >
		</div>
		<div id="tryhere" class="dispnon fontbold padding novideos pad12 tcenter">Couldn't find the song title? Try <a href="#" title="Click on this link to get search more search results"  class="fontred">here</a></div>
	</div>
<div id="contentSliderForm" class="clear">
	<div id="wrapperSliderForm">
		<div id="steps">
		   <form name="videoupload" id="videoupload" action="{$form_save_video}" method="post" enctype="multipart/form-data">
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
						<input type="text" class="required w63" value="{$titleplain}" name="title" id="title">
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
					<p class="songtutorialfields dispnon clearfix">
								<label for="originalband">{$smarty.const._HWDVIDS_SHIGARU_ORIGINBAND} <font class="required">*</font></label>
								<input type="text" value="{$band_id}" id="originalband" name="originalband" size="40" class="required" placeholder="Enter Band Name..." minlength="2"/>
								<br class="clear"/>
							</p>   
                            <p class="songtutorialfields dispnon clearfix">     
								<label for="songtitle">{$smarty.const._HWDVIDS_SHIGARU_SONGTITLE} <font class="required">*</font></label>
								<input type="text" value="{$song_id}" id="songtitle" name="songtitle" size="25" placeholder="Enter the song title and click the button" minlength="3"/>
								<a href="#" class="mleft12 mtop2 fleft butn butn-small butn-info" title="Click on the button to retrieve for the song"><span class="icon-search bradius5 mright6"></span>Retrieve info</a>
                               <div class="clear"></div>
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
						<label class="fnone fnormal">{$smarty.const._HWDVIDS_SHIGARU_YES}<input type="radio" {if $original_autor eq 1}checked="true"{/if} name="original_autor" value="1"></label>
						<label class="fnone fnormal">{$smarty.const._HWDVIDS_SHIGARU_NO}<input type="radio" name="original_autor" {if $original_autor eq 0}checked="true"{/if} value="0"></label>
						<div class="clear"></div>
						</p> 
					<p>
						<label for="language_id">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_VIDEO_LANGUAGE} <font class="required">*</font></label>
						{$languagesCombo}
						<div class="clear"></div>
					</p>   
					<p class="submit fright">
						<a href="{$referrer}" id="cancel" class="mtop24 fontbold mleft6" title="Click to cancel the changes">{$smarty.const._HWDVIDS_BUTTON_CANX}</a>
						<button id="registerButton" type="submit">{$smarty.const._HWDVIDS_SHIGARU_SHIGAR_SAVECHANG}</button>
					</p>
				   </fieldset>
					
					{if $print_sharingoptions}
					  {include file='sharingoptions.tpl'}
					{/if}

					<input type="hidden" name="referrer" value="{$referrer}" />
					<input type="hidden" name="id" value="{$rowid}" />
					<input type="hidden" name="owner" value="{$rowuid}" />
					<input type="hidden" name="songindex" id="songindex" value="{$videoInfo->songindex}" />
					<input type="hidden" name="issearched" id="issearched" value="{$videoInfo->issearched}" />
				</form>
				</div>
		</div>
	</div>





