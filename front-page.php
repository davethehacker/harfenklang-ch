
<?php get_header(); ?>

<?php //Header image - feched from post/page ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
<?php include 'banner.php'; ?>
<?php endwhile; endif;?>
    <div id="front-page" class="alt">

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
                    //not used anymore $thumbnail = get_the_post_thumbnail_url($id,'large');
                    $tileImg = get_field('frontpage-tile-img', $id);
                    $color = get_field('frontpage-tile-color', $id);
            ?>
                <article>
                    <span class="image">
                        <img src="<?php echo($tileImg) ?>" alt="" />
                    </span>
                    <header class="major">
                        <h3><a href="<?php echo($url)?>" class="link"><?php echo($title)?></a></h3>
                    </header>
                </article>
            <?php endforeach; ?>
        </section>

        </div>
        

<?php get_footer(); ?>