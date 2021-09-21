'use strict';

//PLUGINS
/* metismenu - v2.0.2 https://github.com/onokumus/metisMenu - Under MIT License  */
!function (a) { "use strict"; function b() { var a = document.createElement("mm"), b = { WebkitTransition: "webkitTransitionEnd", MozTransition: "transitionend", OTransition: "oTransitionEnd otransitionend", transition: "transitionend" }; for (var c in b) if (void 0 !== a.style[c]) return { end: b[c] }; return !1 } function c(b) { return this.each(function () { var c = a(this), d = c.data("mm"), f = a.extend({}, e.DEFAULTS, c.data(), "object" == typeof b && b); d || c.data("mm", d = new e(this, f)), "string" == typeof b && d[b]() }) } a.fn.emulateTransitionEnd = function (b) { var c = !1, e = this; a(this).one("mmTransitionEnd", function () { c = !0 }); var f = function () { c || a(e).trigger(d.end) }; return setTimeout(f, b), this }; var d = b(); d && (a.event.special.mmTransitionEnd = { bindType: d.end, delegateType: d.end, handle: function (b) { return a(b.target).is(this) ? b.handleObj.handler.apply(this, arguments) : void 0 } }); var e = function (b, c) { this.jQueryelement = a(b), this.options = a.extend({}, e.DEFAULTS, c), this.transitioning = null, this.init() }; e.TRANSITION_DURATION = 350, e.DEFAULTS = { toggle: !0, doubleTapToGo: !1, activeClass: "active" }, e.prototype.init = function () { var b = this, c = this.options.activeClass; this.jQueryelement.find("li." + c).has("ul").children("ul").addClass("collapse in"), this.jQueryelement.find("li").not("." + c).has("ul").children("ul").addClass("collapse"), this.options.doubleTapToGo && this.jQueryelement.find("li." + c).has("ul").children("a").addClass("doubleTapToGo"), this.jQueryelement.find("li").has("ul").children("a").on("click.metisMenu", function (d) { var e = a(this), f = e.parent("li"), g = f.children("ul"); return d.preventDefault(), f.hasClass(c) ? b.hide(g) : b.show(g), b.options.doubleTapToGo && b.doubleTapToGo(e) && "#" !== e.attr("href") && "" !== e.attr("href") ? (d.stopPropagation(), void (document.location = e.attr("href"))) : void 0 }) }, e.prototype.doubleTapToGo = function (a) { var b = this.jQueryelement; return a.hasClass("doubleTapToGo") ? (a.removeClass("doubleTapToGo"), !0) : a.parent().children("ul").length ? (b.find(".doubleTapToGo").removeClass("doubleTapToGo"), a.addClass("doubleTapToGo"), !1) : void 0 }, e.prototype.show = function (b) { var c = this.options.activeClass, f = a(b), g = f.parent("li"); if (!this.transitioning && !f.hasClass("in")) { g.addClass(c), this.options.toggle && this.hide(g.siblings().children("ul.in")), f.removeClass("collapse").addClass("collapsing").height(0), this.transitioning = 1; var h = function () { f.removeClass("collapsing").addClass("collapse in").height(""), this.transitioning = 0 }; return d ? void f.one("mmTransitionEnd", a.proxy(h, this)).emulateTransitionEnd(e.TRANSITION_DURATION).height(function () { try { return f[0].scrollHeight } catch (e) { return 0 } }) : h.call(this) } }, e.prototype.hide = function (b) { var c = this.options.activeClass, f = a(b); if (!this.transitioning && f.hasClass("in")) { f.parent("li").removeClass(c), f.height(f.height())[0].offsetHeight, f.addClass("collapsing").removeClass("collapse").removeClass("in"), this.transitioning = 1; var g = function () { this.transitioning = 0, f.removeClass("collapsing").addClass("collapse") }; return d ? void f.height(0).one("mmTransitionEnd", a.proxy(g, this)).emulateTransitionEnd(e.TRANSITION_DURATION) : g.call(this) } }; var f = a.fn.metisMenu; a.fn.metisMenu = c, a.fn.metisMenu.Constructor = e, a.fn.metisMenu.noConflict = function () { return a.fn.metisMenu = f, this } }(jQuery);

