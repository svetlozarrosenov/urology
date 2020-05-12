<div id="tab-link<?php echo $index; ?>" class="accordion__section">
	<div class="accordion__body">
		<h6>
			<?php _e( 'I need help with ‘', 'crb' ); ?> <?php echo $tab['title'] . '’';?>  <br>

			<?php if ( ! empty( $tab['text'] ) ) : ?>
				<em><?php echo $tab['text']; ?></em>
			<?php endif; ?>
		</h6>
		
		<div class="assitant-nav">
			<ul>
				<?php if ( ! empty( $tab['link_label'] ) && ! empty( $tab['link'] ) ) : ?>
					<li>
						<a href="<?php echo esc_url( $tab['link'] ); ?>"><?php echo esc_html( $tab['link_label'] ); ?></a>
					</li>
				<?php endif; ?>
				
				<?php if ( ! empty( $tab['tab_title'] ) ) : ?>
					<li>
						<a href="#tab-link2-2"><?php echo esc_html( $tab['tab_title'] ); ?></a>
					</li>
				<?php endif; ?>
			</ul>
		</div><!-- /.assitant-nav -->
		
		<?php if ( ! empty( $tab['tab_title'] ) && ! empty( $tab['tab_text'] ) ) : ?>
			<div id="tab-link2-2" class="accordion__section">
				<div class="accordion__body">
					<p>
						<strong><?php _e( 'I need help with ', 'crb' ); ?> ‘<?php echo $tab['title'] ;?>’ </strong>
					</p>

					<?php echo crb_content( $tab['tab_text'] ); ?>
				</div><!-- /.accordion__body -->

				<div class="accordion__foot">
					<a href="#" class="assistant-back">
						&lt; <?php _e( 'Go Back', 'crb' ); ?>
					</a>
				</div><!-- /.accordion__foot -->
			</div><!-- /.accordion__section -->
		<?php endif; ?>
	</div><!-- /.accordion__body -->

	<div class="accordion__foot">
		<a href="#" class="assistant-back">
			&lt; <?php _e( 'Go Back', 'crb' ); ?>
		</a>
	</div><!-- /.accordion__foot -->
</div><!-- /.accordion__section -->