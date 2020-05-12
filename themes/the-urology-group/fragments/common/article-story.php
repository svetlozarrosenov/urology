<?php
if ( empty( $stories_loop ) || ! $stories_loop->have_posts() ) {
	return;
}
?>
<section class="section-stories section-base">
	<div class="shell">
		<div class="section__content">
			<div class="articles-stories">
				<ol>
					<?php while ( $stories_loop->have_posts() ) : $stories_loop->the_post(); ?>
						<li>
							<div class="article-story">
								<?php if ( has_post_thumbnail() ) : ?>
									<div class="article__image" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>);">
										<a href="<?php the_permalink(); ?>"></a>
									</div><!-- /.article__image -->
								<?php endif; ?>
								
								<div class="article__content entry">
									<h4>
										<a href="<?php the_permalink(); ?>">
											<?php the_title(); ?>
										</a>
									</h4>

									<p>
										<?php the_excerpt(); ?>
									</p>

									<div class="article__actions">
										<a href="<?php the_permalink(); ?>" class="btn btn--outline">
											<?php _e( 'Read More', 'crb' ); ?>
										</a>
									</div><!-- /.article__actions -->
								</div><!-- /.article__content -->
							</div><!-- /.article-story -->
						</li>
					<?php endwhile; ?>
					
					<?php wp_reset_postdata(); ?>
				</ol>
			</div><!-- /.articles-stories -->
		</div><!-- /.section__content -->
	</div><!-- /.shell -->
</section><!-- /.section-stories -->