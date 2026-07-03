<?php
/** Our Cases carousel — loop CPT lezo_case (nhóm 4 ảnh/slide). @package Lezo */
if ( ! defined( 'ABSPATH' ) ) exit;

$cases = new WP_Query( array(
	'post_type'      => 'lezo_case',
	'posts_per_page' => -1,
	'orderby'        => 'menu_order date',
	'order'          => 'ASC',
) );

// Gom ảnh thành mảng
$items = array();
if ( $cases->have_posts() ) {
	while ( $cases->have_posts() ) { $cases->the_post();
		$items[] = array( 'img' => get_the_post_thumbnail_url( get_the_ID(), 'lezo-case' ), 'title' => get_the_title() );
	}
	wp_reset_postdata();
}
if ( empty( $items ) ) {
	for ( $n = 1; $n <= 8; $n++ ) {
		$items[] = array( 'img' => LEZO_URI . '/assets/img/case-' . $n . '.jpg', 'title' => 'Case ' . $n );
	}
}
$groups   = array_chunk( $items, 4 );
$cta_text = lezo_mod( 'lezo_cta_text', 'Want to make new project? contact with us. Our expert is ready to help you' );
?>
<section id="cases" class="section cases-section">
	<div class="container">
		<div class="section-heading text-center">
			<span class="section-label"><?php esc_html_e( 'Our Portfolio', 'lezo' ); ?></span>
			<h2 class="section-title"><?php esc_html_e( 'Our Cases', 'lezo' ); ?></h2>
		</div>
	</div>
	<div class="cases-carousel">
		<div id="casesCarousel" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-inner">
				<?php foreach ( $groups as $gi => $group ) : ?>
					<div class="carousel-item <?php echo 0 === $gi ? 'active' : ''; ?>">
						<div class="cases-track">
							<?php foreach ( $group as $it ) : ?>
								<div class="case-item">
									<img src="<?php echo esc_url( $it['img'] ); ?>" alt="<?php echo esc_attr( $it['title'] ); ?>">
									<div class="case-overlay"><i class="bi bi-plus-lg"></i></div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<?php if ( count( $groups ) > 1 ) : ?>
				<button class="carousel-control-prev" type="button" data-bs-target="#casesCarousel" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span></button>
				<button class="carousel-control-next" type="button" data-bs-target="#casesCarousel" data-bs-slide="next"><span class="carousel-control-next-icon"></span></button>
			<?php endif; ?>
		</div>
	</div>
	<div class="cases-cta">
		<div class="container text-center">
			<p class="mb-0"><?php echo wp_kses_post( $cta_text ); ?></p>
		</div>
	</div>
</section>
