<?php

register_taxonomy(
	'crb_condition_symptom', # Taxonomy name
	array( 'crb_condition', 'crb_patient' ), # Post Types
	array( # Arguments
		'labels'            => array(
			'name'                       => __( 'Symptoms', 'crb' ),
			'singular_name'              => __( 'Symptom', 'crb' ),
			'search_items'               => __( 'Search Symptoms', 'crb' ),
			'popular_items'              => __( 'Popular Symptoms', 'crb' ),
			'all_items'                  => __( 'All Symptoms', 'crb' ),
			'view_item'                  => __( 'View Symptom', 'crb' ),
			'edit_item'                  => __( 'Edit Symptom', 'crb' ),
			'update_item'                => __( 'Update Symptom', 'crb' ),
			'add_new_item'               => __( 'Add New Symptom', 'crb' ),
			'new_item_name'              => __( 'New Symptom Name', 'crb' ),
			'separate_items_with_commas' => __( 'Separate Symptoms with commas', 'crb' ),
			'add_or_remove_items'        => __( 'Add or remove Symptoms', 'crb' ),
			'choose_from_most_used'      => __( 'Choose from the most used Symptoms', 'crb' ),
			'not_found'                  => __( 'No Symptoms found.', 'crb' ),
			'menu_name'                  => __( 'Symptoms', 'crb' ),
		),
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'crb-symptom' ),
	)
);

register_taxonomy(
	'crb_condition_type', # Taxonomy name
	array( 'crb_condition' ), # Post Types
	array( # Arguments
		'labels'            => array(
			'name'                       => __( 'Types', 'crb' ),
			'singular_name'              => __( 'Type', 'crb' ),
			'search_items'               => __( 'Search Types', 'crb' ),
			'popular_items'              => __( 'Popular Types', 'crb' ),
			'all_items'                  => __( 'All Types', 'crb' ),
			'view_item'                  => __( 'View Type', 'crb' ),
			'edit_item'                  => __( 'Edit Type', 'crb' ),
			'update_item'                => __( 'Update Type', 'crb' ),
			'add_new_item'               => __( 'Add New Type', 'crb' ),
			'new_item_name'              => __( 'New Type Name', 'crb' ),
			'separate_items_with_commas' => __( 'Separate Types with commas', 'crb' ),
			'add_or_remove_items'        => __( 'Add or remove Types', 'crb' ),
			'choose_from_most_used'      => __( 'Choose from the most used Types', 'crb' ),
			'not_found'                  => __( 'No Types found.', 'crb' ),
			'menu_name'                  => __( 'Types', 'crb' ),
		),
		'hierarchical'          => true,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'crb-symptom' ),
	)
);

register_taxonomy(
	'crb_physician_speciality', # Taxonomy name
	array( 'crb_physician', 'crb_staff' ), # Post Types
	array( # Arguments
		'labels'            => array(
			'name'                       => __( 'Specialities', 'crb' ),
			'singular_name'              => __( 'speciality', 'crb' ),
			'search_items'               => __( 'Search Specialities', 'crb' ),
			'popular_items'              => __( 'Popular Specialities', 'crb' ),
			'all_items'                  => __( 'All Specialities', 'crb' ),
			'view_item'                  => __( 'View speciality', 'crb' ),
			'edit_item'                  => __( 'Edit speciality', 'crb' ),
			'update_item'                => __( 'Update speciality', 'crb' ),
			'add_new_item'               => __( 'Add New speciality', 'crb' ),
			'new_item_name'              => __( 'New speciality Name', 'crb' ),
			'separate_items_with_commas' => __( 'Separate Specialities with commas', 'crb' ),
			'add_or_remove_items'        => __( 'Add or remove Specialities', 'crb' ),
			'choose_from_most_used'      => __( 'Choose from the most used Specialities', 'crb' ),
			'not_found'                  => __( 'No Specialities found.', 'crb' ),
			'menu_name'                  => __( 'Specialities', 'crb' ),
		),
		'show_in_rest' => true,
		'hierarchical'          => true,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'crb-speciality' ),
	)
);

