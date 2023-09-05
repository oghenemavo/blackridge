<?php 
    $site_info = get_theme_mod( 'blackridge_site_info', '' ); 
    $bg_color = blackridge_sanitize_footer_bg( get_theme_mod( 'blackridge_footer_bg', 'dark' ) ); 
?>

<?php if ($site_info): ?>
<div class="footer-site-info bg-<?php echo $bg_color ?? 'dark'; ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-light text-center">
                <?php 
                    $allowed_html = array(
                        'a' => array(
                            'href' => array(),
                            'title' => array(),
                        ),
                    );
                    echo wp_kses( $site_info, $allowed_html ); 
                ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>