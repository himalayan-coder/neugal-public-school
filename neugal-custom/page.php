<?php
/**
 * The template for displaying all pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package NeugalCustom
 */

get_header();
neugal_page_hero();
?>

<div id="primary" class="site-main">
	<div class="container">
		<div class="<?php echo is_active_sidebar( 'sidebar-primary' ) ? 'content-sidebar-wrap' : ''; ?>">

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

			<?php if ( is_active_sidebar( 'sidebar-primary' ) ) : ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>

		</div>
	</div>
</div>

<?php get_footer();
