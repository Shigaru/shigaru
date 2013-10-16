var $jq = jQuery.noConflict();
jQuery(document).ready(function($){
	
	jQuery.blockUI.defaults.css = {backgroundColor:'#fff'};
	
	/* Analytics bounce parameters */
	setTimeout(function() {
	  _gaq.push(['_trackEvent', 'NoBounce', 'NoBounce', 'Over 80 seconds']);	
		},80*1000);
	
	setTimeout(function() {
		jQuery(document).ajaxSend(function() {
		  _gaq.push(['_trackEvent', 'NoBounce', 'NoBounce', 'Ajax sent after 30 seconds']);	
		});
	},30*1000);
	if(jQuery('#the_most .tab_wrapper').length>0){
		/* Scroll bars */
	//jQuery('#the_most .tab_wrapper, .workarea .leftcolumn div.video_activity div.tab_wrapper, .workarea .rightcolumn div.video_activity div.tab_wrapper').jScrollPane({showArrows:true});
	
	/* Tabs */
	jQuery('#the_most_title').shigaruTabs({slidesWrapper:'#the_most_wrapper',effect:'fade'});
	jQuery('.leftcolumn .video_activity_header').shigaruTabs({slidesWrapper:'.leftcolumn .slidesWrapper'});
	jQuery('.rightcolumn .video_activity_header').shigaruTabs({slidesWrapper:'.rightcolumn .slidesWrapper'});
	jQuery('.workarea_odd .video_activity .video_activity_header').shigaruTabs({slidesWrapper:'.workarea_odd .video_activity .slidesWrapper'});
	}
	if(jQuery('#the_most_title').length >0){
		jQuery.ajax({
			  url: 'index.php?option=com_hwdvideoshare&lang=en&task=ajax_showtabs&format=raw&listtype=being'
			}).done(function(data) {
				jQuery('#beingwatched .content_box h3').after(data)
				jQuery('#beingwatched .content_box .slidesWrapper li a').qtip({position: {show: {delay: 2000},my: 'top center',at: 'bottom center',adjust: {x: 0,y: 25},target: 'mouse'}});
				jQuery('.beingwatched_header').shigaruTabs({slidesWrapper:'#beingwatched .slidesWrapper',controls:true,hideTabs:true,directionOfSorting:'left'});
				});
	}
	jQuery('#roksearch_search_str').liveSearch({url: 'index.php?option=com_hwdvideoshare&task=displayresults&limit=6&format=raw&fromtop=1&ajax=yes&pattern='});
	jQuery('.usermessages div a.close').click(function(){
			jQuery.unblockUI();
			jQuery(this).parent().parent().fadeOut();
		});
	
	
	jQuery('#grettings').click(function(e) {
		var $this = jQuery(this);
		$this.toggleClass("userzoneopen");
		$this.find('ul.dropdown-menu').toggle();
		e.stopPropagation();	
	});
	
	jQuery('body').click(function () {
			jQuery('#topnavmenu ul.dropdown-menu').hide();
			if(jQuery('#grettings').hasClass('userzoneopen'))jQuery('#grettings').removeClass('userzoneopen');
		});

	// Login Form	
	jQuery('#login a.dropper,#lang a.dropper').click(function(e) {
		 e.preventDefault();
                if(!jQuery(this).parent(".topbuttons").hasClass("menu-open")){
					jQuery(".menu-open .floatingBox").hide();
					jQuery(".menu-open").removeClass("menu-open");
                }
                jQuery(e.target).parent("a").siblings(".floatingBox").toggle();
                jQuery(e.target).parent("a").parent(".topbuttons").toggleClass("menu-open");
            });

            jQuery(".topbuttons").mouseup(function() {
            });
            jQuery(document).mouseup(function(e) {
                if(jQuery(e.target).parent("a").parent(".topbuttons").length==0) {
                    jQuery(e.target).parent("a").parent(".topbuttons").removeClass("menu-open");
                    jQuery(e.target).parent("a").siblings(".floatingBox").hide();
                }
            });        

	
	
	/* Adding a colortip to any tag with a title attribute: */
		
	jQuery('.workarea a[title]').qtip({position: {show: {delay: 2000},my: 'top center',at: 'bottom center',adjust: {x: 0,y: 25},target: 'mouse'}});
});

