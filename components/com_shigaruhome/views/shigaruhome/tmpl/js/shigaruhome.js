jQuery(document).ready(function() {
	
  var oCurrentlang = jQuery('#currentlang').val();
  
  var owlliked = jQuery("#shigaruowlliked").shigaruHome({
	paramUrl : 'index.php?option=com_shigaruhome&task=getvideolist&list_type=liked&format=raw&lang='+oCurrentlang,
    oContentItemId : '#shigaruowlliked'
  }); 
  var owlbwn = jQuery("#shigaruowlbwnow").shigaruHome({
	paramUrl : 'index.php?option=com_shigaruhome&task=getvideolist&list_type=bwn&format=raw&lang='+oCurrentlang,
    oContentItemId : '#shigaruowlbwnow'
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
       var oCount = addSpecificData(opts.oContentItemId.substring(opts.oContentItemId.length-5,opts.oContentItemId.length), data[i]);
       alt = alt.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, ' ');
       if(img !=''){
			if(img.indexOf('http') < 0)
				img = 'hwdvideos/thumbs/'+data[i].thumbnail;
				else
					meass = ' width="120px" height="90px" ';
			pic = '<img '+meass+' class="mright6" src="'+img+'" alt="'+alt+'" title="'+alt+'" />'	
				}else if(data[i].thumbnail =='')
					pic = '<img class="mright6" width="20" height="20" src="templates/rhuk_milkyway/images/vinyl-icon.png" alt="'+alt+'" title="'+alt+'" />';					 
       content += '<div><div><a href="index.php?option=com_hwdvideoshare&task=viewvideo&video_id='+data[i].id+'&lang='+oLanguage+'" title="' +alt+ '">'+pic+ '</a><div class="mright12"><span class="f60 mright24 videotime">'+data[i].video_length+'</span></div></div>';
       content += '<div class="f13px mtop2 pad2"><h6><a href="index.php?option=com_hwdvideoshare&task=viewvideo&video_id='+data[i].id+'&lang='+oLanguage+'" title="' +alt+ '">'+data[i].title+'</a></h6></div>';
       content += oCount;
       content += '<div class="f60">Shared '+timeSince(new Date(data[i].date_uploaded))+' ago</div>';
       content += '</div>';
    }
    jQuery(opts.oContentItemId).html(content);
    addActions();
  }
  
  
  function startCarousel(){
	  oContentItem.owlCarousel({
			jsonPath : opts.paramUrl,
			jsonSuccess : function(data){customDataSuccess(data,opts.oContentItemId)},
			items : opts.items,
			lazyLoad : opts.lazyLoad,
			navigation : opts.navigation
		  });
	  }
	  
  function addActions(){
	  
	  oContentItem.prev().find('a.btn').click(function(e) {
				var $this = jQuery(this);
				$this.next().toggle();
				e.preventDefault();
				e.stopPropagation();
			});
	  
	  }	  
  function timeSince(date) {
	  	var seconds = Math.floor((new Date() - date) / 1000);
		var interval = Math.floor(seconds / 31536000);

		if (interval > 1) {
			return interval + " years";
		}
		interval = Math.floor(seconds / 2592000);
		if (interval > 1) {
			return interval + " months";
		}
		interval = Math.floor(seconds / 86400);
		if (interval > 1) {
			return interval + " days";
		}
		interval = Math.floor(seconds / 3600);
		if (interval > 1) {
			return interval + " hours";
		}
		interval = Math.floor(seconds / 60);
		if (interval > 1) {
			return interval + " minutes";
		}
		return Math.floor(seconds) + " seconds";
	}	  
  function addSpecificData(paramType, paramData){
	  var oSpecificData = '';
	  var oPlural = (parseInt(paramData.cnt)>1)?'s':'';
		switch(paramType){
			case 'liked':
							oSpecificData +='<div class="f60 mtop2">'+paramData.cnt+' time'+oPlural+' liked</div>';
							break;
			case 'rated':
							oSpecificData +='<div class="f60 mtop2"><img src="components/com_hwdvideoshare/assets/images/ratings/stars'+parseInt(paramData.updated_rating)+'0.png" width="80" height="16" alt="'+paramData.cnt+' votes" /> <span class="f80">('+paramData.cnt+' vote'+oPlural+')</span></div>';
							break;
			case 'bwnow':
							oSpecificData +='<div class="f60 mtop2">'+paramData.number_of_views+' views</div>';
							break;
			case 'ecent':
							oSpecificData +='';
							break;
			default:
							oSpecificData +='<div class="f60 mtop2">'+paramData.number_of_views+' views</div>';
							break;
			
			}
		return	oSpecificData;
	  }
	  
  function addSortingControls(){
	  
	  }
  
  function addFilteringControls(){
	  
	  }
	  
  function previewItemContent(){
	  
	  }
	  	  
  }

  jQuery.fn.shigaruHome.defaults = {
	items : 5,
	navigation : true,
	lazyLoad : false,
	paramUrl : 'index.php?option=com_shigaruhome&task=getvideolist&list_type=liked&format=raw&lang=en',
	oContentItemId : '#shigaruowl'
  }
  
})(jQuery);

