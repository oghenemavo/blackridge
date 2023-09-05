<?php 

    $accent_color = sanitize_hex_color( get_theme_mod( 'blackridge_accent_color', '#20ddae' ) );

    $inline_styles = "
        a {
            color: {$accent_color}
        }
        :focus {
            outline-focus: {$accent_color}
        }
    ";