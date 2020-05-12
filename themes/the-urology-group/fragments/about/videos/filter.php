<?php
$care_areas = crb_get_cpt_id_title( 'crb_care_area' );
if ( empty( $section['text'] ) && empty( $care_areas ) ) {
	return;
}
?>
<section id="videos-filter" class="section-text section-base">
	<div class="shell">
		<?php if ( ! empty( $section['text'] ) ) : ?>
			<div class="section__content entry">
				<p>
					<?php echo esc_html( $section['text'] ); ?>
				</p>
			</div><!-- /.section__content -->
		<?php endif; ?>

		<div class="form form--filter form--filter-large">
			<form action="?" method="post">
				<div class="form__body">
					<div class="form__row">
						<label for="field-filter-area-of-care" class="form__label screen-reader-text">filter-area-of-care</label>

						<div class="form__controls">
							<div class="select">
								<select name="field-filter-area-of-care" id="field-filter-area-of-care">
									<option value="0"><?php _e( 'Filter By Area of Care', 'crb' ); ?></option>
									
									<?php foreach ( $care_areas as $id => $care_area ) : ?>
										<?php
										$selected = '';
										if ( ! empty( $_GET['care-area-id'] ) && $_GET['care-area-id'] ==  $id ) {
											$selected = 'selected';
										}
										?>
										<option value="<?php echo $id; ?>" <?php echo $selected; ?>><?php echo esc_html( $care_area ); ?></option>
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
	</div><!-- /.shell -->
</section><!-- /.section-text -->