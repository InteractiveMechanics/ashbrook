<?php get_header(); ?>

<main class="single-rahp-object">
		<div class="container-fluid">
			<ul class="breadcrumb">
				<li><h5>Sources</h5></li>
				<li><h5>Author</h5></li>
			</ul>

			<ul class="rahp-object-title">

				<?php 
					$term = get_queried_object();
				 	$term_id = $term->taxonomy . '_' . $term->term_id;
				   	$category_introduction = get_field('category_introduction', $term_id);

				   	echo '<li><h2>'. $term->name .'</h2></li>';
				   	
				?>

				<!-- <li><h2><?php single_cat_title(); ?></h2></li> -->				

				<li><h3>1st U.S. President</h3></li>
				<li><h3>February 22, 1732 &#8212; December 14, 1799</h3></li>
			</ul>

		</div>

		<div class="jumbotron slim-jumbotron" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0) 100%), url('<?php printThemePath(); ?>/img/header-img.jpg');">
			<div class="slim-jumbotron-callout">
				<p>Upon his election as President, many churches, congregations, and religious societies wrote to George Washington to congratulate him on his new office, and he replied to each of them with personalized messages of thanks for their well-wishes. In his reply to the Hebrew Congregation of Newport, Washington applauded the people of the United States for rejecting the European practice of religious "toleration," embracing instead the "large and liberal policy" that religious liberty is a natural right -- and not a gift of government -- which all citizens are equally free to exercise.</p>
			</div>
	    </div>

	    <?php get_template_part('content-rahp_collection', get_post_format()); ?>


	</main>


<?php get_footer(); ?>