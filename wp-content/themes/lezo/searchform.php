<?php
/** Search form. @package Lezo */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<form role="search" method="get" class="lezo-search-form d-flex" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="form-control" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e( 'Tìm kiếm...', 'lezo' ); ?>" aria-label="<?php esc_attr_e( 'Tìm kiếm', 'lezo' ); ?>">
	<button type="submit" class="btn btn-primary-custom"><i class="bi bi-search"></i></button>
</form>
