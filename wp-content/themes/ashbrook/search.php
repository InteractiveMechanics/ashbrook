<?php get_header(); ?>

	<main role="main search-page">
		<!-- section -->
		<section>

			<h1><?php echo sprintf( __( '%s Search Results for ', 'Ashbrook_RAHP' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>

			<?php get_template_part('content-rahp_search_results', 'Ashbrook_RAHP'); ?>

			
		<?php  //get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>


<?php get_footer(); ?>
