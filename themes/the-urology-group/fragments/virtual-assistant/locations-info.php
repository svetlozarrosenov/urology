<?php
$locations_loop = new WP_Query( array(
	'post_type' => 'crb_location',
	'posts_per_page' => -1,
	'orderby' => 'title',
	'order' => 'ASC'
) );
if ( ! $locations_loop->have_posts() ) {
	return;
}
?>
<div class="list-location-info">
	<?php $index = 0; ?>
	<?php while ( $locations_loop->have_posts() ) : $locations_loop->the_post(); ?>
		<?php
		$location = [
			'address' => carbon_get_the_post_meta( 'crb_location_address' ),
			'phone' => carbon_get_the_post_meta( 'crb_location_phone' ),
			'working_hours' => carbon_get_the_post_meta( 'crb_location_working_hours' ),
		];
		?>
		<ul id="loc<?php echo $index; ?>" class="<?php echo crb_get_class_on_iteration(['iteration' => $index, 'index' => 0, 'class' => 'current' ]); ?>">
			<?php if ( ! empty( $location['address'] ) ) : ?>
				<li>
					<strong><?php _e( 'Address', 'crb' ); ?></strong>
					<a href="#">
						<?php echo $location['address']; ?>
					</a>
				</li>
			<?php endif; ?>

			<?php if (  ! empty( $location['phone'] ) ) : ?>
				<li>
					<strong><?php _e( 'Phone', 'crb' ); ?></strong>
					<a href="tel:<?php echo crb_esc_phone_number( $location['phone'] ); ?>"><?php echo $location['phone']; ?></a>
				</li>
			<?php endif; ?>
			
			<?php if ( ! empty( $location['working_hours'] ) ) : ?>
				<li>
					<strong><?php _e( 'Office Hours', 'crb' ); ?></strong>
					<?php echo $location['working_hours']; ?>
				</li>
			<?php endif; ?>
		</ul>

		<?php $index++; ?>
	<?php endwhile; ?>

	<?php wp_reset_postdata(); ?>
</div><!-- /.list-location-info -->