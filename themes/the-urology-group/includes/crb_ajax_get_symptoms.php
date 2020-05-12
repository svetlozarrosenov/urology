<?php
add_action( 'wp_ajax_crb_ajax_get_symptoms', 'crb_ajax_get_symptoms' );
add_action( 'wp_ajax_nopriv_crb_ajax_get_symptoms', 'crb_ajax_get_symptoms' );
function crb_ajax_get_symptoms() {  

  	$symptoms = get_terms( array(
        'taxonomy' => 'crb_condition_symptom',
        'name__like' => $_POST['symptom'],
        'hide_empty' => false,
    ) );

  	wp_send_json_success( [
        'symptoms' => $symptoms,
  	] );
}
