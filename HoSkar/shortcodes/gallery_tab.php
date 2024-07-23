<?php

add_shortcode( 'tab_gallery', function(){

    ob_start(); 
    ?>

    <div class="gallery_page">
    <div class="heading_page">
        <h2><?php $post_id = get_the_ID();
        $title_gallery = get_field('title_gallery', $post_id);
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
                        if (have_rows('tab_gallery')) {
                            $i = 0;
                            while (have_rows('tab_gallery')) {
                                the_row();
                                $title_locations = get_sub_field('title');
                                $all_titles[] = $title_locations;
                                $i = $i +1;

                                $title = get_sub_field('title');
                                echo '<li class="tab tab-menu-link" data-content="tab-' . $i . '" data-tab="tab-' . $i. '">';
                                echo '<p class="tab_parent">'.$title.'</p>';
                                ?>
                                   
                                <?php 
                                echo '</li>'; 
                            }
                        }
                    ?>
                </ul>
                
                
                <div class="tab-content-container">
                    
                            <?php
                            if (have_rows('tab_gallery')) {
                                $i = 0;
                                while (have_rows('tab_gallery')) {
                                    the_row();
                                    $i++;
                                    
                                    ?>
                                <div id="tab-<?php echo $i; ?>" class="tab-content tab-bar-content <?php if ($i == 1) echo 'is-active'; ?>" <?php if ($i != 1) echo 'style="display:none;"'; ?>>
                                    <div class="banner_category">
                                        <h2>HCMC - HANOI - BANGKOK - PHNOM PENH - MANILA</h2>
                                        <img src="/hoskar/wp-content/uploads/2024/06/image-17.png" alt="Asia Pacific">
                                    </div>
                                    <div class="gallery-list row" id="gallery-list-<?php echo $i; ?>" data-page="1">
                                        <?php
                                        $gallery = get_sub_field('image');
                                        if ($gallery) {
                                            $total_images = count($gallery);
                                            for ($j = 0; $j < min(9, $total_images); $j++) {
                                                $image = $gallery[$j];
                                                ?>
                                                <a class="gallery-item" href="<?php echo esc_url($image['url']); ?>" target="_blank" data-fancybox="mygallery">
                                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                                </a>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="see-more-container" <?php if ($total_images <= 9) echo 'style="display:none;"'; ?>>
                                        <button class="see-more" data-tab-id="<?php echo $i; ?>">See All</button>
                                    </div>
                                </div>
                                <?php
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



    // Handle "See More" button click
        document.querySelectorAll('.see-more').forEach(function(button) {
            button.addEventListener('click', function() {
                var tabId = this.getAttribute('data-tab-id');
                var container = document.querySelector('#gallery-list-' + tabId);
                var page = parseInt(container.getAttribute('data-page')) + 1;

                var data = {
                    action: 'load_more_gallery',
                    tab_id: tabId,
                    page: page,
                    id: '<?php echo get_the_ID(); ?>'
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
                    if (data.success && data.data.html) {
                        container.insertAdjacentHTML('beforeend', data.data.html);
                        container.setAttribute('data-page', page);

                        if (data.data.no_more_posts) {
                            button.style.display = 'none';
                        }
                    } else {
                        button.style.display = 'none';
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });

    
});
</script>
<?php

    return ob_get_clean();

} ); ?>