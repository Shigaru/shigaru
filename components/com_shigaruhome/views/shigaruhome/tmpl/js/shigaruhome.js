jQuery(document).ready(function() {
 
  jQuery("#owl-demo").owlCarousel({
	jsonPath : 'index.php?option=com_shigaruhome&task=getvideolist&list_type=liked&format=raw',
    jsonSuccess : function(data){customDataSuccess(data,"#owl-demo")},
    items : 5,
    navigation : true
  }); 
  jQuery("#owl-demo2").owlCarousel({
	jsonPath : 'index.php?option=com_shigaruhome&task=getvideolist&list_type=bwn&format=raw',
    jsonSuccess : function(data){customDataSuccess(data,"#owl-demo2")},
    items :5,
    navigation : true
  }); 
  jQuery("#owl-demo3").owlCarousel({
	jsonPath : 'index.php?option=com_shigaruhome&task=getvideolist&list_type=rated&format=raw',
    jsonSuccess : function(data){customDataSuccess(data,"#owl-demo3")},
    items :5,
    navigation : true
  }); 
  
  jQuery("#owl-demo4").owlCarousel({
	jsonPath : 'index.php?option=com_shigaruhome&task=getvideolist&list_type=recent&format=raw',
    jsonSuccess : function(data){customDataSuccess(data,"#owl-demo4")},  
    items : 5,
    navigation : true
  }); 
  
  
  function customDataSuccess(data,target){
    var content = "";
    for(var i in data){       
       var img = data[i].thumbnail;
       var alt = data[i].title; 
       content += "<img src=\"hwdvideos/thumbs/" +img+ "\" alt=\"" +alt+ "\" />"
    }
    jQuery(target).html(content);
  }
 
});
