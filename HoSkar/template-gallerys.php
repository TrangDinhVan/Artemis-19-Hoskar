<?php
/*
Template Name: Gallerys Page
*/

get_header(); ?>

<div class="gallery_page">
	<?php the_content(); ?>
    <div class="heading_page">
        <div class="e-con-inner">
            <h2>Gallery</h2>
        </div>
    </div>
	<?php

	$default_category_id = 6;
	$category = isset($_GET['category']) ? $_GET['category'] : $default_category_id;
	$date = isset($_GET['date']) ? $_GET['date'] : '';
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;


	$args = array(
	    'post_type' => 'gallery',
	    'posts_per_page' => 12,
	    'paged' => $paged,
	);

	if ($category) {
	    $args['tax_query'] = array(
	        array(
	            'taxonomy' => 'category',
	            'field'    => 'id',
	            'terms'    => $category,
	        ),
	    );
	}

	if ($date) {
	    $args['date_query'] = array(
	        array(
	            'after'     => $date,
	            'inclusive' => true,
	        ),
	    );
	}

	$query = new WP_Query($args);

	$category_term = get_term($category, 'category');
	$category_name = $category_term->name;
	$category_image_url = z_taxonomy_image_url($category_term->term_id);

	?>

	<div class="main">
		<div class="e-con-inner">
		    <div class="filter-gallery">
				<form method="GET" action="" class="frm-gallery">
					<div class="location-gallery">
						<label for="category">Location</label>
						<select name="category" id="category">
							<option value="">All Locations</option>
							<?php
							$categories = get_terms(array(
								'taxonomy' => 'category', 
								'hide_empty' => false,
							));
							foreach ($categories as $cat) {
								if ($cat->term_id == 1) {
									continue; 
								}
								echo '<option value="' . $cat->term_id . '" ' . selected($category, $cat->term_id, false) . '>' . $cat->name . '</option>';
							}
							?>
						</select>
					</div>
					<div class="time-gallery">
						<label for="date">Time</label>
						<input type="date" name="date" id="date" value="<?php echo esc_attr($date); ?>">
					</div>
					<div>
						<button type="submit">Filter</button>
						
					</div>
					<span class="filter-close">x</span>
				</form>
			</div>
		    <div class="banner_category">
		        <h2><?php echo esc_html($category_name); ?></h2>
		        <?php if ($date): ?>
		                <p class="date"><img decoding="async" class="icon-image-date" width="20" src="https://samuelw41.sg-host.com/hoskar/wp-content/themes/HoSkar/images/CalendarBlank.svg" alt=".."><?php echo esc_html($date); ?></p>
		            <?php endif; ?>
		        <?php if ($category_image_url): ?>
		            <img src="<?php echo esc_url($category_image_url); ?>" alt="<?php echo esc_attr($category_name); ?>">
		        <?php endif; ?>
		    </div>
		    <?php if ($query->have_posts()) : ?>
	            <div class="gallery-list row" id="gallery-list">
	                <?php while ($query->have_posts()) : $query->the_post(); ?>
	                    <a class="gallery-item" href="<?php the_post_thumbnail_url('full'); ?>" target="_blank">
	                        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>" />
	                    </a>
	                <?php endwhile; ?>
	            </div>

	            <?php if ($query->post_count == 12) : ?>
	                <div class="see-more-container">
	                    <button id="see-more" data-page="1" data-category="<?php echo esc_attr($category); ?>" data-date="<?php echo esc_attr($date); ?>">See More</button>
	                </div>
	            <?php endif; ?>
	        <?php else : ?>
	            <p>No posts found.</p>
	        <?php endif; ?>

		    <?php wp_reset_postdata(); ?>
		</div>    
	</div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    let seeMoreButton = document.getElementById('see-more');

    seeMoreButton.addEventListener('click', function() {
        let page = parseInt(this.getAttribute('data-page')) + 1;
        let category = this.getAttribute('data-category');
        let date = this.getAttribute('data-date');

        let data = {
            action: 'load_more_posts',
            page: page,
            category: category,
            date: date,
        };

        fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams(data),
        })
        .then(response => response.json())
        .then(data => {
            if (data.html) {
                document.getElementById('gallery-list').insertAdjacentHTML('beforeend', data.html);
                seeMoreButton.setAttribute('data-page', page);

                if (data.no_more_posts) {
                    seeMoreButton.style.display = 'none';
                }
            } else {
                seeMoreButton.style.display = 'none';
            }
        })
        .catch(error => console.error('Error:', error));
    });

    // Check if initial posts are less than 12 to hide "See More" button
    if (document.querySelectorAll('.gallery-item').length < 12) {
        seeMoreButton.style.display = 'none';
    }
});
</script>

<?php get_footer(); ?>
