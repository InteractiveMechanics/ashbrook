<?php get_header(); ?>

	<main class="single-post-page">

	<?php while ( have_posts() ) : the_post(); 
		$introduction = get_field('introduction');
	?>
	
		<div class="container-fluid">
			<ul class="breadcrumb">
				<li><h5>Blog</h5></li>
			</ul>

			<ul class="rahp-object-title">
				<li><h2><?php the_title(); ?></h2></li>
				<li><h3>By <?php the_author(); ?></h3></li>
				<li><h3><?php the_date(); ?></h3></li>
			</ul>

		</div>

		<div class="jumbotron slim-jumbotron" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0) 100%), url('<?php printThemePath(); ?>/img/header-img.jpg');">
			<div class="slim-jumbotron-callout">
				<p><?php echo $introduction; ?></p>
			</div>
	    </div>

	    <div class="rahp-object-subheading">
	    	<div class="container-fluid">
	    		<ul class="sharing">
	    			<li><h1><a href="">Print</a></h1></li>
	    			<li><h1><a href="">Share</a></h1></li>
	    			<li><h1><a href="" download>Download</a></h1></li>
	    		</ul>
	    	</div>
	    </div>

	    <div class="container-fluid rahp-object-body post-entry" id="post-<?php the_ID(); ?>">
	    		<div class="row">
	    			<div class="col-sm-12">

		  				<?php the_content(); ?>

		  				<!-- <figure class="col-sm-4">
		    				<div class="lightgallery">
		    					<a href="https://s-media-cache-ak0.pinimg.com/originals/ab/46/0a/ab460a143c68998d5e90056d786fa65d.jpg" data-sub-html="#caption1">
		    						<img src="https://s-media-cache-ak0.pinimg.com/originals/ab/46/0a/ab460a143c68998d5e90056d786fa65d.jpg">
		    						<div class="lightgallery-caption" id="caption1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </div>
		    					</a>
		    				</div>
		    				<figcaption>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </figcaption>
		    			</figure> -->


					
	  		  		</div>

	  		  		<div class="container-fluid pagination">
						<div>
							<button type="button" class="prev">Previous</button>
						</div>
						
						<div class="paging-info">
							<h2>1 of 12</h2>
						</div>
						
						<div>
							<button type="button" class="next">Next</button>
						</div>

					</div>

				</div>
			</div>

					<?php get_template_part('content-rahp_relatedcontent', get_post_format()); ?>


	<?php endwhile; ?>

	</main>
	


<?php get_footer(); ?>
