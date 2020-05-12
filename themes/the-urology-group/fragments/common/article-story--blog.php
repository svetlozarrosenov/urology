<div class="article-story article-story--blog">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="article__image" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>);">
			<a href="<?php the_permalink(); ?>"></a>
		</div><!-- /.article__image -->
	<?php endif; ?>

	<div class="article__content entry">
		<?php if ( ! is_singular( 'crb_event' ) ) : ?>
			<div class="article__meta">
				<p><?php the_time( 'F d, Y ' ); ?></p>
			</div><!-- /.article__meta -->
		<?php endif; ?>

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
