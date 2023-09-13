<?php 

    
    function blackridge_sanitize_sort_by($input)
    {
        $expected = array('date', 'rand', 'comment_count');
        if (in_array($input, $expected, true)) {
            return $input;
        }

        return 'date';
    }

    class BlackRidgeMostRecentWidget extends WP_Widget
    {
        public function __construct()
        {
            parent::__construct(
                'blackridge_most_recent_widget',
                esc_html__('hello Recent Posts', 'blackridge'),
                array(
                    'description' => esc_html__('some description', 'blackridge')
                )
            );
        }

        public function form($instance)
        {
                if (isset($instance['title'])) 
                {
                    $title = $instance['title'];
                }
                else{
                    $title = '';
                }
                if (isset($instance['post_count'])) 
                {
                    $post_count = $instance['post_count'];
                }
                else{
                    $post_count = 3;
                }
                if (isset($instance['include_date'])) 
                {
                    $include_date = $instance['include_date'];
                }
                else{
                    $include_date = false;
                }
                if (isset($instance['sort_by'])) 
                {
                    $sort_by = $instance['sort_by'];
                }
                else{
                    $sort_by = 'date';
                }
            ?>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:', 'blackridge'); ?></label>
                <input class="widefat" type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo esc_attr( $title ); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('post_count'); ?>"><?php esc_html_e('post count:', 'blackridge'); ?></label>
                <input class="widefat" type="number" name="<?php echo $this->get_field_name('post_count'); ?>" id="<?php echo $this->get_field_id('post_count'); ?>" min="1" value="<?php echo intval( $post_count ); ?>">
            </p>
            <p>
                <input <?php checked($include_date) ?> type="checkbox" name="<?php echo $this->get_field_name('include_date'); ?>" id="<?php echo $this->get_field_id('include_date'); ?>">
                <label for="<?php echo $this->get_field_id('include_date'); ?>"><?php esc_html_e('Include Date:', 'blackridge'); ?></label>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('sort_by'); ?>"><?php esc_html_e('sort by:', 'blackridge'); ?></label>
                <select class="widefat" name="<?php echo $this->get_field_name('sort_by'); ?>" id="<?php echo $this->get_field_id('sort_by'); ?>">
                    <option <?php selected( $sort_by, 'date' ); ?> value="date"><?php esc_html_e('Date', 'blackridge'); ?></option>
                    <option <?php selected( $sort_by, 'rand' ); ?> value="rand"><?php esc_html_e('Random', 'blackridge'); ?></option>
                    <option <?php selected( $sort_by, 'comment_count' ); ?> value="comment_count"><?php esc_html_e('Number of comments', 'blackridge'); ?></option>
                </select>
            </p>
            <?php
        }

        public function widget($args, $instance)
        {
            // var_dump($instance['include_date']);

            echo $args['before_widget'];
                if (isset($instance['title']) && !empty($instance['title'])) 
                {
                    $title = apply_filters('widget_title', $instance['title']);
                    echo $args['before_title'] . esc_html($title) .  $args['after_title'] ;
                }

                $most_recent_query = new WP_Query(
                    array(
                        'ignore_sticky_posts' => true,
                        'post_type' => 'post',
                        'posts_per_page' => isset($instance['posts_count']) ? intval($instance['posts_count']) : 3,
                        'orderby' => isset($instance['sort_by']) ? blackridge_sanitize_sort_by($instance['sort_by']) : 'date',
                    )
                );

                if ($most_recent_query->have_posts()) 
                {
                    echo '<div>';
                    while ($most_recent_query->have_posts()) 
                    {
                        $most_recent_query->the_post();
                        echo '<div style="color:#fff;">';
                        echo '<h6><a href="'. esc_url(get_permalink()) . '">' . get_the_title() . '</a></h6>';
                        echo isset($instance['include_date']) && $instance['include_date'] ? get_the_date() : '';
                        echo '</div>';
                    }
                    echo '</div>';
                }
            echo $args['after_widget'];
        }

        public function update($new_instance, $old_instance)
        {
            $instance = array();
            $instance['title'] = sanitize_text_field( $new_instance['title'] );
            $instance['post_count'] = intval( $new_instance['post_count'] );
            $instance['include_date'] = boolval( $new_instance['include_date'] );
            $instance['sort_by'] = blackridge_sanitize_sort_by( $new_instance['sort_by'] );
            return $instance;
        }

    }

    function blackridge_most_recent_widget()
    {
        register_widget('BlackRidgeMostRecentWidget');
    }

    add_action('widgets_init', 'blackridge_most_recent_widget');