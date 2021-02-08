
<?php get_header(); ?>

        <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <section id="banner" class="major" style="background-image: url(<?php echo get_the_post_thumbnail_url();?>)">
                <div class="inner">
                    <header class="major">
                        <h1>Es beglückt mich, den Menschen meine Freude an der Musik weiterzugeben.</h1>
                    </header>
							
                </div>
            </section>
        <!-- Main -->
            <div id="main" class="alt">

                <!-- One -->
                <section id="one">
                    
                    <?php ?>
                        <div class="inner">	
                            <header class="major">
                                <h1><?php the_title()?></h1>
                            </header>
                            <div class="content">
                                <?php the_content()?>
                            </div>
                            
                        </div>
                    
                </section>
                </div>
                <?php endwhile; endif;?>

<?php get_footer(); ?>