<?php get_header(); ?>
<?php $defaultImg = 'https://harfenklang.ch/wp-content/uploads/2020/11/Eliane-Koradi-IMG_0040_Eliane_sRGB.jpg' ?>

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