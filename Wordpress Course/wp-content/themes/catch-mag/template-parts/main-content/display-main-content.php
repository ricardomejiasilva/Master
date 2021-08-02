<?php
/**
 * The template for displaying main-content
 *
 * @package Catch_Mag
 */

if ( is_page() ) :
	?>
	<div class="singular-content-wrap">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content/content', 'page' );

			// Comments Templates
			if ( comments_open() || '0' != get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;
		?>
	</div><!-- .singular-content-wrap -->
	<?php
elseif ( is_single() ) : ?>
	<div class="singular-content-wrap">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'template-parts/content/content', 'single' );

			// Comments Templates
			if ( comments_open() || '0' != get_comments_number() ) {
				comments_template();
			}

			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'catch-mag' ),
				) );
			} elseif ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				the_post_navigation( array(
					'prev_text' => '<span aria-hidden="true" class="nav-subtitle">' . __( 'Previous Post', 'catch-mag' ) . '</span><span class="nav-title">%title</span><span class="screen-reader-text">' . __( 'Previous Post', 'catch-mag' ) . '</span>' ,
					'next_text' => '<span aria-hidden="true" class="nav-subtitle">' . __( 'Next Post', 'catch-mag' ) . '</span><span class="nav-title">%title</span><span class="screen-reader-text">' . __( 'Next Post', 'catch-mag' ) . '</span>' ,
				) );
			}

			// End of the loop.
		endwhile;
		?>
	</div><!-- .singular-content-wrap -->
	<?php
elseif ( is_home() ) : ?>
<div class="archive-posts-wrapper section">
	<?php
    $title     = get_theme_mod( 'catch_mag_recent_posts_heading', esc_html__( 'Blog', 'catch-mag' ) );
	if ( $title) : ?>
	<div class="section-heading-wrapper">
			<div class="section-title-wrapper">
				<h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
			</div><!-- .section-title-wrapper -->
	</div><!-- .section-heading-wrapper -->
	<?php endif; ?>

	<div class="section-content-wrapper">
		<div id="infinite-post-wrap" class="archive-post-wrap">
			<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content/content', get_post_format() );

			// End the loop.
			endwhile;

			catch_mag_content_nav();
			?>
		</div><!-- .archive-post-wrapper -->
	</div><!-- .section-content-wrapper -->

	<?php
	else :
		get_template_part( 'template-parts/content/content', 'none' );

	endif;
	?>
</div><!-- .archive-posts-wrapper -->
<?php 
else : ?>
	<?php if ( have_posts() ) : ?>
		<div class="archive-posts-wrapper section">
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title section-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description-wrapper">', '</div>' );
				?>
			</header><!-- .page-header -->

			<div class="section-content-wrapper">
				<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content/content', get_post_format() );

				// End the loop.
				endwhile;

				catch_mag_content_nav();?>
			</div><!-- .section-content-wrap -->
		</div><!-- .archive-posts-wrapper -->	

	<?php
	else :
		get_template_part( 'template-parts/content/content', 'none' );

	endif;?>
<?php
endif;
