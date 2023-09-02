<?php

    function blackridge_assets()
    {
        wp_enqueue_style( 'blackridge-styles', get_template_directory_uri() . '/dist/assets/css/bundle.css', array(), '1.0.0', 'all' );
    }

    add_action('wp_enqueue_scripts', 'blackridge_assets');

    function blackridge_admin_assets()
    {
        wp_enqueue_style( 'blackridge-admin-styles', get_template_directory_uri() . '/dist/assets/css/admin-bundle.css', array(), '1.0.0', 'all' );
    }

    add_action('admin_enqueue_scripts', 'blackridge_admin_assets');