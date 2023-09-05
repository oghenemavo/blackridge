<?php 

    function blackridge_register_menus()
    {
        register_nav_menus( array(
            'main-menu' => esc_html__( 'Main Menu', 'blackridge' ),
            'footer-menu' => esc_html__( 'Footer Menu', 'blackridge' ),
        ) );
    }

    add_action( 'init', 'blackridge_register_menus' );