<?php
/**
 * Home Page Options.
 *
 * @package Creativ Mag
 */

$default = creativ_mag_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'home_page_panel',
	array(
	'title'      => __( 'Homepage Sections', 'creativ-mag' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

/**
* Section Customizer Options.
*/
require get_template_directory() . '/inc/customizer/home-sections/featured-posts.php';
require get_template_directory() . '/inc/customizer/home-sections/popular-posts.php';
require get_template_directory() . '/inc/customizer/home-sections/recent-posts.php';
require get_template_directory() . '/inc/customizer/home-sections/latest-posts.php';