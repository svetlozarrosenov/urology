<?php
if ( ! array_filter( $section ) ) {
	return;
}

if(basename(get_page_template()) === 'page.php' && ! is_single()){
	if ( empty( $section['subtitle'] ) && empty( $section['text'] ) && empty( $section['image_thumbnail'] ) ) {
		return;
	}
}

$class = '';

if ( ! $section['right_aligned_banner'] ) {
	$class = 'section-banner--alt';
}

if ( is_page_template( 'templates/locations.php' ) ) {
	$class .= ' section-banner--noelement';
}

if ( ! empty( $section['image'] ) ) {
	$image = wp_get_attachment_image_url( $section['image'], 'full' ); 
}

if ( isset( $section['image_thumbnail'] ) ) {
	$image = $section['image_thumbnail'];
}

$overlay_class = '';
if ( $section['title_under_the_intro'] ) {
	$overlay_class = 'section-banner--overlay';
}
?>
<section class="section-banner <?php echo $class; ?>">
	<div class="slider-banner">
		<div class="slider__clip swiper-container">
			<?php if ( ! empty( $section['image'] ) || ! empty( $section['image_thumbnail'] ) ) : ?>
				<div class="slider__slides swiper-wrapper">
					<div class="slider__slide swiper-slide" style="background-image: url(<?php echo $image; ?>);"></div><!-- /.slider__slide -->
				</div><!-- /.slider__slides -->
			<?php endif; ?>

			<div class="swiper-button-prev"></div><!-- /.swiper-button-prev -->
			<div class="swiper-button-next"></div><!-- /.swiper-button-next -->
		</div><!-- /.slider__clip -->
	</div><!-- /.slider -->

	<div class="swiper-pagination"></div><!-- /.swiper-pagination -->
	
	<?php if ( ! empty( $section['title'] ) || ! empty( $section['subtitle'] ) || ! empty( $section['text'] ) ) : ?>
		<div class="section__container">
			<div class="shell">
				<div class="section__content entry <?php echo $overlay_class; ?>">
					<?php if ( ! empty( $section['title'] ) ) : ?>
						<h1><?php echo esc_html( $section['title'] ); ?></h1>
					<?php endif; ?>
					
					<?php if ( ! empty( $section['subtitle'] ) ) : ?>
						<h2><?php echo esc_html( $section['subtitle'] ); ?></h2>
					<?php endif; ?>
					
					<?php if ( ! empty( $section['text'] ) ) : ?>
						<p><?php echo do_shortcode( nl2br( esc_html( $section['text'] ) ) ); ?></p>
					<?php endif; ?>
				</div><!-- /.section__content -->
			</div><!-- /.shell -->
		</div><!-- /.section__container -->
	<?php endif; ?>
	<?php 
	if ( ! is_page_template( 'templates/locations.php' ) ) {
		crb_render_fragment( 'common/breadcrumbs' ); 
	}
	?>
</section><!-- /.section-banner -->

<?php if ( $section['title_under_the_intro'] ) : ?>
	<nav class="section-banner-title-down">
		<div class="shell">
			<h1><?php echo esc_html( $section['title'] ); ?></h1>

			<?php if ( ! empty( $section['subtitle'] ) ) : ?>
			    <h2><?php echo esc_html( $section['subtitle'] ); ?></h2>
			<?php endif; ?>

			<?php if ( ! empty( $section['text'] ) ) : ?>
			    <p><?php echo do_shortcode( nl2br( esc_html( $section['text'] ) ) ); ?></p>
			<?php endif; ?>
		</div><!-- /.shell -->
	</nav><!-- /.breadcrumbs -->
<?php endif; ?>