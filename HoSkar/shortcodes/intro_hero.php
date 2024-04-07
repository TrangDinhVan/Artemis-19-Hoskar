<?php
add_shortcode( 'intro_hero', function(){
    ob_start(); ?>
    <div class="intro-hero position-relative text-white text-nowrap lh-10">
        <img data-src="<?php echo IMG; ?>/final.gif" src="<?php echo LAZY_IMG; ?>" alt="" class="intro mx-auto">
        <div class="e5">
            <div class="inner flex-center h-100 w-100 position-relative">
                <img src="<?php echo IMG; ?>/1c.gif" alt="" class="in active">
                <img src="<?php echo IMG; ?>/2c.gif" alt="" class="in intro-0">
                <img src="<?php echo IMG; ?>/3c.gif" alt="" class="in intro-1">
                <img src="<?php echo IMG; ?>/4c.gif" alt="" class="in intro-2">
                <img src="<?php echo IMG; ?>/5c.gif" alt="" class="in intro-3">
            </div>
        </div>
        <div class="t5 font-medium text-center w-100 overflow-hidden transition">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <h2>Grow Your Connection</h2>
                </div>
                <div class="swiper-slide">
                    <h2>Share & Connect</h2>
                </div>
                <div class="swiper-slide">
                    <h2>Hospitality</h2>
                </div>
                <div class="swiper-slide">
                    <h2>Ideas</h2>
                </div>
                <div class="swiper-slide">
                    <h2>Professionals</h2>
                </div>
            </div>
        </div>
        <div class="d5 w-100 transition font-bold">
            <div class="d-flex gap-4 align-items-center">
                <div class="vstack gap-2">
                    <h4 class="font-regular">Neworking Redefined</h4>
                    <h3>Hospitality & Real Estate</h3>
                </div>
                <div class="controls hstack gap-2 ms-auto">
                    <img width="50" src="<?php echo IMG; ?>/CaretRight.svg" alt="Prev" class="zflip">
                    <img width="50" src="<?php echo IMG; ?>/CaretRight.svg" alt="Next">
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        jQuery(function($){
            let intro = new Vue({
                el: '.intro-hero',
                data: {

                },
                methods: {

                },
                mounted: function(){
                }
            });
            let ss;
            $(window).on('load', function(){
                ss = new Swiper('.t5', {
                    loop: true,
                    slidesPerView: 1,
                    speed: 400,
                    noSwiping: true,
                    noSwipingClass: 'swiper-slide',
                    navigation: {
                        nextEl: '.next',
                        prevEl: '.prev',
                    }
                });
                src = $('.intro').data('src');
                $('.intro').attr('src', src);
                setTimeout(() => {
                    $('.intro').fadeOut();
                    $('.e5').fadeIn();
                    $('.t5').addClass('active');
                    $('.d5').addClass('active');
                }, 2400);
            });
            $('.in').on('click', function(e){
                var t = $(this);
                var p = $('.in.active');
                $('.in').not(t).removeClass('active');
                t.addClass('active');
                if( t.hasClass('intro-0') ){
                    t.removeClass('intro-0');
                    p.addClass('intro-0');
                }
                if( t.hasClass('intro-1') ){
                    t.removeClass('intro-1');
                    p.addClass('intro-1');
                }
                if( t.hasClass('intro-2') ){
                    t.removeClass('intro-2');
                    p.addClass('intro-2');
                }
                if( t.hasClass('intro-3') ){
                    t.removeClass('intro-3');
                    p.addClass('intro-3');
                }
                ss.slideTo(t.index());
            });
        });
    </script>
    <?php
    return ob_get_clean();
} ); ?>