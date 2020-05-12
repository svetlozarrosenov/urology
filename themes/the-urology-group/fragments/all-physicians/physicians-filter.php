<?php
$physicians_loop = new WP_Query( array(
	'post_type' => 'crb_physician',
	'posts_per_page' => -1,
	'meta_key' => '_crb_physician_last_name',
	'orderby'=> 'meta_value',
	'order' => 'ASC',
) );

if ( ! $physicians_loop->have_posts() ) {
	return;
}
?>
<div id="physicians-select-filter" class="form__row">
	<label for="field-physician-name" class="form__label screen-reader-text">Physician Name</label>

	<div class="form__controls">
		<div class="select">
			<select data-post_type="crb_location" class="physicians-filter physicians-options" name="physician_name" id="field-physician-name">
				<option value="0"><?php _e( 'Physician Name', 'crb' ); ?></option>
				
				<?php while ( $physicians_loop->have_posts() ) : $physicians_loop->the_post(); ?>
					<?php 
					$selected = '';
					if ( isset( $_GET['physician_name'] ) && $_GET['physician_name'] == get_the_title() ) {
						$selected = 'selected';
					}
					?>
					<option value="<?php the_ID(); ?>" <?php echo $selected; ?>><?php the_title(); ?></option>
				<?php endwhile; ?>
				
				<?php wp_reset_postdata(); ?>
			</select>
		</div><!-- /.select -->
	</div><!-- /.form__controls -->
</div><!-- /.form__row -->