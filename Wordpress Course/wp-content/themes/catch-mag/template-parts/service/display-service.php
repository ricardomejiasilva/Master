<?php
/**
 * The template used for displaying service
 *
 * @package Catch_Mag
 */

// get data value from options
$enable_content = get_theme_mod( 'catch_mag_service_option', 'disabled' );

if ( ! catch_mag_check_section( $enable_content ) ) {
	// Bail if services section is disabled.
	return;
}

$headline     = get_option( 'ect_service_title', esc_html__( 'Services ', 'catch-mag' ) );
$subheadline  = get_option( 'ect_service_content' );
$classes[] = 'section';
?>
<div id="service-content-section" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<div class="wrapper">
		<?php if ( ! empty( $headline ) || ! empty( $subheadline ) ) : ?>
		<div class="section-heading-wrapper service-section-headline">

			<?php if ( ! empty( $headline ) ) : ?>
			<div class="section-title-wrapper"><h2 class="section-title"><?php echo wp_kses_post( $headline ); ?></h2></div>
			<?php endif; ?>

			<?php if ( ! empty( $subheadline ) ) :
				$subheadline = apply_filters( 'the_content', $subheadline );
			?>
			<div class="taxonomy-description-wrapper section-subtitle"><?php echo str_replace( ']]>', ']]&gt;', $subheadline ); ?></div>
			<?php endif; ?>
		</div><!-- .section-heading-wrapper -->
		<?php endif; ?>

		<div class="section-content-wrapper service-content-wrapper layout-four">
			<?php
			// Select content
				get_template_part( 'template-parts/service/post-type-service' );
			?>
		</div><!-- .service-content-wrapper -->
	</div><!-- .wrapper -->
</div><!-- #service-content-section -->
