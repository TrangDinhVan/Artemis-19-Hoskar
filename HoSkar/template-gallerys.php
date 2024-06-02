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
							<option class="category-select" value="">All Locations</option>
							<?php
							$categories = get_terms(array(
								'taxonomy' => 'category', 
								'hide_empty' => false,
							));
							foreach ($categories as $cat) {
								if ($cat->term_id == 1) {
									continue; 
								}
								echo '<option class="category-select" value="' . $cat->term_id . '" ' . selected($category, $cat->term_id, false) . '>' . $cat->name . '</option>';
							}
							?>
						</select>
					</div>
					<div class="time-gallery">
						<label for="date">Time</label>
<!-- 						<input type="date" name="date" id="date" value=""> -->
						<div class="input-date">
							<input type="month" name="date" id="date" value="<?php echo esc_attr($date); ?>"  onchange="updateHiddenField()">
							<input type="text" id="hiddenDate" value="<?php echo esc_attr($date); ?>" name="hiddenDate">
							<span class="elementor-icon-list-icon">
								<svg aria-hidden="true" id="iconButton" class="e-font-icon-svg e-far-calendar" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M400 64h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zm-6 400H54c-3.3 0-6-2.7-6-6V160h352v298c0 3.3-2.7 6-6 6z"></path></svg>							 </span>
						</div>
						
					</div>
					<div>
						<button type="submit">Filter</button>
						
					</div>
					<span class="filter-close">x</span>
				</form>
			</div>
			<?php
			if ($category_image_url) {
			    $img_class = '';
			} else {
			    $img_class = 'no_image';
			}
			?>
		    <div class="banner_category <?php echo $img_class; ?>">
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
    function updateHiddenField() {
    var datePicker = document.getElementById("date");
    var hiddenDate = document.getElementById("hiddenDate");
    var dateValue = datePicker.value;
    var yearMonth = dateValue.split("-");
    hiddenDate.value = yearMonth[1] + "/" + yearMonth[0];
}
// Lấy tham chiếu đến button và input
var iconButton = document.getElementById('iconButton');
var datePicker = document.getElementById('date');

// Thêm sự kiện click vào button
iconButton.addEventListener('click', function() {
    // Kích hoạt sự kiện click của input (giả lập)
    var event = new MouseEvent('click', {
        'view': window,
        'bubbles': true,
        'cancelable': true
    });
    datePicker.dispatchEvent(event);
});
$(document).ready(function(){
        $('#category').change(function(){
            $('.frm-gallery').submit();
        });
    });
</script>
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
