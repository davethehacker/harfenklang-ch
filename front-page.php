
<?php get_header(); ?>

<!-- Header image - feched from post/page !-->
<?php if(have_posts()): while(have_posts()): the_post(); ?>
    <section id="banner" class="major" style="background-image: url(<?php echo get_the_post_thumbnail_url();?>)">
        <div class="inner">
            <header class="major">
                <h1>Es beglückt mich, den Menschen meine Freude an der Musik weiterzugeben.</h1>
            </header>
                    
        </div>
    </section>
<?php endwhile; endif;?>
<!-- Main -->
    <div id="front-page" class="alt">

        <!-- Tiles -->
        <section id="one" class="tiles">
            <?php
                $menuLocations = get_nav_menu_locations();
                $menuID = $menuLocations['frontpage'];
                //var_dump($menuID);
                $tiles = wp_get_nav_menu_items($menuID);
                foreach ( $tiles as $tile ):
                    //var_dump($tile);
                    $id = $tile->object_id;
                    $url = $tile->url;
                    $title = $tile->title;
                    $thumbnail = get_the_post_thumbnail_url($id,'large');
                    $tileImg = get_field('frontpage-tile-img', $id);
                    $color = get_field('frontpage-tile-color', $id);

                    //the_field('frontpage-tile-color', 11);;
                    //echo(var_dump($tile));
            ?>
                <article>
                    <span class="image">
                        <img src="<?php echo($thumbnail) ?>" alt="" />
                    </span>
                    <header class="major">
                        <h3><a href="<?php echo($url)?>" class="link"><?php echo($title)?></a></h3>
                        <!-- <p>Ipsum dolor sit amet</p> -->
                    </header>
                </article>
            <?php endforeach; ?>
        </section>

        </div>
        

<?php get_footer(); ?>