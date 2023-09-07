<?php get_header(); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3><?php esc_html_e('Nothing found here, maybe you can try search?', 'blackridge'); ?></h3> 
            </div>

            <?php get_search_form(); ?>
        </div>
    </div>

<?php get_footer(); ?>