(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));



	jQuery.noConflict();
  jQuery(document).ready(function() {
    jQuery("#tabs,#tabs-tags,#comments-tabs,#searchtabs").tabs({ fx: { opacity: 'toggle'} });
    jQuery('.jcarousel-skin-tango').jcarousel({
        auto: 3,scroll:3, animation: 1500, easing:'swing' 
    });
    
    
    
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
		console.log(_showOverlay);
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
        
        	
