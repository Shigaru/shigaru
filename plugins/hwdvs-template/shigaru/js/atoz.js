jQuery(document).ready(function () {
   jQuery.ajax({
            url: 'index.php?option=com_hwdvideoshare&task=ajax_getsongsbyfirstletter&ajax=yes',
            success: function (data) {
				if(data){
					var oBandInfoDiv   = jQuery("#resultcontainer");
					oBandInfoDiv.hide().empty().html(data).show(500);
					}
            }
        });
        
     jQuery.ajax({
			dataType: "json",
            url: 'index.php?option=com_hwdvideoshare&task=ajax_getbandevents&ajax=yes&item_id=all',
            success: function (data) {
				var oBandEventsDiv = jQuery("#bandevents");
				oBandEventsDiv.hide().empty();
				oBandEventsDiv.show(500,function(){
					if(data.resultsPage.results.location){
						jQuery( "<div />" ).attr('id','map-canvas').css({'width':'250px','height':'250px'}).appendTo(oBandEventsDiv);
						initialPoint = data.resultsPage.results.location[0].city;
						markers = data.resultsPage.results.location;	
						loadScript();		
					}					
				});
            }
        });
        
            
    jQuery('.bandsong').click(function(e){
		
		
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
  addMarkers();    
}

function loadScript() {
  var script = document.createElement('script');
  script.type = 'text/javascript';
  script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' +
      'callback=initialize';
  document.body.appendChild(script);
}

function addMarkers(){
	
	for (var i = 0; i < markers.length; i++) {
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(markers[i].city.lat,markers[i].city.lng),
                map: map,
                title: markers[i].city.displayName+' ('+markers[i].city.country.displayName+') ',
                zIndex: i
            });
        }
	
	}



