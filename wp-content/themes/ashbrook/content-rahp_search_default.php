<div class="container-fluid related-content">
	    		<div class="row">
	    			<div class="col-sm-12">
	    				<div class="columns-container">
	    					
		    				<div class="columns-wrapper">
							
		    				<ul>	

		    				<?php 

			    			
								$args = array(
									'post_type' => array('rahp_object', 'rahp_art', 'post', 'rahp_collection'),
									'orderby'	=> 'rand',
									'posts_per_page' => 12 
									);

								$the_query = new WP_Query( $args );

								
								if ( $the_query->have_posts()): while ( $the_query->have_posts() ):$the_query->the_post(); 
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
									
								<?php 
									wp_reset_postdata(); 
									endwhile; 
									endif; 

								?>
								
								</ul>
								
    					

		    					</div> <!-- /column-wrapper -->
		    					
		    				
	    				</div> <!-- /columns-container -->

	    			</div> <!-- /col-sm-12 -->
	    		</div>
	    	</div>
