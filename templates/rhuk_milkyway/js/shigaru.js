var $jq = jQuery.noConflict();
jQuery(document).ready(function($){
	/* Scroll bars */
	if(jQuery('#the_most .tab_wrapper').length>0){
	jQuery('#the_most .tab_wrapper, .workarea div.video_activity div.tab_wrapper').jScrollPane({showArrows:true});
	/* Tabs */
	jQuery('#the_most_title').shigaruTabs({slidesWrapper:'#the_most_wrapper',effect:'fade'});
	jQuery('.beingwatched_header').shigaruTabs({slidesWrapper:'#beingwatched .slidesWrapper',controls:true,hideTabs:true,directionOfSorting:'right'});
	jQuery('.leftcolumn .video_activity_header').shigaruTabs({slidesWrapper:'.leftcolumn .slidesWrapper'});
	jQuery('.rightcolumn .video_activity_header').shigaruTabs({slidesWrapper:'.rightcolumn .slidesWrapper'});
	jQuery('.workarea_odd .video_activity .video_activity_header').shigaruTabs({slidesWrapper:'.workarea_odd .video_activity .slidesWrapper'});
	}
	jQuery('#grettings').click(function(e) {
		var $this = jQuery(this);
		jQuery(".userzone").slideToggle();
			$this.toggleClass("userzoneopen");
	});
	
	jQuery('.item').hover(
                function(){
                    var $this = jQuery(this);
                    expand($this);
                },
                function(){
                    var $this = jQuery(this);
                    collapse($this);
                }
            );
            function expand($elem){
                var angle = 0;
                var t = setInterval(function () {
                    if(angle == 1440){
                        clearInterval(t);
                        return;
                    }
                    angle += 40;
                    jQuery('.link',$elem).stop().animate({rotate: '+=-40deg'}, 0);
                },10);
                $elem.stop().animate({width:'268px'}, 1000)
                .find('.item_content').fadeIn(400,function(){
                    jQuery(this).find('p').stop(true,true).fadeIn(600);
                });
            }
            function collapse($elem){
                var angle = 1440;
                var t = setInterval(function () {
                    if(angle == 0){
                        clearInterval(t);
                        return;
                    }
                    angle -= 40;
                    jQuery('.link',$elem).stop().animate({rotate: '+=40deg'}, 0);
                },10);
                $elem.stop().animate({width:'52px'}, 1000)
                .find('.item_content').stop(true,true).fadeOut().find('p').stop(true,true).fadeOut();
            }
	// Login Form	
	jQuery('#login a,#lang a').click(function(e) {
                e.preventDefault();
                if(!jQuery(this).parent(".topbuttons").hasClass("menu-open")){
					jQuery(".menu-open .floatingBox").hide();
					jQuery(".menu-open").removeClass("menu-open");
                }
                jQuery(e.target).parent("a").siblings(".floatingBox").toggle();
                jQuery(e.target).parent("a").parent(".topbuttons").toggleClass("menu-open");
            });

            jQuery(".topbuttons").mouseup(function() {
                return false;
            });
            jQuery(document).mouseup(function(e) {
                if(jQuery(e.target).parent("a").parent(".topbuttons").length==0) {
                    jQuery(e.target).parent("a").parent(".topbuttons").removeClass("menu-open");
                    jQuery(e.target).parent("a").siblings(".floatingBox").hide();
                }
            });        

	
	
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


JQTWEET = {
     
    // Set twitter username, number of tweets & id/class to append tweets
    user: 'shigaru',
    numTweets: 5,
    appendTo: '#shgtweets',
 
    // core function of jqtweet
    loadTweets: function() {
        jQuery.ajax({
            url: 'http://api.twitter.com/1/statuses/user_timeline.json/',
            type: 'GET',
            dataType: 'jsonp',
            data: {
                screen_name: JQTWEET.user,
                include_rts: true,
                count: JQTWEET.numTweets,
                include_entities: true
            },
            success: function(data, textStatus, xhr) {
                 var html = '<li>'+
								'<p><span>@USER</span>TWEET_TEXT</p>'+
								'<span class="tItalic">AGO</span>'+
							'</li>';
         
                 // append tweets into page
                 for (var i = 0; i < 2; i++) {
					 console.log(data[i]);
                    jQuery(JQTWEET.appendTo).append(
                    
                        html.replace('TWEET_TEXT', JQTWEET.ify.clean(data[i].text) )
                            .replace('USER', data[i].user.screen_name)
                            .replace('AGO', JQTWEET.timeAgo(data[i].created_at) )
                            
                           // .replace(/ID/g, data[i].id_str)
                    );
                 }                  
            }   
 
        });
         
    }, 
     
         
    /**
      * relative time calculator FROM TWITTER
      * @param {string} twitter date string returned from Twitter API
      * @return {string} relative time like "2 minutes ago"
      */
    timeAgo: function(dateString) {
        var rightNow = new Date();
        var then = new Date(dateString);
         
        if (jQuery.browser.msie) {
            // IE can't parse these crazy Ruby dates
            then = Date.parse(dateString.replace(/( \+)/, ' UTC$1'));
        }
 
        var diff = rightNow - then;
 
        var second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24,
        week = day * 7;
 
        if (isNaN(diff) || diff < 0) {
            return ""; // return blank string if unknown
        }
 
        if (diff < second * 2) {
            // within 2 seconds
            return "right now";
        }
 
        if (diff < minute) {
            return Math.floor(diff / second) + " seconds ago";
        }
 
        if (diff < minute * 2) {
            return "about 1 minute ago";
        }
 
        if (diff < hour) {
            return Math.floor(diff / minute) + " minutes ago";
        }
 
        if (diff < hour * 2) {
            return "about 1 hour ago";
        }
 
        if (diff < day) {
            return  Math.floor(diff / hour) + " hours ago";
        }
 
        if (diff > day && diff < day * 2) {
            return "yesterday";
        }
 
        if (diff < day * 365) {
            return Math.floor(diff / day) + " days ago";
        }
 
        else {
            return "over a year ago";
        }
    }, // timeAgo()
     
     
    /**
      * The Twitalinkahashifyer!
      * http://www.dustindiaz.com/basement/ify.html
      * Eg:
      * ify.clean('your tweet text');
      */
    ify:  {
      link: function(tweet) {
        return tweet.replace(/\b(((https*\:\/\/)|www\.)[^\"\']+?)(([!?,.\)]+)?(\s|$))/g, function(link, m1, m2, m3, m4) {
          var http = m2.match(/w/) ? 'http://' : '';
          return '<a class="twtr-hyperlink" target="_blank" href="' + http + m1 + '">' + ((m1.length > 25) ? m1.substr(0, 24) + '...' : m1) + '</a>' + m4;
        });
      },
 
      at: function(tweet) {
        return tweet.replace(/\B[@＠]([a-zA-Z0-9_]{1,20})/g, function(m, username) {
          return '<a target="_blank" class="twtr-atreply" href="http://twitter.com/intent/user?screen_name=' + username + '">@' + username + '</a>';
        });
      },
 
      list: function(tweet) {
        return tweet.replace(/\B[@＠]([a-zA-Z0-9_]{1,20}\/\w+)/g, function(m, userlist) {
          return '<a target="_blank" class="twtr-atreply" href="http://twitter.com/' + userlist + '">@' + userlist + '</a>';
        });
      },
 
      hash: function(tweet) {
        return tweet.replace(/(^|\s+)#(\w+)/gi, function(m, before, hash) {
          return before + '<a target="_blank" class="twtr-hashtag" href="http://twitter.com/search?q=%23' + hash + '">#' + hash + '</a>';
        });
      },
 
      clean: function(tweet) {
        return this.hash(this.at(this.list(this.link(tweet))));
      }
    } // ify
 
     
};
 
 
 
jQuery(document).ready(function () {
    // start jqtweet!
    JQTWEET.loadTweets();
});
