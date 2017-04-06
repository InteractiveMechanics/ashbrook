<div class="container-fluid related-content">
	    		<div class="row">
	    			<div class="col-sm-12">
	    				<div class="columns-container">
	    					
		    				<div class="columns-wrapper">
							
		    				<ul>	

		    				<?php 

		    			

							$posts = get_posts(array(
								'posts_per_page'	=> 12,
								'post_type'			=> array('rahp_object', 'rahp_analysis', 'post'),
								'orderby'			=> 'rand'
							));

							if( $posts ): ?>
								
								
									
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
															$artist = get_field('artist', get_the_id());
														?>

					
														<h3><?php the_title(); ?></h3>
														

														<?php if ($author) {
															echo '<small>' . $author . '</small>';
														} elseif ($artist) {
															echo '<small>' . $artist . '</small>';
														} else {
															echo '<small></small>';	
														}
														?>

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

							?>



							</div>



						
		    				



		    					

		    					</div> <!-- /column-wrapper -->
		    					
		    				
	    				</div> <!-- /columns-container -->

	    			</div> <!-- /col-sm-12 -->
	    		</div>
	    	</div>