(function(jQuery) {
  jQuery.fn.shigaruToolTip = function(options) {
	return this.each(function() {
		bindFollowDiv(this);	
	});
	
	function bindFollowDiv(paramthis){
		var moveDown = 21;
		var oBindElem = jQuery(paramthis);
		var moveLeft = 100;
		var oCommTooltip = jQuery('#communitytooltip');
		var oLeftPosition;
		oBindElem.hover(function(e) {	
			oCommTooltip.html(oBindElem.find('.pe-description').clone().show());
			if((oBindElem.offset().left + 220) > (jQuery(window).width()-200))
				oCommTooltip.css('left',oBindElem.offset().left - moveLeft - (200 - moveLeft));
					else
						oCommTooltip.css('left',oBindElem.offset().left + moveLeft);
			oCommTooltip.css({'z-index':10000,'top':oBindElem.offset().top+ moveDown}).fadeIn();
			 }, function() {
			oCommTooltip.hide().css( 'z-index', 9999 );
		  }); 
		}
	}	
})(jQuery);	




(function(jQuery) {
  jQuery.fn.shigaruTabs = function(options) {
	  
	var opts 										= jQuery.extend({}, jQuery.fn.shigaruTabs.defaults, options);
	var oTabs 										= jQuery(this).find('ul li a');
	var oSlides 									= jQuery(opts.slidesWrapper+' '+opts.slidesSelector);
	var oTabControls 								= oSlides.find('div.tabmodcontrols .btn');
	var oSlideWidth 								= oSlides[0].offsetWidth;
	var oNumberOfSlides 							= oSlides.length;
	var oCurrent, oHRef, oSelected  				= null;
	var oCurrentIndex								= 0;
	
    return this.each(function() {
		switch(opts.effect){
			case 'rotate':
						jQuery(oSlides).each(function(i,e){
								var oSlideObject = jQuery(e);
								if(i!=0){
									oSlideObject.find('ul li a.thumbplay').css('display','none');
									oSlideObject.find('ul li a .categoryinfothumb').css('display','none');
								}
								if(oSlideObject.hasClass('ajaxload')) loadAjaxContent(oSlideObject);
								if(oSlideObject.hasClass('loadondemand')) jQuery(oTabs[i]).click(loadContentOnDemand);
								if(oSlideObject.hasClass('loaded')) oSlideObject.find('.tabscroller').jScrollPane({showArrows:true});
								
							});
						
						jQuery(opts.slidesWrapper).css('overflow', 'hidden');
						oSlides.wrapAll('<div class="slideInner"></div>').css({'float' : opts.directionOfSorting,'width' : oSlideWidth});
						jQuery(opts.slidesWrapper +' .slideInner').css('width', oSlideWidth * oNumberOfSlides);

						oTabs.click(rotateTabs);
						break;
			case 'fade':
						oSlides.each(function(i,elem){
							if(i>0)jQuery(this).fadeOut();
								if(jQuery(this).hasClass('ajaxload')) loadAjaxContent(jQuery(this));
								if(jQuery(this).hasClass('loadondemand')) jQuery(oTabs[i]).click(loadContentOnDemand);
								if(jQuery(this).hasClass('loaded')) jQuery(this).find('.tabscroller').jScrollPane({showArrows:true});
						});
						oTabs.click(fadeTabs);
						break;	
		}	
		
		if(oTabControls.length > 0)
			setControlsAction(oTabControls);
    });
    
    function setControlsAction(paramTabControls){
			paramTabControls.each(function(i,elem){
					var oControlObject = jQuery(elem);
					if(oControlObject.hasClass('date'))
						oControlObject.click(setDateOrdering);
						else if (oControlObject.hasClass('tabreload'))
							oControlObject.click(reloadContent);
				});
		}
	
	function reloadContent(e){
			var oRefreshElement = jQuery(oTabs.parent('li.selected').children('a').attr('href'));
			jQuery(e.target).addClass('active').find('.icon-repeat').removeClass('icon-repeat').addClass('active icon-refresh icon-spin');
			if(oRefreshElement.hasClass('loadedondemand')){
				oRefreshElement.removeClass('loadedondemand');
				}
			loadAjaxContent(oRefreshElement);
			e.preventDefault();
		}	
		
    function setDateOrdering(e){
			var oRefreshElement = jQuery(oTabs.parent('li.selected').children('a').attr('href'));
			oRefreshElement.find('.tabmodcontrols a.active').removeClass('active');
			jQuery(e.target).addClass('active');
			if(oRefreshElement.hasClass('loadedondemand')){
				oRefreshElement.removeClass('loadedondemand');
				}
			loadAjaxContent(oRefreshElement);
			e.preventDefault();
		}
			
    
    function loadAjaxContent(paramElem){
		var oVideoList;
		var isAlreadyLoaded=paramElem.find('.tabscroller').children().eq(0).hasClass('jspContainer');
		if(!isAlreadyLoaded)
			oVideoList= paramElem.find('.tabscroller').children().eq(0);
			else
				oVideoList= paramElem.find('.tabscroller').find('.jspPane').children().eq(0);
		if(!paramElem.hasClass('loadedondemand')){
			oVideoList.hide();
			var oOrderingParam = '';
			if(paramElem.find('.tabmodcontrols a.active').attr('href')){
				var oOrdering = paramElem.find('.tabmodcontrols a.active').attr('href');
				oOrderingParam = '&when='+oOrdering.substring(1);
				}
			oUrl = 'index.php?option=com_hwdvideoshare&lang=en&task=ajax_showtabs&format=raw&showtab='+oVideoList.attr('id')+'&listtype='+oVideoList.attr('class')+oOrderingParam;		
			if(!isAlreadyLoaded){
				paramElem.addClass('loadedondemand').find('.tabscroller').css('overflow-y','hidden');
				oVideoList.parent().append('<div class="loadingcontent" style="line-height:'+paramElem.find('.tabscroller').height()+'px"><i class="icon-spinner icon-spin"></i> Loading...</div>');
				}else{
					paramElem.find('.tabscroller').find('.jspPane').children().eq(0).hide();
					paramElem.addClass('loadedondemand').find('.tabscroller .jspContainer .jspVerticalBar').hide();
					paramElem.find('.loadingcontent').show();
					}
			jQuery.ajax({
			  url: oUrl
			}).done(function(data) {
				  paramElem.find('.loadingcontent').hide();
				  if(!paramElem.find('.tabscroller').children().eq(0).hasClass('jspContainer')){
					  paramElem.find('.tabscroller').children().eq(0).html(data).fadeIn('slow',function (){
							paramElem.find('a[title]').qtip({position: {show: {delay: 2000},my: 'top center',at: 'bottom center',adjust: {x: 0,y: 25},target: 'mouse'}});
							if(paramElem.hasClass('community'))
								paramElem.find('ul.pe-thumbs li').shigaruToolTip();
								});
					  paramElem.find('.tabscroller').jScrollPane({showArrows:true});
					  
					}else{
						paramElem.addClass('loadedondemand').find('.tabscroller .jspContainer .jspVerticalBar').show();
						paramElem.find('.tabscroller').find('.jspPane').children().eq(0).html(data).fadeIn('slow',function (){
								paramElem.find('a[title]').qtip({position: {show: {delay: 2000},my: 'top center',at: 'bottom center',adjust: {x: 0,y: 25},target: 'mouse'}});
								if(paramElem.hasClass('community'))
									paramElem.find('ul.pe-thumbs li').shigaruToolTip();
								});
						}
				  		
				  paramElem.find('.tabmodcontrols a.tabreload').removeClass('active').find('.icon-refresh').removeClass('icon-refresh icon-spin').addClass('icon-repeat');		
				});	
			}
		}
	
	function loadContentOnDemand(e){
			var oElemOD = jQuery(e.target);
			if(oElemOD.parent().hasClass('selected'))
				oElemOD = oElemOD.parent();
			oElemOD = jQuery(oElemOD.attr('href'));
			loadAjaxContent(oElemOD);
		}
	
	function rotateTabs(e){	
		oHRef = jQuery(this).attr('href');
		updateSelection(oHRef);
		jQuery(oSlides).each(function(i,e){
				if(i!=oCurrentIndex){
					jQuery(e).find('ul li a.thumbplay').css('display','none');
					jQuery(e).find('ul li a .categoryinfothumb').css('display','none');
				}else{
					jQuery(opts.slidesWrapper +' .slideInner').animate({'marginLeft' : -(oCurrentIndex * oSlideWidth)},function(){
						jQuery(e).find('ul li a.thumbplay').css('display','block');
						jQuery(e).find('ul li a .categoryinfothumb').css('display','block');
					});
			}
		 });	
		e.preventDefault(oHRef);
	}
	
	function fadeTabs(e){
		oHRef = jQuery(this).attr('href');
		updateSelection(oHRef);
		jQuery(oSelected.attr('href')).fadeOut(200, function() {
			jQuery(oCurrent.attr('href')).fadeIn('slow');
		});
		e.preventDefault();
	}
	
	function updateSelection(oHRef){
		oTabs.each(function(i,elem){
			if(jQuery(elem).parent().hasClass('selected')){oSelected = jQuery(elem);jQuery(elem).parent().removeClass('selected');}
			if(jQuery(elem).attr('href') == oHRef){oCurrentIndex = i;oCurrent=jQuery(elem);jQuery(elem).parent().addClass('selected');}	
			});
	}
	

  }

  jQuery.fn.shigaruTabs.defaults = {
	slidesSelector:'.tab_wrapper',
	slidesWrapper:'#slidesWrapper',
	directionOfSorting:'left',
	effect: 'rotate',
	controls: false,
	hideTabs:false
  }
  
})(jQuery);

