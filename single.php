<?php get_header(); ?>

<?php
    $layout = blackridge_meta(get_the_ID(), '_blackridge_post_layout', 'full' );
    $sidebar = is_active_sidebar( 'primary-sidebar' );
    if ($layout === 'sidebar' && !$sidebar) 
    {
        $layout = 'full';
    }

?>

    <div class="container">
        <div class="row">
            <div class="col-md-<?php echo $layout === 'sidebar' ? 8 : 12; ?>">
                <?php if (have_posts()): ?>
                    <?php while (have_posts()): ?>

                        <?php the_post(); ?>
                        
                        <?php get_template_part( 'template-parts/post/content' ); ?>
                        <?php get_template_part( 'template-parts/single/author' ); ?>

                    <?php endwhile; ?>
                    

                <?php else: ?>
                    <?php get_template_part( 'template-parts/post/content', 'none' ); ?>
                <?php endif; ?>

            </div>

            <?php if ($layout === 'sidebar'): ?>
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            <?php endif; ?>

        </div>
    </div>

<?php get_footer(); ?>