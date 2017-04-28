<?php
/**
 * Template for displaying a RAHP Art
 *
 * @package WordPress
 * @subpackage Ashbrook_RAHP
 * @since Ashbrook_RAHP 1.0
 */

?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post();
	$cover_image = get_field('cover_image');
	$default_cover_image = get_field('default_cover_image', 'option');
	$artist = get_field('artist');
	$artwork_title = get_field('artwork_title');
	$artwork_year = get_field('artwork_year');
	$introduction = get_field('introduction');
	$image = get_field('image');



?>

	<main class="single-rahp-object">
		<div class="container-fluid">
			<?php custom_breadcrumbs(); ?>

			<ul class="rahp-object-title">
                <li><h2><?php the_title(); ?></h2></li>

				<?php if ($artist) {
				?>
					<li><h3><?php echo $artist; ?></h3></li>
				<?php 
				}
				?>

				<?php if ($artwork_year) {
				?>
				<li><h3><?php echo $artwork_year; ?></h3></li>
				<?php }
				?>
			</ul>

		</div>

		

		<?php if ($cover_image) { 
		?>
		<div class="jumbotron slim-jumbotron" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0) 100%), url('<?php echo $cover_image; ?>');">
		<?php 
		} else {
		?>
		<div class="jumbotron slim-jumbotron" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0) 100%), url('<?php echo $default_cover_image; ?>');">
		<?php }
		?>

			<?php if ($introduction) {
			?>
			<div class="slim-jumbotron-callout">
				<p><?php echo $introduction; ?></p>
			</div>
			<?php }
			?>

	    </div> 

	    <div class="rahp-object-subheading">
	    	<div class="container-fluid">
	    		<ul class="sharing hidden-sm hidden-xs">
	    			<li><h1><a href="">Print</a></h1></li>
	    			<li><h1><?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?></h1></li>
	    			<li><h1><a href="" download>Download</a></h1></li>
	    		</ul>
	    	</div>
	    </div>

	    <div class="container-fluid rahp-object-body">
	    		<div class="row">
	    			<div class="col-md-6 col-md-offset-3 col-sm-12">
	    				<figure id="analysis-main-image" class="lightgallery">
	    					<a href="<?php echo $image['url']; ?>" data-sub-html=".caption">
	    					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">	
	    					<figcaption class="caption"><i><?php echo $artwork_title; ?></i> by <?php echo $artist; ?>. <?php echo $image['caption']; ?></figcaption>
	    					</a>
	    				</figure>

	    			</div>
	    		</div>

	    		
	    		

	    		<div class="row">
	    			<div class="col-sm-12">

	    				<div class="analysis-slider">

	    					<!-- ACF REPEATER STARTS -->
							<?php if ( have_rows('image_details') ): ?>
							<?php while ( have_rows('image_details') ): the_row();
								$image = get_sub_field('image');
								$body = get_sub_field('body');

							?>


		    				<div class="analysis-single-slide">

				    			<h2>Detail <span class="detail-count"></span></h2>
				    			
				    			<div class="col-sm-4">
				    				<div class="lightgallery">


			  							<a href="<?php echo $image['url']; ?>" data-sub-html="#caption<?php echo count( get_field('image_details') ); ?>">
			      							<img src="<?php echo $image['url']; ?>" />
			      							<div class="lightgallery-caption" id="caption<?php echo count( get_field('image_details') ); ?>"><?php echo $image['caption']; ?></div>
			      								
			      							<h5>Click to Enlarge</h5>
			  								
			  							</a>
				    					
				    				</div>
				    			</div>
				    			
				    			<div class="col-sm-8">

				    				<?php echo $body; ?>

				    			</div>

		    				</div> <!-- /analysis-single-slide -->


		    				<?php endwhile; ?>
		    				<?php endif; ?>

		    				

		    			</div>

		    			<div class="paging-info"></div>

	    			</div>
	    		</div>

	    </div>

	    <?php get_template_part('content-rahp_relatedcontent', get_post_format()); ?>



	</main>


<? endwhile; ?>

<?php get_footer(); ?>