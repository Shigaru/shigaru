jQuery(document).ready(function () {
	var guid = jQuery('#user_id').val();
    var oShigaruVideoList  = jQuery('#resultcontainer').shigaruVideoList(
			{
				needsHeaderProfile:true,
				needsUserMenu:true,
				selectedUserMenu:'#watchhistory',
				listURL:'index.php?option=com_hwdvideoshare&task=ajax_watchhistory&format=raw&lang='+currentLang+'&guid='+guid,
				masonryColumnWidth : 255,
				masonryHorizontalRowHeight: 200,
				cellsByRowColumnWidth : 380, 
				cellsByRowRowHeight: 225,	
				listURL:'index.php?option=com_hwdvideoshare&Itemid=29&task=ajax_myvideos&ajax=yes&format=raw&lang='+currentLang+'&guid='+guid,
				layoutDefaultCss:[{'width': "235px",'height':'150px',fontSize:'100%','padding':'4px 0 0 0','border':'none',margin:0}],
				layoutDefaultImgCss: [{ width: "94px"}],
				masonryCss:[{'border-bottom':'1px dotted gray','margin':'12px 0px 0px 4px'}],
				masonryImgCss:[{'border-bottom':'1px dotted gray','margin':'12px 0px 0px 4px'}],
				cellsByRowCss: [{'border-bottom':'1px dotted gray',fontSize:'100%','padding-top':'0','margin':'-12px 0 0 -12px'}],
				cellsByRowImgCss: [{ width: "136px"}],
				straightDownCss: [{height: "140px",fontSize:'120%','border-bottom':'1px dotted gray', 'padding':'4px 2px 2px 0'}],
				straightDownImgCss: [{width: "122px"}]
		});   
		jQuery('ul#mainlevel-nav li a').each(function(i,e){
			if(jQuery(e).attr('id') == 'active_menu-nav')
				jQuery(e).removeAttr('id')
				else if(jQuery(e).parent().hasClass('last'))
					jQuery(e).attr('id','active_menu-nav');
		}); 
});
