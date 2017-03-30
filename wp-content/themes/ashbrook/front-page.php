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

  				<!-- ACF REPEATER STARTS -->
				<?php if ( have_rows('homepage_slider') ): ?>
				<?php while ( have_rows('homepage_slider') ): the_row();
					$image = get_sub_field('image');
					$subtitle = get_sub_field('subtitle');
					$title = get_sub_field('title');
					$introduction = get_sub_field('introduction');
					$short_introduction = get_sub_field('short_introduction');
					$link = get_sub_field('link');

				?>


					<div class="home-single-slide" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0) 100%), url('<?php echo $image["url"]; ?>');">
						
						<div class="home-single-slide-heading">
							<h2><?php echo $subtitle; ?></h2>
							<h1><?php echo $title; ?></h1>
						</div>

						<div class="home-single-slide-callout">
								
									<p class="visible-xxxs"><?php echo $short_introduction; ?><a href="" class="read-more"> More</a></p>

									<p class="hidden-xxxs"><?php echo $introduction; ?><a href="" class="read-more"> More</a></p>
						
						</div>
						
						
					</div> <!-- /home-single-slide -->

				<?php endwhile; ?>
				<?php endif; ?>
				<!-- ACF REPEATER ENDS -->

				
			</div>

    
	</div>

	
</main>

<?php get_footer(); ?>