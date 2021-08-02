<?php
/**
 * Template Name: Home
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mega_Magazine
 */

if ( ! is_page_template( 'templates/home.php' )  ) {
	return;
}

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
                    <header>
                            <h1 class="page-title screen-reader-text"><?php do_action('mega_megazine_home_title'); ?></h1>
                    </header>
			<?php 

			if ( is_active_sidebar( 'front-page-widget-area' ) ) :
				
				dynamic_sidebar( 'front-page-widget-area' ); 

			else:

	            if ( current_user_can( 'edit_theme_options' ) ) : ?>

	                <p>
	                    <?php echo esc_html__( 'Go to Appearance->Widgets in admin panel to add widgets. This widget will be replaced when you start adding widgets.', 'mega-magazine' ); ?>
	                </p>
			    	
			    	<?php 

			   	endif;
				
			endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();