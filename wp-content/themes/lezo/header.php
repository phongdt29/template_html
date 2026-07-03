<?php
/**
 * Header: top bar + header info + navbar.
 *
 * @package Lezo
 */
if ( ! defined( 'ABSPATH' ) ) exit;
$socials = lezo_socials();
$social_icons = array( 'facebook' => 'bi-facebook', 'twitter-x' => 'bi-twitter-x', 'google' => 'bi-google', 'linkedin' => 'bi-linkedin' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ============ TOP BAR ============ -->
<div class="top-bar d-none d-lg-block">
	<div class="container">
		<div class="d-flex justify-content-between align-items-stretch">
			<p class="mb-0 top-welcome"><?php echo esc_html( lezo_mod( 'lezo_topbar_welcome', 'Welcome to Lezo Financial Services, we have over 25 years of expertise' ) ); ?></p>
			<ul class="list-unstyled d-flex align-items-center mb-0 top-social">
				<?php foreach ( $social_icons as $key => $icon ) :
					$url = isset( $socials[ $key ] ) ? $socials[ $key ] : '#'; ?>
					<li><a href="<?php echo esc_url( $url ); ?>"><i class="bi <?php echo esc_attr( $icon ); ?>"></i></a></li>
				<?php endforeach; ?>
				<li class="lang">
					<svg class="flag" width="22" height="13" viewBox="0 0 60 30" xmlns="http://www.w3.org/2000/svg">
						<clipPath id="uks"><path d="M0,0 v30 h60 v-30 z"/></clipPath>
						<clipPath id="ukt"><path d="M30,15 h30 v15 z v15 h-30 z h-30 v-15 z v-15 h30 z"/></clipPath>
						<g clip-path="url(#uks)">
							<path d="M0,0 v30 h60 v-30 z" fill="#012169"/>
							<path d="M0,0 L60,30 M60,0 L0,30" stroke="#fff" stroke-width="6"/>
							<path d="M0,0 L60,30 M60,0 L0,30" clip-path="url(#ukt)" stroke="#C8102E" stroke-width="4"/>
							<path d="M30,0 v30 M0,15 h60" stroke="#fff" stroke-width="10"/>
							<path d="M30,0 v30 M0,15 h60" stroke="#C8102E" stroke-width="6"/>
						</g>
					</svg>
					English <i class="bi bi-chevron-down small"></i>
				</li>
			</ul>
		</div>
	</div>
</div>

<!-- ============ HEADER INFO ============ -->
<div class="header-info d-none d-lg-block">
	<div class="container">
		<div class="d-flex justify-content-between align-items-center">
			<a class="navbar-brand header-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php lezo_brand(); ?></a>
			<ul class="list-unstyled d-flex mb-0 info-blocks">
				<li>
					<i class="bi bi-geo-alt-fill"></i>
					<div><span><?php echo esc_html( lezo_mod( 'lezo_info_addr1', '13005 Greenville Avenue' ) ); ?></span><strong><?php echo esc_html( lezo_mod( 'lezo_info_addr2', 'California, TX 70240' ) ); ?></strong></div>
				</li>
				<li>
					<i class="bi bi-telephone-fill"></i>
					<div><span><?php echo esc_html( lezo_mod( 'lezo_info_phone1', '+1 800125 6524' ) ); ?></span><strong><?php echo esc_html( lezo_mod( 'lezo_info_phone2', 'Mail@Lezofinance.Com' ) ); ?></strong></div>
				</li>
				<li>
					<i class="bi bi-clock-fill"></i>
					<div><span><?php echo esc_html( lezo_mod( 'lezo_info_hours1', '10:00am To 6:00pm' ) ); ?></span><strong><?php echo esc_html( lezo_mod( 'lezo_info_hours2', 'Sunday Closed' ) ); ?></strong></div>
				</li>
			</ul>
		</div>
	</div>
</div>

<!-- ============ NAVBAR ============ -->
<nav class="navbar navbar-expand-lg main-navbar sticky-top">
	<div class="container">
		<a class="navbar-brand d-lg-none" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php lezo_brand(); ?></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="mainNav">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'navbar-nav me-auto mb-2 mb-lg-0',
				'fallback_cb'    => 'lezo_primary_fallback',
				'depth'          => 2,
			) );
			?>
			<div class="d-flex align-items-center nav-actions">
				<a href="#" class="nav-cart"><i class="bi bi-bag"></i><span class="cart-count">0</span></a>
				<a href="<?php echo esc_url( home_url( '/?s=' ) ); ?>" class="nav-search"><i class="bi bi-search"></i></a>
			</div>
		</div>
	</div>
</nav>
