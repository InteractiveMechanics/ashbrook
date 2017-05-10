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

		<?php if ($cover_image): ?>
				<div class="jumbotron slim-jumbotron" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0) 100%), url('<?php echo $cover_image; ?>');">
		
		<?php else:  
		
				$rows = get_field('default_cover_images', 'option');
		            if($rows) $i=0; {
			            shuffle( $rows );

			        foreach($rows as $row) {
				        $i++; if ($i==2) break;
				        $cover_image = $row['default_cover_image'];

				?>
				       
					<div class="jumbotron slim-jumbotron" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0) 100%), url('<?php echo $cover_image; ?>');">

						
					<?php 
										        
			        }
			     
			    }

			endif;


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

		    			

						
	  		  		</div>

	  		  	</div>
	  		</div>


</main>
<?php endwhile; ?>


<?php get_footer(); ?>