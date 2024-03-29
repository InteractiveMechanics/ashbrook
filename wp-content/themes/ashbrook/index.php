<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Ashbrook_RAHP
 * @since Ashbrook_RAHP 2017 1.0
  */
get_header(); ?>

<?php
	$our_title = get_the_title( get_option('page_for_posts', true) );
	$introduction = get_field('introduction', get_option('page_for_posts'));
	$cover_image = get_field('cover_image', get_option('page_for_posts'));
	$default_cover_image = get_field('default_cover_image', 'option');


?>


	<main role="main" class="blog-page">

		<div class="container-fluid">
			
			<ul class="breadcrumb">
				
				<li><h5>Blog</h5></li>
			
			</ul>

			<ul class="rahp-object-title">
				
				<?php 

					$our_title = get_the_title( get_option('page_for_posts', true) );
				
				?>
				
				<li><h2><?php echo $our_title; ?></h2></li>
			
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


	    <div class="container-fluid blog-page-body">
	    	
	    	<?php  get_template_part('loop', get_post_format()); ?>

	    
	   
	    	<div class="container-fluid pagination">

	    		<?php wp_pagenavi(); ?>

			</div>

	    </div> <!-- /blog-body-page -->


	    	<div class="blog-sign-up">
	    	<h2>Sign up for our blog...</h2>
	    	<?php es_subbox( $namefield = "YES", $desc = "", $group = "Public" ); ?>
	    	</div>
	

	</main>


<?php get_footer(); ?>