register_taxonomy(
	'crb_physician_certificate', # Taxonomy name
	array( 'crb_physician', 'crb_staff' ), # Post Types
	array( # Arguments
		'labels'            => array(
			'name'                       => __( 'Certificates', 'crb' ),
			'singular_name'              => __( 'Certificate', 'crb' ),
			'search_items'               => __( 'Search Certificates', 'crb' ),
			'popular_items'              => __( 'Popular Certificates', 'crb' ),
			'all_items'                  => __( 'All Certificates', 'crb' ),
			'view_item'                  => __( 'View Certificate', 'crb' ),
			'edit_item'                  => __( 'Edit Certificate', 'crb' ),
			'update_item'                => __( 'Update Certificate', 'crb' ),
			'add_new_item'               => __( 'Add New Certificate', 'crb' ),
			'new_item_name'              => __( 'New Certificate Name', 'crb' ),
			'separate_items_with_commas' => __( 'Separate Certificates with commas', 'crb' ),
			'add_or_remove_items'        => __( 'Add or remove Certificates', 'crb' ),
			'choose_from_most_used'      => __( 'Choose from the most used Certificates', 'crb' ),
			'not_found'                  => __( 'No Certificates found.', 'crb' ),
			'menu_name'                  => __( 'Certificates', 'crb' ),
		),
		'show_in_rest' => true,
		'hierarchical'          => true,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'crb-certificate' ),
	)
);

register_taxonomy(
	'crb_location_type', # Taxonomy name
	array( 'crb_location' ), # Post Types
	array( # Arguments
		'labels'            => array(
			'name'                       => __( 'Types', 'crb' ),
			'singular_name'              => __( 'Type', 'crb' ),
			'search_items'               => __( 'Search Types', 'crb' ),
			'popular_items'              => __( 'Popular Types', 'crb' ),
			'all_items'                  => __( 'All Types', 'crb' ),
			'view_item'                  => __( 'View Type', 'crb' ),
			'edit_item'                  => __( 'Edit Type', 'crb' ),
			'update_item'                => __( 'Update Type', 'crb' ),
			'add_new_item'               => __( 'Add New Type', 'crb' ),
			'new_item_name'              => __( 'New Type Name', 'crb' ),
			'separate_items_with_commas' => __( 'Separate Types with commas', 'crb' ),
			'add_or_remove_items'        => __( 'Add or remove Types', 'crb' ),
			'choose_from_most_used'      => __( 'Choose from the most used Types', 'crb' ),
			'not_found'                  => __( 'No Types found.', 'crb' ),
			'menu_name'                  => __( 'Types', 'crb' ),
		),
		'show_in_rest' => true,
		'hierarchical'          => true,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'crb-location-type' ),
	)
);

register_taxonomy(
	'crb_location_state', # Taxonomy name
	array( 'crb_location' ), # Post Types
	array( # Arguments
		'labels'            => array(
			'name'                       => __( 'States', 'crb' ),
			'singular_name'              => __( 'State', 'crb' ),
			'search_items'               => __( 'Search States', 'crb' ),
			'popular_items'              => __( 'Popular States', 'crb' ),
			'all_items'                  => __( 'All States', 'crb' ),
			'view_item'                  => __( 'View State', 'crb' ),
			'edit_item'                  => __( 'Edit State', 'crb' ),
			'update_item'                => __( 'Update State', 'crb' ),
			'add_new_item'               => __( 'Add New State', 'crb' ),
			'new_item_name'              => __( 'New State Name', 'crb' ),
			'separate_items_with_commas' => __( 'Separate States with commas', 'crb' ),
			'add_or_remove_items'        => __( 'Add or remove States', 'crb' ),
			'choose_from_most_used'      => __( 'Choose from the most used States', 'crb' ),
			'not_found'                  => __( 'No States found.', 'crb' ),
			'menu_name'                  => __( 'States', 'crb' ),
		),
		'show_in_rest' => true,
		'hierarchical'          => true,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'location-state' ),
	)
);