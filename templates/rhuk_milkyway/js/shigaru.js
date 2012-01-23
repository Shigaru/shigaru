(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));



jQuery.noConflict();
jQuery(document).ready(function() {
jQuery("#tabs,#tabs-tags,#comments-tabs,#searchtabs").tabs({fx:{opacity: "toggle"}});
 var options1 = [
	{title:"Menu Item 1 - Go TO www.google.com", action:{type:"gourl",url:"http://www.google.com/"}},
	{title:"Menu Item 2 - do <b style='color:red;'>nothing</b>"},
	{title:"Menu Item 3 - submenu", type:"sub", src:[{title:"Submenu 1"},{title:"Submenu 2"},{title:"Submenu 3"}, {title:"Submenu 4 - submenu", type:"sub", src:[{title:"SubSubmenu 1"},{title:"SubSubmenu 2"}]}]},
	{title:"Menu Item 4 - Js function", action:{type:"fn",callback:"(function(){ alert('THIS IS THE TEST'); })"}}
  ];
jQuery("div.song_options a.options").jjmenu("click", options1, {}, {show:"fadeIn", xposition:"left", yposition:"auto", "orientation":"auto"});

// Login Form

	 jQuery(function() {
		var button =  jQuery('#loginButton');
		var box =  jQuery('#loginBox');
		var form =  jQuery('#mod_loginform');
		button.removeAttr('href');
		button.mouseup(function(login) {
			box.toggle();
			button.toggleClass('active');
		});
		form.mouseup(function() { 
			return false;
		});
		 jQuery(this).mouseup(function(login) {
			if(!( jQuery(login.target).parent('#loginButton').length > 0)) {
				button.removeClass('active');
				box.hide();
			}
		});
	});


});
function langMenu(){
			if (jQuery('#langDropMenu').css('display') == 'none'){
				document.getElementById('langDropMenu').style.display = 'block';
				jQuery("#langTab").addClass('openLangMenu');

				var centerBoxHeight = jQuery("#langBoxCenter").height()
				document.getElementById('langBoxLeft').style.height = (centerBoxHeight + 5) +"px";
				document.getElementById('langBoxRight').style.height = (centerBoxHeight + 5) +"px";

			}else{
				document.getElementById('langDropMenu').style.display = 'none';
				jQuery("#langTab").removeClass('openLangMenu');
				document.getElementById('langBoxLeft').style.height = "30px";
				document.getElementById('langBoxRight').style.height = "30px";
			}
		}

function hoverFuncAdd(el){
	jQuery(el).addClass('hover');
}

function hoverFuncRemove(el){
	jQuery(el).removeClass('hover');
}
  
function shigaruAjax(url,elementToBLock,styles, message,showOverlay){
	var _message='<div class="loadingMessage">Processing</div>';
	var _styles={ "background-image": "url(\"templates/rhuk_milkyway/images/loading.gif\")", border:'none',backgroundColor: 'transparent','background-repeat':'no-repeat'};
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
		});	
  
  }      	
       
       
       
