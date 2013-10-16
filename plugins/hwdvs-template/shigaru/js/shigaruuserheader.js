jQuery(document).ready(function() {
	jQuery('.cbProfile').shigaruUserHeader();
   });

(function(jQuery) {
  jQuery.fn.shigaruUserHeader = function(options) {
	  
	var opts 			= jQuery.extend({}, jQuery.fn.shigaruUserHeader.defaults, options);
	var $usercontainer 	= jQuery(opts.userTargetDiv);
	var oUserUrl 		= "index.php?option=com_hwdvideoshare&lang=en&task=ajax_userdetails&format=raw&user_id="+jQuery('#user_id').val();
    var oUserStatusUrl 	= "index.php?option=com_hwdvideoshare&lang=en&task=ajax_setuserstatusmessage&format=raw"
    
    return this.each(function() {
		doLoadAjaxUserDetails();
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
			$usercontainer.find(".loadingcontent").hide();
			$usercontainer.html(data).find('a[title]').qtip({position: {show: {delay: 2000},my: 'top center',at: 'bottom center',adjust: {x: 0,y: 25},target: 'mouse'}});
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
			
			$usercontainer.find('.usersocialicon').click(function(e){
				e.preventDefault();
				var oParent = jQuery(this).parent().parent();
				if(oParent.hasClass('open'))
					oParent.removeClass('open').addClass('close');
					else
						oParent.removeClass('close').addClass('open');
			});
			
			
			
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
				$this.toggleClass("active");
				$this.next('ul.dropdown-menu').toggle();
				return false;
			});
        });
		
		}
  }

  jQuery.fn.shigaruUserHeader.defaults = {
	userTargetDiv:'#usersection'
  }
  
})(jQuery);
