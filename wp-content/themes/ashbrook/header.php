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
		<link rel="stylesheet" href="<?php printThemePath(); ?>/style.css">
		<link rel="stylesheet" href="<?php printThemePath(); ?>/dist/css/main.css">

		<!-- favicons and icons go here-->

		<!-- google analytics goes here -->

				<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
		<![endif]-->
		<?php wp_head(); ?>
		
</head>

<body> 
		
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
				      <a class="navbar-brand" href="#"><img src="wp-content/themes/ashbrook/img/logo.svg" alt="logo"></a>
				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				      <ul class="nav navbar-nav navbar-right">

				        <li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Library</a>
				          	

				          	<ul class="dropdown-menu multi-column columns-3">

					          	<li class="col-sm-3 multi-column-dropdown-wrapper">

					          		<ul class="multi-column-dropdown">

						            	<li><a href="#">Sources</a></li>
						            	<li><a href="#">Type</a></li>
						            	<li><a href="#">Time Period</a></li>
						            	<li><a href="#">Author</a></li>

					            	</ul>

					          	</li>
				         

				          	

					          	<li class="col-sm-3 multi-column-dropdown-wrapper">

					          		<ul class="multi-column-dropdown">

						            	<li><a href="#">Collections</a></li>
						            	<li><a href="#">25 Core Documents</a></li>
						            	<li><a href="#">Theme of the Month</a></li>
						            	<li><a href="#">View All</a></li>

					            	</ul>

					          	</li>
				          	

				          	
					          	<li class="col-sm-2 multi-column-dropdown-wrapper skew">

					          		<ul class="multi-column-dropdown">

						            	<li><a href="#">Analysis</a></li>
						            	<li><a href="#">Art</a></li>
						            	<li><a href="#">Essays</a></li>
						            
					            	</ul>

					          	</li>

					          	<li class="col-sm-4 multi-column-dropdown-wrapper">
					          		<div class="nav-dropdown-img"></div>
					        	</li>

				          	</ul>

				        </li>
				        <li><a href="#" class="tiny-text-parent">Places <span class="tiny-text">of</span> Faith Map</a></li>
				        <li><a href="#">Search</a></li>
				    
				    </ul>


				    </div><!-- /.navbar-collapse -->

				    <div class="nav navbar-nav navbar-right">
				    	<ul class="subnav visible-md visible-lg">

				    		<li class="subnav-item">
				    			<a href="">Blog</a>
				    		</li>

				    		<li class="subnav-item">
				    			<a href="">About</a>
				    		</li>

				    	</ul>
				    </div>

				  </div><!-- /.container-fluid -->
				</nav>

		</header>