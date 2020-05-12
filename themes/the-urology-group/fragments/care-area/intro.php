<?php
if ( ! array_filter( $section ) ) {
	return;
}
?>
<section class="section-banner section-banner--alt">
	<div class="slider-banner">
		<div class="slider__clip swiper-container">
			<?php if ( ! empty( $section['image'] ) ) : ?>
				<div class="slider__slides swiper-wrapper">
					<div class="slider__slide swiper-slide" style="background-image: url(<?php echo wp_get_attachment_image_url( $section['image'], 'full' ); ?>);"></div><!-- /.slider__slide -->
				</div><!-- /.slider__slides -->
			<?php endif; ?>

			<div class="swiper-button-prev"></div><!-- /.swiper-button-prev -->
			<div class="swiper-button-next"></div><!-- /.swiper-button-next -->
		</div><!-- /.slider__clip -->
	</div><!-- /.slider -->

	<div class="swiper-pagination"></div><!-- /.swiper-pagination -->
	
	<?php if ( ! empty( $section['title'] ) && ! empty( $section['subtitle'] ) && ! empty( $section['text'] ) ) : ?>
		<div class="section__container">
			<div class="shell">
				<div class="section__content entry">
					<?php if ( ! empty( $section['title'] ) ) : ?>
						<h1><?php echo esc_html( $section['title'] ); ?></h1>
					<?php endif; ?>
					
					<?php if ( ! empty( $section['subtitle'] ) ) : ?>
						<h2><?php echo esc_html( $section['subtitle'] ); ?></h2>
					<?php endif; ?>
					
					<?php if ( ! empty( $section['text'] ) ) : ?>
						<p><?php echo esc_html( $section['text'] ); ?></p>
					<?php endif; ?>
				</div><!-- /.section__content -->
			</div><!-- /.shell -->
		</div><!-- /.section__container -->
	<?php endif; ?>

	<nav class="breadcrumbs">
		<div class="shell">
			<?php Carbon_Breadcrumb_Trail::output(); ?>
		</div><!-- /.shell -->
	</nav><!-- /.breadcrumbs -->
</section><!-- /.section-banner -->