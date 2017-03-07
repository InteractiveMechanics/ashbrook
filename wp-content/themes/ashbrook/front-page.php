<?php
/**
 * The template for the homepage
 *
 * @package WordPress
 * @subpackage Ashbrook_RAHP
 * @since Ashbrook_RAHP 1.0
 */

get_header(); ?>


<main class="home-main">

	<div class="jumbotron home-jumbotron">

  			<div class="home-slider">
				<div class="home-single-slide" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0) 100%), url('<?php printThemePath(); ?>/img/hero-homepage.jpg');">
					<div class="home-single-slide-heading">
						<h2>Theme of the Month</h2>
						<h1>Women's Voices, Religion, &amp; The United States Government</h1>
					</div>
					<div class="home-single-slide-callout">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse...<a href=""><span class="read-more">More</span></a></p>
					</div>
		
				</div>
				<div class="home-single-slide" style="background-image: url('http://s3.amazonaws.com/vosegalleries/photos/images/000/026/471/full/Demers-35549-web.jpg?1413049077');">
					<div class="home-single-slide-heading">
						<h2>25 Core Documents</h2>
						<h1>Here is another Heading</h1>
					</div>
					<div class="home-single-slide-callout">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur...<a href=""><span class="read-more">More</span></a></p>
					</div>

				</div>
			</div>

    
	</div>

	
</main>

<?php get_footer(); ?>