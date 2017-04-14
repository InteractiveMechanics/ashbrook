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


</main>



<?php get_footer(); ?>