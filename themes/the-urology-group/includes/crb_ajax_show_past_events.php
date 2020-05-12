<?php
add_action( 'wp_ajax_crb_ajax_show_past_events', 'crb_ajax_show_past_events' );
add_action( 'wp_ajax_nopriv_crb_ajax_show_past_events', 'crb_ajax_show_past_events' );
function crb_ajax_show_past_events() {  
	$compare = '<';
	$value = date( 'Y-m-d' );
	$posts_per_page = get_option( 'posts_per_page' );
	
	if ( ! empty( $_GET['compare'] ) ) {
		$compare = $_GET['compare'];
		$value = $_GET['year'];
	}

	if ( $_GET['compare'] == 'BETWEEN' ) {
		$compare = $_GET['compare'];
		$value = [ $_GET['year'], date( 'Y-m-d' ) ];
	}

	if ( ! empty( $_GET['posts_per_page'] ) ) {
		$posts_per_page = $_GET['posts_per_page'];
	}

	ob_start();
	crb_render_fragment( 'events/events-loop', [
		'posts_per_page' => $posts_per_page,
		'compare' => $compare,
		'value' => $value,
		'order' => 'DESC',
	] );
 	
 	$events = ob_get_clean();

  	wp_send_json_success( [
        'events' => $events,
  	] );
}
