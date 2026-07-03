<?php
/** Blog / home posts index. @package Lezo */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
$has_sidebar = is_active_sidebar( 'sidebar-blog' );
?>
<div class="page-hero">
	<div class="container">
		<h1><?php
			if ( ( $blog = get_option( 'page_for_posts' ) ) ) { echo esc_html( get_the_title( $blog ) ); }
			else { esc_html_e( 'Our Blog', 'lezo' ); }
		?></h1>
		<?php lezo_breadcrumb(); ?>
	</div>
</div>

<section class="section">
	<div class="container">
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
