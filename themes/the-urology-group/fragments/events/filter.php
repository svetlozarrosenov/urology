<?php
$past_dates = crb_get_event_past_dates();
if ( empty( $past_dates ) ) {
	return;
}
?>
<div class="form form--filter events-form-filter">
	<form action="?" method="post">
		<div class="form__body">
			<h2>
				<?php _e( 'Past Events', 'crb' ); ?>
			</h2>

			<div class="form__row">
				<label for="field-filter-year" class="form__label screen-reader-text">filter-year</label>

				<div class="form__controls">
					<div class="select">
						<select name="field-filter-year" id="field-filter-year">
							<option value="0"><?php _e( 'Filter By Year', 'crb' ); ?></option>
								<?php foreach ( $past_dates as $past_date ) : ?>							
									<option value="<?php echo $past_date['past_year']; ?>"><?php echo $past_date['past_year']; ?></option>
								<?php endforeach; ?>
						</select>
					</div><!-- /.select -->
				</div><!-- /.form__controls -->
			</div><!-- /.form__row -->
		</div><!-- /.form__body -->

		<div class="form__actions">
			<input type="submit" value="Submit" class="screen-reader-text form__btn">
		</div><!-- /.form__actions -->
	</form>
</div><!-- /.form -->