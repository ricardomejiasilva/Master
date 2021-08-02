<?php
/**
 * The template for displaying header_highlight items
 *
 * @package Catch_Mag
 */
?>

<?php
$enable = get_theme_mod( 'catch_mag_header_highlight_option', 'disabled' );

if ( ! catch_mag_check_section( $enable ) ) {
	// Bail if featured content is disabled
	return;
}

$headline    = get_theme_mod( 'catch_mag_header_highlight_headline' );
$subheadline = get_theme_mod( 'catch_mag_header_highlight_subheadline' );

$classes[] = 'section header-highlights-section';

if ( ! $headline && ! $subheadline ) {
	$classes[] = 'no-headline';
}
?>
<div id="header-highlights-section" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<div class="wrapper">
	<?php if ( $headline || $subheadline ) : ?>
		<div class="section-heading-wrapper header-highlight-section-headline">
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
		<?php 
		$content_classes = 'section-content-wrapper header-highlights-content-wrapper layout-four';
		$content_classes .= ' slider-disabled';

		?>
		<div class="<?php echo esc_attr( $content_classes ); ?>">
			<?php 
				get_template_part( 'template-parts/header-highlight/post-types', 'header-highlight' );
			?>
			
		</div><!-- .section-content-wrapper -->
	</div><!-- .wrapper -->
</div><!-- .header_highlight-content-section -->