/* SmoothScroll for websites v1.3.8 (Balazs Galambosi) - Licensed under the terms of the MIT license. */
if (!(/iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream)) {
    (function () { function vt() { n.keyboardSupport && c("keydown", pt) } function b() { var i, e, o, c, s; if (!a && document.body) { a = !0; var t = document.body, h = document.documentElement, f = window.innerHeight, v = t.scrollHeight; r = document.compatMode.indexOf("CSS") >= 0 ? h : t; u = t; vt(); top != self ? l = !0 : v > f && (t.offsetHeight <= f || h.offsetHeight <= f) && (i = document.createElement("div"), i.style.cssText = "position:absolute; z-index:-10000; top:0; left:0; right:0; height:" + r.scrollHeight + "px", document.body.appendChild(i), o = function () { e || (e = setTimeout(function () { et || (i.style.height = "0", i.style.height = r.scrollHeight + "px", e = null) }, 500)) }, setTimeout(o, 10), c = { attributes: !0, childList: !0, characterData: !1 }, ot = new ti(o), ot.observe(t, c), r.offsetHeight <= f && (s = document.createElement("div"), s.style.clear = "both", t.appendChild(s))); n.fixedBackground || et || (t.style.backgroundAttachment = "scroll", h.style.backgroundAttachment = "scroll") } } function k(t, i, r) { var s, f, u, h, o; (bt(i, r), n.accelerationMax != 1 && (s = Date.now(), f = s - y, f < n.accelerationDelta && (u = (1 + 50 / f) / 2, u > 1 && (u = Math.min(u, n.accelerationMax), i *= u, r *= u)), y = Date.now()), e.push({ x: i, y: r, lastX: i < 0 ? .99 : -.99, lastY: r < 0 ? .99 : -.99, start: Date.now() }), v) || (h = t === document.body, o = function () { setTimeout(function () { for (var a, y, b = Date.now(), s = 0, c = 0, f = 0; f < e.length; f++) { var u = e[f], p = b - u.start, w = p >= n.animationTime, l = w ? 1 : p / n.animationTime; n.pulseAlgorithm && (l = gt(l)); a = u.x * l - u.lastX >> 0; y = u.y * l - u.lastY >> 0; s += a; c += y; u.lastX += a; u.lastY += y; w && (e.splice(f, 1), f--) } h ? window.scrollBy(s, c) : (s && (t.scrollLeft += s), c && (t.scrollTop += c)); i || r || (e = []); e.length ? at(o, t, 1e3 / n.frameRate + 1) : v = !1 }, 1) }, at(o, t, 0), v = !0) } function yt(t) { var e, s, r, i; if ((a || b(), e = t.target, s = g(e), !s || t.defaultPrevented || t.ctrlKey) || f(u, "embed") || f(e, "embed") && /\.pdf/i.test(e.src) || f(u, "object") || (r = -t.wheelDeltaX || t.deltaX || 0, i = -t.wheelDeltaY || t.deltaY || 0, ni && (t.wheelDeltaX && o(t.wheelDeltaX, 120) && (r = -120 * (t.wheelDeltaX / Math.abs(t.wheelDeltaX))), t.wheelDeltaY && o(t.wheelDeltaY, 120) && (i = -120 * (t.wheelDeltaY / Math.abs(t.wheelDeltaY)))), r || i || (i = -t.wheelDelta || 0), t.deltaMode === 1 && (r *= 40, i *= 40), !n.touchpadSupport && kt(i))) return !0; Math.abs(r) > 1.2 && (r *= n.stepSize / 120); Math.abs(i) > 1.2 && (i *= n.stepSize / 120); k(s, r, i); t.preventDefault(); d() } function pt(i) { var e = i.target, y = i.ctrlKey || i.altKey || i.metaKey || i.shiftKey && i.keyCode !== t.spacebar, a, h, c; if ((document.contains(u) || (u = document.activeElement), a = /^(textarea|select|embed|object)jQuery/i, h = /^(button|submit|radio|checkbox|file|color|image)jQuery/i, a.test(e.nodeName) || f(e, "input") && !h.test(e.type) || f(u, "video") || dt(i) || e.isContentEditable || i.defaultPrevented || y) || (f(e, "button") || f(e, "input") && h.test(e.type)) && i.keyCode === t.spacebar) return !0; var v, l = 0, r = 0, o = g(u), s = o.clientHeight; o == document.body && (s = window.innerHeight); switch (i.keyCode) { case t.up: r = -n.arrowScroll; break; case t.down: r = n.arrowScroll; break; case t.spacebar: v = i.shiftKey ? 1 : -1; r = -v * s * .9; break; case t.pageup: r = -s * .9; break; case t.pagedown: r = s * .9; break; case t.home: r = -o.scrollTop; break; case t.end: c = o.scrollHeight - o.scrollTop - s; r = c > 0 ? c + 10 : 0; break; case t.left: l = -n.arrowScroll; break; case t.right: l = n.arrowScroll; break; default: return !0 } k(o, l, r); i.preventDefault(); d() } function wt(n) { u = n.target } function d() { clearTimeout(ht); ht = setInterval(function () { p = {} }, 1e3) } function h(n, t) { for (var i = n.length; i--;) p[st(n[i])] = t; return t } function g(n) { var t = [], e = document.body, o = r.scrollHeight, i, u, f; do { if (i = p[st(n)], i) return h(t, i); if (t.push(n), o === n.scrollHeight) { if (u = tt(r) && tt(e), f = u || it(r), l && nt(r) || !l && f) return h(t, ii()) } else if (nt(n) && it(n)) return h(t, n) } while (n = n.parentElement) } function nt(n) { return n.clientHeight + 10 < n.scrollHeight } function tt(n) { var t = getComputedStyle(n, "").getPropertyValue("overflow-y"); return t !== "hidden" } function it(n) { var t = getComputedStyle(n, "").getPropertyValue("overflow-y"); return t === "scroll" || t === "auto" } function c(n, t) { window.addEventListener(n, t, !1) } function f(n, t) { return (n.nodeName || "").toLowerCase() === t.toLowerCase() } function bt(n, t) { n = n > 0 ? 1 : -1; t = t > 0 ? 1 : -1; (s.x !== n || s.y !== t) && (s.x = n, s.y = t, e = [], y = 0) } function kt(n) { if (n) return i.length || (i = [n, n, n]), n = Math.abs(n), i.push(n), i.shift(), clearTimeout(ct), ct = setTimeout(function () { window.localStorage && (localStorage.SS_deltaBuffer = i.join(",")) }, 1e3), !rt(120) && !rt(100) } function o(n, t) { return Math.floor(n / t) == n / t } function rt(n) { return o(i[0], n) && o(i[1], n) && o(i[2], n) } function dt(n) { var t = n.target, i = !1; if (document.URL.indexOf("www.youtube.com/watch") != -1) do if (i = t.classList && t.classList.contains("html5-video-controls"), i) break; while (t = t.parentNode); return i } function ut(t) { var i, r, u; return t = t * n.pulseScale, t < 1 ? i = t - (1 - Math.exp(-t)) : (r = Math.exp(-1), t -= 1, u = 1 - Math.exp(-t), i = r + u * (1 - r)), i * n.pulseNormalize } function gt(t) { return t >= 1 ? 1 : t <= 0 ? 0 : (n.pulseNormalize == 1 && (n.pulseNormalize /= ut(1)), ut(t)) } var ft = { frameRate: 150, animationTime: 400, stepSize: 120, pulseAlgorithm: !0, pulseScale: 4, pulseNormalize: 1, accelerationDelta: 20, accelerationMax: 1, keyboardSupport: !0, arrowScroll: 50, touchpadSupport: !0, fixedBackground: !0, excluded: "" }, n = ft, et = !1, l = !1, s = { x: 0, y: 0 }, a = !1, r = document.documentElement, u, ot, i = [], ni = /^Mac/.test(navigator.platform), t = { left: 37, up: 38, right: 39, down: 40, spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36 }, n = ft, e = [], v = !1, y = Date.now(), st = function () { var n = 0; return function (t) { return t.uniqueID || (t.uniqueID = n++) } }(), p = {}, ht, ct, w, lt; window.localStorage && localStorage.SS_deltaBuffer && (i = localStorage.SS_deltaBuffer.split(",")); var at = function () { return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || function (n, t, i) { window.setTimeout(n, i || 1e3 / 60) } }(), ti = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver, ii = function () { var n; return function () { var t, i, r; return n || (t = document.createElement("div"), t.style.cssText = "height:10000px;width:1px;", document.body.appendChild(t), i = document.body.scrollTop, r = document.documentElement.scrollTop, window.scrollBy(0, 1), n = document.body.scrollTop != i ? document.body : document.documentElement, window.scrollBy(0, -1), document.body.removeChild(t)), n } }(); "onwheel" in document.createElement("div") ? w = "wheel" : "onmousewheel" in document.createElement("div") && (w = "mousewheel"); lt = !1; jQuery(".scroll-content").mouseover(function () { lt = !0 }); w && (addEventListener("mousewheel", yt), c("mousedown", wt), c("load", b)) })();
}

