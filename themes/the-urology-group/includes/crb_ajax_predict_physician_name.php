<?php
add_action( 'wp_ajax_crb_ajax_predict_physician_name', 'crb_ajax_predict_physician_name' );
add_action( 'wp_ajax_nopriv_crb_ajax_predict_physician_name', 'crb_ajax_predict_physician_name' );
function crb_ajax_predict_physician_name() {  
	$physicians_loop = new WP_Query( array(
		'post_type' => 'crb_physician',
		'posts_per_page' => get_option( 'posts_per_page' ),
		's' => $_GET['s'],
		'search_by_title_only' => true
	) );
 	
 	$physician_names = [];

 	if ( $physicians_loop->have_posts() ) {
 		while ( $physicians_loop->have_posts() ) {
 			$physicians_loop->the_post();

 			$physician_names[get_the_ID()] = get_the_title();
 		}
 	}

  	wp_send_json_success( [
        'names' => $physician_names,
  	] );
}
