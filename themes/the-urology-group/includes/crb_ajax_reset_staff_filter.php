<?php
add_action( 'wp_ajax_crb_ajax_reset_staff_filter', 'crb_ajax_reset_staff_filter' );
add_action( 'wp_ajax_nopriv_crb_ajax_reset_staff_filter', 'crb_ajax_reset_staff_filter' );
function crb_ajax_reset_staff_filter() {  
	
	if ( ! $_GET['reset'] ) {
		return;
	}

	ob_start();
 	crb_render_fragment( 'staff/locations-filter' );
 	$locations_filter = ob_get_clean();

 	ob_start();
	crb_render_fragment( 'staff/staff-filter' ); 
	$staff_filter = ob_get_clean();

  	wp_send_json_success( [
        'filters' => [
        	'locations_filter' => $locations_filter,
        	'staff_filter' => $staff_filter
        ],
  	] );
}
