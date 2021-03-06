<?php
/**
 * The template part for displaying content
 *
 * @package Catch_Mag
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-wrapper">
		<?php
			catch_mag_post_thumbnail( 'catch-mag-featured' );
		?>

		<div class="entry-container">
			<header class="entry-header">
				<div class="entry-meta">
					<?php echo catch_mag_entry_category(); ?>
				</div><!-- .entry-meta -->
				<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
					<span class="sticky-post"><?php esc_html_e( 'Featured', 'catch-mag' ); ?></span>
				<?php endif; ?>

				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

				<?php echo catch_mag_entry_header(); ?>
			</header><!-- .entry-header -->
				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->
			<footer class="entry-footer">
				<div class="entry-meta">
					<?php 
						catch_mag_edit_link();
					?>
				</div>
			</footer>
		</div><!-- .entry-container -->
	</div><!-- .hentry-inner -->
</article><!-- #post-## -->
