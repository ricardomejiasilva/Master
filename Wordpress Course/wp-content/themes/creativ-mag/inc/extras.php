<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Creativ Mag
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function creativ_mag_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( is_front_page() && is_home() ) {
		$sidebar_layout_blog = creativ_mag_get_option('layout_options_blog'); 
		$classes[] = esc_attr( $sidebar_layout_blog );
	}

	if ( !is_front_page() && is_home() ) {
		$sidebar_layout_blog = creativ_mag_get_option('layout_options_blog'); 
		$classes[] = esc_attr( $sidebar_layout_blog );
	}

	if( is_archive() || is_search() || is_404() ) {
		$sidebar_layout_archive = creativ_mag_get_option('layout_options_archive'); 
		$classes[] = esc_attr( $sidebar_layout_archive );
	}

	if( is_page() ) {
		$sidebar_layout_page = creativ_mag_get_option('layout_options_page'); 
		$classes[] = esc_attr( $sidebar_layout_page );
	}

	if( is_single() ) {
		$sidebar_layout_single = creativ_mag_get_option('layout_options_single'); 
		$classes[] = esc_attr( $sidebar_layout_single );
	}

	$disable_featured_slider = creativ_mag_get_option('disable_featured_slider');
	if( true == $disable_featured_slider && is_front_page() ) {
		$classes[] = 'featured-slider-disabled';
	}

	// Add class for lite/dark version
	$lite_dark = creativ_mag_get_option('lite_dark'); 
	$classes[] 	  = esc_attr( $lite_dark );

	return $classes;
}
add_filter( 'body_class', 'creativ_mag_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function creativ_mag_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'creativ_mag_pingback_header' );

/**
 * Function to get Sections 
 */
function creativ_mag_get_sections() {
    $sections = array( 'featured-posts', 'popular-posts', 'recent-posts', 'latest-posts' );
    $enabled_section = array();
    foreach ( $sections as $section ){
    	
        if (false == creativ_mag_get_option('disable_'.$section.'_section')){
            $enabled_section[] = array(
                'id' => $section,
                'menu_text' => esc_html( creativ_mag_get_option('' . $section . '_menu_title','') ),
            );
        }
    }
    return $enabled_section;
}

if ( ! function_exists( 'creativ_mag_the_excerpt' ) ) :

	/**
	 * Generate excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $length Excerpt length in words.
	 * @param WP_Post $post_obj WP_Post instance (Optional).
	 * @return string Excerpt.
	 */
	function creativ_mag_the_excerpt( $length = 0, $post_obj = null ) {

		global $post;

		if ( is_null( $post_obj ) ) {
			$post_obj = $post;
		}

		$length = absint( $length );

		if ( 0 === $length ) {
			return;
		}

		$source_content = $post_obj->post_content;

		if ( ! empty( $post_obj->post_excerpt ) ) {
			$source_content = $post_obj->post_excerpt;
		}

		$source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );
		return $trimmed_content;

	}

endif;

//  Customizer Control
if (class_exists('WP_Customize_Control') && ! class_exists( 'creativ_mag_Image_Radio_Control' ) ) {
	/**
 	* Customize sidebar layout control.
 	*/
	class creativ_mag_Image_Radio_Control extends WP_Customize_Control {

		public function render_content() {

			if (empty($this->choices))
				return;

			$name = '_customize-radio-' . $this->id;
			?>
			<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
			<ul class="controls" id='creativ-mag-img-container'>
				<?php
				foreach ($this->choices as $value => $label) :
					$class = ($this->value() == $value) ? 'creativ-mag-radio-img-selected creativ-mag-radio-img-img' : 'creativ-mag-radio-img-img';
					?>
					<li style="display: inline;">
						<label>
							<input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr($name); ?>" <?php
								$this->link();
								checked($this->value(), $value);
								?> />
							<img src='<?php echo esc_url($label); ?>' class='<?php echo esc_attr($class); ?>' />
						</label>
					</li>
					<?php
				endforeach;
				?>
			</ul>
			<?php
		}

	}
}	


if ( ! function_exists( 'creativ_mag_lite_dark_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function creativ_mag_lite_dark_options() {

        $choices = array(
            'dark-version'   => esc_html__( 'Dark Version', 'creativ-mag' ),
            'lite-version'   => esc_html__( 'Lite Version', 'creativ-mag' ),
        );
        $output = apply_filters( 'creativ_mag_lite_dark_options', $choices );
        return $output;

    }
endif;