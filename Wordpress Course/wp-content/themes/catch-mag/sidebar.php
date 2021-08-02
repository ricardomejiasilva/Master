<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package Catch_Mag
 */
?>

<?php
$catch_mag_layout = catch_mag_get_theme_layout();

// Bail early if no sidebar layout is selected.
if ( 'no-sidebar' === $catch_mag_layout ) {
	return;
}

$sidebar = catch_mag_get_sidebar_id();

if ( '' === $sidebar ) {
    return;
}
?>

<aside id="secondary" class="sidebar widget-area" role="complementary">
	<?php dynamic_sidebar( $sidebar ); ?>
</aside><!-- .sidebar .widget-area -->
<?php dynamic_sidebar( 'ads-sidebar-1' ); ?>
