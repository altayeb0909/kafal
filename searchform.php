<form action="<?php echo esc_url( home_url() );?>" method="get">
	<div class="input form-group has-feedback">
		<label class="control-label sr-only"><?php _e( 'Search' );?></label>
		<input type="text" class="form-control" name="s" id="search" value="" placeholder="<?php _e( 'Search' );?>" />
		<i class="form-control-feedback glyphicon glyphicon-search"></i>
	</div>
</form>