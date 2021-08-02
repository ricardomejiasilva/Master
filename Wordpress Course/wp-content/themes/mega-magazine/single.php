<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Mega_Magazine
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation();

			// Enable/Disable Related Posts
			$enable_related_posts = mega_magazine_options( 'enable_related_posts' );

			if ( 1 === absint( $enable_related_posts ) ) :
				get_template_part( 'template-parts/related-posts' );
			endif;

			// Enable/Disable Author Information
			$enable_about_author = mega_magazine_options( 'enable_about_author' );

			if ( 1 === absint( $enable_about_author ) ) :
				get_template_part( 'template-parts/about-author' );
			endif;

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
