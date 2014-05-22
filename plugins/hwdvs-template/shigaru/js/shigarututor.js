jQuery(document).ready(function () {
	var oTargetDiv 			= jQuery('#recentactivityvideos');
	var oTargetDivOthers 	= jQuery('#recentactivityother');
	var oTargetDivPlaylists	= jQuery('#channelplaylists');
	jQuery.ajax({
			dataType: "json",
            url: 'index.php?option=com_shigarututor&Itemid=83&lang=es&task=getrecentchannelactivity&format=raw&lang='+currentLang,
            success: function (data) {
				oTargetDiv.empty();//console.log(data);
				oTargetDivOthers.empty();
				var nextuploadbig = false;
				if(data){
					jQuery(data.items).each(function(i,e){//console.log(e);
					     var oUrl = 'index.php?option=com_shigarututor&Itemid=83&lang=es&task=gotovideo&video_id='
						 if(e.snippet.type == 'upload'){
							var itemContent = '';
							if(i==0 || nextuploadbig){
								nextuploadbig = false;
								itemContent += '<div class="fleft clearfix videobox">';
								itemContent += '<div class="clearfix"><div class="mbot12 clearfix fleft"><a href="'+oUrl+e.contentDetails.upload.videoId+'" class="fleft"><img src="'+e.snippet.thumbnails.medium.url+'" class="fleft"/></a></div>'
								itemContent += '<div class="fleft w50 clearfix">';
								itemContent += '<h5 class="fleft mleft12 mbot6"><a href="'+oUrl+e.contentDetails.upload.videoId+'">'+e.snippet.title+'</a></h5>';	
								}else{
									var str = e.snippet.title;
									var res = str.substring(0, 100);
									if(str.length > 100)
										res += '...';
									itemContent += '<div class="fleft w50 clearfix videobox">';
									itemContent += '<div class="clearfix"><div class="mbot12 clearfix fleft"><a href="'+oUrl+e.contentDetails.upload.videoId+'" class="fleft"><img src="'+e.snippet.thumbnails.default.url+'" class="fleft mtop12"/></a></div>'
									itemContent += '<div class="fleft w50 clearfix f90">';
									itemContent +='<h5 class="fleft mleft12 mtop12 mbot6"><a href="'+oUrl+e.contentDetails.upload.videoId+'" class="fleft">'+res+'</a></h5>';	
								}
							if(i==0){
							var str = e.snippet.description;
							var res = str.substring(0, 350);	
							itemContent += '<div class="fleft f90 mleft12 mbot12"> '+res+'</div>';	
							}
							itemContent += '</div></div>';
							itemContent += '<div class="fnone clearfix mtopl25"><div class="fright mright12 f90"> shared '+timeSince(new Date(e.snippet.publishedAt))+' ago</div></div>';	
							itemContent += '</div>';
							itemContent += '</div>';
							oTargetDiv.append(itemContent);
						  }else{
								if(i==0 || nextuploadbig)
									nextuploadbig = true;
									else
										nextuploadbig = false;
								var itemContent = '<div class="fleft w30 mleft12 mbot6 clearfix">';
								var str = e.snippet.title;
								var res = str.substring(0, 16);
								str = str.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, ' ');
								itemContent += '<a href="index.php?option=com_shigarututor&Itemid=83&lang=es&task=gotovideo&video_id='+e.contentDetails.like.resourceId.videoId+'" title="'+str+'"><img src="'+e.snippet.thumbnails.default.url+'" class="fleft"/>'
								itemContent += '<h6 class="fleft mtop6">'+res+'...</h6>';	
								itemContent += '</a></div>';
								oTargetDivOthers.append(itemContent);
							  }	
						});
						
						oTargetDiv.find('.videobox a').click(function(e){
							addLoadingLayer(this);
						});
						oTargetDivOthers.find('.fleft.w30 a').click(function(e){
							addLoadingLayer(this);
						});
					
				}					
            }
        });
        /*
        jQuery.ajax({
			dataType: "json",
            url: 'index.php?option=com_shigarututor&Itemid=83&lang=es&task=getchannelplaylists&format=raw&lang='+currentLang,
            success: function (data) {
				oTargetDivPlaylists.empty();
				console.log(data);
				if(data){
					jQuery(data.items).each(function(i,e){
							var oUrl = 'index.php?option=com_shigarututor&Itemid=83&lang=es&task=gotovideo&video_id='
							var itemContent = '';
							var str = e.snippet.title;
							var res = str.substring(0, 100);
							if(str.length > 100)
								res += '...';
							itemContent += '<div class="fleft w50 clearfix">';
							itemContent += '<div class="clearfix"><div class="mbot12 clearfix fleft mleft12"><a href="'+oUrl+e.id+'" class="fleft"><img src="'+e.snippet.thumbnails.default.url+'" class="fleft mtop12"/></a></div>'
							itemContent += '<div class="fleft w40 clearfix f90">';
							itemContent +='<h5 class="fleft mleft12 mtop12 mbot6"><a href="'+oUrl+e.id+'" class="fleft">'+res+'</a></h5>';	
							itemContent += '</div></div>';
							itemContent += '<div class="fnone clearfix mtopl25"><div class="fright mright12 f90"> shared '+timeSince(new Date(e.snippet.publishedAt))+' ago</div></div>';	
							itemContent += '</div>';
							itemContent += '</div>';
							oTargetDivPlaylists.append(itemContent);
						});
					
					
				}					
            }
        });
        */
        function addLoadingLayer($this){
				var oViedoBox = (jQuery($this).closest( ".videobox" ).length == 0)?jQuery($this).closest( ".fleft.w30" ):jQuery($this).closest( ".videobox" );
				oViedoBox.css('background','#F0F0F0');
				oViedoBox.find('.fleft.f90').empty().append('<div class="mtop20 w100 tcenter f300"><i class="icon-spinner icon-spin"></i></div>');
				oViedoBox.find('.fnone.mtopl25').empty();
				oViedoBox.find('img').fadeTo( "fast", 0.33 );
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
});
