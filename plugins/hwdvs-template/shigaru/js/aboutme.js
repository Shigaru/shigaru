jQuery(document).ready(function () {
    var guid = jQuery('#user_id').val();
    var oShigaruVideoList  = jQuery('#resultcontainer').shigaruVideoList(
			{
				needsHeaderProfile:true,
				needsUserMenu:true,
				needsVideoListLoading:false,
				selectedUserMenu:'#aboutme',
				listURL:'index.php?option=com_hwdvideoshare&task=ajax_aboutme&format=raw&lang='+currentLang+'&guid='+guid
		});  
		
	  
		
	jQuery.ajax({
            url: 'index.php?option=com_hwdvideoshare&task=ajax_aboutme&ajax=yes&item_id=all&lang='+currentLang+'&guid='+guid,
            success: function (data) {
				var oTargetDiv = jQuery('#resultcontainer');
				if(data){					
					oTargetDiv.css({'-webkit-box-shadow': '0px 0px 0px 0px rgba(12, 12, 12, 0.3)',
						'box-shadow': '0px 0px 0px 0px rgba(12, 12, 12, 0.3)',
						'-webkit-border-radius': '0px',
						'border-radius': '0px'
						});
					oTargetDiv.html(data).show(500,function(){
							jQuery('#resultcontainer div.aboutme a').click(function(e){
								var $this = jQuery(this);
								var oTarget = jQuery($this.attr('href'));
								var oTargetOffset = oTarget.position();
								var oTargetParentOffset = oTarget.parent().parent().position();
								jQuery('html, body').animate({scrollTop:oTargetOffset.top-50});
								e.preventDefault();
								});	
								
							 jQuery(window).scroll( function(){
								var $this = jQuery('.aboutme.dropdown');
								var bottom_of_object = $this.position().top + $this.outerHeight();
								var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();
								var oTargetParentOffset = $this.parent().position();
								if( jQuery(window).scrollTop() > bottom_of_object ){
									jQuery('#backtotop').css({'position':'fixed', 'z-index':'999','bottom':'15px','left':oTargetParentOffset.left+$this.parent().width()-60}).fadeIn(500);
								}else{
									jQuery('#backtotop').fadeOut('slow');
									}
							});	
						});	
					if(jQuery('#lat').val()){
						initialPoint = {};
						initialPoint.lat = jQuery('#lat').val();
						initialPoint.lng = jQuery('#lng').val();
						loadScript();	
					}
					
					
					
				}					
            }
        });	
        jQuery('#backtotop').click(function(){
				var $this = jQuery('.aboutme.dropdown');
				var oTargetParentOffset = $this.parent().position();
				jQuery('html, body').animate({scrollTop:oTargetParentOffset.top-50});
				});
       
        
});




var initialPoint = null;
var markers = null;
var map = null;
function initialize() {
  var mapOptions = {
    zoom: 8,
    center: new google.maps.LatLng(initialPoint.lat, initialPoint.lng)
  };

  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
  var marker = new google.maps.Marker({
                position: new google.maps.LatLng(initialPoint.lat,initialPoint.lng),
                map: map,
                title: '',
                zIndex: 1
            }); 
}

function loadScript() {
  var script = document.createElement('script');
  script.type = 'text/javascript';
  script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' +
      'callback=initialize';
  document.body.appendChild(script);
}
