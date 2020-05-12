<div v-show="steps.states" class="states">
	<p class="form--pay-bil__title">2. Review the following locations and select the office where your visit or procedure took place:</p>

	<div v-for="(locations, state) in this.states" class="states__container">
		<p v-show="showState" class="states__state">{{state}} Office Locations</p>
		
		<div class="states-locations-row">
			<div v-for="columns in locations" class="states-locations-column">
				<div v-for="location in columns" class="states__location">
					<input @change="ShowPayBillSection" type="checkbox" value="{{location.address}}">{{decodeHTML(location.title)}}
				</div><!-- states__location -->
			</div><!-- states-locations -->
		</div><!-- states-locations-row -->
	</div><!-- states__container -->

	<div class="states__help">If your office is not listed above, call the phone number on your bill for help.</div>
</div><!-- _locations -->
