<?php
/* Template name: Dev */
get_header(); ?>
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
<script>
  hbspt.forms.create({
    region: "na1",
    portalId: "39677787",
    formId: "3ec2d2a5-d129-44b9-8d93-d7747f50baf5"
  });
</script>
<?php
$portalID = '39677787';
$formID = '3ec2d2a5-d129-44b9-8d93-d7747f50baf5';
$url = "https://api.hsforms.com/submissions/v3/integration/submit/$portalID/$formID";
return;
$rq = wp_remote_post( $url, array(
    'headers' => array(
        'Content-Type'  => 'application/json',
    ),
    'sslverify' => false,
    'method' => 'POST',
    'body' => json_encode(array(
        'pageName' => 'Dev',
        'pageUri' => 'https://samuelw41.sg-host.com/hoskar/dev/',
        'fields' => array(
            array(
                'objectTypeId' => '0-1',
                'name' => 'firstname',
                'value' => 'Trangw'
            ),
            array(
                'objectTypeId' => '0-1',
                'name' => 'lastname',
                'value' => 'Devw'
            ),
            array(
                'objectTypeId' => '0-1',
                'name' => 'email',
                'value' => 'trangdvw@outlook.com'
            ),
            array(
                'objectTypeId' => '0-1',
                'name' => 'salutation',
                'value' => 'Mr.'
            ),
            array(
                'objectTypeId' => '0-1',
                'name' => 'phone',
                'value' => '558'
            ),
            array(
                'objectTypeId' => '0-1',
                'name' => 'jobtitle',
                'value' => 'Other'
            ),
            array(
                'objectTypeId' => '0-1',
                'name' => 'industry',
                'value' => 'Other'
            ),
            array(
                'objectTypeId' => '0-1',
                'name' => 'wehub_category',
                'value' => 'Other'
            )
        )
    ))
) );
fw_print($rq);
get_footer(); ?>