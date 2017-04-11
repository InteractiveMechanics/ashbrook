<?php get_header(); ?>


	<main role="main" class="blog-page">
		<div class="container-fluid">
			<?php custom_breadcrumbs(); ?>

			<ul class="rahp-object-title">
				<li><h2><?php single_cat_title(); ?></h2></li>
			</ul>

		</div>

		<div class="jumbotron slim-jumbotron" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0) 100%), url('<?php printThemePath(); ?>/img/header-img.jpg');">

			
				<?php 
					$term = get_queried_object();
				 	$term_id = $term->taxonomy . '_' . $term->term_id;
				   	$category_introduction = get_field('category_introduction', $term_id);

				   	if ( $term ):
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


				   	if ( $term ):
							echo '<a href="'. esc_url(get_category_link($category->cat_ID)) . '">';
							echo '<img src="' . $category_image .'">';
							echo '</a>';
					endif;

					echo '</div>';
					echo '</div>';
					echo '<div class="col-sm-10">';
					echo '<div class="blog-excerpt">';
					echo '<h2>' . $category->name . '</h2>';
					echo '<h5>' . $category->description . '</h2>';
					echo '<h5>' . $category->count . ' objects</h2>';
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

	    	<!-- <div class="col-sm-12 single-post">
	    		
	    		<div class="col-sm-2">
	    			<div class="blog-thumbnail">
	    				<a href=""><img class="" src="https://placekitten.com/g/300/350"></a>
	    			</div>
	    		</div>

	    		<div class="col-sm-10">
	    			<div class="blog-excerpt">
	    				
		    				<h2>The State of American Theology in 2016: Proof that Church Attendance Matters"</h2>
		    				<h5>January 12,2017</h5>
		    				<h5>Jane Doe</h5>
	    					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud...<a href="" class="read-more"><span>More</span></a></p>
	    			</div>
	    		</div>

	    	</div>

	    	-->

	    

	    	<div class="container-fluid pagination">

	    				<?php get_template_part('pagination', get_post_format()); ?>



						<!-- <div>
							<button type="button" class="prev">Previous</button>
						</div>
						
						<div class="paging-info">
							<h2>1 of 12</h2>
						</div>
						
						<div>
							<button type="button" class="next">Next</button>
						</div> -->

			</div>





	  
	</main>


<?php get_footer(); ?>