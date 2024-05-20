<?php
add_shortcode( 'sponsor_benefits', function(){
    ob_start(); ?>
    <div class="sponsor_benefits flex-center position-relative pt-10">
        <div class="e0">
            <img src="https://samuelw41.sg-host.com/hoskar/wp-content/uploads/2024/04/1-2.png" alt=".." class="icon">
            <img src="https://samuelw41.sg-host.com/hoskar/wp-content/uploads/2024/04/1-1.png" alt=".." class="hh">
            <div class="desc lh-13">
                <p>0</p>
            </div>
        </div>
        <div class="active">
            <img src="https://samuelw41.sg-host.com/hoskar/wp-content/uploads/2024/04/1-2.png" alt=".." class="icon">
            <img src="https://samuelw41.sg-host.com/hoskar/wp-content/uploads/2024/04/1-1.png" alt=".." class="hh">
            <div class="desc lh-13">
                <p>1</p>
            </div>
        </div>
        <div class="e1">
            <img src="https://samuelw41.sg-host.com/hoskar/wp-content/uploads/2024/04/1-2.png" alt=".." class="icon">
            <img src="https://samuelw41.sg-host.com/hoskar/wp-content/uploads/2024/04/1-1.png" alt=".." class="hh">
            <div class="desc lh-13">
                <p>2</p>
            </div>
        </div>
    </div>
    <script>
        jQuery(function($){
            $(document).on('click', '.sponsor_benefits .e1', function(e){
                $('.sponsor_benefits .e0').removeClass('e0 e1').addClass('active');
                $('.sponsor_benefits .active').removeClass('active e0').addClass('e1');
                $('.sponsor_benefits .e1').removeClass('e1 active').addClass('e0');
            });
        });
    </script>
    <?php
    return ob_get_clean();
} ); ?>