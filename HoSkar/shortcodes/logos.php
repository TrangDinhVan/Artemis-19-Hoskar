<?php
add_shortcode( 'logos', 'logos' );
function logos(){
    ob_start();
    $as = get_field( 'logos' );
    if( empty($as) ) $as = get_field( 'logos', 15 );
    if( !empty($as) ): ?>
        <div class="logos">
            <div class="zslide logos-slider overflow-hidden">
                <div class="swiper-wrapper">
                    <?php
                    for ( $i = 0; $i < 12; $i++ ) {
                        if( isset($as[$i]) ):
                            $a = $as[$i]; ?>
                            <div class="swiper-slide h-auto">
                                <div class="flex-center borderr p-22 rounded h-100">
                                    <img class="mx-auto" src="<?php echo $a['url']; ?>" alt="Logo">
                                </div>
                            </div>
                        <?php
                        endif;
                    } ?>
                </div>
            </div>
        </div>
    <?php
    endif;
    if( isset($as[3]) ): ?>
        <div class="logos pt-3 pt-lg-5">
            <div class="zslide logos-slider-2 overflow-hidden">
                <div class="swiper-wrapper">
                    <?php
                    for ( $i = 1; $i < count($as); $i++ ) {
                        $a = $as[$i]; ?>
                        <div class="swiper-slide h-auto">
                            <div class="flex-center borderr p-22 rounded h-100">
                                <img class="mx-auto" src="<?php echo $a['url']; ?>" alt="Logo">
                            </div>
                        </div>
                    <?php
                    } ?>
                </div>
            </div>
        </div>
    <?php
    endif;
    return ob_get_clean();
} ?>