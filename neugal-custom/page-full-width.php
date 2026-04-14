<?php
/**
 * Template Name: Full Width
 * Template Post Type: page
 *
 * A full-width page template with no sidebar — ideal for Pagelayer-built pages.
 *
 * @package NeugalCustom
 */

get_header();
neugal_page_hero();
?>

<div id="primary" class="site-main">
	<div class="container">
		<main id="main" class="site-main__content" role="main">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', 'page' );
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile;
			?>
		</main>
	</div>
</div>

<?php get_footer();
