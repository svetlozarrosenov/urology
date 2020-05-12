<?php
class Crb_Location_Query {
	private $api_key;
	private $center_map_lat;
	private $center_map_lng;
	private $address;
	private $radius;
	private $locations;
	private $founded_posts;
	private $sql;
	private $sticky_posts;
	private $sticky_exclude_statement;

	public function __construct( $args ) {
		$this->sticky_posts = $this->get_sticky_locations();

		$this->sticky_exclude_statement = $this->sticky_exclude_statement();

		if ( ! empty( $args['api_key'] ) ) {
			$this->api_key = $args['api_key'];
		}

		if ( ! empty( $args['address'] ) ) {
			$this->address = $args['address'];
		}

		if ( ! empty( $args['radius'] ) ) {
			$this->radius = $args['radius'];
		}

		$term_id = false;

		if ( isset( $args['term_id'] ) ) {
			$term_id = $args['term_id'];
		}

		if ( empty( $args['state'] ) ) {
			$this->get_locations_by_address($term_id);
		} else {
			$this->get_locations_by_state( $args['state'] );
		}
	}

	public function change_api_key( $api_key ) {
		$this->$api_key = $api_key;
	}

	private function get_sticky_locations() {
		global $wpdb;

		$select = '*';

		$this->sql = "SELECT $select FROM $wpdb->posts as p
			INNER JOIN $wpdb->postmeta as pm ON pm.post_id = p.ID
			WHERE p.post_type = 'crb_location' AND p.post_status = 'publish' AND pm.meta_key = '_crb_location_sticky' AND pm.meta_value = 'yes' ORDER BY p.post_title
		";

		$locations = $wpdb->get_results($this->sql);
		
		return $locations;
	}

	private function get_locations_by_address( $term_id ) {	

		global $wpdb;
		$term_id_query = '';
		$term_query_join = '';
		if ( $term_id ) {
			$term_id_query = ' AND tr.term_taxonomy_id = ' .  $term_id;
			$term_query_join = "INNER JOIN $wpdb->term_relationships as tr ON (tr.object_id = p.ID)";
		}

		if(!empty($this->address)) {
			if ($latlng = $this->geocode_address()) {
				$this->sql = "SELECT SQL_CALC_FOUND_ROWS *, ( 3959 * acos( cos( radians('{$latlng['lat']}') ) * cos( radians( a.lat ) ) * 
							cos( radians( a.lng ) - radians('{$latlng['lng']}') ) + sin( radians('{$latlng['lat']}') ) * 
							sin( radians( a.lat ) ) ) 
						) AS radius
				FROM (
					SELECT  p.*, pm_lat.meta_value-0.0 AS lat, pm_lng.meta_value-0.0 AS lng
					FROM $wpdb->posts p						
					LEFT JOIN $wpdb->postmeta AS pm_lat ON (p.ID=pm_lat.post_id AND pm_lat.meta_key='_crb_location_map|||0|lat')
					LEFT JOIN $wpdb->postmeta AS pm_lng ON (p.ID=pm_lng.post_id AND pm_lng.meta_key='_crb_location_map|||0|lng')
					$term_query_join
					WHERE p.post_status = 'publish' $term_id_query $this->sticky_exclude_statement
				) AS a
				HAVING radius < $this->radius
				ORDER BY radius ASC";
			}
		} else if ( empty($this->address) && ! empty( $term_id ) ) {
			$this->sql = "SELECT * FROM $wpdb->posts as p 
			INNER JOIN $wpdb->term_relationships as tr ON (tr.object_id = p.ID)
			WHERE p.post_type = 'crb_location' AND p.post_status = 'publish' $this->sticky_exclude_statement $term_id_query";
		} else {
			$this->sql = "SELECT * FROM $wpdb->posts as p WHERE p.post_type = 'crb_location' AND p.post_status = 'publish' $this->sticky_exclude_statement ORDER BY p.post_title";
		}

		$locations = $wpdb->get_results($this->sql);

		$this->founded_posts = $wpdb->get_var('SELECT FOUND_ROWS()');
		if ( empty( $locations ) ) {
			$this->founded_posts = false;
		}

		//Set the center coordinates of the map
		if ( ! empty( $latlng['lat'] ) && ! empty( $latlng['lng'] ) ) {
			$this->center_map_lat = $latlng['lat'];
			$this->center_map_lng = $latlng['lng'];
		}

		$this->locations = $locations;

		$this->prepend_in_array($this->locations, $this->sticky_posts);
	}

	private function geocode_address() {

		$webservice_url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . 
			urlencode($this->address) . "&key=" . $this->api_key;
		$result = wp_remote_get($webservice_url);

		if(!is_wp_error($result)) {
			$geocode = json_decode($result['body']);

			if ( empty( $geocode->results ) ) {
				return false;
			}

			$this->address = array();
			$this->address['lat'] = $geocode->results[0]->geometry->location->lat;
			$this->address['lng'] = $geocode->results[0]->geometry->location->lng;
			if($this->address['lat'] == null || $this->address['lng'] == null) {
			  return false;
			}

			return $this->address;
		}
		return false;
	}

	public function get_locations() {
		return $this->locations;
	}

	public function have_locations() {
		if ( $this->founded_posts ) {
			return true;
		}
		return false;
	}

	private function get_ids_from_sticky_posts() {
		if ( empty( $this->sticky_posts ) ) {
			return false;
		}

		$ids = [];
		foreach ( $this->sticky_posts as $sticky_post ) {
			$ids[] = $sticky_post->ID;
		}

		return $ids;
	}

	private function sticky_exclude_statement() {
		$sticky_ids = $this->get_ids_from_sticky_posts( $this->sticky_posts );

		if ( empty( $sticky_ids ) ) {
			return '';
		}

		$exclude = " AND p.ID NOT IN ( '" . implode( "', '" , $sticky_ids ) . "' )";
		return $exclude;
	}

	private function prepend_in_array(&$array, &$prepend_array) {
		foreach ( $prepend_array as $sticky_post ) {
			array_unshift( $array, $sticky_post );
		}

		$this->founded_posts = count($array);
	}

	public function get_locations_by_state( $state ) {
		global $wpdb;
		$this->sql = "SELECT SQL_CALC_FOUND_ROWS * FROM $wpdb->posts as p
		INNER JOIN $wpdb->term_relationships AS tmr on tmr.object_id = p.ID WHERE p.post_type = 'crb_location' AND p.post_status = 'publish' AND tmr.term_taxonomy_id = $state $this->sticky_exclude_statement";

		$locations = $wpdb->get_results($this->sql);
		
		$this->founded_posts = $wpdb->get_var('SELECT FOUND_ROWS()');

		$this->locations = $locations;

		$this->prepend_in_array($this->locations, $this->sticky_posts);
	} 
}