jQuery(document).ready(function(){
	/* Scroll bars */
	jQuery('#the_most .tab_wrapper').jScrollPane({showArrows:true});
	/* Tabs */
	jQuery('#the_most_title').shigaruTabs({slidesWrapper:'#the_most_wrapper',effect:'fade'});
	//jQuery('.beingwatched_header').shigaruTabs({slidesWrapper:'#beingwatched .slidesWrapper',controls:true,hideTabs:true,directionOfSorting:'right'});
	jQuery('.leftcolumn .video_activity_header').shigaruTabs({slidesWrapper:'.leftcolumn .slidesWrapper'});
	jQuery('.rightcolumn .video_activity_header').shigaruTabs({slidesWrapper:'.rightcolumn .slidesWrapper'});
	jQuery('.workarea_odd .video_activity .video_activity_header').shigaruTabs({slidesWrapper:'.workarea_odd .video_activity .slidesWrapper'});
	/* Adding a colortip to any tag with a title attribute: */
		
	jQuery('.workarea [title]').qtip({position: {
		show: {
			delay: 2000
		},
		my: 'top center',  // Position my top left...
		at: 'bottom center', // at the bottom 
		adjust: {
			x: 0,    
			y: 25
		},
		target: 'mouse' // my target
	}});
});


(function(jQuery) {
  jQuery.fn.shigaruTabs = function(options) {
	  
	var opts 										= jQuery.extend({}, jQuery.fn.shigaruTabs.defaults, options);
	var oTabs 										= jQuery(this).find('ul li a');
	var oSlides 									= jQuery(opts.slidesWrapper+' '+opts.slidesSelector);
	var oSlideWidth 								= oSlides[0].offsetWidth;
	var oNumberOfSlides 							= oSlides.length;
	var oCurrent, oHRef, oSelected  				= null;
	var oCurrentIndex								= 0;
	
    return this.each(function() {
		switch(opts.effect){
			case 'rotate':
						jQuery(opts.slidesWrapper).css('overflow', 'hidden');
						oSlides.wrapAll('<div class="slideInner"></div>').css({'float' : opts.directionOfSorting,'width' : oSlideWidth});
						jQuery(opts.slidesWrapper +' .slideInner').css('width', oSlideWidth * oNumberOfSlides);
						oTabs.click(rotateTabs);
						break;
			case 'fade':
						oSlides.each(function(i,elem){if(i>0)jQuery(this).fadeOut();});
						oTabs.click(fadeTabs);
						break;	
		}	
		
		if(opts.controls){
			addControls();
			manageControls();
			jQuery('#leftControl,#rightControl').click(controlsAction);
			if(opts.hideTabs)hideTabs();
		}
	
    });
	
	function rotateTabs(e){	
		oHRef = jQuery(this).attr('href');
		updateSelection(oHRef);
		jQuery(opts.slidesWrapper +' .slideInner').animate({'marginLeft' : -(oCurrentIndex * oSlideWidth)});	
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
	
	function addControls(){
			jQuery(opts.slidesWrapper).prepend('<span class="control" id="leftControl">left</span>').append('<span class="control" id="rightControl">right</span>');
		}
	function hideTabs(){
			oSlides.each(function(i){
					if(i>0) jQuery(this).css({visibility: "hidden"});
				});
			oTabs.hide();
	}
	
	function controlsAction(){
			var $this = jQuery(this);
			jQuery(oSlides[oCurrentIndex]).css({visibility: "hidden"});
			oCurrentIndex = ($this.attr('id')=='leftControl')?oCurrentIndex-1:oCurrentIndex+1;					
			jQuery(opts.slidesWrapper +' .slideInner').animate({'marginLeft' : oSlideWidth*(-oCurrentIndex)}, function(){
					jQuery(oSlides[oCurrentIndex]).css({"visibility":"visible"});;
				});
			manageControls();
	}
	
	function manageControls(){
		if(oCurrentIndex==0){ jQuery('#leftControl').hide() } else{ jQuery('#leftControl').show() }
		if(oCurrentIndex==oNumberOfSlides-1){ jQuery('#rightControl').hide() } else{ jQuery('#rightControl').show() }
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
