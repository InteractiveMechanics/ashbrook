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
									'category__and' => array(),
									'tag__and' => array()
								);

								// conditionals that append to array the proper search filter
								if (!empty($_GET['keyword'])) {
									$args['s'] = $_GET['keyword'];
									$args['orderby'] = 'title';
								}
								if (!empty($_GET['post_tag']) && $_GET['post_tag'] !== 'All') {
									$exploded = explode(',', $_GET['post_tag']);
									foreach($exploded as $tag){
										array_push($args['tag__and'], $tag);
									}
									$args['orderby'] = 'title';
								}

								if (!empty($_GET['post_category']) && $_GET['post_category'] !== 'All') {
									$exploded = explode(',', $_GET['post_category']);
									foreach($exploded as $cat){
										array_push($args['category__and'], $cat);
									}
									$args['orderby'] = 'title';

								}
								if (!empty($_GET['post_era']) && $_GET['post_era'] !== 'All') {
									$exploded = explode(',', $_GET['post_era']);
									foreach($exploded as $cat){
										array_push($args['category__and'], $cat);
									}
									$args['orderby'] = 'title';
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
										$exploded = explode(',', $_GET['post_era']);
										//$count_exploded = count($exploded);
										//echo $count_exploded;
										foreach($exploded as $era){
											echo " " . get_cat_name($era) . " ";	
										}
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
										$exploded = explode(',', $_GET['post_category']);
									
										foreach($exploded as $category){
											echo " " . get_cat_name($category) . " ";	
										}

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
									if ($_GET['post_tag'] == 'All') {
										echo 'All Themes';
									} else {
										$exploded = explode(',', $_GET['post_tag']);
									
										foreach($exploded as $tag){
											$tag_id = get_tag($tag);
											echo " " . $tag_id->name . " ";	
										}
									
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

                        <div class="wp-pagenavi">
                            <span class="pages">
    							<?php echo $args['paged']; ?> of <?php echo $the_query->max_num_pages; ?>
    						</span>

    						<?php if ($args['paged'] > 1): ?>
    						<a class="previouspostslink" rel="prev" value="<?php echo $args['paged'] - 1; ?>">Previous</a>
    						<?php endif; ?>
    						    						
    						<?php if ($args['paged'] < $the_query->max_num_pages): ?>
                            <a class="nextpostslink" rel="next" value="<?php echo $args['paged'] + 1; ?>">Next</a>
    						<?php endif; ?>

					</div>
	    		</div>
	    	</div>


