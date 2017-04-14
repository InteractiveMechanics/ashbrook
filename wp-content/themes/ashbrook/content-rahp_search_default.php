<div class="container-fluid related-content">
	    		<div class="row">
	    			<div class="col-sm-12">

	    				<?php
			    				
								$args = array(
									'post_type' => array('rahp_object', 'rahp_art', 'post', 'totm', 'rahp_collection'),
									'nopaging'  => false,
									'paged'		=> 1,
									'orderby'	=> 'rand',
									'order' 	=> 'ASC',
									'posts_per_page' => 12,
									'category__and' => array()
								);

								// conditionals that append to array the proper search filter
								if (!empty($_GET['keyword'])) {
									$args['s'] = $_GET['keyword'];
									$args['orderby'] = 'title';
								}
								if (!empty($_GET['post_tag']) && $_GET['post_tag'] !== 'All') {
									$tag = get_term_by( 'name', $_GET['post_tag'], 'post_tag' );
									$args['tag_id'] = $tag->term_id;
									$args['orderby'] = 'title';
								}

								if (!empty($_GET['post_category']) && $_GET['post_category'] !== 'All') {
									array_push($args['category__and'], get_cat_id($_GET['post_category']));
									$args['orderby'] = 'title';

								}
								if (!empty($_GET['post_era']) && $_GET['post_era'] !== 'All') {
									array_push($args['category__and'], get_cat_id($_GET['post_era']));
									$args['orderby'] = 'title';
									//print_r($args['category__and']);
								}

								if (!empty($_GET['pg'])) {
									$args['paged'] = $_GET['pg'];
								}

								$the_query = new WP_Query( $args );

	    				
							if (!empty($_GET['keyword']) || !empty($_GET['post_tag']) || !empty($_GET['post_category']) || !empty($_GET['post_era'])) {
								echo '<h2 class="search-results">'. $the_query->found_posts . ' Search Results for ';

								if (!empty($_GET['keyword'])) {
									echo '<span class="search-result-filter">';
									echo $_GET['keyword'];
									echo '</span>';
								}								



								if (!empty($_GET['post_era'])) {
									if (!empty($_GET['keyword'])) {
										echo ' + ';
									} else {
										echo ' ';
									}
									echo '<span class="search-result-filter">';
									if ($_GET['post_era'] == 'All') {
										echo 'All Time Periods';
									} else {
										echo $_GET['post_era'];
									}
									echo '</span>';

								}

								

								if (!empty($_GET['post_category'])) {
									if (!empty($_GET['keyword']) || !empty($_GET['post_era'])) {
										echo ' + ';
									} else {
										echo ' ';
									}
									echo '<span class="search-result-filter">';
									if ($_GET['post_category'] == 'All') {
										echo 'All Content Types';
									} else {
									echo $_GET['post_category'];
									}
									echo '</span>';
								}

								echo ' ';

								if (!empty($_GET['post_tag'])) {
									if (!empty($_GET['keyword']) || !empty($_GET['post_era']) || !empty($_GET['post_category'])) {
										echo ' + ';
									} else {
										echo ' ';
									}
									echo '<span class="search-result-filter">';
									if ($_GET['post_category'] == 'All') {
										echo 'All Themes';
									} else {
									echo $_GET['post_tag'];
									}
									echo '</span>';
								}

								echo '</h2>';


							}
						?>
	    				
	    				<div class="columns-container">
	    					
		    				<div class="columns-wrapper">
							
		    				<ul>	

		    				<?php
								
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

	    			<div class="container-fluid pagination">
						<?php //wp_pagenavi(array( 'query' => $the_query) ); ?>

						<?php if ($args['paged'] > 1): ?>
						<div>
							<button type="button" class="search-pagination prev" value="<?php echo $args['paged'] - 1; ?>">Previous</button>
						</div>
						<?php endif; ?>
						
						<div class="paging-info">
							<h2><?php echo $args['paged']; ?> of <?php echo $the_query->max_num_pages; ?></h2>
						</div>
						
						<?php if ($args['paged'] < $the_query->max_num_pages): ?>
						<div>
							<button type="button" class="search-pagination next" value="<?php echo $args['paged'] + 1; ?>">Next</button>
						</div>
						<?php endif; ?>
					</div>
	    		</div>
	    	</div>


