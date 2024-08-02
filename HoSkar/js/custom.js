!function (e, n) { "object" == typeof exports && "undefined" != typeof module ? n(require("jquery")) : "function" == typeof define && define.amd ? define(["jquery"], n) : n(e.jQuery) }(this, function (e) {
    "use strict"; function n(n) { var t = this; if (1 === arguments.length && "function" == typeof n && (n = [n]), !(n instanceof Array)) throw new SyntaxError("isInViewport: Argument(s) passed to .do/.run should be a function or an array of functions"); return n.forEach(function (n) { "function" != typeof n ? (console.warn("isInViewport: Argument(s) passed to .do/.run should be a function or an array of functions"), console.warn("isInViewport: Ignoring non-function values in array and moving on")) : [].slice.call(t).forEach(function (t) { return n.call(e(t)) }) }), this } function t(n) { var t = e("<div></div>").css({ width: "100%" }); n.append(t); var o = n.width() - t.width(); return t.remove(), o } function o(n, r) { var i = n.getBoundingClientRect(), a = i.top, u = i.bottom, c = i.left, f = i.right, s = e.extend({ tolerance: 0, viewport: window }, r), d = !1, l = s.viewport.jquery ? s.viewport : e(s.viewport); l.length || (console.warn("isInViewport: The viewport selector you have provided matches no element on page."), console.warn("isInViewport: Defaulting to viewport as window"), l = e(window)); var p = l.height(), w = l.width(), h = l[0].toString(); if (l[0] !== window && "[object Window]" !== h && "[object DOMWindow]" !== h) { var v = l[0].getBoundingClientRect(); a -= v.top, u -= v.top, c -= v.left, f -= v.left, o.scrollBarWidth = o.scrollBarWidth || t(l), w -= o.scrollBarWidth } return s.tolerance = ~~Math.round(parseFloat(s.tolerance)), s.tolerance < 0 && (s.tolerance = p + s.tolerance), f <= 0 || c >= w ? d : d = s.tolerance ? a <= s.tolerance && u >= s.tolerance : u > 0 && a <= p } function r(n) { if (n) { var t = n.split(","); return 1 === t.length && isNaN(t[0]) && (t[1] = t[0], t[0] = void 0), { tolerance: t[0] ? t[0].trim() : void 0, viewport: t[1] ? e(t[1].trim()) : void 0 } } return {} } e = e && e.hasOwnProperty("default") ? e.default : e,/**
 * @author  Mudit Ameta
 * @license https://github.com/zeusdeux/isInViewport/blob/master/license.md MIT
 */
        e.extend(e.expr.pseudos || e.expr[":"], { "in-viewport": e.expr.createPseudo ? e.expr.createPseudo(function (e) { return function (n) { return o(n, r(e)) } }) : function (e, n, t) { return o(e, r(t[3])) } }), e.fn.isInViewport = function (e) { return this.filter(function (n, t) { return o(t, e) }) }, e.fn.run = n
});

jQuery(function($){

    $('.need-readmore').append('<div class="text-center read-more-wrap position-absolute w-100"><a href="#" class="go-open-room-desc text-underline" >Read More</a></div>');

    $(document).on('click', '.go-open-room-desc', function (e) {

        e.preventDefault();

        var t = $(this);

        t.closest('.read-more-wrap').toggle();

        t.closest('.need-readmore').toggleClass('active');

    });

    $('.go-read-full').on('click', function (e) {
        e.preventDefault();
        p = $(this).parents('.need-readmoree');
        $(this).fadeOut();
        $('.sapo', p).removeClass('max-3');
    });

    $(window).scroll(function () {
        if ($('.z3').is(":in-viewport(-500)")) {
            $('.z3').addClass('active');
        }
    });
    $('.main .next').on('click', function(){
        a = $('.i-0', '.main');
        b = $('.i-1', '.main');
        c = $('.i-2', '.main');
        b.removeClass('i-1').addClass('i-2');
        a.removeClass('i-0').addClass('i-1');
        c.removeClass('i-2').addClass('i-0');
    });

    if ($('.logos-slider').length) {
        new Swiper('.logos-slider', {
            loop: true,
            freeMode: true,
            speed: 1500,
            autoplay: {
                delay: 1,
                disableOnInteraction: false
            },
            breakpoints: {
                200: {
                    slidesPerView: 2,
                    spaceBetween: 15
                },
                500: {
                    slidesPerView: 4,
                    spaceBetween: 15
                },
                1000: {
                    slidesPerView: 5,
                    spaceBetween: 20
                },
                1200: {
                    slidesPerView: 6,
                    spaceBetween: 20
                }
            }
        });
    }

    if ($('.logos-slider-2').length) {
        new Swiper('.logos-slider-2', {
            loop: true,
            freeMode: true,
            speed: 1500,
            autoplay: {
                delay: 1,
                disableOnInteraction: false,
                reverseDirection: true
            },
            breakpoints: {
                200: {
                    slidesPerView: 2,
                    spaceBetween: 15
                },
                500: {
                    slidesPerView: 4,
                    spaceBetween: 15
                },
                1000: {
                    slidesPerView: 5,
                    spaceBetween: 20
                },
                1200: {
                    slidesPerView: 6,
                    spaceBetween: 20
                }
            }
        });
    }

    // if ($('.cities').length) {
    //     new Swiper('.cities', {
    //         loop: true,
    //         speed: 1500,
    //         autoplay: {
    //             delay: 1,
    //             disableOnInteraction: false
    //         },
    //         breakpoints: {
    //             200: {
    //                 slidesPerView: 4,
    //                 spaceBetween: 30
    //             }
    //         }
    //     });
    // }

    $(document).on('click', '.event_format .entry:not(.active)', function(e){
        var t = $(this);
        $('.event_format .entry').not(t).removeClass('active flex-shrink-0');
        t.addClass('active flex-shrink-0');
        $('.event_format_lb').css('text-align', t.data('align'));
        $('.event_format_lb span').text(t.closest('.entry').find('h2').text());
    });

    $('.event_format .entry:eq(0) .next').on('click', function(e){
        e.stopPropagation();
        $('.event_format .entry:eq(1)').trigger('click');
    });
    $('.event_format .entry:eq(1) .next').on('click', function (e) {
        e.stopPropagation();
        $('.event_format .entry:eq(2)').trigger('click');
    });
    $('.event_format .entry:eq(1) .prev').on('click', function (e) {
        e.stopPropagation();
        $('.event_format .entry:eq(0)').trigger('click');
    });
    $('.event_format .entry:eq(2) .prev').on('click', function (e) {
        e.stopPropagation();
        $('.event_format .entry:eq(1)').trigger('click');
    });
});