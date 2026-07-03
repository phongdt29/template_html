<?php
/** Map + Request for quote. @package Lezo */
if ( ! defined( 'ABSPATH' ) ) exit;
$map   = lezo_mod( 'lezo_map_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d211676.0!2d-118.69192!3d34.02073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0!2sLos+Angeles!5e0!3m2!1sen!2sus!4v1600000000000' );
$title = lezo_mod( 'lezo_quote_title', 'Request for quote' );
$desc  = lezo_mod( 'lezo_quote_desc', 'The argument in favor of using filler text goes something like this. If you use real content in the design process.' );
?>
<section id="contact" class="quote-section">
	<div class="row g-0">
		<div class="col-lg-6 map-col">
			<iframe src="<?php echo esc_url( $map ); ?>" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
		<div class="col-lg-6 quote-col">
			<div class="quote-inner">
				<h2><?php echo esc_html( $title ); ?></h2>
				<p><?php echo esc_html( $desc ); ?></p>
				<form class="quote-form" method="post" action="#">
					<div class="row g-3">
						<div class="col-md-6"><input type="text" class="form-control" name="assist" placeholder="How to assist you?"></div>
						<div class="col-md-6"><input type="text" class="form-control" name="phone" placeholder="Phone number*"></div>
						<div class="col-md-6"><input type="text" class="form-control" name="name" placeholder="Your name*"></div>
						<div class="col-md-6"><button type="submit" class="btn btn-quote w-100"><?php esc_html_e( 'Submit Request', 'lezo' ); ?></button></div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
