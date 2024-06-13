<?php
add_shortcode( 'intro_hero', function(){
    ob_start(); ?>
    <div class="intro-hero flex-center position-relative text-white lh-10">
        <img src="<?php echo IMG; ?>/PC-optimize.gif" srcc="<?php echo LAZY_IMG; ?>" alt="..." class="d-none d-sm-block intro mx-auto transition">
        <img src="<?php echo IMG; ?>/Phone.gif" srcc="<?php echo LAZY_IMG; ?>" alt="..." class="d-block d-sm-none intro mx-auto transition">
        <div class="e5 font-medium text-center w-100 overflow-hidden transition">
            <div class="swiper-wrapper mb-5 mb-sm-3 e55">
                <div class="swiper-slide">
                    <img class="mx-auto" src="<?php echo IMG; ?>/1c.gif" alt="...">
                    <h2>Grow Your Connections</h2>
                </div>
                <div class="swiper-slide">
                    <img class="mx-auto" src="<?php echo IMG; ?>/2c.gif" alt="...">
                    <h2>Grow Your Brand</h2>
                </div>
                <div class="swiper-slide">
                    <img class="mx-auto" src="<?php echo IMG; ?>/3c.gif" alt="...">
                    <h2>Grow Your Ideas</h2>
                </div>
                <div class="swiper-slide">
                    <img class="mx-auto" src="<?php echo IMG; ?>/4c.gif" alt="...">
                    <h2>Grow Your Business</h2>
                </div>
                <div class="swiper-slide">
                    <img class="mx-auto" src="<?php echo IMG; ?>/5c.gif" alt="...">
                    <h2>Grow Your Influence</h2>
                </div>
            </div>
            <div class="d-flex flex-wrap flex-sm-no-wrap gap-6 align-items-center hh">
                <div class="vstack gap-2 e50">
                    <h4 class="font-regular tag-line">Neworking <span>Redefined</span></h4>
                </div>
                <div class="controls e55 d-flex justify-content-center jsutify-content-sm-end gap-2 ms-sm-auto">
                    <img width="50" src="<?php echo IMG; ?>/CaretRight.svg" alt="Prev" class="zflip cursor-pointer prev">
                    <img width="50" src="<?php echo IMG; ?>/CaretRight.svg" alt="Next" class="cursor-pointer next">
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        jQuery(function($){
            $(window).on('load', function(){
                ss = new Swiper('.e5', {
                    loop: true,
                    effect: "fade",
                    speed: 400,
                    navigation: {
                        nextEl: '.next',
                        prevEl: '.prev',
                    }
                });
                let time = 4000;
                if( $(window).width() < 768 ) time = 3600;
                $('.intro').addClass('active');
                setTimeout(() => {
                    $('.e5, .e55').addClass('active');
                    $('.intro').removeClass('d-block d-sm-block').fadeOut();
                }, time);
            });
        });
    </script>
    <?php
    return ob_get_clean();
} ); ?>