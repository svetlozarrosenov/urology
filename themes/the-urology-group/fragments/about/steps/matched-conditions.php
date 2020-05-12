<div class="form__group-body">
	<div class="form__row form__row--center">
		<?php if ( ! empty( $step['subtitle'] ) ) : ?>
			<p><?php echo crb_content( $step['subtitle'] ); ?></p>
		<?php endif; ?>

		<div class="list-simptoms">
			<ul>
				<li v-for="(selectedSymptom, index) in patient.selectedSymptoms">
					{{selectedSymptom.name}}
				</li>
			</ul>
		</div><!-- /.list-simptoms -->

		<div class="services">
			<?php if ( ! empty( $step['text'] ) ) : ?>
				<p><?php echo crb_content( $step['text'] ); ?></p>
			<?php endif; ?>

			<ul>
				<li v-for="(condition, index) in patient.conditions">
					<div class="service" v-bind:style="{ backgroundImage: 'url(' + condition.thumbnail + ')' }">
						<a :href="condition.permalink">
							<div class="service__head">
								<h3>{{condition.post_title}}</h3>
							</div><!-- /.service__head -->

							<div class="service__content">
								<div class="service__entry">
									<h3>{{condition.post_title}}</h3>

									<p>
										{{condition.post_excerpt}}
									</p>
								</div><!-- /.service__entry -->
							</div><!-- /.service__content -->
						</a>
					</div><!-- /.service -->
				</li>
			</ul>
		</div><!-- /.services -->
	</div><!-- /.form__row -->
</div><!-- /.form__group-body -->