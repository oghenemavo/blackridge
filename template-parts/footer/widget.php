<?php 
    $footerLayout = '3,3,3,3';
    $columns = explode(',', $footerLayout);
    $isWidgetActive = false;
    $bg_color = blackridge_sanitize_footer_bg( get_theme_mod( 'blackridge_footer_bg', 'dark' ) ); 

    foreach ($columns as $key => $column) 
    {
        $j = $key+1;
        if (is_active_sidebar('footer-sidebar-' . $j))
        {
            $isWidgetActive = true;
        }
    }
?>

<?php if ($isWidgetActive): ?>
    <div class="custom-footer my-2 bg-<?php echo $bg_color ?? 'dark'; ?>">
        <div class="container">
            <div class="row">

                <?php foreach($columns as $key => $column): $j = $key+1; ?>
                    <div class="col-md-<?php echo $column; ?>">
                        <?php
                            if (is_active_sidebar('footer-sidebar-' . $j)) 
                            {
                                dynamic_sidebar( 'footer-sidebar-' . $j );
                            }
                        ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>