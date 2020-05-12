<?php
namespace App;

class PayBill {
	private $invoiceNumber;

	private $format = '';

	private static $instance = null;

	public static function getInstance(){
        if (self::$instance === null) {
            self::$instance = new PayBill();
        }
        return self::$instance;
    }

	private function __construct() {

	}

	public function getInvoiceNumberFormat() {
		$this->invoiceNumber = $_POST['invoiceNumber'];

		if ( $this->isTUGFormat() ) {
			$this->format = 'TUG';
		}

		if ( $this->isTUCFormat() ) {
			$this->format = 'TUC';
		}

		return [
			'format' => $this->format
		];
	}

	public function isTUGFormat( $regex = '/^(1|2){1}([\d]){6}$/' ) {
		if ( preg_match( $regex, $this->invoiceNumber ) ) {
			return true;
		}

		return false;
	}

	public function isTUCFormat( $regex = '/^([\d]){5,6}$/' ) {
		if ( preg_match( $regex, $this->invoiceNumber ) ) {
			return true;
		}

		return false;
	}

	public function loadStates() {
		$locations = $this->getValueFromGroup('crb_default_page_fields', 'pay_bill_online', $_POST['locations']);
		
		$ids = $this->getAssociationIDs( $locations );
		
		$locationsLoop = new \WP_Query( array(
			'post_type' => 'crb_location',
			'posts_per_page' => 100,
			'post__in' => $ids
		) );

		$selectedLocations = [];

		while ( $locationsLoop->have_posts() ) {
			$locationsLoop->the_post();
			
			$currentLocationID = get_the_ID();

			$currentTerm = get_terms( array(
				'taxonomy' => 'crb_location_state',
				'object_ids' => $currentLocationID
			) );

			if ( ! empty( $currentTerm[0] ) ) {
				$currentTerm = $currentTerm[0]->name;
			} else {
				$currentTerm = '';
			}

			$args = [ 
				'id' => $currentLocationID,
				'title' => get_the_title(),
				'address' => carbon_get_the_post_meta('crb_location_address')
			];

			$selectedLocations[$currentTerm][] = $args;
		}
		 
		wp_reset_postdata();

		$selectedLocations = $this->separateInColumns( 5, $selectedLocations );

		return [
			'States' => $selectedLocations
		];
	}

	public function separateInColumns( $itemsInColumn, $multidinetionalArray ) {
		$column = 1;
		$index = 1;
		$newArray = [];
		foreach ( $multidinetionalArray as $key => &$array ) {
			foreach ( $array as &$val ) {
				if ( $index % ($itemsInColumn + 1) == 0 ) {
					$index = 0;
					$column++;
				}
				$newArray[ $column ][] = $val;

				$index++;
			}
			$column = 1;
			$multidinetionalArray[ $key ] = $newArray;
			$newArray = [];
		}
		
		return $multidinetionalArray;
	}

	public function getValueFromGroup( $group, $groupType, $searchedKey ) {
		$groups = carbon_get_post_meta( $_POST['pageID'], $group );
		
		$searchedGroup;
		$searchedVal;
		foreach ( $groups as $group ) {
			if ( $group['_type'] === $groupType ) {
				$searchedGroup = $group;
			}
		}

		foreach ( $searchedGroup as $key => $val ) {
			if ( $key ===  $searchedKey ) {
				$searchedVal = $val;
			}
		}

		return $searchedVal;
	}

	public function getAssociationIDs( $association ) {
		$ids = [];
		foreach ( $association as $val ) {
			$ids[] = $val['id'];
		}

		return $ids;
	}

	private function dd( $data ) {
		echo '<pre>';
		print_r( $data );exit;
	}
}