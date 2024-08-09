<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

function zing_setup() {
    load_theme_textdomain( 'zing', get_template_directory() . '/languages' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( get_option( 'thumbnail_size_w' ), get_option( 'thumbnail_size_h' ), true );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption') );
    add_image_size('zmedium', get_option( 'medium_size_w' ), get_option( 'medium_size_h' ), true );
    add_image_size('zlarge', get_option( 'large_size_w' ), get_option( 'medium_size_h' ), true );
    register_nav_menus(array(
        'primary' => __('Primary', 'zing')
    ));
}
add_action( 'after_setup_theme', 'zing_setup' );

add_filter('big_image_size_threshold', '__return_false');

function zing_custom_img_sizes($sizes) {
    unset($sizes['medium']);
    unset($sizes['large']);
    unset($sizes['medium_large']); // disable 768px size images
	unset($sizes['1536x1536']); // disable 2x medium-large size
	unset($sizes['2048x2048']); // disable 2x large size
	return $sizes;

}
add_filter('intermediate_image_sizes_advanced', 'zing_custom_img_sizes');

add_action( 'elementor_pro/forms/new_record', function($record, $handler){
    $form_name = $record->get_form_settings( 'form_name' );
    if ( 'Contact Form' == $form_name ):
        $portalID = '39677787';
        $formID = '0b6e6fd1-e329-4036-a1ae-5a03df364242';
        $url = "https://api.hsforms.com/submissions/v3/integration/submit/$portalID/$formID";

        $raw_fields = $record->get( 'fields' );
        $fields = [];
        foreach ( $raw_fields as $id => $field ) {
            $fields[ $id ] = $field['value'];
        }

        $d_mes = wp_remote_post( $url, array(
            'headers' => array(
                'Content-Type'  => 'application/json',
            ),
            'sslverify' => false,
            'method' => 'POST',
            'body' => json_encode(array(
                'pageName' => $d['location'],
                'pageUri' => $d['location_url'],
                'fields' => array(
                    array(
                        'objectTypeId' => '0-1',
                        'name' => 'lastname',
                        'value' => $fields['name']
                    ),
                    array(
                        'objectTypeId' => '0-1',
                        'name' => 'email',
                        'value' => $fields['email']
                    ),
                     array(
                        'objectTypeId' => '0-1',
                        'name' => 'phone',
                        'value' => $fields['phone']
                    ),
                )
            ))
        ) );
    endif;
}, 10, 2 );

// show_admin_bar( false );