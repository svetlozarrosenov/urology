<?php
if ( ! array_filter( $section ) ) {
	return;
}
?>
<section class="section-text section-base section-text--testimonials-rotator">
	<div class="shell">
		<h2 class="section-text__title"><?php echo esc_html( $section['title'] ); ?></h2>
		
		<?php if ( ! empty( $section['description'] ) ) : ?>
			<div class="section__content entry">
				<?php echo crb_content( $section['description'] ); ?>
			</div><!-- /.section__content -->
		<?php endif; ?>

		<div class="section__testimonial-rotator">
			<?php echo do_shortcode( esc_html( $section['shortcode'] ) ); ?>
		</div><!-- section__testimonial-rotator -->
	</div><!-- /.shell -->
</section><!-- /.section-text -->