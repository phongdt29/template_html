<?php
/** 404. @package Lezo */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>
<section class="section text-center">
	<div class="container">
		<h1 style="font-size:90px;color:var(--primary);font-weight:700;margin:0;">404</h1>
		<h2 class="section-title"><?php esc_html_e( 'Không tìm thấy trang', 'lezo' ); ?></h2>
		<p class="text-muted mb-4"><?php esc_html_e( 'Trang bạn tìm không tồn tại hoặc đã bị di chuyển.', 'lezo' ); ?></p>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary-custom"><?php esc_html_e( 'Về trang chủ', 'lezo' ); ?></a>
		<div class="mt-4 mx-auto" style="max-width:400px;"><?php get_search_form(); ?></div>
	</div>
</section>
<?php
get_footer();
