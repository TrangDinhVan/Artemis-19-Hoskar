<?php
/* Thêm trang Settings > Other Settings  trong Admin */
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' => 'Other Settings',
        'parent_slug' => 'options-general.php'
    ));
}  ?>