<?php
/**
 * The template for displaying featured content
 *
 * @package Catch_Mag
 */
?>

<?php
$enable_content = get_theme_mod( 'catch_mag_news_ticker_option', 'disabled' );

if ( ! catch_mag_check_section( $enable_content ) ) {
	// Bail if featured content is disabled.
	return;
}

$label = get_theme_mod( 'catch_mag_news_ticker_label', esc_html__( 'Breaking News', 'catch-mag' ) );
?>

<div id="news-ticker" class="section page">
	<div class="wrapper">
		<?php if ( $label ) : ?>
			<div class="section-heading-wrapper featured-section-headline">
				<h2 class="section-title news-ticker-label"><?php echo esc_html( $label ); ?></h2>
			</div><!-- .section-heading-wrapper -->
		<?php endif; ?>

		<div class="section-content-wrapper news-ticker-content-wrapper has-nav">
			<div class="news-ticker-slider owl-carousel">

				<?php
					get_template_part( 'template-parts/news-ticker/post-types', 'news-ticker' );
				?>
			</div><!-- .news-ticker-slider -->
		</div><!-- .featured-content-wrapper -->
	</div><!-- .wrapper -->
</div><!-- #news-ticker -->
