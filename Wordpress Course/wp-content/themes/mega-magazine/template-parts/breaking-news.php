<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mega_Magazine
 */

$breaking_news_text 	= mega_magazine_options( 'breaking_news_text' );
$breaking_news_cat 	    = mega_magazine_options( 'breaking_news_cat' );
$breaking_news_number  	= mega_magazine_options( 'breaking_news_number' );
?>

<div class="breaking-news-wrap">
	<div class="container">
		<div class="breaking-news-inner">
			<?php
			if( !empty( $breaking_news_text ) ){ ?>

			    <span><?php echo esc_html( $breaking_news_text ); ?></span>
			    
			    <?php

			} 

			$news_args = array(
			                'posts_per_page'        => absint( $breaking_news_number ),
			                'no_found_rows'         => true,
			                'post__not_in'          => get_option( 'sticky_posts' ),
			                'ignore_sticky_posts'   => true,
			            );

			if ( absint( $breaking_news_cat ) > 0 ) {

			    $news_args['cat'] = absint( $breaking_news_cat );
			    
			} 

			$news_posts = new WP_Query( $news_args );

			if ( $news_posts->have_posts() ) : ?>
			      
			    <ul id="breaking-news">
			        <?php
			        while ( $news_posts->have_posts() ) :
			            
			            $news_posts->the_post(); ?>
			            
			            <li>
			                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			            </li>

			            <?php

			        endwhile; 

			        wp_reset_postdata(); ?>
			          
			    </ul>
			    <?php 
			endif;
			?>
		</div>
    </div>
</div>