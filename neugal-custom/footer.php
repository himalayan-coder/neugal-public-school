<?php
/**
 * The footer for Neugal Custom Theme
 *
 * Kept as a standalone file for easy Pagelayer editing.
 * Contains: multi-column footer grid, bottom bar, wp_footer().
 *
 * @package NeugalCustom
 */
?>

	</div><!-- #content .site-content -->

	<!-- =====================================================
		 SITE FOOTER
	====================================================== -->
	<footer id="colophon" class="site-footer" role="contentinfo">

		<!-- Footer Top: Four-column grid -->
		<div class="footer-top">
			<div class="container">
				<div class="footer-grid">

					<!-- Column 1: About / Branding -->
					<div class="footer-col footer-col--about">
						<div class="footer-logo-wrap">
							<?php if ( has_custom_logo() ) : ?>
								<?php the_custom_logo(); ?>
							<?php else : ?>
								<div class="site-logo-fallback" aria-hidden="true">
									<svg width="48" height="48" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
										<circle cx="26" cy="26" r="26" fill="#e8a020"/>
										<text x="50%" y="55%" dominant-baseline="middle" text-anchor="middle" font-family="serif" font-size="22" font-weight="bold" fill="#1a3c5e">N</text>
									</svg>
								</div>
							<?php endif; ?>
							<span class="footer-school-name"><?php bloginfo( 'name' ); ?></span>
						</div>
						<p class="footer-tagline">
							<?php echo esc_html( get_bloginfo( 'description' ) ?: __( 'Nurturing young minds with quality education, values, and excellence since establishment.', 'neugal-custom' ) ); ?>
						</p>

						<!-- Social Media Links -->
						<div class="footer-social">
							<a href="https://facebook.com" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Facebook', 'neugal-custom' ); ?>">
								<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
									<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
								</svg>
							</a>
							<a href="https://youtube.com" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'YouTube', 'neugal-custom' ); ?>">
								<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
									<path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46A2.78 2.78 0 0 0 1.46 6.42 29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.95 1.96C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.96-1.96A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58zM9.75 15.5v-7l6.5 3.5-6.5 3.5z"/>
								</svg>
							</a>
							<a href="https://instagram.com" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Instagram', 'neugal-custom' ); ?>">
								<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
									<rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
								</svg>
							</a>
						</div><!-- .footer-social -->
					</div><!-- .footer-col--about -->

					<!-- Column 2: Quick Links -->
					<div class="footer-col footer-col--links">
						<h2 class="footer-heading"><?php esc_html_e( 'Quick Links', 'neugal-custom' ); ?></h2>
						<ul class="footer-links">
							<?php
							if ( has_nav_menu( 'footer' ) ) {
								wp_nav_menu( array(
									'theme_location' => 'footer',
									'container'      => false,
									'menu_class'     => 'footer-links',
									'depth'          => 1,
									'fallback_cb'    => false,
								) );
							} else {
								// Default static links if no menu assigned.
								$default_links = array(
									__( 'About Us',         'neugal-custom' ) => '/about',
									__( 'Academics',        'neugal-custom' ) => '/academics',
									__( 'Admissions',       'neugal-custom' ) => '/admission',
									__( 'Faculty',          'neugal-custom' ) => '/faculty',
									__( 'Activities',       'neugal-custom' ) => '/activities',
									__( 'Gallery',          'neugal-custom' ) => '/gallery',
									__( 'Notice Board',     'neugal-custom' ) => '/notice',
									__( 'Contact Us',       'neugal-custom' ) => '/contact',
								);
								foreach ( $default_links as $label => $path ) {
									printf(
										'<li><a href="%s">%s</a></li>',
										esc_url( home_url( $path ) ),
										esc_html( $label )
									);
								}
							}
							?>
						</ul>
					</div><!-- .footer-col--links -->

					<!-- Column 3: Academics -->
					<div class="footer-col footer-col--academics">
						<h2 class="footer-heading"><?php esc_html_e( 'Academics', 'neugal-custom' ); ?></h2>
						<ul class="footer-links">
							<li><a href="<?php echo esc_url( home_url( '/early-childhood' ) ); ?>"><?php esc_html_e( 'Early Childhood', 'neugal-custom' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/primary' ) ); ?>"><?php esc_html_e( 'Primary School', 'neugal-custom' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/secondary' ) ); ?>"><?php esc_html_e( 'Secondary School', 'neugal-custom' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/higher-secondary' ) ); ?>"><?php esc_html_e( 'Higher Secondary', 'neugal-custom' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/curriculum' ) ); ?>"><?php esc_html_e( 'Curriculum', 'neugal-custom' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/e-library' ) ); ?>"><?php esc_html_e( 'E-Library', 'neugal-custom' ); ?></a></li>
						</ul>
					</div><!-- .footer-col--academics -->

					<!-- Column 4: Contact -->
					<div class="footer-col footer-col--contact">
						<h2 class="footer-heading"><?php esc_html_e( 'Contact Us', 'neugal-custom' ); ?></h2>

						<div class="footer-contact-item">
							<div class="footer-contact-icon" aria-hidden="true">
								<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
								</svg>
							</div>
							<div class="footer-contact-text">
								<strong><?php esc_html_e( 'Address', 'neugal-custom' ); ?></strong>
								<?php esc_html_e( 'Neugal, Pokhara, Kaski, Nepal', 'neugal-custom' ); ?>
							</div>
						</div>

						<div class="footer-contact-item">
							<div class="footer-contact-icon" aria-hidden="true">
								<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1-9.4 0-17-7.6-17-17 0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z"/>
								</svg>
							</div>
							<div class="footer-contact-text">
								<strong><?php esc_html_e( 'Phone', 'neugal-custom' ); ?></strong>
								<a href="tel:+977-9800000000">+977-9800000000</a>
							</div>
						</div>

						<div class="footer-contact-item">
							<div class="footer-contact-icon" aria-hidden="true">
								<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
								</svg>
							</div>
							<div class="footer-contact-text">
								<strong><?php esc_html_e( 'Email', 'neugal-custom' ); ?></strong>
								<a href="mailto:info@neugalschool.edu.np">info@neugalschool.edu.np</a>
							</div>
						</div>

						<div class="footer-contact-item">
							<div class="footer-contact-icon" aria-hidden="true">
								<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
								</svg>
							</div>
							<div class="footer-contact-text">
								<strong><?php esc_html_e( 'Office Hours', 'neugal-custom' ); ?></strong>
								<?php esc_html_e( 'Sun – Fri: 10:00 AM – 4:00 PM', 'neugal-custom' ); ?>
							</div>
						</div>

					</div><!-- .footer-col--contact -->

				</div><!-- .footer-grid -->
			</div><!-- .container -->
		</div><!-- .footer-top -->

		<!-- Footer Bottom Bar -->
		<div class="footer-bottom">
			<div class="container">
				<p class="footer-copyright">
					&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>.
					<?php esc_html_e( 'All Rights Reserved.', 'neugal-custom' ); ?>
				</p>
				<nav class="footer-bottom-links" aria-label="<?php esc_attr_e( 'Footer legal links', 'neugal-custom' ); ?>">
					<a href="<?php echo esc_url( home_url( '/privacy-policy' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'neugal-custom' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/terms' ) ); ?>"><?php esc_html_e( 'Terms of Use', 'neugal-custom' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/sitemap' ) ); ?>"><?php esc_html_e( 'Sitemap', 'neugal-custom' ); ?></a>
				</nav>
			</div>
		</div><!-- .footer-bottom -->

	</footer><!-- #colophon -->

</div><!-- #page .site -->

<?php wp_footer(); ?>
</body>
</html>
