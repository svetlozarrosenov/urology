<?php
add_action( 'wp_ajax_crb_ajax_staff_filter', 'crb_ajax_staff_filter' );
add_action( 'wp_ajax_nopriv_crb_ajax_staff_filter', 'crb_ajax_staff_filter' );
function crb_ajax_staff_filter() {  	
	$ids = [];

	$json_success_args = array(
        'postType' => $_GET['post_type'],
  	);

	// Filter by staff
	if ( $_GET['post_type'] === 'crb_staff' ) {
		$ids = crb_get_ids_related_to_post( 'crb_location_related_staff', $_GET['id'] );	
		$specialities = '';
		
		$specialities_args = [
			'taxonomy' => 'crb_physician_speciality',
		];
		if ( $_GET['id'] != 0) {
			$specialities_args['object_ids'] = $ids;
		}

		ob_start(); 
		crb_render_fragment( 'staff/taxonomy-options', $specialities_args );
		$specialities = ob_get_clean();

		
		ob_start();
		crb_render_fragment( 'staff/options', [
			'post_type' => $_GET['post_type'],
			'ids' => $ids,
		] );

		$staff = ob_get_clean();

		$json_success_args['staff'] = $staff;
		$json_success_args['specialities'] = $specialities;
	}

	// Filter by locaions
	if ( $_GET['post_type'] === 'crb_location' ) {
		if ( empty( $_GET['id'] ) ) {
			$ids = crb_get_ids_related_to_post_type( 'crb_location_related_staff', 'crb_location', 'ID');
		} else  {
			$ids = crb_get_related_ids_from_association( 'crb_location_related_staff', $_GET['id'] );	
			if ( empty( $ids ) ) {
				$ids = [false];
			}
		}
		
		$specialities = '';
		
		$specialities_args = [
			'taxonomy' => 'crb_physician_speciality',
		];
		if ( $_GET['id'] != 0) {
			$specialities_args['object_ids'] = [$_GET['id']];
		}

		ob_start(); 
		crb_render_fragment( 'staff/taxonomy-options', $specialities_args );
		$specialities = ob_get_clean();

		
		ob_start();
		crb_render_fragment( 'staff/options', [
			'post_type' => $_GET['post_type'],
			'ids' => $ids,
		] );

		$locations = ob_get_clean();

		$json_success_args['locations'] = $locations;
		$json_success_args['specialities'] = $specialities;
	}
 	
  	wp_send_json_success( $json_success_args );
}
