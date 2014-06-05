jQuery(document).ready(function() {
	
  var oCurrentlang = jQuery('#currentlang').val();
  
  var owlliked = jQuery("#shigaruowlliked").shigaruHome({
	paramUrl : 'index.php?option=com_shigaruhome&task=getvideolist&list_type=liked&format=raw&lang='+oCurrentlang,
    oContentItemId : '#shigaruowlliked'
  }); 
  var owlbwn = jQuery("#shigaruowlbwn").shigaruHome({
	paramUrl : 'index.php?option=com_shigaruhome&task=getvideolist&list_type=bwn&format=raw&lang='+oCurrentlang,
    oContentItemId : '#shigaruowlbwn'
  }); 
  var owlrated = jQuery("#shigaruowlrated").shigaruHome({
	paramUrl : 'index.php?option=com_shigaruhome&task=getvideolist&list_type=rated&format=raw&lang='+oCurrentlang,
    oContentItemId : '#shigaruowlrated'
  }); 
  
  var owlrecent = jQuery("#shigaruowlrecent").shigaruHome({
	paramUrl : 'index.php?option=com_shigaruhome&task=getvideolist&list_type=recent&format=raw&lang='+oCurrentlang,
	oContentItemId : '#shigaruowlrecent'
  }); 
  
});

(function(jQuery) {
  jQuery.fn.shigaruHome = function(options) {
	  
	var opts 			= jQuery.extend({}, jQuery.fn.shigaruHome.defaults, options);
	var oContentItem 	= jQuery(opts.oContentItemId);
	var oLanguage		= jQuery('#currentlang').val()
	
    return this.each(function() {
			startCarousel();
    });
    
    
  function customDataSuccess(data){
    var content = "";
    for(var i in data){       		
       var img = data[i].thumbnail;
       var alt = data[i].title;
       var pic = null;
       var meass = ''; 
       alt = alt.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, ' ');
       if(img !=''){
			if(img.indexOf('http') < 0)
				img = 'hwdvideos/thumbs/'+data[i].thumbnail;
				else
					meass = ' width="120px" height="90px" '
			pic = '<img '+meass+' class="mright6" src="'+img+'" alt="'+alt+'" title="'+alt+'" />'	
				}else if(data[i].thumbnail =='')
					pic = '<img class="mright6" width="20" height="20" src="templates/rhuk_milkyway/images/vinyl-icon.png" alt="'+alt+'" title="'+alt+'" />';					 
       content += '<div><a href="index.php?option=com_hwdvideoshare&task=viewvideo&video_id='+data[i].id+'&lang='+oLanguage+'" title="' +alt+ '">'+pic+ '</a></div>'
    }
    jQuery(opts.oContentItemId).html(content);
  }
  
  
  function startCarousel(){
	  oContentItem.owlCarousel({
			jsonPath : opts.paramUrl,
			jsonSuccess : function(data){customDataSuccess(data,opts.oContentItemId)},
			items : opts.items,
			navigation : opts.navigation
		  });
	  }
	  
  function addSortingControls(){
	  
	  }
  
  function addFilteringControls(){
	  
	  }
	  
  function previewItemContent(){
	  
	  }
	  	  
  }

  jQuery.fn.shigaruHome.defaults = {
	items : 6,
	navigation : true,
	paramUrl : 'index.php?option=com_shigaruhome&task=getvideolist&list_type=liked&format=raw&lang=en',
	oContentItemId : '#shigaruowl'
  }
  
})(jQuery);

