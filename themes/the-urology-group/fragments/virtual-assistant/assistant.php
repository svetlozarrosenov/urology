<?php
$virtual_assistant = [
	'title' => esc_html( carbon_get_theme_option('crb_virtual_assistant_title') ),
	'subtitle' => esc_html( carbon_get_theme_option('crb_virtual_assistant_subtitle') )
];
$links = carbon_get_theme_option('crb_virtual_assistant_links');
?>
<div class="assistant">
	<a href="#" class="assistant__trigger" data-assistant-trigger>
		<?php if ( ! empty( $virtual_assistant['title'] ) ) : ?>
			<p>
				<?php echo $virtual_assistant['title']; ?>

				<span style="background-image: url(<?php bloginfo('stylesheet_directory'); ?>/resources/images/ico-info-white.svg);"></span>
			</p>
		<?php endif; ?>
	</a><!-- /.assistant__trigger -->

	<div class="assistant__container">
		<div class="assistant__head">
			<h3>
				<span class="assistant__icon" style="background-image: url(<?php bloginfo('stylesheet_directory'); ?>/resources/images/ico-info-dark.svg);"></span>
				
				<?php 
				if ( ! empty( $virtual_assistant['title'] ) ) {
					echo $virtual_assistant['title'];
				}
				?>

				<a href="#" data-assistant-trigger class="assistant-close" style="background-image: url(<?php bloginfo('stylesheet_directory'); ?>/resources/images/close-line-squared-alt.svg);"></a>
			</h3>
			
			<?php if ( ! empty( $virtual_assistant['subtitle'] ) ) : ?>
				<p>
					<strong><?php echo $virtual_assistant['subtitle']; ?></strong>
				</p>
			<?php endif; ?>
		</div><!-- /.assistant__head -->

		<div class="assistant__content">
			<div class="assistant__entry">
				<div>
					<h6>
						<?php _e( 'I need help with…', 'crb' ); ?> <br>
						<em><?php _e( '(Please select an option below)', 'crb' ); ?></em>
					</h6>

					<div class="assitant-nav">
						<ul>
							<?php if ( ! empty( $links ) ) : ?>
								<?php foreach ( $links as $index => $link ) : ?>
									<?php if ( ! empty( $link['title'] ) ) : ?>
										<li>
											<a href="#tab-link<?php echo $index; ?>"><?php echo $link['title']; ?></a>
										</li>
									<?php endif; ?>
								<?php endforeach;; ?>
							<?php endif; ?>
						</ul>
					</div><!-- /.assitant-nav -->
				</div>
			</div><!-- /.assistant__entry -->

			<div class="accordion-assistant">
				<?php
				foreach ( $links as $index => $link ) {
					crb_render_fragment( 'virtual-assistant/' .  $link['_type'], [ 
						'tab' => $link, 
						'index' => $index 
					] );
				}
				?>
			</div><!-- /.accordion -->
		</div><!-- /.assistant__content -->
	</div><!-- /.assistant__container -->
</div><!-- /.assistant -->