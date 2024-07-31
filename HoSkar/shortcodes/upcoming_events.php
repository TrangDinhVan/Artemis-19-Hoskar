<?php

add_shortcode( 'upcoming_events', function(){

    ob_start();

    $as = get_field( 'locations', 15 );

    if( !empty($as) ):

        $a = $as[0]; ?>

        <div class="upcoming_events pt-10">

            <div class="row gy-8 lh-10 has-scroll">

                <div class="col-md">

                    <div class="main">

                        <div class="m-gallery mb-4 mb-xl-7">

                            <?php

                            foreach ($a['gallery'] as $k => $g) { ?>

                                <img class="i-<?php echo $k; ?>" src="<?php echo $g['url']; ?>" alt=".">

                            <?php

                            } ?>

                        </div>

                        <img src="<?php echo IMG; ?>/g-next.png" alt="Next" class="next">

                        <div class="vstack gap-4 content-wrap py-2">

                            <h4><?php echo $a['title']; ?></h4>

                            <p class="lh-13 sapo mb-2"><?php echo $a['desc']; ?></p>

                            <div class="row gy-6 gx-4 justify-content-between align-items-center">

                                <div class="col-sm">

                                    <div class="vstack gap-2">

                                        <p class="d-flex gap-2 align-items-center"><img width="20" src="<?php echo IMG; ?>/CalendarBlank.svg" alt=".."><?php echo $a['time']; ?></p>

                                        <p class="d-flex gap-2 align-items-center"><img width="20" src="<?php echo IMG; ?>/MapPin.svg" alt=".."><?php echo $a['location']; ?></p>

                                    </div>

                                </div>

                                <div class="col-sm">

                                    <div class="btn-rainbow flex-shrink-0">

                                        <a href="<?php echo $a['url']; ?>">Register</a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md">

                    <div class="vstack gap-6 gap-lg-10 others pe-lg-2">

                        <?php

                        for ($i = 1; $i < count($as); $i++) {

                            if( isset($as[$i]) ):

                                $a = $as[$i];

                                $img_url = $a['gallery'][0]['url']; ?>

                                <div class="entry d-flex flex-wrap flex-sm-nowrap gap-4">

                                    <img class="thumb" src="<?php echo $img_url; ?>" alt="...">

                                    <div class="vstack gap-4 content-wrap py-2">
                                        <h4><?php echo $a['title']; ?></h4>

                                        <p class="lh-13 sapo"><?php echo $a['desc']; ?></p>

                                        <p class="d-flex gap-2 align-items-center"><img width="20" src="<?php echo IMG; ?>/CalendarBlank.svg" alt=".."><?php echo $a['time']; ?></p>

                                        <p class="d-flex gap-2 align-items-center"><img width="20" src="<?php echo IMG; ?>/MapPin.svg" alt=".."><?php echo $a['location']; ?></p>

                                        <div class="btn-rainbow">

                                            <a href="<?php echo $a['url']; ?>">Register</a>

                                        </div>

                                    </div>

                                </div>

                            <?php

                            endif;

                        } ?>

                    </div>

                </div>

            </div>

        </div>

    <?php

    endif;

    return ob_get_clean();

} ); ?>