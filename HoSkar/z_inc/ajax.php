<?php
add_action('wp_ajax_nopriv_z_do_ajax', 'z_do_ajax');
add_action('wp_ajax_z_do_ajax', 'z_do_ajax');
function z_do_ajax() {

    // check_ajax_referer( 'z_do_ajax', 'nonce' );
    $res = array('mes' => 'ajax-processed'); $_action = $_POST['_action'];

    if( $_action == 'submitReg' ):
        parse_str($_POST['form_data'], $d);
        $pid = wp_insert_post( array(
            'post_type' => 'reg_submit',
            'post_status' => 'pending',
            'post_title' => $d['location'] . ' - ' . $d['company_email'] . ' - ' . $d['phone'],
        ) );
        update_field( 'json', $d, $pid );
        ob_start(); ?>
        <p><strong>New Contact Request From: <a href="<?php echo $d['location_url']; ?>"><?php echo $d['location']; ?></a></strong></p>
        <p>Name: <strong><?php echo $d['gender'] . ' ' . $d['f_name'] . ' ' . $d['l_name']; ?></strong></p>
        <p>Phone: <strong><?php echo $d['phone']; ?></strong></p>
        <p>Company: <strong><?php echo $d['company'] . ' - ' . $d['company_email']; ?></strong></p>
        <p>Title: <strong><?php echo $d['title']; ?></strong></p>
        <p>Industry: <strong><?php echo $d['industry']; ?></strong></p>
        <p>Category: <strong><?php echo $d['category']; ?></strong></p>
        <p>Interested to attend: <strong><?php echo $d['interest']; ?></strong></p>
        <p>Intersted in cities: <strong><?php echo implode( "; ", $d['city'] ); ?></strong></p>
        <p>Whould like to meet people in <strong><?php echo $d['meet']; ?></strong></p>
        <p>Message: <strong><?php echo $d['desc']; ?></strong></p>
        <?php
        $mail_content = ob_get_clean();
        ob_start();
        include( EMAIL."/standard.php" );
        $content = ob_get_clean();
        wp_mail( 'trangdv.1502@gmail.com, jasmine@artemisdigital.com', 'New Hoskar Registration', $content );
    endif;

    wp_send_json( $res );
    die();
} ?>