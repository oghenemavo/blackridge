<div class="card my-3">
    <?php 
        if (get_the_post_thumbnail() != '') 
        {
            the_post_thumbnail( 'large', array('class' => 'img-responsive responsive--full card-img-top', 'title' => 'Feature image') );
        }
    ?>
    <div class="card-body">
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

        <?php if (is_single()): ?>
            <?php the_content(); ?>
        <?php else: ?>
            <p class="card-text"><?php the_excerpt(); ?></p>
        <?php endif; ?>

        <?php if (is_single()): ?>
            <footer>
                <?php 
                    if (has_category()) {
                        echo '<div>';
                        $cat_list = get_the_category_list( esc_html__(', ', 'blackridge') );
                        printf(esc_html__('Posted in %s', 'blackridge'), $cat_list);
                        echo '</div>';
                    }

                    if (has_tag()) {
                        echo '<div>';
                        $tags_list = get_the_tag_list( '<ul><li>', '</li><li>', '</li></ul>' );
                        echo $tags_list;
                        echo '</div>';
                    }
                ?>
            </footer>
        <?php endif; ?>
        
        <?php 
            if (!is_single()) 
            {
                echo blackridge_readmore_link();
            }
        ?>
    </div>
</div>