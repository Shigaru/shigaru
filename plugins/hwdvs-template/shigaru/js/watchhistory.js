jQuery(document).ready(function () {
    var oShigaruVideoList  = jQuery('#resultcontainer').shigaruVideoList(
			{
				needsHeaderProfile:true,
				needsUserMenu:true,
				selectedUserMenu:'#watchhistory',
				listURL:'index.php?option=com_hwdvideoshare&task=ajax_watchhistory&format=raw&lang='+currentLang
		});    
});
