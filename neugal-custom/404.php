<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @package NeugalCustom
 */

get_header();
neugal_page_hero();
?>

<div id="primary" class="site-main">
	<div class="container">
		<main id="main" class="site-main__content error-404 not-found" role="main">

			<div class="error-404__inner" style="text-align:center; padding: 4rem 1rem;">

				<div class="error-404__number" aria-hidden="true" style="font-size:8rem; font-weight:700; color:var(--color-primary); opacity:.1; line-height:1; margin-bottom:-2rem;">
					404
				</div>

				<h1 style="font-size:2rem; color:var(--color-primary);">
					<?php esc_html_e( 'Oops! Page Not Found', 'neugal-custom' ); ?>
				</h1>
				<p style="color:var(--color-text-light); max-width:500px; margin:1rem auto 2rem;">
					<?php esc_html_e( "The page you're looking for might have been moved, renamed, or doesn't exist. Try searching below or navigate from the homepage.", 'neugal-custom' ); ?>
				</p>

				<?php get_search_form(); ?>

				<p style="margin-top:2rem;">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
						<?php esc_html_e( '&larr; Back to Homepage', 'neugal-custom' ); ?>
					</a>
				</p>

			</div>

		</main>
	</div>
</div>

<?php get_footer();
