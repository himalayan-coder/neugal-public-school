<?php
/**
 * The main template file
 *
 * Used when nothing more specific matches a query.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package NeugalCustom
 */

get_header();

// Show page hero on blog/archive pages.
if ( ! is_front_page() ) {
	neugal_page_hero();
}
?>

<div id="primary" class="site-main">
	<div class="container">
		<div class="<?php echo is_active_sidebar( 'sidebar-primary' ) ? 'content-sidebar-wrap' : ''; ?>">

			<main id="main" class="site-main__content" role="main">

				<?php if ( have_posts() ) : ?>

					<?php if ( is_home() && ! is_front_page() ) : ?>
						<header class="archive-header">
							<h1 class="archive-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
					<?php endif; ?>

					<div class="posts-grid">
						<?php
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/content', get_post_type() );
						endwhile;
						?>
					</div>

					<?php the_posts_navigation( array(
						'prev_text' => __( '&larr; Older posts', 'neugal-custom' ),
						'next_text' => __( 'Newer posts &rarr;', 'neugal-custom' ),
					) ); ?>

				<?php else : ?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
				<?php endif; ?>

			</main><!-- #main -->

			<?php if ( is_active_sidebar( 'sidebar-primary' ) ) : ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>

		</div>
	</div>
</div>

<?php get_footer();
