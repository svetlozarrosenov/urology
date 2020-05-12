<div v-show="steps[1]" class="form__group">
	<?php if ( ! empty( $step['title'] ) ) : ?>
		<div class="form__group-head">
			<h4><?php echo crb_content( $step['title'] ); ?></h4>
		</div><!-- /.form__group-head -->
	<?php endif; ?>

	<div class="form__group-body">
		<div class="form__row form__row--medium">
			<?php if ( ! empty( $step['subtitle'] ) ) : ?>
				<label for="field-symptoms" class="form__label"><?php echo crb_content( $step['subtitle'] ); ?></label>
			<?php endif; ?>

			<div class="form__controls">
				<input @keyup="this.loadSymptoms" v-model="userInput" type="text" class="field" name="field-symptoms" id="field-symptoms" value="" placeholder="Begin typing your primary symptom here">
			</div><!-- /.form__controls -->
			
			<div class="list-simptoms">
				<ul>
					<li @click="fillUpSelectedSymptoms(matchedSymptom)" v-for="(matchedSymptom, index) in patient.matchedSymptoms">
						{{matchedSymptom.name}}
					</li>
				</ul>
			</div><!-- /.list-matched-simptoms -->

			<div class="list-simptoms">
				<ul>
					<li v-for="(selectedSymptom, index) in patient.selectedSymptoms">
						<a @click.prevent="removeFromSelectedSymptoms(selectedSymptom)" href="#">
							{{selectedSymptom.name}}
							<img src="<?php bloginfo('stylesheet_directory'); ?>/resources/images/close.svg" alt="" />
						</a>
					</li>
				</ul>
			</div><!-- /.list-simptoms -->
		</div><!-- /.form__row -->
	</div><!-- /.form__group-body -->

	<div class="form__group-actions">
		<?php if ( ! empty( $step['text'] ) ) : ?>
			<p><?php echo crb_content( $step['text'] ); ?></p>
		<?php endif; ?>

		<div class="form__buttons">
			<input @click="backToFirstStep" type="button" value="Back" class="form__btn form__btn--outline">

			<input @click="secondStepCompleted" type="button" value="Continue" class="form__btn">

			<img v-show="ajax" class="form-checker__spinner" src="<?php echo get_bloginfo( 'stylesheet_directory' ); ?>/resources/images/spinner.gif" alt="">
		</div><!-- /.form__buttons -->
	</div><!-- /.form__group-actions -->

	<div v-show="error" class="form-checker__error">
		Please Select Some Symptoms
	</div><!-- /.form-checker__error -->
</div><!-- /.form__group -->