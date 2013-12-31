jQuery(document).ready(function () {
    var oShigaruVideoList  = jQuery('#resultcontainer').shigaruVideoList(
			{
				needsHeaderProfile:true,
				needsUserMenu:true,
				selectedUserMenu:'#myvideosshared',
				listURL:'index.php?option=com_hwdvideoshare&task=ajax_myvideos&format=raw'
		});    
});
