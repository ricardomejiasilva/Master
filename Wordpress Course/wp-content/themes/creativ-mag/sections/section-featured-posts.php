<?php 
/**
 * Template part for displaying About Us Section
 *
 *@package Creativ Mag
 */

    $featured_content_type       = creativ_mag_get_option( 'featured_content_type' );
    $number_of_featured_items    = creativ_mag_get_option( 'number_of_featured_items' );

    if( $featured_content_type == 'page' ) :
        for( $i=1; $i<=$number_of_featured_items; $i++ ) :
            $featured_featured_posts_posts[] = creativ_mag_get_option( 'featured_posts_page_'.$i );
        endfor;  
    elseif( $featured_content_type == 'post' ) :
        for( $i=1; $i<=$number_of_featured_items; $i++ ) :
            $featured_featured_posts_posts[] = creativ_mag_get_option( 'featured_posts_post_'.$i );
        endfor;
    endif;
    ?>

    <?php if( $featured_content_type == 'page' ) : ?>
        <div class="section-content clear">
            <?php $args = array (
                'post_type'     => 'page',
                'post_per_page' => count( $featured_featured_posts_posts ),
                'post__in'      => $featured_featured_posts_posts,
                'orderby'       =>'post__in',
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                
                <article>
                    <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                        <div class="entry-container">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                            </header>

                            <div class="entry-meta author-posted-on">
                                <?php creativ_mag_posted_on(); ?>
                            </div><!-- .entry-meta -->  
                        </div><!-- .entry-container -->
                    </div><!-- .featured-image -->
                </article>

              <?php endwhile;?>
              <?php wp_reset_postdata(); ?>
            <?php endif;?>
        </div>

    <?php else: ?>
        <div class="section-content clear">
            <?php $args = array (
                'post_type'             => 'post',
                'post_per_page'         => count( $featured_featured_posts_posts ),
                'post__in'              => $featured_featured_posts_posts,
                'orderby'               =>'post__in',
                'ignore_sticky_posts'   => true,
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                
                <article>
                    <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                        <div class="entry-container">
                            <div class="entry-meta">
                                <?php creativ_mag_entry_meta(); ?>
                            </div><!-- .entry-meta -->
                            
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                            </header>

                            <div class="entry-meta author-posted-on">
                                <?php creativ_mag_posted_on(); ?>
                            </div><!-- .entry-meta -->  
                        </div><!-- .entry-container -->
                    </div><!-- .featured-image -->
                </article>

              <?php endwhile;?>
              <?php wp_reset_postdata(); ?>
            <?php endif;?>
        </div>
    <?php endif;