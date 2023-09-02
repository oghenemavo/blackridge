<?php

    function blackridge_post_short_meta()
    {
        $output = 'Posted on';
        $output .= '<a href="' . esc_url(get_permalink()) . '">';
        $output .= '<time datetime="' . esc_attr(get_the_date('c')) . '">' . esc_html(get_the_date()); '</time></a>';
        $output .= 'By <a href="' .  esc_url(get_author_posts_url( get_the_author_meta('ID') )) . '">' . 
        esc_html(get_the_author()) . '</a>';
        return $output;
    }

    function blackridge_readmore_link()
    {
        $output = '<a href="' . esc_url(get_permalink()) . '" title="' . the_title_attribute() . '">';
        $output .= 'Read more <span class="u-screen-reader">about ' . the_title() . '</span></a>';
        return $output;
    }