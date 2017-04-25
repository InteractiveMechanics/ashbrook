<?php
/**
 * Template Name: About
 *
 * @package WordPress
 * @subpackage Ashbrook_RAHP
 * @since Ashbrook_RAHP 1.0
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post();
	$introduction = get_field('introduction');
	$cover_image = get_field('cover_image');
	$default_cover_image = get_field('default_cover_image', 'option');

?>



<main>
	<div class="container-fluid">
			<?php // breadcrumb makes no sense here ?>
			<?php custom_breadcrumbs(); ?>

			<ul class="rahp-object-title">
				<li><h2><?php the_title(); ?></h2></li>
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
			
		<?php if ($introduction): ?>
			<div class="slim-jumbotron-callout">
				<p><?php echo $introduction; ?></p>
			</div>
		<?php endif; ?>

	    </div>

	    	<div class="container-fluid rahp-object-body">
	    		<div class="row">
	    			<div class="col-sm-12">

	    				<?php the_content(); ?>

		    			<!-- <figure class="col-sm-4">
		    				<div class="lightgallery">
		    					<a href="<?php printThemePath(); ?>/img/Capitol_Prayer_Room_stained_glass_window.jpg" data-sub-html="#caption1">
		    						<img src="<?php printThemePath(); ?>/img/Capitol_Prayer_Room_stained_glass_window.jpg" class="lightgallery">
		    						<div class="lightgallery-caption" id="caption1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </div>
		    					</a>
		    				</div>
		    				<figcaption>Capitol Prayer Room stained-glass window. <i>Suspendisse Vitae Risus Ipsum.</i> Etiam a tincidunt magna.</figcaption>
		    			</figure> -->

						
	  		  		</div>

	  		  	</div>
	  		</div>


</main>
<?php endwhile; ?>


<?php get_footer(); ?>