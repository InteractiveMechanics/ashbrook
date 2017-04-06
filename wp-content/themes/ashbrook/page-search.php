<?php
/**
 * Template Name: Search
 *
 * @package WordPress
 * @subpackage Ashbrook_RAHP
 * @since Ashbrook_RAHP 1.0
 */

get_header(); ?>

<main id="search-page">
		
	<?php get_template_part('searchform', get_post_format()); ?>
	
	<?php get_template_part('content-rahp_search_default', get_post_format()); ?>	

	<div class="container-fluid pagination">
		<div>
			<button type="button" class="prev">Previous</button>
		</div>
		<div class="paging-info">
			<h2>1 of 12</h2>
		</div>
		<div>
			<button type="button" class="next">Next</button>
		</div>

	</div>


</main>



<?php get_footer(); ?>