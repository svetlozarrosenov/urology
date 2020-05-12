<?php
if ( ! array_filter( $section ) ) {
	return;
}
?>
<section class="section-callout section-callout--full section-base">
	<?php if ( ! empty( $section['image'] ) ) : ?>
		<div class="section__bg" style="background-image: url(<?php echo wp_get_attachment_image_url( $section['image'], 'full' ); ?>);"></div><!-- /.section__bg -->
	<?php endif; ?>
	
	<?php if ( ! empty( $section['title'] ) || ! empty( $section['content'] ) || ! empty( $section['video'] ) ) : ?>
		<div class="shell">
			<div class="section__content">
				<?php if ( ! empty( $section['title'] ) ) : ?>
					<h2>
						<?php echo esc_html( $section['title'] ); ?>
					</h2>
				<?php endif; ?>
				
				<?php if ( ! empty( $section['content'] ) ) : ?>
					<p>
						<?php echo esc_html( $section['content'] ); ?>
					</p>
				<?php endif; ?>
				
				<?php
				$video = Carbon_Video::create( $section['video'] );
				?>
				<?php if ( ! $video->is_broken() ) : ?>
					<a href="<?php echo $video->get_link(); ?>" class="btn btn--icon video-trigger">
						<span style="background-image: url(<?php bloginfo('stylesheet_directory'); ?>/resources/images/ico-play-blue.svg);"></span>

						<?php _e( 'Watch Video', 'crb' ); ?>
					</a>
				<?php endif; ?>
			</div><!-- /.section__content -->
		</div><!-- /.shell -->
	<?php endif; ?>
</section><!-- /.section-callout -->