jQuery(function() {
		//caching
		//next and prev buttons
		var $cn_next	= jQuery('#cn_next');
		var $cn_prev	= jQuery('#cn_prev');
		//wrapper of the left items
		var $cn_list 	= jQuery('#cn_list');
		var $pages		= $cn_list.find('.cn_page');
		//how many pages
		var cnt_pages	= $pages.length;
		//the default page is the first one
		var page		= 1;
		//list of news (left items)
		var $items 		= $cn_list.find('.cn_item');
		//the current item being viewed (right side)
		var $cn_preview = jQuery('#cn_preview');
		//index of the item being viewed. 
		//the default is the first one
		var current		= 1;
		
		/*
		for each item we store its index relative to all the document.
		we bind a click event that slides up or down the current item
		and slides up or down the clicked one. 
		Moving up or down will depend if the clicked item is after or
		before the current one
		*/
		$items.each(function(i){
			var $item = jQuery(this);
			$item.data('idx',i+1);
			
			$item.bind('click',function(){
				var $this 		= jQuery(this);
				$cn_list.find('.selected').removeClass('selected');
				$this.addClass('selected');
				var idx			= jQuery(this).data('idx');
				var $current 	= $cn_preview.find('.cn_content:nth-child('+current+')');
				var $next		= $cn_preview.find('.cn_content:nth-child('+idx+')');
				
				if(idx > current){
					$current.stop().animate({'top':'-300px'},1200,'easeOutBack',function(){
						jQuery(this).css({'top':'310px'});
					});
					$next.css({'top':'310px'}).stop().animate({'top':'5px'},1200,'easeOutBack');
				}
				else if(idx < current){
					$current.stop().animate({'top':'310px'},1200,'easeOutBack',function(){
						jQuery(this).css({'top':'310px'});
					});
					$next.css({'top':'-300px'}).stop().animate({'top':'5px'},1200,'easeOutBack');
				}
				current = idx;
			});
		});
		
		/*
		shows next page if exists:
		the next page fades in
		also checks if the button should get disabled
		*/
		$cn_next.bind('click',function(e){
			var $this = jQuery(this);
			$cn_prev.removeClass('disabled');
			++page;
			if(page == cnt_pages)
				$this.addClass('disabled');
			if(page > cnt_pages){ 
				page = cnt_pages;
				return;
			}	
			$pages.hide();
			$cn_list.find('.cn_page:nth-child('+page+')').fadeIn();
			e.preventDefault();
		});
		/*
		shows previous page if exists:
		the previous page fades inS
		also checks if the button should get disabled
		*/
		$cn_prev.bind('click',function(e){
			var $this = jQuery(this);
			$cn_next.removeClass('disabled');
			--page;
			if(page == 1)
				$this.addClass('disabled');
			if(page < 1){ 
				page = 1;
				return;
			}
			$pages.hide();
			$cn_list.find('.cn_page:nth-child('+page+')').fadeIn();
			e.preventDefault();
		});
		
	}); 
	
	/**
 * Proximity event for jQuery
 * ---
 * @author James Padolsey (http://james.padolsey.com)
 * @version 0.1
 * @updated 28-JUL-09
 * ---
 * @info http://github.com/jamespadolsey/jQuery-plugins/proximity-event/
 */

