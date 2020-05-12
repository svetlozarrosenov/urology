<div v-show="steps[2]" class="form__group third-step">
	<?php if ( ! empty( $step['title'] ) ) : ?>
		<div class="form__group-head">
			<h4><?php echo crb_content( $step['title'] ); ?></h4>
		</div><!-- /.form__group-head -->
	<?php endif; ?>

	<?php 
	crb_render_fragment( 'about/steps/matched-conditions', [
		'step' => $step
	] ); 
	?>

	<div class="form__group-actions">
		<div class="form__buttons">
			<input @click="backToSecondStep" type="button" value="Back" class="form__btn form__btn--outline">
			<button @click="this.reset" type="button" class="form__btn btn-start-over">
				<?php _e( 'Start Over', 'crb' ); ?>

				<i class="fa fa-refresh" aria-hidden="true"></i>
			</button>
		</div><!-- /.form__buttons -->

		<img v-show="ajax" class="form-checker__spinner" src="<?php echo get_bloginfo( 'stylesheet_directory' ); ?>/resources/images/spinner.gif" alt="">
	</div><!-- /.form__group-actions -->
</div><!-- /.form__group -->