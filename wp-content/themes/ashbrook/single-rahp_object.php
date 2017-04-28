<?php
/**
 * Template for displaying a RAHP Object
 *
 * @package WordPress
 * @subpackage Ashbrook_RAHP
 * @since Ashbrook_RAHP 1.0
 */

?>

<?php get_header(); ?>

 <?php 
 		$cover_image = get_field('cover_image');
 		$default_cover_image = get_field('default_cover_image', 'option');
		$author = get_field('author');
		$date = get_field('object_date');
		$introduction = get_field('introduction');
		$body = get_field('body');
		$footnotes = get_field('footnotes');
		$citation = get_field('citation');
		$study_questions = get_field('study_questions');
		$study_questions_excerpt = get_field('study_questions_excerpt');
		$compare = get_field('compare');
		


?>




<?php while ( have_posts() ) : the_post();?>

	<main class="single-rahp-object" id="post-<?php the_ID(); ?>">
		<div class="container-fluid">
			<?php custom_breadcrumbs(); ?>

			<ul class="rahp-object-title">
				<li><h2><?php the_title(); ?></h2></li>

				<?php if ($author) {
				?>
					<li><h3><?php echo $author; ?></h3></li>
				<?php 
				}
				?>

				<?php if ($date) {
				?>
				<li><h3><?php echo $date; ?></h3></li>
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
			<?php 
				}
			?>
	    </div>


	   
	    	<div class="container-fluid rahp-object-subheading">
	    		
	    		<?php if( get_field('25_core_document') ): ?>
						
						<div class="core-docs-tag">
							 <?php 
							 	$category_id = get_cat_ID( '25 Core Documents' ); 
							 	$category_link = get_category_link( $category_id );
							 ?>

	    					<h3>One of the <a href="<?php echo esc_url( $category_link ); ?>" title="25 Core Documents">25 Core Documents</a></h3>
	    		
	    					<h3 class="visible-xs">Go to <a href="<?php echo $studyquestions; ?>">Study Questions</a></h3>
	    				</div>

	    		<?php endif; ?>


	    		<ul class="sharing hidden-xs">
	    			<!-- <li><h1><a href="javascript:window.print()">Print</a></h1></li> -->
	    			<li><h1><?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?></h1></li>
	    			<!-- <li><h1><a href="" download>>Download</a></h1></li> -->
	    		</ul>
	    	</div>
	 

	    	<div class="container-fluid rahp-object-body">
	    		<div class="row">
	    			<div class="col-sm-12">
	    				<?php echo $body; ?>

		    			

		    			
	    			</div>
				</div> <!-- /col-sm-12 -->

				<div class="row references-wrapper">

					<!-- THESE CALLOUTS ONLY FOR 25 CORE DOCS -->

					<?php if( get_field('25_core_document') ): ?>

						<div class="object-callouts col-sm-5">
								<h1 class="visible-xs share-mobile"><?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?></h1>
								<div class="callout-studyqs">
									<div class="studyqs-headings-wrapper">
										<h2>Study Questions...</h2>
										<h1><a href="<?php echo $study_questions; ?>">View All</a></h1>
									</div>
									<p><?php echo $study_questions_excerpt; ?></p>
								</div>
								<div class="callout-compare">
									<h2>Compare...</h2>
									<p><?php echo $compare; ?></p>
								</div>
						</div>
					<!-- END CALLOUT SECTION-->
					<?php endif; ?>

					<div class="object-references col-sm-7">
						<?php if ($footnotes) {
						?>
						
						<h2>Notes</h2>
						<?php echo $footnotes; ?>
						
						<?php 
						}
						?>
					</div>

					<div class="object-references col-sm-7">
						<?php if ($citation) {
						?>
						<h2>Citation</h2>
						<p><?php echo $citation; ?></p>
						<?php 
						}
						?>
					</div>

					
					<!-- ACF repeater starts -->
					<?php if( have_rows('links') ): ?>

					
							<div class="object-references col-sm-7">
								<h2>External Links</h2>

									<?php while (have_rows('links')): the_row(); 
										$link_url = get_sub_field('link_url');
								    	$link_text = get_sub_field('link_text');
								   
									?>

									<p><a href="<?php echo $link_url; ?>"><?php echo $link_text; ?></a></p>

									<?php endwhile; ?>


							</div>

						

					<?php endif; ?>
					<!-- ACF repeater ends -->

				</div>

	    	</div>

	    </div>
	    	
	    <?php get_template_part('content-rahp_relatedcontent', get_post_format()); ?>


	    	

	    	




	</main>



<? endwhile; ?>

<?php get_footer(); ?>