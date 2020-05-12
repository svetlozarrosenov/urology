<?php
$news_loop = new WP_Query( array(
	'post_type' => 'crb_news',
	'posts_per_page' => ! empty( $posts_per_page ) ? $posts_per_page : get_option( 'posts_per_page' ),
) );
if ( ! $news_loop->have_posts() ) {
	return;
}
?>
<div id="in-the-news" class="section__group">
	<div class="shell">
		<h2>In The News</h2>

		<div class="articles-stories">
			<ol>
				<?php while ( $news_loop->have_posts() ) : $news_loop->the_post(); ?>
					<li><?php crb_render_fragment('common/article-story--blog') ?></li>
				<?php endwhile; ?>
			</ol>
		</div><!-- /.articles-stories -->

		<div class="section__group-actions">
			<p>
				<a href="#" class="btn">View All</a>
				<i class="fa fa-angle-double-right" aria-hidden="true"></i>
				News Releases
			</p>
		</div><!-- /.section__group-actions -->
	</div><!-- /.shell -->
</div><!-- /.section__group -->