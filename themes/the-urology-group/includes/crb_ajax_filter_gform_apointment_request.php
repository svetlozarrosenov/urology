<?php
add_action( 'wp_ajax_crb_ajax_filter_gform_apointment_request', 'crb_ajax_filter_gform_apointment_request' );
add_action( 'wp_ajax_nopriv_crb_ajax_filter_gform_apointment_request', 'crb_ajax_filter_gform_apointment_request' );
function crb_ajax_filter_gform_apointment_request() {  
	if ( in_array('crb_physician', $_GET['post_type'] ) ) {
		if ( empty( $_GET['id'] ) ) {
			$_GET['id'] = [];
		} else {
			$id = $_GET['id'];
			$staff_ids = crb_get_related_ids_from_association( 'crb_staff_locations', $id );
			$physicians_ids = crb_get_ids_related_to_post( 'crb_location_related_physicians', $id );
			$_GET['id'] = array_merge( $staff_ids, $physicians_ids );
		}
	} else {
		if ( empty( $_GET['id'] ) ) {
			$_GET['id'] = [];
		} else {
			$locations_from_physicians = crb_get_related_ids_from_association( 'crb_location_related_physicians', $_GET['id'] );
			$locations_from_staff = crb_get_ids_related_to_post( 'crb_staff_locations', $_GET['id'] );

			if ( ! empty( $locations_from_staff[0] ) ) {
				$_GET['id'] = $locations_from_staff;
			} else {
				$_GET['id'] = $locations_from_physicians;
			}
			
		}
		
		$locations_loop = new WP_Query( array(
			'post_type' => 'crb_location',
			'posts_per_page' => 100,
			'post__in' => $_GET['id'],
			'orderby' => 'post__in',
		) );

		$options_loop = [];
		if ( $locations_loop->have_posts() ) {
			while ( $locations_loop->have_posts() ) {
				$locations_loop->the_post();
				$options_loop[] = [
					'ID' => get_the_ID(),
					'name' => get_the_title(),
				];
			}
			wp_reset_postdata();
		}
	}

	ob_start();
	crb_render_fragment( 'gform/select/options', [
		'id' => $_GET['id'],
		'post_type' => $_GET['post_type'],
		'first_option' => $_GET['first_option'],
		'second_option' => $_GET['second_option'],
		'selected_option' => $_GET['selected_option'],
		'options_loop' => $options_loop
	] );
 	$options = ob_get_clean();

  	wp_send_json_success( [
        'options' => $options,
        'id' => $_GET['id'],
        'post_type' => $_GET['post_type']
  	] );
}