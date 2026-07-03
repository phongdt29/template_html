<?php
/** Testimonial + Business Growth. @package Lezo */
if ( ! defined( 'ABSPATH' ) ) exit;
$id     = lezo_front_id();
$quote  = lezo_field( 'lezo_tm_quote', $id, 'The first mate and his Skipper too will do their very best to make the man named Brady tropic Island next these are the voyages.' );
$author = lezo_field( 'lezo_tm_author', $id, 'John Abraham' );
$role   = lezo_field( 'lezo_tm_role', $id, 'Morris, CEO' );
$avatar = lezo_field( 'lezo_tm_avatar', $id, LEZO_URI . '/assets/img/avatar.jpg' );
$bars = array(
	array( '2015', 60, 80 ), array( '2016', 45, 65 ), array( '2017', 70, 90 ),
	array( '2018', 55, 75 ), array( '2019', 80, 100 ),
);
?>
<section class="section testimonial-section">
	<div class="container">
		<div class="row g-5 align-items-center">
			<div class="col-lg-6">
				<h2 class="section-title"><?php esc_html_e( 'Testimonial', 'lezo' ); ?></h2>
				<div class="testimonial-box">
					<div class="d-flex align-items-center mb-3">
						<img src="<?php echo esc_url( $avatar ); ?>" alt="<?php echo esc_attr( $author ); ?>" class="testimonial-avatar">
						<div class="ms-3">
							<h5 class="mb-0"><?php echo esc_html( $author ); ?></h5>
							<small class="text-muted"><?php echo esc_html( $role ); ?></small>
						</div>
						<i class="bi bi-quote quote-icon ms-auto"></i>
					</div>
					<p class="testimonial-text">"<?php echo esc_html( $quote ); ?>"</p>
					<div class="testimonial-stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
				</div>
			</div>
			<div class="col-lg-6">
				<h2 class="section-title"><?php esc_html_e( 'Business Growth', 'lezo' ); ?></h2>
				<div class="growth-chart">
					<div class="chart-bars">
						<?php foreach ( $bars as $b ) : ?>
							<div class="chart-col">
								<div class="bar bar-light" style="height:<?php echo (int) $b[1]; ?>%"></div>
								<div class="bar bar-dark" style="height:<?php echo (int) $b[2]; ?>%"></div>
								<span><?php echo esc_html( $b[0] ); ?></span>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="chart-legend">
						<span><i class="dot dot-light"></i> Investment</span>
						<span><i class="dot dot-dark"></i> Revenue</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
