<?php
/** Advisors — loop CPT lezo_advisor. @package Lezo */
if ( ! defined( 'ABSPATH' ) ) exit;

$advisors = new WP_Query( array(
	'post_type'      => 'lezo_advisor',
	'posts_per_page' => 8,
	'orderby'        => 'menu_order date',
	'order'          => 'ASC',
) );

// Fallback demo nếu chưa có
$list = array();
if ( $advisors->have_posts() ) {
	while ( $advisors->have_posts() ) { $advisors->the_post();
		$list[] = array(
			'name'  => get_the_title(),
			'role'  => lezo_field( 'lezo_advisor_role', get_the_ID(), 'Member' ),
			'desc'  => lezo_field( 'lezo_advisor_desc', get_the_ID(), 'As more and more people are turning to organic.' ),
			'img'   => get_the_post_thumbnail_url( get_the_ID(), 'lezo-advisor' ),
			'fb'    => lezo_field( 'lezo_advisor_facebook', get_the_ID(), '#' ),
			'tw'    => lezo_field( 'lezo_advisor_twitter', get_the_ID(), '#' ),
			'in'    => lezo_field( 'lezo_advisor_linkedin', get_the_ID(), '#' ),
		);
	}
	wp_reset_postdata();
} else {
	$demo = array(
		array( 'David Warner', 'CEO', 'advisor-1' ),
		array( 'James Simth', 'Manager', 'advisor-2' ),
		array( 'Adam Rose', 'Employee', 'advisor-3' ),
		array( 'Kevin Peterson', 'Client', 'advisor-4' ),
	);
	foreach ( $demo as $d ) {
		$list[] = array(
			'name' => $d[0], 'role' => $d[1], 'desc' => 'As more and more people are turning to organic.',
			'img'  => LEZO_URI . '/assets/img/' . $d[2] . '.jpg', 'fb' => '#', 'tw' => '#', 'in' => '#',
		);
	}
}
?>
<section class="section advisors-section">
	<div class="container">
		<div class="section-heading text-center">
			<span class="section-label"><?php esc_html_e( 'Our Team', 'lezo' ); ?></span>
			<h2 class="section-title"><?php esc_html_e( 'Meet Our Advisors', 'lezo' ); ?></h2>
		</div>
		<div class="row g-4">
			<?php foreach ( $list as $a ) : ?>
				<div class="col-md-6 col-lg-3">
					<div class="advisor-card">
						<div class="advisor-img"><img src="<?php echo esc_url( $a['img'] ); ?>" alt="<?php echo esc_attr( $a['name'] ); ?>"></div>
						<div class="advisor-body">
							<h5><?php echo esc_html( $a['name'] ); ?></h5>
							<span class="advisor-role"><?php echo esc_html( $a['role'] ); ?></span>
							<p><?php echo esc_html( $a['desc'] ); ?></p>
							<div class="advisor-social">
								<a href="<?php echo esc_url( $a['fb'] ); ?>"><i class="bi bi-facebook"></i></a>
								<a href="<?php echo esc_url( $a['tw'] ); ?>"><i class="bi bi-twitter-x"></i></a>
								<a href="<?php echo esc_url( $a['in'] ); ?>"><i class="bi bi-linkedin"></i></a>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
