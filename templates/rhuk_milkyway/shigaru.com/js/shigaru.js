$(document).ready(function(){
	/* Scroll bars */
	$('#the_most .tab_wrapper').jScrollPane({showArrows:true});
	/* Tabs */
	$('#the_most_title').shigaruTabs({slidesWrapper:'#the_most_wrapper',effect:'fade'});
	$('.beingwatched_header').shigaruTabs({slidesWrapper:'#beingwatched .slidesWrapper',controls:true,hideTabs:true,directionOfSorting:'right'});
	$('.leftcolumn .video_activity_header').shigaruTabs({slidesWrapper:'.leftcolumn .slidesWrapper'});
	$('.rightcolumn .video_activity_header').shigaruTabs({slidesWrapper:'.rightcolumn .slidesWrapper'});
	$('.workarea_odd .video_activity .video_activity_header').shigaruTabs({slidesWrapper:'.workarea_odd .video_activity .slidesWrapper'});
	/* Adding a colortip to any tag with a title attribute: */
		
	$('.workarea [title]').qtip({position: {
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


(function($) {
  $.fn.shigaruTabs = function(options) {
	  
	var opts 										= $.extend({}, $.fn.shigaruTabs.defaults, options);
	var oTabs 										= $(this).find('ul li a');
	var oSlides 									= $(opts.slidesWrapper+' '+opts.slidesSelector);
	var oSlideWidth 								= oSlides[0].offsetWidth;
	var oNumberOfSlides 							= oSlides.length;
	var oCurrent, oHRef, oSelected  				= null;
	var oCurrentIndex								= 0;
	
    return this.each(function() {
		switch(opts.effect){
			case 'rotate':
						$(opts.slidesWrapper).css('overflow', 'hidden');
						oSlides.wrapAll('<div class="slideInner"></div>').css({'float' : opts.directionOfSorting,'width' : oSlideWidth});
						$(opts.slidesWrapper +' .slideInner').css('width', oSlideWidth * oNumberOfSlides);
						oTabs.click(rotateTabs);
						break;
			case 'fade':
						oSlides.each(function(i,elem){if(i>0)$(this).fadeOut();});
						oTabs.click(fadeTabs);
						break;	
		}	
		
		if(opts.controls){
			addControls();
			manageControls();
			$('#leftControl,#rightControl').click(controlsAction);
			if(opts.hideTabs)hideTabs();
		}
	
    });
	
	function rotateTabs(e){	
		oHRef = $(this).attr('href');
		updateSelection(oHRef);
		$(opts.slidesWrapper +' .slideInner').animate({'marginLeft' : -(oCurrentIndex * oSlideWidth)});	
		e.preventDefault(oHRef);
	}
	
	function fadeTabs(e){
		oHRef = $(this).attr('href');
		updateSelection(oHRef);
		$(oSelected.attr('href')).fadeOut(200, function() {
			$(oCurrent.attr('href')).fadeIn('slow');
		});
		e.preventDefault();
	}
	
	function updateSelection(oHRef){
		oTabs.each(function(i,elem){
			if($(elem).parent().hasClass('selected')){oSelected = $(elem);$(elem).parent().removeClass('selected');}
			if($(elem).attr('href') == oHRef){oCurrentIndex = i;oCurrent=$(elem);$(elem).parent().addClass('selected');}	
			});
	}
	
	function addControls(){
			$(opts.slidesWrapper).prepend('<span class="control" id="leftControl">left</span>').append('<span class="control" id="rightControl">right</span>');
		}
	function hideTabs(){
			oSlides.each(function(i){
					if(i>0) $(this).css({visibility: "hidden"});
				});
			oTabs.hide();
	}
	
	function controlsAction(){
			var $this = $(this);
			$(oSlides[oCurrentIndex]).css({visibility: "hidden"});
			oCurrentIndex = ($this.attr('id')=='leftControl')?oCurrentIndex-1:oCurrentIndex+1;					
			$(opts.slidesWrapper +' .slideInner').animate({'marginLeft' : oSlideWidth*(-oCurrentIndex)}, function(){
					$(oSlides[oCurrentIndex]).css({"visibility":"visible"});;
				});
			manageControls();
	}
	
	function manageControls(){
		if(oCurrentIndex==0){ $('#leftControl').hide() } else{ $('#leftControl').show() }
		if(oCurrentIndex==oNumberOfSlides-1){ $('#rightControl').hide() } else{ $('#rightControl').show() }
	}
	
	

  }

  $.fn.shigaruTabs.defaults = {
	slidesSelector:'.tab_wrapper',
	slidesWrapper:'#slidesWrapper',
	directionOfSorting:'left',
	effect: 'rotate',
	controls: false,
	hideTabs:false
  }
  
})(jQuery);