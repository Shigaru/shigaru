
/* WHEN A NEW WINDOW IS CREATED, THIS ENABLES DRAGGING, IT ALSO TAKES CARE OF SNAP2SIDE FUNCTIONALITY */
function enable_draggable()
{
    jQuery('.window').draggable({
        containment: '#window-container',
        handle: jQuery('.title'),
        opacity: 0.5,

        drag: function (e, ui) {
            var left = jQuery(this).css('left');
            var right = jQuery(this).css('right');
            var top = jQuery(this).css('top');
            var bottom = jQuery(this).css('bottom');

            //Left snap
            if (left == '0px') {
                if (!jQuery('.snapper').length) {
                    if (jQuery.myGlobals.timestamp == 0) {
                        jQuery.myGlobals.timestamp = e.timeStamp;
                    }
                    var dragLength = e.timeStamp - jQuery.myGlobals.timestamp;
                    if (dragLength > 200) {
                        jQuery(this).addClass('snapLeft');
                        jQuery(this).draggable('option', 'stop');
                        jQuery('#window-container').append('<div id="snapLeft" class="snapper">&nbsp;</div>');
                        jQuery.myGlobals.timestamp = 0;
                    }
                }
                else {
                    if (jQuery(this).hasClass('snapRight')) {
                        jQuery(this).removeClass('snapRight'); jQuery.myGlobals.timestamp = 0;
                      }
                    if (jQuery(this).hasClass('snapTop')) {
                        jQuery(this).removeClass('snapTop'); jQuery.myGlobals.timestamp = 0;
                     }
                    if (jQuery(this).hasClass('snapBottom')) {
                        jQuery(this).removeClass('snapBottom'); jQuery.myGlobals.timestamp = 0; 
                    }
                }
            }
            //Right snap
            else if (right == '0px') {
                if (!jQuery('.snapper').length) {
                    if (jQuery.myGlobals.timestamp == 0) {
                        jQuery.myGlobals.timestamp = e.timeStamp;
                    }
                    var dragLength = e.timeStamp - jQuery.myGlobals.timestamp;
                    if (dragLength > 200) {
                        jQuery(this).addClass('snapRight');
                        jQuery(this).draggable('option', 'stop');
                        jQuery('#window-container').append('<div id="snapRight" class="snapper">&nbsp;</div>');
                        jQuery.myGlobals.timestamp = 0;
                    }
                }
                else {
                    if (jQuery(this).hasClass('snapLeft')) {
                        jQuery(this).removeClass('snapLeft'); jQuery.myGlobals.timestamp = 0;
                    }
                    if (jQuery(this).hasClass('snapTop')) {
                        jQuery(this).removeClass('snapTop'); jQuery.myGlobals.timestamp = 0;
                    }
                    if (jQuery(this).hasClass('snapBottom')) {
                        jQuery(this).removeClass('snapBottom'); jQuery.myGlobals.timestamp = 0;
                    }
                }
            }
            //Top snap
            else if (top == '0px') {
                if (!jQuery('.snapper').length) {
                    if (jQuery.myGlobals.timestamp == 0) {
                        jQuery.myGlobals.timestamp = e.timeStamp;
                    }
                    var dragLength = e.timeStamp - jQuery.myGlobals.timestamp;
                    if (dragLength > 200) {
                        jQuery(this).addClass('snapTop');
                        jQuery(this).draggable('option', 'stop');
                        jQuery('#window-container').append('<div id="snapTop" class="snapper">&nbsp;</div>');
                        jQuery.myGlobals.timestamp = 0;
                    }
                }
                else {
                    if (jQuery(this).hasClass('snapLeft')) {
                        jQuery(this).removeClass('snapLeft'); jQuery.myGlobals.timestamp = 0;
                    }
                    if (jQuery(this).hasClass('snapRight')) {
                        jQuery(this).removeClass('snapRight'); jQuery.myGlobals.timestamp = 0;
                    }
                    if (jQuery(this).hasClass('snapBottom')) {
                        jQuery(this).removeClass('snapBottom'); jQuery.myGlobals.timestamp = 0;
                    }
                }
            }
            //Bottom snap
            else if (bottom == '0px') {
                if (!jQuery('.snapper').length) {
                    if (jQuery.myGlobals.timestamp == 0) {
                        jQuery.myGlobals.timestamp = e.timeStamp;
                    }
                    var dragLength = e.timeStamp - jQuery.myGlobals.timestamp;
                    if (dragLength > 200) {
                        jQuery(this).addClass('snapBottom');
                        jQuery(this).draggable('option', 'stop');
                        jQuery('#window-container').append('<div id="snapBottomsnapTop" class="snapper">&nbsp;</div>');
                        jQuery.myGlobals.timestamp = 0;
                    }
                }
                else {
                    if (jQuery(this).hasClass('snapLeft')) {
                        jQuery(this).removeClass('snapLeft'); jQuery.myGlobals.timestamp = 0;
                    }
                    if (jQuery(this).hasClass('snapRight')) {
                        jQuery(this).removeClass('snapRight'); jQuery.myGlobals.timestamp = 0;
                    }
                    if (jQuery(this).hasClass('snapTop')) {
                        jQuery(this).removeClass('snapTop'); jQuery.myGlobals.timestamp = 0;
                    }
                }
            }
            else {
                jQuery.myGlobals.timestamp = 0;
            }
        },

        stop: function (e, ui) {
            if (jQuery(this).hasClass('snapLeft')) {
                resize_window(jQuery(this).attr('id'), 0, 0, 50, 100, '%');
                jQuery(this).removeClass('snapLeft');
            }
            if (jQuery(this).hasClass('snapRight')) {
                var xPos = Math.floor(jQuery('#window-container').width() / 2);
                resize_window(jQuery(this).attr('id'), xPos, 0, 50, 100, '%');
                jQuery(this).removeClass('snapRight');
            }
            if (jQuery(this).hasClass('snapTop')) {
                resize_window(jQuery(this).attr('id'), 0, 0, 100, 50, '%');
                jQuery(this).removeClass('snapTop');
            }
            if (jQuery(this).hasClass('snapBottom')) {
                var yPos = Math.floor(jQuery('#window-container').height() / 2);
                resize_window(jQuery(this).attr('id'), 0, yPos, 100, 50, '%');
                jQuery(this).removeClass('snapBottom');
            }
            jQuery('.snapper').remove();
            jQuery('.window').find('.screen').remove();
        }
    });
		
	jQuery('.window').bind('dragstart',function( event ){
        jQuery('.window').append('<div id="screen'+jQuery('.window').attr('id')+'" class="screen"></div>');
        jQuery('.window').find('.screen').css('width',jQuery('.window').find('.content').width());
        jQuery('.window').find('.screen').css('height',jQuery('.window').find('.content').height());
        jQuery('.window').find('.screen').css('position','absolute');
        jQuery('.window').find('.screen').css('top','25px');
        jQuery('.window').find('.screen').css('left','4px');
        jQuery('.window').find('.screen').css('background-color','Transparent');
        jQuery('.window').find('.screen').css('z-index','9999');
    });
}