/* JavaScript Cookie v2.0.3 - https://github.com/js-cookie/js-cookie - Released under the MIT license */
(function (n) { if (typeof define == "function" && define.amd) define(n); else if (typeof exports == "object") module.exports = n(); else { var i = window.Cookies, t = window.Cookies = n(); t.noConflict = function () { return window.Cookies = i, t } } })(function () { function n() { for (var n = 0, r = {}, t, i; n < arguments.length; n++) { t = arguments[n]; for (i in t) r[i] = t[i] } return r } function t(i) { function r(t, u, f) { var o, s; if (arguments.length > 1) { f = n({ path: "/" }, r.defaults, f); typeof f.expires == "number" && (s = new Date, s.setMilliseconds(s.getMilliseconds() + f.expires * 864e5), f.expires = s); try { o = JSON.stringify(u); /^[\{\[]/.test(o) && (u = o) } catch (y) { } return u = encodeURIComponent(String(u)), u = u.replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g, decodeURIComponent), t = encodeURIComponent(String(t)), t = t.replace(/%(23|24|26|2B|5E|60|7C)/g, decodeURIComponent), t = t.replace(/[\(\)]/g, escape), document.cookie = [t, "=", u, f.expires && "; expires=" + f.expires.toUTCString(), f.path && "; path=" + f.path, f.domain && "; domain=" + f.domain, f.secure ? "; secure" : ""].join("") } t || (o = {}); for (var l = document.cookie ? document.cookie.split("; ") : [], a = /(%[0-9A-Z]{2})+/g, h = 0; h < l.length; h++) { var v = l[h].split("="), c = v[0].replace(a, decodeURIComponent), e = v.slice(1).join("="); e.charAt(0) === '"' && (e = e.slice(1, -1)); try { if (e = i && i(e, c) || e.replace(a, decodeURIComponent), this.json) try { e = JSON.parse(e) } catch (y) { } if (t === c) { o = e; break } t || (o[c] = e) } catch (y) { } } return o } return r.get = r.set = r, r.getJSON = function () { return r.apply({ json: !0 }, [].slice.call(arguments)) }, r.defaults = {}, r.remove = function (t, i) { r(t, "", n(i, { expires: -1 })) }, r.withConverter = t, r } return t() });

//VARAIBLES
var obj;
var device_screen_size = "";
var arrBgImage = [];
var timer;
var index = 0;
var color;
var wh = 1300;
var hh = 768;

//ANIMATIONS
function cssInit(delay, speed) {
    delay += 'ms';
    speed += 'ms';
    return {
        'transition-duration': speed,
        'animation-duration': speed,
        'transition-timing-function': 'ease',
        'transition-delay': delay
    };
}
var animaTimeout = [];
var animaTimeout_2 = [];
var default_anima = "fade-in";
function initAnima(obj) {
    var da = jQuery(obj).attr("data-anima");
    var an = jQuery(obj).find(".anima,*[data-anima]");
    var t = jQuery(obj).attr("data-time");
    var ta = jQuery(obj).attr("data-target");
    var tm = jQuery(obj).attr("data-timeline");
    var tmt = jQuery(obj).attr("data-timeline-time");
    var tr = jQuery(obj).attr("data-trigger");

    if (da == "default") da = default_anima;
    if (isEmpty(tmt)) tmt = 300;
    if (isEmpty(an)) an = obj;
    jQuery(an).each(function (i) {
        if (!isEmpty(jQuery(this).attr("data-anima")) && i == 0) { an = obj; return false; }
    });
    if (!isEmpty(ta)) an = jQuery(ta);
    if (isEmpty(t)) t = 300;
    var time = 0, p = 1;
    if (!isEmpty(tm) && tm == "desc") { time = jQuery(an).length * tmt; p = -1 };
    var cont = null;
    jQuery(an).each(function () {
        if (!jQuery(this).hasClass("anima") && an != obj && isEmpty(ta)) {
            cont = this;
        } else {
            if (cont != null && !jQuery.contains(cont, this) || cont == null) {
                var tobj = this;
                var pos = jQuery(this).css("position");
                if (pos != 'absolute' && pos != 'fixed') jQuery(this).css("position", "relative");
                var aid = Math.random(5) + "";
                jQuery(tobj).attr("aid", aid);
                if (animaTimeout.length > 30) {
                    animaTimeout.shift();
                    animaTimeout_2.shift();
                }
                animaTimeout.push([aid, setTimeout(function () {
                    jQuery(tobj).css(cssInit(0, 0));
                    var da_ = da;
                    if (!isEmpty(jQuery(tobj).attr('class')) && jQuery(tobj).attr('class').indexOf("anima-") != -1) {
                        var arr_a = jQuery(tobj).attr('class').split(" ");
                        for (var i = 0; i < arr_a.length; i++) {
                            if (arr_a[i].indexOf("anima-") != -1) da_ = arr_a[i].replace("anima-", "");
                        }
                    }
                    if (wh < 768 && (isEmpty(tr) || tr == "scroll" || tr == "load")) da_ = "fade-in";
                    animaTimeout_2.push([aid, setTimeout(function () { jQuery(tobj).css(cssInit(0, t)).addClass(da_); jQuery(tobj).css('opacity', '') }, 100)]);
                }, time)]);
                if (!isEmpty(tm)) time += tmt * p;
            }
        }
    });
}
function outAnima(obj) {
    var da = jQuery(obj).attr("data-anima");
    var an = jQuery(obj).find(".anima,*[data-anima]");
    var t = jQuery(obj).attr("data-time");
    var o = jQuery(obj).attr("data-anima-out");
    var ta = jQuery(obj).attr("data-target");
    if (da == "default") da = default_anima;
    if (isEmpty(an)) an = obj;
    if (!isEmpty(ta)) an = jQuery(ta);
    if (isEmpty(t)) t = 300;
    if (isEmpty(o)) o = "back";
    if ((o == "back") || (o == "hide")) {
        var cont = null;
        jQuery(an).each(function () {
            var aid = jQuery(this).attr("aid");
            if (!isEmpty(aid)) {
                for (var i = 0; i < animaTimeout.length; i++) {
                    if (animaTimeout[i][0] == aid) {
                        clearTimeout(animaTimeout[i][1]);
                    }
                }
                for (var i = 0; i < animaTimeout_2.length; i++) {
                    if (animaTimeout_2[i][0] == aid) {
                        clearTimeout(animaTimeout_2[i][1]);
                    }
                }
            }
            if (!jQuery(this).hasClass("anima") && an != obj) {
                cont = this;
            } else {
                if (cont != null && !jQuery.contains(cont, this) || cont == null) {
                    var pos = jQuery(this).css("position");
                    if (pos != 'absolute' && pos != 'fixed') jQuery(this).css("position", "relative");
                    var da_ = da;
                    try {
                        if (jQuery(this).attr('class').indexOf("anima-") != -1) {
                            var arr_a = jQuery(this).attr('class').split(" ");
                            for (var i = 0; i < arr_a.length; i++) {
                                if (arr_a[i].indexOf("anima-") != -1) da_ = arr_a[i].replace("anima-", "");
                            }
                        }
                    } catch (e) { }
                    jQuery(this).css(cssInit(0, t)).removeClass(da_);
                    var op = parseFloat(jQuery(this).css("opacity"));
                    if (op > 0 && op < 1) jQuery(this).css("opacity", 1);
                }
            }
        });
        if (o == "hide") {
            jQuery(an).css(cssInit(0, t)).css("opacity", 0);
            setTimeout(function () { jQuery(an).css("opacity", 0); }, 400);
        }
    }
}

//FUNCTIONS
function openWindow(link, width, height) {
    if (typeof width === 'undefined') width = 550;
    if (typeof height === 'undefined') height = 350;
    var left = (screen.width / 2) - (width / 2);
    var top = (screen.height / 2) - (height / 2);
    window.open(link, 'targetWindow', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=' + width + ',height=' + height + ', top=' + top + ', left=' + left);
    return false;
}
function changeBG() {
    var objTmp = jQuery(".overlay");
    objTmp.removeClass("fadeOut"); objTmp.css("background-color", color); objTmp.addClass("fadeIn");
    setTimeout(function () {
        if (arrBgImage.length == index) index = 0;
        jQuery("html").css("background-image", "url(" + arrBgImage[index] + ")");
        objTmp.removeClass("fadeIn"); objTmp.addClass("fadeOut");
    }, 1000);
    index = index + 1;
}
function onePageScroll(t) {
    if (!isEmpty(t)) {
        jQuery(t).find('a[href ^= "#"]').on('click', function (e) {
            e.preventDefault();
            var target = this.hash,
            jtarget = jQuery(target);
            if (target.indexOf('collapse') == -1) {
                try {
                    jQuery('html, body').stop().animate({
                        'scrollTop': (jtarget.offset().top - 150)
                    }, 900, 'swing', function () {
                        window.location.hash = target;
                    });
                } catch (e) { }
            }
        });
    }
}
function getOptionsString(txt, mainArray) {
    var optionsArr = txt.split(",");
    for (var i = 0; i < optionsArr.length; i++) {
        mainArray[optionsArr[i].split(":")[0]] = correctValue(optionsArr[i].split(":")[1]);
    }
    return mainArray;
}

//OTHERS
window.onload = function () { function a(a, b) { var c = /^(?:file):/, d = new XMLHttpRequest, e = 0; d.onreadystatechange = function () { 4 == d.readyState && (e = d.status), c.test(location.href) && d.responseText && (e = 200), 4 == d.readyState && 200 == e && (a.outerHTML = d.responseText) }; try { d.open("GET", b, !0), d.send() } catch (f) { } } var b, c = document.getElementsByTagName("*"); for (b in c) c[b].hasAttribute && c[b].hasAttribute("data-include") && a(c[b], c[b].getAttribute("data-include")) };

//FUNCTIONS
function isEmpty(obj) { if (typeof (obj) !== "undefined" && obj !== null && (obj.length > 0 || typeof (obj) == 'number' || typeof (obj.length) == "undefined") && obj !== "undefined") return false; else return true; }
function correctValue(n) { return typeof n == "number" ? parseFloat(n) : n == "true" ? !0 : n == "false" ? !1 : n }
function isScrollView(t) {
    var tp = jQuery(window).height() * 0.5 + jQuery(window).scrollTop();
    var e = jQuery(t).offset().top;
    if ((e < (tp + 300) || ((jQuery(window).scrollTop() + jQuery(window).height() == jQuery(document).height())))) return true;
    else return false;
}

//MAIN BLOCK
(function (jQuery) {
    var arrFA = [];

    //FUNCTIONS
    jQuery.fn.toggleClick = function (n) { var t = arguments, r = n.guid || jQuery.guid++, i = 0, u = function (r) { var u = (jQuery._data(this, "lastToggle" + n.guid) || 0) % i; return jQuery._data(this, "lastToggle" + n.guid, u + 1), r.preventDefault(), t[u].apply(this, arguments) || !1 }; for (u.guid = r; i < t.length;) t[i++].guid = r; return this.click(u) };
    jQuery.fn.showAnima = function (a, b) {
        var t = this;
        if (a == "default") a = default_anima;
        jQuery(t).removeClass(a);
        if (!isEmpty(b) && b == "complete") { jQuery(t).attr("data-anima", a).attr("data-trigger", "manual"); initAnima(t); }
        else setTimeout(function () { jQuery(t).css(cssInit(0, 300)).addClass(a); jQuery(t).css('opacity', '') }, 100);
    };
    jQuery.fn.titleFullScreen = function (h) {
        if (!isEmpty(this)) {
            var o = jQuery(this).find(".overlaybox");
            jQuery(this).sizeFullScreen(h);
            if (!(jQuery("header").css("position") == "absolute") && !(jQuery("header").css("position") == "fixed")) {
                jQuery(this).css("height", jQuery(this).height() - jQuery("header").height() + "px");
            }
            if (!isEmpty(o)) jQuery(o).css("margin-top", "-" + jQuery(o).height() / 2 + "px");
        }
    }
    jQuery.fn.sizeFullScreen = function (h) {
        if (!isEmpty(this)) {
            var h = jQuery(window).outerHeight() - parseInt(jQuery(this).css("margin-top").replace("px", ""), 10) - parseInt(jQuery(this).css("margin-bottom").replace("px", ""), 10) - ((isEmpty(h)) ? 0 : parseInt(h, 10));
            if (h > jQuery(this).height()) jQuery(this).css("height", h + "px");
        }
    }
    jQuery.fn.setMiddleBox = function (target) {
        if (isEmpty(target)) target = ".box-middle";
        var t = jQuery(this).find(target);
        var a = parseInt(jQuery(this).outerHeight());
        var b = parseInt(jQuery(t).outerHeight(true));
        if (b < a) jQuery(t).css("margin-top", (a - b) / 2 + "px");
    }
    jQuery.fn.scrollTo = function () {
        if (!isEmpty(this)) {
            jQuery('html, body').animate({
                scrollTop: jQuery(this).offset().top - 50
            }, 1000);
        }
    }
    jQuery.fn.expandItem = function () {
        var t = this;
        jQuery(t).css("display", "block").css("height", "");
        var h = jQuery(t).height();
        jQuery(t).css("height", 0).css("opacity", 1);
        jQuery(t).animate({
            height: h
        }, 300, function () { jQuery(t).css("height", "") });
    }
    jQuery.fn.collapseItem = function () {
        var t = this;
        jQuery(t).animate({
            height: 0
        }, 300, function () { jQuery(t).css("display", "none") });
    }
    jQuery.fn.setVideoBgSize = function (hh, wh) {
        var obj = this;
        var cH = hh;
        var cW = wh;
        if (jQuery(this).hasClass("section-bg-video")) {
            obj = jQuery(this).find("video");
            cH = jQuery(this).height();
            cW = jQuery(this).width();
        }

        var vidH = jQuery(obj).height();
        var vidW = jQuery(obj).width();

        var proportion = cH / vidH;
        var newWidth = vidW * proportion;
        if (newWidth / vidW > 1) {
            jQuery(obj).css("width", Math.ceil(newWidth) + "px");
            jQuery(obj).css("margin-left", "-" + Math.floor(((newWidth - cW) / 2)) + "px");
        }
    }

    jQuery(document).ready(function () {
        //DEVICE SIZE
        wh = jQuery(window).width();
        hh = jQuery(window).height();
        if (wh < 769) device_screen_size = "device-xs";
        if (wh > 768 && wh < 992) device_screen_size = "device-s";;
        if (wh > 992 && wh < 1200) device_screen_size = "device-m";;
        if (wh > 1200) device_screen_size = "device-l";
        jQuery("body").addClass(device_screen_size);

        //VIDEO BG
        jQuery(".background-page video,.section-bg-video,.header-video video").each(function () {
            jQuery(this).setVideoBgSize(hh, wh);
        });

        //SOCIAL
        jQuery("*[data-social]").each(function () {
            var t = this;
            jQuery(t).click(function () {
                var a = jQuery(t).attr("data-social");
                var link = jQuery(t).attr("data-social-url");
                var purl = link;
                if (isEmpty(link)) purl = window.location.href;

                var url = 'https://www.facebook.com/sharer/sharer.php?u=' + purl;
                if (a == 'share-twitter') {
                    url = 'https://twitter.com/intent/tweet?text=' + jQuery('meta[name=description]').attr("content");
                    if (!isEmpty(link)) url = 'https://twitter.com/intent/tweet?url=' + link;
                }
                if (a == 'share-google') url = 'https://plus.google.com/share?url=' + purl;
                if (a == 'share-linkedin') url = 'https://www.linkedin.com/shareArticle?url=' + purl;

                openWindow(url);
            });
        });

        //MENU - MOBILE
        jQuery(".navbar-toggle").toggleClick(function () {
            jQuery(this).closest('.navbar').find('.navbar-collapse').expandItem();
        }, function () {
            jQuery(this).closest('.navbar').find('.navbar-collapse').collapseItem();
            jQuery(".subline-bar ul").hide();
        });

        //MENU - FIXED TOP
        jQuery(".fixed-top").each(function () {
            var t = false, n = jQuery(this).find(".scroll-hide");
            if (jQuery(n).css("display") == "none") { jQuery(n).css("display", "block"); t = true; };
            jQuery(this).css("height", jQuery(this).find(">:first-child").outerHeight() + "px");
            if (t) jQuery(n).css("display", "none");
        });

        //COMPONENT - FIXED AREA
        jQuery(".fixed-area").each(function (i) {
            jQuery(this).css("width", jQuery(this).width() + "px");
            var top = jQuery(this).attr("data-topscroll");
            if (isEmpty(top)) top = jQuery("header div").outerHeight(true);
            arrFA[i] = [jQuery(this).offset().top, jQuery(this).offset().left, top];
            jQuery(this).closest(".section-item").css("z-index", "4");
        });

        //ANIMATIONS
        jQuery('*[data-anima]').each(function () {
            var tr = jQuery(this).attr("data-trigger");
            if (isEmpty(tr) || tr == "scroll" || tr == "load") {
                var an = jQuery(this).find(".anima,*[data-anima]");
                if (isEmpty(an)) an = this;
                var cont = null;
                var x = 0;
                jQuery(an).each(function () {
                    if (!jQuery(this).hasClass("anima") && an != this) {
                        cont = this;
                    } else {
                        if (cont != null && !jQuery.contains(cont, this) || cont == null) {
                            jQuery(this).css("opacity", 0);
                            x++;
                        }
                    }
                });
                if (x == 0) jQuery(this).css("opacity", 0);
            }
            if (!isEmpty(tr) && tr == "load") initAnima(this);
        });
        jQuery('*[data-anima]*[data-trigger="click"]').click(function () {
            outAnima(this);
            initAnima(this);
        });
        jQuery('*[data-anima]*[data-trigger="hover"]').mouseenter(function () {
            initAnima(this);
        }).mouseleave(function () {
            jQuery(this).stop(true, false);
            outAnima(this);
        });

        //MENU 
        jQuery("body").on("click", ".nav > li", function () {
            var n = jQuery(this).closest('.nav');
            jQuery(n).find("li").removeClass("active").removeClass("current-active");
            jQuery(this).addClass("active current-active");
        });

        //MENU ANIMATIONS
        if (device_screen_size != "device-xs") {
            jQuery("[data-menu-anima]").each(function () {
                var a = jQuery(this).closest("[data-menu-anima]").attr("data-menu-anima");
                jQuery(this).find("ul:not(.side-menu):first-child li").hover(function () {
                    jQuery(this).find(" > ul, > .mega-menu").css("opacity", 0).css("transition-duration", "0ms").showAnima(a);
                });
                jQuery(this).find(".side-menu li").hover(function () {
                    jQuery(this).find(".panel").css("opacity", 0).css("transition-duration", "0ms").showAnima(a);
                });
                if (jQuery(this).hasClass("side-menu-lateral")) {
                    jQuery(this).find(".side-menu li").hover(function () {
                        jQuery(this).find("ul").css("opacity", 0).css("transition-duration", "0ms").showAnima(a);
                    });
                }
            });
            jQuery(".nav > li").hover(function (e) {
                jQuery(this).closest(".nav").find("li").removeClass("open");
            });
        }

        //MENU - SIDE
        if (device_screen_size == "device-xs") {
            jQuery(".side-menu li > ul.collapse").each(function () {
                jQuery(this).css("height", "0px");
            });

            jQuery("body").on("click", ".side-menu > li.panel-item", function () {
                if (jQuery(e.target).closest(".collapse").length == 0) jQuery(this).toggleClass("active");
            });

            jQuery("body").on("click", ".side-menu > li", function () {
                var t = this;
                jQuery(".side-menu > li").each(function (index) {
                    if (t !== this) {
                        jQuery(this).removeClass("active");
                        jQuery(this).find(".collapse").removeClass("in").removeClass("open");
                        jQuery(this).find("> ul.collapse").css("height", "0px");
                    }
                });
            });
        }
        if (jQuery(".side-menu-fixed").length) {
            var mh = jQuery(window).height() - (jQuery('.side-menu-fixed .top-area').outerHeight(true) + jQuery('.side-menu-fixed .bottom-area').outerHeight(true));
            jQuery('.side-menu-fixed .sidebar').css('height', mh + "px");
            jQuery(".side-menu-fixed .scroll-content").attr("data-height", mh);

            if (jQuery.isFunction(jQuery.fn.slimScroll)) {
                jQuery("body").on("click", ".side-menu li", function () {
                    jQuery(".side-menu-fixed .scroll-content").slimScroll();
                });
            }
        }
        jQuery("body").on("click", ".side-menu .panel-item", function () {
            jQuery(this).find(".panel").toggleClass("open");
        });
        jQuery("body").on("click", ".side-menu .panel-item li", function () {
            jQuery(this).closest(".panel").toggleClass("open");
        });
        jQuery(".side-menu").each(function (index) {
            jQuery(this).metisMenu();
        });
        jQuery(".one-page-menu,.navbar-nav.inner,.side-menu").each(function () {
            onePageScroll(this);
        });
        if (jQuery('.side-menu .panel-item').length) {
            var width = jQuery(".side-menu-fixed").css("width");
            jQuery('.side-menu .panel-item .panel').css("left", width);
        }

        //HAMBURGER BUTTON
        jQuery(".hamburger-button").toggleClick(function () {
            var a = jQuery(this).attr("data-menu-anima");
            if (isEmpty(a)) a = "fade-in";
            jQuery(".hamburger-menu,.side-menu-fixed").css("visibility", "visible").showAnima(a);
            jQuery(this).addClass("active");
            if (device_screen_size == "device-xs") jQuery("body").css("overflow", "hidden");
        }, function () {
            var a = jQuery(this).attr("data-menu-anima");
            if (isEmpty(a)) a = "fade-in";
            jQuery(".hamburger-menu,.side-menu-fixed").css("visibility", "hidden").css("opacity", "0").removeClass(a);
            jQuery(this).removeClass("active");
            jQuery("body").css("overflow", "");
        });

        //OTHERS
        jQuery('a[href="#"]').on('click', function (e) {
            e.preventDefault();
        });

        jQuery("body").on("click", ".img-box .caption", function () {
            jQuery(this).closest(".img-box").find("a.img-box").click();
        });

        jQuery(".header-slider,.header-video,.header-title").setMiddleBox(".container > div");
        jQuery(".full-screen-title .container > div").css("margin-top", "");

        jQuery(".full-screen-size").each(function () {
            var h = jQuery(this).attr("data-sub-height");
            jQuery(this).sizeFullScreen((isEmpty(h) ? null : h));
        });
        jQuery(".full-screen-title").each(function () {
            var h = jQuery(this).attr("data-sub-height");
            jQuery(this).titleFullScreen((isEmpty(h) ? null : h));
        });
        jQuery(".box-middle-container").each(function () {
            jQuery(this).setMiddleBox();
        });
        jQuery(".social-group-button").toggleClick(function () {
            jQuery(this).find(".social-group").css("display", "block");
            jQuery(this).find(".social-group i").showAnima("fade-left");
        }, function () {
            jQuery(this).find(".social-group").css("display", "none");
            jQuery(this).find(".social-group i").css("opacity", "0");
        });
        jQuery("body").on("click", ".adv-img-classic-box,.adv-img-full-content", function () {
            var a = jQuery(this).find("a.img-box:not(.lightbox)");
            var href = jQuery(a).attr('href');
            if (!isEmpty(href) && jQuery(a).length && jQuery(this).closest(".gallery").length == 0) {
                if (jQuery(a).attr('target') != "_blank") location.href = href;
                else window.open(href);
            }
        });
        if (device_screen_size != "device-xs") {
            jQuery(".section-two-blocks .content").each(function () {
                var t = this;
                setTimeout(function () {
                    var tmp = jQuery(t).closest(".section-two-blocks");
                    if (isEmpty(jQuery(tmp).attr("data-parallax"))) jQuery(tmp).css("height", jQuery(t).outerHeight());
                }, 300);
            });
        }

        //WORDPRESS
        if (jQuery("#wpadminbar").length) {
            if (jQuery("header").hasClass("fixed-top")) jQuery("header > .navbar").css("margin-top", "32px");
            if (jQuery("header").hasClass("side-menu-header")) jQuery("header .side-menu-fixed,header .navbar-fixed-top").css("margin-top", "32px");
        }

        //BACKGROUND VIDEO YT
        jQuery("*[data-video-youtube]").each(function () {
            var id = jQuery(this).attr("data-video-youtube");
            if (id.indexOf("http:") != -1 || id.indexOf("www.you") != -1 || id.indexOf("youtu.be") != -1) {
                if (id.indexOf("?v=") != -1) id = id.substring(id.indexOf("v=") + 2);
                if (id.indexOf("youtu.be") != -1) id = id.substring(id.lastIndexOf("/") + 1);
            }
            var vq = jQuery(this).attr("data-video-quality");
            var pars = "";
            if (!isEmpty(vq)) {
                if (vq == "hd") pars += "&amp;vq=hd1080";
            }
            jQuery(this).html('<iframe frameborder="0" allowfullscreen="0" src="https://www.youtube.com/embed/' + id + '?playlist=' + id + '&amp;vq=hd1080&amp;loop=1&amp;start=0&amp;autoplay=1&amp;controls=0&amp;showinfo=0&amp;wmode=transparent&amp;iv_load_policy=3&amp;modestbranding=1&amp;rel=0&amp;enablejsapi=1&amp;volume=0' + pars + '"></iframe>');
        });
        if (jQuery(".background-page iframe").length) {
            jQuery(".background-page iframe").css("height", jQuery(window).height() + 300 + "px").css("width", jQuery(window).width() + 300 + "px").css("margin-left", "-150px");
        }

        //MENU - SEARCH C
        jQuery(".btn-search").toggleClick(function () {
            jQuery(this).closest(".search-box-menu").find(".search-box").css("opacity", 0).css("display", "block").showAnima("fade-bottom");
        },
         function () {
             jQuery(this).closest(".search-box-menu").find(".search-box").css("display", "none");
         });

        //MENU - SUBLINE
        function showSublineMenu(item) {
            var p = jQuery(item).closest("header");
            var t = jQuery(p).find(".subline-bar ul:eq(" + jQuery(item).index() + ")");
            jQuery(p).find(".subline-bar ul").css("display", "none");
            jQuery(t).css("opacity", "0").css("display", "block").animate({ "opacity": 1 }, 300);
        }
        jQuery(".subline-menu > li").mouseover(function () {
            showSublineMenu(this);
        });
        jQuery(".subline-bar").on("mouseleave", function () {
            jQuery(this).find("ul").css("display", "none");
        });
        if (jQuery("header").hasClass("fixed-top")) jQuery(".subline-bar").css("margin-top", jQuery("header").height() + "px");

        //MENU - MINI TOP - SEARCH
        jQuery(".navbar-mini .form-control").focusin(function () {
            jQuery(this).toggleClass("focus");
        });
        jQuery(".navbar-mini .form-control").focusout(function () {
            jQuery(this).toggleClass("focus");
        });

        //SCROLL METHODS
        setTimeout(function () { jQuery(window).scroll(); }, 50);
        jQuery("body").on("click", ".scroll-top", function () {
            jQuery("html, body").stop().animate({ scrollTop: 0 }, '500', 'swing');
        });
        jQuery("body").on("click", ".scroll-to", function () {
            var t = jQuery(this).attr("data-scroll-to");
            if (isEmpty(t)) t = jQuery(this).attr("href");
            jQuery(t).scrollTo();
        });

        //LOADER
        jQuery('#preloader').fadeOut(300);

        //PAGE SCROLL
        var cnt_title = jQuery(".header-slider .container,.header-video .container,.header-title .container,.header-animation .container");
        var parallax_title = jQuery(".header-parallax");
        var fixed_area = jQuery(".fixed-area");
        var fixed_area_limiter = jQuery(".fixed-area-limiter");
        if (isEmpty(fixed_area_limiter)) fixed_area_limiter = jQuery("footer");
        var data_anima = jQuery("*[data-anima]");
        var old_scroll = 0;
        jQuery(window).scroll(function () {
            var po = window.pageYOffset;
            jQuery(cnt_title).css("margin-top", po / 2).css("opacity", (100 / po < 1) ? (100 / po) : 1);

            var scroll = jQuery(window).scrollTop();
            var go = true;
            var dh = jQuery(document).height();

            if (jQuery(parallax_title).length) {
                if (po > jQuery(window).outerHeight()) jQuery(parallax_title).css("visibility", "hidden");
                else jQuery(parallax_title).css("visibility", "visible");
                jQuery(parallax_title).find(".layer-parallax").css("margin-top", -1 * po / 2);
            }

            //COMPONENT - FIXED AREA
            jQuery(fixed_area).each(function (i) {
                if (arrFA.length && scroll > arrFA[i][0]) {
                    jQuery(this).css("top", arrFA[i][2] + "px").css("left", arrFA[i][1] + "px").css("position", "fixed").addClass("active");
                } else jQuery(this).css("top", "").css("position", "").css("left", "").removeClass("active");

                var _bottom = jQuery(this).attr("data-bottom");
                if (!isEmpty(_bottom)) {
                    if (scroll + hh > dh - _bottom) {
                        if (old_scroll < scroll) {
                            jQuery(this).animate({
                                "margin-top": "-" + _bottom
                            }, 200);
                        }
                    } else {
                        if (old_scroll > scroll) {
                            jQuery(this).clearQueue();
                            jQuery(this).css("margin-top", "")
                        }
                    }
                }
            });

            //ON SCROLL FUNCTIONS
            if (scroll > 100 && go) {
                go = false;
                jQuery(".scroll-hide").addClass('hidden');
                jQuery(".scroll-change").addClass("scroll-css");
                jQuery(".scroll-show").addClass('showed');
                jQuery(".menu-transparent").removeClass("bg-transparent");
                if (device_screen_size == "device-xs") jQuery(".scroll-show-mobile").removeClass('hidden');

                if (scroll + hh > (dh - hh)) {
                    jQuery(".footer-parallax").css("opacity", 1);
                } else jQuery(".footer-parallax").css("opacity", 0);
            }
            if (scroll < 100) {
                go = true;
                jQuery(".scroll-hide").removeClass("hidden");
                if (!jQuery(".fp-enabled").length) jQuery(".scroll-change").removeClass("scroll-css");
                jQuery(".scroll-show").removeClass('showed');
                jQuery(".menu-transparent").addClass("bg-transparent");
            }

            //SCROLL INTO VIEWPORT
            jQuery(data_anima).each(function () {
                var tr = jQuery(this).attr("data-trigger");
                if (isEmpty(tr) || tr == "scroll") {
                    if (isScrollView(this)) {
                        if (!isEmpty(jQuery(this).attr("data-anima"))) initAnima(this);
                        jQuery(this).attr("data-anima", "");
                    }
                }
            });
            old_scroll = scroll;
        });
    });
}(jQuery));
