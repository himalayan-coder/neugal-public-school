<?php
/**
 * The template for displaying archive pages
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

				<header class="archive-header">
					<?php
					the_archive_title( '<h1 class="archive-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header>

				<?php if ( have_posts() ) : ?>
					<div class="posts-grid">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
						<?php endwhile; ?>
					</div>
					<?php the_posts_navigation(); ?>
				<?php else : ?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
				<?php endif; ?>

			</main>

			<?php if ( is_active_sidebar( 'sidebar-primary' ) ) : ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>

		</div>
	</div>
</div>

<?php get_footer();
