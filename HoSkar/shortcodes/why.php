<?php
add_shortcode( 'why', function(){
    ob_start();
    $as = get_field( 'features' );
    if( !empty($as) ): ?>
    <div class="features vstack gap-3 gap-lg-6">
        <?php
        foreach ($as as $a) { ?>
            <div class="entry transition">
                <div class="row gy-6 align-items-center">
                    <div class="col-sm">
                        <h2 class="hh lh-10 font-bold transition"><?php echo $a['title']; ?></h2>
                    </div>
                    <div class="col-sm">
                        <p class="transition"><?php echo $a['desc']; ?></p>
                    </div>
                    <div class="col-sm">
                        <img src="<?php echo $a['img']['url']; ?>" alt=".." class="thumb transition">
                    </div>
                </div>
            </div>
        <?php
        } ?>
    </div>
    <?php
    endif;
    return ob_get_clean();
} ) ?>