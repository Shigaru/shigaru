jQuery(document).ready(function () {
    var oShigaruVideoList  = jQuery('#resultcontainer').shigaruVideoList(
			{
				needsHeaderProfile:true,
				listURL:'index.php?option=com_hwdvideoshare&Itemid=29&task=displayresults&ajax=yes&format=raw'
		});    
});
