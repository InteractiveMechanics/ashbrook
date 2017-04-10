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

		<div class="jumbotron slim-jumbotron" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0) 100%), url('<?php printThemePath(); ?>/img/header-img.jpg');">
			<?php
				$introduction = get_field('introduction', get_option('page_for_posts'));

				if ($introduction):
			?>
				<div class="slim-jumbotron-callout">
					<p><?php echo $introduction; ?></p>
				</div>

			<? endif; ?>
	    </div>

	    <div class="container-fluid blog-page-body">
	    	
	    <?php  get_template_part('loop', get_post_format()); ?>

	    	

	    	<div class="container-fluid pagination">
	    				<?php wp_pagenavi(); ?>
						<!-- <div>
							<button type="button" class="prev">Previous</button>
						</div>
						
						<div class="paging-info">
							<h2>1 of 12</h2>
						</div>
						
						<div>
							<button type="button" class="next">Next</button>
						</div> -->

					</div>





	    </div> <!-- /blog-body-page -->
	</main>


<?php get_footer(); ?>
