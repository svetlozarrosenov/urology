<?php
add_action( 'wp_ajax_crb_ajax_filter_positions', 'crb_ajax_filter_positions' );
add_action( 'wp_ajax_nopriv_crb_ajax_filter_positions', 'crb_ajax_filter_positions' );
function crb_ajax_filter_positions() {  
	$args = [
		'post_type' => 'crb_position',
		'posts_per_page' => -1,
	];	

	if ( !empty( $_GET['position_id'] ) && !empty( $_GET['location_id'] ) ) {
		$args['post__in'] = crb_get_positions_related_to_location_and_position_ids($_GET['position_id'], $_GET['location_id']); 
		$args['orderby'] = 'post__in';
	} elseif ( ! empty( $_GET['position_id'] ) ) {
		$args['post__in'] = crb_get_positions_related_to_location_and_position_ids($_GET['position_id']); 
		$args['orderby'] = 'post__in';
	}elseif ( ! empty( $_GET['location_id'] ) ) {
		$args['post__in'] = crb_get_positions_related_to_location_and_position_ids( false, $_GET['location_id']); 
		$args['orderby'] = 'post__in';
	} 

	if ( isset( $args['post__in'] ) ) {
		if ( empty( $args['post__in'] ) ) {
			$args['post__in'] = [false];
		}
	}
	crb_render_fragment( 'about/positions/positions-loop', [
		'positions_loop' => new WP_Query( $args )
	] );

	$positions = ob_get_clean();
 
  	wp_send_json_success( [
        'positions' => $positions,
  	] );
}
