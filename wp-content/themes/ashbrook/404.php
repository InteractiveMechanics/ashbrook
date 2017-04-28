<?php get_header(); ?>

	<main role="main" class="single-rahp-object" id="page-404">
		
		<div class="container-fluid">
			

			<ul class="rahp-object-title">
				<li><h2>Page Not Found</h2></li>
				<li><h3><a href="<?php echo home_url(); ?>"><?php _e( 'Return home', 'html5blank' ); ?></a> or Explore the Objects Below</h3></li>
			</ul>

		</div>


		<div class="jumbotron slim-jumbotron" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0) 100%), url('<?php printThemePath(); ?>/img/header-img.jpg');">
			
			
	    </div>

	    <?php get_template_part('content-rahp_search_default', get_post_format()); ?>	


		
	</main>


<?php get_footer(); ?>
