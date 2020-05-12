<?php
if ( ! array_filter( $section ) ) {
	return;
} 
?>
<div class="nav-col nav-col--1of3">
	<?php if ( ! empty( $section['title'] ) ) : ?>
		<p class="nav-title"><?php echo esc_html( $section['title'] ); ?></p>
	<?php endif; ?>
	
	<?php if ( ! empty( $section['phone'] ) ) : ?> 
		<a href="tel:<?php echo crb_esc_phone_number( $section['phone'] ); ?>" class="btn-phone">
			<span style="background-image: url(<?php bloginfo('stylesheet_directory'); ?>/resources/images/ico-phone.svg);"></span>

			<?php echo esc_html( $section['phone'] ); ?>
		</a>
	<?php endif; ?>
	
	<?php if ( ! empty( $section['text'] ) ) : ?>
		<p><?php echo esc_html( $section['text'] ); ?></p>
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