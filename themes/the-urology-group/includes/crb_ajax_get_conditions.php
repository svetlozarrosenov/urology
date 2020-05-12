<?php
add_action( 'wp_ajax_crb_ajax_get_conditions', 'crb_ajax_get_conditions' );
add_action( 'wp_ajax_nopriv_crb_ajax_get_conditions', 'crb_ajax_get_conditions' );
function crb_ajax_get_conditions() {  

	$conditions = crb_get_conditions_orderby_number_of_symptoms_related( $_POST['symptoms_ids'], $_POST['conditions_types_ids'] );
 
  	wp_send_json_success( [
        'conditions' => $conditions,
  	] );
}
