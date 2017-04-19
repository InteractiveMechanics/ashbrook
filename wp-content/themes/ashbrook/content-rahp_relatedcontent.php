
		    				<?php
							//for use in the loop, list 5 post titles related to first tag on current post
							$tags = wp_get_post_tags($post->ID);
							if ($tags) {
							?>

								<div class="container-fluid related-content">
	    							<div class="row">
	    								<div class="col-sm-12">
	    									<div class="columns-container">
	    										<h2>Related Content</h2>
		    									<div class="columns-wrapper">



							<?php

							
							$first_tag = $tags[0]->term_id;
							$args=array(
								'tag__in' => array($first_tag),
								'post__not_in' => array($post->ID),
								'posts_per_page'=>8,
								'order'=> 'ASC', 
								'orderby' => 'title',
								'post_type' => 'rahp_object',
							);

							$my_query = new WP_Query($args);
							if( $my_query->have_posts() ) {
							while ($my_query->have_posts()) : $my_query->the_post(); ?>
							
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
														<small><?php echo $object_date; ?></small>
														
													</div>
													<!-- <div class="trap-tri"></div> -->
												</div>
			    							</a>
		    						</div> 
								

							<?php
							endwhile;
							} // end if $my_query->have_posts
							wp_reset_query();
							?>

								</div>
								
								<div class="tags-wrapper">
									<h2>Themes</h2>
                                    <ul class="tags">
                                    <?php
                                        $posttags = get_the_tags($post->ID);
                                        if ($posttags) {
                                            foreach($posttags as $tag) {
                                                echo '<li><h5><a href="' . home_url() . '/search/?keyword=&post_category=&post_era=&post_tag=' . $tag->name . '&pg=1">' . $tag->name . '</a></h5></li>'; 
                                            }
                                        }
                                    ?>
                                    </ul>
									<?php //the_tags( '<ul class="tags"><li><h5> ', '<h5></li><li><h5>', '</h5></li></ul>' ); ?>
								</div>

								</div> <!-- columns-container -->
								</div>  <!-- col-sm-12 -->
								</div>
								</div> 



							<?php
							} // end if $tags
							?>



		    			