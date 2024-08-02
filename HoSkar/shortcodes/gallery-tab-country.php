<?php

add_shortcode( 'tab_gallery_country', function(){

    ob_start(); 
    ?>

    <div class="gallery_page tab_gallery_country">
    <div class="heading_page">
        <h2><?php $post_id = get_the_ID();
        $title_gallery = get_field('title_gallery2', $post_id);
            if( $title_gallery ) {
                echo $title_gallery;
            } else {
                echo 'No title gallery found.';
            } ?>
        
        </h2>
    </div>
    <div class="main">
        <div class="e-con-inner">
            <div class="tab-container">
                <ul class="tabs">
                    <?php
                        $all_titles = [];
                        $all_title = [];
                        if (have_rows('tab_gallery2')) {
                            $i = 0;
                            $j = 0;
                            while (have_rows('tab_gallery2')) {
                                the_row();
                                $title_locations = get_sub_field('title2');
                                $all_titles[] = $title_locations;
                                $i = $i +1;

                                $title = get_sub_field('title2');
                                echo '<li class="tab tab-menu-link" data-content="tab-' . $i . '" data-tab="tab-' . $i. '">';
                                echo '<p class="tab_parent">'.$title.'</p>';
                                ?>
                                    <ul class="sub_tabs">
                                        <li class="sub_tab tab-menu-link is-active" data-content="tab-0" data-tab="tab-0">All</li>
                                        <?php
                                        if (have_rows('location_gallery2')) {
                                            
                                            while (have_rows('location_gallery2')) {
                                                the_row();
                                                $j = $j +1;

                                                $title_location = get_sub_field('title_location2');
                                                $all_title[] = $title_location;
                                                echo '<li class="sub_tab tab-menu-link" data-content="tab-' . $j . '" data-tab="tab-' . $j. '">';
                                                echo $title_location;
                                                echo '</li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                <?php 
                                echo '</li>'; 
                            }
                        }
                    ?>
                </ul>
                
                <div class="banner_category">
                    <h2>Good Vibes Only!</h2>
                    <img src="/hoskar/wp-content/uploads/2024/06/image-17.png" alt="Asia Pacific">
                </div>
                <div class="tab-content-container">
                    
                            <?php
                            if (have_rows('tab_gallery2')) {
                                while (have_rows('tab_gallery2')) {
                                    the_row();
                                    $total_images = 0;
                                    ?>
                                <div id="tab-0" class="tab-content tab-bar-content <?php if (get_sub_field('title2') =='Networking') echo 'is-active'; ?> <?php echo get_sub_field('title2'); ?>" <?php if (get_sub_field('title2') != 'Networking') echo 'style="display:none;"'; ?>>
                                    <div class="gallery-list row" id="gallery-list-0" data-category-id="0" data-title_location="<?php echo sanitize_title(get_sub_field('title2')); ?>" data-location-id="<?php echo get_sub_field('title2'); ?>" data-title-id="<?php echo sanitize_title(get_sub_field('title2')); ?>" data-page="1">
                                    <?php
                                    if (have_rows('location_gallery2')) {

                                        $images = [];
                                        while (have_rows('location_gallery2')) {
                                            the_row();
                                            $gallery = get_sub_field('image2');
                                            if ($gallery) {
                                                foreach ($gallery as $image) {   
                                                    $images[] = $image;
                                                }
                                            }
                                        }

                                        shuffle($images);
                                        $first_images = [];
                                        $count = 0;
                                        foreach ($images as $image) {
                                            $total_images++;
                                            if ($count < 9) {
                                                $first_images[] = $image['url'];
                                                ?>
                                                <a class="gallery-item" href="<?php echo esc_url($image['url']); ?>" target="_blank" data-fancybox="mygallery">
                                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                                </a>
                                                <?php
                                                $count++;
                                            }
                                        }

                                        
                                    
                                    }?>
                                    </div>
                                    <div class="see-more-container" <?php if ($total_images <= 9) echo 'style="display:none;"'; ?>>
                                        <button class="see-more" data-category-id="0" data-location-id="<?php echo get_sub_field('title2'); ?>" data-title_location="<?php echo sanitize_title(get_sub_field('title2')); ?>" data-title-id="<?php echo sanitize_title(get_sub_field('title2')); ?>">See More</button>
                                    </div>
                               
                                </div>
                                <?php
                                }
                            }
                            ?>
                <?php
                $tab_gallery = get_field('tab_gallery2');
                $title_location_count = array();

                if ($tab_gallery && is_array($tab_gallery)) {
                    $stt = 0;

                    foreach ($tab_gallery as $gallery) {
                        if (isset($gallery['location_gallery2']) && is_array($gallery['location_gallery2'])) {
                            foreach ($gallery['location_gallery2'] as $location) {
                                $count = 0;
                                $stt++;

                                if (isset($location['title_location2'])) {
                                    $title_location = $location['title_location2'];

                                    if (isset($title_location_count[$title_location])) {
                                        $title_location_count[$title_location]++;
                                    } else {
                                        $title_location_count[$title_location] = 1;
                                    }

                                    ?>
                                    <div id="tab-<?php echo sanitize_title($stt); ?>" class="tab-content tab-bar-content" style="display:none;">
                                        <div class="gallery-list row" id="gallery-list-<?php echo sanitize_title($stt); ?>" data-title_location="<?php echo sanitize_title($title_location)?>-<?php echo $title_location_count[$title_location]; ?>" data-title-id="<?php echo sanitize_title($title_location); ?>" data-category-id="<?php echo sanitize_title($title_location); ?>" data-page="1">

                                    <?php
                                    if (isset($location['image2']) && is_array($location['image2'])) {
                                        $total_images = 0;

                                        foreach ($location['image2'] as $image) {  
                                            $total_images++;  
                                            if ($count < 9) {                                    
                                            ?>
                                                <a class="gallery-item" href="<?php echo esc_url($image['url']); ?>" target="_blank" data-fancybox="mygallery">
                                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                                </a>
                                            <?php
                                            $count++;
                                            }                                    
                                        }
                                    }?>
                                        </div>
                                         <div class="see-more-container" <?php if ($total_images <= 9) echo 'style="display:none;"'; ?>>
                                            <button class="see-more" data-category-id="<?php echo sanitize_title($title_location); ?>" data-title_location="<?php echo sanitize_title($title_location)?>-<?php echo $title_location_count[$title_location]; ?>" data-location-id="<?php echo $gallery['title2']; ?>" data-title-id="<?php echo sanitize_title($title_location); ?>">See All</button>
                                        </div>
                                    </div>
                                <?php
                                }
                            }
                        }
                    }
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
    document.querySelectorAll('.sub_tab').forEach(function(tab) {
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
            var titleId = this.getAttribute('data-title_location');
            var locationId = this.getAttribute('data-location-id');
            var container = document.querySelector('.gallery-list[data-title_location="' + titleId + '"]');
            var page = parseInt(container.getAttribute('data-page')) + 1;

            var data = {
                action: 'load_more_gallerys',
                title: categoryId,
                location: locationId,
                page: page,
                id: '<?php echo get_the_ID();?>',
                first_images: '<?php echo json_encode($first_images)?>'
            };
            console.log(data);

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
                    console.log(data,'data')
                    if(data.no_more_posts == true){
                        button.style.display = 'none';
                    }
                } else {
                    button.style.display = 'none';
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });


    //Tabs Action
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

        // tabLink.forEach((item) => {
        //     item.classList.remove("is-active");
        // });

        document.querySelector("#" + content).classList.add("is-active");
        btnTarget.classList.add("is-active");
    }
});
</script>
<?php

    return ob_get_clean();

} ); ?>