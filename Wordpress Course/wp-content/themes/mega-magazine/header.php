<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mega_Magazine
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if(function_exists('wp_body_open')){
	wp_body_open();
} ?>
<div id="page" class="site">
	<?php 
	if ( is_active_sidebar( 'advertisement-1' ) ) {

		$header_class = 'advertisement-active';

	}else{

		$header_class = '';

	} ?>
	<header id="masthead" class="site-header <?php echo $header_class; ?>" role="banner">
		<?php 
		// Show top bar.
		$enable_top_bar = mega_magazine_options( 'enable_top_header' );

		if ( 1 == $enable_top_bar ) { ?>

			<div class="top-bar">
	            <div class="container">
	                <div class="top-bar-inner">

	                	<?php

	                	$current_date 	= mega_magazine_options( 'current_date' ); 

	                	if( 1 == $current_date ){ ?>

	                		<span class="top-bar-date"><?php echo date_i18n( 'l, F j, Y' ); ?></span>

	                		<?php

	                	}

	                	$top_menu 	= mega_magazine_options( 'top_menu' ); 

	                	if( 1 == $top_menu && has_nav_menu( 'top-menu' ) ){

		                	wp_nav_menu(
		                	    array(
		                	    'theme_location' => 'top-menu',
		                	    'menu_id'        => 'top-menu',
		                	    'depth'          => 1,                                   
		                	    )
		                	);
	                	}

	                	$social_icons 	= mega_magazine_options( 'social_icons' ); 

	                	if( 1 === absint( $social_icons ) ){

	                		the_widget( 'Mega_Magazine_Social_Widget' );

	                	} ?>

	                </div><!-- .top-bar-inner -->   
	            </div>
			</div>
			<?php 

		} ?>

		<div class="mid-header">
			<div class="container">
				<div class="mid-header-inner">
					<div class="site-branding">
		              	<?php 

		              	$logo_type = mega_magazine_options( 'logo_type' );

		              	if( 'logo-only' == $logo_type ){

		              		if ( function_exists( 'the_custom_logo' ) ) {

		              			the_custom_logo();

		              		} 

		              	} elseif( 'title-desc' == $logo_type  ){ ?>

							<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>

							<?php

							$description = get_bloginfo( 'description', 'display' );

							if ( $description || is_customize_preview() ) : ?>

								<h3 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h3>

								<?php
							endif; 

		              	}elseif( 'logo-title' == $logo_type  ){

			                  	if ( function_exists( 'the_custom_logo' ) ) {

			                  		the_custom_logo();
			                  		
			                  	} ?>

                                                                <h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>

								<?php

		              	}elseif( 'logo-desc' == $logo_type  ){

			                  	if ( function_exists( 'the_custom_logo' ) ) {

			                  		the_custom_logo();
			                  		
			                  	} 
			                  	
								$description = get_bloginfo( 'description', 'display' );

								if ( $description || is_customize_preview() ) : ?>

									<h3 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h3>

								<?php
								endif;
		              		
		              	} ?>
				   </div><!-- .site-branding -->

					<?php 
					if ( is_active_sidebar( 'advertisement-1' ) ) { ?>

						<div class="header-advertisement">

							<?php dynamic_sidebar( 'advertisement-1' ); ?>

						</div><!-- .header-advertisement -->

						<?php 
					} ?>
			    </div>
			</div>
		</div>

		<div class="main-navigation-holder">
		    <div class="container">
				<div id="main-nav" class="clear-fix">
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<?php
						$home_icon = mega_magazine_options( 'home_icon' );

						if ( 1 == absint( $home_icon ) ) {

							if ( is_front_page() ) {

								$home_icon = 'home-icon home-active';

							} else {

								$home_icon = 'home-icon';

							} ?>

							<div class="<?php echo $home_icon; ?>">

								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa fa-home"></i></a>
								
							</div>

							<?php

						} ?>

						<div class="wrap-menu-content">
							<?php
							wp_nav_menu( array(
								'theme_location' => 'primary-menu',
								'menu_id'        => 'primary-menu',
							) );
							?>
						</div><!-- .wrap-menu-content -->
					</nav>
				</div> <!-- #main-nav -->

				<?php 
				
				$show_search 	= mega_magazine_options( 'show_search' );

				if( 1 === absint( $show_search ) ){ ?>

					<div class="top-widgets-wrap">

						<?php 
						
						if( 1 === absint( $show_search ) ){ ?>
							<div class="search-holder">
								<a href="#" class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></a>

								<div class="search-box" style="display: none;">
									<?php get_search_form(); ?>
								</div>
							</div>
							<?php 
						} ?>

					</div><!-- .social-widgets -->
					<?php 
				} ?>

		    </div><!-- .container -->
		</div><!-- .main-navigation-holder -->
	</header><!-- #masthead -->

	<?php 

	$enable_breadcrumb 	= mega_magazine_options( 'enable_breadcrumb' );

	if( 1 === absint( $enable_breadcrumb ) ){ 

		get_template_part( 'template-parts/breadcrumbs' );

	}

	$enable_breaking_news 	= mega_magazine_options( 'enable_breaking_news' );

	if( 1 === absint( $enable_breaking_news ) ){ 

		if ( is_front_page() || is_page_template( 'templates/home.php' ) ) {

			get_template_part( 'template-parts/breaking-news' );
			
		}
	} 

	?>

	<div id="content" class="site-content">
		<div class="container">
			<div class="inner-wrapper">