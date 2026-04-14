<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package NeugalCustom
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'card post-card' ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="card__image">
			<a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
				<?php the_post_thumbnail( 'neugal-card' ); ?>
			</a>
		</div>
	<?php endif; ?>

	<div class="card__body">
		<?php neugal_entry_meta(); ?>

		<h2 class="card__title entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2>

		<div class="card__excerpt">
			<?php the_excerpt(); ?>
		</div>

		<a href="<?php the_permalink(); ?>" class="btn btn-outline btn-sm">
			<?php esc_html_e( 'Read More', 'neugal-custom' ); ?>
		</a>
	</div>

</article>
