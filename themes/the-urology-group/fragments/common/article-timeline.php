<?php
$permalink = get_the_permalink();
$attachment_id = false;
$attachment_id = carbon_get_the_post_meta( 'crb_news_file' );
$target = '';
if ( $attachment_id ) {
	$permalink = wp_get_attachment_url($attachment_id);
	$target = 'target="_blank"';
}
?>
<div class="article-timeline">
	<div class="article__aside">
		<div class="article__meta">
			<p><?php the_time( 'F d, Y ' ); ?></p>
		</div><!-- /.article__meta -->
		
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="article__image" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>);">
				<a href="<?php echo $permalink; ?>" <?php echo $target; ?>></a>
			</div><!-- /.article__image -->
		<?php endif; ?>
	</div><!-- /.article__aside -->

	<div class="article__content">
		<h5>
			<a href="<?php echo $permalink; ?>" <?php echo $target; ?>><?php the_title(); ?></a>
		</h5>

		<p>
			<?php the_excerpt(); ?>
		</p>

		<a href="<?php echo esc_url( $permalink ); ?>" <?php echo $target; ?> class="btn btn--outline">
			<?php _e( 'Read More', 'crb' ); ?>
		</a>
	</div><!-- /.article__content -->
</div><!-- /.article-timeline -->