<?php

add_shortcode( 'entrance', function(){

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
					<img decoding="async" class="image-register" width="20" src="/hoskar/wp-content/uploads/2024/05/bg_box_large.png" alt="..">
                    <span class="no_number"><?php echo $i;?></span> 
					<!-- <img decoding="async" class="image-register-2" width="20" src="/hoskar/wp-content/uploads/2024/06/Subtract-1.png" alt=".."> -->
                    <div class="slider_contents">	
                        <div class="border-title-register">
                            <h2 class="h2-register">
                                <?php the_sub_field('title'); ?>
                            </h2>
                            <p class="hoskar-register-1">
                                <?php the_sub_field('text_1'); ?>
                            </p>
                        </div>
                        <div class="box_bottom">
                            <div class="border-body-register">
                                <p class="hoskar-register-2">
                                    <?php the_sub_field('text_2'); ?>
                                </p>
                            </div>
                            <div class="hidden-border">__ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __</div>
                            <div class="border-content-register">
                                
                                <div class="hoskar-register-3">
                                    <?php the_sub_field('text_3'); ?>
                                </div>
                                <p class="hoskar-register-4">Availibility <span class="text-gradient"><?php the_sub_field('number_1'); ?></span> out of <span class="text-gradient"><?php the_sub_field('number_2'); ?></span></p>
                            </div>
                        </div>
                    </div>
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