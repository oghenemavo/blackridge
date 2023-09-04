<?php get_header(); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <header>
                    <?php the_archive_title( '<h1>', '</h1>' ); ?>
                    <?php the_archive_description( '<p>', '</p>' ); ?>
                </header>
            </div>

            <div class="col-md-<?php echo is_active_sidebar( 'primary_sidebar' ) ? 8 : 12; ?>">
                <?php get_template_part( 'loop', 'archive' ); ?>
            </div>

            <?php if (is_active_sidebar( 'primary_sidebar' )): ?>
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            <?php endif; ?>

        </div>
    </div>

<?php get_footer(); ?>