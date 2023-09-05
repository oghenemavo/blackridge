<?php 
    $site_info = get_theme_mod( 'blackridge_site_info', '' ); 
?>

<?php if ($site_info): ?>
<div class="footer-site-info bg-dark">
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