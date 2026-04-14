<?php
/**
 * The header for Neugal Custom Theme
 *
 * Displays the <head> section plus the sticky site header consisting of:
 *   • Top Bar  — dark blue strip with phone/email (left) and social icons (right).
 *   • Nav Bar  — white bar with the primary navigation and key CTAs.
 *   • Logo     — circular school emblem that overlaps BOTH bars on the left,
 *                creating the classic "overlapping badge" look.
 *
 * All contact info, social links, and the Mandatory Public Disclosure URL are
 * managed via Appearance → Customize → School Info so non-technical staff can
 * update them without touching any code.
 *
 * Kept as a standalone file for seamless Pagelayer integration.
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
		 SITE HEADER — sticky, contains top bar + nav bar
	====================================================== -->
	<header id="masthead" class="site-header" role="banner">

		<!-- TOP BAR — dark blue strip: phone/email left, social icons right -->
		<div class="header-topbar" aria-label="<?php esc_attr_e( 'Contact information', 'neugal-custom' ); ?>">
			<div class="container">
				<div class="header-topbar__inner">

					<div class="topbar-contact">
						<?php
						$neugal_phone = get_theme_mod( 'neugal_phone', '' );
						$neugal_email = get_theme_mod( 'neugal_email', '' );
						if ( $neugal_phone ) :
						?>
						<a href="tel:<?php echo esc_attr( preg_replace( '/[^+0-9]/', '', $neugal_phone ) ); ?>" class="topbar-link" aria-label="<?php esc_attr_e( 'Call us', 'neugal-custom' ); ?>">
							<svg class="topbar-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
								<path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1-9.4 0-17-7.6-17-17 0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z"/>
							</svg>
							<?php echo esc_html( $neugal_phone ); ?>
						</a>
						<?php endif; ?>

						<?php if ( $neugal_email ) : ?>
						<a href="mailto:<?php echo esc_attr( $neugal_email ); ?>" class="topbar-link" aria-label="<?php esc_attr_e( 'Email us', 'neugal-custom' ); ?>">
							<svg class="topbar-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
								<path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
							</svg>
							<?php echo esc_html( $neugal_email ); ?>
						</a>
						<?php endif; ?>
					</div><!-- .topbar-contact -->

					<div class="topbar-social">
						<?php
						$neugal_fb = get_theme_mod( 'neugal_facebook',  '' );
						$neugal_tw = get_theme_mod( 'neugal_twitter',   '' );
						$neugal_yt = get_theme_mod( 'neugal_youtube',   '' );
						$neugal_ig = get_theme_mod( 'neugal_instagram', '' );
						?>
						<?php if ( $neugal_fb ) : ?>
						<a href="<?php echo esc_url( $neugal_fb ); ?>" class="topbar-social-link" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Facebook', 'neugal-custom' ); ?>">
							<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
								<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
							</svg>
						</a>
						<?php endif; ?>

						<?php if ( $neugal_tw ) : ?>
						<a href="<?php echo esc_url( $neugal_tw ); ?>" class="topbar-social-link" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Twitter / X', 'neugal-custom' ); ?>">
							<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
								<path d="M4 4l16 16M4 20L20 4" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" fill="none"/>
							</svg>
						</a>
						<?php endif; ?>

						<?php if ( $neugal_yt ) : ?>
						<a href="<?php echo esc_url( $neugal_yt ); ?>" class="topbar-social-link" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'YouTube', 'neugal-custom' ); ?>">
							<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
								<path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46A2.78 2.78 0 0 0 1.46 6.42 29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.95 1.96C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.96-1.96A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58zM9.75 15.5v-7l6.5 3.5-6.5 3.5z"/>
							</svg>
						</a>
						<?php endif; ?>

						<?php if ( $neugal_ig ) : ?>
						<a href="<?php echo esc_url( $neugal_ig ); ?>" class="topbar-social-link" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Instagram', 'neugal-custom' ); ?>">
							<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
								<rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" fill="none" stroke="currentColor" stroke-width="1.5"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/>
							</svg>
						</a>
						<?php endif; ?>
					</div><!-- .topbar-social -->

				</div><!-- .header-topbar__inner -->
			</div><!-- .container -->
		</div><!-- .header-topbar -->

		<!-- NAVBAR — white bar: overlapping logo (left) + navigation + CTA -->
		<div class="header-navbar">
			<div class="container header-navbar__container">
				<div class="header-navbar__inner">

					<!-- Branding: Logo badge that overlaps BOTH the top bar and nav bar -->
					<div class="site-branding">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
							<?php
							if ( has_custom_logo() ) {
								the_custom_logo();
							} else {
								?>
								<div class="site-logo-fallback" aria-hidden="true">
									<svg width="96" height="96" viewBox="0 0 96 96" fill="none" xmlns="http://www.w3.org/2000/svg">
										<circle cx="48" cy="48" r="44" fill="#1a3c5e" stroke="#e8a020" stroke-width="4"/>
										<text x="50%" y="52%" dominant-baseline="middle" text-anchor="middle" font-family="serif" font-size="38" font-weight="bold" fill="#e8a020">N</text>
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
							</div><!-- .site-branding__text -->
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

					<!-- Header Actions: Mandatory Public Disclosure CTA + Search -->
					<div class="header-actions">
						<?php
						$neugal_mpd = get_theme_mod( 'neugal_mpd_url', '' );
						if ( $neugal_mpd ) :
						?>
						<a href="<?php echo esc_url( $neugal_mpd ); ?>" class="btn-mpd" target="_blank" rel="noopener noreferrer">
							<?php esc_html_e( 'Mandatory Public Disclosure', 'neugal-custom' ); ?>
						</a>
						<?php endif; ?>

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

				</div><!-- .header-navbar__inner -->
			</div><!-- .container -->
		</div><!-- .header-navbar -->

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
 * Renders all published pages in menu order.
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
