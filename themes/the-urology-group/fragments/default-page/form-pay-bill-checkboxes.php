<div class="form form--pay-bil">
	<p class="form--pay-bil__title">1. Please confirm that your billing statement matches the color and format of the example shown below.</p>
	
	<form id="billing-statement-form" action="?" method="GET">	
		<div class="form--pay-bil-form__body">
			<div class="form--pay-bil__first-row">
				<a v-if="this.format === 'TUG'" class="invoice-image" href="<?php echo wp_get_attachment_image_url( $tug_invoice, 'crb_invoice_image_size' ); ?>">
					<img class="pay-bill-tug-image" src="<?php echo wp_get_attachment_image_url( $tug_invoice, 'crb_invoice_image_size' ); ?>" alt=""></a>

				<a v-if="this.format === 'TUC'" class="invoice-image" href="<?php echo wp_get_attachment_image_url( $tuc_invoice, 'crb_invoice_image_size' ); ?>">
					<img class="pay-bill-tug-image" src="<?php echo wp_get_attachment_image_url( $tuc_invoice, 'crb_invoice_image_size' ); ?>" alt=""></a>
				
				<p class="form--pay-bil__first-row-hint">Click the image to enlarge</p>
			</div><!-- /.form__row -->

			<div class="form--pay-bil__second-row">
				<div class="form--pay-bil-form__controls">
					<p>
						<input type="radio" @change="loadStates" name="confirm-billing-statement" value="1" data-page_id="<?php the_ID(); ?>">Yes. I confirm that my billing statement matches this example.
					</p>
					
					<p>
						<input type="radio" @change="notMatchedBillingStatement" name="confirm-billing-statement" value="1">No. My billing statement does NOT match this example. 
					</p>
				</div><!-- /.form__controls -->
				
				<div v-show="!this.matchedStatement" class="form--pay-bil__second-row-not-matched-statement">
					Please call the phone number on your bill for help or confirm the account number your entered
					above matches the number on your bill and try again.				
				</div><!-- form--pay-bil__second-row-not-matched-statement -->
			</div><!-- /.form__row -->
		</div><!-- /.form__body -->
	</form>
</div><!-- form -->