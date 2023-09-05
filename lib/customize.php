<?php 

    function blackridge_customize_register($wp_customize)
    {
        $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';

        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector' => '.navbar-brand',
            'container_inclusive' => false,
            'render_callback' => function() {
                bloginfo( 'name' );
            },
        ));

        $wp_customize->selective_refresh->add_partial('blogname', array(
            'settings' => array('blackridge_site_info'),
            'selector' => '.footer-site-info',
            'container_inclusive' => true,
            'render_callback' => function() {
                get_template_part( 'template-parts/footer/info' );
            },
        ));

        $wp_customize->add_section('blackridge_footer_options', array(
            'title' => esc_html__( 'Footer Options', 'blackridge' ),
            'description' => esc_html__( 'You can change your footer options here.', 'blackridge' ),
        ));

        $wp_customize->add_setting('blackridge_site_info', array(
            'default' => '',
            // 'sanitize_callback' => 'sanitize_text_field',
            'sanitize_callback' => 'blackridge_sanitize_site_info',
            'transport' => 'postMessage' // refresh
        ));

        $wp_customize->add_control('blackridge_site_info', array(
            'type' => 'text',
            'label' => esc_html__( 'Site Info', 'blackridge' ),
            'section' => 'blackridge_footer_options',
        ));
    }

    add_action( 'customize_register', 'blackridge_customize_register' );

    function blackridge_sanitize_site_info($input)
    {
        $allowed_html = array(
            'a' => array(
                'href' => array(),
                'title' => array(),
            ),
        );

        return wp_kses( $input, $allowed_html );
    }