/* MAKES THE PROVIDED WINDOW ID FULL HEIGHT/WIDTH OF THE DESKTOP */
function maximise_window(id) {
    id = '#' + id;
    
    jQuery(id).css('left', '0');
    jQuery(id).css('top', '0');

    jQuery(id).css('height', jQuery('#window-container').height());
    jQuery(id).find('.content').css('height', (jQuery('#window-container').height() - 40) + 'px');
    jQuery(id).css('width', jQuery('#window-container').width() + 'px');
    jQuery(id).find('.content').css('width', (jQuery('#window-container').width() - 20) + 'px');
    jQuery(id).find('.bottomRightCorner').removeClass('resizeable');
}

/* RESIZES AND REPOSITIONS THE WINDOW TO THE SELECTED POSITION/WIDTH/HEIGHT */
function resize_window(id, x, y, width, height, unit) {
    id = '#' + id;
    
    jQuery(id).css('left', x);
    jQuery(id).css('top', y);

    jQuery(id).css('height', height + unit);
    jQuery(id).find('.content').css('height', (jQuery(id).height() - 40) + 'px');
    jQuery(id).css('width', width + unit);
    jQuery(id).find('.content').css('width', (jQuery(id).width() - 20) + 'px');
    jQuery(id).find('.bottomRightCorner').removeClass('resizeable');
}

