<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$news_loop = new WP_Query( array(
	'post_type' => 'crb_news',
	'posts_per_page' => ! empty( $section['news_per_page'] ) ? $section['news_per_page'] : get_option( 'posts_per_page' ),
	'paged' => $paged
) );

if ( ! $news_loop->have_posts() ) {
	return;
}

crb_render_fragment( 'common/blog-loop', [
	'loop' => $news_loop,
	'paged' => $paged
] );
?>