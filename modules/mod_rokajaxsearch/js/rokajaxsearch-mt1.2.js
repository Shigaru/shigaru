/**
 * RokAjaxSearch Module
 *
 * @package		Joomla
 * @subpackage	RokAjaxSearch Module
 * @copyright Copyright (C) 2009 RocketTheme. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see RT-LICENSE.php
 * @author RocketTheme, LLC
 *
 */
var RokAjaxSearch = new Class({
    version: "2.0 (mt 1.2)",
    Implements: [Options, Events],
    options: {
        'results': null,
        'close': null,
        'websearch': false,
        'blogsearch': false,
        'imagesearch': false,
        'videosearch': false,
        'imagesize': 'MEDIUM',
        'safesearch': 'MODERATE',
        'search': null,
        'readmore': null,
        'noresults': null,
        'advsearch': null,
        'searchlink': null,
        'advsearchlink': null,
        'page': null,
        'page_of': null,
        'uribase': null,
        'limit': null,
        'perpage': null,
        'ordering': null,
        'phrase': null,
        'keyevents': true,
        'hidedivs': null,
        'includelink': null,
        'viewall': null,
        'estimated': null,
        'showestimated': true,
        'showpagination': true,
        'showcategory': true,
        'showreadmore': true,
        'showdescription': true,
        'wordpress': false
    },
    initialize: function (b) {
        this.setOptions(b);
        this.timer = null;
        this.rows = ['roksearch_odd', 'roksearch_even'];
        this.searchphrase = this.options.phrase;
        this.inputBox = document.id('roksearch_search_str').setProperty('autocomplete', 'off');
        var c = this.inputBox.getCoordinates();
        this.results = document.id('roksearch_results').setStyles({
            'position': 'absolute',
            'top': c.top + c.height,
            'left': this.getLeft()
        }).inject(document.body);
        this.fx = new Fx.Tween(this.results).set('opacity', 0);
        this.current = 0;
        var d = this;
        window.addEvent('resize', function () {
            d.results.setStyle('left', d.getLeft())
        });
        this.type = 'local';
        var e = this.options.perpage;
        if (this.options.websearch || this.options.blogsearch || this.options.imagesearch) {
            $$('#rokajaxsearch .search_options input[type=radio]').each(function (a) {
                a.addEvent('click', function () {
                    this.type = a.value;
                    if (this.type == 'web' || this.type == 'blog' || this.type == 'images' || this.type == 'videos') {
                        this.options.perpage = 4;
                        if (this.type == 'web') this.google = new google.search.WebSearch();
                        else if (this.type == 'blog') this.google = new google.search.BlogSearch();
                        else if (this.type == 'images') {
                            this.options.perpage = 3;
                            this.google = new google.search.ImageSearch();
                            this.google.setRestriction(google.search.ImageSearch.RESTRICT_IMAGESIZE, google.search.ImageSearch['IMAGESIZE_' + this.options.imagesize])
                        } else if (this.type == 'videos') {
                            this.options.perpage = 3;
                            this.google = new google.search.VideoSearch()
                        }
                        if (this.type != 'blog' && this.type != 'videos') this.google.setRestriction(google.search.Search.RESTRICT_SAFESEARCH, google.search.Search['SAFESEARCH_' + this.options.safesearch]);
                        this.google.setResultSetSize(google.search.Search.SMALL_RESULTSET);
                        this.google.setNoHtmlGeneration();
                        this.google.setSearchCompleteCallback(this, this.googleComplete)
                    } else this.options.perpage = e
                }.bind(this))
            }, this)
        };
        this.addEvents();
        this.keyEvents()
    },
    getLeft: function () {
        var a = this.inputBox.getCoordinates(),
            x = document.id('roksearch_results').getSize().x;
        var b = document.id(window).getSize(),
            left;
        if (b.x / 2 < a.left + a.width) {
            left = a.left + a.width - x
        } else {
            left = a.left
        }
        if (left < 0) left = a.left;
        return left
    },
    googleStart: function () {
        if (!this.inputBox.hasClass('loading')) this.inputBox.addClass('loading');
        this.google.execute(this.inputBox.value)
    },
    googleComplete: function () {
        var n = this.google.results;
        var o = document.id('rokajaxsearch_tmp');
        var p = new Element('ol', {
            'class': 'list'
        }).inject(o);
        if (this.type == 'web') {
            n.each(function (a) {
                var b = new Element('li');
                var c = new Element('a', {
                    'href': a.unescapedUrl
                }).setProperty('target', '_blank').set('html', a.title);
                var d = new Element('h4').inject(b).adopt(c);
                var e = new Element('p').set('html', '<small><a href="' + a.url + '" target="_blank">' + a.visibleUrl + '</a></small>').inject(b);
                var f = a.content;
                f = f.replace('<b>', '<span class="highlight">').replace('</b>', '</span>');
                var g = new Element('div', {
                    'class': 'description'
                }).set('html', f).inject(b);
                b.inject(p)
            })
        } else if (this.type == 'blog') {
            n.each(function (a) {
                var b = new Element('li');
                var c = new Element('a', {
                    'href': a.postUrl
                }).setProperty('target', '_blank').set('html', a.title);
                var d = new Element('h4').inject(b).adopt(c);
                var e = new Element('p').set('html', '<small>by ' + a.author + ' - <a href="' + a.blogUrl + '" target="_blank">' + a.blogUrl + '</a></small>').inject(b);
                var f = a.content;
                f = f.replace('<b>', '<span class="highlight">').replace('</b>', '</span>');
                var g = new Element('div', {
                    'class': 'description'
                }).set('html', f).inject(b);
                b.inject(p)
            })
        } else if (this.type == 'images') {
            n.each(function (b) {
                var c = new Element('li');
                var d = new Element('a', {
                    'href': b.url
                }).setProperty('target', '_blank').set('html', b.title);
                var e = new Element('h4').inject(c).adopt(d);
                var f = new Element('p').set('html', '<small><a href="' + b.originalContextUrl + '" target="_blank">' + b.visibleUrl + '</a></small>').inject(c);
                var g = b.content;
                g = g.replace('<b>', '<span class="highlight">').replace('</b>', '</span>');
                var h = new Element('div', {
                    'class': 'description'
                }).set('html', g).inject(c);
                var i = new Element('div', {
                    'class': 'google-thumb-image loading'
                }).inject(h);
                i.setStyles({
                    'width': b.tbWidth.toInt(),
                    'height': b.tbHeight.toInt()
                });
                var a = new Element('a', {
                    'href': b.url,
                    'target': '_blank'
                }).inject(i);
                var j = new Element('image', {
                    width: b.tbWidth.toInt(),
                    height: b.tbHeight.toInt(),
                    src: b.tbUrl
                }).inject(a);
                c.inject(p)
            })
        } else if (this.type == 'videos') {
            n.each(function (b) {
                var c = new Element('li');
                var d = new Element('a', {
                    'href': b.playUrl
                }).setProperty('target', '_blank').set('html', b.title);
                var e = new Element('h4').inject(c).adopt(d);
                var f = b.duration.toInt();
                var g = '00:' + ((f < 10) ? '0' + f : f);
                if (f >= 60) {
                    var m = f / 60;
                    var s = f - (m * 60);
                    m = m.toInt();
                    s = s.toInt();
                    if (m < 10) m = '0' + m;
                    if (s < 10) s = '0' + s;
                    g = m + ':' + s;
                    if (m >= 60) {
                        var h = m / 60;
                        h = h.toInt();
                        if (h < 10) h = '0' + h;
                        g = h + g
                    }
                }
                var i = new Element('p').set('html', '<span class="' + b.videoType.toLowerCase() + '">Rating: ' + (parseFloat(b.rating)).toFixed(2) + ' | Duration: ' + g + ' <small>' + b.videoType + '</small></span>').inject(c);
                var j = new Element('div', {
                    'class': 'description'
                }).set('html', '').inject(c);
                var k = new Element('div', {
                    'class': 'google-thumb-image loading'
                }).inject(j);
                k.setStyles({
                    'width': b.tbWidth.toInt(),
                    'height': b.tbHeight.toInt(),
                    'text-align': 'center'
                });
                var a = new Element('a', {
                    'href': b.url,
                    'target': '_blank'
                }).inject(k);
                var l = new Element('image', {
                    src: b.tbUrl,
                    width: b.tbWidth.toInt(),
                    height: b.tbHeight.toInt()
                }).inject(a);
                c.inject(p)
            })
        }
        this.results.empty().removeClass('roksearch_results').setStyle('visibility', 'visible');
        this.arrowleft = null;
        this.arrowright = null;
        this.selectedEl = -1;
        this.els = [];
        this.outputTableless();
        o.empty().setStyle('visibility', 'visible');
        this.inputBox.removeClass('loading');
        var q = this.inputBox.getCoordinates(),
            self = this;
        this.results.setStyles({
            'top': q.top + q.height,
            'left': self.getLeft()
        });
        this.fx.start('opacity', 1);
        this.fireEvent('loaded')
    },
    addEvents: function () {
        this.inputBox.addEvents({
            'click': function () {
                if (this.inputBox.get('value') == this.options.search) this.inputBox.value = ''
            }.bind(this),
            'blur': function () {
                if (this.inputBox.get('value') == '') this.inputBox.value = this.options.search
            }.bind(this),
            'keydown': function (e) {
                e = new Event(e);
                $clear(this.timer);
                if (e.key == 'enter') e.stop()
            },
            'keyup': function (e) {
                e = new Event(e);
                if (e.code == 17 || e.code == 18 || e.code == 224 || e.alt || e.control || e.meta) return false;
                if (e.alt || e.control || e.meta || e.key == 'esc' || e.key == 'up' || e.key == 'down' || e.key == 'left' || e.key == 'right') return true;
                if (e.key == 'enter') e.stop();
                if (e.key == 'enter' && this.selectedEl != -1) {
                    if (this.selectedEl || this.selectedEl == 0) location.href = this.els[this.selectedEl].getFirst('a');
                    return false
                };
                $clear(this.timer);
                var j = this.options.searchlink.split("?")[0];
                j = j.replace(this.options.uribase, '');
                j = (j) ? j : "index.php";
                var k = this.options.uribase + j;
                if (this.options.wordpress) k = this.options.uribase + this.options.searchlink;
                if (this.inputBox.value == '') {
                    var l = this.options.hidedivs.split(" ");
                    this.results.empty().removeClass('roksearch_results').setStyle('visibility', 'hidden');
                    if (l.length > 0 && l != '') l.each(function (a) {
                        document.id(a).setStyle('visibility', 'visible')
                    })
                } else {
                    if (this.type == 'local') {
                        var m = this.inputBox.value.split('"');
                        if (m.length >= 3) {
                            this.options.phrase = 'exact'
                        } else {
                            this.options.phrase = this.searchphrase
                        }
                        var n = new Request({
                            url: k,
                            method: 'get',
                            delay: 200,
                            onRequest: function () {
                                this.inputBox.addClass('loading')
                            }.bind(this),
                            onSuccess: function (d, b, c) {
                                var e = new Element('div', {
                                    'styles': {
                                        'display': 'none'
                                    }
                                }).set('html', d);
                                var f = document.id('rokajaxsearch_tmp');
                                var g = e.getElement('.contentpaneopen');
                                if (g) {
                                    e.getChildren().each(function (a) {
                                        if (a.getProperty('class') == 'contentpaneopen' && a.id != 'page') {
                                            f.set('html', a.innerHTML)
                                        }
                                    })
                                } else {
                                    e.inject(document.body);
                                    e.setStyles({
                                        'display': 'block',
                                        'position': 'absolute',
                                        'top': -10000
                                    });
                                    g = e.getElement('div[id=page]');
                                    e.dispose();
                                    if (g) {
                                        var h = g.getElement('.results');
                                        f.set('html', (h) ? h.innerHTML : '')
                                    }
                                }
                                console.log(f);
                                this.results.empty().removeClass('roksearch_results').setStyle('visibility', 'visible');
                                this.arrowleft = null;
                                this.arrowright = null;
                                this.selectedEl = -1;
                                this.els = [];
                                if (e.getElement('.contentpaneopen')) this.outputTable();
                                else this.outputTableless();
                                f.empty().setStyle('visibility', 'visible');
                                this.inputBox.removeClass('loading');
                                var i = this.inputBox.getCoordinates(),
                                    self = this;
                                this.results.setStyles({
                                    'top': i.top + i.height,
                                    'left': self.getLeft()
                                });
                                this.fx.start('opacity', 1);
                                this.fireEvent('loaded')
                            }.bind(this)
                        });
                        if (this.options.wordpress) {
                            this.timer = n.get.delay(500, n, [{
                                's': this.inputBox.value.replace(/\"/g, ''),
                                'task': 'search',
                                'action': 'rokajaxsearch',
                                'r': $time()
                            }])
                        } else {
                            this.timer = n.get.delay(500, n, [{
                                'type': 'raw',
                                'option': 'com_hwdvideoshare&task=displayresults',
                                'view': 'search',
                                'searchphrase': this.options.phrase,
                                'ordering': this.options.ordering,
                                'limit': this.options.limit,
                                'searchword': this.inputBox.value.replace(/\"/g, ''),
                                'tmpl': 'component',
                                'r': $time()
                            }])
                        }
                    } else if (this.type != 'local') {
                        this.timer = this.googleStart.delay(500, this)
                    }
                }
                return true
            }.bind(this)
        });
        return this
    },
    keyEvents: function () {
        var b = {
            'keyup': function (e) {
                e = new Event(e);
                if (e.key == 'left' || e.key == 'right' || e.key == 'up' || e.key == 'down' || e.key == 'enter' || e.key == 'esc') {
                    e.stop();
                    var a = false;
                    if (e.key == 'left' && this.arrowleft) this.arrowleft.fireEvent('click');
                    else if (e.key == 'right' && this.arrowright) this.arrowright.fireEvent('click');
                    else if (e.key == 'esc' && this.close) this.close.fireEvent('click', e);
                    else if (e.key == 'down') {
                        a = this.selectedEl;
                        if (this.selectedEl == -1) this.selectedEl = (this.options.perpage) * this.current;
                        else if (this.selectedEl + 1 < this.els.length) this.selectedEl++;
                        else return;
                        if (a != -1) this.els[a].fireEvent('mouseleave');
                        if ((this.selectedEl / this.options.perpage).toInt() > this.current) this.arrowright.fireEvent('click', true);
                        if (this.selectedEl || this.selectedEl == 0) this.els[this.selectedEl].fireEvent('mouseenter')
                    } else if (e.key == 'up') {
                        a = this.selectedEl;
                        if (this.selectedEl == -1) this.selectedEl = (this.options.perpage) * this.current;
                        else if (this.selectedEl - 1 >= 0) this.selectedEl--;
                        else return;
                        if (a != -1) this.els[a].fireEvent('mouseleave');
                        if ((this.selectedEl / this.options.perpage).toInt() < this.current) this.arrowleft.fireEvent('click', true);
                        if (this.selectedEl || this.selectedEl == 0) this.els[this.selectedEl].fireEvent('mouseenter')
                    } else if (e.key == 'enter') {
                        if (this.selectedEl || this.selectedEl == 0) window.location = this.els[this.selectedEl].getElement('a')
                    }
                }
            }.bind(this)
        };
        if (this.options.keyevents) {
            this.addEvent('loaded', function () {
                document.addEvent('keyup', b.keyup)
            });
            this.addEvent('unloaded', function () {
                document.removeEvent('keyup', b.keyup)
            })
        }
    },
    outputTable: function () {
        var r = this;
        var s = new Element('div', {
            'class': 'roksearch_wrapper1'
        }).inject(this.results);
        var t = new Element('div', {
            'class': 'roksearch_wrapper2'
        }).inject(s);
        var u = new Element('div', {
            'class': 'roksearch_wrapper3'
        }).inject(t);
        var v = new Element('div', {
            'class': 'roksearch_wrapper4'
        }).inject(u);
        var w = new Element('div', {
            'class': 'roksearch_header png'
        }).set('html', this.options.results).injectInside(v);
        this.close = new Element('a', {
            'id': 'roksearch_link',
            'class': 'png'
        }).setProperty('href', '#').set('html', this.options.close).injectBefore(w);
        var x = this.options.hidedivs.split(" ");
        this.close.addEvent('click', function (e) {
            this.fireEvent('unloaded');
            new Event(e).stop();
            this.inputBox.value = this.options.search;
            var b = this;
            this.fx.start('opacity', 0).chain(function () {
                b.results.empty().removeClass('roksearch_results')
            });
            if (x.length > 0 && x != '') x.each(function (a) {
                document.id(a).setStyle('visibility', 'visible')
            })
        }.bind(this));
        if (x.length > 0 && x != '') x.each(function (a) {
            document.id(a).setStyle('visibility', 'hidden')
        });
        this.results.addClass('roksearch_results');
        var y = $$('#rokajaxsearch_tmp fieldset');
        if (y.length > 0) {
            var z = new Element('div', {
                'class': 'container-wrapper'
            }).inject(v);
            var A = new Element('div', {
                'class': 'container-scroller'
            }).inject(z);
            y.each(function (p, i) {
                var q = '';
                q = p.getChildren();
                if (q.length > 0) {
                    q.each(function (a, j) {
                        if (a.get('tag') == "div") {
                            if (a.getChildren().length > 2 && !a.getPrevious()) {
                                var b = a.getFirst().getNext().getProperty('href');
                                var c = new Element('div', {
                                    'class': this.rows[i % 2] + ' png'
                                });
                                var d = new Element('a').setProperty('href', b).injectInside(c);
                                var e = new Element('h3').set('html', a.getFirst().getNext().get('text')).injectInside(d);
                                this.els.push(c);
                                c.addEvents({
                                    'mouseenter': function () {
                                        this.addClass(r.rows[i % 2] + '-hover');
                                        r.selectedEl = i
                                    },
                                    'mouseleave': function () {
                                        this.removeClass(r.rows[i % 2] + '-hover');
                                        if (r.selectedEl == i) r.selectedEl = -1
                                    }
                                });
                                var f = '';
                                if (this.options.showdescription) f = a.getNext().innerHTML;
                                var g = new Element('span').set('html', f).injectAfter(d);
                                if (this.options.showcategory) {
                                    var h = new Element('span', {
                                        'class': 'small'
                                    }).set('html', a.getChildren().getLast().get('text')).injectAfter(d);
                                    var k = new Element('br').injectAfter(h)
                                }
                                if (this.options.showreadmore) {
                                    d = new Element('a', {
                                        'class': 'clr'
                                    }).setProperty('href', b).set('html', this.options.readmore).injectAfter(g);
                                    if (this.options.showdescription) k = new Element('br').injectAfter(g)
                                }
                                var l = new Element('div', {
                                    'class': 'roksearch_result_wrapper1 png'
                                }).inject(A);
                                var m = new Element('div', {
                                    'class': 'roksearch_result_wrapper2 png'
                                }).inject(l);
                                var n = new Element('div', {
                                    'class': 'roksearch_result_wrapper3 png'
                                }).inject(m);
                                var o = new Element('div', {
                                    'class': 'roksearch_result_wrapper4 png'
                                }).inject(n);
                                c.inject(o)
                            }
                        }
                    }, this)
                }
            }, this);
            var B = A.getChildren();
            var C = Math.max(this.options.perpage, B.length);
            var D = Math.min(this.options.perpage, B.length);
            var E = this.options.perpage;
            this.page = [];
            (Math.abs(C / D)).times(function (i) {
                if (B[i]) this.page.push(new Element('div', {
                    'class': 'page page-' + i
                }).inject(A).setStyle('width', A.getStyle('width')));
                for (j = 0, l = E; j < l; j++) {
                    if (B[i * E + j]) B[i * E + j].inject(this.page[i])
                }
            }.bind(this));
            A.setStyle('width', z.getStyle('width').toInt() * Math.round(C / D) + 1000)
        }
        if (!y.length) {
            var F = new Element('div', {
                'class': this.rows[0]
            });
            var G = new Element('h3').set('html', this.options.noresults).injectInside(F);
            var H = new Element('a').setProperty('href', this.options.advsearchlink).injectAfter(G);
            G = new Element('span', {
                'class': 'advanced-search'
            }).set('html', this.options.advsearch).injectInside(H);
            F.inject(v)
        } else {
            if (this.options.includelink) {
                var I = $$('#rokajaxsearch input[name=limit]')[0];
                this.bottombar = new Element('div', {
                    'class': "roksearch_row_btm png"
                });
                var J = new Element('a').setProperty('href', "#").injectInside(this.bottombar);
                G = new Element('span').set('html', this.options.viewall).injectInside(J);
                J.addEvent('click', function (e) {
                    new Event(e).stop();
                    document.id('rokajaxsearch').submit()
                });
                this.bottombar.inject(v);
                if (B.length > this.options.perpage) {
                    this.arrowDiv = new Element('div', {
                        'class': 'container-arrows'
                    }).inject(this.bottombar, 'top');
                    this.arrowleft = new Element('div', {
                        'class': 'arrow-left-disabled'
                    }).inject(this.arrowDiv);
                    this.arrowright = new Element('div', {
                        'class': 'arrow-right'
                    }).inject(this.arrowDiv);
                    this.arrowsInit(z)
                }
            }
        }
    },
    outputTableless: function () {
        var p = this;
        var q = new Element('div', {
            'class': 'roksearch_wrapper1'
        }).inject(this.results);
        var r = new Element('div', {
            'class': 'roksearch_wrapper2'
        }).inject(q);
        var s = new Element('div', {
            'class': 'roksearch_wrapper3'
        }).inject(r);
        var t = new Element('div', {
            'class': 'roksearch_wrapper4'
        }).inject(s);
        var u = new Element('div', {
            'class': 'roksearch_header png'
        }).set('html', this.options.results).injectInside(t);
        if (this.type != 'local') {
            t.addClass('google-search').addClass('google-search-' + this.type);
            var v = '<span class="powered-by-google">(powered by <a href="http://google.com" target="_blank">Google</a>)</span>';
            u.set('html', this.options.results + v)
        };
        this.close = new Element('a', {
            'id': 'roksearch_link',
            'class': 'png'
        }).setProperty('href', '#').set('html', this.options.close).injectBefore(u);
        var w = this.options.hidedivs.split(" ");
        this.close.addEvent('click', function (e) {
            this.fireEvent('unloaded');
            new Event(e).stop();
            this.inputBox.value = this.options.search;
            var b = this;
            this.fx.start('opacity', 0).chain(function () {
                b.results.empty().removeClass('roksearch_results')
            });
            if (w.length > 0 && w != '') w.each(function (a) {
                document.id(a).setStyle('visibility', 'visible')
            })
        }.bind(this));
        if (w.length > 0 && w != '') w.each(function (a) {
            document.id(a).setStyle('visibility', 'hidden')
        });
        this.results.addClass('roksearch_results');
        var x = $$('#rokajaxsearch_tmp ol.list li');
        if (x.length > 0) {
            var y = new Element('div', {
                'class': 'container-wrapper'
            }).inject(t);
            var z = new Element('div', {
                'class': 'container-scroller'
            }).inject(y);
            x.each(function (a, i) {
                var b = '';
                b = a.getChildren();
                if (b.length > 0) {
                    var c = a.getElement('a').getProperty('href');
                    var d = new Element('div', {
                        'class': this.rows[i % 2] + ' png'
                    });
                    var e = new Element('a').setProperty('href', c).injectInside(d);
                    if (this.type != 'local') e.setProperty('target', '_blank');
                    var f = new Element('h3').set('html', b[0].get('text')).injectInside(e);
                    this.els.push(d);
                    d.addEvents({
                        'mouseenter': function () {
                            this.addClass(p.rows[i % 2] + '-hover');
                            p.selectedEl = i
                        },
                        'mouseleave': function () {
                            this.removeClass(p.rows[i % 2] + '-hover');
                            if (p.selectedEl == i) p.selectedEl = -1
                        }
                    });
                    var g = '';
                    if (this.options.showdescription) g = b[2].innerHTML;
                    var h = new Element('span').set('html', g).injectAfter(e);
                    if (this.options.showcategory) {
                        var j = new Element('span', {
                            'class': 'small'
                        }).set('html', b[1].innerHTML).injectAfter(e);
                        var k = new Element('br').injectAfter(j)
                    }
                    if (this.options.showreadmore) {
                        e = new Element('a', {
                            'class': 'clr'
                        }).setProperty('href', c).set('html', this.options.readmore).injectAfter(h);
                        if (this.type != 'local') e.setProperty('target', '_blank');
                        if (this.options.showdescription) k = new Element('br').injectAfter(h)
                    }
                    var l = new Element('div', {
                        'class': 'roksearch_result_wrapper1 png'
                    }).inject(z);
                    var m = new Element('div', {
                        'class': 'roksearch_result_wrapper2 png'
                    }).inject(l);
                    var n = new Element('div', {
                        'class': 'roksearch_result_wrapper3 png'
                    }).inject(m);
                    var o = new Element('div', {
                        'class': 'roksearch_result_wrapper4 png'
                    }).inject(n);
                    d.inject(o)
                }
            }, this);
            var A = z.getChildren();
            var B = Math.max(this.options.perpage, A.length);
            var C = Math.min(this.options.perpage, A.length);
            var D = this.options.perpage;
            this.page = [];
            (Math.abs(B / C)).times(function (i) {
                if (A[i]) this.page.push(new Element('div', {
                    'class': 'page page-' + i
                }).inject(z).setStyle('width', z.getStyle('width')));
                for (j = 0, l = D; j < l; j++) {
                    if (A[i * D + j]) A[i * D + j].inject(this.page[i])
                }
            }.bind(this));
            if (this.type != 'local') {
                var E = this.page[0].getSize();
                this.page[0].setStyle('position', 'relative');
                this.layer = new Element('div', {
                    'class': 'rokajaxsearch-overlay',
                    'styles': {
                        'width': E.x,
                        'height': E.y,
                        'position': 'absolute',
                        'left': 0,
                        'top': 0,
                        'display': 'block',
                        'z-index': 5
                    }
                }).inject(this.page[0], 'top');
                var F = new Fx.Tween(this.layer, {
                    duration: 300
                }).set('opacity', 0.9)
            }
            z.setStyle('width', y.getStyle('width').toInt() * Math.round(B / C) + 1000)
        }
        if (!x.length) {
            var G = new Element('div', {
                'class': this.rows[0]
            });
            var H = new Element('h3').set('html', this.options.noresults).injectInside(G);
            var I = new Element('a').setProperty('href', this.options.advsearchlink).injectAfter(H);
            H = new Element('span', {
                'class': 'advanced-search'
            }).set('html', this.options.advsearch).injectInside(I);
            G.inject(t)
        } else {
            if (this.options.includelink) {
                var J = $$('#rokajaxsearch input[name=limit]')[0];
                this.bottombar = new Element('div', {
                    'class': "roksearch_row_btm png"
                });
                var K = new Element('a', {
                    'class': 'viewall'
                }).setProperty('href', "#").injectInside(this.bottombar);
                H = new Element('span').set('html', this.options.viewall).injectInside(K);
                if (this.type != 'local') {
                    K.setProperties({
                        'href': this.google.cursor.moreResultsUrl,
                        'target': '_blank'
                    });
                    if (this.options.showestimated) var L = new Element('span', {
                        'class': 'estimated_res'
                    }).set('text', '(' + this.google.cursor.estimatedResultCount + ' ' + this.options.estimated + ')').inject(K, 'after');
                    if (this.options.showpagination) {
                        this.pagination = new Element('div', {
                            'class': 'pagination_res'
                        }).inject(L || K, 'after');
                        this.pagination.set('html', this.options.page + ' ' + '<span class="highlight">' + (this.google.cursor.currentPageIndex + 1) + '</span>' + ' ' + this.options.page_of + ' ' + '<span class="highlight">' + this.google.cursor.pages.length + '</span>')
                    }
                } else {
                    K.addEvent('click', function (e) {
                        new Event(e).stop();
                        document.id('rokajaxsearch').submit()
                    })
                }
                this.bottombar.inject(t);
                if (A.length > this.options.perpage || ((this.type != 'local') && this.google.cursor.pages.length > 1)) {
                    this.arrowDiv = new Element('div', {
                        'class': 'container-arrows'
                    }).inject(this.bottombar, 'top');
                    this.arrowleft = new Element('div', {
                        'class': 'arrow-left-disabled'
                    }).inject(this.arrowDiv);
                    this.arrowright = new Element('div', {
                        'class': 'arrow-right'
                    }).inject(this.arrowDiv);
                    if (this.type != 'local') {
                        if (this.google.cursor) {
                            var M = this.google.cursor.currentPageIndex;
                            if (M > 0) this.arrowleft.removeClass('arrow-left-disabled').addClass('arrow-left');
                            if (M == 7) this.arrowright.removeClass('arrow-right').addClass('arrow-right-disabled')
                        }
                        this.arrowsGoogleInit(y);
                        F.start('opacity', 0)
                    } else this.arrowsInit(y)
                }
            }
        }
    },
    arrowsGoogleInit: function (c) {
        this.arrowleft.addEvent('click', function (a) {
            if (!a && this.selectedEl >= 0) this.els[this.selectedEl].fireEvent('mouseleave');
            if (!a) this.selectedEl = -1;
            var b = (this.google.cursor) ? this.google.cursor.currentPageIndex : null;
            if (b - 1 <= 0) {
                this.arrowleft.removeClass('arrow-left').addClass('arrow-left-disabled');
                this.arrowright.removeClass('arrow-right-disabled').addClass('arrow-right')
            } else {
                this.arrowleft.removeClass('arrow-left-disabled').addClass('arrow-left');
                this.arrowright.removeClass('arrow-right-disabled').addClass('arrow-right')
            }
            if (!b) return;
            else {
                if (!this.inputBox.hasClass('loading')) this.inputBox.addClass('loading');
                this.layer.setStyle('opacity', 0.9);
                this.google.gotoPage(b - 1)
            }
        }.bind(this));
        this.arrowright.addEvent('click', function (a) {
            if (!a && this.selectedEl >= 0) this.els[this.selectedEl].fireEvent('mouseleave');
            if (!a) this.selectedEl = -1;
            var b = (this.google.cursor) ? this.google.cursor.currentPageIndex : null;
            if (b + 1 >= this.google.cursor.pages.length) {
                this.arrowleft.removeClass('arrow-left-disabled').addClass('arrow-left');
                this.arrowright.removeClass('arrow-right').addClass('arrow-right-disabled')
            } else {
                this.arrowleft.removeClass('arrow-left').addClass('arrow-left-disabled');
                this.arrowright.removeClass('arrow-right-disabled').addClass('arrow-right')
            }
            if (b >= this.google.cursor.pages.length - 1) return;
            else {
                if (this.arrowleft.hasClass('arrow-left-disabled')) this.arrowleft.removeClass('arrow-left-disabled').addClass('arrow-left');
                if (!this.inputBox.hasClass('loading')) this.inputBox.addClass('loading');
                this.layer.setStyle('opacity', 0.9);
                this.google.gotoPage(b + 1)
            }
        }.bind(this))
    },
    arrowsInit: function (b) {
        this.scroller = new Fx.Scroll(b, {
            wait: false
        });
        this.arrowleft.addEvent('click', function (a) {
            if (!a && this.selectedEl >= 0) this.els[this.selectedEl].fireEvent('mouseleave');
            if (!a) this.selectedEl = -1;
            if (this.current - 1 <= 0) {
                this.arrowleft.removeClass('arrow-left').addClass('arrow-left-disabled');
                this.arrowright.removeClass('arrow-right-disabled').addClass('arrow-right')
            } else {
                this.arrowleft.removeClass('arrow-left-disabled').addClass('arrow-left');
                this.arrowright.removeClass('arrow-right-disabled').addClass('arrow-right')
            }
            if (!this.current) return;
            else {
                if (this.current < 0) this.current = 0;
                else this.current -= 1;
                this.scroller.toElement(this.page[this.current])
            }
        }.bind(this));
        this.arrowright.addEvent('click', function (a) {
            if (!a && this.selectedEl >= 0) this.els[this.selectedEl].fireEvent('mouseleave');
            if (!a) this.selectedEl = -1;
            if (this.current + 1 >= this.page.length - 1) {
                this.arrowleft.removeClass('arrow-left-disabled').addClass('arrow-left');
                this.arrowright.removeClass('arrow-right').addClass('arrow-right-disabled')
            } else {
                this.arrowleft.removeClass('arrow-left').addClass('arrow-left-disabled');
                this.arrowright.removeClass('arrow-right-disabled').addClass('arrow-right')
            }
            if (this.current >= this.page.length) return;
            else {
                if (this.arrowleft.hasClass('arrow-left-disabled')) this.arrowleft.removeClass('arrow-left-disabled').addClass('arrow-left');
                if (this.current >= this.page.length - 1) this.current = this.page.length - 1;
                else this.current += 1;
                this.scroller.toElement(this.page[this.current])
            }
        }.bind(this))
    }
});
