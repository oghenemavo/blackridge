<?php if (have_posts()): ?>
    <?php while (have_posts()): ?>

        <?php the_post(); ?>
        <?php get_template_part( 'template-parts/post/content', get_post_format() ); ?>

    <?php endwhile; ?>

    <?php the_posts_pagination(); ?>

    <?php do_action( 'blackridge_after_pagination' ); ?>

<?php else: ?>
    <?php get_template_part( 'template-parts/post/content', 'none' ); ?>
<?php endif; ?>