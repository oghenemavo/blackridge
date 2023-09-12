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