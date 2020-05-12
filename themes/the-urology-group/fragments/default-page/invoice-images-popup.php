<?php
if ( empty( $tug_invoice ) && empty( $tuc_invoice ) ) {
	return;
}
?>
<div id="invoice" class="invoice-images mfp-hide">
	<div class="invoice-images__container">
		<?php if ( ! empty( $tug_invoice ) ) : ?> 
			<div class="invoice-images__tug-image">
				<?php echo wp_get_attachment_image($tug_invoice, 'full'); ?>
			</div><!-- tug-image -->
		<?php endif; ?>
		
		<?php if ( ! empty( $tuc_invoice ) ) : ?> 
			<div class="invoice-images__tuc-image">
				<?php echo wp_get_attachment_image($tuc_invoice, 'full'); ?>
			</div><!-- tuc-image -->
		<?php endif; ?>
	</div><!-- invoice-images__container -->
</div>