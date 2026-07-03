<?php
/**
 * Customizer: các thiết lập global (top bar, social, liên hệ, counters, CTA, footer).
 *
 * @package Lezo
 */
if ( ! defined( 'ABSPATH' ) ) exit;

function lezo_customize_register( $wp_customize ) {

	// Helper thêm control text nhanh.
	$add = function( $id, $label, $default = '', $section = '', $type = 'text' ) use ( $wp_customize ) {
		$wp_customize->add_setting( $id, array(
			'default'           => $default,
			'sanitize_callback' => ( 'textarea' === $type ) ? 'wp_kses_post' : 'sanitize_text_field',
			'transport'         => 'refresh',
		) );
		$wp_customize->add_control( $id, array(
			'label'   => $label,
			'section' => $section,
			'type'    => $type,
		) );
	};

	// Panel tổng
	$wp_customize->add_panel( 'lezo_panel', array(
		'title'    => __( 'LEZO – Tuỳ chỉnh Theme', 'lezo' ),
		'priority' => 20,
	) );

	// ---------- Top bar & Social ----------
	$wp_customize->add_section( 'lezo_topbar', array( 'title' => __( 'Top Bar & Social', 'lezo' ), 'panel' => 'lezo_panel' ) );
	$add( 'lezo_topbar_welcome', __( 'Câu chào', 'lezo' ), 'Welcome to Lezo Financial Services, we have over 25 years of expertise', 'lezo_topbar' );
	$add( 'lezo_social_facebook', 'Facebook URL', '#', 'lezo_topbar', 'url' );
	$add( 'lezo_social_twitter', 'Twitter/X URL', '#', 'lezo_topbar', 'url' );
	$add( 'lezo_social_google', 'Google URL', '#', 'lezo_topbar', 'url' );
	$add( 'lezo_social_linkedin', 'LinkedIn URL', '#', 'lezo_topbar', 'url' );

	// ---------- Header info blocks ----------
	$wp_customize->add_section( 'lezo_headerinfo', array( 'title' => __( 'Header – Thông tin liên hệ', 'lezo' ), 'panel' => 'lezo_panel' ) );
	$add( 'lezo_info_addr1', __( 'Địa chỉ dòng 1', 'lezo' ), '13005 Greenville Avenue', 'lezo_headerinfo' );
	$add( 'lezo_info_addr2', __( 'Địa chỉ dòng 2', 'lezo' ), 'California, TX 70240', 'lezo_headerinfo' );
	$add( 'lezo_info_phone1', __( 'Điện thoại', 'lezo' ), '+1 800125 6524', 'lezo_headerinfo' );
	$add( 'lezo_info_phone2', __( 'Email', 'lezo' ), 'Mail@Lezofinance.Com', 'lezo_headerinfo' );
	$add( 'lezo_info_hours1', __( 'Giờ làm việc', 'lezo' ), '10:00am To 6:00pm', 'lezo_headerinfo' );
	$add( 'lezo_info_hours2', __( 'Ngày nghỉ', 'lezo' ), 'Sunday Closed', 'lezo_headerinfo' );

	// ---------- Counters ----------
	$wp_customize->add_section( 'lezo_counters', array( 'title' => __( 'Counters (Số liệu)', 'lezo' ), 'panel' => 'lezo_panel' ) );
	$counter_defaults = array(
		1 => array( 'bi-people-fill', '81', '', 'Team Members' ),
		2 => array( 'bi-emoji-smile-fill', '226', '', 'Satisfied Clients' ),
		3 => array( 'bi-briefcase-fill', '308', '', 'New Projects' ),
		4 => array( 'bi-bar-chart-fill', '95', '%', 'Profit Increased' ),
	);
	foreach ( $counter_defaults as $i => $d ) {
		$add( "lezo_counter{$i}_icon", "#{$i} Icon (bootstrap-icon)", $d[0], 'lezo_counters' );
		$add( "lezo_counter{$i}_num", "#{$i} Số", $d[1], 'lezo_counters' );
		$add( "lezo_counter{$i}_suffix", "#{$i} Hậu tố", $d[2], 'lezo_counters' );
		$add( "lezo_counter{$i}_label", "#{$i} Nhãn", $d[3], 'lezo_counters' );
	}

	// ---------- CTA & Quote & Map ----------
	$wp_customize->add_section( 'lezo_cta', array( 'title' => __( 'CTA / Quote / Map', 'lezo' ), 'panel' => 'lezo_panel' ) );
	$add( 'lezo_cta_text', __( 'Dòng CTA (Our Cases)', 'lezo' ), 'Want to make new project? contact with us. Our expert is ready to help you', 'lezo_cta' );
	$add( 'lezo_quote_title', __( 'Tiêu đề Request Quote', 'lezo' ), 'Request for quote', 'lezo_cta' );
	$add( 'lezo_quote_desc', __( 'Mô tả Request Quote', 'lezo' ), 'The argument in favor of using filler text goes something like this. If you use real content in the design process.', 'lezo_cta', 'textarea' );
	$add( 'lezo_map_url', __( 'Google Map embed URL', 'lezo' ), 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d211676.0!2d-118.69192!3d34.02073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0!2sLos+Angeles!5e0!3m2!1sen!2sus!4v1600000000000', 'lezo_cta', 'url' );
	$add( 'lezo_newsletter_title', __( 'Newsletter tiêu đề', 'lezo' ), 'Newsletter Subscribe', 'lezo_cta' );
	$add( 'lezo_newsletter_desc', __( 'Newsletter mô tả', 'lezo' ), 'Sign up today for hints, tips and the latest updates.', 'lezo_cta' );

	// ---------- Footer ----------
	$wp_customize->add_section( 'lezo_footer', array( 'title' => __( 'Footer', 'lezo' ), 'panel' => 'lezo_panel' ) );
	$add( 'lezo_footer_about', __( 'Giới thiệu ngắn', 'lezo' ), 'Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.', 'lezo_footer', 'textarea' );
	$add( 'lezo_footer_addr', __( 'Địa chỉ', 'lezo' ), '185, Industry Street, Los Angeles, USA.', 'lezo_footer' );
	$add( 'lezo_footer_phone', __( 'Điện thoại', 'lezo' ), 'Front Desk: +000-0000-0000 & 00', 'lezo_footer' );
	$add( 'lezo_footer_email', __( 'Email', 'lezo' ), 'Support-team@i.com', 'lezo_footer' );
	$add( 'lezo_copyright', __( 'Copyright', 'lezo' ), '© ' . date( 'Y' ) . ' Template Hub. All Rights Reserved.', 'lezo_footer' );
}
add_action( 'customize_register', 'lezo_customize_register' );
