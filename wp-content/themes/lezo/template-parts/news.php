<?php
/** Latest News — bài viết thật (post). @package Lezo */
if ( ! defined( 'ABSPATH' ) ) exit;

$news = new WP_Query( array( 'posts_per_page' => 3, 'ignore_sticky_posts' => true ) );
if ( ! $news->have_posts() ) return;
?>
<section id="news" class="section news-section">
	<div class="container">
		<div class="section-heading text-center">
			<span class="section-label"><?php esc_html_e( 'From The Blog', 'lezo' ); ?></span>
			<h2 class="section-title"><?php esc_html_e( 'Our Latest News', 'lezo' ); ?></h2>
		</div>
		<div class="row g-4">
			<?php while ( $news->have_posts() ) : $news->the_post();
				$cat = get_the_category();
				$tag = $cat ? $cat[0]->name : esc_html__( 'News', 'lezo' ); ?>
				<div class="col-md-4">
					<article class="news-card">
						<div class="news-img">
							<a href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'lezo-news' ); } else { echo '<img src="' . esc_url( LEZO_URI . '/assets/img/news-1.jpg' ) . '" alt="">'; } ?>
							</a>
							<span class="news-tag"><?php echo esc_html( $tag ); ?></span>
						</div>
						<div class="news-body">
							<span class="news-cat"><?php the_author(); ?></span>
							<h5><a href="<?php the_permalink(); ?>"><?php echo esc_html( wp_trim_words( get_the_title(), 6 ) ); ?></a></h5>
							<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 16 ) ); ?></p>
							<div class="news-meta"><i class="bi bi-calendar3"></i> <?php echo esc_html( lezo_date() ); ?></div>
						</div>
					</article>
				</div>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</section>
