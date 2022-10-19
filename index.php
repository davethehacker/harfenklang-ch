<?php get_header(); ?>  

        <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <?php include 'banner.php'; ?>
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