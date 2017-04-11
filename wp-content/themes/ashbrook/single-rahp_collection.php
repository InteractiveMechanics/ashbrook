<?php
/**
 * Template for displaying a RAHP Collection
 *
 * @package WordPress
 * @subpackage Ashbrook_RAHP
 * @since Ashbrook_RAHP 1.0
 */

?>


<?php get_header(); ?>

<?php while ( have_posts() ) : the_post();?>


	<main class="single-rahp-object">
		<div class="container-fluid">
			<?php custom_breadcrumbs(); ?>

			<ul class="rahp-object-title">
				<li><h2><?php the_title(); ?></h2></li>
				<li><h3><?php the_field('subtitle'); ?></h3></li>
				<li><h3><?php the_field('date'); ?></h3></li>
			</ul>

		</div>

		<div class="jumbotron slim-jumbotron" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0) 100%), url('<?php printThemePath(); ?>/img/header-img.jpg');">
			<?php 
				$introduction = get_field('introduction');

			if ($introduction):
			?>
			<div class="slim-jumbotron-callout">
				<p><?php echo $introduction; ?></p>
			</div>

			<?php endif; ?>

	    </div>

	    <?php get_template_part('content-rahp_collection', get_post_format()); ?>


	</main>


<? endwhile; ?>

<?php get_footer(); ?>