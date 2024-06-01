<?php
add_shortcode( 'cities_slider', function(){
    ob_start();
    $as = get_field( 'cities', 'option' );
    if( !empty($as) ): ?>
    <div class="cities zslide position-relative overflow-hidden">
        <div class="swiper-wrapper">
            <?php
            foreach ($as as $a) { ?>
                <div class="swiper-slide">
                    <div class="entry">
                        <h2 class="name text-uppercase font-bold"><a href="<?php echo $a['url']; ?>"><?php echo $a['name']; ?></a></h2>
                    </div>
                </div>
            <?php
            } ?>
        </div>
    </div>
    <?php
    endif;
    return ob_get_clean();
} ); ?>