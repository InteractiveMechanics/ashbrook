<?php get_header(); ?>

<main class="single-rahp-object">
		<div class="container-fluid">
			<?php custom_breadcrumbs(); ?>

			<ul class="rahp-object-title">

				<?php 
					$term = get_queried_object();
				 	$term_id = $term->taxonomy . '_' . $term->term_id;
				   	$category_introduction = get_field('category_introduction', $term_id);
				   	$cover_image = get_field('category_cover_image', $term_id);
				   	$default_cover_image = get_field('default_cover_image', 'option');

				   	$category_dates = get_field('category_dates', $term_id);

				   	echo '<li><h2>'. $term->name .'</h2></li>';
				   	if ($term->description) {
				   		echo '<li><h3>' . $term->description . '</h3></li>';
				   	}

				   	if ($category_dates) {
				   	echo '<li><h3>' . $category_dates . '</h3></li>';
				   	}

				   	
				?>

				
			</ul>

		</div>

			<?php if ($cover_image): ?>
				<div class="jumbotron slim-jumbotron" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0) 100%), url('<?php echo $cover_image; ?>');">
		
		<?php else:  
		
				$rows = get_field('default_cover_images', 'option');
		            if($rows) $i=0; {
			            shuffle( $rows );

			        foreach($rows as $row) {
				        $i++; if ($i==2) break;
				        $cover_image = $row['default_cover_image'];

				?>
				       
					<div class="jumbotron slim-jumbotron" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0) 100%), url('<?php echo $cover_image; ?>');">

						
					<?php 
										        
			        }
			     
			    }

			endif;


		?>
			
			<?php if ($category_introduction):
			?>	
				<div class="slim-jumbotron-callout">
							
					<p><?php echo $category_introduction; ?></p>

				</div>
			
			<?php endif; ?>
			
	    </div>

	    <?php get_template_part('content-rahp_collection', get_post_format()); ?>


	</main>


<?php get_footer(); ?>