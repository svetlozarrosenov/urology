<?php 
$care_area_ids = crb_get_association_ids( $section['care_areas'] );
$care_area_loop = new WP_Query( array(
	'post_type' => 'crb_care_area',
	'posts_per_page' => -1,
	'post__in' => $care_area_ids,
	'orderby' => 'post__in'
) );

crb_render_fragment( 'common/care-or-conditions', [
	'section' => $section,
	'loop' => $care_area_loop
] );