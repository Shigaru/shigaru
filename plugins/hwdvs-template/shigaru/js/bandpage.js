jQuery(document).ready(function () {
    jQuery("#albumsongs .resultelement").css({width:'100%'});
    doLoadBandInfo();
    var oShigaruVideoList  = jQuery('#resultcontainer').shigaruVideoList(
			{
				needsHeaderProfile:false,
				listURL:'index.php?option=com_hwdvideoshare&Itemid=29&task=displayresults&ajax=yes&searchcategory=videosongs&lang='+currentLang+'&format=raw&pattern='+bandName,
				masonryColumnWidth : 255,
				masonryHorizontalRowHeight: 200,
				cellsByRowColumnWidth : 380, 
				cellsByRowRowHeight: 225,	
				layoutDefaultCss:[{'width': "235px",'height':'150px',fontSize:'100%','padding':'4px 0 0 0','border':'none',margin:0}],
				layoutDefaultImgCss: [{ width: "94px"}],
				masonryCss:[{'border-bottom':'1px dotted gray','margin':'12px 0px 0px 4px'}],
				masonryImgCss:[{'border-bottom':'1px dotted gray','margin':'12px 0px 0px 4px'}],
				cellsByRowCss: [{'border-bottom':'1px dotted gray',fontSize:'100%','padding-top':'0','margin':'-12px 0 0 -12px'}],
				cellsByRowImgCss: [{ width: "136px"}],
				straightDownCss: [{height: "140px",fontSize:'120%','border-bottom':'1px dotted gray', 'padding':'4px 2px 2px 0'}],
				straightDownImgCss: [{width: "126px"}]
			
		});
    function doLoadBandInfo() {
        var oBandInfoDiv   = jQuery("#bandinfo");
        var oBandEventsDiv = jQuery("#bandevents");
        jQuery.ajax({
			dataType: "json",
            url: 'index.php?option=com_hwdvideoshare&lang='+currentLang+'&task=ajax_getbandexternalinfo&ajax=yes&searchoption='+searchoption+'&item_id='+bandId,
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
            url: 'index.php?option=com_hwdvideoshare&task=ajax_getbandevents&lang='+currentLang+'&ajax=yes&item_id='+bandId,
            success: function (data) {
				oBandEventsDiv.hide().empty();
				oBandEventsDiv.show(500,function(){

					if(data.resultsPage && data.resultsPage.results.location){
						jQuery('#forthisband').hide();
						jQuery('#inyourarea').show();
						jQuery('#inyourareaexplain').show();
						jQuery( "<div />" ).attr('id','map-canvas').css({'width':'300px','height':'300px'}).appendTo(oBandEventsDiv);
						initialPoint = data.resultsPage.results.location[0].city;
						markers = data.resultsPage.results.location;	
						loadScript();		
					}else{
							if(data.resultsPage.status == 'ok' && data.resultsPage.results.event){
								jQuery( "<div />" ).attr('id','map-canvas').css({'width':'250px','height':'250px'}).appendTo(oBandEventsDiv);
								initialPoint = data.resultsPage.results.event[0].location;
								markers = data.resultsPage.results.event;	
								loadScript();		
							}else{
								jQuery( '#bandevents').hide().prev().hide();
								}
								
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
            var eventtime = ' (' + markers[i].start.time + ')';
            var perfomance = '<div><h1 class="fontbold"> * '+markers[i].type+' *   	'+markers[i].location.city	+'</h1>';
            for (var g = 0; g < markers[i].performance.length; g++){
				  if(g==0)
					perfomance += '<div>';
				  perfomance += '<div><a  class="fontbold" target="_blank"  href="'+markers[i].performance[g].artist.uri+'">'+markers[i].performance[g].artist.displayName+'</a></div>';
				  
				  if(g==markers[i].performance.length-1)
					perfomance += '</div>';
				}
            var contentWindow = perfomance+
			  '</div>'+
			  ''+
			  '<div><a target="_blank" href="'+markers[i].uri+'">'+
			  markers[i].displayName +
			  '</a></div>'+
			  '<div><a target="_blank"  href="'+markers[i].venue.uri+'">'+
			  markers[i].venue.displayName + ' * ' + markers[i].start.date  + eventtime + ' *'+
			  '</a></div>'+
			  '<div>';
			  	  
			var oInfowindow = new google.maps.InfoWindow({
			  content: contentWindow
			});
             addInfoWindow(marker, oInfowindow);
        }
	
	}
