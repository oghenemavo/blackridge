<?php

    function blackridge_post_short_meta()
    {
        $output = 'Posted on';
        $output .= '<a href="' . get_permalink() . '">';
        $output .= '<time datetime="' . get_the_date('c') . '">' . get_the_date(); '</time></a>';
        $output .= 'By <a href="' .  get_author_posts_url( get_the_author_meta('ID') ) . '">' . 
            get_the_author() . '</a>';
        return $output;
    }

    function blackridge_readmore_link()
    {
        $output = the_excerpt();
        $output = '<a href="' . get_permalink() . '" title="' . the_title_attribute() . '">';
        $output .= 'Read more <span class="u-screen-reader">about ' . the_title() . '</span></a>';
        return $output;
    }