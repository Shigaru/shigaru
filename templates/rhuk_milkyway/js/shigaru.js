(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));



jQuery.noConflict();
jQuery(document).ready(function() {
var oTabs = jQuery("#tabs,#tabs-tags,#comments-tabs,#searchtabs");
if(oTabs.length !=0){	
oTabs.tabs({fx:{opacity: "toggle"}});
}
 var options1 = [
	{title:"Menu Item 1 - Go TO www.google.com", action:{type:"gourl",url:"http://www.google.com/"}},
	{title:"Menu Item 2 - do <b style='color:red;'>nothing</b>"},
	{title:"Menu Item 3 - submenu", type:"sub", src:[{title:"Submenu 1"},{title:"Submenu 2"},{title:"Submenu 3"}, {title:"Submenu 4 - submenu", type:"sub", src:[{title:"SubSubmenu 1"},{title:"SubSubmenu 2"}]}]},
	{title:"Menu Item 4 - Js function", action:{type:"fn",callback:"(function(){ alert('THIS IS THE TEST'); })"}}
  ];
  
var oThumbOptions = jQuery("div.song_options a.options");
if(oThumbOptions.length !=0){	
oThumbOptions.jjmenu("click", options1, {}, {show:"fadeIn", xposition:"left", yposition:"auto", "orientation":"auto"});
}  


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
	

	
	

        	
