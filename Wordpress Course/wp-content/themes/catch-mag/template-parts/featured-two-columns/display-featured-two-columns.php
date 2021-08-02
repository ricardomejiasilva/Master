<?php
/**
 * The template for displaying featured-two-columns items
 *
 * @package Catch_Mag
 */
?>

<?php
$enable = get_theme_mod( 'catch_mag_featured_two_columns_option', 'disabled' );

if ( ! catch_mag_check_section( $enable ) ) {
	// Bail if featured-two-columns section is disabled.
	return;
}

$headline = get_theme_mod( 'catch_mag_featured_two_columns_headline', esc_html__( 'Featured Two Columns', 'catch-mag' ) );
$subheadline = get_theme_mod( 'catch_mag_featured_two_columns_subheadline' );
?>
<div id="catch-mag-featured-two-columns-section" class="catch-mag-featured-two-columns-section section catch-mag-section">
	<div class="wrapper">
		<?php if ( $headline || $subheadline ) : ?>
			<div class="section-heading-wrapper">
			<?php if ( $headline ) : ?>
				<div class="section-title-wrapper">
					<h2 class="section-title"><?php echo wp_kses_post( $headline ); ?></h2>
				</div><!-- .section-title-wrapper -->
			<?php endif; ?>

			<?php if ( $subheadline ) : ?>
				<div class="taxonomy-description-wrapper section-subtitle">
					<?php
	                $subheadline = apply_filters( 'the_content', $subheadline );
	                echo str_replace( ']]>', ']]&gt;', $subheadline );
	                ?>
				</div><!-- .taxonomy-description-wrapper -->
			<?php endif; ?>
			</div><!-- .section-heading-wrapper -->
		<?php endif; ?>

		<div class="section-content-wrapper catch-mag-featured-two-columns-content-wrapper layout-two">
			<?php
				get_template_part( 'template-parts/featured-two-columns/post-types', 'featured-two-columns' );
			?>
		</div><!-- .featured-two-columns-wrapper -->
	</div><!-- .wrapper -->
</div><!-- #featured-two-columns-content-section -->
