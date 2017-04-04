<?php get_header(); ?>

<main class="single-rahp-object">
		<div class="container-fluid">
			<?php custom_breadcrumbs(); ?>

			<ul class="rahp-object-title">

				<?php 
					$term = get_queried_object();
				 	$term_id = $term->taxonomy . '_' . $term->term_id;
				   	$category_introduction = get_field('category_introduction', $term_id);
				   	$category_dates = get_field('category_dates', $term_id);

				   	echo '<li><h2>'. $term->name .'</h2></li>';
				   	echo '<li><h3>' . $term->description . '</h3></li>';
				   	echo '<li><h3>' . $category_dates . '</h3></li>'

				   	
				?>

				
			</ul>

		</div>

		<div class="jumbotron slim-jumbotron" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0) 100%), url('<?php printThemePath(); ?>/img/header-img.jpg');">
			
			<?php if ($category_introduction):
			?>	
				<div class="slim-jumbotron-callout">
							
					<p><?php echo $category_introduction; ?></p>

				</div>
			
			<?php endif; ?>
			
	    </div>

	    <?php get_template_part('content-rahp_collection', get_post_format()); ?>


	</main>


<?php get_footer(); ?>