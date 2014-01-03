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
				console.log(data);
				if(data){
					oTargetDiv.html(data).show(500);	
				}					
            }
        });	
});
