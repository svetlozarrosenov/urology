<?php
if ( ! array_filter( $section ) ) {
	return;
}
?>
<section class="section-banner section-banner--home">
	<div class="slider-banner slider-banner--home">
		<div class="slider__clip swiper-container">
			<div class="slider__slides swiper-wrapper">
				<?php if ( ! empty( $section['slider'] ) ) : ?>
					<?php foreach ( $section['slider'] as $slide ) : ?>
						<div class="slider__slide swiper-slide" style="background-image: url(<?php echo wp_get_attachment_image_url( $slide['image'], 'full' ); ?>);"></div><!-- /.slider__slide -->
					<?php endforeach; ?>
				<?php endif; ?>
			</div><!-- /.slider__slides -->

			<div class="swiper-button-prev"></div><!-- /.swiper-button-prev -->
			<div class="swiper-button-next"></div><!-- /.swiper-button-next -->
		</div><!-- /.slider__clip -->
	</div><!-- /.slider -->

	<div class="swiper-pagination"></div><!-- /.swiper-pagination -->

		<?php if ( ! empty( $slide['title'] ) || ! empty( $slide['subtitle'] ) || ! empty( $slide['text'] ) || ! empty( $slide['btn_label'] ) ) : ?>
			<div class="section__container">
				<div class="shell">
					<div class="section__content entry swiper-content-slider swiper-container">
						<div class="swiper-wrapper">
							<?php foreach ( $section['slider'] as $slide ) : ?>
								<div class="swiper-slide">
									<?php if ( ! empty( $slide['title'] ) ) : ?>
										<h1><?php echo esc_html( $slide['title'] ); ?></h1>
									<?php endif; ?>

									<?php if ( ! empty( $slide['subtitle'] ) ) : ?>
										<h2><?php echo esc_html( $slide['subtitle'] ); ?></h2>
									<?php endif; ?>

									<?php if ( ! empty( $slide['text'] ) ) : ?>
										<p><?php echo esc_html( $slide['text'] ); ?></p>
									<?php endif; ?>

									<?php if ( ! empty( $slide['btn_label'] ) && ! empty( $slide['btn_link'] ) ) : ?>
										<a href="<?php echo esc_url( $slide['btn_link'] ); ?>" class="btn btn--outline"><?php echo esc_html( $slide['btn_label'] ); ?></a>
									<?php endif; ?>
								</div><!-- /.swiper-slide -->
							<?php endforeach; ?>
						</div><!-- /.swiper-wrapper -->
					</div><!-- /.section__content -->
				</div><!-- /.shell -->
			</div><!-- /.section__container -->
		<?php endif; ?>
</section><!-- /.section-banner -->