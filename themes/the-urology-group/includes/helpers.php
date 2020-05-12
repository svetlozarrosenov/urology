<?php
function crb_esc_phone_number( $number ) {
	$checked_number = preg_replace( '/([^\d])/' , '', $number );

	return $checked_number;
}

function crb_get_association_ids( $association ) {
	$ids = [];
	if ( empty( $association ) ) {
		return [false];
	}

	foreach ( $association as $item ) {
		$ids[] = $item['id'];
	}

	return $ids;
}

function crb_the_sections( $fields, $path = NULL, $menu_item_id = false ) {

	$sections = carbon_get_the_post_meta( $fields );

	if ( is_tax( 'crb_care_area_condition' ) ) {
		$sections = carbon_get_term_meta( get_queried_object_id(), 'crb_care_area_condition_fields' );
	}

	if ( $menu_item_id ) {
		$sections = carbon_get_nav_menu_item_meta( $menu_item_id, $fields );
	}

	if ( ! $path ) {
		$path = 'common/';
	} else {
		$path .= '/';
	}

	$common_types = [
		'intro',
		'boxes',
		'featured-story',
		'callout',
		'testimonials'
	];
	
	if ( empty( $sections ) ) {
		return;
	}

	$old_path = $path;
	foreach ( $sections as $index => $section ) {

		if ( in_array($section['_type'], $common_types ) ) {
			$path = 'common/';
		}
		
		crb_render_fragment( $path . $section['_type'], [
			'section' => $section,
		] );

		$path = $old_path;
	}
}

function crb_get_class_on_iteration( $args ) {
	if ( empty( $args ) ) {
		return false;
	}
	if ( $args['iteration'] === $args['index'] ) {
		return $args['class'];
	}
	return false;
}

function crb_get_boxes() {
	$boxes = carbon_get_theme_option( 'crb_boxes' );
	foreach ( $boxes as &$box ) {
		if ( $box['_type'] === 'find-location' ) {
			$box['form_link'] = get_page_url_by_template('locations');
		}
		if ( $box['_type'] === 'find-physician' ) {
			$box['form_link'] = get_page_url_by_template('all-physicians');
		}
	}

	return $boxes;
}

function get_page_url_by_template( $template_name, $id = false ) {
	$pages = get_pages(array(
	    'meta_key' => '_wp_page_template',
	    'meta_value' => 'templates/' . $template_name . '.php',
	    'hierarchical' => 0
	) );

	if ( empty( $pages ) ) {
		return false;
	}

	if ( ! $id ) {
		return get_permalink( $pages[0]->ID );
	}
	return $pages[0]->ID;
}

function crb_get_letters( $conditions ) {
	$letters = [
		[
			'letter' => 'A',
		],
		[
			'letter' => 'B',
		],
		[
			'letter' => 'C',
		],
		[
			'letter' => 'D',
		],
		[
			'letter' => 'E',
		],
		[
			'letter' => 'F',
		],
		[
			'letter' => 'G',
		],
		[
			'letter' => 'H',
		],
		[
			'letter' => 'I',
		],
		[
			'letter' => 'J',
		],
		[
			'letter' => 'K',
		],
		[
			'letter' => 'L',
		],
		[
			'letter' => 'M',
		],
		[
			'letter' => 'N',
		],
		[
			'letter' => 'O',
		],
		[
			'letter' => 'P',
		],
		[
			'letter' => 'Q',
		],
		[
			'letter' => 'R',
		],
		[
			'letter' => 'S',
		],
		[
			'letter' => 'T',
		],
		[
			'letter' => 'U',
		],
		[
			'letter' => 'V',
		],
		[
			'letter' => 'W',
		],
		[
			'letter' => 'X',
		],
		[
			'letter' => 'Y',
		],
		[
			'letter' => 'Z',
		],
	];	

	foreach ( $letters as &$letter ) {
		$letter['class'] = 'disabled';
	}

	$index = -1;
	foreach ( $conditions as $condition ) {
		$index = crb_in_array( strtoupper( mb_substr( $condition['title'], 0, 1) ), $letters );

		if ( $index > -1 ) {
			$letters[$index]['class'] = '';
		} 
	}
	
	return $letters;
}

