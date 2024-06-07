<?php

add_shortcode( 'gallery_registration', function(){

    ob_start(); 
    $page_id = get_queried_object_id();
    ?>


    <div class="gallery_registration <?php echo $page_id; ?>">
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
            <a href="/hoskar/gallery">
                <img src="<?php echo $image; ?>" alt="Image" />
            </a>
        </div>
    <?php endwhile; ?>
    </div>
<?php endif; ?>
           
            
    </div>
<?php
return ob_get_clean();

} ); ?>