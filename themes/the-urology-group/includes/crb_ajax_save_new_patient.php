<?php
add_action( 'wp_ajax_crb_ajax_save_new_patient', 'crb_ajax_save_new_patient' );
add_action( 'wp_ajax_nopriv_crb_ajax_save_new_patient', 'crb_ajax_save_new_patient' );
function crb_ajax_save_new_patient() {  
	
	$post_id = wp_insert_post( array(
		'post_type' => 'crb_patient',
		'post_status' => 'publish',
		'post_title' => crb_get_patient_title( $_POST['patient']['age'], $_POST['patient']['gender'] ),
	) );

	$symptoms_ids = crb_get_term_ids( $_POST['patient']['selectedSymptoms'] );

	wp_set_object_terms( $post_id, $symptoms_ids, 'crb_condition_symptom' );

  	wp_send_json_success( [
        'patient' => $_POST['patient']['selectedSymptoms'],
        'symptoms_ids' => $symptoms_ids
  	] );
}
