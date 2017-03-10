<?php
/**
 * Template for displaying a RAHP Object
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
				<li><h5>Sources</h5></li>
				<li><h5>Author</h5></li>
				<li><h5>George Washington</h5></li>
			</ul>

			<ul class="rahp-object-title">
				<li><h2>Letter to the Hebrew Congregation at Newport</h2></li>
				<li><h3>George Washington</h3></li>
				<li><h3>August 21, 1790</h3></li>
			</ul>

		</div>

		<div class="jumbotron slim-jumbotron" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0) 100%), url('<?php printThemePath(); ?>/img/header-img.jpg');">
			<div class="slim-jumbotron-callout">
				<p>Upon his election as President, many churches, congregations, and religious societies wrote to George Washington to congratulate him on his new office, and he replied to each of them with personalized messages of thanks for their well-wishes. In his reply to the Hebrew Congregation of Newport, Washington applauded the people of the United States for rejecting the European practice of religious "toleration," embracing instead the "large and liberal policy" that religious liberty is a natural right -- and not a gift of government -- which all citizens are equally free to exercise.</p>
			</div>
	    </div>

	    <div class="rahp-object-subheading">
	    	<div class="container-fluid">
	    		<div class="core-docs-tag">
	    		<h3>One of the <a href="">25 Core Documents</a></h3>
	    		</div>
	    		<ul class="sharing">
	    			<li><h1><a href="">Print</a></h1></li>
	    			<li><h1><a href="">Share</a></h1></li>
	    			<li><h1><a href="">Download</a></h1></li>
	    		</ul>
	    	</div>

	    	<div class="container-fluid">
	    		<div class="rahp-object-body col-sm-12">
	    			<p>Gentlemen:</p>

					<p>While I received with much satisfaction your address replete with expressions of esteem, I rejoice in the opportunity of assuring you that I shall always retain grateful remembrance of the cordial welcome I experienced on my visit to Newport from all classes of citizens.</p>

					<p>The reflection on the days of difficulty and danger which are past is rendered the more sweet from a consciousness that they are succeeded by days of uncommon prosperity and security.</p>

					<p>If we have wisdom to make the best use of the advantages with which we are now favored, we cannot fail, under the just administration of a good government, to become a great and happy people.</p>

					<p>The citizens of the United States of America have a right to applaud themselves for having given to mankind examples of an enlarged and liberal policy — a policy worthy of imitation. All possess alike liberty of conscience and immunities of citizenship.</p>

					<p>It is now no more that toleration is spoken of as if it were the indulgence of one class of people that another enjoyed the exercise of their inherent natural rights, for, happily, the Government of the United States, which gives to bigotry no sanction, to persecution no assistance, requires only that they who live under its protection should demean themselves as good citizens in giving it on all occasions their effectual support.</p>

					<p>It would be inconsistent with the frankness of my character not to avow that I am pleased with your favorable opinion of my administration and fervent wishes for my felicity.</p>

					<p>May the children of the stock of Abraham who dwell in this land continue to merit and enjoy the good will of the other inhabitants — while every one shall sit in safety under his own vine and fig tree and there shall be none to make him afraid.</p>

					<p>May the father of all mercies scatter light, and not darkness, upon our paths, and make us all in our several vocations useful here, and in His own due time and way everlastingly happy.</p>

					<p>G. Washington</p>

					<div class="object-callouts col-sm-4">
						<div class="callout-study-questions">
							<h2>Study Questions</h2>
							<h3>View All</h3>
							<p>What is the difference between toleration and religious freedom? Would tolerance be acceptable given the argument of the Declaration of Independence about the rights that men are endowed with?</p>
						</div>
						<div class="callout-compare">
							<h2>Compare</h2>
							<p>How is Washington's view in his letter to the Hebrew Congregation similar to and different fromm the views expressed in these <a href="">excerpts of Colonial Laws</a>?</p>
						</div>
					</div>
	  		  </div>

				
	   
	    	</div>

	    	




	</main>



<? endwhile; ?>

<?php get_footer(); ?>