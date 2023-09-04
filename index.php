<?php get_header(); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php if (have_posts()): ?>
                    <?php while (have_posts()): ?>
                        <?php the_post(); ?>

                        <div class="card my-3">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                </h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo blackridge_post_short_meta(); ?></h6>
                                <p class="card-text"><?php the_excerpt(); ?></p>
                                
                                <?php echo blackridge_readmore_link(); ?>
                            </div>
                        </div>
            
                    <?php endwhile; ?>
            
                    <?php the_posts_pagination(); ?>
            
                    <?php do_action( 'blackridge_after_pagination' ); ?>
            
                <?php else: ?>
                    <p><?php echo apply_filters( 'blackridge_no_post_text', esc_html__( 'Sorry, no post matched your criteria', 'blackridge' )); ?></p>
                <?php endif; ?>
            </div>

            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>