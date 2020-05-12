<div id="tab-link<?php echo $index; ?>" class="accordion__section">
	<div class="accordion__body">
		<?php
		$text = esc_html( carbon_get_theme_option( 'crb_virtual_assistant_direction_and_hours_text' ) );
		?>
		<h6>
			<?php _e( 'I need help with ‘', 'crb' ); ?><?php echo $tab['title'] . '’';?>  <br>
			
			<?php if ( ! empty( $tab['text'] ) ) : ?>
				<em><?php echo $tab['text']; ?></em>
			<?php endif; ?>
		</h6>

		<div class="list-location">
			<?php crb_render_fragment( 'virtual-assistant/locations-filter' ); ?>

			<?php crb_render_fragment( 'virtual-assistant/locations-info' ); ?>
		</div><!-- /.list-location -->
	</div><!-- /.accordion__body -->

	<div class="accordion__foot">
		<a href="#" class="assistant-back">
			&lt; <?php _e( 'Go Back', 'crb' ); ?>
		</a>
	</div><!-- /.accordion__foot -->
</div><!-- /.accordion__section -->