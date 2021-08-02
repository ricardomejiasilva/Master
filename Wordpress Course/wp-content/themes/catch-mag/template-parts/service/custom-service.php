<?php
/**
 * The template used for displaying service
 *
 * @package Catch_Mag
 */

$quantity = get_theme_mod( 'catch_mag_service_number', 3 );
$output = '';

for ( $i = 1; $i <= $quantity; $i++ ) {
	$content = get_theme_mod(  'catch_mag_service_content_'. $i ) ? '<div class="entry-content">' . get_theme_mod(  'catch_mag_service_content_'. $i ) . '</div>' : '';
	$target  = get_theme_mod(  'catch_mag_service_target_' . $i ) ? '_blank' : '_self';
	$link    = '#';
	$title   = '';
	$image   = '';

	// Checking Link.
	if ( get_theme_mod(  'catch_mag_service_link_' . $i ) ) {
		// support qTranslate plugin.
		if ( function_exists( 'qtrans_convertURL' ) ) {
			$link = qtrans_convertURL( get_theme_mod(  'catch_mag_service_link_' . $i ) );
		} else {
			$link = get_theme_mod(  'catch_mag_service_link_' . $i );
		}
	}

	// Checking Title.
	if ( get_theme_mod(  'catch_mag_service_title_'. $i ) ) {
		$title = '
		<header class="entry-header">
			<h2 class="entry-title">
				<a title="' . esc_attr( get_theme_mod(  'catch_mag_service_title_'. $i ) ) . '" href="' . esc_url( $link ) . '" target="' . $target . '">' . esc_html( get_theme_mod(  'catch_mag_service_title_'. $i ) ) . '</a>
			</h2>
		</header>';
	}

	$img_src = get_theme_mod(  'catch_mag_service_image_' . $i );

	if ( $img_src ) {
		$image .= '
		<a class="post-thumbnail" title="' . esc_attr( $title ) . '" href="' . esc_url( $link ) . '" target="' . $target . '">
			<img src="' . esc_url( $img_src ) . '" class="wp-post-image" alt="' . esc_attr( $title ) . '" title="' . esc_attr( $title ) . '">
		</a>';
	}

	$output .= '
	<article id="service-post-' . esc_attr( $i ) . '" class="post hentry custom-service">
		<div class="hentry-inner">
			' . $image . '
			<div class="entry-container">
				' . $title . $content . '
			</div><!-- .entry-container -->
		</div><!-- .hentry-inner -->	
	</article>';
} // End for().

echo $output;
