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
} );

add_filter( 'manage_reg_submit_posts_columns', function( $cols ){
    $cols['Event'] = 'Event';
    $cols['Name'] = 'Name';
    $cols['Company'] = 'Company';
    $cols['tt'] = 'Title';
    $cols['Detail'] = 'Detail';
    // $cols['Industry'] = 'Industry';
    $cols['Your company'] = 'Your company';
    $cols['Your city'] = 'Your city';
    $cols['Category'] = 'Category';
    $cols['Time'] = 'Interested to attend';
    $cols['Cities'] = 'Love Citis';
    $cols['meet'] = 'Love People in';
    return $cols;
} );

add_action( 'manage_reg_submit_posts_custom_column' , function($column, $post_id){
    $json = get_field( 'json', $post_id );
    switch ( $column ) {
        case 'Event':
            echo '<a href="'.$json['location_url'].'" target="_blank">'.$json['location'].'</a>';
            break;
        case 'Name':
            echo "{$json['gender']} {$json['f_name']} {$json['l_name']}";
            break;
        case 'Company':
            echo "{$json['company']} - {$json['company_email']} ";
            break;
        case 'tt':
            echo $json['title'];
            break;
        case 'Detail':
            echo $json['desc'];
            break;
        case 'Detail':
            echo $json['desc'];
            break;
        case 'Your company':
            if( !empty($json['yourcompany']) ):
                echo implode(";", $json['yourcompany']);
            endif;
            break;
        case 'Your city':
            if( !empty($json['yourcity']) ):
                echo implode(";", $json['yourcity']);
            endif;
            break;
        case 'Category':
            if( !empty($json['category']) ):
                echo implode(";", $json['category']);
            endif;
            break;
        case 'Time':
            echo $json['interest'];
            break;
        case 'Cities':
            if( !empty($json['city']) ):
                echo implode(";", $json['city']);
            endif;
            break;
        case 'meet':
            if( !empty($json['meet']) ):
                echo implode(";", $json['meet']);
            endif;
            break;
    }
}, 10, 2 ); ?>