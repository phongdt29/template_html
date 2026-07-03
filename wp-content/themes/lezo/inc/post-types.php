<?php
/**
 * Custom Post Types: Slides, Advisors, Cases.
 *
 * @package Lezo
 */
if ( ! defined( 'ABSPATH' ) ) exit;

function lezo_register_cpts() {

	// ----- Hero Slides -----
	register_post_type( 'lezo_slide', array(
		'labels' => array(
			'name'          => __( 'Hero Slides', 'lezo' ),
			'singular_name' => __( 'Slide', 'lezo' ),
			'add_new_item'  => __( 'Thêm Slide', 'lezo' ),
			'edit_item'     => __( 'Sửa Slide', 'lezo' ),
		),
		'public'       => false,
		'show_ui'      => true,
		'show_in_menu' => true,
		'menu_icon'    => 'dashicons-images-alt2',
		'menu_position'=> 21,
		'supports'     => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'has_archive'  => false,
	) );

	// ----- Advisors (Team) -----
	register_post_type( 'lezo_advisor', array(
		'labels' => array(
			'name'          => __( 'Advisors', 'lezo' ),
			'singular_name' => __( 'Advisor', 'lezo' ),
			'add_new_item'  => __( 'Thêm Advisor', 'lezo' ),
			'edit_item'     => __( 'Sửa Advisor', 'lezo' ),
		),
		'public'       => false,
		'show_ui'      => true,
		'menu_icon'    => 'dashicons-groups',
		'menu_position'=> 22,
		'supports'     => array( 'title', 'thumbnail', 'page-attributes' ),
	) );

	// ----- Cases (Gallery / Portfolio) -----
	register_post_type( 'lezo_case', array(
		'labels' => array(
			'name'          => __( 'Cases', 'lezo' ),
			'singular_name' => __( 'Case', 'lezo' ),
			'add_new_item'  => __( 'Thêm Case', 'lezo' ),
			'edit_item'     => __( 'Sửa Case', 'lezo' ),
		),
		'public'       => false,
		'show_ui'      => true,
		'menu_icon'    => 'dashicons-portfolio',
		'menu_position'=> 23,
		'supports'     => array( 'title', 'thumbnail', 'page-attributes' ),
	) );
}
add_action( 'init', 'lezo_register_cpts' );
