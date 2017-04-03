<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<div class="col-sm-12 single-post" id="post-<?php the_ID(); ?>">
	    		
	    		<div class="col-sm-2">
	    			<?php if ( has_post_thumbnail() ) : ?>
					<div class="blog-thumbnail">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				    <?php the_post_thumbnail('full'); ?>
    				</a>
					</div>
				
				<?php endif; ?>
				</div>



	    			

	    		<div class="col-sm-10">
	    			<div class="blog-excerpt">
		    				<h2><?php the_title(); ?></h2>
		    				<h5><?php the_date(); ?></h5>
		    				<h5><?php the_field('author', get_the_ID()); ?></h5>
	    					<p><?php echo strip_tags(get_the_excerpt()); ?>
	    					<a href="<?php the_permalink(); ?>" class="read-more"> More </a></p>
	    			</div>
	    		</div>

	    	</div>

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
