<?php
$ids = crb_get_ids_related_to_post_type( 'crb_location_related_staff', 'crb_location', 'ID');
$locations_loop = new WP_Query( array(
	'post_type' => 'crb_location',
	'posts_per_page' => -1,
	'orderby' => 'title',
	'order' => 'ASC',
	'post__in' => $ids
) );

if ( ! $locations_loop->have_posts() ) {
	return;
}
?>
<div id="locations-select-filter" class="form__row">
	<label for="field-staff-location" class="form__label screen-reader-text"><?php _e( 'Staff Location', 'crb' ); ?></label>

	<div class="form__controls">
		<div class="select">
			<select data-post_type="crb_staff" class="staff-filter locations-options" name="location_id" id="field-staff-location">
				<option value="0"><?php _e( 'Location', 'crb' ); ?></option>
				
				<?php while ( $locations_loop->have_posts() ) :  $locations_loop->the_post(); ?>
					<?php 
					$selected = '';
					if ( isset( $_GET['location_id'] ) && $_GET['location_id'] == get_the_ID() ) {
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