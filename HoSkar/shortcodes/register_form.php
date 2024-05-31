<?php
add_shortcode( 'register_form', function(){
    ob_start(); ?>
    <div class="register_form">
        <div class="row">
            <div class="col-sm-3">
                <div class="box p-3 vstack gap-3 mb-3 mb-lg-6 lh-12">
                    <p class="label-muted">Date & Time</p>
                    <p class="sh1 mb-5 mb-lg-6"><strong>25th April, 2024</strong></p>
                    <p class="label-muted">Venue</p>
                    <p class="sh1 mb-5 mb-lg-6"><strong>Bangkok Marriott Hotel Sukhumvit Soi 57</strong></p>
                    <hr>
                    <div class="row gy-5">
                        <div class="col-sm vstack gap-1">
                            <p class="font-semi-bold">17:00 - 18:00</p>
                            <p>HoSkar Talk</p>
                        </div>
                        <div class="col-sm vstack gap-1">
                            <p class="font-semi-bold">17:00 - 18:00</p>
                            <p>HoSkar Talk</p>
                        </div>
                    </div>
                    <div class="btn-rainbow">
                        <a href="#">Agenda PDF <i class="bi bi-download"></i></a>
                    </div>
                </div>
                <div class="box g-3">

                </div>
            </div>
            <div class="col-sm-9"></div>
        </div>
    </div>
    <?php
    return ob_get_clean();
} ); ?>