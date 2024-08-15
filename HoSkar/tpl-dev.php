<?php
/* Template name: Dev */
get_header(); ?>
<!-- <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
<script>
  hbspt.forms.create({
    region: "na1",
    portalId: "39677787",
    formId: "0b6e6fd1-e329-4036-a1ae-5a03df364242"
  });
</script> -->

<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
<script>
  hbspt.forms.create({
    region: "na1",
    portalId: "39677787",
    formId: "3ec2d2a5-d129-44b9-8d93-d7747f50baf5"
  });
</script>
<?php
fw_print( get_field( 'd_mes', 'option' ) );
get_footer(); ?>