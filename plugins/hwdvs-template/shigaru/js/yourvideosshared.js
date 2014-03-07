jQuery(document).ready(function () {
	var guid = jQuery('#user_id').val();
    var oShigaruVideoList  = jQuery('#resultcontainer').shigaruVideoList(
			{
				needsHeaderProfile:true,
				needsUserMenu:true,
				selectedUserMenu:'#myvideosshared',
				listURL:'index.php?option=com_hwdvideoshare&task=ajax_myvideosshared&format=raw&lang='+currentLang+'&guid='+guid
		});    
});
