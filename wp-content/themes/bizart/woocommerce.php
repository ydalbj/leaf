<?php
/**
 * The template for displaying woocommerce pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since Bizart 1.0
 */

get_header(); ?>
<div class="container">
	<main id="site-content" role="main">
	<?php if ( have_posts() ): ?>
		<?php woocommerce_content(); ?>							
	<?php endif; ?>			
	</main>
</div>
<?php get_footer(); ?>