<?php
/** Loop item: news card. @package Lezo */
if ( ! defined( 'ABSPATH' ) ) exit;
$cats = get_the_category();
?>
<div class="col-md-6 lezo-loop-item">
	<article <?php post_class( 'news-card' ); ?>>
		<div class="news-img">
			<a href="<?php the_permalink(); ?>">
				<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'lezo-news' ); } else { echo '<img src="' . esc_url( LEZO_URI . '/assets/img/news-1.jpg' ) . '" alt="">'; } ?>
			</a>
			<?php if ( $cats ) : ?><span class="news-tag"><?php echo esc_html( $cats[0]->name ); ?></span><?php endif; ?>
		</div>
		<div class="news-body">
			<span class="news-cat"><i class="bi bi-person"></i> <?php the_author(); ?></span>
			<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
			<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
			<div class="news-meta"><i class="bi bi-calendar3"></i> <?php echo esc_html( get_the_date() ); ?></div>
		</div>
	</article>
</div>
