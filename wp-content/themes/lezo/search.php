<?php
/** Search results. @package Lezo */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
$has_sidebar = is_active_sidebar( 'sidebar-blog' );
?>
<div class="page-hero">
	<div class="container">
		<h1><?php printf( esc_html__( 'Kết quả tìm kiếm: %s', 'lezo' ), '“' . esc_html( get_search_query() ) . '”' ); ?></h1>
		<?php lezo_breadcrumb(); ?>
	</div>
</div>
<section id="content" class="section">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<p class="text-muted mb-4"><?php printf( esc_html( _n( 'Tìm thấy %s kết quả.', 'Tìm thấy %s kết quả.', (int) $GLOBALS['wp_query']->found_posts, 'lezo' ) ), number_format_i18n( (int) $GLOBALS['wp_query']->found_posts ) ); ?></p>
		<?php endif; ?>
		<div class="row g-5">
			<div class="<?php echo $has_sidebar ? 'col-lg-8' : 'col-12'; ?>">
				<div class="row g-4">
					<?php
					if ( have_posts() ) {
						while ( have_posts() ) { the_post(); get_template_part( 'template-parts/content' ); }
					} else {
						get_template_part( 'template-parts/content', 'none' );
					}
					?>
				</div>
				<div class="mt-5"><?php lezo_pagination(); ?></div>
			</div>
			<?php if ( $has_sidebar ) get_sidebar(); ?>
		</div>
	</div>
</section>
<?php
get_footer();
