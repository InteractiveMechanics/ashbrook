<?php get_header(); ?>


	<main role="main" class="blog-page">
		<div class="container-fluid">
			<?php custom_breadcrumbs(); ?>

			<ul class="rahp-object-title">
				<li><h2><?php single_cat_title(); ?></h2></li>
			</ul>

		</div>

		<!-- <div class="jumbotron slim-jumbotron" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0) 100%), url('<?php printThemePath(); ?>/img/header-img.jpg');"> -->

			
				<?php 
					$term = get_queried_object();
				 	$term_id = $term->taxonomy . '_' . $term->term_id;
				   	$category_introduction = get_field('category_introduction', $term_id);
				   	$cover_image = get_field('category_cover_image', $term_id);
				   	$default_cover_image = get_field('default_cover_image', 'option');

				   	if ( $term ):
				   	?>	
				   		<?php if ($cover_image) { 
						?>
						<div class="jumbotron slim-jumbotron" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0) 100%), url('<?php echo $cover_image; ?>');">
						<?php 
						} else {
						?>
						<div class="jumbotron slim-jumbotron" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0) 100%), url('<?php echo $default_cover_image; ?>');">
						<?php }
						?>

				   	<?php

				   			

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

				    $term = $category;
				 	$term_id = $term->taxonomy . '_' . $term->term_id;
				   	$category_image = get_field('category_image', $term_id);
				   	$category_introduction = get_field('category_introduction', $term_id);
				   	$default_category_image = get_field('default_category_image', 'option');


				   	if ( $term ):
							echo '<a href="'. esc_url(get_category_link($category->cat_ID)) . '">';

							if ($category_image) {
								echo '<img src="' . $category_image .'">';
							} else {
								echo '<img src="' . $default_category_image .'">';
							} 
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

					echo '<h5> objects in the collection: ' . $category->count .'</h2>';
					echo '<p>' . $category_introduction . '</p>';
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