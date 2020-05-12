<?php
if ( ! array_filter( $section ) ) {
	return;
}
$map = carbon_get_the_post_meta( 'crb_location_map' );
?>
<section class="section-base section-locations-single">
	<div class="shell">
		<div class="locations locations--single">
			<div class="locations__body">
				<div class="locations__aside">
					<ul class="locations__info">
						<li>
							<?php if ( ! empty( $section['office_hours_title'] ) ) : ?>
								<h5><?php echo esc_html( $section['office_hours_title'] ); ?></h5>
							<?php endif; ?>
							
							<?php if ( ! empty( $section['office_hours_content'] ) ) : ?>
								<p><?php echo esc_html( $section['office_hours_content'] ); ?></p>
							<?php endif; ?>
						</li>
						
						<li>
							<?php if ( ! empty( $section['telephone_hours_title'] ) ) : ?>
								<h5><?php echo esc_html( $section['telephone_hours_title'] ); ?></h5>
							<?php endif; ?>

							<?php if ( ! empty( $section['telephone_hours_content'] ) ) : ?>
								<p><?php echo esc_html( $section['telephone_hours_content'] ); ?></p>
							<?php endif; ?>
						</li>

						<li>
							<?php if ( ! empty( $section['fax_title'] ) ) : ?>
								<h5><?php echo esc_html( $section['fax_title'] ); ?></h5>
							<?php endif; ?>

							<?php if ( ! empty( $section['fax'] ) ) : ?>
								<p><?php echo nl2br( esc_html( $section['fax'] ) ); ?></p>
							<?php endif; ?>
						</li>
						
						<?php if ( ! empty( $map ) ) : ?>
							<li>
								<h5><a href="https://www.google.com/maps?q=<?php echo $map['address']; ?>" target="_blank"><?php _e( 'Get Directions', 'crb' ); ?></a></h5>
							</li>
						<?php endif; ?>
					</ul><!-- /.locations__info -->
				</div><!-- /.locations__aside -->

				<?php 
				crb_render_fragment( 'common/map', [
					'maps' => [ carbon_get_the_post_meta( 'crb_location_map' ) ]
				] ); 
				?>
			</div><!-- /.locations__body -->

		</div><!-- /.locations -->
	</div><!-- /.shell -->
</section><!-- /.section-locations -->