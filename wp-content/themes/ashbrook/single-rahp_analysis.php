<?php
/**
 * Template for displaying a RAHP Analysis
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
			<ul class="breadcrumb">
				<li><h5>Analysis</h5></li>
				<li><h5>Art</h5></li>
			</ul>

			<ul class="rahp-object-title">
				<li><h2><span class="analysis-title">The Black Church</span>: <span class="analysis-artist">Millar Owen Sheets</span>, <span class="analysis-title">Religion</span><span class="analysis-year">(1943)</span></h2></li>
				<li><h3>February 15, 2017</h3></li>
			</ul>

		</div>

		<div class="jumbotron slim-jumbotron" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0) 100%), url('<?php printThemePath(); ?>/img/header-img.jpg');">
			<div class="slim-jumbotron-callout">
				<p>Upon his election as President, many churches, congregations, and religious societies wrote to George Washington to congratulate him on his new office, and he replied to each of them with personalized messages of thanks for their well-wishes. In his reply to the Hebrew Congregation of Newport, Washington applauded the people of the United States for rejecting the European practice of religious "toleration," embracing instead the "large and liberal policy" that religious liberty is a natural right -- and not a gift of government -- which all citizens are equally free to exercise.</p>
			</div>
	    </div>

	    <div class="rahp-object-subheading">
	    	<div class="container-fluid">
	    		<ul class="sharing">
	    			<li><h1><a href="">Print</a></h1></li>
	    			<li><h1><a href="">Share</a></h1></li>
	    			<li><h1><a href="">Download</a></h1></li>
	    		</ul>
	    	</div>
	    </div>



	</main>


<? endwhile; ?>

<?php get_footer(); ?>