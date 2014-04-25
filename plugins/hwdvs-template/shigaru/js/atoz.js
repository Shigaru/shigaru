jQuery(document).ready(function () {
	var oBandInfoDiv   = jQuery("#resultcontainer");
	var init = false;
	var oUrl = 'index.php?option=com_hwdvideoshare&task=ajax_getsongsbyfirstletter&ajax=yes&lang='+currentLang+'&letter=';
		if(songorband == 'band')
			oUrl = 'index.php?option=com_hwdvideoshare&task=ajax_getbandsbyfirstletter&ajax=yes&lang='+currentLang+'&letter=';
	loadBandSongs('a');        
     jQuery.ajax({
			dataType: "json",
            url: 'index.php?option=com_hwdvideoshare&task=ajax_getbandevents&ajax=yes&item_id=all&lang='+currentLang,
            success: function (data) {
				var oBandEventsDiv = jQuery("#bandevents");
				oBandEventsDiv.empty().show(500,function(){
					if(data.resultsPage.status == 'ok' && data.resultsPage.results.event){
						jQuery( "<div />" ).attr('id','map-canvas').css({'width':'250px','height':'250px'}).appendTo(oBandEventsDiv);
						initialPoint = data.resultsPage.results.event[0].location;
						markers = data.resultsPage.results.event;	
						loadScript();		
					}else{
						jQuery( '#bandevents').hide().prev().hide();
						}					
				});
            }
        });
        
            
    jQuery('.pagination a.page').click(function(e){
			var $this = jQuery(e.target);
			loadBandSongs($this.attr('class').split(' ')[0]);		
			jQuery('a.page.selected').removeClass('selected');
			$this.addClass('selected');
			e.preventDefault();
		});
		
	function loadBandSongs(letter){
			if(init)
				oBandInfoDiv.empty().html('<div class="loadingcontent" style="line-height:600px"><i class="icon-spinner icon-spin"></i> Loading...</div>').show(500);
			jQuery.ajax({
				url: oUrl+letter,
				success: function (data) {
					if(data){
						oBandInfoDiv.empty().html(data).show(500);
						init = true;
						}
				}
			});
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

function addInfoWindow(marker, oInfowindow) {
	google.maps.event.addListener(marker, 'click', function () {
		closeAllInfoWindows();
		oInfowindow.open(map, marker);
		infoWindows.push(oInfowindow);
	});
}
var infoWindows = [];
function closeAllInfoWindows() {
  for (var i=0;i<infoWindows.length;i++) {
     infoWindows[i].close();
  }
}

function addMarkers(){
	for (var i = 0; i < markers.length; i++) {
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(markers[i].location.lat,markers[i].location.lng),
                map: map,
                title: markers[i].location.city+' ('+markers[i].displayName+') ',
                zIndex: i
            });
			var oInfowindow = new google.maps.InfoWindow({
			  content: '<div id="content">'+
			  '<div id="siteNotice">'+
			  '</div>'+
			  '<h1 id="firstHeading" class="firstHeading">'+markers[i].location.city	+'</h1>'+
			  '<div id="bodyContent">'+
			  markers[i].displayName +
			  '</div>'+
			  '</div>'
			});
             addInfoWindow(marker, oInfowindow);
			  
        }
	
	}



