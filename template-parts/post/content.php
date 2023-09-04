<div class="card my-3">
    <div class="card-body">
        <h5 class="card-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
        </h5>
        <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo blackridge_post_short_meta(); ?></h6>
        <p class="card-text"><?php the_excerpt(); ?></p>
        
        <?php echo blackridge_readmore_link(); ?>
    </div>
</div>