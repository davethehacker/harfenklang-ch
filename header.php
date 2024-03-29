<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
    
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick/slick-theme.css"/>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> class="is-preload" id="main-body">
    <?php wp_body_open(); ?>
    <?php $defaultImg = 'https://harfenklang.ch/wp-content/uploads/2020/11/Eliane-Koradi-IMG_0040_Eliane_sRGB.jpg' ?>
    <!-- Wrapper -->
    <div id="wrapper">

    <!-- Header -->
        <header id="header">
            <a href="/" class="logo monogramm"><img src="<?php echo(get_template_directory_uri())?>/Monogramm.png"></img></a>
            <a href="/" class="logo"><img src="<?php echo(get_template_directory_uri())?>/Eliane-Irene-Koradi.png"></img></a>
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