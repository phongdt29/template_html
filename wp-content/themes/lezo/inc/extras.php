<?php
/**
 * Extras: excerpt, accessibility, comments, pagination, breadcrumb, body class.
 *
 * @package Lezo
 */
if ( ! defined( 'ABSPATH' ) ) exit;

/* ---------- Excerpt ---------- */
function lezo_excerpt_length( $length ) {
	return is_admin() ? $length : 24;
}
add_filter( 'excerpt_length', 'lezo_excerpt_length', 999 );

function lezo_excerpt_more( $more ) {
	return is_admin() ? $more : '&hellip;';
}
add_filter( 'excerpt_more', 'lezo_excerpt_more' );

/* ---------- Body classes ---------- */
function lezo_body_classes( $classes ) {
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	if ( is_page_template() || is_front_page() ) {
		$classes[] = 'lezo-front';
	}
	if ( ! is_active_sidebar( 'sidebar-blog' ) ) {
		$classes[] = 'no-sidebar';
	}
	return $classes;
}
add_filter( 'body_class', 'lezo_body_classes' );

/* ---------- Skip link focus fix + pingback ---------- */
function lezo_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'lezo_pingback_header' );

/* ---------- Phân trang đẹp ---------- */
function lezo_pagination() {
	the_posts_pagination( array(
		'mid_size'  => 2,
		'prev_text' => '<i class="bi bi-arrow-left"></i>',
		'next_text' => '<i class="bi bi-arrow-right"></i>',
		'class'     => 'lezo-pagination',
	) );
}

/* ---------- Breadcrumb đơn giản ---------- */
function lezo_breadcrumb() {
	if ( is_front_page() ) return;
	echo '<nav class="lezo-breadcrumb" aria-label="Breadcrumb"><ol>';
	echo '<li><a href="' . esc_url( home_url( '/' ) ) . '"><i class="bi bi-house-door"></i> ' . esc_html__( 'Trang chủ', 'lezo' ) . '</a></li>';
	if ( is_singular( 'post' ) ) {
		$cats = get_the_category();
		if ( $cats ) echo '<li><a href="' . esc_url( get_category_link( $cats[0]->term_id ) ) . '">' . esc_html( $cats[0]->name ) . '</a></li>';
		echo '<li class="active">' . esc_html( get_the_title() ) . '</li>';
	} elseif ( is_page() ) {
		echo '<li class="active">' . esc_html( get_the_title() ) . '</li>';
	} elseif ( is_category() || is_tag() || is_tax() ) {
		echo '<li class="active">' . esc_html( single_term_title( '', false ) ) . '</li>';
	} elseif ( is_search() ) {
		echo '<li class="active">' . esc_html__( 'Tìm kiếm', 'lezo' ) . '</li>';
	} elseif ( is_archive() ) {
		echo '<li class="active">' . wp_kses_post( get_the_archive_title() ) . '</li>';
	}
	echo '</ol></nav>';
}

/* ---------- Comment callback ---------- */
function lezo_comment( $comment, $args, $depth ) {
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
	?>
	<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( 'lezo-comment' ); ?>>
		<article class="comment-body d-flex">
			<div class="comment-avatar"><?php echo get_avatar( $comment, 56 ); ?></div>
			<div class="comment-content ms-3">
				<div class="comment-meta">
					<span class="comment-author"><?php echo get_comment_author_link(); ?></span>
					<span class="comment-date"><i class="bi bi-clock"></i> <?php printf( '%1$s', get_comment_date() ); ?></span>
				</div>
				<?php if ( '0' === $comment->comment_approved ) : ?>
					<p class="comment-awaiting"><em><?php esc_html_e( 'Bình luận đang chờ duyệt.', 'lezo' ); ?></em></p>
				<?php endif; ?>
				<div class="comment-text"><?php comment_text(); ?></div>
				<div class="comment-reply">
					<?php comment_reply_link( array_merge( $args, array(
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'reply_text'=> '<i class="bi bi-reply"></i> ' . __( 'Trả lời', 'lezo' ),
					) ) ); ?>
				</div>
			</div>
		</article>
	<?php
	// KHÔNG đóng thẻ ở đây — WP tự đóng.
}

/* ---------- Post navigation (single) ---------- */
function lezo_post_nav() {
	the_post_navigation( array(
		'prev_text' => '<span class="nav-sub"><i class="bi bi-arrow-left"></i> ' . __( 'Bài trước', 'lezo' ) . '</span> <span class="nav-title">%title</span>',
		'next_text' => '<span class="nav-sub">' . __( 'Bài sau', 'lezo' ) . ' <i class="bi bi-arrow-right"></i></span> <span class="nav-title">%title</span>',
	) );
}
