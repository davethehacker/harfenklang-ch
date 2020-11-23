<?php
    add_theme_support( 'title-tag' );
    add_theme_support('post-thumbnails');

    function register_my_menus() {
        register_nav_menus(
        array(
            'menu' => __( 'Main Menu' ),
            'frontpage' => __( 'Kacheln Startseite')
        )
        );
       }
       add_action ('init', 'register_my_menus');

?>