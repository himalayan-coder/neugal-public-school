<?php
/**
 * Neugal Custom Theme — functions.php
 *
 * Core theme setup: supports, menus, widgets, enqueue scripts/styles.
 *
 * @package NeugalCustom
 */

if ( ! defined( 'NEUGAL_VERSION' ) ) {
	define( 'NEUGAL_VERSION', '1.0.0' );
}

if ( ! defined( 'NEUGAL_DIR' ) ) {
	define( 'NEUGAL_DIR', get_template_directory() );
}

if ( ! defined( 'NEUGAL_URI' ) ) {
	define( 'NEUGAL_URI', get_template_directory_uri() );
}

/*--------------------------------------------------------------
# Theme Setup
--------------------------------------------------------------*/
if ( ! function_exists( 'neugal_setup' ) ) {
	function neugal_setup() {

		// Make theme translatable.
		load_theme_textdomain( 'neugal-custom', NEUGAL_DIR . '/languages' );

		// Automatic feed links.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage <title>.
		add_theme_support( 'title-tag' );

		// Featured images on posts and pages.
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'neugal-hero',    1200, 600, true );
		add_image_size( 'neugal-card',     600, 400, true );
		add_image_size( 'neugal-thumb',    400, 300, true );

		// Navigation menus.
		register_nav_menus( array(
			'primary'  => __( 'Primary Menu',  'neugal-custom' ),
			'footer'   => __( 'Footer Menu',   'neugal-custom' ),
			'topbar'   => __( 'Top Bar Menu',  'neugal-custom' ),
		) );

		// HTML5 markup.
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		) );

		// Custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 120,
			'width'       => 360,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Custom background.
		add_theme_support( 'custom-background', apply_filters( 'neugal_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Block editor styles.
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );

		// Editor colour palette matching brand.
		add_theme_support( 'editor-color-palette', array(
			array( 'name' => __( 'Primary Navy',  'neugal-custom' ), 'slug' => 'primary',  'color' => '#1a3c5e' ),
			array( 'name' => __( 'Gold Accent',   'neugal-custom' ), 'slug' => 'accent',   'color' => '#e8a020' ),
			array( 'name' => __( 'School Green',  'neugal-custom' ), 'slug' => 'secondary','color' => '#2e7d32' ),
			array( 'name' => __( 'White',         'neugal-custom' ), 'slug' => 'white',    'color' => '#ffffff' ),
			array( 'name' => __( 'Light Grey',    'neugal-custom' ), 'slug' => 'light',    'color' => '#f5f7fa' ),
		) );

		// WooCommerce support (safe to add even if not active).
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}
}
add_action( 'after_setup_theme', 'neugal_setup' );

/*--------------------------------------------------------------
# Content Width
--------------------------------------------------------------*/
function neugal_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'neugal_content_width', 800 );
}
add_action( 'after_setup_theme', 'neugal_content_width', 0 );

