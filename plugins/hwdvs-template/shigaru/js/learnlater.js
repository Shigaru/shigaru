jQuery(document).ready(function () {
    var oShigaruVideoList  = jQuery('#resultcontainer').shigaruVideoList(
			{
				needsHeaderProfile:true,
				needsUserMenu:true,
				selectedUserMenu:'#mylearnlater',
				listURL:'index.php?option=com_hwdvideoshare&task=ajax_learnlater&format=raw&lang='+currentLang
		});    
});
