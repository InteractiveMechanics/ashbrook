<?php get_header(); ?>

<?php
	$cover_image = get_field('totm_cover_image', 'option');
	$default_cover_image = get_field('default_cover_image', 'option');
	$title = get_field('totm_archive_title', 'option');
	$introduction = get_field('totm_introduction', 'option');

?>
	
	<main class="blog-page">

		<div class="container-fluid">
			<?php custom_breadcrumbs(); ?>
			

			<ul class="rahp-object-title">

				
				
				<li><h2><?php echo $title; ?></h2></li>
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



			<?php

				if ($introduction):
			?>
				<div class="slim-jumbotron-callout">
					<p><?php echo $introduction; ?></p>
				</div>

			<? endif; ?>
	    </div>

	     <div class="container-fluid blog-page-body">
	    	

			<?php get_template_part('loop'); ?>

				<div class="container-fluid pagination">

					<?php wp_pagenavi(); ?>

				</div>

		 </div> <!-- /blog-body-page -->

	</main>

		

<?php get_footer(); ?>
