!function (e, n) { "object" == typeof exports && "undefined" != typeof module ? n(require("jquery")) : "function" == typeof define && define.amd ? define(["jquery"], n) : n(e.jQuery) }(this, function (e) {
    "use strict"; function n(n) { var t = this; if (1 === arguments.length && "function" == typeof n && (n = [n]), !(n instanceof Array)) throw new SyntaxError("isInViewport: Argument(s) passed to .do/.run should be a function or an array of functions"); return n.forEach(function (n) { "function" != typeof n ? (console.warn("isInViewport: Argument(s) passed to .do/.run should be a function or an array of functions"), console.warn("isInViewport: Ignoring non-function values in array and moving on")) : [].slice.call(t).forEach(function (t) { return n.call(e(t)) }) }), this } function t(n) { var t = e("<div></div>").css({ width: "100%" }); n.append(t); var o = n.width() - t.width(); return t.remove(), o } function o(n, r) { var i = n.getBoundingClientRect(), a = i.top, u = i.bottom, c = i.left, f = i.right, s = e.extend({ tolerance: 0, viewport: window }, r), d = !1, l = s.viewport.jquery ? s.viewport : e(s.viewport); l.length || (console.warn("isInViewport: The viewport selector you have provided matches no element on page."), console.warn("isInViewport: Defaulting to viewport as window"), l = e(window)); var p = l.height(), w = l.width(), h = l[0].toString(); if (l[0] !== window && "[object Window]" !== h && "[object DOMWindow]" !== h) { var v = l[0].getBoundingClientRect(); a -= v.top, u -= v.top, c -= v.left, f -= v.left, o.scrollBarWidth = o.scrollBarWidth || t(l), w -= o.scrollBarWidth } return s.tolerance = ~~Math.round(parseFloat(s.tolerance)), s.tolerance < 0 && (s.tolerance = p + s.tolerance), f <= 0 || c >= w ? d : d = s.tolerance ? a <= s.tolerance && u >= s.tolerance : u > 0 && a <= p } function r(n) { if (n) { var t = n.split(","); return 1 === t.length && isNaN(t[0]) && (t[1] = t[0], t[0] = void 0), { tolerance: t[0] ? t[0].trim() : void 0, viewport: t[1] ? e(t[1].trim()) : void 0 } } return {} } e = e && e.hasOwnProperty("default") ? e.default : e,/**
 * @author  Mudit Ameta
 * @license https://github.com/zeusdeux/isInViewport/blob/master/license.md MIT
 */
        e.extend(e.expr.pseudos || e.expr[":"], { "in-viewport": e.expr.createPseudo ? e.expr.createPseudo(function (e) { return function (n) { return o(n, r(e)) } }) : function (e, n, t) { return o(e, r(t[3])) } }), e.fn.isInViewport = function (e) { return this.filter(function (n, t) { return o(t, e) }) }, e.fn.run = n
});

jQuery(function($){
    $(window).scroll(function () {
        if ($('.z3').is(":in-viewport(-500)")) {
            $('.z3').addClass('active');
        }
    });
});