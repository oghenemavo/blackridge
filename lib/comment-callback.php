<?php 

    function blackridge_comment_callback($comment, $args, $depth)
    {
        ?>
        <li id="comment-<?php comment_ID(); ?>" <?php comment_class(array('class1', $comment->comment_parent ? 'class-child': '')) ?>>
            <article class="">
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
                </div><!-- content ends -->
            </article>
        </li>
        <?php
    }