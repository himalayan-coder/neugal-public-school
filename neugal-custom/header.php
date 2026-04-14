<?php
/**
 * The header for Neugal Custom Theme
 *
 * Displays the <head> section, top bar, sticky header with logo + navigation.
 * Kept as a standalone file for easy Pagelayer editing.
 *
 * @package NeugalCustom
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#primary">
		<?php esc_html_e( 'Skip to content', 'neugal-custom' ); ?>
	</a>

	<!-- =====================================================
		 TOP BAR — contact info + quick links
	====================================================== -->
	<div class="top-bar" role="complementary" aria-label="<?php esc_attr_e( 'Contact information', 'neugal-custom' ); ?>">
		<div class="container">
			<div class="top-bar__left">
				<a href="tel:+977-9800000000" aria-label="<?php esc_attr_e( 'Call us', 'neugal-custom' ); ?>">
					<svg class="top-bar__icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
						<path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1-9.4 0-17-7.6-17-17 0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z"/>
					</svg>
					<?php esc_html_e( '+977-9800000000', 'neugal-custom' ); ?>
				</a>
				<a href="mailto:info@neugalschool.edu.np" aria-label="<?php esc_attr_e( 'Email us', 'neugal-custom' ); ?>">
					<svg class="top-bar__icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
						<path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
					</svg>
					<?php esc_html_e( 'info@neugalschool.edu.np', 'neugal-custom' ); ?>
				</a>
			</div>
			<div class="top-bar__right">
				<a href="<?php echo esc_url( home_url( '/admission' ) ); ?>">
					<?php esc_html_e( 'Admissions Open', 'neugal-custom' ); ?>
				</a>
				<a href="<?php echo esc_url( home_url( '/notice' ) ); ?>">
					<?php esc_html_e( 'Notices', 'neugal-custom' ); ?>
				</a>
				<a href="<?php echo esc_url( home_url( '/e-library' ) ); ?>">
					<?php esc_html_e( 'E-Library', 'neugal-custom' ); ?>
				</a>
			</div>
		</div>
	</div><!-- .top-bar -->

	<!-- =====================================================
		 SITE HEADER — sticky logo + primary navigation
	====================================================== -->
	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<div class="header-inner">

				<!-- Branding: Logo + School Name + Tagline -->
				<div class="site-branding">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
						<?php
						if ( has_custom_logo() ) {
							the_custom_logo();
						} else {
							// Fallback: school emblem placeholder
							?>
							<div class="site-logo-fallback" aria-hidden="true">
								<svg width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="26" cy="26" r="26" fill="#1a3c5e"/>
									<text x="50%" y="55%" dominant-baseline="middle" text-anchor="middle" font-family="serif" font-size="22" font-weight="bold" fill="#e8a020">N</text>
								</svg>
							</div>
							<?php
						}
						?>
						<div class="site-branding__text">
							<?php if ( is_front_page() && is_home() ) : ?>
								<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
							<?php else : ?>
								<p class="site-title"><?php bloginfo( 'name' ); ?></p>
							<?php endif; ?>
							<?php
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) :
								?>
								<span class="site-description"><?php echo esc_html( $description ); ?></span>
							<?php endif; ?>
						</div>
					</a>
				</div><!-- .site-branding -->

				<!-- Primary Navigation -->
				<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'neugal-custom' ); ?>">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'container'      => false,
						'fallback_cb'    => 'neugal_fallback_menu',
					) );
					?>
				</nav><!-- #site-navigation -->

				<!-- Header Actions: Search + Admission CTA -->
				<div class="header-actions">
					<button
						class="header-search-toggle"
						aria-label="<?php esc_attr_e( 'Open search', 'neugal-custom' ); ?>"
						aria-expanded="false"
						aria-controls="search-overlay"
					>
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
							<circle cx="11" cy="11" r="8"/>
							<line x1="21" y1="21" x2="16.65" y2="16.65"/>
						</svg>
					</button>

					<a href="<?php echo esc_url( home_url( '/admission' ) ); ?>" class="btn-admission">
						<?php esc_html_e( 'Apply Now', 'neugal-custom' ); ?>
					</a>
				</div><!-- .header-actions -->

				<!-- Mobile Menu Toggle (hamburger) -->
				<button
					class="menu-toggle"
					aria-controls="site-navigation"
					aria-expanded="false"
					aria-label="<?php esc_attr_e( 'Toggle navigation menu', 'neugal-custom' ); ?>"
				>
					<span></span>
					<span></span>
					<span></span>
				</button>

			</div><!-- .header-inner -->
		</div><!-- .container -->
	</header><!-- #masthead -->

	<!-- =====================================================
		 SEARCH OVERLAY
	====================================================== -->
	<div id="search-overlay" class="search-overlay" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Search', 'neugal-custom' ); ?>" hidden>
		<button class="search-overlay__close" aria-label="<?php esc_attr_e( 'Close search', 'neugal-custom' ); ?>">&times;</button>
		<div class="search-overlay__inner">
			<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-overlay__form">
				<input
					type="search"
					class="search-overlay__input"
					placeholder="<?php esc_attr_e( 'Search for anything&hellip;', 'neugal-custom' ); ?>"
					value="<?php echo esc_attr( get_search_query() ); ?>"
					name="s"
					aria-label="<?php esc_attr_e( 'Search', 'neugal-custom' ); ?>"
					autofocus
				>
				<button type="submit" class="search-overlay__submit">
					<?php esc_html_e( 'Search', 'neugal-custom' ); ?>
				</button>
			</form>
		</div>
	</div><!-- #search-overlay -->

	<!-- Main content begins after header -->
	<div id="content" class="site-content">

<?php
/**
 * Fallback menu when no primary menu is assigned.
 */
function neugal_fallback_menu() {
	$pages = get_pages( array( 'sort_column' => 'menu_order' ) );
	if ( empty( $pages ) ) {
		return;
	}
	echo '<ul id="primary-menu">';
	foreach ( $pages as $page ) {
		$current = ( get_queried_object_id() === $page->ID ) ? ' class="current-menu-item"' : '';
		printf(
			'<li%s><a href="%s">%s</a></li>',
			$current,
			esc_url( get_permalink( $page->ID ) ),
			esc_html( $page->post_title )
		);
	}
	echo '</ul>';
}
