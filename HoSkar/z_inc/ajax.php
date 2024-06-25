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

        <p>Location company: <strong><?php echo $d['yourcompany[]']; ?></strong></p>

        <p>Industry: <strong><?php echo $d['industry']; ?></strong></p>

        <p>Category: <strong><?php echo $d['category']; ?></strong></p>

        <p>Interested to attend: <strong><?php echo $d['interest']; ?></strong></p>

        <p>Whould like to meet people in <strong><?php echo $d['meet']; ?></strong></p>

        <p>Message: <strong><?php echo $d['desc']; ?></strong></p>

        <?php

        $mail_content = ob_get_clean();

        ob_start();

        include( EMAIL."/standard.php" );

        $content = ob_get_clean();

        // wp_mail( 'trangdv.1502@gmail.com, jasmine@artemisdigital.com', 'New Hoskar Registration', $content );

        if( class_exists('Wpgsi_Google_Sheet') ):

            $spreadsheets_id = '1Bq-vqC3lmTxmgVdKtzeDROXuhxoQZjD0BP7A8R4Ui1g';

            $a = new Wpgsi_Google_Sheet('DHA', '6.0.1', new Wpgsi_common('CHA', '6.0.1') );

            $token = $a->wpgsi_token()['access_token'];

            $range = "Registration";

            $url = "https://sheets.googleapis.com/v4/spreadsheets/{$spreadsheets_id}/values/{$range}:append?insertDataOption=INSERT_ROWS&valueInputOption=USER_ENTERED";

            $args = Array(

                'headers' => Array(

                    'Authorization' => 'Bearer ' . $token,

                    'Content-Type' => 'application/json'

                ),

                'body' => json_encode( array(

                    "values" => array(array(

                        printf("%02d", $pid),

                        $d['location'],

                        $d['location_url'],

                        $d['gender'],

                        $d['f_name'],

                        $d['l_name'],

                        $d['company'],

                        $d['company_email'],

                        "'".$d['phone'],

                        $d['title'],
                        
                        $d['yourcompany'],

                        $d['desc'],

                        $d['industry'],

                        $d['category'],

                        $d['interest'],

                        '',

                        $d['meet'],

                        date_i18n( 'Y-m-d H:i' )

                    ))

                ) )

            );

            $return = wp_remote_post($url, $args);

            $res['dev_return'] = $return;

        endif;

        $portalID = '39677787';

        $formID = '3ec2d2a5-d129-44b9-8d93-d7747f50baf5';

        $url = "https://api.hsforms.com/submissions/v3/integration/submit/$portalID/$formID";

        $res['dev2'] = wp_remote_post( $url, array(

            'headers' => array(

                'Content-Type'  => 'application/json',

            ),

            'sslverify' => false,

            'method' => 'POST',

            'body' => json_encode(array(

                'pageName' => $d['location'],

                'pageUri' => $d['location_url'],

                'fields' => array(

                    array(

                        'objectTypeId' => '0-1',

                        'name' => 'firstname',

                        'value' => $d['f_name']

                    ),

                    array(

                        'objectTypeId' => '0-1',

                        'name' => 'lastname',

                        'value' => $d['l_name']

                    ),

                    array(

                        'objectTypeId' => '0-1',

                        'name' => 'email',

                        'value' => $d['company_email']

                    ),

                    array(

                        'objectTypeId' => '0-1',

                        'name' => 'salutation',

                        'value' => $d['gender']

                    ),

                    array(

                        'objectTypeId' => '0-1',

                        'name' => 'phone',

                        'value' => $d['phone']

                    ),

                    array(

                        'objectTypeId' => '0-1',

                        'name' => 'jobtitle',

                        'value' => $d['title']

                    ),

                    array(

                        'objectTypeId' => '0-1',

                        'name' => 'industry',

                        'value' => $d['industry']

                    ),

                    array(

                        'objectTypeId' => '0-1',

                        'name' => 'wehub_category',

                        'value' => $d['category']

                    )

                )

            ))

        ) );

    endif;



    wp_send_json( $res );

    die();

} ?>