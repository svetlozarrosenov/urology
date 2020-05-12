<?php
if ( ! array_filter( $section ) ) {
	return;
}
$condition_loop = new WP_Query( array(
	'post_type' => 'crb_condition',
	'posts_per_page' => 1,
	'post__in' => [ $section['condition'] ],
) );

if ( ! $condition_loop->have_posts() ) {
	return;
}
?>
<div class="nav-col nav-col--2of3">
	<?php if ( ! empty( $section['title'] ) ) : ?>
		<p class="nav-title"><?php echo esc_html( $section['title'] ); ?></p>
	<?php endif; ?>
	
	<?php while ( $condition_loop->have_posts() ) : $condition_loop->the_post(); ?>
		<div class="banner banner--condition" style="background-image: url(<?php echo wp_get_attachment_image_url( $section['image'], 'full' ); ?>);">
			<a href="<?php the_permalink(); ?>"></a>

			<div class="banner__content">
				<h6>
					<?php the_title(); ?>
				</h6>
				
				<p>
					<?php the_excerpt(); ?>
				</p>

				<p>
					<a class="links-all" href="<?php the_permalink(); ?>"><?php _e( 'Learn More' ); ?></a>
				</p>
			</div><!-- /.banner__content -->
		</div><!-- /.banner -->
	<?php endwhile; ?>

	<?php wp_reset_postdata(); ?>

	<?php if ( ! empty( $section['link'] ) && ! empty( $section['link_label'] ) ) : ?>
		<?php
		$class = '';
		if ( $section['important_link'] ) {
			$class = 'links-all';
		}
		?>
		<a href="<?php echo esc_url( $section['link'] ); ?>" class="<?php echo $class; ?>">
			<?php echo esc_html( $section['link_label'] ); ?>
		</a>
	<?php endif; ?>
</div><!-- /.nav-dd-col-/-1of3 -->