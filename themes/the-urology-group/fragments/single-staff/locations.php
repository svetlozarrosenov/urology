<?php
$title = esc_html( carbon_get_the_post_meta( 'crb_staff_locations_title' ) );
if ( empty( $title ) ) {
	return;
}
$locations_ids = crb_get_related_ids_from_association( 'crb_location_related_staff' );

$locations_loop = new WP_Query( array(
	'post_type' => 'crb_location',
	'posts_per_page' => -1,
	'post__in' => $locations_ids,
	'orderby' => 'post__in'
) );

if ( ! $locations_loop->have_posts() ) {
	return;
}
?>

<div class="section__inner">
	<h5><?php echo $title; ?></h5>

	<div class="locations">
		<div class="locations__body">
			<div class="locations__aside">
				<ul class="locations__list">
					<?php $maps = []; ?>
					<?php while ( $locations_loop->have_posts() ) : $locations_loop->the_post(); ?>
						<?php
						$location = [
							'working_hours' => esc_html( carbon_get_the_post_meta( 'crb_location_working_hours' ) ),
							'phone' => esc_html( carbon_get_the_post_meta( 'crb_location_phone' ) ),
							'map' => carbon_get_the_post_meta( 'crb_location_map' ),
						];
						$location['map']['id'] = get_the_ID();
						$location['map']['name'] = get_the_title();
						$location['address'] = $location['map']['address'];
						$maps[] = $location['map'];
						?>
						<li class="location__list-item">
							<h5><?php the_title(); ?></h5>

							<p class="location-address">
								<a class="location-address__link" data-id="<?php the_ID(); ?>" href="#"></a>
								<?php if ( ! empty( $location['address'] ) ) : ?>
									<a href="#" target="_blank">
									<?php echo esc_html( $location['address'] ); ?>
									</a> <br>
								<?php endif; ?>
								
								<?php if ( ! empty( $location['phone'] ) ) : ?>
									<a href="tel:<?php echo crb_esc_phone_number( $location['phone'] ); ?>"><?php echo $location['phone']; ?></a>
								<?php endif; ?>
							</p>
							
							<?php if ( ! empty( $location['working_hours'] ) ) : ?>
								<p>
									<?php echo $location['working_hours']; ?>
								</p>
							<?php endif; ?>

							<p class="location-permalink">
								<a href="<?php printf( 'https://maps.google.com/?q=%s
', $location['address'] ); ?>" class="links-all">
									<?php _e( 'Get Directions', 'crb' ); ?>
								</a>
							</p>
						</li>
					<?php endwhile; ?>
					
					<?php wp_reset_postdata(); ?>
				</ul><!-- /.locations__list -->
			</div><!-- /.locations__aside -->

			<?php 
			crb_render_fragment( 'common/map', [
				'maps' => $maps
			] ); 
			?>
		</div><!-- /.locations__body -->
	</div><!-- /.locations -->
</div><!-- /.section__inner -->