<?php 
/**
 * Template part for displaying About Section
 *
 *@package Creativ Mag
 */
    $latest_content_type           = creativ_mag_get_option( 'latest_content_type' );
    $number_of_latest_items        = creativ_mag_get_option( 'number_of_latest_items' );
    $latest_posts_section_title    = creativ_mag_get_option( 'latest_posts_section_title' );

    if( $latest_content_type == 'page' ) :
        for( $i=1; $i<=$number_of_latest_items; $i++ ) :
            $latest_posts_posts[] = creativ_mag_get_option( 'latest_posts_page_'.$i );
        endfor;  
    elseif( $latest_content_type == 'post' ) :
        for( $i=1; $i<=$number_of_latest_items; $i++ ) :
            $latest_posts_posts[] = creativ_mag_get_option( 'latest_posts_post_'.$i );
        endfor;
    endif;
    ?>

    <?php if(!empty($latest_posts_section_title)):?>
        <div class="section-header">
            <h2 class="section-title"><?php echo esc_html($latest_posts_section_title);?></h2>
        </div><!-- .section-header -->
    <?php endif;?>

    <?php if( $latest_content_type == 'page' ) : ?>
        <div class="section-content clear">
            <?php $args = array (
                'post_type'     => 'page',
                'post_per_page' => count( $latest_posts_posts ),
                'post__in'      => $latest_posts_posts,
                'orderby'       =>'post__in',
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                
                <article class="has-post-thumbnail">
                    <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                        <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
                    </div><!-- .featured-image -->

                    <div class="entry-container">
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                        </header>

                        <div class="entry-meta author-posted-on">
                            <?php creativ_mag_posted_on(); ?>
                        </div><!-- .entry-meta -->  

                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                        </div><!-- .entry-content -->
                    </div><!-- .entry-container -->
                </article>

              <?php endwhile;?>
              <?php wp_reset_postdata(); ?>
            <?php endif;?>
        </div>
    
    <?php else: ?>
        <div class="section-content clear">
            <?php $args = array (
                'post_type'     => 'post',
                'post_per_page' => count( $latest_posts_posts ),
                'post__in'      => $latest_posts_posts,
                'orderby'       =>'post__in',
                'ignore_sticky_posts' => true,
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>     
                
                <article class="has-post-thumbnail">
                    <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                        <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
                    </div><!-- .featured-image -->

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

                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                        </div><!-- .entry-content -->
                    </div><!-- .entry-container -->
                </article>

              <?php endwhile;?>
              <?php wp_reset_postdata(); ?>
            <?php endif;?>
        </div><!-- .section-content -->
    <?php endif;