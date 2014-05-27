(function(jQuery) {
  jQuery.fn.shigaruVideoList = function(options) {
	  
	var opts 			= jQuery.extend({}, jQuery.fn.shigaruVideoList.defaults, options);
	var $container 		= jQuery(opts.targetDiv);
	var $usercontainer 	= jQuery(opts.userTargetDiv);
	var $optionSets 	= jQuery(opts.optionLinks);
    var $optionLinks 	= $optionSets.find('a');
    var oListUrl 		= opts.listURL;
    var isISotopized	= false;
    var oUserUrl 		= "index.php?option=com_hwdvideoshare&task=ajax_userdetails&format=raw&user_id="+jQuery('#user_id').val()+'&lang='+currentLang;
    var oUserStatusUrl 	= "index.php?option=com_hwdvideoshare&task=ajax_setuserstatusmessage&format=raw&lang="+currentLang+'&user_id='+jQuery('#user_id').val();
    var oUserMenuUrl 	= "index.php?option=com_hwdvideoshare&task=ajax_usermenu&format=raw&lang="+currentLang+"&selected="+'&user_id='+jQuery('#user_id').val();
    
    return this.each(function() {
		if(opts.needsVideoListLoading){
			transformFiltersLinks();
			doLoadAjaxContent(oListUrl);
			activateLayoutLinks();
		}
		if(opts.needsHeaderProfile)
			doLoadAjaxUserDetails();	
		if(opts.needsUserMenu)
			doLoadAjaxUserMenu();	
	});
	
	function doPublishStatus(paramThis){
		var oMind = jQuery('#mind');
		var oMindText = oMind.val();
		if(oMindText.length > 0 && oMindText.length < 140){			
			var iThisIcon = paramThis.find('i'); 
			var oldClass = iThisIcon.attr('class');
			iThisIcon.removeClass().addClass('icon-spinner icon-spin');
			var posting = jQuery.post( oUserStatusUrl, { 'mind':  oMindText} );
			posting.done(function( data ) {
				$usercontainer.find('.tcursive').empty().append( oMindText );
				oMind.val('');
				iThisIcon.removeClass().addClass(oldClass);
				$usercontainer.find('#statuscharcount').html('140').removeClass('fontred');
				$usercontainer.find('#statuserror').hide();
				var $this = jQuery('#mind')
				$this.next().fadeOut();
				$this.animate({height:20});
			});
		 }else if(oMindText.length > 140){
			 jQuery('#statuserror').hide().find('.minlength').hide();
			 jQuery('#statuserror').fadeIn().find('.maxlength').show();
			 }else{
					jQuery('#statuserror').hide().find('.maxlength').hide();
					jQuery('#statuserror').fadeIn().find('.minlength').show();
				 }
		
		}
	
	function doLoadAjaxUserDetails(){
		$usercontainer.find(".loadingcontent").show();
		jQuery.ajax({
            url: oUserUrl
        }).done(function (data) {
			$usercontainer.html(data).find('a[title]').qtip({position: {show: {delay: 2000},my: 'top center',at: 'bottom center',adjust: {x: 0,y: 25},target: 'mouse'}});
			$usercontainer.find(".loadingcontent").hide();
			$usercontainer.fadeIn();
			$usercontainer.find('a.close').click(function(e){
				e.preventDefault();
				jQuery(this).parent().fadeOut();
			});
			$usercontainer.find('#publishmind').click(function(e){
				e.preventDefault();
				doPublishStatus(jQuery(this));
				e.stopPropagation();				
			});
			
			/*$usercontainer.find('.usersocialicon').click(function(e){
				e.preventDefault();
				var oParent = jQuery(this).parent().parent();
				if(oParent.hasClass('open'))
					oParent.removeClass('open').addClass('close');
					else
						oParent.removeClass('close').addClass('open');
			});*/
			
			
			
			jQuery('body').click(function () {
				var $this = jQuery('#mind')
				$this.next().fadeOut();
				$this.animate({height:20});
			});

			
			jQuery('#mind').focus(function(){
					$this = jQuery(this);
					$this.animate({
						height: 150
					}, "slow");
					$this.next().fadeIn();
				}).keyup(function(){
				var oMind = jQuery(this).val();
				var oCountSpan = jQuery('#statuscharcount');
				oCountSpan.removeClass('fontred');
				oCountSpan.html(140 - oMind.length);
				if(oMind.length > 140)
					oCountSpan.addClass('fontred');
					else
						oCountSpan.removeClass('fontred');
				}).click(function(e) {
						e.stopPropagation();
				   });;
			
			
			 jQuery('.profileoptions .btn').click(function(e) {
				var $this = jQuery(this);
				$this.parent().find('ul.dropdown-menu').toggle();
				return false;
			});
        });
		
		}
		
	function doLoadAjaxUserMenu(){
		jQuery.ajax({
            url: oUserMenuUrl
        }).done(function (data) {
			var $userMenuContainer = jQuery(opts.menuWrapper);
			$userMenuContainer.hide().html(data).find('a[title]').qtip({position: {show: {delay: 2000},my: 'top center',at: 'bottom center',adjust: {x: 0,y: 25},target: 'mouse'}});
			$userMenuContainer.find(".loadingcontent").hide();
			jQuery(opts.selectedUserMenu).addClass('active');
			$userMenuContainer.fadeIn();
        });
		
	}
	
	function doLoadAjaxContent(paramUrl){
		$container.html('<div class="loadingcontent" style="line-height:600px"><i class="icon-spinner icon-spin"></i> Loading...</div>');
		var oPosition = $container.position();	  
		if(opts.reScrollOnLoad)
			jQuery('html, body').animate({scrollTop:oPosition.top-50}, 'slow');	
		var oPattern = paramUrl;
		if(jQuery('#searchinput').val())
			oPattern += '&pattern='+jQuery('#searchinput').val();
		jQuery(opts.actionbars).block({ message: null });
		jQuery.ajax({
            url: oPattern
        }).done(function (data) {
			$container.hide().html(data).find('a[title]').qtip({position: {show: {delay: 2000},my: 'top center',at: 'bottom center',adjust: {x: 0,y: 25},target: 'mouse'}});
			$container.find('span[title]').qtip({position: {show: {delay: 2000},my: 'top center',at: 'bottom center',adjust: {x: 0,y: 25},target: 'mouse'}});
			var oPagination = $container.find('.videopagination').html();
			var oSearchsummary = $container.find('#searchsummary').html();
			$container.find('.videopagination').remove();
			$container.find('#searchsummary').remove();
			$container.fadeIn();
			jQuery(opts.paginationContainer).html(oPagination);
			jQuery('#searchsummarytext').html(oSearchsummary);
			$container.find(".loadingcontent").hide();
			jQuery(opts.actionbars).unblock();	  
			initVideoList();
        });
		
	}
	
	function transformPageUrls(e){	
			var oLimitStart	= '';
			var oHrefUrl	= e.target.href;
			console.log(oHrefUrl);
			if(oHrefUrl.indexOf("&limitstart=")>0){
				oLimitStart = oHrefUrl.substring(oHrefUrl.indexOf("&limitstart="),e.target.href.length);
				console.log(oLimitStart);
				if(oLimitStart.indexOf('&')>0)
					oLimitStart = oLimitStart.substring(0,oLimitStart.indexOf('&'));
				oLimitStart +=  "&limitstart="+oLimitStart;
				}
			console.log(oListUrl+oLimitStart+composeFiltersUrl()+composeOrderUrl());	
			return oListUrl+oLimitStart+composeFiltersUrl()+composeOrderUrl();	
			}
		
	function transformFiltersLinks(){	
			jQuery(opts.filtersLinks).click(function(e){
					if(!jQuery(e.target).is('input')){
						if(jQuery(e.target).siblings().is(':checked') || jQuery(e.target).parent().siblings().is(':checked')){
							jQuery(e.target).siblings().attr('checked',false);
							jQuery(e.target).parent().siblings().attr('checked',false);
						}else{
							jQuery(e.target).siblings().attr('checked','checked');
							jQuery(e.target).parent().siblings().attr('checked','checked');
							}
						e.preventDefault();	
					}
					if(isISotopized)
						$container.isotope( 'destroy' );
					doLoadAjaxContent(oListUrl+composeOrderUrl(e)+composeFiltersUrl());
					
				});
			jQuery(opts.filtersSelects).change(function(e){
					if(isISotopized)
						$container.isotope( 'destroy' );
					doLoadAjaxContent(oListUrl+composeOrderUrl(e)+composeFiltersUrl());
				});	
	}
	
	function composeOrderUrl(){
		var oSort = '&sort_by='+jQuery('#sort_by').val();
		return oSort;
	}
	
	
	
	function setPageActions(){
		jQuery(opts.paginationLinks).click(function(e){
					if(isISotopized)
						$container.isotope( 'destroy' );
					doLoadAjaxContent(transformPageUrls(e)+composeOrderUrl(e)+composeFiltersUrl());
					e.preventDefault();
					return false;
				});		
		}
	
		
	function initVideoList(){
      
      if($container.find('#noresultswrapper').length == 0){
				setPageActions();
				resetLayoutParams(jQuery('#resultcontainer .resultelement'));
				  prepareLayoutParameters($optionSets.find('.active').attr('data-option-value'));
				  $container.isotope({
					itemSelector : '.resultelement',
					masonry : {columnWidth : opts.masonryColumnWidth},
					masonryHorizontal : {rowHeight: opts.masonryHorizontalRowHeight},
					cellsByRow : {columnWidth : opts.cellsByRowColumnWidth, rowHeight: opts.cellsByRowRowHeight},	
					layoutMode:$optionSets.find('.active').attr('data-option-value')
				  },function(){
					  isISotopized = true;
					  jQuery('.videolistoptions .btn').click(function(e) {
							var $this = jQuery(this);
							$this.toggleClass("active");
							$this.next('ul.dropdown-menu').toggle();
							return false;
						});
						jQuery('body').click(function () {
							jQuery('.videolistoptions ul.dropdown-menu').hide();
							if(jQuery('.videolistoptions .btn').hasClass('active'))jQuery('.videolistoptions .btn').removeClass('active');
						});
					  });
					  
					  jQuery(".dropdown-menu .editvideobutton").click(function (e) {
							e.preventDefault();
							jQuery(this).prev().submit();
						});
						
						jQuery(".dropdown-menu .deletevideobutton").click(function (e) {
							e.preventDefault();
							var oDeleteEvent = e;
							jQuery.blockUI({
								message: 	'<p class="shigarunotice"><span id="close"></span>'+
												jQuery('#deletevideomessage').html()+	
											'</p>',
								css: {
									top: (jQuery(window).height() - 200) / 2 + "px",
									left: (jQuery(window).width() - 400) / 2 + "px",
									height: "200px",
									width: "400px",
									"overflow-y:": "auto"
								}
							});
							jQuery(".shigarunotice #close,.blockUI .cancel").click(function (e) {
								e.preventDefault();
								jQuery.unblockUI();
							});
							jQuery(".blockUI .btn-danger").click(function (e) {
								e.preventDefault();
								jQuery(oDeleteEvent.target).prev().submit();
							});
						});
				}else{
					}
	}
	
	function composeFiltersUrl(){
		var oParamName = '';
		
		jQuery('#resultfilters .filter:visible').each(function(){	
				if(jQuery(this).hasClass('filtercheck')){
					
						var $oThis = jQuery(this).find('input:checked');
						if($oThis.length>0 )
							oParamName += '&'+jQuery(this).attr('id')+'=';
						jQuery($oThis).each(function(i){
							if(jQuery(this).val() !=''){
								if(i==$oThis.length-1)	
									oParamName += jQuery(this).val();
									else
										oParamName += jQuery(this).val()+',';
							}		
						});
					}else{
						var $oThis = jQuery(this).find('select');
						if($oThis.length>0)
							oParamName += '&'+jQuery(this).attr('id')+'=';
						jQuery($oThis).each(function(i){
								if(jQuery(this).val())
									oParamName += jQuery(this).val();
								
							});
						}	
				
			});	
		return oParamName;
	}
	
	function resetLayoutParams(paramItems){
		   paramItems.find('.twolinestitle').show();
		   paramItems.find('.longtitle').hide();
		   paramItems.find('.searchResultInfo').hide().css({'margin':'0','border-left':'none','padding':'0'}).parent().css('width','100%').prev().css('width','100%');
		   paramItems.css(opts.layoutDefaultCss[0]);
		   paramItems.find('img.bradius5').css(opts.layoutDefaultImgCss[0]).prev().css(opts.layoutDefaultImgCss[0]);
		   jQuery('.searchResultInfo .extendedinfo').hide();
		}
	
	function prepareLayoutParameters(paramMode){
		var oItems = jQuery('#resultcontainer .resultelement');	
		switch(paramMode){
					case 'masonry':
								oItems.css(opts.masonryCss[0]);
								oItems.find('.searchResultInfo').hide();
								oItems.find('.thumbplay').css('margin','20px 0 0 28px');
								break;
					case 'cellsByRow':
								oItems.css(opts.cellsByRowCss[0]).animate({ width: "340px",height: "210px"});
								  oItems.find('img.bradius5').css(opts.cellsByRowImgCss[0]).prev().css(opts.cellsByRowImgCss[0]).parent().next().css('margin-top','-20px');
								  oItems.find('.thumbplay').css('margin','40px 0px 0px 55px');
								  jQuery('.searchResultInfo').css({'border-bottom':'none','margin':'3px 0 0 0', 'padding-bottom':'3px', 'padding-top':'0'}).show();
								break;				
					case 'straightDown':
								oItems.css(opts.straightDownCss[0]).find('.searchResultInfo').addClass('fleft').prev().addClass('fleft');
								oItems.animate({width: "98%"});
								  oItems.find('img.bradius5').css(opts.straightDownImgCss[0]).prev().css(opts.straightDownImgCss[0]).parent().next().css('margin-top','-20px');
								  jQuery('.searchResultInfo .extendedinfo').fadeIn();
								  jQuery('.searchResultInfo').css({'border-left':'1px dotted gray','border-bottom':'none','padding-left':'12px'}).show().parent().css('width','60%').prev().css('width','40%');
								  oItems.find('.twolinestitle').hide();
								  oItems.find('.longtitle').show();
								  oItems.find('.thumbplay').css('margin','40px 0px 0px 55px');
								break;			
					  }
		}	
	
	function changeLayoutMode( $link, options ) {
		var oItems = jQuery('#resultcontainer .resultelement');	
		resetLayoutParams(oItems);
		$container.isotope(options);
		isISotopized = true;		
		prepareLayoutParameters(options.layoutMode);
      }
      
      
      function activateLayoutLinks(){
			$optionLinks.click(function(){
				var $this = jQuery(this);
				// don't proceed if already selected
				if ( $this.hasClass('active') ) {
				  return false;
				}
				var $optionSet = $this.parents('.btn-group');
				$optionSet.find('.active').removeClass('active');
				$this.addClass('active');
				
				var options = {},
					key = $optionSet.attr('data-option-key'),
					value = $this.attr('data-option-value');
				
				value = value === 'false' ? false : value;
				options[ key ] = value;
				if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' )
				  changeLayoutMode( $this, options );
					else
						$container.isotope( options );
				return false;
			});
			
			jQuery('#sort_by').change(function(e){
					if(isISotopized)
					$container.isotope( 'destroy' );
					doLoadAjaxContent(oListUrl+composeOrderUrl(e)+composeFiltersUrl());
					e.preventDefault();
					return false;
			});
		  
		  }
		  
	

  }

  jQuery.fn.shigaruVideoList.defaults = {
	paginationLinks:'span.pagination a.page',
	targetDiv:'#resultcontainer',
	userTargetDiv:'#usersection',
	orderLinks:'#resultordering a',
	sortDefault: 'relevance',
	optionLinks:'#options .btn-group',
	filtersLinks: '#resultfilters .filter .widget input,#resultfilters .filter .widget a',
	filtersSelects: '#resultfilters .filter .widget select',
	paginationContainer: '.vidlistoptbar .vidlistpagination',
	actionbars:'.vidlistoptbar',
	menuWrapper:'#usermenuwrapper',
	listURL : 'index.php?option=com_hwdvideoshare&Itemid=29&task=displayresults&ajax=yes&format=raw&lang='+currentLang,
	masonryColumnWidth : 275,
	masonryHorizontalRowHeight: 200,
	cellsByRowColumnWidth : 380, 
	cellsByRowRowHeight: 225,	
	needsVideoListLoading: true,
	needsHeaderProfile: true,
	needsUserMenu: false,
	selectedUserMenu: '#whattowatch',
	reScrollOnLoad:false,
	layoutDefaultCss:[{'width': "245px",'height':'150px',fontSize:'100%','padding':'4px 0 0 0','border':'none',margin:0}],
	layoutDefaultImgCss: [{ width: "98px"}],
	masonryCss:[{'border-bottom':'1px dotted gray','margin':'12px 0px 0px 4px'}],
	masonryImgCss:[{'border-bottom':'1px dotted gray','margin':'12px 0px 0px 4px'}],
	cellsByRowCss: [{'border-bottom':'1px dotted gray',fontSize:'100%','padding-top':'0','margin':'-12px 0 0 -12px'}],
	cellsByRowImgCss: [{ width: "136px"}],
	straightDownCss: [{height: "140px",fontSize:'120%','border-bottom':'1px dotted gray', 'padding':'4px 2px 2px 0'}],
	straightDownImgCss: [{width: "133px"}]
  }
  
})(jQuery);
