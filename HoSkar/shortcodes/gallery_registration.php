<?php

add_shortcode( 'gallery_registration', function(){

    ob_start(); ?>


    <div class="gallery_registration">
            <?php if( have_rows('gallery_registration') ): ?>
    <div class="gallerys">
    <?php while( have_rows('gallery_registration') ): the_row(); 
        $image = get_sub_field('image');
        $pos = get_sub_field('position');
        if ($pos == 'Trái Trên') {
            $class = 'lef_top';
        } else if ($pos == 'Trái Giữa') {
            $class = 'lef_center';
        }else if ($pos == 'Trái Dưới') {
            $class = 'lef_bottom';
        }else if ($pos == 'Phải Trên') {
            $class = 'right_top';
        }else if ($pos == 'Phải Giữa') {
            $class = 'right_center';
        }else{
            $class = 'right_bottom';
        }
        ?>

        <div class="item position_<?php echo $class; ?>">
            <img src="<?php echo $image; ?>" alt="Image" />
        </div>
    <?php endwhile; ?>
    </div>
<?php endif; ?>
           
            
    </div>
<?php
return ob_get_clean();

} ); ?>