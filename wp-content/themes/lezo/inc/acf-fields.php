<?php
/**
 * Đăng ký ACF field groups bằng PHP (version-controlled trong theme).
 * Chỉ chạy khi plugin ACF được bật.
 *
 * @package Lezo
 */
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'acf/init', 'lezo_register_acf_fields' );
function lezo_register_acf_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) return;

	$t  = function( $k, $l, $type = 'text', $extra = array() ) {
		return array_merge( array( 'key' => 'field_' . $k, 'name' => $k, 'label' => $l, 'type' => $type ), $extra );
	};

	// ================= SLIDE =================
	acf_add_local_field_group( array(
		'key'      => 'group_lezo_slide',
		'title'    => 'Nội dung Slide',
		'fields'   => array(
			$t( 'lezo_slide_subtitle', 'Dòng phụ (trên tiêu đề)', 'text', array( 'default_value' => 'We Help' ) ),
			$t( 'lezo_slide_desc', 'Mô tả', 'textarea', array( 'rows' => 3 ) ),
			$t( 'lezo_slide_btn1_text', 'Nút 1 - Chữ', 'text', array( 'default_value' => 'Our Services' ) ),
			$t( 'lezo_slide_btn1_link', 'Nút 1 - Link', 'url' ),
			$t( 'lezo_slide_btn2_text', 'Nút 2 - Chữ', 'text', array( 'default_value' => 'Get In Touch' ) ),
			$t( 'lezo_slide_btn2_link', 'Nút 2 - Link', 'url' ),
		),
		'location' => array( array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'lezo_slide' ) ) ),
	) );

	// ================= ADVISOR =================
	acf_add_local_field_group( array(
		'key'      => 'group_lezo_advisor',
		'title'    => 'Thông tin Advisor',
		'fields'   => array(
			$t( 'lezo_advisor_role', 'Chức vụ', 'text', array( 'default_value' => 'CEO' ) ),
			$t( 'lezo_advisor_desc', 'Mô tả ngắn', 'textarea', array( 'rows' => 2, 'default_value' => 'As more and more people are turning to organic.' ) ),
			$t( 'lezo_advisor_facebook', 'Facebook', 'url' ),
			$t( 'lezo_advisor_twitter', 'Twitter/X', 'url' ),
			$t( 'lezo_advisor_linkedin', 'LinkedIn', 'url' ),
		),
		'location' => array( array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'lezo_advisor' ) ) ),
	) );

	// ================= FRONT PAGE SECTIONS =================
	$fp_fields = array(
		// About
		$t( 'lezo_about_tab', 'ABOUT', 'tab' ),
		$t( 'lezo_about_label', 'Label', 'text', array( 'default_value' => 'About our company' ) ),
		$t( 'lezo_about_title', 'Tiêu đề', 'text', array( 'default_value' => '30 years of excellence in sales training solutions' ) ),
		$t( 'lezo_about_number', 'Số nổi bật', 'text', array( 'default_value' => '30' ) ),
		$t( 'lezo_about_p1', 'Đoạn 1', 'textarea', array( 'rows' => 3, 'default_value' => 'These men promptly escaped from a maximum security stockade to the Los Angeles underground.' ) ),
		$t( 'lezo_about_p2', 'Đoạn 2', 'textarea', array( 'rows' => 3, 'default_value' => 'If you have a problem, if no one else can help, and if you can find them, maybe you can hire the professional team.' ) ),
		$t( 'lezo_about_image', 'Ảnh', 'image', array( 'return_format' => 'url', 'preview_size' => 'medium' ) ),
		$t( 'lezo_about_video', 'Link video (nút play)', 'url' ),
		$t( 'lezo_award1', 'Award 1 (năm|tên)', 'text', array( 'default_value' => '2014|National Award' ) ),
		$t( 'lezo_award2', 'Award 2 (năm|tên)', 'text', array( 'default_value' => '2016|Global Award' ) ),
		$t( 'lezo_award3', 'Award 3 (năm|tên)', 'text', array( 'default_value' => '2019|Honor Award' ) ),

		// Why choose us
		$t( 'lezo_why_tab', 'WHY CHOOSE US', 'tab' ),
		$t( 'lezo_why_title', 'Tiêu đề', 'text', array( 'default_value' => 'Why Choose Us' ) ),
		$t( 'lezo_why_desc', 'Mô tả', 'textarea', array( 'rows' => 3, 'default_value' => 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.' ) ),
		$t( 'lezo_why_image', 'Ảnh', 'image', array( 'return_format' => 'url', 'preview_size' => 'medium' ) ),
		$t( 'lezo_feature1', 'Feature 1 (icon|tên)', 'text', array( 'default_value' => 'bi-graph-up-arrow|Advanced Analytics' ) ),
		$t( 'lezo_feature2', 'Feature 2 (icon|tên)', 'text', array( 'default_value' => 'bi-briefcase-fill|Corporate Finance' ) ),
		$t( 'lezo_feature3', 'Feature 3 (icon|tên)', 'text', array( 'default_value' => 'bi-pc-display|Information Technology' ) ),
		$t( 'lezo_feature4', 'Feature 4 (icon|tên)', 'text', array( 'default_value' => 'bi-diagram-3-fill|Our Workflow & Process' ) ),

		// Testimonial
		$t( 'lezo_tm_tab', 'TESTIMONIAL', 'tab' ),
		$t( 'lezo_tm_quote', 'Trích dẫn', 'textarea', array( 'rows' => 3, 'default_value' => 'The first mate and his Skipper too will do their very best to make the man named Brady tropic Island next these are the voyages.' ) ),
		$t( 'lezo_tm_author', 'Tác giả', 'text', array( 'default_value' => 'John Abraham' ) ),
		$t( 'lezo_tm_role', 'Chức vụ', 'text', array( 'default_value' => 'Morris, CEO' ) ),
		$t( 'lezo_tm_avatar', 'Avatar', 'image', array( 'return_format' => 'url', 'preview_size' => 'thumbnail' ) ),
	);

	acf_add_local_field_group( array(
		'key'      => 'group_lezo_front',
		'title'    => 'LEZO – Nội dung Trang chủ',
		'fields'   => $fp_fields,
		'location' => array( array( array( 'param' => 'page_type', 'operator' => '==', 'value' => 'front_page' ) ) ),
		'menu_order' => 0,
	) );
}
