<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
    

    <!--- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css" /> ---!>

    <script src="<?php echo get_template_directory_uri(); ?>/script.js" type="text/javascript"></script>


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> class="is-preload" id="main-body">
    <?php wp_body_open(); ?>




<!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
            <header id="header">
                <a href="index.html" class="logo"><strong>Forty</strong> <span>by Pixelarity</span></a>
                <nav>
                    <a href="#menu"></a>
                </nav>
            </header>

        <!-- Menu -->
            <nav id="menu">
            <?php wp_nav_menu( array(
                'menu_class' => 'links', //Fügt eine Klasse zum Menü hinzu
                'container' => 'false', //no container div
                )
            ); ?>
                
            </nav>

        <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <section id="banner" class="major" style="background-position: center 0px; background-image: url(<?php echo get_the_post_thumbnail_url();?>)">
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
                    
                    <?php //the_post_thumbnail(); ?>
                        <div class="inner">	
                            <header class="major">
                                <h1><?php the_title()?></h1>
                            </header>
                            <span class="image main"><img src="images/pic11.jpg" alt="" /></span>
                            <?php the_content()?>
                        </div>
                    
                </section>
                </div>
                <?php endwhile; endif;?>

        <!-- Contact -->
            <section id="contact">
                <div class="inner">
                    <section>
                        
                    </section>
                    <section class="split">
                        <section>
                            <div class="contact-method">
                                <span class="icon solid alt fa-envelope"></span>
                                <h3>Email</h3>
                                <a href="#">information@untitled.tld</a>
                            </div>
                        </section>
                        <section>
                            <div class="contact-method">
                                <span class="icon solid alt fa-phone"></span>
                                <h3>Phone</h3>
                                <span>(000) 000-0000 x12387</span>
                            </div>
                        </section>
                        <section>
                            <div class="contact-method">
                                <span class="icon solid alt fa-home"></span>
                                <h3>Address</h3>
                                <span>1234 Somewhere Road #5432<br />
                                Nashville, TN 00000<br />
                                United States of America</span>
                            </div>
                        </section>
                    </section>
                </div>
            </section>

        <!-- Footer -->
            <footer id="footer">
                <div class="inner">
                    
                    <ul class="copyright">
                        <li>&copy; Untitled</li>
                    </ul>
                </div>
            </footer>

    </div>


    <?php wp_footer(); ?>
    <!-- Scripts -->
			<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
			<!--<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.scrolly.min.js"></script>-->
			<!--<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.scrollex.min.js"></script>-->
			<script src="<?php echo get_template_directory_uri(); ?>/assets/js/browser.min.js"></script>
			<script src="<?php echo get_template_directory_uri(); ?>/assets/js/breakpoints.min.js"></script>
			<script src="<?php echo get_template_directory_uri(); ?>/assets/js/util.js"></script>
			<script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>
</body>

</html>