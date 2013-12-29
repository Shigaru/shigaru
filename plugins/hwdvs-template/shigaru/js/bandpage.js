jQuery(document).ready(function () {
    jQuery("#albumsongs .resultelement").css({width:'100%'});
    doLoadBandInfo();
    var oShigaruVideoList  = jQuery('#resultcontainer').shigaruVideoList(
			{
				needsHeaderProfile:false,
				listURL:'index.php?option=com_hwdvideoshare&Itemid=29&task=displayresults&ajax=yes&searchcategory=videosongs&format=raw&pattern='+bandName
			
		});
    function doLoadBandInfo() {
        var oBandInfoDiv   = jQuery("#bandinfo");
        var oBandEventsDiv = jQuery("#bandevents");
        jQuery.ajax({
			dataType: "json",
            url: 'index.php?option=com_hwdvideoshare&lang=en&task=ajax_getbandexternalinfo&ajax=yes&searchoption='+searchoption+'&item_id='+bandId,
            success: function (data) {
				if(data.response.status.code==0){
					oBandInfoDiv.hide().empty();
					jQuery.each( data.response.urls, function( i, item ) {
						var exturl = jQuery( "<a />" ).attr( "href", item ).attr('target','_blank').append(item);
						jQuery( "<div />" ).append(exturl).appendTo(oBandInfoDiv);
					  });
					oBandInfoDiv.show(500);
					}else
						oBandInfoDiv.hide().empty().append(data.response.status.message).show(500);			
            }
        })
        jQuery.ajax({
			dataType: "json",
            url: 'index.php?option=com_hwdvideoshare&task=ajax_getbandevents&ajax=yes&item_id='+bandId,
            success: function (data) {
				oBandEventsDiv.hide().empty();
				oBandEventsDiv.show(500,function(){
					if(data.resultsPage.results.location){
						jQuery('#forthisband').hide();
						jQuery('#inyourarea').show();
						jQuery('#inyourareaexplain').show();
						jQuery( "<div />" ).attr('id','map-canvas').css({'width':'300px','height':'300px'}).appendTo(oBandEventsDiv);
						initialPoint = data.resultsPage.results.location[0].city;
						markers = data.resultsPage.results.location;	
						loadScript();		
					}else{
							jQuery.each( data.resultsPage.results.event, function( i, item ) {
							var exturl = jQuery( "<a />" ).attr( "src", item.performance[0].artist.uri ).attr('target','_blank').append(item.displayName);
							jQuery( "<div />" ).append(exturl).appendTo(oBandEventsDiv);
						  });	
						}
					
				});
            }
        })
    }
    
   
   
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
