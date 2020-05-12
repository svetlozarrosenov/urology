<?php
add_action( 'wp_ajax_crb_ajax_reset_physicians_filter', 'crb_ajax_reset_physicians_filter' );
add_action( 'wp_ajax_nopriv_crb_ajax_reset_physicians_filter', 'crb_ajax_reset_physicians_filter' );
function crb_ajax_reset_physicians_filter() {  
	
	if ( ! $_GET['reset'] ) {
		return;
	}

	ob_start();
 	crb_render_fragment( 'all-physicians/locations-filter' );
 	$locations_filter = ob_get_clean();

 	ob_start();
	crb_render_fragment( 'all-physicians/physicians-filter' ); 
	$physicians_filter = ob_get_clean();

  	wp_send_json_success( [
        'filters' => [
        	'locations_filter' => $locations_filter,
        	'physicians_filter' => $physicians_filter
        ],
  	] );
}
