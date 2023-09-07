<?php 

    function blackridge_comment_callback($comment, $args, $depth)
    {
        $tag = ($args['style'] === 'div') ? 'div' : 'li';
        ?>
        <<?php echo $tag ?> id="comment-<?php comment_ID(); ?>" <?php comment_class(array('class1', $comment->comment_parent ? 'class-child': '')) ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="">
                <?php echo get_avatar($comment, 100, false, false, array('class' => 'avatar-classx') ); ?>
                <?php edit_comment_link( esc_html__('Edit Comment', 'blackridge'), '<span class="class-editlink">', '</span>' ); ?>
                
                <!-- content starts -->
                <div class="">
                    <div>
                        <?php echo get_comment_author($comment); ?>
                    </div>

                    <a href="<?php echo esc_url(get_comment_link($comment, $args)) ?>">
                        <time datetime="<?php comment_time('c') ?>">
                            <?php
                                printf(
                                    esc_html__('%s ago', 'blackridge'), 
                                    human_time_diff(get_comment_time('U')), 
                                    current_time('U')
                                );
                            ?>
                        </time>
                    </a>

                    <?php if ($comment->comment_approved == '0'): ?>
                        <p><?php esc_html_e('Your comment is a waiting moderation', 'blackridge'); ?></p>
                    <?php endif; ?>

                    <?php 
                        if ($comment->comment_type == '' || (($comment->comment_type == 'pingback' || $comment->comment_type == 'trackback') && !$args['short_ping'])) 
                        {
                            comment_text();
                            # code...
                        } 
                        
                        comment_reply_link(array_merge($args, array(
                            'depth' => $depth,
                            // 'max_depth' => $args['max_depth'],
                            'add_below' => 'div-comment'
                        )));
                    ?>
                </div><!-- content ends -->
            </article>
        </?>
        <?php
    }