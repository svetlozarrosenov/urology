<?php
$posts_loop = new WP_Query( array(
	'post_type' => 'post',
	'posts_per_page' => 3,
) );

if ( ! $posts_loop->have_posts() && empty( $section['title'] ) && empty( $section['btn_link'] ) ) {
	return;
}
?>
<section class="section-articles section-base">
	<div class="shell">
		<?php if ( ! empty( $section['title'] ) ) : ?>
			<header class="section__head">
				<h2><?php echo esc_html( $section['title'] ); ?></h2>
			</header><!-- /.section__head -->
		<?php endif; ?>

		<div class="section__content">
			<div class="articles">
				<ol>
					<?php while ( $posts_loop->have_posts() ) : $posts_loop->the_post(); ?>
						<li>
							<article class="article">
								<div class="article__body">
									<a href="<?php the_permalink(); ?>"></a>

									<div class="article__image" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>);"></div><!-- /.article__image -->

									<div class="article__content">
										<h5><?php the_title(); ?></h5>

										<?php the_excerpt(); ?>
									</div><!-- /.article__content -->
								</div><!-- /.article__body -->
							</article><!-- /.article -->
						</li>
					<?php endwhile; ?>

					<?php wp_reset_postdata(); ?>
				</ol>
			</div><!-- /.articles -->
		</div><!-- /.section__content -->
		
		<?php if ( ! empty( $section['btn_label'] ) && ! empty( $section['btn_link'] ) ) : ?>
			<footer class="section__foot">
				<a href="<?php echo esc_url( $section['btn_link'] ); ?>" class="btn btn--outline"><?php echo esc_html( $section['btn_label'] ); ?></a>
			</footer><!-- /.section__foot -->
		<?php endif; ?>
	</div><!-- /.shell -->
</section><!-- /.section-articles -->