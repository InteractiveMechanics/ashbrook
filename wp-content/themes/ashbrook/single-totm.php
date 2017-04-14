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

<?php 
	$cover_image = get_field('cover_image');
	$default_cover_image = get_field('default_cover_image', 'option');
	$subtitle = get_field('subtitle');
	$date = get_field('date');
	$introduction = get_field('introduction');


?>

<main class="single-rahp-object">
		<div class="container-fluid">
			<!--<?php custom_breadcrumbs(); ?> -->
			<ul class="breadcrumb">
				<li><h5> <a href="<?php echo get_post_type_archive_link( 'totm' ); ?>">All Themes of the Month</a></h5></li>
			</ul>

			<ul class="rahp-object-title">
				<li><h2><?php the_title(); ?></h2></li>

				<?php if ($subtitle): ?>
					<li><h3><?php echo $subtitle; ?></h3></li>
				<?php endif; ?>

				<?php if ($date): ?>
					<li><h3><?php echo $date; ?></h3></li>
				<?php endif; ?>
			</ul>

		</div>

		<?php if ($cover_image) { 
		?>
		<div class="jumbotron slim-jumbotron" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0) 100%), url('<?php echo $cover_image; ?>');">
		<?php 
		} else {
		?>
		<div class="jumbotron slim-jumbotron" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0) 100%), url('<?php echo $default_cover_image; ?>');">
		<?php }
		?>

			
			<?php if ($introduction): ?>
			<div class="slim-jumbotron-callout">
				<p><?php echo $introduction; ?></p>
			</div>

			<?php endif; ?>

	    </div>

	    <?php get_template_part('content-rahp_collection', get_post_format()); ?>


	</main>



<?php get_footer(); ?>