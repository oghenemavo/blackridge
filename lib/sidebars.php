<?php

    if (!function_exists('blackridge_sidebar_widgets')) {
        function blackridge_sidebar_widgets()
        {
            register_sidebar( 
                array(
                    'id' => 'primary_sidebar',
                    'name' => esc_html__( 'Primary Sidebar', 'blackridge' ),
                    'description' => esc_html__( 'This Sidebar appears on the blog posts page', 'blackridge' ),
                    'before_widget' => '<section id="%1$s" class="%2$s mb-4">',
                    'after_widget' => '</section>',
                    'before_title' => '<h5>',
                    'after_title' => '</h5>',
                )
            );
        }
    }

    add_action( 'widgets_init', 'blackridge_sidebar_widgets');