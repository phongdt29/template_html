<?php
/** Single post. @package Lezo */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>
<div class="page-hero">
	<div class="container"><h1><?php single_post_title(); ?></h1><?php lezo_breadcrumb(); ?></div>
</div>
<section id="content" class="section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-9">
				<?php while ( have_posts() ) : the_post(); ?>
					<article <?php post_class( 'single-post' ); ?>>
						<div class="post-meta mb-3 text-muted">
							<i class="bi bi-person"></i> <?php the_author(); ?>
							&nbsp;·&nbsp; <i class="bi bi-calendar3"></i> <?php echo esc_html( get_the_date() ); ?>
							<?php $c = get_the_category(); if ( $c ) { echo '&nbsp;·&nbsp; <i class="bi bi-folder"></i> ' . esc_html( $c[0]->name ); } ?>
						</div>
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="mb-4"><?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid rounded' ) ); ?></div>
						<?php endif; ?>
						<div class="post-content">
							<?php the_content(); wp_link_pages(); ?>
						</div>
						<?php if ( has_tag() ) : ?><div class="post-tags mt-4"><?php the_tags( '<i class="bi bi-tags"></i> ', ', ' ); ?></div><?php endif; ?>
					</article>
					<div class="lezo-post-nav mt-4"><?php lezo_post_nav(); ?></div>
					<div class="mt-5"><?php if ( comments_open() || get_comments_number() ) comments_template(); ?></div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();
