<?php
/** No results. @package Lezo */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<div class="col-12 no-results text-center py-5">
	<i class="bi bi-inbox" style="font-size:50px;color:var(--gray);"></i>
	<h4 class="mt-3"><?php esc_html_e( 'Không tìm thấy nội dung', 'lezo' ); ?></h4>
	<?php if ( is_search() ) : ?>
		<p class="text-muted"><?php esc_html_e( 'Thử từ khoá khác xem sao.', 'lezo' ); ?></p>
		<div class="mx-auto" style="max-width:400px;"><?php get_search_form(); ?></div>
	<?php else : ?>
		<p class="text-muted"><?php esc_html_e( 'Chưa có bài viết nào ở đây.', 'lezo' ); ?></p>
	<?php endif; ?>
</div>
