<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Mega_Magazine
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function mega_magazine_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// For sticky sidebar
	$sticky_sidebar = mega_magazine_options( 'sticky_sidebar' );

	if( 1 == $sticky_sidebar ){

		$classes[] = 'sticky-sidebar-enabled';

	}

	// Add class for blog layout.
	$blog_layout = mega_magazine_options( 'blog_layout' );
	$blog_layout = apply_filters( 'mega_magazine_global_sidebar_position_filter', $blog_layout );
	$classes[] = 'layout-' . esc_attr( $blog_layout );

	// Add class for boxed layout.
	$site_layout = mega_magazine_options( 'site_layout' );

	if( 'boxed' == $site_layout ){

		$classes[] = 'main-layout-boxed';

	}

	return $classes;
}
add_filter( 'body_class', 'mega_magazine_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function mega_magazine_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'mega_magazine_pingback_header' );

if ( ! function_exists( 'mega_magazine_implement_excerpt_length' ) ) :

	/**
	 * Implement excerpt length.
	 *
	 * @since 1.0.0
	 *
	 * @param int $length The number of words.
	 * @return int Excerpt length.
	 */
	function mega_magazine_implement_excerpt_length( $length ) {

		$excerpt_length = mega_magazine_options( 'excerpt_length' );

		if ( absint( $excerpt_length ) > 0 ) {

			$length = absint( $excerpt_length );

		}

		return $length;

	}

endif;

if ( ! function_exists( 'mega_magazine_content_more_link' ) ) :

	/**
	 * Implement read more in content.
	 *
	 * @since 1.0.0
	 *
	 * @param string $more_link Read More link element.
	 * @param string $more_link_text Read More text.
	 * @return string Link.
	 */
	function mega_magazine_content_more_link( $more_link, $more_link_text ) {

		$read_more_text = mega_magazine_options( 'readmore_text' );

		if ( ! empty( $read_more_text ) ) {

			$more_link = str_replace( $more_link_text, $read_more_text, $more_link );

		}

		return $more_link;

	}

endif;

if ( ! function_exists( 'mega_magazine_implement_read_more' ) ) :

	/**
	 * Implement read more in excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param string $more The string shown within the more link.
	 * @return string The excerpt.
	 */
	function mega_magazine_implement_read_more( $more ) {

		$output = $more;

		$read_more_text = mega_magazine_options( 'readmore_text' );

		$hide_post_btn 	= mega_magazine_options( 'hide_blog_post_btn' );

		if ( ! empty( $read_more_text ) ) {

			if( 1 === absint( $hide_post_btn ) ){

				$output = '&hellip;';

			}else{

				$output = '&hellip;<p><a href="' . esc_url( get_permalink() ) . '" class="read-more">' . esc_html( $read_more_text ) . '</a></p>';

			}

		}

		return $output;

	}
endif;

if ( ! function_exists( 'mega_magazine_hook_read_more_filters' ) ) :

	/**
	 * Hook read more and excerpt length filters.
	 *
	 * @since 1.0.0
	 */
	function mega_magazine_hook_read_more_filters() {

		if ( is_home() || is_category() || is_tag() || is_author() || is_date() || is_search() ) {

			add_filter( 'excerpt_length', 'mega_magazine_implement_excerpt_length', 999 );
			
			add_filter( 'the_content_more_link', 'mega_magazine_content_more_link', 10, 2 );
			
			add_filter( 'excerpt_more', 'mega_magazine_implement_read_more' );

		}

	}
endif;

add_action( 'wp', 'mega_magazine_hook_read_more_filters' );

if ( ! function_exists( 'mega_magazine_gotop' ) ) :

	function mega_magazine_gotop() {

		echo '<a href="#page" class="gotop" id="btn-gotop"><i class="fa fa-angle-up"></i></a>';

	}

endif;

add_action( 'wp_footer', 'mega_magazine_gotop' );

if ( ! function_exists( 'mega_magazine_get_custom_excerpt' ) ) :

	/**
	 * Returns post excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $length      Excerpt length in words.
	 * @param WP_Post $post_object The post object.
	 * @return string Post excerpt.
	 */
	function mega_magazine_get_custom_excerpt( $length = 0, $post_object = null ) {
		global $post;

		if ( is_null( $post_object ) ) {
			$post_object = $post;
		}

		$length = absint( $length );
		if ( 0 === $length ) {
			return;
		}



		$source_content = $post_object->post_content;

		if ( ! empty( $post_object->post_excerpt ) ) {
			$source_content = $post_object->post_excerpt;
		}

		$source_content = strip_shortcodes( $source_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '...' );
		return $trimmed_content;
	}

endif;

/**
 * Wrap category counts with span
 */
add_filter('wp_list_categories', 'mega_magazine_cat_count_wrap');

function mega_magazine_cat_count_wrap($links) {

  $links = str_replace('</a> (', '</a> <span>(', $links);

  $links = str_replace(')', ')</span>', $links);

  return $links;

}


if ( ! function_exists( 'mega_magazine_google_fonts' ) ) {
	/**
	 * Register Google fonts.
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function mega_magazine_google_fonts() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Roboto: on or off', 'mega-magazine' ) ) {
			$fonts[] = 'Roboto:100,100i,300,300i,400,400i,500,500i,700,700i';
		}	
		if ( 'off' !== _x( 'on', 'Open Sans: on or off', 'mega-magazine' ) ) {
			$fonts[] = 'Open Sans:400,400i,600,600i,700,700i';
		}			

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
}

if ( ! function_exists( 'mega_magazine_get_category_color' ) ) {
	/**
	 *  Color of specific category set from customizer.
	 *
	 * @return color hex value.
	 */
	function mega_magazine_get_category_color( $cat_id ) {

		$cat_args 	= array(
						'orderby'    => 'id',
						'hide_empty' => 0,
					);

		$all_cats  	= get_categories( $cat_args );

		foreach ( $all_cats as $cat ) {

			$cat_color = get_theme_mod( 'cat_color_' . $cat_id );

			return $cat_color;
		}
	}

}

add_action( 'wp_head', 'mega_magazine_categories_dynamic_style' );

if( ! function_exists( 'mega_magazine_categories_dynamic_style' ) ){

	/**
	 *  Dynamic Color of specific category.
	 *
	 * @return dynamic color style.
	 */
    function mega_magazine_categories_dynamic_style() {

        $cat_args 	= array(
        				'orderby'    => 'id',
        				'hide_empty' => 0,
        			);

        $all_cats  	= get_categories( $cat_args ); ?>

        <style type="text/css">
	        <?php
	        foreach( $all_cats as $category ){

	            $cat_id = $category->term_id;

	            $cat_color = mega_magazine_get_category_color( $cat_id );
	            
	            if( !empty( $cat_color ) ) {
	            	?>
	            	.mega-cat-<?php echo absint( $cat_id )  ?> .section-title .widget-title,
	            	.mega-cat-<?php echo absint( $cat_id )  ?> .section-title .widget-title a {
	            	    color: <?php echo esc_attr( $cat_color ); ?>;
	            	}

	            	.mega-cat-<?php echo absint( $cat_id )  ?> .section-title {
	            	    border-bottom-color: <?php echo esc_attr( $cat_color ); ?>;
	            	}

	            	.mega-cat-<?php echo absint( $cat_id )  ?> .news-text-wrap h2 a:hover {
	            	    color: <?php echo esc_attr( $cat_color ); ?>;
	            	} 
	            	<?php
	            }
	        } ?>
    	</style>
    	<?php
    }
}

//TGM Plugin activation.
require_once trailingslashit( get_template_directory() ) . '/inc/tgm/class-tgm-plugin-activation.php';
function mega_magazine_register_required_plugins() {
	
	$plugins = array(
		array(
            		'name'      => esc_html__( 'HubSpot All-In-One Marketing - Forms, Popups, Live Chat', 'mega-magazine' ),
			'slug'      => 'leadin',
			'required'  => false,
		),
	);

	tgmpa( $plugins );
}

add_action( 'tgmpa_register', 'mega_magazine_register_required_plugins' );