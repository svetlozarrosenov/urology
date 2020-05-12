<?php
if ( empty( $tab['title'] ) && empty( $tab['content'] ) ) {
	return;
}
?>
<div id="tab-link<?php echo $index; ?>" class="accordion__section">
	<div class="accordion__body">
		<h6>
			<?php _e( 'I need help with ', 'crb' ); ?> ‘<?php echo $tab['title'] ;?>’
		</h6>

		<?php echo crb_content( $tab['content'] ); ?>
	</div><!-- /.accordion__body -->

	<div class="accordion__foot">
		<a href="#" class="assistant-back">
			&lt; <?php _e( 'Go Back', 'crb' ); ?>
		</a>
	</div><!-- /.accordion__foot -->
</div><!-- /.accordion__section -->