<?php
add_shortcode( 'sponsor_benefits', function(){
    ob_start(); ?>
    <div class="sponsor_benefits flex-center position-relative pt-10 has-scroll">
        <div class="e order-0 transition">
            <img src="https://samuelw41.sg-host.com/hoskar/wp-content/uploads/2024/04/1-2.png" style="height: 50px;" alt=".." class="icon">
            <img src="https://samuelw41.sg-host.com/hoskar/wp-content/uploads/2024/04/1-1.png" alt=".." class="hh">
            <div class="desc lh-13 vstack gap-3">
                <p>• Second highest brand exposures in all the Marketing Materials & Campaigns (03-04 brands)</p>
                <p>• Attendance list</p>
                <p>• 02 Art boards display at Art Gallery area or Brand exposure</p>
            </div>
        </div>
        <div class="e order-1 transition">
            <img src="https://samuelw41.sg-host.com/hoskar/wp-content/uploads/2024/05/u2.png" alt=".." class="icon">
            <img src="https://samuelw41.sg-host.com/hoskar/wp-content/uploads/2024/05/Frame-1093-1.png" alt=".." class="hh">
            <div class="desc lh-13 vstack gap-3">
                <p>• Title “Hosting Partner” (01 brand)</p>
                <p>• Presented as Host of the event in all the Marketing Materials & Campaigns</p>
                <p>• Suggestion on the preferable guest mix </p>
                <p>• Dedicated social media post (introducing the Hosting Partner with full information)</p>
                <p>• Primary visibility at the event & spotlighted introduction/ interaction at the opening speech</p>
                <p>• Speaking slot at the HoSkar Night Talk (pre-event session)</p>
                <p>• 04 Art boards display (1 at Check-in area & 3 at Art Gallery area) or Service/ Product showcase (depending on the venue and suitability)</p>
                <p>• Direct introduction to VIP guests</p>
                <p>• Full data of Registration & Attendance</p>
                <p>• Other tailor-made benefits and exposures</p>
            </div>
        </div>
        <div class="e order-2 transition">
            <img src="https://samuelw41.sg-host.com/hoskar/wp-content/uploads/2024/05/u3.png" alt=".." class="icon">
            <img src="https://samuelw41.sg-host.com/hoskar/wp-content/uploads/2024/05/3-1-1.png" alt=".." class="hh">
            <div class="desc lh-13 vstack gap-3">
                <p>• HoSkar Night Talk by "your brand" (01 brand)</p>
                <p>• Speaking slot (Moderator or Panelist)</p>
                <p>• 01 Art boards display at Art Gallery area</p>
            </div>
        </div>
    </div>
    <script>
        jQuery(function($){
            $(document).on('click', '.sponsor_benefits .e:first-child', function(e){
                div1 = $('.sponsor_benefits .e').eq(0).toggleClass('order-0 order-1');
                div2 = $('.sponsor_benefits .e').eq(1).toggleClass('order-0 order-1');
            });
            $(document).on('click', '.sponsor_benefits .e:last-child', function(e){
                div1 = $('.sponsor_benefits .e').eq(2).toggleClass('order-2 order-1');
                div2 = $('.sponsor_benefits .e').eq(1).toggleClass('order-2 order-1');
            });
        });
    </script>
    <?php
    return ob_get_clean();
} ); ?>