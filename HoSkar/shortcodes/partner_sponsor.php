<?php
add_shortcode( 'partner_and_sponsor', function(){
    ob_start();
    $as = get_field( 'partner_and_sponsor' );
    if( !empty($as) ): ?>

        <div class="partner_and_sponsor position-relative">
            <div class="partner_and_sponsor row">
                <?php
                foreach ($as as $a) { 
                    ?>
                    <div class="hosted">
                            <div class="text-center">
                                <p><?php echo $a['title'] ?></p>
                            </div>
                            <div class="logo_image">
                                <?php
                                    $gallery = $a['logo'];
                                    if ($gallery) { 
                                        foreach ($gallery as $image) { 
                                        ?>
                                            <a href="<?php if($image['link'] != "") echo esc_url($image['link']); else echo "#";?>">
                                                <img src="<?php echo esc_url($image['image']['url']); ?>" alt="<?php echo esc_attr($image['image']['alt']); ?>" />
                                            </a>
                                        <?php
                                        }
                                    }
                                ?>
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