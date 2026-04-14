<?php
/**
 * The template for displaying search results pages
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

				<?php if ( have_posts() ) : ?>

					<header class="search-header">
						<h2 class="search-results-title">
							<?php
							printf(
								/* translators: %s: search query. */
								esc_html__( 'Search Results for: &ldquo;%s&rdquo;', 'neugal-custom' ),
								'<span>' . esc_html( get_search_query() ) . '</span>'
							);
							?>
						</h2>
					</header>

					<div class="posts-grid">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'template-parts/content', 'search' ); ?>
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
