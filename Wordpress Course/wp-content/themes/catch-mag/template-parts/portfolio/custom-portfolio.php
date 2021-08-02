<?php
/**
 * The template for displaying portfolio items
 *
 * @package Catch_Mag
 */
?>

<?php
$number = get_theme_mod( 'catch_mag_portfolio_number', 4 );

if ( ! $number ) {
	// If number is 0, then this section is disabled
	return;
}

$slider_select = get_theme_mod( 'catch_mag_portfolio_slider', 1 );

for ( $i = 1; $i <= $number; $i++ ) {
	$content  = get_theme_mod( 'catch_mag_portfolio_content_' . $i );
	$target   = get_theme_mod( 'catch_mag_portfolio_target_' . $i ) ? '_blank': '_self';
	$link     = get_theme_mod( 'catch_mag_portfolio_link_' . $i, '#' );
	$title    = get_theme_mod( 'catch_mag_portfolio_title_' . $i );
	$image    = get_theme_mod( 'catch_mag_portfolio_image_' . $i ) ? get_theme_mod( 'catch_mag_portfolio_image_' . $i ) : trailingslashit( esc_url( get_template_directory_uri() ) ) . 'assets/images/no-thumb.jpg';

	if ( function_exists( 'qtrans_convertURL' ) ) {
		$link = qtrans_convertURL( $link );
	}

	?>
	<article id="post-<?php echo esc_attr( $i ) ?>" class="hentry post-image">
		<div class="hentry-inner">
			<div class="portfolio-thumbnail post-thumbnail">
				<?php if ( $link ) : ?>
				<a class="post-thumbnail" href="<?php echo esc_url( $link ); ?>" target="<?php echo esc_attr( $target ); ?>">
				<?php endif; ?>
					<img src="<?php echo esc_url( $image ); ?>" class="wp-post-image" alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>">
				<?php if ( $link ) : ?>
				</a>
				<?php endif; ?>
			</div>

			<div class="entry-container">
				<?php
				if ( $title ) : ?>
					<header class="entry-header">
						<h2 class="entry-title">
							<?php if ( $link ) : ?>
							<a class="post-thumbnail" href="<?php echo esc_url( $link ); ?>" target="<?php echo esc_attr( $target ); ?>">
							<?php endif; ?>
								<?php echo wp_kses_post( $title ); ?></h2>
							<?php if ( $link ) : ?>
							</a>
							<?php endif; ?>
					</header>
				<?php endif; ?>

				<?php if ( $content ) : ?>
				<div class="entry-content">
					<?php echo wp_kses_post( apply_filters( 'the_content', $content ) ); ?>
				</div>
				<?php endif; ?>
				
			</div><!-- .entry-container -->
		</div><!-- .hentry-inner -->
	</article>
<?php
}
