<?php
/**
 * Template for displaying a Theme of the Month
 *
 * @package WordPress
 * @subpackage Ashbrook_RAHP
 * @since Ashbrook_RAHP 1.0
 */

?>

<?php get_header(); ?>

<main class="single-rahp-object">
		<div class="container-fluid">
			<!--<?php custom_breadcrumbs(); ?> -->
			<ul class="breadcrumb">
				<li><h5> <a href="<?php echo get_post_type_archive_link( 'totm' ); ?>">All Themes of the Month</a></h5></li>
			</ul>

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



<?php get_footer(); ?>