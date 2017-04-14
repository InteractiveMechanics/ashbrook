<!-- search -->

<form id="search-form" class="search form-inline" method="get" action="<?php echo home_url(); ?>/index.php/search/" role="search">
	<div class="form-group">
		<input class="search-input" type="search" name="keyword" placeholder="<?php _e( 'SEARCH...', 'Ashbrook_RAHP' ); ?>">
		<span class="parallelogram"></span>
	</div>
	
	<?php
		$html = '<div class="form-group"><select class="selectpicker show-tick" name="post_category" title="All Content Types"><option>All</option>';
		$categories = get_categories( array(
    		'orderby' => 'name',
    		'parent'  => 0
		) );
 
		foreach ( $categories as $category ) {
   		
   		$html .= "<option title='{$category->name}' value='{$category->name}'class='{$category->term_id}'>$category->name</option>";
		
		}

		$html .= '</select></div>';
		echo $html;
	?>

	<?php
		$html = '<div class="form-group"><select class="selectpicker show-tick" name="post_era" title="All Time Periods"><option>All</option>';
		$terms = get_terms( array(
    		'orderby' => 'name',
    		'taxonomy' => 'category',
    		'child_of' => '11'
		) );
 
		foreach ( $terms as $term ) {
   		
   		$html .= "<option title='{$term->name}' value='{$term->name}'class='{$term->term_id}'>$term->name</option>";
		
		}

		$html .= '</select></div>';
		echo $html;
	?>




	<?php 
	$tags = get_tags();
	$html = '<div class="form-group"><select class="selectpicker show-tick" name="post_tag" title="All Themes"><option>All</option>';
	foreach ( $tags as $tag ) {
					
		$html .= "<option title='{$tag->name}' value='{$tag->name}' class='{$tag->slug}'>$tag->name</option>";
	
	}
	$html .= '</select></div>';
	echo $html;

	?>

	<input type="hidden" id="form-pagination" name="pg" value="1" />

	<button class="search-reset"  type="reset" role="button">Reset Filters</button>
	<button class="search-submit" type="submit" role="button">Search</button>
</form>


<!-- /search -->
