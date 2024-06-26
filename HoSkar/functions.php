<?php

define("CSS", get_template_directory_uri().'/css');

define("JS", get_template_directory_uri().'/js');

define("IMG", get_template_directory_uri().'/images');

define("EMAIL", get_template_directory().'/emails');

define("LAZY_IMG", "data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=");



global $cu; $cu = false;

if( is_user_logged_in() ) $cu = wp_get_current_user();



// 1. customize ACF path

add_filter('acf/settings/path', 'my_acf_settings_path');

function my_acf_settings_path( $path ) {

    $path = get_template_directory() . '/acf/';

    return $path;

}



// 2. customize ACF dir

add_filter('acf/settings/dir', 'my_acf_settings_dir');

function my_acf_settings_dir( $dir ) {

    $dir = get_template_directory_uri() . '/acf/';

    return $dir;

}



// 3. Hide ACF field group menu item

add_filter('acf/settings/show_admin', '__return_true');

// 4. Include ACF

include_once( get_template_directory() . '/acf/acf.php' );



function z_include( $folder ){ foreach (glob("{$folder}/*.php") as $filename){ include $filename; } } z_include( dirname(__FILE__).'/z_inc' ); z_include( dirname(__FILE__).'/shortcodes' ); 

function add_theme_scripts() {  
	wp_enqueue_style( 'fontawesome.css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css', array(), '1.1', 'all' );
    wp_enqueue_style( 'slickstyle', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css', array(), '1.1', 'all'); 
    wp_enqueue_style( 'slickthemestyle', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css', array(), '1.1', 'all'); 
    wp_enqueue_script( 'jqueryscript', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script( 'slickscript', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array ( 'jquery' ), 1.1, true);

}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

// Gallery post type
// add_theme_support('post-thumbnails');
// add_post_type_support( 'gallery', 'thumbnail' );    
// function create_posttype_gallery() {
 
//     register_post_type( 'gallery',
//     // CPT Options
//         array(
//             'labels' => array(
//                 'name' => __( 'Gallery' ),
//                 'singular_name' => __( 'Gallery' )
//             ),
//             'supports' => array(
//             'title', 
//             'thumbnail',
//             'editor',
//             'custom-fields'
//             ), 
//             'taxonomies' => array( 'category', 'post_tag',  ), 
//             'public' => true,
//             'has_archive' => true,
//             'rewrite' => array('slug' => 'gallery'),
//         )
//     );
// }
// // Hooking up our function to theme setup
// add_action( 'init', 'create_posttype_gallery' );


function load_more_posts() {
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $category = isset($_POST['category']) ? intval($_POST['category']) : '';
    $date = isset($_POST['date']) ? sanitize_text_field($_POST['date']) : '';

    $args = array(
        'post_type' => 'gallery',
        'posts_per_page' => 12,
        'paged' => $page,
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

    $posts_html = '';
    $no_more_posts = false;

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            $posts_html .= '<a class="gallery-item" href="' . get_the_post_thumbnail_url(get_the_ID(), 'full') . '" target="_blank" data-fancybox="gallery-list-'.$category.'" data-caption="' . get_the_title() . '" title="' . get_the_title() . '">';
            $posts_html .= '<img data-src="' . get_the_post_thumbnail_url(get_the_ID(), 'full') . '" src="' . get_the_post_thumbnail_url(get_the_ID(), 'full') . '" alt="' . get_the_title() . '"/>';
            $posts_html .= '</a>';
        endwhile;
        
        if ($query->post_count < 12):
            $no_more_posts = true;
        endif;
    else :
        $no_more_posts = true;
    endif;

    wp_reset_postdata();

    echo json_encode(array(
        'html' => $posts_html,
        'no_more_posts' => $no_more_posts,
    ));

    wp_die();
}
add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');

function load_more_gallery() {
    $title = sanitize_text_field($_POST['title']);
    $page = intval($_POST['page']);
    $offset = ($page - 1) * 9;
    $id = $_POST['id'];
    $html = '';
    
    if (have_rows('gallery_locations', $id)) {
        $count = 0;
        while (have_rows('gallery_locations', $id)) {
            the_row();
            $gallery = get_sub_field('images', $id);
            if ($gallery) {
                foreach ($gallery as $image) {
                    if($title == 0 || $title == '0'){
                        if ($count >= $offset && $count < $offset + 9) {
                            $html .= '<a class="gallery-item" href="' . esc_url($image['url']) . '" target="_blank" data-fancybox="mygallery">';
                            $html .= '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" />';
                            $html .= '</a>';
                        }
                        $count++;
                    }else{
                        $or_title = sanitize_title(get_sub_field('title', $id));
                        if ($or_title == $title) {
                            if ($count >= $offset && $count < $offset + 9) {
                                $html .= '<a class="gallery-item" href="' . esc_url($image['url']) . '" target="_blank" data-fancybox="mygallery">';
                                $html .= '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" />';
                                $html .= '</a>';
                            }
                            $count++;
                        }
                    }
                }
            }
        }
        if ($count <= $offset + 9) {
            $response = array('html' => $html, 'no_more_posts' => true);
        } else {
            $response = array('html' => $html);
        }
    } else {
        $response = array('html' => '', 'no_more_posts' => true);
    }

    echo json_encode($response);
    wp_die();
}

add_action('wp_ajax_load_more_gallery', 'load_more_gallery');
add_action('wp_ajax_nopriv_load_more_gallery', 'load_more_gallery');




function load_more_gallerys() {
    $title = sanitize_text_field($_POST['title']);
    $page = intval($_POST['page']);
    $location = $_POST['location'];
    $offset = ($page - 1) * 9;
    $id = $_POST['id'];
    $html = '';

    if (have_rows('tab_gallery', $id)) {
        while (have_rows('tab_gallery', $id)) {
            the_row();
            $loca = get_sub_field('title');

            if($loca == $location) {
                $count = 0;
                if (have_rows('location_gallery', $id)) {
                    while (have_rows('location_gallery', $id)) {
                        the_row();
                        $gallery = get_sub_field('image', $id);
                        if ($gallery) {
                            foreach ($gallery as $image) {
                                if($title == 0 || $title == '0'){
                                    if ($count >= $offset && $count < $offset + 9) {
                                        $html .= '<a class="gallery-item" href="' . esc_url($image['url']) . '" target="_blank" data-fancybox="mygallery">';
                                        $html .= '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" />';
                                        $html .= '</a>';
                                    }
                                    $count++;
                                }else{
                                    $or_title = sanitize_title(get_sub_field('title_location', $id));
                                    if ($or_title == $title) {
                                        if ($count >= $offset && $count < $offset + 9) {
                                            $html .= '<a class="gallery-item" href="' . esc_url($image['url']) . '" target="_blank" data-fancybox="mygallery">';
                                            $html .= '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" />';
                                            $html .= '</a>';
                                        }
                                        $count++;
                                    }
                                }
                            }
                        };
                    }
                    if ($count <= $offset + 9) {
                        $response = array('html' => $html, 'no_more_posts' => true);
                    } else {
                        $response = array('html' => $html);
                    }
                } else {
                    $response = array('html' => '', 'no_more_posts' => true);
                }
            } 
            else {
                if($title == 0 || $title == '0') {
                    if (have_rows('location_gallery', $id)) {
                        while (have_rows('location_gallery', $id)) {
                            the_row();
                            $gallery = get_sub_field('image', $id);
                            if ($gallery) {
                                foreach ($gallery as $image) {
                                    $or_title = sanitize_title(get_sub_field('title_location', $id));
                                    if ($or_title == $title) {
                                        if ($count >= $offset && $count < $offset + 9) {
                                            $html .= '<a class="gallery-item" href="' . esc_url($image['url']) . '" target="_blank" data-fancybox="mygallery">';
                                            $html .= '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" />';
                                            $html .= '</a>';
                                        }
                                        $count++;
                                    }
                                }
                            };
                        }
                        if ($count <= $offset + 9) {
                            $response = array('html' => $html, 'no_more_posts' => true);
                        } else {
                            $response = array('html' => $html);
                        }
                    } else {
                        $response = array('html' => '');
                    }
                } 
                else {
                    if($loca == $location) {
                        $count = 0;
                        if (have_rows('location_gallery', $id)) {
                            while (have_rows('location_gallery', $id)) {
                                the_row();
                                $gallery = get_sub_field('image', $id);
                                if ($gallery) {
                                    foreach ($gallery as $image) {
                                        $or_title = sanitize_title(get_sub_field('title_location', $id));
                                        if ($or_title == $title) {
                                            if ($count >= $offset && $count < $offset + 9) {
                                                $html .= '<a class="gallery-item" href="' . esc_url($image['url']) . '" target="_blank" data-fancybox="mygallery">';
                                                $html .= '<img data-in="'. $count .'" src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" />';
                                                $html .= '</a>';
                                            }
                                            $count++;
                                        }
                                    }
                                };
                            }
                            if ($count <= $offset + 9) {
                                $response = array('html' => $html, 'no_more_posts' => true);
                            } else {
                                $response = array('html' => $html);
                            }
                        } else {
                            $response = array('html' => '');
                        }
                    }
                }
            }
        }
    } else {
        $response = array('html' => '');
    }
    
    echo json_encode($response);
    wp_die();
}

add_action('wp_ajax_load_more_gallerys', 'load_more_gallerys');
add_action('wp_ajax_nopriv_load_more_gallerys', 'load_more_gallerys');


?>