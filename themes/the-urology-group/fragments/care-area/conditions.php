<?php 
$conditions_ids = crb_get_association_ids( carbon_get_the_post_meta( 'crb_care_area_conditions' ) );
$conditions_loop = new WP_Query( array(
	'post_type' => 'crb_condition',
	'posts_per_page' => -1,
	'post__in' => $conditions_ids,
	'orderby' => 'title',
	'order' => 'ASC'
) );

crb_render_fragment( 'common/care-or-conditions', [
	'section' => $section,
	'loop' => $conditions_loop
] );