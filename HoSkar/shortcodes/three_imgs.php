<?php
add_shortcode( 'three_imgs', function(){
    ob_start();
    $as = get_field( 'gallery' );
    if( !empty($as) ): ?>
        <div class="three_imgs">
            <?php
            for ($i=0; $i < 3; $i++) {
                if( isset($as[$i]) ):
                    $a = $as[$i]; ?>
                    <a class="d-block img m<?php echo ($i + 1); ?>" href="<?php echo home_url( 'gallery/' ); ?>">
                        <img src="<?php echo $a['url']; ?>" alt="...">
                    </a>
                <?php
                endif;
            } ?>
        </div>
    <?php
    endif;
    return ob_get_clean();
} ); ?>