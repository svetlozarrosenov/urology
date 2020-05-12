<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$press_loop = new WP_Query( array(
	'post_type' => 'crb_press',
	'posts_per_page' => ! empty( $section['presses_per_page'] ) ? $section['presses_per_page'] : get_option( 'posts_per_page' ),
	'paged' => $paged
) );

if ( ! $press_loop->have_posts() ) {
	return;
}

crb_render_fragment( 'common/blog-loop', [
	'loop' => $press_loop,
	'paged' => $paged
] );
?>