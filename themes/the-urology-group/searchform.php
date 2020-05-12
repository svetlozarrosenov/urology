<form action="<?php echo home_url( '/' ); ?>" class="form-search search-form" method="get" role="search">
	<label>
		<span class="screen-reader-text"><?php _e( 'Search for:', 'crb' ); ?></span>

		<input type="text" title="<?php esc_attr_e( 'Search for:', 'crb' ); ?>" name="s" value="<?php echo isset( $_GET['s'] ) ? $_GET['s'] : ''; ?>" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'crb' ); ?>" class="search__field field" />
	</label>

	<button type="submit" class="search__btn form__btn">
		<?php echo esc_attr( __( 'Search', 'crb' ) ); ?>
	</button>
</form>
