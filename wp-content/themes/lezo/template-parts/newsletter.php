<?php
/** Newsletter. @package Lezo */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<section class="newsletter-section">
	<div class="container">
		<div class="row align-items-center g-3">
			<div class="col-lg-5">
				<h3 class="mb-1"><?php echo esc_html( lezo_mod( 'lezo_newsletter_title', 'Newsletter Subscribe' ) ); ?></h3>
				<p class="mb-0 text-muted"><?php echo esc_html( lezo_mod( 'lezo_newsletter_desc', 'Sign up today for hints, tips and the latest updates.' ) ); ?></p>
			</div>
			<div class="col-lg-7">
				<form class="newsletter-form d-flex" method="post" action="#">
					<input type="email" class="form-control" name="email" placeholder="Enter Email Address" required>
					<button type="submit" class="btn btn-primary-custom"><?php esc_html_e( 'Subscribe', 'lezo' ); ?></button>
				</form>
			</div>
		</div>
	</div>
</section>
