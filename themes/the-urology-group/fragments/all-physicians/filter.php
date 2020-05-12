<section id="physicians-filter-container" class="section-text section-base">
	<div class="shell">
		<div class="form form--localize">
			<form class="physicians_form_filter" action="?" method="GET">
				<?php if ( ! empty( $section['title'] ) ) : ?>
					<div class="form__head">
						<h3>
							<?php echo esc_html( $section['title'] ); ?>
						</h3>
					</div><!-- /.form__head -->
				<?php endif; ?>

				<div class="form__body">
					<?php crb_render_fragment( 'all-physicians/locations-filter' ); ?>

					<?php crb_render_fragment( 'all-physicians/physicians-filter' ); ?>
				</div><!-- /.form__body -->

				<div class="form__actions">
					<input type="submit" value="Search" class="form__btn">
	
					<a class="form__reset">
						<?php _e( 'Reset Search', 'crb' ); ?>
					</a><!-- /.form__reset -->
				</div><!-- /.form__actions -->
			</form>
		</div><!-- /.form -->
	</div><!-- /.shell -->
</section><!-- /.section-text -->