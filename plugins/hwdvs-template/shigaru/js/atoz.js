jQuery(document).ready(function () {
   jQuery.ajax({
            url: 'index.php?option=com_hwdvideoshare&task=ajax_getsongsbyfirstletter&ajax=yes',
            success: function (data) {
				if(data){
					var oBandInfoDiv   = jQuery("#resultcontainer");
					oBandInfoDiv.hide().empty().html(data).show(500);
					}
            }
        })
    jQuery('.bandsong').click(function(e){
		
		
		});
});


