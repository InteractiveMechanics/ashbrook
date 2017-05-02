<?php get_header(); ?>

	<main id="library-template">
		<div class="container-fluid">

			<?php custom_breadcrumbs(); ?>

			<div class="black-divider"></div>

			<?php
				$current_category = single_cat_title("", false);
				$category_id = get_cat_ID($current_category);
				$categories=get_categories(
    				array( 'parent' => $category_id )
				); 
				foreach  ($categories as $category) {
				    //Display the sub category information using $category values like $category->cat_name
				    echo '<div class="col-sm-12">';
				    echo '<ul class="library-heading">';
				    echo '<li><h2>'.$category->name.'</h2></li>';
				    echo '<li><h1><a href="'. esc_url(get_category_link($category->cat_ID)) . '">';
				    echo 'View All</a></h1></li>'; 
				    echo '</ul>';
				    echo '<div class="library-slider">';

				    
				    $subcategory_id = get_cat_ID($category->name);
				    $subcategories = get_categories(
				    		array('parent' => $subcategory_id)
				    );
				    foreach ($subcategories as $subcategory) {
				    	 $term = $subcategory;
				    	 $term_id = $term->taxonomy . '_' . $term->term_id;
				    	 $category_image = get_field('category_image', $term_id);
				    	 $category_dates = get_field('category_dates', $term_id);
				    	
				         echo '<div class="col-sm-3 library-single-slide">';
				         echo '<div class="img-wrapper">';

						if ( $term ):
							echo '<img src="' . $category_image .'">';
						endif;

				         //echo '<img src="https://placekitten.com/g/400/500">';
				         echo '</div>';
				         echo '<div class="trapezoid">';
				         echo '<div class="trap-sq">';
				         echo '<h3><a href="'. esc_url(get_category_link($subcategory->cat_ID)) . '">' . $subcategory->name .'</a></h3>';

				         if ($category_dates):
				         echo '<small>' . $category_dates . '</small>'; // the category desciption?
				     	 else:
				     	 	if ($subcategory->count == '1'):
				     	 	echo '<small>' . $subcategory->count . ' Object </small>';
				     	 	else:
				     	 	echo '<small>' . $subcategory->count . ' Objects </small>';
				     	 	endif; 


				     	 endif;

				         echo '</div>';
				         echo '<div class="trap-tri"></div>';
				         echo '</div>'; // .trapezoid
				         echo '</div>'; // .library-single-slide


				    }  
				    echo '</div>'; // .library-slider
				}

			?>



		</div> <!-- /container-fluid -->

	</main>


<?php get_footer(); ?>
