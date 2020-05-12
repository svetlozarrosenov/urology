<?php
$posts_per_page = ! empty( $section['newsletters_per_page'] ) ? $section['newsletters_per_page'] : get_option( 'posts_per_page' );

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$newsletters_loop = new WP_Query( array(
	'post_type' => 'crb_newsletter',
	'posts_per_page' => $posts_per_page,
	'paged' => $paged
) );

if ( ! $newsletters_loop->have_posts() ) {
	return;
}

crb_render_fragment( 'common/blog-loop', [
	'loop' => $newsletters_loop,
	'paged' => $paged
] );
?>