/*--------------------------------------------------------------
# Widget Areas
--------------------------------------------------------------*/
function neugal_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'neugal-custom' ),
		'id'            => 'sidebar-primary',
		'description'   => __( 'Widgets added here appear in the main sidebar.', 'neugal-custom' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Column 1', 'neugal-custom' ),
		'id'            => 'footer-1',
		'description'   => __( 'Footer widget area — column 1.', 'neugal-custom' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Column 2', 'neugal-custom' ),
		'id'            => 'footer-2',
		'description'   => __( 'Footer widget area — column 2.', 'neugal-custom' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'neugal_widgets_init' );

/*--------------------------------------------------------------
# Enqueue Styles and Scripts
--------------------------------------------------------------*/
function neugal_scripts() {

	// Google Fonts — Playfair Display (headings) + Inter (body).
	wp_enqueue_style(
		'neugal-google-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,700;1,400&display=swap',
		array(),
		null
	);

	// Main stylesheet.
	wp_enqueue_style(
		'neugal-style',
		get_stylesheet_uri(),
		array( 'neugal-google-fonts' ),
		NEUGAL_VERSION
	);

	// Theme script.
	wp_enqueue_script(
		'neugal-main',
		NEUGAL_URI . '/js/main.js',
		array(),
		NEUGAL_VERSION,
		true
	);

	// Pass data to script.
	wp_localize_script( 'neugal-main', 'neugalData', array(
		'ajaxUrl' => admin_url( 'admin-ajax.php' ),
		'nonce'   => wp_create_nonce( 'neugal-nonce' ),
	) );

	// Comment reply script.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'neugal_scripts' );

/*--------------------------------------------------------------
# Block Editor Styles
--------------------------------------------------------------*/
function neugal_block_editor_styles() {
	wp_enqueue_style(
		'neugal-editor',
		NEUGAL_URI . '/css/editor.css',
		array(),
		NEUGAL_VERSION
	);
}
add_action( 'enqueue_block_editor_assets', 'neugal_block_editor_styles' );

/*--------------------------------------------------------------
# Template Tags
--------------------------------------------------------------*/

/**
 * Displays an optional post thumbnail.
 */
function neugal_post_thumbnail() {
	if ( ! has_post_thumbnail() || is_attachment() ) {
		return;
	}
	?>
	<div class="post-thumbnail">
		<?php the_post_thumbnail( 'neugal-hero' ); ?>
	</div>
	<?php
}

/**
 * Prints the entry title wrapped in appropriate heading level.
 */
function neugal_the_title( $before = '<h2 class="entry-title">', $after = '</h2>', $echo = true ) {
	if ( is_singular() ) {
		$before = '<h1 class="entry-title">';
	}
	the_title( $before, $after, $echo );
}

/**
 * Outputs entry meta for posts (date, author, categories).
 */
function neugal_entry_meta() {
	if ( 'post' !== get_post_type() ) {
		return;
	}
	?>
	<div class="entry-meta">
		<span class="posted-on">
			<time class="entry-date" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
				<?php echo esc_html( get_the_date() ); ?>
			</time>
		</span>
		<span class="byline">
			<?php the_author_posts_link(); ?>
		</span>
		<?php the_category( ', ' ); ?>
	</div>
	<?php
}

/**
 * Returns body classes for the page layout.
 */
function neugal_body_classes( $classes ) {
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}
	if ( is_active_sidebar( 'sidebar-primary' ) && ! is_page_template( 'page-full-width.php' ) ) {
		$classes[] = 'has-sidebar';
	} else {
		$classes[] = 'no-sidebar';
	}
	return $classes;
}
add_filter( 'body_class', 'neugal_body_classes' );

/*--------------------------------------------------------------
# Excerpt
--------------------------------------------------------------*/
function neugal_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'neugal_excerpt_length' );

function neugal_excerpt_more( $more ) {
	return '&hellip; <a class="read-more" href="' . esc_url( get_permalink() ) . '">' . esc_html__( 'Read More', 'neugal-custom' ) . '</a>';
}
add_filter( 'excerpt_more', 'neugal_excerpt_more' );

/*--------------------------------------------------------------
# Page Title Banner
--------------------------------------------------------------*/
/**
 * Outputs the standard page hero/banner with title and breadcrumb.
 */
function neugal_page_hero() {
	if ( is_front_page() || is_home() ) {
		return;
	}
	?>
	<div class="page-hero">
		<div class="container">
			<div class="page-hero__content">
				<h1>
					<?php
					if ( is_archive() ) {
						the_archive_title();
					} elseif ( is_search() ) {
						printf( esc_html__( 'Search Results for: %s', 'neugal-custom' ), get_search_query() );
					} elseif ( is_404() ) {
						esc_html_e( 'Page Not Found', 'neugal-custom' );
					} else {
						the_title();
					}
					?>
				</h1>
				<nav class="breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'neugal-custom' ); ?>">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'neugal-custom' ); ?></a>
					<span aria-hidden="true">›</span>
					<?php
					if ( is_archive() ) {
						the_archive_title();
					} elseif ( is_search() ) {
						esc_html_e( 'Search', 'neugal-custom' );
					} elseif ( is_404() ) {
						esc_html_e( '404', 'neugal-custom' );
					} else {
						the_title();
					}
					?>
				</nav>
			</div>
		</div>
	</div>
	<?php
}

/*--------------------------------------------------------------
# Pagelayer Compatibility
--------------------------------------------------------------*/
/**
 * Ensure wp_body_open() is available for older WP installs.
 */
if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/*--------------------------------------------------------------
# Theme Credits
--------------------------------------------------------------*/
function neugal_theme_credits() {
	return sprintf(
		'<a href="%s">%s</a> &mdash; %s',
		esc_url( __( 'https://wordpress.org/', 'neugal-custom' ) ),
		esc_html__( 'Proudly powered by WordPress', 'neugal-custom' ),
		esc_html__( 'Neugal Custom Theme', 'neugal-custom' )
	);
}
