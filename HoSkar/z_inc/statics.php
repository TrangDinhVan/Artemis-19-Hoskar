<?php
// add_action( 'admin_init', 'z_editor_styles' );
function z_editor_styles() {
    add_editor_style( CSS.'/editor.css' );
}

// add_action( 'admin_enqueue_scripts', 'z_backend_statics' );
function z_backend_statics() {
    wp_enqueue_style( 'admin.css', CSS . '/admin.css' );
    wp_enqueue_script( 'admin.js', JS."/admin.js", array('jquery') );
    wp_localize_script( 'admin.js', 'zing', array(
        'home_url' => home_url(),
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'nonce' => wp_create_nonce( 'z_do_ajax' )
    ));
}

add_action('wp_enqueue_scripts', 'z_frontend_statics', 20 );
function z_frontend_statics(){
    if ( is_admin() ) { return; }

    $v = '1.0.1.4';
    wp_enqueue_style( 'zing-style', get_stylesheet_uri(), array(), $v );
    wp_enqueue_script( 'custom.js', JS.'/custom.js', array('jquery'), $v, true );

    wp_register_script( 'zing-dummy-js-header', '',);
    wp_enqueue_script( 'zing-dummy-js-header' );
        wp_add_inline_script( 'zing-dummy-js-header', 'const zing = ' . json_encode( array(
            'home_url' => home_url(),
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'img' => IMG,
            'nonce' => wp_create_nonce( 'z_do_ajax' )
    ) ), 'before' );
} ?>