<?php

get_header();

if( have_posts() ):

    while( have_posts() ): the_post(); ?>
    <div class="post_page">
        <div class="e-con-inner">
            
            
            <h2><?php the_title();?></h2>
            <p class="date"><img decoding="async" width="20" src="<?php echo IMG; ?>/CalendarBlank.svg" alt=".."><?php the_time('jS F, Y');?></p>
            <div class="featured_img">
                <img src="<?php echo get_the_post_thumbnail_url($post_id, ''); ?>" alt="<?php the_title();?>" />
            </div>
            <div class="content">
                <?php the_content(); ?>
            </div>
            <div class="more_post blog_list row">
                <h3>Read more</h3>
                
                <?php
                    $id = get_the_ID();
                    $new_query = new WP_Query(array('post_type'=>'post','posts_per_page'=>6,'order' => 'desc','post__not_in' => array($id) ));
                    while($new_query->have_posts()) : $new_query->the_post();
                ?>  
                    <div class="blog-item col-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="img">
                        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="Blog" />
                    </div>
                    <div class="infor">
                        <p class="date"><?php the_time('jS F, Y');?></p>
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <p>
                            <?php if (has_excerpt()) {
                                echo wp_trim_words( get_the_excerpt(), 30, '...' ); 
                            }
                            else{
                                echo wp_trim_words( get_the_content(), 30, '...' ); 
                            }                                                
                            ?>
                        </p>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </div>    
        
<?php 
    endwhile;

endif;


get_footer(); ?>