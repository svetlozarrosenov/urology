<?php
$staff_loop = new WP_Query( array(
	'post_type' => 'crb_staff',
	'posts_per_page' => -1,
) );

if ( ! $staff_loop->have_posts() ) {
	return;
}
?>
<div id="staff-select-filter" class="form__row">
	<label for="field-staff-name" class="form__label screen-reader-text">Staff Name</label>

	<div class="form__controls">
		<div class="select">
			<select data-post_type="crb_location" class="staff-filter staff-options" name="staff_name" id="field-staff-name">
				<option value="0"><?php _e( 'Staff Name', 'crb' ); ?></option>
				
				<?php while ( $staff_loop->have_posts() ) : $staff_loop->the_post(); ?>
					<?php 
					$selected = '';
					if ( isset( $_GET['staff_name'] ) && $_GET['staff_name'] == get_the_title() ) {
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