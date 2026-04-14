<?php
/**
 * Template part for displaying a message when posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package NeugalCustom
 */
?>

<section class="no-results not-found">
	<div style="text-align:center; padding: 3rem 1rem;">
		<svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" style="margin: 0 auto 1.5rem; opacity:.3;">
			<circle cx="40" cy="40" r="38" stroke="#1a3c5e" stroke-width="3"/>
			<path d="M25 55 Q40 35 55 55" stroke="#1a3c5e" stroke-width="3" stroke-linecap="round" fill="none"/>
			<circle cx="30" cy="33" r="4" fill="#1a3c5e"/>
			<circle cx="50" cy="33" r="4" fill="#1a3c5e"/>
		</svg>

		<h2 class="page-title"><?php esc_html_e( 'Nothing Found', 'neugal-custom' ); ?></h2>

		<?php if ( is_search() ) : ?>
			<p><?php esc_html_e( 'Sorry, nothing matched your search. Please try different keywords.', 'neugal-custom' ); ?></p>
			<?php get_search_form(); ?>
		<?php else : ?>
			<p>
				<?php
				printf(
					wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'neugal-custom' ),
						array( 'a' => array( 'href' => array() ) )
					),
					esc_url( admin_url( 'post-new.php' ) )
				);
				?>
			</p>
		<?php endif; ?>
	</div>
</section>
