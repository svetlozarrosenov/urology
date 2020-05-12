<?php
if ( ! array_filter( $section ) ) {
	return;
}
$location_loop = new WP_Query( array(
	'post_type' => 'crb_location',
	'posts_per_page' => 1,
	'post__in' => [ $section['location'] ],
) );

if ( ! $location_loop->have_posts() ) {
	return;
}
?>
<div class="nav-col nav-col--2of3">
	<?php if ( ! empty( $section['title'] ) ) : ?>
		<p class="nav-title"><?php echo esc_html( $section['title'] ); ?></p>
	<?php endif; ?>
	
	<?php while ( $location_loop->have_posts() ) : $location_loop->the_post(); ?>
		<div class="banner" style="background-image: url(<?php echo wp_get_attachment_image_url( $section['image'], 'full' ); ?>);">
			<a class="banner__link" href="<?php the_permalink(); ?>"></a>

			<a href="<?php the_permalink(); ?>" class="banner__content">
				<h6>
					<?php the_title(); ?>
				</h6>
				
				<?php
				$map = carbon_get_the_post_meta( 'crb_location_map' );
				?>
				<?php if ( ! empty( $map ) ) : ?>
					<p>
						<?php echo esc_html( $map['address'] ); ?>
					</p>
				<?php endif; ?>

				<p>
					<a class="get-directions" href="https://www.google.com/maps?q=<?php echo esc_html( $map['address'] ); ?>" target="_blank"><?php _e( 'Get Directions' ); ?></a>
				</p>
			</a><!-- /.banner__content -->
		</div><!-- /.banner -->
	<?php endwhile; ?>

	<?php wp_reset_postdata(); ?>
</div><!-- /.nav-dd-col-/-1of3 -->