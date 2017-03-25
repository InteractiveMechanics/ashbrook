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
	    		<ul class="sharing hidden-sm hidden-xs">
	    			<li><h1><a href="">Print</a></h1></li>
	    			<li><h1><a href="">Share</a></h1></li>
	    			<li><h1><a href="">Download</a></h1></li>
	    		</ul>
	    	</div>
	    </div>

	    <div class="container-fluid rahp-object-body">
	    		<div class="row">
	    			<div class="col-md-6 col-md-offset-3 col-sm-12">
	    				<figure id="analysis-main-image">
	    					<img src="http://cdn.loc.gov/service/pnp/highsm/24900/24991v.jpg" alt="">
	    					<figcaption><i>Religion</i> by Millard Owen Sheets. Mural at the Department of the Interior, Washington, D.C., Photograph in the Carol M. Highsmith Archive, Library of Congress. Prints and Photographs Division. LC-DIG-highsm-24731</figcaption>
	    				</figure>

	    			</div>
	    		</div>

	    		
	    		<div class="row">
	    			<div class="col-sm-12">

	    				<div class="analysis-slider">

		    				<div class="analysis-single-slide">
			    				<h2>Detail 1</h2>
			    				<div class="col-sm-4">
			    					<div class="lightgallery">

		  								<a href="https://placekitten.com/g/500/600" data-sub-html="#caption1">
		      								<img src="https://placekitten.com/g/500/600" />
		      								<div class="lightgallery-caption" id="caption1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </div>
		      								<h5>Click to Enlarge</h5>
		  								</a>
			    					</div>
			    				</div>
			    				<div class="col-sm-8">
			    					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi faucibus, sapien ut sagittis ornare, turpis erat venenatis tellus, semper rhoncus arcu risus vitae tortor. Suspendisse ultricies pellentesque leo, id hendrerit arcu blandit at. Nam maximus non purus sed volutpat. Suspendisse quis scelerisque mi. Mauris at libero non justo ultricies bibendum vel eget sapien. Quisque volutpat rhoncus purus a ultrices. Duis id urna quis leo molestie hendrerit vel ac felis. Aliquam vitae tristique leo. Aliquam scelerisque dui ac rutrum feugiat.</p>


			    					<figure>
			    					<img src="https://s-media-cache-ak0.pinimg.com/736x/f5/25/7e/f5257e580f0960a31ee183235ce24f28.jpg">
			    					<figcaption>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi faucibus, sapien ut sagittis ornare</figcaption>
			    					</figure>
			    					
			    					<p>Nulla aliquet, nunc sed rhoncus tincidunt, urna tellus finibus sem, vel hendrerit nibh nulla ut tortor. Aliquam id dui eget sem scelerisque dictum vitae sit amet sem. Pellentesque sagittis massa eget nunc ultrices varius. Etiam sit amet aliquet justo. Sed mollis imperdiet mattis. Aenean facilisis et massa et fringilla. Praesent vel leo mauris.</p>

			    					
			    					<p>Aliquam in leo nec ex malesuada vulputate. Ut suscipit condimentum nunc, vitae mollis sem mattis auctor. Maecenas bibendum, nulla sed dignissim facilisis, turpis nisi lacinia ligula, sit amet posuere metus massa sit amet tortor. Maecenas imperdiet eu eros nec vestibulum. Sed ornare, orci a lacinia fermentum, arcu tortor ornare leo, non cursus nunc nulla at urna. Pellentesque tellus turpis, tincidunt et dolor vel, sagittis lobortis arcu. Praesent convallis ac orci sed porttitor. Aliquam id consequat magna. Praesent consequat nisi sit amet mollis lobortis. Aliquam erat volutpat.</p>


			    				</div>

			    				

		    				</div>

		    				<div class="analysis-single-slide">
			    				<h2>Detail 2</h2>
			    				<div class="col-sm-4">
			    					<div class="lightgallery">
		  								<a href="https://placekitten.com/g/600/500" data-sub-html="#caption2">
		      								<img src="https://placekitten.com/g/600/500" />
		      								<div class="lightgallery-caption" id="caption2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </div>
		      								<h5>Click to Enlarge</h5>
		  								</a>
			    					</div>
			    				</div>

			    				<div class="col-sm-8">
			    					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi faucibus, sapien ut sagittis ornare, turpis erat venenatis tellus, semper rhoncus arcu risus vitae tortor. Suspendisse ultricies pellentesque leo, id hendrerit arcu blandit at. Nam maximus non purus sed volutpat. Suspendisse quis scelerisque mi. Mauris at libero non justo ultricies bibendum vel eget sapien. Quisque volutpat rhoncus purus a ultrices. Duis id urna quis leo molestie hendrerit vel ac felis. Aliquam vitae tristique leo. Aliquam scelerisque dui ac rutrum feugiat.</p>


			    					<figure>
			    					<img src="https://cmkt-image-prd.global.ssl.fastly.net/0.1.0/ps/1289022/300/200/m1/fpnw/wm0/001-.jpg?1463701698&s=47afaa4f862ba4727287d8556e2f8faf">
			    					<figcaption>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi faucibus, sapien ut sagittis ornare</figcaption>
			    					</figure>
			    					
			    					<p>Nulla aliquet, nunc sed rhoncus tincidunt, urna tellus finibus sem, vel hendrerit nibh nulla ut tortor. Aliquam id dui eget sem scelerisque dictum vitae sit amet sem. Pellentesque sagittis massa eget nunc ultrices varius. Etiam sit amet aliquet justo. Sed mollis imperdiet mattis. Aenean facilisis et massa et fringilla. Praesent vel leo mauris.</p>

			    					
			    					<p>Aliquam in leo nec ex malesuada vulputate. Ut suscipit condimentum nunc, vitae mollis sem mattis auctor. Maecenas bibendum, nulla sed dignissim facilisis, turpis nisi lacinia ligula, sit amet posuere metus massa sit amet tortor. Maecenas imperdiet eu eros nec vestibulum. Sed ornare, orci a lacinia fermentum, arcu tortor ornare leo, non cursus nunc nulla at urna. Pellentesque tellus turpis, tincidunt et dolor vel, sagittis lobortis arcu. Praesent convallis ac orci sed porttitor. Aliquam id consequat magna. Praesent consequat nisi sit amet mollis lobortis. Aliquam erat volutpat.</p>


			    				</div>


			    				
		    				</div>

		    				

		    			</div>
		    			<div class="paging-info"></div>

	    			</div>
	    		</div>

	    </div>

	    <?php get_template_part('content-rahp_relatedcontent', get_post_format()); ?>



	</main>


<? endwhile; ?>

<?php get_footer(); ?>