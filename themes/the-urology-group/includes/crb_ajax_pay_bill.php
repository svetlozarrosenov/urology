<?php
use App\PayBill;

add_action( 'wp_ajax_crb_ajax_pay_bill', 'crb_ajax_pay_bill' );
add_action( 'wp_ajax_nopriv_crb_ajax_pay_bill', 'crb_ajax_pay_bill' );

function crb_ajax_pay_bill() {  	
	$PayBill = PayBill::getInstance();

	$method = $_POST['method'];

	$response = $PayBill->$method();
 	
  	wp_send_json_success( [
        $response,
        'test' => '-'
  	] );
}
