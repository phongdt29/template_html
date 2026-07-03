<?php
/** Counters section. @package Lezo */
if ( ! defined( 'ABSPATH' ) ) exit;
$defaults = array(
	1 => array( 'bi-people-fill', '81', '', 'Team Members' ),
	2 => array( 'bi-emoji-smile-fill', '226', '', 'Satisfied Clients' ),
	3 => array( 'bi-briefcase-fill', '308', '', 'New Projects' ),
	4 => array( 'bi-bar-chart-fill', '95', '%', 'Profit Increased' ),
);
?>
<section class="section counter-section">
	<div class="container">
		<div class="row text-center g-4">
			<?php foreach ( $defaults as $i => $d ) :
				$icon   = lezo_mod( "lezo_counter{$i}_icon", $d[0] );
				$num    = lezo_mod( "lezo_counter{$i}_num", $d[1] );
				$suffix = lezo_mod( "lezo_counter{$i}_suffix", $d[2] );
				$label  = lezo_mod( "lezo_counter{$i}_label", $d[3] ); ?>
				<div class="col-6 col-md-3">
					<div class="counter-box">
						<i class="bi <?php echo esc_attr( $icon ); ?>"></i>
						<h3 class="counter" data-target="<?php echo esc_attr( $num ); ?>"<?php echo $suffix ? ' data-suffix="' . esc_attr( $suffix ) . '"' : ''; ?>>0</h3>
						<p><?php echo esc_html( $label ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
