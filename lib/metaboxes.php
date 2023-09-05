<?php

    function blackridge_add_meta_box()
    {
        add_meta_box( 
            'blackridge_post_metabox', 
            esc_html( 'Post Settings' ), // title
            'blackridge_post_metabox_html', // callback
            'post', // post type 
            'normal', 
            'default' 
        );
    }

    add_action( 'add_meta_boxes', 'blackridge_add_meta_box' );

    function blackridge_post_metabox_html($post)
    {
            $subtitle = get_post_meta( $post->ID, '_blackridge_post_subtitle_meta', true );
        ?>
        <p>
            <label for="blackridge_post_metabox_html">
                <?php esc_html_e( 'Post Subtitle', 'blackridge' ); ?>
            </label>
            <br>
            <input type="text" name="blackridge_post_subtitle_field" 
                id="blackridge_post_metabox_html" class="widefat"
            value="<?php echo esc_attr( $subtitle ); ?>">
        </p>
        <?php
    }

    function blackridge_save_post_metabox($post_id, $post)
    {
        if (array_key_exists('blackridge_post_subtitle_field', $_POST)) 
        {
            update_post_meta( $post_id, '_blackridge_post_subtitle_meta', sanitize_text_field( $_POST['blackridge_post_subtitle_field'] ) );
        }
    }

    add_action( 'save_post', 'blackridge_save_post_metabox', 10, 2 );