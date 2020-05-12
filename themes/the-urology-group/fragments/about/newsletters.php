<?php
$newsletter_loop = new WP_Query( array(
	'post_type' => 'crb_newsletter',
	'posts_per_page' => ! empty( $posts_per_page ) ? $posts_per_page : get_option( 'posts_per_page' ),
) );
if ( ! $newsletter_loop->have_posts() ) {
	return;
}
?>
<div id="newsletters" class="section__group">
	<div class="shell">
		<h2>Newsletters</h2>

		<div class="articles-stories">
			<ol>
				<?php while ( $newsletter_loop->have_posts() ) : $newsletter_loop->the_post(); ?>
					<li><?php crb_render_fragment('common/article-story--blog') ?></li>
				<?php endwhile; ?>
			</ol>
		</div><!-- /.articles-stories -->

		<div class="section__group-actions">
			<p>
				<a href="<?php echo get_page_url_by_template( 'newsletters' ); ?>" class="btn"><?php _e( 'View All', 'crb' ); ?></a>
				<i class="fa fa-angle-double-right" aria-hidden="true"></i>
				<?php _e( 'Newsletters', 'crb' ); ?>
			</p>
		</div><!-- /.section__group-actions -->
	</div><!-- /.shell -->
</div><!-- /.section__group -->