<section id="symptom-checker" class="section-base section-multiform">
	<div class="shell">
		<?php if ( ! empty( $section['form_title'] ) || ! empty( $section['form_subtitle'] ) || ! empty( $section['form_text'] ) ) : ?>
			<header class="section__head entry">
				<?php if ( ! empty( $section['form_title'] ) ) : ?>
					<h3><?php echo esc_html( $section['form_title'] ); ?></h3>
				<?php endif; ?>
				
				<?php if ( ! empty( $section['form_subtitle'] ) ) : ?>
					<h5><?php echo esc_html( $section['form_subtitle'] ); ?></h5>
				<?php endif; ?>
				
				<?php if ( ! empty( $section['form_text'] ) ) : ?>
					<?php echo crb_content( $section['form_text'] ); ?>
				<?php endif; ?>
			</header><!-- /.section__head -->
		<?php endif; ?>

		<div class="section__content entry">
			<div class="form form-checker">
				<form action="?" method="POST">
					<?php 
					crb_render_fragment( 'about/steps/first-step', [
						'step' => [
							'title' => $section['first_step_form_title'],
							'age' => $section['first_step_form_age_text'],
							'gender' => $section['first_step_form_gender_text'],
							'genders' => $section['types']
						]
					] ); 
					
					crb_render_fragment( 'about/steps/second-step', [
						'step' => [
							'title' => $section['second_step_form_title'],
							'subtitle' => $section['second_step_form_subtitle'],
							'text' => $section['second_step_form_text']
						]
					] );  
					
					crb_render_fragment( 'about/steps/third-step', [
						'step' => [
							'title' => $section['third_step_form_title'],
							'subtitle' => $section['third_step_form_subtitle'],
							'text' => $section['third_step_form_text']
						]
					] );   
					?>
				</form>
			</div><!-- /.form -->
			
			<?php if ( ! empty( $section['callout_title'] ) ) : ?>
				<p>
					<?php echo do_shortcode( $section['callout_title'] ); ?>
				</p>
			<?php endif; ?>
			
			<?php if ( ! empty( $section['callout_text'] ) ) : ?>
				<p>
					<em>
						<?php echo esc_html( $section['callout_text'] ); ?>
					</em>
				</p>
			<?php endif; ?>
		</div><!-- /.section__content -->
	</div><!-- /.shell -->
</section><!-- /.section-base -->
