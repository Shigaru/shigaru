jQuery(document).ready(function () {
    function n() {
        var n = jQuery("#infocontext #morerelated i");
        var r = n.attr("class");
        n.removeClass().addClass("icon-spinner icon-spin");
        jQuery.ajax({
            url: t + "&lstart=" + e,
            context: document.body,
            success: function (e) {
				var oRelatedContainer = jQuery("#infocontext ul#relatedvideos");
                oRelatedContainer.append(e);
                oRelatedContainer.find("li").fadeIn();
                oRelatedContainer.find('a[title]').qtip({position: {show: {delay: 2000},my: 'top center',at: 'bottom center',adjust: {x: 0,y: 25},target: 'mouse'}});
                jQuery(".loadingcontent").hide();
                n.removeClass().addClass(r)
            }
        })
    }
    function r(e) {
        var t = jQuery(e.target);
        var n = t.attr("href");
        t.parent().parent().siblings(".icon-spinner").show();
        jQuery.ajax({
            url: n,
            cache: false,
            complete: function (e) {
                t.parent().parent().siblings(".icon-spinner").hide();
                t.parent().parent().parent().html(e.responseText);
                jQuery("ul.rating li a").click(function (e) {
                    e.preventDefault();
                    r(e)
                })
            }
        })
    }
    function i(e) {
        var t = jQuery(e.target);
        var n = t.attr("id");
        n = n.substring(2);
        var r = "index.php?option=com_hwdvideoshare&lang=en&task=ajax_manageplaylistitems&" + "format=raw&item_id=" + jQuery("input#videoid").val() + "&public_private=private&playlist_id=" + n;
        var i = t.find("i:first");
        var s = i[0].className;
        t.attr("disabled", true);
        i.removeClass();
        i.addClass("icon-spinner icon-spin");
        jQuery.ajax({
            url: r
        }).done(function (e) {
            o(e, t, s)
        })
    }
    function s(e, t, n) {
        var r = parseInt(e);
        var i = t.find("i");
        t.attr("disabled", false);
        i.removeClass();
        i.addClass(n);
        if (!isNaN(r)) {
            switch (r) {
                case 0:
                    t.next().find("li").html("There was an error processing your request please try again later.");
                    t.parent().addClass("open");
                    break;
                case 1:
                    break;
                default:
                    break
            }
        } else {
            t.next().find("li .reponsesay").html(e);
            t.parent().addClass("open")
        }
    }
    function o(e, t, n) {
        var r = parseInt(e);
        var i = t.find("i");
        t.attr("disabled", false);
        if (t.attr("id").indexOf("ll") == -1) {
            i.removeClass();
            i.addClass(n)
        }
        if (!isNaN(r)) {
            switch (r) {
                case 0:
                    t.next().find("li").html("There was an error processing your request please try again later.");
                    t.parent().addClass("open");
                    break;
                case 1:
                    if (t.attr("id").indexOf("ll") == -1) {
                        i.removeClass("fontgreen");
                        i.removeClass("fontred");
                        t.removeClass("clicked");
                        t.removeClass("active");
                        if (t.attr("id").indexOf("flag") == -1) u(t, t.attr("id"))
                    } else {
                        t.find("i:first").removeClass().addClass("icon-check-empty fontgreen")
                    }
                    break;
                default:
                    if (t.attr("id").indexOf("ll") == -1) {
                        if (t.attr("id").indexOf("flag") == -1) i.addClass("fontgreen");
                        else i.addClass("fontred");
                        t.addClass("clicked");
                        t.addClass("active");
                        i.attr("clicked", "likeid" + r);
                        if (t.attr("id").indexOf("flag") == -1) u(t, t.attr("id"))
                    } else {
                        t.find("i:first").removeClass().addClass("icon-check fontgreen")
                    }
                    break
            }
        } else {
            t.next().find("li .reponsesay").html(e);
            t.parent().addClass("open")
        }
    }
    function u(e, t) {
        var n = "index.php?option=com_hwdvideoshare&lang=en&task=ajax_getactioncount&format=raw&action=" + t + "&item_id=" + jQuery("input#videoid").val();
        jQuery.ajax({
            url: n
        }).done(function (t) {
            var n = e.parents("div.fleft.mright6").find(".timesactioned span");
            n.hide().html(t).fadeIn()
        })
    }
    function a(e) {
        var t = "";
        var n = jQuery(e);
        var r = jQuery(e).find("i");
        var i = jQuery("input#videoid").val();
        if (n.hasClass("active")) {
            if (!n.hasClass("clicked")) t = "&likeid=" + r.attr("id");
            else {
                t = "&likeid=" + r.attr("clicked")
            }
        }
        return "index.php?option=com_hwdvideoshare&lang=en&task=ajax_like&format=raw" + t + "&item_id=" + i + "&item_type=video"
    }
    var e = 0;
    var t = "index.php?option=com_hwdvideoshare&lang=en&task=ajax_relatedvideos&lang=" + jQuery("input#lang").val(); + "&" + "format=raw&item_id=" + jQuery("input#videoid").val();
    n();
    e += 10;
    jQuery("#infocontext #morerelated").click(function (t) {
        t.preventDefault();
        e += 10;
        n();
        if (e > 100) jQuery(this).hide()
    });
    jQuery("#btncomments").click(function (e) {
        e.preventDefault();
        var t = jQuery("#comments-form-comment").focus().position();
        jQuery("html, body").animate({
            scrollTop: t.top + 150
        }, "slow")
    });
    if (jQuery("#truncateMe").height() < jQuery("#videodecription").height()) jQuery("#truncateMe").next().show();
    if (jQuery("#tagwrap").height() < jQuery("#tagwrap span").height()) jQuery("#tagwrap").next().show();
    jQuery("#showmoredesc,#showmoretags").click(function (e) {
        e.preventDefault();
        var t = jQuery(this).find("i");
        var n = jQuery(this);
        if (t.hasClass("icon-double-angle-up")) {
            t.removeClass("icon-double-angle-up");
            t.addClass("icon-double-angle-down");
            n.parent().prev().removeAttr("style");
            var r = n.parent().prev().position();
            jQuery("html, body").animate({
                scrollTop: r.top
            }, "slow")
        } else {
            t.removeClass("icon-double-angle-down");
            t.addClass("icon-double-angle-up");
            n.parent().prev().animate({
                height: n.parent().prev().find("span:first").height()
            })
        }
    });
    jQuery("ul.rating li a").click(function (e) {
        e.preventDefault();
        r(e)
    });
    jQuery("#tuner").click(function (e) {
        e.preventDefault();
        jQuery.blockUI({
            message: '<p class="shigarunotice"><span id="close"></span><iframe class="mtop20" src="http://www.123guitartuner.com/guitar_tuner.swf" width="550" height="350"></iframe><br />created by <a href="http://www.123guitartuner.com/">Guitar Tuner</a></p>',
            css: {
                top: (jQuery(window).height() - 400) / 2 + "px",
                left: (jQuery(window).width() - 600) / 2 + "px",
                height: "400px",
                width: "600px",
                "overflow-y:": "auto"
            }
        });
        jQuery(".shigarunotice #close").click(function () {
            jQuery.unblockUI()
        })
    });
    jQuery(".crossclose").click(function (e) {
        e.preventDefault();
        jQuery(this).parents(".btn-group").removeClass("open")
    });
    jQuery(".videoactions button.btn").click(function (e) {});
    jQuery("#add2plbutton").click(function (e) {
        e.preventDefault();
        jQuery(this).parents(".btn-group").toggleClass("open")
    });
    jQuery("#learnlaterbutton").click(function (e) {
        e.preventDefault();
        if (jQuery(this).next().find("li span.pad6").length > 0) {
            jQuery(this).parents(".btn-group").toggleClass("open")
        } else {
            var t = "index.php?option=com_hwdvideoshare&lang=en&task=ajax_manageplaylistitems&" + "format=raw&item_id=" + jQuery("input#videoid").val() + "&public_private=private&playlist_id=learnlater";
            var n = jQuery(this);
            var r = jQuery(this).find("i");
            var i = r[0].className;
            n.attr("disabled", true);
            r.removeClass();
            r.addClass("icon-spinner icon-spin");
            jQuery.ajax({
                url: t
            }).done(function (e) {
                o(e, n, i)
            })
        }
    });
    jQuery("#add2plbutton").next().find("li a").click(function (e) {
        e.preventDefault();
        i(e)
    });
    jQuery("#addplbutton").click(function (e) {
        e.preventDefault();
        var t = jQuery("#playlist_name").val();
        if (t.length > 2) {
            var n = "index.php?option=com_hwdvideoshare&lang=en&task=ajax_manageplaylistitems&" + "format=raw" + "&playlist_name=" + t + "&item_id=" + jQuery("input#videoid").val() + "&public_private=" + jQuery("#public_private").val();
            var r = jQuery(this);
            var i = jQuery(this).find("i");
            var o = i[0].className;
            r.attr("disabled", true);
            i.removeClass();
            i.addClass("icon-spinner icon-spin");
            jQuery.ajax({
                url: n
            }).done(function (e) {
                var n = jQuery("#public_private").val() == "public" ? "icon-unlock" : "icon-lock";
                s(e, r, o);
                jQuery("#add2plbutton").next().prepend('<li class="justadded" style="display:none;">' + '<a id="ll' + e + '" href="#"><i class="icon-check fontgreen"></i> <i class="' + n + '"></i> <i class="icon-list-ol"></i> <span>' + t + "</span></a>" + "</li>");
                jQuery("#add2plbutton").next().find(".justadded").fadeIn("slow").removeClass("justadded");
                jQuery("#playlist_name").val("");
                jQuery("#add2plbutton").next().find(".crossclose").parent().fadeOut().remove();
                jQuery("#add2plbutton").next().find("li a").click(function (e) {
                    e.preventDefault()
                })
            })
        } else {
            if (jQuery("#add2plbutton").next().find(".crossclose").length == 0) {
                jQuery("#add2plbutton").next().prepend('<li class="mleft12 borbotgrey mbot6">' + '<a class="crossclose fright" title="Click on this icon to close this message"><i class="icon-remove"></i></a>' + '<div class="reponsesay clear mbot6">' + "Please enter at least 3 letters for the new playlist name field" + "</div>" + "</li>");
                jQuery("#add2plbutton").next().find(".crossclose").click(function () {
                    jQuery(this).parent().fadeOut().remove()
                })
            } else {
                jQuery("#add2plbutton").next().find(".crossclose").parent().fadeIn("slow")
            }
        }
    });
    jQuery("#hwdvidsflagged_videos").click(function (e) {
        e.preventDefault();
        var t = "index.php?option=com_hwdvideoshare&lang=en&task=ajax_reportvideo&format=raw&item_id=" + jQuery("input#videoid").val();
        var n = jQuery(this);
        var r = jQuery(this).find("i");
        var i = r[0].className;
        n.attr("disabled", true);
        r.removeClass();
        r.addClass("icon-spinner icon-spin");
        jQuery.ajax({
            url: t
        }).done(function (e) {
            o(e, n, i)
        })
    });
    jQuery("#hwdvidsfavorites").click(function (e) {
        e.preventDefault();
        var t = "index.php?option=com_hwdvideoshare&lang=en&task=ajax_addtofavourites&format=raw&item_id=" + jQuery("input#videoid").val();
        var n = jQuery(this);
        var r = jQuery(this).find("i");
        var i = r[0].className;
        n.attr("disabled", true);
        r.removeClass();
        r.addClass("icon-spinner icon-spin");
        jQuery.ajax({
            url: t
        }).done(function (e) {
            o(e, n, i)
        })
    });
    jQuery("#hwdvidslikes").click(function (e) {
        e.preventDefault();
        var t = a(this);
        var n = jQuery(this);
        var r = jQuery(this).find("i");
        var i = r[0].className;
        r.removeClass();
        r.addClass("icon-spinner icon-spin");
        n.attr("disabled", true);
        jQuery.ajax({
            url: t
        }).done(function (e) {
            o(e, n, i)
        })
    });
})
