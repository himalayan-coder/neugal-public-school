<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
					get_template_part( 'template-parts/content', get_post_type() );
					the_post_navigation( array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'neugal-custom' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'neugal-custom' ) . '</span> <span class="nav-title">%title</span>',
					) );
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
