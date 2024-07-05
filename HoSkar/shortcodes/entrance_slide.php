<?php

add_shortcode( 'entrance_slide', function(){

    ob_start(); ?>
<div class="js-angle-slider">
  <div class="js-angle-slider__body">

    <div class="js-angle-slider__list" data-slide-angle="12" data-show="7" data-speed="400" data-drag-speed-ratio="0.1" data-dots="true">
        <?php if( have_rows('extrance') ): 
            $i = 0;
            ?>
            <?php while( have_rows('extrance') ): the_row(); 
                $i = $i + 1;?>
                <div class="js-angle-slider__item gradient-border register">
					<img decoding="async" class="image-bg" src="<?php the_sub_field('image'); ?>" alt="<?php echo $i;?>">
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        

    </div>
	  <div class="paginator text-color text-center">
		<ul>
			<li class="prev"></li>
			<li class="next"></li>
		</ul>
	</div>
  </div>
</div>
    

    <?php

    return ob_get_clean();

} ); ?>