<?php
add_shortcode( 'upcoming_events', function(){
    ob_start();
    return ob_get_clean();
} ); ?>