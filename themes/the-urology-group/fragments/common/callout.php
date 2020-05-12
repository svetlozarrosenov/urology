<?php
if( ! array_filter( $section ) ) {
	return;
}
$classes = [
	'section_class' => 'section-callout section-base',
	'btn_class' => 'btn btn--outline',
];

if ( isset( $section['video_btn_link'] ) && $section['video_btn_link'] ) {
	$classes = [
		'section_class' => 'section-callout section-callout--full section-base',
		'btn_class' => 'btn btn--icon video-trigger',
	];
}
?>
<section class="<?php echo $classes['section_class']; ?>">
	<?php if ( ! empty( $section['image'] ) ) : ?>
		<div class="section__bg" style="background-image: url(<?php echo wp_get_attachment_image_url( $section['image'], 'full' ); ?>);"></div><!-- /.section__bg -->
	<?php endif; ?>
	
	<?php if ( ! empty( $section['title'] ) || ( ! empty( $section['btn_label'] ) && ! empty( $section['btn_link'] ) ) ) : ?>
		<div class="shell">
			<div class="section__content">
				<?php if ( ! empty( $section['title'] ) ) : ?>
					<h2>
						<?php echo esc_html( $section['title'] ); ?>
					</h2>
				<?php endif; ?>
				
				<?php if ( ! empty( $section['text'] ) ) : ?>
					<p>
						<?php echo esc_html( $section['text'] ); ?>
					</p>
				<?php endif; ?>

				<?php if ( ! empty( $section['btn_link'] ) && ! empty( $section['btn_label'] ) ) : ?>
					<a href="<?php echo esc_url( $section['btn_link'] ); ?>" class="<?php echo $classes['btn_class']; ?>">
						<?php echo esc_html( $section['btn_label'] ); ?>
					</a>
				<?php endif; ?>
			</div><!-- /.section__content -->
		</div><!-- /.shell -->
	<?php endif; ?>
</section><!-- /.section-callout -->