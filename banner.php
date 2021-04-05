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
        if(get_the_post_thumbnail_url() != ''):
            $img = get_the_post_thumbnail_url();
        else:
            $img = 'https://harfenklang.hexcode.ch/wp-content/uploads/2021/01/Eliane-Koradi-IMG_0049_Eliane_sRGB.jpg';
        endif;
    ?>
        <div id="banner-elem" style="background-image: url(<?php echo $img;?>)">
            <h1></h1>
        </div>
    <?php
    endif;
    ?>
</section>
