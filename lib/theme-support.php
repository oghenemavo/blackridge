<?php

    function blackridge_theme_support()
    {
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption') );
        add_theme_support( 'customize-selective-refresh-widgets' );
        add_theme_support( 'custom-logo',  array(
            'height' => 200,
            'width' => 600,
            'flex-height' => true,
            'flex-width' => true
        ));
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'audio',
        ));

        // add custom image size
        add_image_size('blackridge-blog-image', 1200, 0);
    }

    add_action( 'after_setup_theme', 'blackridge_theme_support' );