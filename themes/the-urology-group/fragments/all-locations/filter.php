<div class="locations__head">
	<div class="form form--locations">
		<form action="?" method="GET">
			<?php if ( ! empty( $section['title'] ) ) : ?> 
				<div class="form__head">
					<h3><?php echo esc_html( $section['title'] ); ?></h3>
				</div><!-- /.form__head -->
			<?php endif; ?>

			<div class="form__body">
				<div class="form__row">
					<label for="field-location-address" class="form__label screen-reader-text"><?php _e( 'Enter Your Address, City, or Zip Code', 'crb' ); ?></label>

					<div class="form__controls">
						<?php
						$location_address = isset( $_GET['location-address'] ) ? $_GET['location-address'] : '';
						?>
						<input type="text" class="field" name="location-address" id="field-location-address" value="<?php echo $location_address; ?>" placeholder="Enter Your Address, City & State, or Zip Code">
					</div><!-- /.form__controls -->
				</div><!-- /.form__row -->

				<div class="form__row form__row--small">
					<label for="field-location-distance" class="form__label screen-reader-text"><?php _e( 'Distance', 'crb' ); ?></label>

					<div class="form__controls">
						<div class="select">
							<select name="location-distance" id="field-location-distance">
								<?php foreach ( crb_get_distances() as $index => $distance ) : ?>
									<?php
									$selected = '';
									$selected_distance = carbon_get_the_post_meta( 'location_selected_distance' );

									if ($distance == $section['location_selected_distance'] && ! isset( $_GET['location-distance'] ) ) {
										$selected = 'selected';
									}
									if ( ! empty( $_GET['location-distance'] ) && $_GET['location-distance'] == $distance ) {
										$selected = 'selected';
									}

									if ( $index > 2 ) {
										$distance .= ' miles';
									}
									?>
									<option value="<?php echo $index; ?>" <?php echo $selected; ?>><?php echo $distance; ?></option>
								<?php endforeach; ?>
							</select>
						</div><!-- /.select -->
					</div><!-- /.form__controls -->
				</div><!-- /.form__row -->

				<div class="form__row form__row--small">
					<label for="field-location-type" class="form__label screen-reader-text"><?php _e( 'Location Type', 'crb' ); ?></label>

					<div class="form__controls">
						<div class="select">
							<?php
							$terms = get_terms( array(
								'taxonomy' => 'crb_location_type',
								'hide_empty' => false,
							) );
							?>
							<select name="location-type" id="field-location-type">
								<option value="0"><?php _e( 'Location Type', 'crb' ); ?></option>

								<?php foreach ( $terms as $term ) : ?>
									<?php
									$selected = '';
									if ( $_GET['location-type'] == $term->term_id ) {
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
			</div><!-- /.form__actions -->
		</form>
	</div><!-- /.form -->
</div><!-- /.locations__head -->