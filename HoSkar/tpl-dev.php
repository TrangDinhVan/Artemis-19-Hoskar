<?php
/* Template name: Dev */
get_header();
if( isset($_GET['test1']) ):

    // $spreadsheets_id = '1Bq-vqC3lmTxmgVdKtzeDROXuhxoQZjD0BP7A8R4Ui1g';
    // $a = new Wpgsi_Google_Sheet('DHA', '6.0.1', new Wpgsi_common('CHA', '6.0.1') );
    // $token = $a->wpgsi_token()['access_token'];
    // $range = "Registration";
    // $url = "https://sheets.googleapis.com/v4/spreadsheets/{$spreadsheets_id}/values/{$range}:append?insertDataOption=INSERT_ROWS&valueInputOption=USER_ENTERED";
    // $args = Array(
    //     'headers' => Array(
    //         'Authorization' => 'Bearer ' . $token,
    //         'Content-Type' => 'application/json'
    //     ),
    //     'body' => json_encode( array(
    //         "values" => array(
    //             array(1, 2, 3, 4, 5, 6, 7)
    //         )
    //     ) )
    // );
    // $return = wp_remote_post($url, $args);
    // fw_print($return);

    if( class_exists('Wpgsi_Google_Sheet') ):
        $pid = 2884;
        $d = get_field( 'json', $pid );
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
                    get_the_title( $pid ),
                    get_permalink( $pid ),
                    $d['gender'],
                    $d['f_name'],
                    $d['l_name'],
                    $d['company'],
                    $d['company_email'],
                    "'".$d['phone'],
                    $d['title'],
                    $d['detail'],
                    $d['industry'],
                    $d['category'],
                    $d['interest'],
                    implode( "; ", $d['city'] ),
                    $d['meet']
                ))
            ) )
        );
        $return = wp_remote_post($url, $args);
    endif;
endif;
get_footer(); ?>