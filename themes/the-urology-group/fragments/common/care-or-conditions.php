<?php
if ( ! array_filter( $section ) && ( ! isset( $loop ) || ! $loop->have_posts() ) ) {
	return;
}
$classes = [
	0,
	1,
	2,
	3,
	4,
	5,
];
if( is_front_page() ) {
	$classes = [
		'',
		'',
		'small',
		'small',
		'small',
		'large'
	];
}

$care_area_id = get_the_ID();
?>

<section class="section-base section-base--text-center">
	<div class="shell">
		<?php if ( ! empty( $section['title'] ) || ! empty( $section['subtitle'] ) || ! empty( $section['content'] ) ) : ?>
			<header class="section__head entry">
				<?php if ( ! empty( $section['title'] ) ) : ?>
					<h2><?php echo esc_html( $section['title'] ); ?></h2>
				<?php endif; ?>

				<?php if ( ! empty( $section['subtitle'] ) ) : ?>
					<h5><?php echo esc_html( $section['subtitle'] ); ?></h5>
				<?php endif; ?>

				<?php if ( ! empty( $section['content'] ) ) : ?>
					<p>
						<?php echo nl2p( esc_html( $section['content'] ) ); ?>
					</p>
				<?php endif; ?>
			</header><!-- /.section__head -->
		<?php endif; ?>

		<div class="section__content">
			<div class="services">
				<ul>
					<?php $index = 0; ?>

					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<li class="<?php echo $classes[$index++]; ?>">
							<div class="service" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>);">
								<a href="<?php echo get_the_permalink() . '?care_area_id=' . $care_area_id; ?>">
									<div class="service__head">
										<h3><?php the_title(); ?></h3>
									</div><!-- /.service__head -->

									<div class="service__content">
										<div class="service__entry">
											<h3><?php the_title(); ?></h3>

											<?php the_excerpt(); ?>
										</div><!-- /.service__entry -->
									</div><!-- /.service__content -->
								</a>
							</div><!-- /.service -->
						</li>
					<?php endwhile; ?>

					<?php wp_reset_postdata(); ?>
				</ul>
			</div><!-- /.services -->
		</div><!-- /.section__content -->
	</div><!-- /.shell -->
</section><!-- /.section-base -->