function crb_in_array( $searched_letter, $array_with_letters ) {
	foreach ( $array_with_letters as $index => $letter ) {

		if ( $searched_letter == $letter['letter'] ) {
			return $index;
		}

	}
	return false;
}

function crb_get_conditions() {
	$conditions = [];

	$conditions_loop = new WP_Query( array(
		'post_type' => 'crb_condition',
		'posts_per_page' => 200,
	) );

	if ( ! $conditions_loop->have_posts() ) {
		return;
	}

	while ( $conditions_loop->have_posts() ) {
		$conditions_loop->the_post();

		$conditions[] = [
			'title' => get_the_title(),
			'excerpt' => get_the_excerpt(),
			'permalink' => get_the_permalink(),
		];
	}
	wp_reset_postdata(); 

	return $conditions;
}

function crb_get_conditions_id_title() {
	$conditions = [];

	$conditions_loop = new WP_Query( array(
		'post_type' => 'crb_condition',
		'posts_per_page' => 200,
	) );

	if ( ! $conditions_loop->have_posts() ) {
		return;
	}

	while ( $conditions_loop->have_posts() ) {
		$conditions_loop->the_post();

		$conditions[ get_the_ID() ] = get_the_title();
	}
	wp_reset_postdata(); 

	return $conditions;
}

function crb_the_category( $category = 'category', $echo = true ) {
	$terms = get_the_terms( get_the_ID(), $category );

	if ( ! $terms ) {
		return false;
	}
	$terms_titles = [];

	foreach ( $terms as $term ) {
		$terms_titles[] = $term->name;
	}
	
	if ( $echo ) {
		echo implode( ', ', $terms_titles );
	}
	return $terms_titles;
}

function crb_get_positions($maps) {
	$locations = [];
	foreach ( $maps as $map ) {
		if ( ! isset( $map['name'] ) ) {
			$map['name'] = 'location';
		}
		if ( ! isset( $map['id'] ) ) {
			$map['id'] = 0;
		}
		$locations[] = [
			'lat' => $map['lat'],
			'lng' => $map['lng'],
			'name' => $map['name'],
			'id' => $map['id']
		];
	}

	$data = json_encode($locations);
	return $data;
}

function crb_get_physicians_select() {
	$physicians_loop = new WP_query( array(
		'post_type' => 'crb_physician',
		'posts_per_page' => -1,
	) );
	if ( ! $physicians_loop->have_posts() ) {
		return [];
	}
	$options = [];
	while ( $physicians_loop->have_posts() ) {
		$physicians_loop->the_post();
		$options[ get_the_ID() ] = get_the_title();
	}

	wp_reset_postdata();

	return $options;
}

function crb_get_related_ids_from_association( $meta_key, $post_id=false, $limit_number=false, $return = false ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}


	if ( is_array( $post_id ) ) {
		$posts_ids = implode(", ",$post_id);
		$meta_value_clause = " AND meta_value IN ({$posts_ids})";
	} else {
		$meta_value_clause = " AND meta_value = {$post_id}";
	}

	$limit = '';
	if ( $limit_number ) {
		$limit = 'LIMIT ' .  $limit_number;
	}

	global $wpdb;
	$sql = "SELECT * FROM {$wpdb->prefix}postmeta WHERE meta_key like '_{$meta_key}|||%|id' $meta_value_clause $limit";
	$post_ids = $wpdb->get_results( $sql, ARRAY_A );

	$ids = [];

	if ( $return ) {
		return $post_ids;
	}

	foreach ( $post_ids as $post ) {
		$ids[] = $post['post_id'];
	}
	
	return $ids;
}

function crb_get_columns_from_association( $meta_key, $post_id=false ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}
	global $wpdb;
	$results = $wpdb->get_results( "SELECT p.post_title, p.ID FROM {$wpdb->prefix}postmeta AS pm INNER JOIN {$wpdb->prefix}posts as p on p.ID = pm.post_id WHERE meta_key like '_{$meta_key}|||%|id' AND pm.meta_value = {$post_id} AND p.post_status = 'publish'", ARRAY_A );
	$posts = [];

	foreach ( $results as $result ) {
		$posts[] = [
			'title' => $result['post_title'],
			'id' => $result['ID'],
		];
	}
	
	return $posts;
}

