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



    $v = '1.5.5.2';

    wp_enqueue_style( 'zing-style', get_stylesheet_uri(), array(), $v );

    wp_enqueue_style( 'luans', CSS . '/luans.css', array(), time(), 'all' );
    wp_enqueue_script( 'jqueryarctextjs', JS.'/jquery-arctext.js', array('jquery'), $v, true );

    wp_enqueue_script( 'custom.js', JS.'/custom.js', array('jquery'), $v, true );

    wp_enqueue_script( 'luans.js', JS.'/luans.js', array('jquery'), $v, true );
    wp_enqueue_script( 'luan2.js', JS.'/luan2.js', array('jquery'), $v, true );

    wp_enqueue_style( 'swiper.css', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css' );
    wp_enqueue_style( 'fancybox.css', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css' );

    wp_enqueue_script( 'swiper.js', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.2.0/swiper-bundle.min.js', array( 'jquery' ), $v, false );
    wp_enqueue_script( 'fancybox.js', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js', array( 'jquery' ), $v, true );

    wp_register_script( 'zing-dummy-js-header', '',);

    wp_enqueue_script( 'zing-dummy-js-header' );

        wp_add_inline_script( 'zing-dummy-js-header', 'const zing = ' . json_encode( array(

            'home_url' => home_url(),

            'ajax_url' => admin_url( 'admin-ajax.php' ),

            'img' => IMG,

            'nonce' => wp_create_nonce( 'z_do_ajax' )

    ) ), 'before' );

} ?>