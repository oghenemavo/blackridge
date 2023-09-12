<header>
    <?php if (is_single()): ?>
        <h1 class="card-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
        </h1>
    <?php else: ?>
        <h5 class="card-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
        </h5>
    <?php endif; ?>
    <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo blackridge_post_short_meta(); ?></h6>
</header>