function crb_get_ids_related_to_post( $meta_key, $post_id ) {
	if ( empty( $post_id ) ) {
		return [];
	}
	global $wpdb;
	$post_ids = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}postmeta WHERE meta_key like '_{$meta_key}|||%|id' AND post_id = {$post_id}", ARRAY_A );
	$ids = [];
	foreach ( $post_ids as $post ) {
		$ids[] = $post['meta_value'];
	}
	
	if ( empty( $ids ) ) {
		return [false];
	}
	return $ids;
}

function crb_get_value_from_group( $args ) {
	foreach ( $args['groups'] as &$group ) {
		if ( $group['_type'] === $args['type'] ) {
			if ( ! isset( $group[ $args['value'] ] ) ) {
				return false;
			}
			if ( isset( $args['id'] ) ) {
				$group[$args['value']]['id'] = $args['id'];
			}

			return $group[ $args['value'] ];
		}
	}
	return false;
}

function crb_get_maps( $locations_loop ) {
	
	if ( ! $locations_loop->have_locations() ) {
		return $maps;
	}

	foreach ( $locations_loop->get_locations() as $single_location ) {
		$location = [
			'map' => carbon_get_post_meta( $single_location->ID, 'crb_location_map' ),
		];
		
		$location['map']['id'] = $single_location->ID;

		$maps[] = $location['map'];

	} 
	
	return $maps;
}

function crb_get_distances() {
	return [
		2 => 'Distance',
		5 => 5, 
		10 => 10, 
		20 => 20, 
		50 => 50, 
		100 => 100, 
		200 => 200, 
		500 => 500
	];
}

function crb_get_locations() {
	$locations = [];
	$locations_loop = new WP_Query( array(
		'post_type' => 'crb_location',
		'posts_per_page' => 100,
	) );

	if ( ! $locations_loop->have_posts() ) {
		return;
	}

	while ( $locations_loop->have_posts() ) {
		$locations_loop->the_post();
		
		$locations[ get_the_ID() ] = get_the_title();
	}

	wp_reset_postdata();
	return $locations;
}

function crb_get_cpt_id_title( $cpt_name ) {
	$cpt = [];
	$cpt_loop = new WP_Query( array(
		'post_type' => $cpt_name,
		'posts_per_page' => -1,
	) );

	if ( ! $cpt_loop->have_posts() ) {
		return;
	}

	while ( $cpt_loop->have_posts() ) {
		$cpt_loop->the_post();
		
		$cpt[ get_the_ID() ] = get_the_title();
	}

	wp_reset_postdata();
	return $cpt;
}

function crb_get_conditions_orderby_number_of_symptoms_related( $term_ids, $condition_types ) {

	global $wpdb;
	$sql = "SELECT * FROM (SELECT p.ID, p.post_title, p.post_content, p.post_excerpt, tm.term_id as term_id, COUNT(tmr.term_taxonomy_id) as totalTermsMatched FROM $wpdb->posts AS p INNER JOIN $wpdb->term_relationships AS tmr on tmr.object_id = p.ID INNER JOIN $wpdb->terms as tm on tm.term_id = tmr.term_taxonomy_id WHERE p.post_type = 'crb_condition' AND tmr.term_taxonomy_id in ({$term_ids}) GROUP BY p.ID ORDER BY totalTermsMatched DESC) AS selectBySymptoms INNER JOIN $wpdb->term_relationships as tmr on tmr.object_id = selectBySymptoms.ID WHERE tmr.term_taxonomy_id in ({$condition_types}) GROUP BY selectBySymptoms.ID ORDER BY selectBySymptoms.totalTermsMatched DESC";

	$conditions = $wpdb->get_results( $sql, ARRAY_A );
	
	foreach ( $conditions as &$condition ) {
		$condition['thumbnail'] = get_the_post_thumbnail_url( $condition['ID'], 'full' );
		$condition['permalink'] = get_permalink( $condition['ID'] );
	}

	return $conditions;
}

