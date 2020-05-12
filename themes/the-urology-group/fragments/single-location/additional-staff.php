<?php
$staff_ids = crb_get_association_ids( carbon_get_the_post_meta( 'crb_location_related_staff' ) );

$staff_loop = new WP_Query( array(
 	'post_type' => 'crb_staff',
 	'posts_per_page' => -1,
 	'post__in' => $staff_ids,
 	'orderby' => 'post__in',
) );
if ( !$staff_loop->have_posts() ) {
	return;
}
?>
<section class="section-base section-staff">
	<div class="shell">
		<div class="employees">
			<?php if ( ! empty( $section['title'] ) ) : ?>
				<h5><?php echo esc_html( $section['title'] ); ?></h5>
			<?php endif; ?>

			<ul>
				<?php while ( $staff_loop->have_posts() ) : $staff_loop->the_post(); ?>
					<li>
						<div class="employee">
							<div class="employee__image" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>);">
							</div><!-- /.employee__image -->

							<div class="employee__content">
								<div class="employee__entry">
									<h5><?php the_title(); ?></h5>
									
									<?php
									$subtitle = esc_html( carbon_get_the_post_meta( 'crb_physician_subtitle' ) );
									?>

									<?php if ( ! empty( $subtitle ) ) : ?>
										<h6><?php echo $subtitle; ?></h6>
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