<?php
if ( isset( $section ) ) {
	$featured_story = $section;
}
if ( empty( $featured_story ) ) {
	return;
}

$class = '';
if ( empty( $featured_story['chosen_story'] ) ) {
	$class = 'section-story--alt';
}
$featured_story_loop = new WP_Query( array(
	'post_type' => 'crb_patient_story',
	'posts_per_page' => 1,
	'post__in' => crb_get_association_ids( $featured_story['chosen_story'] )
) );
?> 
<section class="section-story <?php echo $class; ?> section-base" style="background-image: url(<?php echo wp_get_attachment_image_url( $featured_story['image'], 'full' ); ?>);">
	<?php if ( $featured_story_loop->have_posts() && ! empty( $featured_story['chosen_story'] ) ) : ?>
		<?php while ( $featured_story_loop->have_posts() ) : $featured_story_loop->the_post(); ?>
			<?php
			$subtitle = esc_html( carbon_get_the_post_meta( 'crb_patient_story_subtitle' ) );
			?>
			<div class="section__inner">
				<div class="shell">
					<div class="section__body entry">
						<h2><?php the_title(); ?></h2>
						
						<?php if ( ! empty( $subtitle ) ) : ?>
							<h5><?php echo esc_html( $subtitle ); ?></h5>
						<?php endif; ?>

						<p>
							<?php the_excerpt(); ?>
						</p>

						<a href="<?php the_permalink(); ?>" class="btn btn--outline">
							<?php _e( 'Read More', 'crb' ); ?>
						</a>
					</div><!-- /.section__body -->
				</div><!-- /.shell -->
			</div><!-- /.section__inner -->
		<?php endwhile; ?>

		<?php wp_reset_postdata(); ?>
	<?php endif; ?>
	
	<?php if ( ! empty( $featured_story['title'] ) || ! empty( $featured_story['image'] ) || ! empty( $featured_story['subtitle'] ) || ! empty( $featured_story['link'] ) ) : ?>
		<div class="section__bar">
			<div class="shell">
				<?php if ( ! empty( $featured_story['title'] ) ) : ?>
					<aside class="section__aside">
						<h2>
							<?php echo nl2br( esc_html( $featured_story['title'] ) ); ?>
						</h2>
					</aside><!-- /.section__aside -->
				<?php endif; ?>

				<div class="section__content entry">
					<?php if ( ! empty( $featured_story['subtitle'] ) ) : ?>
						<p>
							<?php echo esc_html( $featured_story['subtitle'] ); ?>
						</p>
					<?php endif; ?>
					
					<?php if ( ! empty( $featured_story['btn_label'] ) || ! empty( $featured_story['btn_link'] ) ) : ?>
						<a href="<?php echo esc_url( $featured_story['btn_link'] ); ?>" class="links-all">
							<?php echo esc_html( $featured_story['btn_label'] ); ?>
						</a>
					<?php endif; ?>

					<a href="<?php echo esc_url( $featured_story['btn_link'] ); ?>" class="btn-more"></a>
				</div><!-- /.section__content -->
			</div><!-- /.shell -->
		</div><!-- /.section__bar -->
	<?php endif; ?>
</section><!-- /.section-story -->