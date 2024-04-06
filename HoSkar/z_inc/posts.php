<?php
function zing_custom_post_type() {
    $labels = array(
        'name'                  => _x( 'News', 'Post Type General Name', 'zing' ),
        'singular_name'         => _x( 'News', 'Post Type Singular Name', 'zing' ),
        'menu_name'             => __( 'News', 'zing' ),
        'name_admin_bar'        => __( 'News', 'zing' ),
        'archives'              => __( 'News', 'zing' ),
        'all_items'             => __( 'News', 'zing' ),
        'add_new_item'          => __( 'Add News', 'zing' ),
        'add_new'               => __( 'New News', 'zing' ),
        'new_item'              => __( 'New News', 'zing' ),
        'edit_item'             => __( 'Edit News', 'zing' ),
        'update_item'           => __( 'Update News', 'zing' ),
        'view_item'             => __( 'View News', 'zing' ),
        'search_items'          => __( 'Search News', 'zing' ),
        'not_found'             => __( 'No News found', 'zing' ),
        'not_found_in_trash'    => __( 'No News found in trash', 'zing' )
    );
    $args = array(
        'label'                 => __( 'News', 'zing' ),
        'description'           => __( 'News', 'zing' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
        'taxonomies'            => array(),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-flag',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    // register_post_type( 'news', $args );

    // register_taxonomy( 'news_category', array('news'), array(
    //     'hierarchical'  =>  true,
    //     'show_admin_column' => true,
    //     'show_in_menu' => true,
    //     'labels' => array(
    //         'name' => __('News Category', 'zing'),
    //     ),
    // ));
}
add_action('init', 'zing_custom_post_type'); ?>