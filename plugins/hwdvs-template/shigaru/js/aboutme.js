jQuery(document).ready(function () {
    var oShigaruVideoList  = jQuery('#resultcontainer').shigaruVideoList(
			{
				needsHeaderProfile:true,
				needsUserMenu:true,
				needsVideoListLoading:false,
				selectedUserMenu:'#aboutme',
				listURL:'index.php?option=com_hwdvideoshare&task=ajax_aboutme&format=raw&lang='+currentLang
		});    
		
	jQuery.ajax({
            url: 'index.php?option=com_hwdvideoshare&task=ajax_aboutme&ajax=yes&item_id=all&lang='+currentLang,
            success: function (data) {
				var oTargetDiv = jQuery('#resultcontainer');
				if(data){					
					oTargetDiv.css({'-webkit-box-shadow': '0px 0px 0px 0px rgba(12, 12, 12, 0.3)',
						'box-shadow': '0px 0px 0px 0px rgba(12, 12, 12, 0.3)',
						'-webkit-border-radius': '0px',
						'border-radius': '0px'
						});
					oTargetDiv.html(data).show(500);	
					initialPoint = {};
					initialPoint.lat = jQuery('#lat').val();
					initialPoint.lng = jQuery('#lng').val();
					console.log(initialPoint);
					loadScript();	
				}					
            }
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
