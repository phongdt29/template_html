<?php
/**
 * Footer.
 *
 * @package Lezo
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<!-- ============ FOOTER ============ -->
<footer class="footer">
	<div class="container">
		<div class="row g-4">
			<div class="col-lg-3 col-md-6">
				<?php if ( is_active_sidebar( 'footer-1' ) ) : dynamic_sidebar( 'footer-1' ); else : ?>
					<a class="navbar-brand footer-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php lezo_brand( true ); ?></a>
					<p class="mt-3"><?php echo esc_html( lezo_mod( 'lezo_footer_about', 'Efficiently unleash cross-media information without cross-media value.' ) ); ?></p>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-outline-light btn-sm mt-2">Read More</a>
				<?php endif; ?>
			</div>

			<div class="col-lg-3 col-md-6">
				<?php if ( is_active_sidebar( 'footer-2' ) ) : dynamic_sidebar( 'footer-2' ); else : ?>
				<h5 class="footer-title"><?php esc_html_e( 'Usefull Links', 'lezo' ); ?></h5>
				<?php if ( has_nav_menu( 'footer' ) ) : ?>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer',
						'container'      => false,
						'menu_class'     => 'footer-links',
						'depth'          => 1,
					) );
					?>
				<?php else : ?>
					<ul class="footer-links">
						<?php
						$fp = get_pages( array( 'number' => 6 ) );
						if ( $fp ) {
							foreach ( $fp as $p ) {
								echo '<li><a href="' . esc_url( get_permalink( $p->ID ) ) . '"><i class="bi bi-chevron-right"></i> ' . esc_html( $p->post_title ) . '</a></li>';
							}
						} else {
							$links = array( 'Business Growth', 'Sustainability', 'Performance', 'Customer Insights', 'Organization', 'Advanced Analytics' );
							foreach ( $links as $l ) {
								echo '<li><a href="#"><i class="bi bi-chevron-right"></i> ' . esc_html( $l ) . '</a></li>';
							}
						}
						?>
					</ul>
				<?php endif; ?>
				<?php endif; ?>
			</div>

			<div class="col-lg-3 col-md-6">
				<?php if ( is_active_sidebar( 'footer-3' ) ) : dynamic_sidebar( 'footer-3' ); else : ?>
				<h5 class="footer-title"><?php esc_html_e( 'Latest News', 'lezo' ); ?></h5>
				<div class="footer-news">
					<?php
					$recent = new WP_Query( array( 'posts_per_page' => 2, 'ignore_sticky_posts' => true ) );
					if ( $recent->have_posts() ) :
						while ( $recent->have_posts() ) : $recent->the_post(); ?>
							<div class="d-flex mb-3">
								<?php if ( has_post_thumbnail() ) : ?>
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail', array( 'width' => 65, 'height' => 65 ) ); ?></a>
								<?php endif; ?>
								<div class="ms-3">
									<span class="fn-date"><i class="bi bi-calendar3"></i> <?php echo esc_html( get_the_date() ); ?></span>
									<p class="mb-0"><a href="<?php the_permalink(); ?>"><?php echo esc_html( wp_trim_words( get_the_title(), 8 ) ); ?></a></p>
								</div>
							</div>
						<?php endwhile;
						wp_reset_postdata();
					endif; ?>
				</div>
				<?php endif; ?>
			</div>

			<div class="col-lg-3 col-md-6">
				<?php if ( is_active_sidebar( 'footer-4' ) ) : dynamic_sidebar( 'footer-4' ); else : ?>
				<h5 class="footer-title"><?php esc_html_e( 'Contact Info', 'lezo' ); ?></h5>
				<ul class="footer-contact">
					<li><i class="bi bi-geo-alt-fill"></i> <div><strong>Address</strong><br><?php echo esc_html( lezo_mod( 'lezo_footer_addr', '185, Industry Street, Los Angeles, USA.' ) ); ?></div></li>
					<li><i class="bi bi-telephone-fill"></i> <div><strong>Call Us On</strong><br><?php echo esc_html( lezo_mod( 'lezo_footer_phone', 'Front Desk: +000-0000-0000 & 00' ) ); ?></div></li>
					<li><i class="bi bi-envelope-fill"></i> <div><strong>Email at</strong><br><?php echo esc_html( lezo_mod( 'lezo_footer_email', 'Support-team@i.com' ) ); ?></div></li>
				</ul>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="footer-bottom">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<p class="mb-0"><?php echo wp_kses_post( lezo_mod( 'lezo_copyright', '© ' . date( 'Y' ) . ' Template Hub. All Rights Reserved.' ) ); ?></p>
				</div>
				<div class="col-md-6 text-md-end">
					<ul class="list-inline mb-0 footer-bottom-links">
						<li class="list-inline-item"><a href="#">Legal</a></li>
						<li class="list-inline-item"><a href="#">Sitemap</a></li>
						<li class="list-inline-item"><a href="<?php echo esc_url( get_privacy_policy_url() ); ?>">Privacy Policy</a></li>
						<li class="list-inline-item"><a href="#">Terms &amp; Condition</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>

<!-- ============ THEME CUSTOMIZER (đổi màu) ============ -->
<div class="theme-customizer" id="themeCustomizer">
	<button class="tc-toggle" id="tcToggle" type="button" aria-label="Tùy chỉnh giao diện"><i class="bi bi-gear-fill"></i></button>
	<div class="tc-panel">
		<h6>Màu chủ đạo</h6>
		<div class="tc-colors">
			<button class="tc-color active" type="button" data-color="#17a9e0" data-dark="#0f8fc0" style="background:#17a9e0"></button>
			<button class="tc-color" type="button" data-color="#2ecc71" data-dark="#25a25a" style="background:#2ecc71"></button>
			<button class="tc-color" type="button" data-color="#e74c3c" data-dark="#c0392b" style="background:#e74c3c"></button>
			<button class="tc-color" type="button" data-color="#9b59b6" data-dark="#7d3c98" style="background:#9b59b6"></button>
			<button class="tc-color" type="button" data-color="#f39c12" data-dark="#d68910" style="background:#f39c12"></button>
			<button class="tc-color" type="button" data-color="#1abc9c" data-dark="#148f77" style="background:#1abc9c"></button>
			<button class="tc-color" type="button" data-color="#e84393" data-dark="#c62c78" style="background:#e84393"></button>
			<button class="tc-color" type="button" data-color="#34495e" data-dark="#2c3e50" style="background:#34495e"></button>
		</div>
		<button class="tc-reset" type="button" id="tcReset"><i class="bi bi-arrow-counterclockwise"></i> Mặc định</button>
	</div>
</div>

<a href="#" class="back-to-top" id="backToTop"><i class="bi bi-arrow-up"></i></a>

<?php wp_footer(); ?>
</body>
</html>
