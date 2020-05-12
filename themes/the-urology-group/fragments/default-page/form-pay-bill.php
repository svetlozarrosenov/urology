<p v-show="!this.accountNumberMatched" class="not-founc-account-number">
	The account number you entered does not match The Urology Group. Please double check your account number and try again or call the number on your bill if you need additional assistance.”
</p>

<div class="form form--pay-bil">
	<form action="?" v-on:submit.prevent="checkNumber" method="GET">		
		<div class="form__body">
			<div class="form__row">
				<div class="form__controls">
					<input v-model="invoiceNumber" type="text" class="field" name="number" placeholder="Account Number*">
				</div><!-- /.form__controls -->
			</div><!-- /.form__row -->
		</div><!-- /.form__body -->

		<div class="form__actions">
			<input type="submit" value="Search" class="form__btn">
		</div><!-- /.form__actions -->
	</form>
</div><!-- form -->