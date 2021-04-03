<section id="banner">
    <?php
    // Check rows exists.
    if( have_rows('banners') ):

        // Loop through rows.
        while( have_rows('banners') ) : the_row();

            // Load sub field value.
            $img = get_sub_field('img');
            $text = get_sub_field('text');
    ?>
            <div id="banner-elem" style="background-image: url(<?php echo $img;?>)">
                <h1><?php echo $text;?></h1>
            </div>
    <?php
        // End loop.
        endwhile;

    // No value.
    else :
    ?>
        <div id="banner-elem" style="background-image: url(<?php echo get_the_post_thumbnail_url();?>)">
            <h1></h1>
        </div>
    <?php
    endif;
    ?>
</section>
