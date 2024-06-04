<?php

add_shortcode( 'entrance', function(){

    ob_start(); ?>
<div class="js-angle-slider">
  <div class="js-angle-slider__body">

    <div class="js-angle-slider__list" data-slide-angle="12" data-show="7" data-speed="400" data-drag-speed-ratio="0.1" data-dots="true">
        <?php if( have_rows('extrance') ): ?>
            <?php while( have_rows('extrance') ): the_row(); ?>
                <div class="js-angle-slider__item gradient-border register">
					<img decoding="async" class="image-register" width="20" src="/hoskar/wp-content/uploads/2024/05/bg_box_large.png" alt="..">
                    <div class="slider_contents">						
                        <div class="border-title-register">
                            <h2 class="h2-register">
                                <?php the_sub_field('title'); ?>
                            </h2>
                            <p class="hoskar-register-1">
                                <?php the_sub_field('text_1'); ?>
                            </p>
                        </div>
                        <div class="border-body-register">
                            <p class="hoskar-register-2">
                                <?php the_sub_field('text_2'); ?>
                            </p>
                        </div>
                        <div class="border-content-register">
                            <div class="hidden-border">__ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __</div>
                            <p class="hoskar-register-3">
                                <?php the_sub_field('text_3'); ?>
                            </p>
                            <p class="hoskar-register-4">Availibility <span class="text-gradient"><?php the_sub_field('number_1'); ?></span> out of <span class="text-gradient"><?php the_sub_field('number_2'); ?></span></p>
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