<?php
/**
 * Custom functions for different widgets
 *
 * @package Mega_Magazine
 */

/**
 * Load custom widgets
 */
if ( ! function_exists( 'mega_magazine_custom_widgets' ) ) :

	function mega_magazine_custom_widgets() {

		// Slider widget
		register_widget( 'Mega_Magazine_Slider_Widget' );

		// Social profile widget
		register_widget( 'Mega_Magazine_Social_Widget' );

		// Split column news widget
		register_widget( 'Mega_Magazine_Split_Columns' );

		// Double column news widget
		register_widget( 'Mega_Magazine_Double_Columns' );

		// Three column news widget
		register_widget( 'Mega_Magazine_Three_Columns' );

		// Full column news widget
		register_widget( 'Mega_Magazine_Full_Column' );

		// Popular posts widget
		register_widget( 'Mega_Magazine_Popular_Posts' );

		// Recent posts widget
		register_widget( 'Mega_Magazine_Recent_Posts' );

	}

endif;

add_action( 'widgets_init', 'mega_magazine_custom_widgets' );

/**
 * Slider widget
 */
require get_template_directory() . '/inc/widgets/slider.php';

/**
 * Social profile widget
 */
require get_template_directory() . '/inc/widgets/social-profile.php';

/**
 * Split columns widget
 */
require get_template_directory() . '/inc/widgets/split-columns.php';

/**
 * Double columns widget
 */
require get_template_directory() . '/inc/widgets/double-columns.php';

/**
 * Three columns widget
 */
require get_template_directory() . '/inc/widgets/three-columns.php';

/**
 * Full columns widget
 */
require get_template_directory() . '/inc/widgets/full-column.php';

/**
 * Popular posts widget
 */
require get_template_directory() . '/inc/widgets/popular-posts.php';

/**
 * Recent posts widget
 */
require get_template_directory() . '/inc/widgets/recent-posts.php';