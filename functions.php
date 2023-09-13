<?php

    require_once 'lib/helpers.php';
    require_once 'lib/enqueue-assets.php';
    require_once 'lib/sidebars.php';
    require_once 'lib/theme-support.php';
    require_once 'lib/navigation.php';
    require_once 'lib/customize.php';
    require_once 'lib/metaboxes.php';
    require_once 'lib/comment-callback.php';
    require_once 'lib/most-recent-widget.php';


    function blackridge_button($atts)
    {
        extract(shortcode_atts(array(
            'color' => 'red',
            'text' => 'Button',
        ), $atts));

        return '<button style="background-color: ' . esc_attr($color) . '">' . esc_html($text) . '</button>';
    }

    add_shortcode('blackridge_button', 'blackridge_button');

    if (!isset($content_width)) 
    {
        $content_width = 800;
    }

    function blackridge_content_width()
    {
        global $content_width;
        global $post;

        if (is_single() && $post->post_type === 'post') {
            $layout = blackridge_meta($post->ID, '_blackridge_post_layout', 'full' );
            $sidebar = is_active_sidebar( 'primary-sidebar' );
            if ($layout === 'sidebar' && !$sidebar) 
            {
                $layout = 'full';
            }
            $content_width = $layout === 'full' ? 800 : 738;
        }
    }

    add_action('template_redirect', 'blackridge_content_width');

    function blackridge_image_sizes($sizes, $size, $image_src, $image_meta, $attachment_id)
    {
        $width = $size[0];
        global $content_width;
        global $post;

        $layout = 'full';

        if (is_single() && $post->post_type === 'post') {
            $layout = blackridge_meta($post->ID, '_blackridge_post_layout', 'full' );
            $sidebar = is_active_sidebar( 'primary-sidebar' );
            if ($layout === 'sidebar' && !$sidebar) 
            {
                $layout = 'full';
            }
        }

        if ($content_width <= $width) 
        {
            if ($layout === 'full') 
            {
                $sizes = '(max-width: 862px) calc(100vw - 1.25rem*2 - 0.625rem*2 - 2px), ' . $content_width . 'px';
            }
            elseif ($layout === '4sidebar') {
                $sizes = '(max-width: 640px) calc(100vw - 1.25rem*2 - 0.625rem*2 - 2px), (max-width: 1200px) calc(100vw - 33.33333vw - 0.625rem*4 - 1.25rem*2 - 2px), ' . $content_width . 'px';
            }
        }
        else
        {
            $sizes = '(max-width: ' . ($width + 62) . 'px) calc(100vw - 1.25rem*2 - 0.625rem*2 - 2px), ' . $width . 'px';
        }
        return $sizes;
    }
    
    add_action('wp_calculate_image_sizes', 'blackridge_image_sizes', 10, 5);