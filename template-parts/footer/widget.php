<?php 
    $footerLayout = '3,3,3,3';
    $columns = explode(',', $footerLayout);
    $isWidgetActive = false;

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
    <div class="custom-footer">
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