function crb_get_patient_title($age, $gender) {
	$terms = get_terms( array(
		'include' => $gender
	) );
	$term_names = [];
	foreach ( $terms as $term ) {
		$term_names[] = $term->name;
	}

	return date( 'Y-m-d' ) . ', ' . $age . ', ' . implode(', ', $term_names);
}

function crb_get_term_ids( $terms ) {
	if ( empty( $terms ) ) {
		return [];
	}

	$term_ids = [];
	foreach ( $terms as $term ) {
		$term_ids[] = absint( $term['term_id'] );
	}

	return $term_ids;
}

function crb_convert_date_string_to_another_format( $date_string, $format='l, F j, Y' ) {
	if ( ! crb_string_is_date( $date_string ) ) {
		return false;
	}

	$old_date_timestamp = strtotime( $date_string );

	return date($format, $old_date_timestamp);  
}

function crb_string_is_date( $string ) {
	if (DateTime::createFromFormat('Y-m-d', $string) !== FALSE) {
		return true;
	}
	return false;
}

function crb_str_replace_first( $from, $to, $content ) {

    $from = '/'.preg_quote($from, '/').'/';

    return preg_replace($from, $to, $content, 1);
}

function crb_get_event_past_dates() {
	global $wpdb;
	$sql = "SELECT DISTINCT YEAR(pm.meta_value) as past_year FROM $wpdb->posts AS p INNER JOIN $wpdb->postmeta AS pm on pm.post_id = p.ID  WHERE p.post_type = 'crb_event' AND pm.meta_key = '_crb_event_date' AND pm.meta_value < CURDATE()";

	$dates = $wpdb->get_results( $sql, ARRAY_A );
	
	return $dates;
}

function crb_get_all_positions() {
	$positions_loop = new WP_Query( array(
		'post_type' => 'crb_position',
		'posts_per_page' => -1,
	) );
	
	if ( !$positions_loop->have_posts() ) {
		return [];
	}

	$positions = [];
	while ( $positions_loop->have_posts() ) {
		$positions_loop->the_post();

		$positions[get_the_ID()] = get_the_title();
	}	
	wp_reset_postdata();

	return $positions;
}

function crb_get_positions_related_to_location_and_position_ids($position_id=false, $location_id=false) {
	$position_relation = '';
	$location_relation = '';

	if ( $position_id ) {
		$position_relation = " AND p.ID = {$position_id}";
	}

	if ( $location_id ) {
		$location_relation = " AND meta_key like '_crb_position_locations|||%|id' AND meta_value = {$location_id}";
	}


	global $wpdb;
	$sql = "SELECT DISTINCT p.ID FROM $wpdb->posts as p INNER JOIN $wpdb->postmeta as pm on pm.post_id = p.ID WHERE p.post_type = 'crb_position' $location_relation $position_relation";

	$results = $wpdb->get_results( $sql, ARRAY_A );

	$ids = [];
	foreach ( $results as $result ) {
		$ids[] = $result['ID'];
	}

	return $ids;
}

function crb_get_list_of_care_areas_which_have_videos( $care_area_id = false ) {
	global $wpdb;

	$where = "";
	
	if ( $care_area_id ) {
		$where = " WHERE p.ID = {$care_area_id}";
	}
	$sql = "SELECT p.post_title as care_area_title, p.ID as care_area_id FROM ( SELECT DISTINCT pm.meta_value  FROM $wpdb->posts as p INNER JOIN $wpdb->postmeta as pm on pm.post_id = p.ID WHERE p.post_type = 'crb_video' AND p.post_status = 'publish' AND pm.meta_key like '_crb_video_care_area|||%|id' ) AS ca INNER JOIN $wpdb->posts as p on p.ID = ca.meta_value $where";

	$results = $wpdb->get_results( $sql, ARRAY_A );

	
	return $results;
}

function crb_get_filtered_videos( $care_area_id ) {
	global $wpdb;

	$sql = "SELECT p.ID as video_id, p.post_title as title, pm.meta_value as care_area_id FROM $wpdb->posts as p INNER JOIN $wpdb->postmeta as pm on pm.post_id = p.ID WHERE p.post_type = 'crb_video' AND p.post_status = 'publish' AND pm.meta_key like '_crb_video_care_area|||%|id' AND meta_value = $care_area_id";

	$results = $wpdb->get_results( $sql, ARRAY_A );

	return $results;
}

