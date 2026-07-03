<?php
/** Blog sidebar. @package Lezo */
if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! is_active_sidebar( 'sidebar-blog' ) ) return;
?>
<aside class="col-lg-4 lezo-sidebar">
	<?php dynamic_sidebar( 'sidebar-blog' ); ?>
</aside>
