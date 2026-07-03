<?php
/** Why Choose Us section. @package Lezo */
if ( ! defined( 'ABSPATH' ) ) exit;
$id    = lezo_front_id();
$title = lezo_field( 'lezo_why_title', $id, 'Why Choose Us' );
$desc  = lezo_field( 'lezo_why_desc', $id, 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.' );
$img   = lezo_field( 'lezo_why_image', $id, LEZO_URI . '/assets/img/why.jpg' );
$features = array(
	lezo_field( 'lezo_feature1', $id, 'bi-graph-up-arrow|Advanced Analytics' ),
	lezo_field( 'lezo_feature2', $id, 'bi-briefcase-fill|Corporate Finance' ),
	lezo_field( 'lezo_feature3', $id, 'bi-pc-display|Information Technology' ),
	lezo_field( 'lezo_feature4', $id, 'bi-diagram-3-fill|Our Workflow & Process' ),
);
?>
<section id="services" class="section why-section">
	<div class="container">
		<div class="row align-items-center g-5">
			<div class="col-lg-6">
				<img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="img-fluid rounded shadow-lg">
			</div>
			<div class="col-lg-6">
				<h2 class="section-title text-primary-custom"><?php echo esc_html( $title ); ?></h2>
				<p class="text-muted"><?php echo esc_html( $desc ); ?></p>
				<div class="row g-4 mt-2">
					<?php foreach ( $features as $f ) :
						$parts = array_map( 'trim', explode( '|', $f ) );
						$icon  = isset( $parts[0] ) ? $parts[0] : 'bi-check';
						$name  = isset( $parts[1] ) ? $parts[1] : ''; ?>
						<div class="col-sm-6">
							<div class="feature-box">
								<div class="feature-icon"><i class="bi <?php echo esc_attr( $icon ); ?>"></i></div>
								<h5><?php echo esc_html( $name ); ?></h5>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
