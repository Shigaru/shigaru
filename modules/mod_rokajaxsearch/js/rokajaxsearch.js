jQuery.fn.liveSearch = function (e) {
    var t = jQuery.extend({
        url: "/search-results.php?q=",
        id: "jquery-live-search",
        duration: 200,
        typeDelay: 300,
        loadingClass: "loading",
        onSlideUp: function () {},
        uptadePosition: false
    }, e);
    var n = jQuery("#" + t.id);
    var r = null;
    if (!n.length) {
        n = jQuery('<div id="' + t.id + '"></div>').appendTo(document.body).hide().slideUp(0);
        jQuery(document.body).click(function (e) {
            var r = jQuery(e.target);
            if (!(r.is("#" + t.id) || r.parents("#" + t.id).length || r.is("input"))) {
                n.slideUp(t.duration, function () {
                    t.onSlideUp()
                })
            }
        })
    }
    return this.each(function () {
        var e = jQuery(this).attr("autocomplete", "off");
        var i = parseInt(n.css("paddingLeft"), 10) + parseInt(n.css("paddingRight"), 10) + parseInt(n.css("borderLeftWidth"), 10) + parseInt(n.css("borderRightWidth"), 10);
        var s = function () {
            var t = e.offset();
            var r = {
                left: t.left,
                top: t.top,
                width: e.outerWidth(),
                height: e.outerHeight()
            };
            r.topPos = r.top + r.height;
            r.totalWidth = r.width - i;
            n.css({
                position: "absolute",
                left: r.left + "px",
                top: r.topPos + "px",
                width: r.totalWidth + "px"
            })
        };
        var o = function () {
            s();
            jQuery(window).unbind("resize", s);
            jQuery(window).bind("resize", s);
            jQuery(".roksearch_header a.btn,.roksearch_header a.btn span").click(function (e) {
                jQuery("form#rokajaxsearch").submit();
                return false;
                e.stopPropagation()
            });
            n.slideDown(t.duration, function () {})
        };
        var u = function () {
            n.slideUp(t.duration, function () {
                t.onSlideUp()
            })
        };
        e.focus(function () {
            if (this.value !== "") {
                if (n.html() == "") {
                    this.lastValue = "";
                    e.keyup()
                } else {
                    setTimeout(o, 1)
                }
            }
        }).keyup(function () {
            if (this.value != this.lastValue && this.value.length > 2) {
                e.addClass(t.loadingClass);
                var i = this.value;
                if (this.timer) {
                    r.abort();
                    clearTimeout(this.timer)
                }
                this.timer = setTimeout(function () {
                    r = jQuery.get(t.url + i, function (r) {
                        e.removeClass(t.loadingClass);
                        if (r.length && i.length) {
                            n.html(r);
                            o()
                        } else {
                            u()
                        }
                    })
                }, t.typeDelay);
                this.lastValue = this.value
            }
        })
    })
}
