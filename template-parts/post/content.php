<div class="card my-3">
    <?php 
        if (get_the_post_thumbnail() != '') 
        {
            the_post_thumbnail( 'large', array('class' => 'img-responsive responsive--full card-img-top', 'title' => 'Feature image') );
        }
    ?>
    <div class="card-body">
        
        <?php get_template_part('template-parts/post/header'); ?>

        <?php if (is_single()): ?>
            <?php the_content(); ?>
        <?php else: ?>
            <p class="card-text"><?php the_excerpt(); ?></p>
        <?php endif; ?>

        <?php if (is_single()): ?>
            <?php get_template_part('template-parts/post/footer'); ?>
        <?php endif; ?>
        
        <?php 
            if (!is_single()) 
            {
                echo blackridge_readmore_link();
            }
        ?>
    </div>
</div>