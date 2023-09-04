<form action="<?php echo esc_url( home_url( '/' ) ) ?>" method="get" class="d-flex" role="search">
    <input class="form-control me-2" type="search" name="s" 
        placeholder="<?php esc_attr_x( 'Search', 'placeholder', 'blackridge' ) ?>" aria-label="Search" 
        value="<?php esc_attr( get_search_query() ); ?>">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>