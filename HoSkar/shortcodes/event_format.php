<?php
add_shortcode( 'event_format', function(){
    ob_start();
    $as = get_field( 'event_format' );
    if( !empty($as) ): ?>
        <div class="event_format d-flex flex-column flex-lg-row align-items-center gap-3 gap-xl-5 mb-6">
            <?php
            if( isset($as[0]) ):
                $a = $as[0]; ?>
                <div class="entry active flex-shrink-0" data-align="left">
                    <img src="<?php echo $a['img']['url']; ?>" alt="" class="thumb">
                    <h2 class="vtitle"><?php echo $a['title']; ?></h2>
                    <img src="<?php echo IMG; ?>/g-next-b.png" alt="Next" class="next">
                </div>
            <?php
            endif;
            if( isset($as[1]) ):
                $a = $as[1]; ?>
                <div class="entry" data-align="center">
                    <img src="<?php echo $a['img']['url']; ?>" alt="" class="thumb">
                    <h2 class="vtitle"><?php echo $a['title']; ?></h2>
                    <img src="<?php echo IMG; ?>/g-next-b.png" alt="Prev" class="prev zflip">
                    <img src="<?php echo IMG; ?>/g-next-b.png" alt="Next" class="next">
                </div>
            <?php
            endif;
            if( !empty($as[2]) ):
                $a = $as[2]; ?>
                <div class="entry" data-align="right">
                    <img src="<?php echo $a['img']['url']; ?>" alt="" class="thumb">
                    <h2 class="vtitle"><?php echo $a['title']; ?></h2>
                    <img src="<?php echo IMG; ?>/g-next-b.png" alt="Prev" class="prev zflip">
                </div>
            <?php
            endif; ?>
        </div>
        <div class="event_format_lb font-semi-bold d-none d-lg-block"><span><?php echo $as[0]['title']; ?></span></div>
        <?php
    endif;
    return ob_get_clean();
} ); ?>