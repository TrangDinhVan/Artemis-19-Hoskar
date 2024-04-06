<?php
add_shortcode( 'intro_hero', function(){
    ob_start(); ?>
    <div class="intro-hero position-relative">
        <img src="<?php echo IMG; ?>/final.gif" alt="" class="intro-0 mx-auto">
        <div class="e5">
            <img src="<?php echo IMG; ?>/1.gif" alt="" class="intro-1 active">
            <img src="<?php echo IMG; ?>/2.gif" alt="" class="intro-2">
            <img src="<?php echo IMG; ?>/3.gif" alt="" class="intro-3">
            <img src="<?php echo IMG; ?>/4.gif" alt="" class="intro-4">
            <img src="<?php echo IMG; ?>/5.gif" alt="" class="intro-5">
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
                    setTimeout(() => {
                        $('.intro-0').fadeOut('fast');
                        $('.e5').fadeIn('fast');
                    }, 2000);
                }
            });
        });
    </script>
    <?php
    return ob_get_clean();
} ); ?>