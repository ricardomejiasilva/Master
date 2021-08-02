<?php
/**
 * Display Site Header
 *
 * @package Catch_Mag
 */
?>
<header id="masthead" class="site-header" role="banner">
	<div id="header-content">
		<div class="wrapper">
			<div class="site-header-main">
				<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
				
				<?php 
						get_template_part( 'template-parts/navigation/navigation-header-right', 'search' );
				 ?>
				 <?php get_sidebar( 'header-right' ); ?>
			</div><!-- .site-header-main -->
		</div><!-- .wrapper -->
	</div><!-- #header-content -->
</header><!-- .site-header -->
