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
            <a href="/" class="logo"><img src="<?php echo(get_template_directory_uri())?>/Unterschrift-Eliane-Koradi-temp-white.png"></img></a>
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