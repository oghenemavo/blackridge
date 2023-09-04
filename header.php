<!DOCTYPE html>
<html <?php language_attributes() ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ) ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head(); ?>
        
    </head>
    <body <?php body_class(); ?>>

        <header>
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php esc_html( bloginfo( 'name' ) ); ?>
                    </a>
                    
                    <?php get_search_form( true ); ?>
                </div>
            </nav>
        </header>