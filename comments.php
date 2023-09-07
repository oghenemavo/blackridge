<?php

    if (post_password_required()) 
    {
        return;
    }

?>

<div id="comments">

    <?php if(have_comments()): ?>
        <h2>
            <?php
                printf(
                    esc_html( _n( '%1$s Reply to "%2$2"', 
                        '%1$s Replies to "%2$2"', 
                        get_comments_number(), 
                        'blackridge' 
                    ) ),
                    number_format_i18n( get_comments_number() ),
                    get_the_title()
                );
            ?>
        </h2>
        
        <ul>
            <?php 
                wp_list_comments( array(
                    'avatar_size' => 200,
                    'reply_text' => 'hello',
                ) )
            ?>
        </ul>

        <?php the_comments_pagination(); ?>
    <?php endif; ?>

    <?php if(! comments_open() && get_comments_number() ): ?>
        <p><?php esc_html_e( 'comments are closed for this post', 'blackridge' ); ?></p>
    <?php endif; ?>
        
    <?php comment_form(); ?>
</div>