<?php
function zing_custom_post_type() {
    $labels = array(
        'name'                  => _x( 'Register', 'Post Type General Name', 'zing' ),
        'singular_name'         => _x( 'Register', 'Post Type Singular Name', 'zing' ),
        'menu_name'             => __( 'Register', 'zing' ),
        'name_admin_bar'        => __( 'Register', 'zing' ),
        'archives'              => __( 'Register', 'zing' ),
        'all_items'             => __( 'Register', 'zing' ),
        'add_new_item'          => __( 'Add Register', 'zing' ),
        'add_new'               => __( 'New Register', 'zing' ),
        'new_item'              => __( 'New Register', 'zing' ),
        'edit_item'             => __( 'Edit Register', 'zing' ),
        'update_item'           => __( 'Update Register', 'zing' ),
        'view_item'             => __( 'View Register', 'zing' ),
        'search_items'          => __( 'Search Register', 'zing' ),
        'not_found'             => __( 'No Register found', 'zing' ),
        'not_found_in_trash'    => __( 'No Register found in trash', 'zing' )
    );
    $args = array(
        'label'                 => __( 'Register', 'zing' ),
        'description'           => __( 'Register', 'zing' ),
        'labels'                => $labels,
        'supports'              => array( 'title' ),
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
        'publicly_queryable'    => false,
        'capability_type'       => 'post',
    );
    register_post_type( 'reg_submit', $args );

    // register_taxonomy( 'news_category', array('news'), array(
    //     'hierarchical'  =>  true,
    //     'show_admin_column' => true,
    //     'show_in_menu' => true,
    //     'labels' => array(
    //         'name' => __('News Category', 'zing'),
    //     ),
    // ));
}
add_action('init', 'zing_custom_post_type');

add_action( 'edit_form_after_title', function(){
    if( get_post_type() == 'reg_submit' ):
        fw_print( get_field( 'json' ) );
    endif;
} ); ?>