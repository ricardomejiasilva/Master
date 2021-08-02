<?php
/**
 * Breadcrumbs.
 *
 * @package Maga_Magazine
 */

// Bail if front page.
if ( is_front_page() || is_page_template( 'templates/home.php' ) ) {
	return;
}

$breadcrumb_type = mega_magazine_options( 'breadcrumb_type' );
if ( 'disable' === $breadcrumb_type ) {
	return;
}

if ( ! function_exists( 'mega_magazine_breadcrumb_trail' ) ) {
	require_once trailingslashit( get_template_directory() ) . '/inc/breadcrumbs/breadcrumbs.php';
}
?>

<div id="breadcrumb">
	<div class="container">
		<?php

		$breadcrumb_text = mega_magazine_options( 'breadcrumb_text' );

		$breadcrumb_args = array(
			'container'   => 'div',
			'show_browse' => false,
		);

		if( !empty( $breadcrumb_text ) ){

			$breadcrumb_args['labels']['home'] = esc_html( $breadcrumb_text );
		}

		mega_magazine_breadcrumb_trail( $breadcrumb_args );
		
		?>
	</div><!-- .container -->
</div><!-- #breadcrumb -->
