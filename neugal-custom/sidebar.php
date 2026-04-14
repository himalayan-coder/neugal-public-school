<?php
/**
 * The sidebar template
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/
 * @package NeugalCustom
 */

if ( ! is_active_sidebar( 'sidebar-primary' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area sidebar" role="complementary" aria-label="<?php esc_attr_e( 'Primary sidebar', 'neugal-custom' ); ?>">
	<?php dynamic_sidebar( 'sidebar-primary' ); ?>
</aside>