/* WHEN A NEW WINDOW IS CREATED, THIS ENABLES RESIZING! */
function enable_resizeable()
{
    jQuery(".window").resizable({
		containment: '#window-container'
	});
	
	jQuery('.window').bind('resizestart', function(event, ui) {
	    var contentHeight = (jQuery(this).height() - 40);
	    var contentWidth = (jQuery(this).width() - 20);
	    var oldZindex = (jQuery.myGlobals.zIndex+1);
	    jQuery(this).css('z-index',(oldZindex+1));
	    jQuery('#window-container').append('<div id="backScreen" style="width:100%; height:100%; position:absolute; z-index:'+oldZindex+'; background-color:Transparent;"></div>');
	    jQuery('.window').append('<div id="screen'+jQuery('.window').attr('id')+'" class="screen" style="width:'+contentWidth+';height:'+contentHeight+';position:absolute;top:25px;left:15px;z-index:9999;"></div>');
	});
	
	jQuery('.window').bind('resize', function(event, ui) {
	    var height = jQuery(this).height();
	    var width = jQuery(this).width();
        var contentHeight = (height - 40);
        var contentWidth = (width - 20);
        
        jQuery(this).children('div.screen').css('height', (contentHeight+2) + 'px');
        jQuery(this).children('div.screen').css('width', (contentWidth+2) + 'px');
        jQuery(this).children('iframe.content').css('height', contentHeight + 'px');
        jQuery(this).children('iframe.content').css('width', contentWidth + 'px');
    });
    
    jQuery('.window').bind('resizestop', function(event, ui) {
        var oldZindex = jQuery.myGlobals.zIndex;
	    jQuery(this).css('z-index',(oldZindex));
	    jQuery('#window-container').find('div#backScreen').remove();
        jQuery(this).find('.screen').remove(); 
    });
}

/* CREATES A NEW WINDOW */
function addWindow(winCount,zIndex,src,rel,title)
{
    if (rel != '') {
        rel = rel.split('-');
        var height = rel[1];
        var width = rel[0];
    }
    else {
        var height = 500;
        var width = 1050;
    }
	
	var coordX = jQuery.myGlobals.winPos+'px';
	var coordY = jQuery.myGlobals.winPos+'px';
	if (jQuery.myGlobals.winPos == 70)
	{
		jQuery.myGlobals.winPos = 10;	
	}
	else
	{
		jQuery.myGlobals.winPos = (jQuery.myGlobals.winPos + 10);	
	}
	
	var contentHeight = (height - 40);
	var contentWidth = (width - 20);
    
    
    jQuery("#window-container").append('<div id="win' + winCount + '" class="window" style="z-index:' + zIndex + '; height:' + height + 'px; width:' + width + 'px; top:' + coordY + '; left:' + coordX + ';"><img class="bottomRightCorner resizeable" alt="" src="templates/udjamaflip/images/window/bottomRightCornerExpand.png" /><div class="title"><img src="templates/udjamaflip/images/window/miniLogo.png" alt="" /> <span>' + title + '</span><div class="icons"><a href="#" class="refresh"><img src="templates/udjamaflip/images/refresh.png" alt="[*]" /></a><a href="#" class="minimise"><img src="templates/udjamaflip/images/minimise.png" alt="[-]" /></a><a href="#" class="toggleSize"><img src="templates/udjamaflip/images/maximise.png" alt="[O]" /></a><a href="#" class="close"><img src="templates/udjamaflip/images/close.png" alt="[X]" /></a></div></div><iframe id="content'+winCount+'" class="content" style="height:' + contentHeight + 'px; width:' + contentWidth + 'px;" src="' + src + '"></iframe></div>');
    
    //document.location.href = document.location.href +'#?url='+ src;
    enable_draggable();
    //enable resizeable
    enable_resizeable();
}

/* REFRESHES THE DOCK TO ACCOMODATE FOR ADDED/REMOVED ICONS */
function refresh_dock()
{
    jQuery('#dock').Fisheye(
    {
		maxWidth: 59,
		items: 'a',
		itemsText: 'span',
		container: '.dock-container',
		itemWidth: 30,
		proximity: 50,
		alignment : 'left',
		valign: 'bottom',
		halign : 'center'
	});
}