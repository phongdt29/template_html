<?php
/**
 * Theme setup: supports, menus.
 *
 * @package Lezo
 */
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! function_exists( 'lezo_setup' ) ) {
	function lezo_setup() {
		load_theme_textdomain( 'lezo', LEZO_DIR . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-logo', array(
			'height'      => 50,
			'width'       => 180,
			'flex-height' => true,
			'flex-width'  => true,
		) );
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script', 'navigation-widgets',
		) );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'post-formats', array( 'gallery', 'image', 'video', 'quote', 'link' ) );
		add_theme_support( 'custom-background', array( 'default-color' => 'ffffff' ) );

		// ----- Hỗ trợ Block Editor (Gutenberg) -----
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'custom-line-height' );
		add_theme_support( 'custom-spacing' );
		add_editor_style( 'assets/css/editor-style.css' );

		add_theme_support( 'editor-color-palette', array(
			array( 'name' => __( 'Primary', 'lezo' ),   'slug' => 'primary',   'color' => '#17a9e0' ),
			array( 'name' => __( 'Dark', 'lezo' ),      'slug' => 'dark',      'color' => '#1c2b3a' ),
			array( 'name' => __( 'Gray', 'lezo' ),      'slug' => 'gray',      'color' => '#6c7a89' ),
			array( 'name' => __( 'Light', 'lezo' ),     'slug' => 'light',     'color' => '#f5f8fa' ),
			array( 'name' => __( 'White', 'lezo' ),     'slug' => 'white',     'color' => '#ffffff' ),
		) );
		add_theme_support( 'editor-font-sizes', array(
			array( 'name' => __( 'Small', 'lezo' ),  'slug' => 'small',  'size' => 14 ),
			array( 'name' => __( 'Normal', 'lezo' ), 'slug' => 'normal', 'size' => 16 ),
			array( 'name' => __( 'Large', 'lezo' ),  'slug' => 'large',  'size' => 24 ),
			array( 'name' => __( 'Huge', 'lezo' ),   'slug' => 'huge',   'size' => 40 ),
		) );

		// Kích thước ảnh cho các section
		add_image_size( 'lezo-hero', 1920, 900, true );
		add_image_size( 'lezo-case', 400, 300, true );
		add_image_size( 'lezo-advisor', 400, 400, true );
		add_image_size( 'lezo-news', 400, 260, true );

		register_nav_menus( array(
			'primary' => __( 'Menu chính (Navbar)', 'lezo' ),
			'footer'  => __( 'Menu Footer', 'lezo' ),
		) );
	}
}
add_action( 'after_setup_theme', 'lezo_setup' );

/**
 * Content width toàn cục.
 */
function lezo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lezo_content_width', 1140 );
}
add_action( 'after_setup_theme', 'lezo_content_width', 0 );

/**
 * Widget areas: Blog Sidebar + 4 cột Footer.
 */
function lezo_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'lezo' ),
		'id'            => 'sidebar-blog',
		'description'   => __( 'Hiển thị bên phải trang blog / bài viết.', 'lezo' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	for ( $i = 1; $i <= 4; $i++ ) {
		register_sidebar( array(
			/* translators: %d: footer column number */
			'name'          => sprintf( __( 'Footer Cột %d', 'lezo' ), $i ),
			'id'            => 'footer-' . $i,
			'description'   => __( 'Nếu có widget, sẽ thay nội dung mặc định của cột footer này.', 'lezo' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="footer-title">',
			'after_title'   => '</h5>',
		) );
	}
}
add_action( 'widgets_init', 'lezo_widgets_init' );

/**
 * Thêm class Bootstrap cho menu <li> và <a>.
 */
function lezo_nav_li_class( $classes, $item, $args ) {
	if ( isset( $args->theme_location ) && 'primary' === $args->theme_location ) {
		$classes[] = 'nav-item';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'lezo_nav_li_class', 10, 3 );

function lezo_nav_a_attr( $atts, $item, $args ) {
	if ( isset( $args->theme_location ) && 'primary' === $args->theme_location ) {
		$atts['class'] = 'nav-link';
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'lezo_nav_a_attr', 10, 3 );

/**
 * Menu dự phòng khi chưa tạo menu trong admin.
 */
function lezo_primary_fallback() {
	echo '<ul class="navbar-nav me-auto mb-2 mb-lg-0">';
	echo '<li class="nav-item"><a class="nav-link active" href="' . esc_url( home_url( '/' ) ) . '">HOME</a></li>';
	$pages = get_pages( array( 'number' => 5, 'sort_column' => 'menu_order' ) );
	foreach ( $pages as $p ) {
		echo '<li class="nav-item"><a class="nav-link" href="' . esc_url( get_permalink( $p->ID ) ) . '">' . esc_html( strtoupper( $p->post_title ) ) . '</a></li>';
	}
	echo '</ul>';
}
