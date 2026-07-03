<?php
/** Hero slider — loop CPT lezo_slide. @package Lezo */
if ( ! defined( 'ABSPATH' ) ) exit;

$slides = new WP_Query( array(
	'post_type'      => 'lezo_slide',
	'posts_per_page' => -1,
	'orderby'        => 'menu_order date',
	'order'          => 'ASC',
) );
?>
<section id="home" class="hero">
	<div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
		<div class="carousel-inner">
			<?php if ( $slides->have_posts() ) : $i = 0; ?>
				<?php while ( $slides->have_posts() ) : $slides->the_post(); $i++;
					$bg   = get_the_post_thumbnail_url( get_the_ID(), 'lezo-hero' );
					$sub  = lezo_field( 'lezo_slide_subtitle', get_the_ID(), 'We Help' );
					$desc = lezo_field( 'lezo_slide_desc', get_the_ID(), '' );
					$b1t  = lezo_field( 'lezo_slide_btn1_text', get_the_ID(), 'Our Services' );
					$b1l  = lezo_field( 'lezo_slide_btn1_link', get_the_ID(), '#services' );
					$b2t  = lezo_field( 'lezo_slide_btn2_text', get_the_ID(), 'Get In Touch' );
					$b2l  = lezo_field( 'lezo_slide_btn2_link', get_the_ID(), '#contact' );
					?>
					<div class="carousel-item <?php echo 1 === $i ? 'active' : ''; ?>" style="background-image:url('<?php echo esc_url( $bg ); ?>');">
						<div class="hero-overlay"></div>
						<div class="container">
							<div class="hero-content">
								<?php if ( $sub ) : ?><span class="hero-subtitle"><?php echo esc_html( $sub ); ?></span><?php endif; ?>
								<h1 class="hero-title"><?php the_title(); ?></h1>
								<?php if ( $desc ) : ?><p class="hero-desc"><?php echo esc_html( $desc ); ?></p><?php endif; ?>
								<div class="hero-buttons">
									<?php if ( $b1t ) : ?><a href="<?php echo esc_url( $b1l ); ?>" class="btn btn-primary-custom"><?php echo esc_html( $b1t ); ?></a><?php endif; ?>
									<?php if ( $b2t ) : ?><a href="<?php echo esc_url( $b2l ); ?>" class="btn btn-outline-custom"><?php echo esc_html( $b2t ); ?></a><?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; wp_reset_postdata(); ?>
			<?php else : ?>
				<div class="carousel-item active" style="background-image:url('<?php echo esc_url( LEZO_URI . '/assets/img/hero-1.jpg' ); ?>');">
					<div class="hero-overlay"></div>
					<div class="container">
						<div class="hero-content">
							<span class="hero-subtitle">We Help</span>
							<h1 class="hero-title">Growing Business</h1>
							<p class="hero-desc">We help you managing asset, provide financial advice, leave money issue behind and focus on what matters most.</p>
							<div class="hero-buttons">
								<a href="#services" class="btn btn-primary-custom">Our Services</a>
								<a href="#contact" class="btn btn-outline-custom">Get In Touch</a>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span></button>
		<button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next"><span class="carousel-control-next-icon"></span></button>
	</div>
</section>
