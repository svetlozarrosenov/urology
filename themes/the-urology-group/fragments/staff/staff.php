<?php
crb_render_fragment( 'staff/filter', [
	'section' => $section
] );

$args = array(
	'post_type' => 'crb_staff',
	'posts_per_page' => 100,
	'meta_key' => '_crb_staff_last_name',
	'orderby'=> 'meta_value',
	'order' => 'ASC',
	'suppress_filters' => true,
);

if ( isset( $_GET['location_id'] ) && $_GET['location_id'] != 0 ) {
	$args['post__in'] =  crb_remove_from_array( crb_get_ids_related_to_post( 'crb_location_related_staff', $_GET['location_id'] ), $staff_to_exclude );
	if ( empty( $args['post__in'] ) ) {
		$args['post__in'] = [false];
	}
}

if ( isset( $_GET['staff_name'] ) && $_GET['staff_name'] != 'Staff Name' ) {
	$args['s'] = $_GET['staff_name'];
}

if ( isset( $_GET['speciality_id'] ) && $_GET['speciality_id'] != 0 ) {
	$args['tax_query'] = [
		[
			'taxonomy' => 'crb_staff_speciality',
			'field' => 'term_id',
			'terms' => $_GET['speciality_id']
		]
	];
}

$staff_loop = new WP_Query( $args );
?>
<section class="section-base section-staff">
	<div class="shell">
		<div class="employees">
			<?php if ( ! $staff_loop->have_posts() ) : ?>
				<div class="employees__not-found"><?php echo 'No results found with that search. Please try a new search.'; ?></div>
			<?php endif; ?>

			<ul>
				<?php while ( $staff_loop->have_posts() ) : $staff_loop->the_post(); ?>
					<li class="single-employee">

						<div class="employee">
							<a class="employee__link" href="<?php the_permalink(); ?>"></a>
							
							<div class="employee__image" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>);">
							</div><!-- /.employee__image -->

							<div class="employee__content">
								<div class="employee__entry">
									<h5><?php the_title(); ?></h5>

									<?php
									$staff = [
										'subtitle' => esc_html( carbon_get_the_post_meta( 'crb_staff_subtitle' ) ),
										'info' => esc_html( carbon_get_the_post_meta( 'crb_staff_info' ) ),
									];
									?>
									
									<?php if ( ! empty( $staff['subtitle'] ) ) : ?>
										<h6><?php echo $staff['subtitle']; ?></h6>
									<?php endif; ?>
									
									<?php if ( ! empty( $staff['info'] ) ) : ?> 
										<p>	
											<?php echo $staff['info']; ?>
										</p>
									<?php endif; ?>

									<?php
									$locations_association = crb_get_columns_from_association( 'crb_location_related_staff', get_the_ID() );
									?>
									<?php if ( ! empty( $locations_association ) ) : ?>
										<ul>
											<?php foreach( $locations_association as $location_association ) : ?>
												<?php $location = get_the_title( absint( $location_association['id'] ) ); ?>
												<li>
													<i class="fa fa-map-marker"></i>
													<?php echo $location; ?>
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