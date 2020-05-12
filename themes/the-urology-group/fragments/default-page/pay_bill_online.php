<?php
if ( empty( $section['text'] ) ) {
	return;
}
?>

<section id="section-pay-bill" class="section-text section-base">
	<div class="shell">
		<div class="section__content entry">
			<?php echo crb_content( $section['text'] ); ?>
			
			<p>Need help locating your account number on the billing statement? Click <span style="color: #ff0000;"><a class="js-invoice-images" style="color: #ff0000;" href="#invoice">here</a></span> to see an example.</p>
			
			<?php
			crb_render_fragment('default-page/invoice-images-popup', [
				'tug_invoice' => $section['tug_invoice'],
				'tuc_invoice' => $section['tuc_invoice']
			] );
			?>

			<div class="format" v-show="this.steps.radio">
				<?php _e( 'Thank you for providing your account number. Please review the following questions to continue with online bill pay.', 'crb' ); ?>

				<?php 
				crb_render_fragment('default-page/form-pay-bill-checkboxes', [
					'tug_invoice' => $section['tug_invoice'],
					'tuc_invoice' => $section['tuc_invoice']
				] ); 
				
				crb_render_fragment('default-page/states');

				crb_render_fragment('default-page/pay_bill_section', [
					'tug_btn_link' => $section['tug_btn_link'],
					'tuc_btn_link' => $section['tuc_btn_link'],
					'note' => $section['note']
				] );
				?>
			</div>
		</div><!-- /.section__content -->
	</div><!-- /.shell -->
</section><!-- /.section-text -->