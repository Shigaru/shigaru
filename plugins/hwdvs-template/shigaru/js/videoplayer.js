jQuery(document).ready(function() {
	  var step = 5;
	  function showNext(list) {
		var current = list.children(':visible').length;
		list
		  .find('li:lt(' + (current + step) + ')')
			.slideDown();
	  }
	  jQuery.each(jQuery('#infocontext ul#relatedvideos'), function(index) {
		showNext(jQuery(this));
	  });
	  
	  jQuery('#infocontext #morerelated').click(function(e) {
		e.preventDefault();
		var list = jQuery(this).parent().siblings('ul#relatedvideos');
		showNext(list);
		// remove button after all results are shown
		if(list.children(':hidden').length == 0) 
		  jQuery(this).hide();
	  });
	  
	  jQuery('#btncomments').click(function(e) {
			var oPosition = jQuery('#comments-form-comment').focus().position();	  
			jQuery('html, body').animate({scrollTop:oPosition.top+150}, 'slow');
		});
});
