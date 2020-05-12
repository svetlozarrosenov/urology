<div v-show="this.steps.payBillSection" class="pay-bill-section">
	<div class="pay-bill-section__content">
		<p>Before you click “Pay Online” make sure you have the following information handy:</p>

			<ul>
				<li>Be sure your bill is from The Urology Group in Cincinnati, Ohio and Tri-state area.</li>
				
				<li>Your patient account number.  Your account number can be found near the top right of your bill. This is the same number that you entered above.</li>
				
				<li>Your credit card. The Urology Group currently accepts Discover, Mastercard and Visa. Unfortunately we no longer accept American Express.</li>
			</ul>
	</div><!-- pay-bill-section__content -->
	
	<?php if ( ! empty( $tug_btn_link ) ) : ?>
		<div v-if="this.format === 'TUG'" class="pay-bill-section__actions">
			<a class="pay-bill-section__actions-btn" href="<?php echo esc_url( $tug_btn_link ); ?>" target="_blank"><?php _e( 'Pay Online', 'crb' ); ?></a>
		</div><!-- pay-bill-section__content -->
	<?php endif; ?>

	<?php if ( ! empty( $tuc_btn_link ) ) : ?>
		<div v-if="this.format === 'TUC'" class="pay-bill-section__actions">
			<a class="pay-bill-section__actions-btn" href="<?php echo esc_url( $tuc_btn_link ); ?>" target="_blank"><?php _e( 'Pay Online', 'crb' ); ?></a>
		</div><!-- pay-bill-section__content -->
	<?php endif; ?>
	
	<?php if ( ! empty( $note ) ) : ?>
		<div class="pay-bill-section__note">
			<?php echo esc_html( $note ); ?>
		</div><!-- pay-bill-section__content -->
	<?php endif; ?>
</div><!-- pay-bill-section -->