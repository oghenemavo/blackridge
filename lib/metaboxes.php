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
            $layout = get_post_meta( $post->ID, '_blackridge_post_layout_meta', true );
            wp_nonce_field( 'blackridge_update_post_metabox', 'blackridge_update_post_nonce' );
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
        <p>
            <label for="blackridge_post_layout_field">
                <?php esc_html_e( 'Post Layout Field', 'blackridge' ); ?>
            </label>
            <br>
            <select class="widefat" name="blackridge_post_layout_field" id="blackridge_post_layout_field">
                <option <?php selected( $layout, 'full width' ) ?> value="full width"><?php echo esc_html_e( 'Full Width', 'blackridge' ); ?></option>
                <option <?php selected( $layout, 'sidebar' ) ?> value="sidebar"><?php echo esc_html_e( 'Sidebar', 'blackridge' ); ?></option>
            </select>
        </p>
        <?php
    }

    function blackridge_save_post_metabox($post_id, $post)
    {
        $edit_cap = get_post_type_object( $post->post_type )->cap->edit_post;
        if (!current_user_can( $edit_cap, $post_id )) {
            return;
        }

        if (!isset($_POST['blackridge_update_post_nonce']) || !wp_verify_nonce( $_POST['blackridge_update_post_nonce'], 'blackridge_update_post_metabox' )) 
        {
            return;
        }

        if (array_key_exists('blackridge_post_subtitle_field', $_POST)) 
        {
            update_post_meta( $post_id, '_blackridge_post_subtitle_meta', sanitize_text_field( $_POST['blackridge_post_subtitle_field'] ) );
        }

        if (array_key_exists('blackridge_post_layout_field', $_POST)) 
        {
            update_post_meta( $post_id, '_blackridge_post_layout_meta', sanitize_text_field( $_POST['blackridge_post_layout_field'] ) );
        }
    }

    add_action( 'save_post', 'blackridge_save_post_metabox', 10, 2 );