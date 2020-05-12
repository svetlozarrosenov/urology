<section class="section-text section-base">
	<div class="shell">
		<?php if ( ! empty( $section['text'] ) ) : ?>
			<div class="section__content entry">
				<p>
					<?php echo esc_html( $section['text'] ); ?>
				</p>
			</div><!-- /.section__content -->
		<?php endif; ?>
	</div><!-- /.shell -->
</section><!-- /.section-text -->