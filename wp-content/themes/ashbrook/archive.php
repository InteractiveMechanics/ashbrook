<?php get_header(); ?>

	
	<main class="blog-page">

		<div class="container-fluid">
			<?php custom_breadcrumbs(); ?>
			

			<ul class="rahp-object-title">

				<?php $title = get_field('totm_archive_title', 'option'); ?>
				
				<li><h2><?php echo $title; ?></h2></li>
			</ul>

		</div>

		<div class="jumbotron slim-jumbotron" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0) 100%), url('<?php printThemePath(); ?>/img/header-img.jpg');">
			<?php
				$introduction = get_field('totm_introduction', 'option');

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

					<?php get_template_part('pagination'); ?>

				</div>

		 </div> <!-- /blog-body-page -->

	</main>

		

<?php get_footer(); ?>
