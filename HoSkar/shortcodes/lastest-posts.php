<?php

add_shortcode( 'lastest_posts', function(){

    ob_start(); ?>

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
                        <div class="top">
                            <p class="date"><?php the_time('jS F, Y');?></p>
                            <div class="categorys">
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) {
                                    $category_links = array();
                                    foreach ($categories as $cat) {
                                        $category_links[] = '<a class="category" href="'. get_category_link( $cat->term_id ) .'">' . esc_html($cat->name) . '</a>';
                                    }
                                    echo implode(', ', $category_links);
                                }
                                ?>
                            </div>
                        </div>
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

    <?php

    return ob_get_clean();

} ); ?>