<?php

    require_once 'lib/helpers.php';
    require_once 'lib/enqueue-assets.php';
    require_once 'lib/sidebars.php';
    require_once 'lib/theme-support.php';
    require_once 'lib/navigation.php';
    require_once 'lib/customize.php';
    require_once 'lib/metaboxes.php';
    require_once 'lib/comment-callback.php';


    function blackridge_button($atts)
    {
        extract(shortcode_atts(array(
            'color' => 'red',
            'text' => 'Button',
        ), $atts));

        return '<button style="background-color: ' . esc_attr($color) . '">' . esc_html($text) . '</button>';
    }

    add_shortcode('blackridge_button', 'blackridge_button');