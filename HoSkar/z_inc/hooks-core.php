<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
function z_filter_zing_image_full_quality( $quality ) {
    return 100;
}
add_filter( 'wp_editor_set_quality', 'z_filter_zing_image_full_quality' );
add_filter( 'jpeg_quality', 'z_filter_zing_image_full_quality' );

function zing_set_content_type(){
    return "text/html";
}
add_filter( 'wp_mail_content_type','zing_set_content_type' );


/* Tắt Block Editor */
add_filter( 'use_block_editor_for_post', '__return_false' );

add_action( 'phpmailer_init', function( $phpmailer ) {
    global $post;
    $phpmailer->From = 'Ybui@wehubyou.com';
    $phpmailer->FromName = 'HoSkar';
});

add_filter( 'term_links-category', function( $links ){
    $a = $links;
    shuffle( $a );
    return $a;
}, 99, 1 );