<!-- search -->

<form class="search form-inline" method="get" action="<?php echo home_url(); ?>" role="search">
	<div class="form-group">
		<input class="search-input" type="search" name="s" placeholder="<?php _e( 'SEARCH...', 'ashbrook' ); ?>">
		<span class="parallelogram"></span>
	</div>
	<div class="form-group">	
		<select class="selectpicker show-tick" multiple title="All Content Types">
			<option>All</option>
			<option>Sources</option>
			<option>Collections</option>
			<option>Analysis</option>
		</select>
	</div>

	<div class="form-group">	
		<select class="selectpicker show-tick" multiple title="All Eras">
			<option>All</option>
			<option>Era 1</option>
			<option>Era 2</option>
			<option>Era 3</option>
			<option>Era 4</option>
			<option>Era 5</option>
		</select>
	</div>

	<div class="form-group">	
		<select class="selectpicker show-tick" multiple title="All Themes">
			<option>All</option>
			<option>Theme A</option>
			<option>Theme B</option>
			<option>Theme C</option>
			<option>Theme D</option>
			<option>Theme E</option>
		</select>
	</div>


	<button class="search-reset"  type="reset" rele="button">Reset Filters</button>
	<button class="search-submit" type="submit" role="button"><?php _e( 'Search', 'html5blank' ); ?></button>
</form>
<!-- /search -->
