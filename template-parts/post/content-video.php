<?php
    $content = apply_filters('the_content', get_the_content());
    $videos = get_media_embedded_in_content($content, array('video', 'object', 'embed', 'iframe'));
?>

<div class="card my-3">
    <?php if (get_the_post_thumbnail() != '' && (empty($videos) || is_single())): ?>
        <div>
            <?php the_post_thumbnail( 'blackridge-blog-image', array('class' => 'img-responsive responsive--full card-img-top', 'title' => 'Feature image') ); ?>
        </div>
    <?php endif; ?>

    <?php if (!is_single() && !empty($videos)): ?>
        <div>
            <?php echo $videos[0]; ?>
        </div>
    <?php endif; ?>
        
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