<div>
    <h2></h2>
    <?php 
        $author_id = get_the_author_meta( 'ID' );
        $author_posts = get_the_author_posts();
        $author_display = get_the_author();
        $author_post_url = get_author_posts_url( $author_id );
        $author_description = get_the_author_meta( 'user_description' );
        $author_website = get_the_author_meta( 'user_url' );

    ?>
    <div>
        <?php echo get_avatar( $author_id, 265); ?>
    </div>
    <div>
        <div>
            <?php if ($author_website): ?>
                <a href="<?php echo esc_url($author_website); ?>" target="_blank">
                    <?php echo esc_html( $author_display ); ?>
                </a>
            <?php else: ?>
                <?php echo esc_html( $author_display ); ?>
            <?php endif; ?>
        </div>
        <div>
            <a href="<?php echo esc_url($author_post_url); ?>" target="_blank">
                <?php 
                    printf( 
                        esc_html( _n( '%s post', '%s post', $author_posts, 'blackridge' ) ), 
                        number_format_i18n( $author_posts ) 
                    );
                ?>
            </a>
        </div>
        <div>
            <?php echo esc_html( $author_description ); ?>
        </div>
    </div>


</div>