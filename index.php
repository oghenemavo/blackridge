<?php get_header(); ?>
    <?php if (have_posts()): ?>
        <?php while (have_posts()): ?>
            <?php the_post(); ?>

            <h1>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
            </h1>

            <div>
                <?php echo blackridge_post_short_meta(); ?>
            </div>

            <div>
                <?php the_excerpt(); ?>
            </div>
            <?php echo blackridge_readmore_link(); ?>
        <?php endwhile; ?>

        <?php the_posts_pagination(); ?>

    <?php endif; ?>
<?php get_footer(); ?>