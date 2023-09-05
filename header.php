<!DOCTYPE html>
<html <?php language_attributes() ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ) ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head(); ?>
        
    </head>
    <body <?php body_class(); ?>>

        <header>
            <nav class="navbar bg-body-tertiary" aria-label="<?php esc_html_e( 'Main Navigation', 'blackridge' ) ?>">
                <div class="container-fluid">
                    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php esc_html( bloginfo( 'name' ) ); ?>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="" id="navbarNav">
                        <!-- <ul class="navbar-nav">
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                            </li>
                        </ul> -->

                        <?php wp_nav_menu( array(
                            'menu_class' => 'navbar-nav',
                            'theme_location' => 'main-menu'
                        ) ) ?>

                        <?php get_search_form( true ); ?>
                    </div>
                    
                </div>
            </nav>
        </header>