<?php
    $prev = get_previous_post();
    $next = get_next_post();
?>

<?php if ($prev || $next): ?>
    <nav role="navigation">
        <h2 class="screen-reader-text"><?php esc_attr_e( 'Post Navigation', 'blackridge' ); ?></h2>
        <div>
            <?php if ($prev): ?>
                <div>
                    <a href="<?php the_permalink( $prev->ID ); ?>">
                        <?php if (has_post_thumbnail( $prev->ID )): ?>
                            <div>
                                <?php get_the_post_thumbnail( $prev->ID, 'thumbnail' ); ?>
                            </div>
                        <?php endif; ?>
                        <div>
                            <span>
                                <?php echo esc_html_e( 'Previous Post', 'blackridge' ); ?>
                            </span>
                            <span>
                                <?php echo esc_html( get_the_title( $prev->ID ) ); ?>
                            </span>
                        </div>
                    </a>
                </div>
            <?php endif; ?>

            <?php if ($next): ?>
                <div>
                    <a href="<?php the_permalink( $next->ID ); ?>">
                        <?php if (has_post_thumbnail( $next->ID )): ?>
                            <div>
                                <?php get_the_post_thumbnail( $next->ID, 'thumbnail' ); ?>
                            </div>
                        <?php endif; ?>
                        <div>
                            <span>
                                <?php echo esc_html_e( 'Next Post', 'blackridge' ); ?>
                            </span>
                            <span>
                                <?php echo esc_html( get_the_title( $next->ID ) ); ?>
                            </span>
                        </div>
                    </a>
                </div>
            <?php endif; ?>

        </div>
    </nav>
<?php endif; ?>