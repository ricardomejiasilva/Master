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

$args = array(
	'orderby'             => 'post__in',
	'ignore_sticky_posts' => 1 // ignore sticky posts
);

$post_list  = array();// list of valid post/page ids

$type = 'jetpack-portfolio';

	$args['post_type'] = $type;

	for ( $i = 1; $i <= $number; $i++ ) {
		$post_id = '';

		$post_id =  get_theme_mod( 'catch_mag_portfolio_cpt_' . $i );

		if ( $post_id && '' !== $post_id ) {
			// Polylang Support.
			if ( class_exists( 'Polylang' ) ) {
				$post_id = pll_get_post( $post_id, pll_current_language() );
			}

			$post_list = array_merge( $post_list, array( $post_id ) );

		}
	}

	$args['post__in'] = $post_list; 

$args['posts_per_page'] = $number;
$loop     = new WP_Query( $args );

$slider_select = get_theme_mod( 'catch_mag_portfolio_slider', 1 );

if ( $loop -> have_posts() ) :
	while ( $loop -> have_posts() ) :
		$loop -> the_post();

		get_template_part( 'template-parts/portfolio/content', 'portfolio' );

	endwhile;
	wp_reset_postdata();
endif;