(function(jQuery) {
  jQuery.fn.shigaruSearch = function(options) {
	  
	var opts 										= jQuery.extend({}, jQuery.fn.shigaruSearch.defaults, options);
	var oCurrentUrl, oCurrentFilters, 
	oCurrentPattern									= null;
	var oCurrentIndex								= 0;
	var $container 									= jQuery(opts.targetDiv);
	
    return this.each(function() {
		transformPageLinks();
		transformOrderBys();
		transformFiltersLinks();
		transformLimitBox();	
		transformSearchTypeLinks();	
	});
	
	function transformOrderBys(){
		jQuery(opts.orderLinks).removeClass('orderselected');
		jQuery('#'+oSearchParams.ordering).addClass('orderselected');
		jQuery(opts.orderLinks).click(function(e){
				jQuery(opts.orderLinks).removeClass('orderselected');
				jQuery(e.target).addClass('orderselected');
				getPageResults(composeUrl(e));
				e.preventDefault();
			});	
		}
	
	function transformLimitBox(){
		jQuery("#limit option[value='0']").remove();
		jQuery('#limit').change(function(e){
				getPageResults(composeUrl(e));
				e.preventDefault();
			});
		}
	
	
	function transformPageLinks(){	
			jQuery(opts.paginationLinks).click(function(e){
					getPageResults(composeUrl(e));
					e.preventDefault();
				});
	}
	
	
	function transformSearchTypeLinks(){	
			jQuery(opts.searchTypeLinks).click(function(e){
					jQuery(opts.searchTypeLinks).parent().removeClass('styledCheckboxChecked');
					jQuery(e.target).parent().addClass('styledCheckboxChecked');
					getPageResults(composeUrl(e));
					jQuery('#resultfilters .filter').hide();
					jQuery('#resultfilters .'+e.target.id).show();
				});
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
					getPageResults(composeUrl(e));
					
				});
			jQuery(opts.filtersSelects).change(function(e){
					getPageResults(composeUrl(e));
				});	
	}
	
	
	function composeUrl(e){
			oCurrentUrl = 'index.php?option=com_hwdvideoshare&task=ajax_search&format=raw';
		if(jQuery(e.target).parent().parent().hasClass('videopagination') || jQuery(e.target).parent().parent().hasClass('pagination')){
			var oLimitStart = e.target.href.substring(e.target.href.indexOf("&limitstart=")+12,e.target.href.length);
				if(oLimitStart.indexOf('&')>0)
					oLimitStart = oLimitStart.substring(0,oLimitStart.indexOf('&'));
				oCurrentUrl +=  "&limitstart="+oLimitStart;
			}
		oCurrentUrl +=composeFiltersUrl();
		oCurrentUrl +=composeOrderUrl(e);
		oCurrentUrl +=composeLimitUrl(e);
		oCurrentUrl +=composePatternUrl(e);
		//oCurrentUrl +=composeSearchTypeUrl(e);
		return oCurrentUrl;
		}
	
	function composeLimitUrl(e){
		var oLimit = (jQuery('#resultordering #limit').length>0)?'&limit='+jQuery('#resultordering #limit').val():'';
		return oLimit;
	}
	
	function composePatternUrl(e){
		var oPattern = (jQuery('#searchinput').val()!='')?'&pattern='+jQuery('#searchinput').val()+'&ep=&ex=&rpp=0':'';
		return oPattern;
	}
	
	function composeSearchTypeUrl(e){
		//var oSearchType = '&searchcategory='+jQuery(e.target).attr('id');
		//return oSearchType;
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
	
	function composeOrderUrl(e){
		var oSort = '&sort='+jQuery('#resultordering .orderselected').attr('id');
		
		return oSort;
	}
	
	
	function getPageResults(paramUrl){
		$container.isotope( 'destroy' );
		$container.html('<div class="loadingcontent" style="line-height:600px"><i class="icon-spinner icon-spin"></i> Loading...</div>');
		var oPosition = $container.position();	  
		//jQuery('html, body').animate({scrollTop:oPosition.top+150}, 'slow');	
		jQuery(opts.actionbars).block({ message: null });
		jQuery.ajax({
            url: paramUrl
        }).done(function (data) {
			$container.hide().html(data).find('a[title]').qtip({position: {show: {delay: 2000},my: 'top center',at: 'bottom center',adjust: {x: 0,y: 25},target: 'mouse'}});
			$container.find('span[title]').qtip({position: {show: {delay: 2000},my: 'top center',at: 'bottom center',adjust: {x: 0,y: 25},target: 'mouse'}});
			var oPagination = $container.find('#videolistpage').html();
			$container.find('#videolistpage').remove();
			$container.fadeIn();
			jQuery(opts.paginationContainer).html(oPagination);
			$container.find(".loadingcontent").hide();
			jQuery(opts.actionbars).unblock();	  
			initVideoList();
			oCurrentUrl = oCurrentUrl.replace('&ajax=yes','');
			if(oCurrentUrl.indexOf('?ajax=yes&')>0){
				oCurrentUrl = oCurrentUrl.replace('?ajax=yes&','?');
				}
			oCurrentUrl = oCurrentUrl.replace('#','');	 
			if(window.history.pushState)
				window.history.pushState({"html":data,"pageTitle":document.title},"", oCurrentUrl);
				else
					window.location.href = oCurrentUrl;
			var oPosition = jQuery(opts.targetDiv).position();	  
			jQuery('html, body').animate({scrollTop:oPosition.top+150}, 'slow');		
			 transformPageLinks();
			 transformOrderBys();
			 transformLimitBox();

        });
		
		}

  }

  jQuery.fn.shigaruSearch.defaults = {
	paginationLinks:'.searchwrapper .pagination a',
	targetDiv:'#resultwrapper',
	orderLinks:'#resultordering a',
	sortDefault: 'relevance',
	searchTypeLinks:'.search-results-filter-categories p label',
	filtersLinks: '#resultfilters .filter .widget input,#resultfilters .filter .widget a',
	filtersSelects: '#resultfilters .filter .widget select',
	hideTabs:false,
	paginationLinks:'span.pagination a.page',
	targetDiv:'#resultcontainer',
	optionLinks:'#options .btn-group',
	paginationContainer: '.vidlistoptbar .vidlistpagination',
	actionbars:'.vidlistoptbar',
	listURL : 'index.php?option=com_hwdvideoshare&lang=en&task=ajax_myvideos&format=raw',
	needsHeaderProfile: true
  }
  
})(jQuery);

