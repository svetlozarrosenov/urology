<?php
if ( ! array_filter( $section ) ) {
	return;
}
?>
<div class="nav-col nav-col--2of3">
	<?php if ( ! empty( $section['title'] ) ) : ?>
		<p class="nav-title"><?php echo esc_html( $section['title'] ); ?></p>
	<?php endif; ?>
	
	<?php if ( ! empty( $section['image'] ) || ! empty( $section['overlay_title'] ) || ! empty( $section['overlay_description'] ) || ! empty( $section['overlay_link'] ) ) : ?>
		<div class="banner banner--condition" style="background-image: url(<?php echo wp_get_attachment_image_url( $section['image'], 'full' ); ?>);">
			<a href="<?php the_permalink(); ?>"></a>

			<div class="banner__content">
				<h6>
					<?php echo $section['overlay_title']; ?>
				</h6>
				
				<p>
					<?php echo $section['overlay_description']; ?>
				</p>

				<p>
					<a class="links-all" href="<?php echo $section['overlay_link']; ?>"><?php echo $section['overlay_link_label']; ?></a>
				</p>
			</div><!-- /.banner__content -->
		</div><!-- /.banner -->
	<?php endif; ?>

	<?php if ( ! empty( $section['link'] ) && ! empty( $section['link_label'] ) ) : ?>
		<?php
		$class = '';
		if ( $section['important_link'] ) {
			$class = 'links-all';
		}
		?>
		<a href="<?php echo esc_url( $section['link'] ); ?>" class="<?php echo $class; ?>">
			<?php echo esc_html( $section['link_label'] ); ?>
		</a>
	<?php endif; ?>
</div><!-- /.nav-dd-col-/-1of3 -->