jQuery(document).ready(function() {
  var oCurrentlang = jQuery('#currentlang').val();
  jQuery("#owl-demo").owlCarousel({
	jsonPath : 'index.php?option=com_shigaruhome&task=getvideolist&list_type=liked&format=raw&lang='+oCurrentlang,
    jsonSuccess : function(data){customDataSuccess(data,"#owl-demo")},
    items : 5,
    navigation : true
  }); 
  jQuery("#owl-demo2").owlCarousel({
	jsonPath : 'index.php?option=com_shigaruhome&task=getvideolist&list_type=bwn&format=raw&lang='+oCurrentlang,
    jsonSuccess : function(data){customDataSuccess(data,"#owl-demo2")},
    items :5,
    navigation : true
  }); 
  jQuery("#owl-demo3").owlCarousel({
	jsonPath : 'index.php?option=com_shigaruhome&task=getvideolist&list_type=rated&format=raw&lang='+oCurrentlang,
    jsonSuccess : function(data){customDataSuccess(data,"#owl-demo3")},
    items :5,
    navigation : true
  }); 
  
  jQuery("#owl-demo4").owlCarousel({
	jsonPath : 'index.php?option=com_shigaruhome&task=getvideolist&list_type=recent&format=raw&lang='+oCurrentlang,
    jsonSuccess : function(data){customDataSuccess(data,"#owl-demo4")},  
    items : 5,
    navigation : true
  }); 
  
  
  function customDataSuccess(data,target){
    var content = "";
    for(var i in data){       		
       var img = data[i].thumbnail;
       var alt = data[i].title;
		alt = alt.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, ' ');
       var pic = null;
       var meass = ''; 
       if(img !=''){
			if(img.indexOf('http') < 0)
				img = 'hwdvideos/thumbs/'+data[i].thumbnail;
				else
					meass = ' width="90px" height="120px" '
			pic = '<img '+meass+' class="mright6" src="'+img+'" alt="'+alt+'" title="'+alt+'" />'	
				}else if(data[i].thumbnail =='')
					pic = '<img class="mright6" width="20" height="20" src="templates/rhuk_milkyway/images/vinyl-icon.png" alt="'+alt+'" title="'+alt+'" />';					 
       content += '<div><a href="index.php?option=com_hwdvideoshare&task=viewvideo&video_id='+data[i].id+'&lang='+oCurrentlang+'" title="' +alt+ '">'+pic+ '</a></div>'
    }
    jQuery(target).html(content);
  }
 
});
