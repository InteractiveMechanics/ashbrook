<div class="container-fluid related-content">
	    		<div class="row">
	    			<div class="col-sm-12">
	    				<div class="columns-container">
	    					
		    				<div class="columns-wrapper">
							
		    				<?php 

		    				if (is_category()) {

		    				$term = get_queried_object();
				 			$term_id = $term->taxonomy . '_' . $term->term_id;
							$cat = $term_id; 

							$posts = get_posts(array(
								'posts_per_page'	=> -1,
								'post_type'			=> array('rahp_object', 'rahp_analysis', 'post'),
								'cat'				=> $cat
							));

							if( $posts ): ?>
								
								<ul>
									
								<?php foreach( $posts as $post ): 
									
									setup_postdata( $post );
									
									?>

									<?php // put relcon-single in a partial ?>
									<div class="relcon-single">
			    							<a href="<?php the_permalink(); ?>">
			    								
			    								<img src="<?php the_post_thumbnail_url( 'full' );  ?>">
			    								
			    								<div class="trapezoid">
													<div class="trap-sq">
														<?php
															$object_date = get_field('object_date', get_the_id());
															$author = get_field('author', get_the_id());
														?>

					
														<h3><?php the_title(); ?></h3>
														<small><?php echo $author; ?></small>
														<small>
														<?php if ($object_date) {
															echo $object_date;
														} else {
															the_date();
														}

														?>
														</small>
														
													</div>
													<!-- <div class="trap-tri"></div> -->
												</div>
			    							</a>
		    							</div> 
									
								
								<?php endforeach; ?>
								
								</ul>
								
								<?php wp_reset_postdata(); ?>

							<?php endif; 

							} ?>


							<?php if (is_single()) {

								$posts = get_field('collection_objects');

								if( $posts ):

								foreach( $posts as $post): // variable must be called $post (IMPORTANT)

								setup_postdata($post);

							?>

							<div class="relcon-single">
			    							<a href="<?php the_permalink(); ?>">
			    								<img src="<?php the_post_thumbnail_url( 'full' );  ?>">
			    								<div class="trapezoid">
													<div class="trap-sq">
														<?php
															$object_date = get_field('object_date', get_the_id());
															$author = get_field('author', get_the_id());
															$artist = get_field('artist', get_the_id());
														?>

					
														<h3><?php the_title(); ?></h3>
														<small>
															<?php if ($author) {
																echo $author;
															} else {
																echo $artist;
															}
															?>
														</small>
														<small>
															<?php if ($object_date) {
																echo $object_date; // object or analysis
															} else {
																the_date();  // blog post
															}
															?>
														</small>
														
													</div>
													<!-- <div class="trap-tri"></div> -->
												</div>
			    							</a>
		    							</div> 


							<?php 

								endforeach;

								wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly

								endif;

								} // end is_single && is_post_type('rahp_collection')

							?>


							</div>



						
		    				



		    					

		    					</div> <!-- /column-wrapper -->
		    					
		    				
	    				</div> <!-- /columns-container -->

	    			</div> <!-- /col-sm-12 -->
	    		</div>
	    	</div>
