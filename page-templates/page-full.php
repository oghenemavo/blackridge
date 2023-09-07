<?php
    /**
     * Template Name: Full Width Page
     */
    get_header();
    // TODO: page template no work
?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php get_template_part( 'loop', 'page' ); ?>
            </div>

        </div>
    </div>

<?php get_footer(); ?>