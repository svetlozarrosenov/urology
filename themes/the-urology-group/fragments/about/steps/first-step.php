<div v-show="steps[0]" class="form__group">
	<?php if ( ! empty( $step['title'] ) ) : ?>
		<div class="form__group-head">
			<h4><?php echo crb_content( $step['title'] ); ?></h4>
		</div><!-- /.form__group-head -->
	<?php endif; ?>

	<div class="form__group-body">
		<div class="form__col">
			<div class="form__row form__row--age">
				<?php if ( ! empty( $step['age'] ) ) : ?>
					<label for="field-age" class="form__label"><?php echo crb_content( $step['age'] ); ?></label>
				<?php endif; ?>

				<div class="form__controls">
					<input v-model="patient.age" type="number" class="field" min="0" name="field-age" id="field-age" value="">
				</div><!-- /.form__controls -->
			</div><!-- /.form__row -->
		</div><!-- /.form__col -->

		<div class="form__col">
			<?php if ( ! empty( $step['gender'] ) ) : ?>
				<p><?php echo crb_content( $step['gender'] ); ?></p>
			<?php endif; ?>

			<ul class="list-radios list-radios--gender">
				<?php
				$male_on_click = "@click='" . "selectGender({$step['genders'][0]['id']})" . "'";
				?>
				<li>
					<div class="radio">
						<input type="radio" name="gender" id="field-check-male" <?php echo $male_on_click; ?>>

						<label for="field-check-male">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/resources/images/siluet-man.svg" alt="" />

							<span style="background-image: url(<?php bloginfo('stylesheet_directory'); ?>/resources/images/siluet-man-border.svg);"></span>
						</label>

					</div><!-- /.radio -->
				</li>
				
				<?php
				$female_on_click = "@click='" . "selectGender({$step['genders'][1]['id']})" . "'";
				?>
				<li>
					<div class="radio">
						<input type="radio" name="gender" id="field-check-female" <?php echo $female_on_click; ?>>

						<label for="field-check-female">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/resources/images/siluet-woman.svg" alt="" />

							<span style="background-image: url(<?php bloginfo('stylesheet_directory'); ?>/resources/images/siluet-woman-border.svg);"></span>
						</label>

					</div><!-- /.radio -->
				</li>
			</ul><!-- /.list-radios -->
		</div><!-- /.form__col -->
	</div><!-- /.form__group-body -->

	<div class="form__group-actions">
		<input @click="firstStepCompleted" type="button" value="Continue" class="form__btn">
	</div><!-- /.form__group-actions -->
	
	<div v-show="error" class="form-checker__error">
		Please Select a Gender
	</div><!-- /.form-checker__error -->
</div><!-- /.form__group -->