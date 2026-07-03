<?php
/**
 * Template tags / helpers.
 *
 * @package Lezo
 */
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Lấy giá trị Customizer có fallback.
 */
function lezo_mod( $key, $default = '' ) {
	return get_theme_mod( $key, $default );
}

/**
 * Lấy ACF field an toàn (nếu ACF chưa bật thì trả fallback).
 */
function lezo_field( $selector, $post_id = false, $default = '' ) {
	if ( function_exists( 'get_field' ) ) {
		$val = get_field( $selector, $post_id );
		if ( $val !== null && $val !== false && $val !== '' ) {
			return $val;
		}
	}
	return $default;
}

/**
 * ID của trang được đặt làm Front Page (để đọc ACF gắn trên trang đó).
 */
function lezo_front_id() {
	return (int) get_option( 'page_on_front' );
}

/**
 * In logo: dùng custom-logo nếu có, ngược lại brand text.
 */
function lezo_brand( $footer = false ) {
	if ( has_custom_logo() ) {
		the_custom_logo();
		return;
	}
	$cls = $footer ? 'brand-text' : 'brand-text';
	?>
	<span class="brand-icon"><i class="bi bi-boxes"></i></span>
	<span class="<?php echo esc_attr( $cls ); ?>">LEZO<small>Finance</small></span>
	<?php
}

/**
 * Trả về mảng social links từ Customizer.
 */
function lezo_socials() {
	return array_filter( array(
		'facebook'   => lezo_mod( 'lezo_social_facebook', '#' ),
		'twitter-x'  => lezo_mod( 'lezo_social_twitter', '#' ),
		'google'     => lezo_mod( 'lezo_social_google', '#' ),
		'linkedin'   => lezo_mod( 'lezo_social_linkedin', '#' ),
	) );
}

/**
 * Định dạng ngày kiểu "14th August, 2019".
 */
function lezo_date( $post_id = null ) {
	return get_the_date( 'jS F, Y', $post_id );
}
