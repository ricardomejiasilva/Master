<?php
/**
 * Catch Magazine back compat functionality
 *
 * Prevents Catch Magazine from running on WordPress versions prior to 4.4,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.4.
 *
 * @package Catch_Mag
 */

/**
 * Prevent switching to Catch Magazine on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Catch Mag 1.0
 */
function catch_mag_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	unset( $_GET['activated'] );

	add_action( 'admin_notices', 'catch_mag_upgrade_notice' );
}
add_action( 'after_switch_theme', 'catch_mag_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Catch Magazine on WordPress versions prior to 4.4.
 *
 * @since Catch Mag 1.0
 *
 * @global string $wp_version WordPress version.
 */
function catch_mag_upgrade_notice() {
	/* translators: %s: current WordPress version. */
	$message = sprintf( __( 'Catch Magazine requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'catch-mag' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );// WPCS: XSS ok.
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.4.
 *
 * @since Catch Mag 1.0
 *
 * @global string $wp_version WordPress version.
 */
function catch_mag_customize() {
	/* translators: %s: current WordPress version. */
	$message = sprintf( __( 'Catch Magazine requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'catch-mag' ), $GLOBALS['wp_version'] ); // WPCS: XSS ok.

	wp_die( $message, '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'catch_mag_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.4.
 *
 * @since Catch Mag 1.0
 *
 * @global string $wp_version WordPress version.
 */
function catch_mag_preview() {
	if ( isset( $_GET['preview'] ) ) {
		/* translators: %s: current WordPress version. */
		wp_die( sprintf( __( 'Catch Magazine requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'catch-mag' ), $GLOBALS['wp_version'] ) );// WPCS: XSS ok.
	}
}
add_action( 'template_redirect', 'catch_mag_preview' );
