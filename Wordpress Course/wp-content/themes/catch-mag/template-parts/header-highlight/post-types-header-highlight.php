<?php
/**
 * The template for displaying header highlight items
 *
 * @package Catch_Mag
 */
?>

<?php
$number = get_theme_mod( 'catch_mag_header_highlight_number', 4 );

if ( ! $number ) {
	// If number is 0, then this section is disabled
	return;
}

$args = array(
	'orderby'             => 'post__in',
	'ignore_sticky_posts' => 1 // ignore sticky posts
);

$post_list  = array();// list of valid post/page ids

	$args['post_type'] = 'page';

	for ( $i = 1; $i <= $number; $i++ ) {
		$post_id = '';

			$post_id = get_theme_mod( 'catch_mag_header_highlight_page_' . $i );

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
$loop = new WP_Query( $args );

if ( $loop -> have_posts() ) :
	while ( $loop -> have_posts() ) :
		$loop -> the_post();

		$post_class = 'four';
		$thumbnail  = 'catch-mag-highlight-third';
		$thumb = trailingslashit( esc_url( get_template_directory_uri() ) ) . 'assets/images/no-thumb-640x426.jpg';

		if ( 1 === ( ( $loop->current_post + 1 ) % 4 ) ) {
			$post_class = 'one';
			$thumbnail = 'catch-mag-highlight-first';
			$thumb = trailingslashit( esc_url( get_template_directory_uri() ) ) . 'assets/images/no-thumb-640x853.jpg';
		} elseif ( 2 === ( ( $loop->current_post + 1 ) % 4 ) ) {
			$post_class = 'two';
			$thumbnail = 'catch-mag-highlight-second';
			$thumb = trailingslashit( esc_url( get_template_directory_uri() ) ) . 'assets/images/no-thumb-640x480.jpg';
		} elseif ( 3 === ( ( $loop->current_post + 1 ) % 4 ) ) {
			$post_class = 'three';
		}

		?>
		<article id="header-highlight-post-<?php the_ID(); ?>" <?php post_class( esc_attr( $post_class ) ); ?>>
			<div class="hentry-inner">
				<?php
					if ( has_post_thumbnail() ) {
						$thumb = get_the_post_thumbnail_url( null, $thumbnail );
					}
				?>

				<div class="header-highlight-section-thumbnail post-thumbnail" style="background-image: url( <?php echo esc_url( $thumb ); ?> );">
					<a href="<?php the_permalink(); ?>" class="cover-link">
					</a>
				</div><!-- .post-thumbnail -->

				<div class="entry-container">
					<header class="entry-header">
						<h2 class="entry-title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h2>
					</header>
				</div><!-- .entry-container -->
			</div><!-- .hentry-inner -->
		</article>
		<?php 
	endwhile;
	wp_reset_postdata();
endif;
