<?php
crb_render_fragment( 'all-physicians/filter', [
	'section' => $section
] );

$args = array(
	'post_type' => 'crb_physician',
	'posts_per_page' => 100,
	'meta_key' => '_crb_physician_last_name',
	'orderby'=> 'meta_value',
	'order' => 'ASC',
	'suppress_filters' => true,
);

if ( isset( $_GET['location_id'] ) && $_GET['location_id'] != 0 ) {
	$ids = crb_remove_from_array( crb_get_ids_related_to_post( 'crb_location_related_physicians', $_GET['location_id'] ), $physicians_to_exclude );

	$args['post__in'] = $ids;
	if ( empty( $args['post__in'] ) ) {
		$args['post__in'] = [false];
	}

}

if ( isset( $_GET['physician_name'] ) && $_GET['physician_name'] != 'Physician Name' ) {
	$args['s'] = $_GET['physician_name'];
}

if ( isset( $_GET['speciality_id'] ) && $_GET['speciality_id'] != 0 ) {
	$args['tax_query'] = [
		[
			'taxonomy' => 'crb_physician_speciality',
			'field' => 'term_id',
			'terms' => $_GET['speciality_id']
		]
	];
}

$physicians_loop = new WP_Query( $args );
?>
<section class="section-base section-staff">
	<div class="shell">
		<div class="employees">
			<?php if ( ! $physicians_loop->have_posts() ) : ?>
				<div class="employees__not-found"><?php echo 'No results found with that search. Please try a new search.'; ?></div>
			<?php endif; ?>

			<ul>
				<?php while ( $physicians_loop->have_posts() ) : $physicians_loop->the_post(); ?>
					<li class="single-employee">

						<div class="employee">
							<a class="employee__link" href="<?php the_permalink(); ?>"></a>
							
							<div class="employee__image" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>);">
							</div><!-- /.employee__image -->

							<div class="employee__content">
								<div class="employee__entry">
									<h5><?php the_title(); ?></h5>

									<?php
									$physician = [
										'subtitle' => esc_html( carbon_get_the_post_meta( 'crb_physician_subtitle' ) ),
										'info' => esc_html( carbon_get_the_post_meta( 'crb_physician_info' ) ),
									];
									?>
									
									<?php if ( ! empty( $physician['subtitle'] ) ) : ?>
										<h6><?php echo $physician['subtitle']; ?></h6>
									<?php endif; ?>
									
									<?php if ( ! empty( $physician['info'] ) ) : ?> 
										<p>	
											<?php echo $physician['info']; ?>
										</p>
									<?php endif; ?>

									<?php
									$locations = crb_get_columns_from_association( 'crb_location_related_physicians', get_the_ID() );
									?>
									<?php if ( ! empty( $locations ) ) : ?>
										<ul>
											<?php foreach( $locations as $location ) : ?>
												<li>
													<i class="fa fa-map-marker"></i>
													<?php echo $location['title']; ?>
												</li>
											<?php endforeach; ?>
										</ul>
									<?php endif; ?>
								</div><!-- /.employee__entry -->
							</div><!-- /.employee__content -->

							<a href="<?php the_permalink(); ?>" class="btn btn--outline btn--white">
								<?php _e( 'Read More', 'crb' ); ?>
							</a>
						</div><!-- /.employees-item -->
					</li>
				<?php endwhile; ?>
				
				<?php wp_reset_postdata(); ?>
			</ul>
		</div><!-- /.employees -->
	</div><!-- /.shell -->
</section><!-- /.section-base section-employees -->