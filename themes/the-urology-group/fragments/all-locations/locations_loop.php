<?php
if ( ! $locations_loop->have_locations() ) {
	return;
}
?>
<div class="locations__body">
	<div class="locations__aside">
		<ul class="locations__list">
			<?php foreach ( $locations_loop->get_locations() as $location ) : ?>
				<?php
				$location_details = [
					'working_hours' => esc_html( carbon_get_post_meta( $location->ID, 'crb_location_working_hours' ) ),
					'phone' => esc_html( carbon_get_post_meta( $location->ID, 'crb_location_phone' ) ),
					'map' => 	carbon_get_post_meta( $location->ID, 'crb_location_map' ),
				];
				$location_details['map']['id'] = $location->ID;
				$location_details['map']['name'] = $location->post_title;
				$location_details['address'] = esc_html(carbon_get_post_meta($location->ID, 'crb_location_address'));
				?>
				<li class="location__list-item">
					<h5><?php echo $location->post_title; ?></h5>

					<ul>
						<li class="single-location-item">
							<a href="<?php printf( 'https://maps.google.com/?q=%s
', $location_details['address'] ); ?>" data-id="<?php echo $location->ID; ?>" target="_blank">
								<?php echo nl2br($location_details['address']); ?>
							</a><br>

							<?php if ( ! empty( $location_details['phone'] ) ) : ?>
								<a href="tel:<?php echo crb_esc_phone_number( $location_details['phone'] ); ?>"><?php echo $location_details['phone']; ?></a><br>
							<?php endif; ?>
						</li>

						<?php if ( ! empty( $location_details['working_hours'] ) ) : ?>
							<li>
								<?php echo nl2br( esc_html( $location_details['working_hours'] ) ); ?>
							</li>
						<?php endif; ?>

						<li class="single-locations-details">
							<a href="<?php echo get_permalink( $location->ID ); ?>"></a>

							<span class="links-all">
								<?php _e( 'Office Details', 'crb' ); ?>
							</span>
						</li>

						<li class="single-locations-directions">
							<a target="_blank" href="<?php printf( 'https://maps.google.com/?q=%s
', $location_details['address'] ); ?>" class="links-all">
								<?php _e( 'Get Directions', 'crb' ); ?>
							</a>
						</li>
					</ul>
				</li>
			<?php endforeach; ?>
		</ul><!-- /.locations__list -->
	</div><!-- /.locations__aside -->
</div><!-- /.locations__body -->