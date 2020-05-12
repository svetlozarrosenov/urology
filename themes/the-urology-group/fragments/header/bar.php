<?php
$bar = [
	'links' => carbon_get_theme_option( 'crb_header_bar_links' ),
	'btn' => [
		'label' => esc_html( carbon_get_theme_option( 'crb_header_bar_btn_label' ) ),
		'link' => esc_url( carbon_get_theme_option( 'crb_header_bar_btn_link' ) ),
	],
];

if ( empty( $bar['links'] ) && empty( $bar['btn'] ) ) {
	return;
}
?>
<div class="header__bar">
	<div class="shell">
		<div class="header__bar-inner">
			<?php if ( ! empty( $bar['links'] ) ) : ?>
				<div class="nav-buttons">
					<ul>
						<?php foreach ( $bar['links'] as $link ) : ?>
							<?php
							$class = '';
							$target = '';
							if ( $link['border'] ) {
								$class = 'link-border';
							}

							if ( $link['open_in_new_tab'] ) {
								$target = 'target="_blank"';
							}
							?>
							<?php if ( $link['phone_number'] ) : ?>
								<li class="<?php echo $class; ?>">
									<a href="tel:<?php echo crb_esc_phone_number( $link['link'] ); ?>" <?php echo $target; ?>><?php echo esc_html( $link['link_label'] ); ?></a>
								</li>
							<?php else : ?>
								<li class="<?php echo $class; ?>">
									<a href="<?php echo esc_url( $link['link'] ); ?>" <?php echo $target; ?>><?php echo esc_html( $link['link_label'] ); ?></a>
								</li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</div><!-- /.nav-buttons -->
			<?php endif; ?>
			
			<?php if ( ! empty( $bar['btn']['link'] ) && ! empty( $bar['btn']['label'] ) ) : ?>
				<a href="<?php echo esc_url( $bar['btn']['link'] ); ?>" class="btn-callout">
					<?php echo esc_html( $bar['btn']['label'] ); ?>
				</a>
			<?php endif; ?>
			
			<div class="header__search">
				<a href="#" class="btn-search show-search">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/resources/images/ico-search.svg" alt="" />
				</a>
				
				<?php get_search_form(); ?>
			</div>
		</div><!-- /.header__bar-inner -->
	</div><!-- /.shell -->
</div><!-- /.header__bar -->