function shigaruAjax(url,elementToBLock,styles, message,showOverlay){
	var _message='<div class="loadingMessage">Processing</div>';
	var _styles={ "background-image": "url(\"/shigaru/templates/rhuk_milkyway/images/loading.gif\")", border:'none',backgroundColor: 'transparent','background-repeat':'no-repeat'};
	var _showOverlay=true;
	if(message != null)_message=message;
	if(styles!=null)_styles=styles;
	if(showOverlay!=null)_showOverlay=showOverlay;
	jQuery(elementToBLock).block({ 
					message: _message, 
					showOverlay: _showOverlay,
					css: _styles
				}); 
	jQuery.ajax({
		  url: url,
		  context: document.body,
		  success: function(data){
				jQuery(elementToBLock).unblock(); 
				shigaruMessages(data);	
			
		  }
		});	
  
  }      	
       
 function shigaruMessages(data){
	 jQuery.blockUI({ 
					message: data, 
					fadeIn: 700, 
					fadeOut: 700, 
					timeout: 5000, 
					showOverlay: false, 
					centerY: false, 
					css: { 
						width: '350px', 
						top: '40px', 
						left: '25%',  
						border: 'none', 
						padding: '5px',
						'position':'fixed', 
						backgroundColor: '#000', 
						'border-radius': '10px', 
						'-webkit-border-radius': '10px', 
						'-moz-border-radius': '10px', 
						opacity: .85, 
						color: '#fff' 
					} 
				});
	 
	 }   


