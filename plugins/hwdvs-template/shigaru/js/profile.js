jQuery(document).ready(function () {
	var guid = jQuery('#user_id').val();
    var oShigaruVideoList  = jQuery('#resultcontainer').shigaruVideoList(
			{
				needsHeaderProfile:true,
				needsUserMenu:true,
				selectedUserMenu:'#myvideos',
				listURL:'index.php?option=com_hwdvideoshare&Itemid=29&task=ajax_myvideos&ajax=yes&format=raw&lang='+currentLang+'&guid='+guid
		});    
});
