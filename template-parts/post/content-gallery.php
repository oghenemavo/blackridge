<?php
    $blocks = gutenberg_parse_blocks(get_the_content());
    $gallery = false;
    foreach ($blocks as $block) {
        if ($block['blockName'] === 'core/gallery') {
            $gallery = $block;
            break;
        }
    }
?>
 
<div class="card my-3">
    <?php if (get_the_post_thumbnail() != '' && (!$gallery || is_single())): ?>
        <div>
            <?php the_post_thumbnail( 'large', array('class' => 'img-responsive responsive--full card-img-top', 'title' => 'Feature image') ); ?>
        </div>
    <?php endif; ?>

    <?php if (!is_single() && get_post_gallery()): ?>
        <div>
            <?php 
                echo $gallery['innerHTML'];
            ?>
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