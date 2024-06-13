<?php

add_shortcode( 'sponsor_benefits', function(){

    ob_start(); ?>
<div class="slider">
    <?php if( have_rows('sponsor_benefits') ):
        $i = 0;
    ?>
        <div class="sponsor_benefits sponsor_benefits_slider testimonials">
            <?php while( have_rows('sponsor_benefits') ): the_row(); 
                $i = $i + 1;
            ?> 
            <label class="e item" for="t-<?php echo $i;?>">

                <img src="<?php the_sub_field('icon'); ?>" style="height: 50px;" alt=".." class="icon">

                <h4><?php the_sub_field('title'); ?></h4>

                <div class="desc lh-13 vstack gap-3">
                    <?php the_sub_field('descriptions'); ?>                   
                </div>

            </label>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>

</div>

    <?php

    return ob_get_clean();

} ); ?>