(function(jQuery){
    
    var elems = jQuery([]),
        doc = jQuery(document);
    
    jQuery.event.special.proximity = {
        
        defaults: {
            max: 100,
            min: 0,
            throttle: 0,
            fireOutOfBounds: 1
        },
        
        setup: function(data) {
            
            if (!elems[0])
                doc.mousemove(handle);
            
            elems = elems.add(this);
            
        },
        
        add: function(o) {
            
            var handler = o.handler,
                data = jQuery.extend({},jQuery.event.special.proximity.defaults, o.data),
                lastCall = 0,
                nFiredOutOfBounds = 0,
                hoc = jQuery(this);
            
            o.handler = function(e, pageX, pageY) {
                
                var max = data.max,
                    min = data.min,
                    throttle = data.throttle,
                    date = +new Date,
                    distance,
                    proximity,
                    inBounds,
                    fireOutOfBounds = data.fireOutOfBounds;
                
                if (throttle && lastCall + throttle > date) {
                    return;
                }
                
                lastCall = date;
                
                distance = calcDistance(hoc, pageX, pageY);
                inBounds = distance < max && distance > min;
                
                if (fireOutOfBounds || inBounds) {
                    
                    if (inBounds) {
                        nFiredOutOfBounds = 0;
                    } else {
                        
                        // If fireOutOfBounds is a number then keep incrementing a
                        // counter to determine how many times the handler's been
                        // called out of bounds. Note: the counter is reset whenever
                        // the cursor goes back inBounds...
                        
                        if (typeof fireOutOfBounds === 'number' && nFiredOutOfBounds > fireOutOfBounds) {
                            return;
                        }
                        ++nFiredOutOfBounds;
                    }
                
                    proximity = e.proximity = 1 - (
                        distance < max ? distance < min ? 0 : distance / max : 1
                    );
                    
                    e.distance = distance;
                    e.pageX = pageX;
                    e.pageY = pageY;
                    e.data = data;
                    
                    return handler.call(this, e, proximity, distance);
                
                }
                
            };
            
        },
        
        teardown: function(){
            
            elems = elems.not(this);
            
            if (!elems[0])
                doc.unbind('mousemove', handle);
            
        }
        
    };
    
    function calcDistance(el, x, y) {
        
        // Calculate the distance from the closest edge of the element
        // to the cursor's current position
        
        var left, right, top, bottom, offset,
            cX, cY, dX, dY,
            distance = 0;
        
        offset = el.offset();
        left = offset.left;
        top = offset.top;
        right = left + el.outerWidth();
        bottom = top + el.outerHeight();
        
        cX = x > right ? right : x > left ? x : left;
        cY = y > bottom ? bottom : y > top ? y : top;
        
        dX = Math.abs( cX - x );
        dY = Math.abs( cY - y );
        
        return Math.sqrt( dX * dX + dY * dY );
            
    }
    
    function handle(e) {
        
        var x = e.pageX,
            y = e.pageY,
            i = -1,
            fly = jQuery([]);
        
        while (fly[0] = elems[++i]) {
            fly.triggerHandler('proximity', [x,y]);
        }
        
    }
    
}(jQuery));
	
	jQuery(function() {
				
				var Photo	= (function() {
					
						// list of thumbs
					var $list		= jQuery('#pe-thumbs'),
						// list's width and offset left.
						// this will be used to know the position of the description container
						listW		= $list.width(),
						listL		= $list.offset().left,
						// the images
						$elems		= $list.find('img'),
						// the description containers
						$descrp		= $list.find('div.pe-description'),
						// maxScale : maximum scale value the image will have
						// minOpacity / maxOpacity : minimum (set in the CSS) and maximum values for the image's opacity
						settings	= {
							maxScale	: 1.3,
							maxOpacity	: 0.9,
							minOpacity	: Number( $elems.css('opacity') )
						},
						init		= function() {
							
							// minScale will be set in the CSS
							settings.minScale = _getScaleVal() || 1;
							// preload the images (thumbs)
							_loadImages( function() {
								
								_calcDescrp();
								_initEvents();
							
							});
						
						},
						// Get Value of CSS Scale through JavaScript:
						// http://css-tricks.com/get-value-of-css-rotation-through-javascript/
						_getScaleVal= function() {
						
							var st = window.getComputedStyle($elems.get(0), null),
								tr = st.getPropertyValue("-webkit-transform") ||
									 st.getPropertyValue("-moz-transform") ||
									 st.getPropertyValue("-ms-transform") ||
									 st.getPropertyValue("-o-transform") ||
									 st.getPropertyValue("transform") ||
									 "fail...";

							if( tr !== 'none' ) {	 

								var values = tr.split('(')[1].split(')')[0].split(','),
									a = values[0],
									b = values[1],
									c = values[2],
									d = values[3];

								return Math.sqrt( a * a + b * b );
							
							}
							
						},
						// calculates the style values for the description containers,
						// based on the settings variable
						_calcDescrp	= function() {
							
							$descrp.each( function(i) {
							
								var $el		= jQuery(this),
									$img	= $el.prev(),
									img_w	= $img.width(),
									img_h	= $img.height(),
									img_n_w	= settings.maxScale * img_w,
									img_n_h	= settings.maxScale * img_h,
									space_t = ( img_n_h - img_h ) / 2,
									space_l = ( img_n_w - img_w ) / 2;
								
								$el.data( 'space_l', space_l ).css({
									height	: settings.maxScale * $el.height(),
									top		: -space_t,
									left	: img_n_w - space_l
								});
							
							});
						
						},
						_initEvents	= function() {
						
							$elems.on('proximity.Photo', { max: 80, throttle: 10, fireOutOfBounds : true }, function(event, proximity, distance) {
								
								var $el			= jQuery(this),
									$li			= $el.closest('li'),
									$desc		= $el.next(),
									scaleVal	= proximity * ( settings.maxScale - settings.minScale ) + settings.minScale,
									scaleExp	= 'scale(' + scaleVal + ')';
								
								// change the z-index of the element once it reaches the maximum scale value
								// also, show the description container
								if( scaleVal === settings.maxScale ) {
									
									$li.css( 'z-index', 1000 );
									
									if( $desc.offset().left + $desc.width() > listL + listW ) {
										
										$desc.css( 'left', -$desc.width() - $desc.data( 'space_l' ) );
									
									}
									
									$desc.fadeIn( 800 );
									
								}	
								else {
									
									$li.css( 'z-index', 1 );
								
									$desc.stop(true,true).hide();
								
								}	
								
								$el.css({
									'-webkit-transform'	: scaleExp,
									'-moz-transform'	: scaleExp,
									'-o-transform'		: scaleExp,
									'-ms-transform'		: scaleExp,
									'transform'			: scaleExp,
									'opacity'			: ( proximity * ( settings.maxOpacity - settings.minOpacity ) + settings.minOpacity )
								});

							});
						
						},
						_loadImages	= function( callback ) {
							
							var loaded 	= 0,
								total	= $elems.length;
							
							$elems.each( function(i) {
								
								var $el = jQuery(this);
								
								jQuery('<img/>').load( function() {
									
									++loaded;
									if( loaded === total )
										callback.call();
									
								}).attr( 'src', $el.attr('src') );
							
							});
						
						};
					
					return {
						init	: init
					};
				
				})();
				
				Photo.init();
				
			});

        	
