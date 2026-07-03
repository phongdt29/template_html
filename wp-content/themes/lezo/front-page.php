<?php
/**
 * Front Page: trang chủ gồm nhiều section.
 *
 * @package Lezo
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<main id="content">
	<?php
	get_template_part( 'template-parts/hero' );
	get_template_part( 'template-parts/about' );
	get_template_part( 'template-parts/why' );
	get_template_part( 'template-parts/counter' );
	get_template_part( 'template-parts/cases' );
	get_template_part( 'template-parts/advisors' );
	get_template_part( 'template-parts/partners' );
	get_template_part( 'template-parts/news' );
	get_template_part( 'template-parts/testimonial' );
	get_template_part( 'template-parts/quote' );
	get_template_part( 'template-parts/newsletter' );
	?>
</main>

<?php
get_footer();
