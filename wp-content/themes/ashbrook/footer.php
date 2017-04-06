<footer>
	<div class="container-fluid">
			<div class="col-sm-6">
				<h5><?php the_field('site_title', 'option'); ?></h5>
				<h6>Copyright &copy; <?php the_time('Y'); ?> <a href="<?php the_field('organization_url', 'option') ?>" target="_blank"><?php the_field('organization_text', 'option'); ?></a></h6>

			</div>
			<div class="col-sm-6">
				<div class="float-right">
					<h6><?php the_field('program_title', 'option'); ?></h6>
					<h6><?php the_field('is_part_of', 'option'); ?> <a href="<?php the_field('parent_program_url', 'option')?>" target="_blank"><?php the_field('parent_program_text', 'option'); ?></a></h6>
				</div>

			</div>
	</div>

</footer>

<?php wp_footer(); ?>

<!-- scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>  -->
<script src="<?php printThemePath(); ?>/js/lib/bootstrap.js"></script>
<script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
<script src="<?php printThemePath(); ?>/js/lib/lightGallery/js/lightgallery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="<?php printThemePath(); ?>/js/main.js"></script>

</body>
</html>