<?php
/** About section. @package Lezo */
if ( ! defined( 'ABSPATH' ) ) exit;
$id      = lezo_front_id();
$label   = lezo_field( 'lezo_about_label', $id, 'About our company' );
$number  = lezo_field( 'lezo_about_number', $id, '30' );
$title   = lezo_field( 'lezo_about_title', $id, 'years of excellence in sales training solutions' );
$p1      = lezo_field( 'lezo_about_p1', $id, 'These men promptly escaped from a maximum security stockade to the Los Angeles underground.' );
$p2      = lezo_field( 'lezo_about_p2', $id, 'If you have a problem, if no one else can help, maybe you can hire the professional team.' );
$img     = lezo_field( 'lezo_about_image', $id, LEZO_URI . '/assets/img/about.jpg' );
$video   = lezo_field( 'lezo_about_video', $id, '#' );
$awards  = array(
	lezo_field( 'lezo_award1', $id, '2014|National Award' ),
	lezo_field( 'lezo_award2', $id, '2016|Global Award' ),
	lezo_field( 'lezo_award3', $id, '2019|Honor Award' ),
);
// Nếu title đã chứa số ở đầu thì tách ra
?>
<section id="about" class="section about-section">
	<div class="container">
		<div class="row align-items-center g-5">
			<div class="col-lg-6">
				<span class="section-label"><?php echo esc_html( $label ); ?></span>
				<h2 class="section-title"><span class="highlight-num"><?php echo esc_html( $number ); ?></span> <?php echo esc_html( preg_replace( '/^\s*' . preg_quote( $number, '/' ) . '\s*/', '', $title ) ); ?></h2>
				<p class="text-muted"><?php echo esc_html( $p1 ); ?></p>
				<p class="text-muted"><?php echo esc_html( $p2 ); ?></p>
				<div class="row awards mt-4">
					<?php foreach ( $awards as $a ) :
						$parts = array_map( 'trim', explode( '|', $a ) );
						$year  = isset( $parts[0] ) ? $parts[0] : '';
						$name  = isset( $parts[1] ) ? $parts[1] : ''; ?>
						<div class="col-4 text-center">
							<i class="bi bi-award-fill award-icon"></i>
							<h4><?php echo esc_html( $year ); ?></h4>
							<p><?php echo esc_html( $name ); ?></p>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="about-img-wrap">
					<img src="<?php echo esc_url( $img ); ?>" alt="<?php esc_attr_e( 'About us', 'lezo' ); ?>" class="img-fluid rounded shadow">
					<a href="<?php echo esc_url( $video ); ?>" class="play-btn"><i class="bi bi-play-fill"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
