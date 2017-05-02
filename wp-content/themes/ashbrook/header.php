<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Ashbrook_RAHP
 * @since Ashbrook_RAHP 1.0
 */
 ?><!DOCTYPE html>

 <!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
		<meta charset="<?php bloginfo('charset'); ?>">		
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php wp_title( '|', true, 'right' ); ?> Ashbrook RAHP</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		
		
		<!-- stylesheets -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="<?php printThemePath(); ?>/js/lib/slick/slick.css">
		<link rel="stylesheet" type="text/css" href="<?php printThemePath(); ?>/js/lib/slick/slick-theme.css">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="<?php printThemePath(); ?>/js/lib/lightGallery/css/lightgallery.min.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css"> 
		<link rel="stylesheet" href="<?php printThemePath(); ?>/style.css">
		<link rel="stylesheet" href="<?php printThemePath(); ?>/dist/css/main.css">

		<!-- favicons and icons go here-->
		<link rel="apple-touch-icon" sizes="57x57" href="<?php printThemePath(); ?>/favicons/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php printThemePath(); ?>/favicons/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php printThemePath(); ?>/favicons/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php printThemePath(); ?>/favicons/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php printThemePath(); ?>/favicons/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php printThemePath(); ?>/favicons/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php printThemePath(); ?>/favicons/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php printThemePath(); ?>/favicons/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php printThemePath(); ?>/favicons/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php printThemePath(); ?>/favicons/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php printThemePath(); ?>/favicons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php printThemePath(); ?>/favicons/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php printThemePath(); ?>/favicons/favicon-16x16.png">
		<link rel="manifest" href="<?php printThemePath(); ?>/favicons/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?php printThemePath(); ?>/favicons/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

		<!-- google analytics goes here -->
		<script> (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','https://www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-97814213-1', 'auto'); ga('send', 'pageview'); </script>

				<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
		<![endif]-->
		<?php wp_head(); ?>
		
</head>

<body ontouchstart=""> 


		<!-- BACKGROUND IMG IN NAV  -->
		<?php 

		$rows = get_field('nav_background_images', 'option');
		            if($rows) $i=0; {
			            shuffle( $rows );

			         foreach($rows as $row) {
				            $i++; if ($i==2) break;
				            $nav_img = $row['nav_img']; 
				            ?>
				       
				           <style>
				           		.nav-dropdown-img {
									background-image: url('<?php echo $nav_img; ?>');
								}
				           </style>

						<?php 
										        
			            }
			     
			     }    
		?>


		
		<header>
			<nav class="navbar navbar-default">
  				<div class="container-fluid">
  					
				    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
					    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					    </button>
					    <div class="mobile-search-bar animated fadeIn">
					    	<form>
					    	<input type="text" name="mobile-search" id="mobile-search" placeholder="search...">
					  		<span class="sm-parallelogram"></span>
					    	<input type="submit" value="search">
					    	</form>
					    </div>
					    <button type="button" class="collapsed visible-xs-inline-block search-btn" data-toggle="collapse" aria-expanded="false">
				    		<svg id="search-btn-svg" class="not-clicked" version="1.1"
							 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
	 						x="0px" y="0px" width="35.7px" height="34.6px" viewBox="0 0 35.7 34.6" style="enable-background:new 0 0 35.7 34.6;"
	 						xml:space="preserve">
								<style type="text/css">
									.st0{fill:;}
								</style>
								<defs>
								</defs>
								<g id="mobile-header_copy">
									<path class="st0" d="M35.7,33.5L22.8,21c1.8-2.2,2.9-5,2.9-8.1C25.7,5.8,20,0,12.9,0C5.8,0,0,5.8,0,12.9c0,7.1,5.8,12.9,12.9,12.9
									c3.3,0,6.4-1.3,8.6-3.3l12.8,12.3L35.7,33.5z M12.9,24.4c-6.4,0-11.5-5.2-11.5-11.5c0-6.4,5.2-11.5,11.5-11.5
									c6.4,0,11.5,5.2,11.5,11.5C24.4,19.2,19.2,24.4,12.9,24.4z"/>
								</g>
							</svg>
				    	</button>
				      	<a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php printTHemePath(); ?>/img/header-logo.svg" alt="Religion in America logo"></a>
				    </div>

				   



				    <?php
			            wp_nav_menu( array(
			                'menu'              => 'primary',
			                'theme_location'    => 'primary',
			                'depth'             => 3,
			                'container'         => 'div',
			                'container_class'   => 'collapse navbar-collapse',
			                'container_id'      => 'bs-example-navbar-collapse-1',
			                'menu_class'        => 'nav navbar-nav navbar-right',
			                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
			                'walker'            => new WP_Bootstrap_Navwalker())
			            );
        			?>




        			<?php
			            wp_nav_menu( array(
			                'menu'              => 'secondary',
			                'theme_location'    => 'secondary',
			                'depth'             =>  2,
			                'container'         => 'div',
			                'container_class'   => 'nav navbar-nav navbar-right',
							'container_id'      => '',
			                'menu_class'        => 'subnav visible-md visible-lg',
			                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			                'walker'            => new wp_bootstrap_navwalker())
			            );
			        ?>



				  </div><!-- /.container-fluid -->
				</nav>

		</header>