<?php
/**
 * The template for the sidebar header right
 *
 * @package Catch_Mag
 */
?>

<?php if ( is_active_sidebar( 'sidebar-header-right' ) ) : ?>
<aside id="sidebar-header-right" class="widget-area sidebar-header-right" role="complementary">
	<?php dynamic_sidebar( 'sidebar-header-right' ); ?>
</aside><!-- .sidebar .widget-area -->
<?php endif; ?>
