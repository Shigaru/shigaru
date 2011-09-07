jQuery.noConflict();
jQuery(document).ready(function ($) {

    /* GLOBALS NEEDED FOR VARIOUS FUNCTIONALITY */
    $.myGlobals = {
        winCount: 2,
        zIndex: 2,
        winPos: 10,
        timestamp: 0
    };

    /* REQUIRED FOR SIZE TOGGLING ON WINDOWS */
    var windows = new Array();

    /* DO NOT REMOVE, NOTE OUT, OR OTHERWISE HIDE THIS CREDIT, USING THIS CODE WITHOUT THE   */
    /* CREDIT ON DISPLAY IS IN BREACH OF THE ATTACHED LICENCE AGREEMENTS                     */
    $('head').append('<meta name="generator" value="www.udjamaflip.com - Opensource jQuery Joomla template" />');

    //gives a nice legacy icon if legacy mode is on.
    if ($('div.status span.legacy-mode').html()) {
        $('div.status span.legacy-mode').html('<img src="/administrator/templates/udjamaflip/images/legacy.png" alt="Legacy: 1.0" style="margin-top:-2px;" />');
    }

    //sorts out the dock
    refresh_dock();
    //turns on draggable windows
    enable_draggable();

    /* STARTS THE CLOCK */
    $('.time').jclock();

    var containerHeight = $(document).height();
    containerHeight = (containerHeight - 65);
    $('#window-container').height(containerHeight);

    /* little bit to add effect to "start button" */

    $('li#start').hover(function () {
        $(this).find('img').attr('src', 'templates/udjamaflip/images/startButton-on.png');
    }, function () {
        $(this).find('img').attr('src', 'templates/udjamaflip/images/startButton.png');
    });

    /* deals with window behaviours */

    /* ENSURES IF A WINDOW IS CLICKED IT IS BROUGHT TO THE TOP OF THE DESKTOP */
    $(".window").live("click", function () {
        $.myGlobals.zIndex++;
        $(this).css('z-index', $.myGlobals.zIndex);
    });
    $(".window *").live("click", function () {
        $.myGlobals.zIndex++;
        $(this).closest('.window').css('z-index', $.myGlobals.zIndex);
    });

    /* REFRESHES THE CONTENT OF SELECTED WINDOW */
    $('a.refresh').live("click", function () {
        var theId = $(this).parents('.window').find('iframe').attr('id');
        document.getElementById(theId).contentDocument.location.reload(true);
    });

    /* DOUBLE CLICK (TASKBAR) WINDOW SIZE TOGGLE EVENT */
    $("div.title").live("dblclick", function () {
        var theId = $(this).parents('.window').attr('id');
        if ($(this).parents('.window').height() != $('#window-container').height() || $(this).parents('.window').width() != $('#window-container').width()) {
            var tmpPos = $('#'+theId).position();
            windows[theId + '-height'] = $(this).parents('.window').height();
            windows[theId + '-width'] = $(this).parents('.window').width();

            windows[theId + '-left'] = tmpPos.left;
            windows[theId + '-top'] = tmpPos.top;

            maximise_window(theId);
        }
        else {
            resize_window(theId, windows[theId + '-left'], windows[theId + '-top'], windows[theId + '-width'], windows[theId + '-height'], 'px');
        }

        $.myGlobals.zIndex++;
        $(this).css('z-index', $.myGlobals.zIndex);
    });

    /* TOGGLE BUTTON ON TASKBAR OF ALL WINDOWS */
    $('a.toggleSize').live("click", function () {

        var theId = $(this).parents('.window').attr('id');
        if ($(this).parents('.window').height() != $('#window-container').height() || $(this).parents('.window').width() != $('#window-container').width()) {
            var tmpPos = $('#'+theId).position();
            windows[theId + '-height'] = $(this).parents('.window').height();
            windows[theId + '-width'] = $(this).parents('.window').width();

            windows[theId + '-left'] = tmpPos.left;
            windows[theId + '-top'] = tmpPos.top;

            maximise_window(theId.attr('id'));
        }
        else {
            resize_window(theId, windows[theId + '-left'], windows[theId + '-top'], windows[theId + '-width'], windows[theId + '-height'], 'px');
        }

        $.myGlobals.zIndex++;
        $(this).css('z-index', $.myGlobals.zIndex);
    });

    $(".close").live("click", function () {
        $(this).parents(".window").remove();
    });

    $(".minimise").live("click", function () {
        var pid = $(this).parents("[id^=win]").attr("id")
        $(this).parents(".window").css('display', 'none');

        var title = $(this).parents('.window').find('.title').find('span').html();
        $(".dock-container").append('<a href="#" class="maximise dock-item" id="' + pid + '"><span>' + title + '</span><img src="templates/udjamaflip/images/icons/tb_preview.png" alt="' + pid + '" /></a>');
        refresh_dock();
    });

    /* after load */

    $('a.reload').live("click", function () {
        $.myGlobals.zIndex++;
        $("div[id^=win]").css('display', 'block');
        $("div[id^=win]").css('z-index', $.myGlobals.zIndex);
        $(this).remove();
        refresh_dock();
    });

    $('a.maximise').live("click", function () {
        var pid = $(this).attr("id")
        $("div#" + pid).css('display', 'block');
        $(this).remove();
        refresh_dock();
        $.myGlobals.zIndex++;
        $(this).css('z-index', $.myGlobals.zIndex);
    });

    /* opens a new window and deals with menu behaviours */

    $("ul li ul li a").click(function () {
        $.myGlobals.winCount++;
        $.myGlobals.zIndex++;

        var title = $(this).attr('title');
        if (title == '') {
            title = $(this).html();
        }
        var src = $(this).attr('href');
        var rel = $(this).attr('rel');

        if ($(this).attr('target') != '_blank') {
            addWindow($.myGlobals.winCount, $.myGlobals.zIndex, src, rel, title);
            return false;
        }
    });

    $("div.taskbar div.status a").click(function () {

        if (!$(this).parent('span.logout') && $(this).attr('target') != '_blank') {
            $.myGlobals.winCount++;
            $.myGlobals.zIndex++;

            var title = $(this).attr('title');
            if (title == '') {
                title = $(this).html();
            }
            var src = $(this).attr('href');
            var rel = $(this).attr('rel');

            addWindow($.myGlobals.winCount, $.myGlobals.zIndex, src, rel, title);

            return false;
        }
    });

    $("a.dock-item").click(function () {
        $.myGlobals.winCount++;
        $.myGlobals.zIndex++;

        var title = $(this).attr('title');
        var src = $(this).attr('href');
        var rel = $(this).attr('rel');

        addWindow($.myGlobals.winCount, $.myGlobals.zIndex, src, rel, title);

        return false;
    });

});