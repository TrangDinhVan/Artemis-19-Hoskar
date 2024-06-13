<?php

add_shortcode( 'gallery_location', function(){

    ob_start(); ?>

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
                    $all_titles = [];
                    if (have_rows('gallery_location')) {
                        $i = 0;
                        var_dump($i);
                        while (have_rows('gallery_location')) {
                            the_row();
                            $i = $i +1;

                            $title = get_sub_field('title');
                            echo $title;
                                echo '<li class="tab tab-menu-link" data-content="tab-' . $i . '" data-tab="tab-' . $i. '">';
                                echo $title;
                                echo '</li>';
                            
                        }
                    }
                    ?>
                </ul>

                <div class="tab-content-container">
                    <div id="tab-0" class="tab-content tab-bar-content is-active">
                        <div class="gallery-list row" id="gallery-list-0" data-category-id="0" data-page="1">
                            <?php
                            if (have_rows('gallery_location')) {
                                $count = 0;
                                while (have_rows('gallery_location')) {
                                    the_row();
                                    if ($count >= 12) break;
                                    $image = get_sub_field('images');
                                    ?>
                                    <a class="gallery-item" href="<?php echo esc_url($image['url']); ?>" target="_blank" data-fancybox="mygallery">
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    </a>
                                    <?php
                                    $count++;
                                }
                            }
                            ?>
                        </div>
                        <div class="see-more-container">
                            <button class="see-more" data-category-id="0">See All</button>
                        </div>
                   
                    </div>
                    <?php
                    foreach ($all_titles as $title) {
                        ?>
                        <div id="tab-<?php echo sanitize_title($title); ?>" class="tab-content tab-bar-content" style="display:none;">
                            <div class="gallery-list row" id="gallery-list-<?php echo sanitize_title($title); ?>" data-category-id="<?php echo sanitize_title($title); ?>" data-page="1">
                                <?php
                                if (have_rows('gallery_location')) {
                                    $count = 0;
                                    while (have_rows('gallery_location')) {
                                        the_row();
                                        if (get_sub_field('title') == $title) {
                                            if ($count >= 12) break;
                                            $image = get_sub_field('images');
                                            ?>
                                            <a class="gallery-item" href="<?php echo esc_url($image['url']); ?>" target="_blank" data-fancybox="mygallery">
                                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                            </a>
                                            <?php
                                            $count++;
                                        }
                                    }
                                }
                                ?>
                            </div>
                            <div class="see-more-container">
                                <button class="see-more" data-category-id="<?php echo sanitize_title($title); ?>">See All</button>
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


<?php

    return ob_get_clean();

} ); ?>