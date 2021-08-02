<?php
/**
 * The template used for displaying slider
 *
 * @package Catch_Mag
 */
?>
<?php
$enable_slider = get_theme_mod( 'catch_mag_slider_option', 'disabled' );

if ( ! catch_mag_check_section( $enable_slider ) ) {
	return;
}
?>

<div id="feature-slider-section" class="section">
	<div class="wrapper section-content-wrapper">
		<div class="main-slider owl-carousel">
			<?php
				get_template_part( 'template-parts/slider/post-type', 'slider' ); 
			?>
		</div><!-- .main-slider -->
	</div><!-- .wrapper -->
</div><!-- #feature-slider -->

