<?php
add_shortcode( 'cities_slider', function(){
    ob_start();
    $as = get_field( 'cities', 'option' );
    if( !empty($as) ): ?>
    <div class="cities text-center">
        <div class="row gx-2 gx-sm-2 gx-lg-4 gx-xl-6 gy-2 gy-lg-6">
            <?php
            foreach ($as as $a) { ?>
                <div class="col-6 col-sm-3">
                    <div class="entry r-25 position-relative overflow-hidden">
                        <img src="<?php echo $a['img']['url']; ?>" alt="" class="thumb w-100">
                        <div class="vstack content gap-3 gap-xl-4 justify-content-end p-1 p-lg-3 align-items-center">
                            <h2 class="name mb-lg-2 lh-11 text-uppercase font-bold"><?php echo $a['name']; ?></h2>
                            <p class="flex-center gap-1"><i class="bi bi-calendar"></i><?php echo $a['date']; ?></p>
                            <div class="ho-btn w-100 font-semi-bold mb-lg-2">
                                <a class="flex-center r-25 mx-auto" href="<?php echo $a['url']; ?>">Register</a>
                            </div>
                        </div>
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