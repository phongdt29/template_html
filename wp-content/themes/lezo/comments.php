<?php
/**
 * Comments template.
 *
 * @package Lezo
 */
if ( ! defined( 'ABSPATH' ) ) exit;

if ( post_password_required() ) return;
?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
			$cnt = get_comments_number();
			printf(
				esc_html( _n( '%s bình luận', '%s bình luận', $cnt, 'lezo' ) ),
				number_format_i18n( $cnt )
			);
			?>
		</h3>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 56,
				'callback'    => 'lezo_comment',
			) );
			?>
		</ol>

		<?php
		the_comments_pagination( array(
			'prev_text' => '<i class="bi bi-arrow-left"></i>',
			'next_text' => '<i class="bi bi-arrow-right"></i>',
		) );
		?>

		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Bình luận đã đóng.', 'lezo' ); ?></p>
		<?php endif; ?>
	<?php endif; ?>

	<?php
	comment_form( array(
		'class_form'         => 'comment-form row g-3',
		'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
		'title_reply_after'  => '</h3>',
		'title_reply'        => __( 'Để lại bình luận', 'lezo' ),
		'label_submit'       => __( 'Gửi bình luận', 'lezo' ),
		'class_submit'       => 'btn btn-primary-custom',
		'comment_field'      => '<div class="col-12"><textarea class="form-control" name="comment" rows="5" placeholder="' . esc_attr__( 'Nội dung bình luận...', 'lezo' ) . '" required></textarea></div>',
		'fields'             => array(
			'author' => '<div class="col-md-6"><input class="form-control" name="author" placeholder="' . esc_attr__( 'Họ tên*', 'lezo' ) . '" required></div>',
			'email'  => '<div class="col-md-6"><input class="form-control" type="email" name="email" placeholder="' . esc_attr__( 'Email*', 'lezo' ) . '" required></div>',
			'url'    => '<div class="col-12"><input class="form-control" name="url" placeholder="' . esc_attr__( 'Website', 'lezo' ) . '"></div>',
		),
	) );
	?>
</div>
