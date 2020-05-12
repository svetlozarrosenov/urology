<?php
$terms = get_terms( array(
	'taxonomy' => 'crb_location_state',
	'hide_empty' => false,
) );

if ( empty( $terms ) ) {
	return;
} 

?>
<div class="locations__head">
	<div class="form form--locations">
		<form action="?" method="GET">

			<div class="form__body">
				<div class="form__row form__row--xlarge">
					<label for="field-location-type" class="form__label screen-reader-text"><?php _e( 'State', 'crb' ); ?></label>

					<div class="form__controls">
						<div class="select">
							<select name="location-state" id="field-location-state">
								<option value="0"><?php _e( 'State', 'crb' ); ?></option>

								<?php foreach ( $terms as $term ) : ?>
									<?php
									$selected = '';
									if ( $_GET['location-state'] == $term->term_id ) {
										$selected = 'selected';
									}
									?>
									<option value="<?php echo $term->term_id; ?>" <?php echo $selected; ?>><?php echo $term->name; ?></option>
								<?php endforeach; ?>
							</select>
						</div><!-- /.select -->
					</div><!-- /.form__controls -->
				</div><!-- /.form__row -->
			</div><!-- /.form__body -->

			<div class="form__actions">
				<input type="submit" value="Search" class="form__btn">

				<a href="<?php the_permalink(); ?>" class="form__reset">
					<?php _e( 'Reset Search', 'crb' ); ?>
				</a><!-- /.form__reset -->
			</div><!-- /.form__actions -->
		</form>
	</div><!-- /.form -->
</div><!-- /.locations__head -->