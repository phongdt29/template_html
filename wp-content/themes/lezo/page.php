<?php
/** Page. @package Lezo */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>
<div class="page-hero">
	<div class="container"><h1><?php the_title(); ?></h1></div>
</div>
<section class="section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-10">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="mb-4"><?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid rounded' ) ); ?></div>
					<?php endif; ?>
					<div class="page-content"><?php the_content(); wp_link_pages(); ?></div>
					<?php if ( comments_open() || get_comments_number() ) comments_template(); ?>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();
