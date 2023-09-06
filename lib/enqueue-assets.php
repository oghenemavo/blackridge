<?php

    function blackridge_assets()
    {
        wp_enqueue_style( 'blackridge-stylesheet', get_template_directory_uri() . '/dist/assets/css/bundle.css', array(), '1.0.0', 'all' );

        include( get_template_directory() . '/lib/inline-css.php' );
        wp_add_inline_style( 'blackridge-stylesheet', $inline_styles );
        
        wp_enqueue_script( 'blackridge-scripts', get_template_directory_uri() . '/dist/assets/js/bundle.js', array('jquery'), '1.0.0', true );

        if (is_singular() && comments_open() && get_option('thread_comments')) 
        {
            wp_enqueue_script( 'comment-reply' );
        }
    }

    add_action('wp_enqueue_scripts', 'blackridge_assets');

    function blackridge_admin_assets()
    {
        wp_enqueue_style( 'blackridge-admin-styles', get_template_directory_uri() . '/dist/assets/css/admin-bundle.css', array(), '1.0.0', 'all' );

        wp_enqueue_script( 'blackridge-admin-scripts', get_template_directory_uri() . '/dist/assets/js/admin-bundle.js', array('jquery'), '1.0.0', true );
    }

    add_action('admin_enqueue_scripts', 'blackridge_admin_assets');