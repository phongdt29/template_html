<?php
/** Partners logos. @package Lezo */
if ( ! defined( 'ABSPATH' ) ) exit;
$partners = array(
	array( 'bi-hexagon', 'Logoipsum' ),
	array( 'bi-lightbulb', 'IdeaLab' ),
	array( 'bi-house-door', 'HomeCo' ),
	array( 'bi-pen', 'Designers' ),
	array( 'bi-alexa', 'Alpha' ),
);
?>
<section class="partners-section">
	<div class="container">
		<div class="row align-items-center justify-content-between g-4 text-center">
			<?php foreach ( $partners as $p ) : ?>
				<div class="col-4 col-md-2"><div class="partner-logo"><i class="bi <?php echo esc_attr( $p[0] ); ?>"></i> <?php echo esc_html( $p[1] ); ?></div></div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
