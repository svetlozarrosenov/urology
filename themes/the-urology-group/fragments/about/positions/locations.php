<?php
$locations_ids = crb_get_association_ids( carbon_get_the_post_meta( 'crb_position_locations' ) );

$locations_loop = new WP_Query( array(
	'post_type' => 'crb_location',
	'posts_per_page' => -1,
	'post__in' => $locations_ids,
	'orderby' => 'post__in',
) );

if ( !$locations_loop->have_posts() ) {
	return;
}
?>

<ul>
	<?php while ( $locations_loop->have_posts() ) : $locations_loop->the_post(); ?>
		<?php
		$address = carbon_get_the_post_meta( 'crb_location_map' );
		?>
		<li>
			<i class="fa fa-map-marker"></i>

			<?php echo $address['address']; ?>
		</li>
	<?php endwhile; ?>

	<?php wp_reset_postdata(); ?>
</ul>