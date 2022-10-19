<section id="banner">
<?php $defaultImg = 'https://harfenklang.ch/wp-content/uploads/2020/11/Eliane-Koradi-IMG_0040_Eliane_sRGB.jpg' ?>
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
                <div class="banner-text">
                    <h1><?php echo $text;?></h1>
                </div>
            </div>
    <?php
        // End loop.
        endwhile;

    // No value.
    else :
        if(get_field('cover-img') != ''):
            $img = get_field('cover-img');
        else:
            $img = $defaultImg;
        endif;
    ?>
        <div id="banner-elem" style="background-image: url(<?php echo $img;?>)">
            <h1></h1>
        </div>
    <?php
    endif;
    ?>
</section>
