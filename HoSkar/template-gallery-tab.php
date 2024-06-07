<?php
/* Template Name: Gallery Page */

get_header();
?>

<div class="gallery_page">
    <div class="heading_page">
        <h2>Gallery</h2>
    </div>
    <div class="main">
        <div class="e-con-inner">
            <div class="tab-container">
                <ul class="tabs">
                    <li class="tab tab-menu-link is-active" data-content="tab-0" data-tab="tab-0">All locations</li>
                    <?php
                    $categories = get_terms(array(
                        'taxonomy' => 'category',
                        'hide_empty' => false,
                    ));
                    foreach ($categories as $index => $category) {
                        echo '<li class="tab tab-menu-link" data-content="tab-' . $category->term_id . '" data-tab="tab-' . $category->term_id . '">';
                        echo $category->name;
                        echo '</li>';
                    }
                    ?>
                </ul>

                <div class="tab-content-container">
                    <div id="tab-0" class="tab-content tab-bar-content is-active">
                        <div class="gallery-list row" id="gallery-list-0" data-category-id="0" data-page="1">
                            <?php
                            $args = array(
                                'post_type' => 'gallery',
                                'posts_per_page' => 9,
                            );
                            $query = new WP_Query($args);
                            if ($query->have_posts()) :
                                while ($query->have_posts()) : $query->the_post();
                                    ?>
                                    <a class="gallery-item" href="<?php the_post_thumbnail_url('full'); ?>" target="_blank">
                                        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>" />
                                    </a>
                                    <?php
                                endwhile;
                            else :
                                echo '<p class="no_image_gallery">No images found.</p>';
                            endif;
                            wp_reset_postdata();
                            ?>
                        </div>
                        <div class="see-more-container">
                            <button class="see-more" data-category-id="0">See All</button>
                        </div>
                   
                    </div>
                    <?php
                    foreach ($categories as $category) {
                        ?>
                        <div id="tab-<?php echo $category->term_id; ?>" class="tab-content tab-bar-content" style="display:none;">
                            <div class="gallery-list row" id="gallery-list-<?php echo $category->term_id; ?>" data-category-id="<?php echo $category->term_id; ?>" data-page="1">
                                <?php
                                $args = array(
                                    'post_type' => 'gallery',
                                    'posts_per_page' => 9,
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'category',
                                            'field'    => 'term_id',
                                            'terms'    => $category->term_id,
                                        ),
                                    ),
                                );
                                $query = new WP_Query($args);
                                if ($query->have_posts()) :
                                    while ($query->have_posts()) : $query->the_post();
                                        ?>
                                        <a class="gallery-item" href="<?php the_post_thumbnail_url('full'); ?>" target="_blank">
                                            <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>" />
                                        </a>
                                        <?php
                                    endwhile;
                                else :
                                    echo '<p class="no_image_gallery">No images found.</p>';
                                endif;
                                wp_reset_postdata();
                                ?>
                            </div>
                            <div class="see-more-container">
                                <button class="see-more" data-category-id="<?php echo $category->term_id; ?>">See All</button>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Show the first tab content by default
    document.querySelector('.tab-content.is-active').style.display = 'block';

    // Handle tab click
    document.querySelectorAll('.tab').forEach(function(tab) {
        tab.addEventListener('click', function() {
            var tabId = this.getAttribute('data-tab');

            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(function(content) {
                content.style.display = 'none';
                content.classList.remove('is-active');
            });

            // Show clicked tab content
            document.getElementById(tabId).style.display = 'block';
            document.getElementById(tabId).classList.add('is-active');
        });
    });

    // Handle "See More" button click
    document.querySelectorAll('.see-more').forEach(function(button) {
        button.addEventListener('click', function() {
            var categoryId = this.getAttribute('data-category-id');
            var container = document.querySelector('.gallery-list[data-category-id="' + categoryId + '"]');
            var page = parseInt(container.getAttribute('data-page')) + 1;

            var data = {
                action: 'load_more_gallery',
                category: categoryId,
                page: page
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
                    container.insertAdjacentHTML('beforeend', data.html);
                    container.setAttribute('data-page', page);
                } else {
                    button.style.display = 'none';
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

    // Hide "See More" buttons if there are less than 9 posts
    document.querySelectorAll('.see-more').forEach(function(button) {
        var category = button.getAttribute('data-category-id');
        var container = document.getElementById('gallery-list-' + category);
        if (container && container.children.length < 9) {
            button.style.display = 'none';
        }
    });

    // Tabs Action
    const tabLink = document.querySelectorAll(".tab-menu-link");
    const tabContent = document.querySelectorAll(".tab-bar-content");

    tabLink.forEach((item) => {
        item.addEventListener("click", activeTab);
    });

    function activeTab(item) {
        const btnTarget = item.currentTarget;
        const content = btnTarget.dataset.content;

        tabContent.forEach((item) => {
            item.classList.remove("is-active");
        });

        tabLink.forEach((item) => {
            item.classList.remove("is-active");
        });

        document.querySelector("#" + content).classList.add("is-active");
        btnTarget.classList.add("is-active");
    }
});
</script>

<?php get_footer(); ?>
