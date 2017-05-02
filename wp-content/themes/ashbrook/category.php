<?php get_header(); ?>


	<main role="main" class="blog-page">
		<div class="container-fluid">
			<?php custom_breadcrumbs(); ?>

			<ul class="rahp-object-title">
				<li><h2><?php single_cat_title(); ?></h2></li>
			</ul>

		</div>

		

			
				<?php 
					$term = get_queried_object();
				 	$term_id = $term->taxonomy . '_' . $term->term_id;
				   	$category_introduction = get_field('category_introduction', $term_id);
				   	$cover_image = get_field('category_cover_image', $term_id);
				   	$default_cover_image = get_field('default_cover_image', 'option');



				   	if ( $term ):
				   		if ($cover_image) { 
						?>
						<div class="jumbotron slim-jumbotron" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0) 100%), url('<?php echo $cover_image; ?>');">
						<?php 
						} else {
						?>
						<div class="jumbotron slim-jumbotron" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0) 100%), url('<?php echo $default_cover_image; ?>');">
						<?php }
						

				   			if ($category_introduction):
					   			echo '<div class="slim-jumbotron-callout">';
								echo '<p>' . $category_introduction .'</p>';
								echo '</div>';
							endif; 
						endif;
				?>
				
	    </div>
	    
	    <?php 
	    	$term = get_queried_object();

			$children = get_terms( $term->taxonomy, array(

			'parent'    => $term->term_id,
			'hide_empty' => false

			) );

			// if($children) {

	    ?>



	    <div class="container-fluid blog-page-body">
	    	
	    	<?php
				$current_category = single_cat_title("", false);
				$category_id = get_cat_ID($current_category);
				$categories=get_categories(
    				array( 'parent' => $category_id )
				); 
				foreach  ($categories as $category) {
				    //Display the sub category information using $category values like $category->cat_name

				    
				    echo '<div class="col-sm-12 single-post">';
				    echo '<div class="col-sm-2">';
				    echo '<div class="blog-thumbnail">';

				    if ($category->cat_ID !== 6) {
				    $term = $category;
				 	$term_id = $term->taxonomy . '_' . $term->term_id;
				   	$category_image = get_field('category_image', $term_id);
				   	$category_introduction = get_field('category_introduction', $term_id);
				   	$default_cat_image = get_field('default_category_image', 'option');


				   	if ( $term ):
							echo '<a href="'. esc_url(get_category_link($category->cat_ID)) . '">';
							if ($category_image):
							echo '<img src="' . $category_image .'">';
							else: 
							echo '<img src="' . $default_cat_image . '">';
							endif;
							echo '</a>';
					endif;

					echo '</div>';
					echo '</div>';
					echo '<div class="col-sm-10">';
					echo '<div class="blog-excerpt">';
					echo '<h2>' . $category->name . '</h2>';
					
					if ($category->description):
					echo '<h5>' . $category->description . '</h2>';
					endif;


					if ($category->count == '1'):
					echo '<h5>' . $category->count . ' object</h2>';
					else:
					echo '<h5>' . $category->count . ' objects</h2>';
					endif;

					echo '<p>' . $category_introduction . '</p>';

				} else {
					$default_cat_image = get_field('default_category_image', 'option');
					$totm_archive_featured_image = get_field('totm_archive_featured_image', 'option');
					$count_posts = wp_count_posts('totm');
					$published_posts = $count_posts->publish;


					 if ( $term ):
							echo '<a href="'. esc_url(get_post_type_archive_link( 'totm')) . '">';
							if ($totm_archive_featured_image):
							echo '<img src="' . get_field('totm_archive_featured_image', 'option') . '">';
							else:
							echo '<img src="' . $default_cat_image . '">';
							endif;
							echo '</a>';
					endif;

					echo '</div>';
					echo '</div>';
					echo '<div class="col-sm-10">';
					echo '<div class="blog-excerpt">';
					echo '<h2>'  . get_field('totm_archive_title', 'option')  . '</h2>';

					if ($published_posts == '1'):
					echo '<h5>' . $published_posts . ' Theme of the Month</h2>';
					else:
					echo '<h5>' . $published_posts . ' Themes of the Month</h2>';
					endif;

					echo '<p>' . get_field('totm_short_description', 'option') . '</p>';

				}


					echo '</div>'; // .blog-excerpt
					echo '</div>'; // .col-sm-10
					echo '</div>'; // .single-post
				}

			echo '</div>' // .container-fluid blog-page-body

			?>

			<?php 
			// 	} else {
			// 		get_template_part('content-rahp_collection', get_post_format());
			// }
			?>

	    	

	    

	    	<div class="container-fluid pagination">

	    				<?php get_template_part('pagination', get_post_format()); ?>




			</div>





	  
	</main>


<?php get_footer(); ?>