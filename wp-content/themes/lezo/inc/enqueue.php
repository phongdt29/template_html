<?php
/**
 * Enqueue styles & scripts.
 *
 * @package Lezo
 */
if ( ! defined( 'ABSPATH' ) ) exit;

function lezo_assets() {
	$lib = LEZO_URI . '/assets/lib';

	// ----- CSS -----
	wp_enqueue_style( 'bootstrap', $lib . '/bootstrap/css/bootstrap.min.css', array(), '5.3.3' );
	wp_enqueue_style( 'bootstrap-icons', $lib . '/bootstrap-icons/bootstrap-icons.min.css', array(), '1.11.3' );
	wp_enqueue_style( 'lezo-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Rubik:wght@400;500;600;700&display=swap', array(), null );
	wp_enqueue_style( 'lezo-main', LEZO_URI . '/assets/css/style.css', array( 'bootstrap' ), LEZO_VERSION );
	// style.css (theme header) — để WP nhận diện
	wp_enqueue_style( 'lezo-style', get_stylesheet_uri(), array( 'lezo-main' ), LEZO_VERSION );

	// ----- JS -----
	wp_enqueue_script( 'bootstrap', $lib . '/bootstrap/js/bootstrap.bundle.min.js', array(), '5.3.3', true );
	wp_enqueue_script( 'lezo-main', LEZO_URI . '/assets/js/main.js', array( 'bootstrap' ), LEZO_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lezo_assets' );
