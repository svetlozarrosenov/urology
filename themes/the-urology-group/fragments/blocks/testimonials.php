<?php
if ( ! array_filter( $testimonials ) ) {
	return;
}

crb_render_fragment( 'common/testimonials', [
	'section' => [
		'title' => $testimonials['crb_block_testimonials_rotator_title'],
		'description' => $testimonials['crb_block_testimonials_rotator_description'],
		'shortcode' => $testimonials['crb_block_testimonials_rotator_shortcode'],
	]
] );