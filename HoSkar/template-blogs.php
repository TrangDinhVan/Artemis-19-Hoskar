<?php
/*
 Template Name: Blogs template
 */
 get_header(); ?>
<div class="blog-page">
	<?php the_content(); ?>
	<div class="heading_page">
		<div class="e-con-inner">
			<h2>Blog</h2>
			<div class="div_heading">
				<h3>Latest</h3>
				<p class="btn-rainbow"><span class="elementor-heading-title">News</span></p>
			</div>
		</div>
	</div>
	
		<?php
			$posts_per_page = 20;
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        	$offset = ($paged - 1) * $posts_per_page;
			
			$args = array(
				'order' => 'desc',
				'post_type'=>'post',
	            'posts_per_page' => $posts_per_page,
	            'paged' => $paged,
	            'offset' => $offset,
	        );

			$query = new WP_Query($args);

        if ($query->have_posts()) :
            $count = 0;
            $posts = $query->posts;
            $total_posts = count($posts); ?>
	<div class="slider-arrow-blog">
            <div class="blog_slider">
            <?php for ($i = 0; $i < 5; $i++) :
                $post = $posts[$i];
                setup_postdata($post);
        	?>
        	
<!-- 				<div class="blog-item" style="background-image: url('<?php //the_post_thumbnail_url('full'); ?>');"> -->
				<div class="blog-item">
					
					<?php if ( has_post_thumbnail() ) : ?>
					    <a href="<?php the_permalink(); ?>">
					        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="Blog" />
					    </a>
					<?php else : ?>
					    <a href="<?php the_permalink(); ?>">
					        <img src="<?php echo get_template_directory_uri(); ?>/images/default-featured-image.jpg" alt="Default Image" />
					    </a>
					<?php endif; ?>
					
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
			
			<?php
				endfor;
	        ?>
			
	    </div>
		<div class="paginator text-color text-center">
				<ul>
					<li class="prev slick-arrow slick-disabled" aria-disabled="true" style=""></li>
					<li class="next slick-arrow" aria-disabled="false" style=""></li>
				</ul>
			</div>
				
	</div>
		<div class="blog_list">
			<div class="e-con-inner row">
				<?php for ($i = 5; $i < $total_posts; $i++) :
		                $post = $posts[$i];
		                setup_postdata($post);
		        ?>
				<div class="blog-item col-12 col-sm-6 col-md-4 col-lg-4">
					<div class="img">
						<?php if ( has_post_thumbnail() ) : ?>
						    <a href="<?php the_permalink(); ?>">
						        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="Blog" />
						    </a>
						<?php else : ?>
						    <a href="<?php the_permalink(); ?>">
						        <img src="<?php echo get_template_directory_uri(); ?>/images/default-featured-image.jpg" alt="Default Image" />
						    </a>
						<?php endif; ?>
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
						<p class="des">
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
				<?php
					endfor;
				?>
			</div>
		</div>
		<?php
            
            // Phân trang
            $total_pages = $query->max_num_pages;
			if ($total_pages > 1) {
			    echo '<div class="pagination">';
			    echo paginate_links(array(
			        'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
			        'format' => '?paged=%#%',
			        'current' => max(1, get_query_var('paged')),
			        'total' => $total_pages,
			        'prev_text' => __('&laquo; Prev'),
			        'next_text' => __('Next &raquo;'),
			    ));
			    echo '</div>';
			}

            wp_reset_postdata();
        endif;
        ?>
</div>



<?php get_footer(); ?>