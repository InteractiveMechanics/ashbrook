<?php get_header(); ?>

	<main class="single-post-page">

	<?php while ( have_posts() ) : the_post(); 
		$introduction = get_field('introduction');
		$author = get_field('author');
		$cover_image = get_field('cover_image');
		$default_cover_image = get_field('default_cover_image', 'option');

	?>
	
		<div class="container-fluid">
			<ul class="breadcrumb">
				<li><h5>Blog</h5></li>
			</ul>

			<ul class="rahp-object-title">
				<li><h2><?php the_title(); ?></h2></li>
				
				<?php if ($author): ?>
					<li><h3>By <?php echo $author; ?></h3></li>
				<?php endif; ?>
				
				
				<li><h3><?php the_date(); ?></h3></li>
				
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

	    <div class="rahp-object-subheading">
	    	<div class="container-fluid">
	    		<ul class="sharing">
	    			<li><h1><a href="javascript:window.print()">Print</a></h1></li>
	    			<li><h1><?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?></h1></li>
	    			<!-- <li><h1><a href="" download>Download</a></h1></li> -->
	    		</ul>
	    	</div>
	    </div>

	    <div class="container-fluid rahp-object-body post-entry" id="post-<?php the_ID(); ?>">
	    		<div class="row">
	    			<div class="col-sm-12">

		  				<?php the_content(); ?>

		  				

					
	  		  		</div>

	  		  		<div class="container-fluid pagination">

	  		  			<?php previous_post_link('%link', 'Previous'); ?> 



	  		  			
					
						<?php next_post_link( '%link', 'Next'); ?>

					</div>

				</div>
			</div>

					<?php get_template_part('content-rahp_relatedcontent', get_post_format()); ?>


	<?php endwhile; ?>

	<div class="blog-sign-up">
	    	<h2>Sign up for our blog...</h2>
	    	<?php es_subbox( $namefield = "YES", $desc = "", $group = "Public" ); ?>
	</div>
	

	</main>
	


<?php get_footer(); ?>
