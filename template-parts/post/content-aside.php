<div class="card my-3">

    <div class="card-body">
        
        <div>
            <?php the_content(); ?>
        </div>

        <?php if (is_single()): ?>
            <?php get_template_part('template-parts/post/footer'); ?>
        <?php endif; ?>

        <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo blackridge_post_short_meta(); ?></h6>

    </div>

</div>