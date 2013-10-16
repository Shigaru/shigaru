jQuery(document).ready(function() {
	jQuery('#usermenuwrapper').shigaruUserMenu();
   });

(function(jQuery) {
  jQuery.fn.shigaruUserMenu = function(options) {
	  
	var opts 			= jQuery.extend({}, jQuery.fn.shigaruUserMenu.defaults, options);
	var $usermenucontainer 	= jQuery(opts.userMenuTargetDiv);
	var oUserMenuUrl 	= "index.php?option=com_hwdvideoshare&lang=en&task=ajax_usermenu&format=raw&user_id="+jQuery('#user_id').val();
    
    return this.each(function() {
		doLoadAjaxUserMenu();
	});
	

	
	function doLoadAjaxUserMenu(){
		$usermenucontainer.find(".loadingcontent").show();
		jQuery.ajax({
            url: oUserMenuUrl
        }).done(function (data) {
			$usermenucontainer.hide().html(data).find('a[title]').qtip({position: {show: {delay: 2000},my: 'top center',at: 'bottom center',adjust: {x: 0,y: 25},target: 'mouse'}});
			$usermenucontainer.find(".loadingcontent").hide();
			$usermenucontainer.fadeIn();			
        });
		
		}
  }

  jQuery.fn.shigaruUserMenu.defaults = {
	userMenuTargetDiv:'#usermenuwrapper'
  }
  
})(jQuery);