function crb_get_videos_without_care_areas() {
	global $wpdb;

	$sql = "SELECT DISTINCT p.ID as video_id, p.post_title as title FROM $wpdb->posts as p INNER JOIN $wpdb->postmeta as pm on pm.post_id = p.ID WHERE p.post_type = 'crb_video' AND p.post_status = 'publish' AND pm.meta_key LIKE '_crb_video_care_area|||0|_empty'";

	$results = $wpdb->get_results( $sql, ARRAY_A );

	return $results;
}

function crb_get_loop_ids( $loop ) {
	if ( ! $loop->have_posts() ) {
		return [];
	}
	$options = [];
	while ( $loop->have_posts() ) {
		$loop->the_post();
		$options[] = get_the_ID();
	}

	wp_reset_postdata();

	return $options;
}

function nl2p($string) {
	$string_parts = explode("\n", $string);
	$string = '<p>' . implode('</p><p>', $string_parts) . '</p>';	
	return str_replace("<p></p>", '', $string);	
}

function crb_get_post_type_by_meta_value( $post_type, $meta_key, $meta_val, $return ) {
	global $wpdb;

	$sql = "SELECT $return FROM $wpdb->posts as p INNER JOIN $wpdb->postmeta as pm on pm.post_id = p.ID WHERE p.post_type = '$post_type' AND p.post_status = 'publish' AND pm.meta_key like '$meta_key' AND meta_value = '$meta_val'";

	$results = $wpdb->get_results( $sql, ARRAY_A );

	$filtered_results = [];
	foreach ( $results as $result ) {
		$filtered_results[] = $result[ $return ];
	}

	return $filtered_results;
}

function crb_remove_from_array( $array, $values_to_check ) {
	foreach ( $array as $key => &$val ) {
		foreach ( $values_to_check as &$val_to_check ) {
			if ($val == $val_to_check) {
				unset($array[$key]);
			}
		}
	}
	return $array;
}

function crb_get_ids_related_to_post_type( $meta_key, $post_type, $return = 'ID' ) {
	global $wpdb;

	$sql = "SELECT $return FROM {$wpdb->prefix}postmeta as pm 
	INNER JOIN $wpdb->posts as p on p.ID = pm.post_id
	WHERE pm.meta_key like '_{$meta_key}|||%|id' AND p.post_type = '$post_type' AND p.post_status = 'publish'";
	
	$results = $wpdb->get_results( $sql, ARRAY_A );
	
	if ( ! empty( $results ) && $return === 'ID' ) {
		$ids = [];
		foreach ( $results as $result ) {
			$ids[] = $result['ID'];
		}
		return $ids;
	}
	return $results;
}

function crb_get_get_physicians_and_staff_ordered_by_last_name( $ids_to_be_excluded, $ids_to_be_included = false ) {
	global $wpdb;

	if ( is_array( $ids_to_be_included ) && ! count( $ids_to_be_included ) ) {
		$ids_to_be_included = false;
	}

	if ( ! empty( $ids_to_be_included ) ) {
		$ids = implode(', ', $ids_to_be_included );
		$ids_to_be_included = "AND pm.post_id IN($ids)";
	}

	$ids_to_be_excluded = implode(', ', $ids_to_be_excluded );
	$sql = "SELECT p.post_title as name, p.ID FROM $wpdb->postmeta as pm 
	INNER JOIN $wpdb->posts as p on p.ID = pm.post_id
	WHERE ( pm.meta_key like '_crb_staff_last_name' OR pm.meta_key like '_crb_physician_last_name' ) AND ( p.post_type = 'crb_physician' OR p.post_type = 'crb_staff' ) AND p.post_status = 'publish' AND pm.post_id NOT IN ( $ids_to_be_excluded ) $ids_to_be_included ORDER BY pm.meta_value";

	$results = $wpdb->get_results( $sql, ARRAY_A );

	return $results;
}