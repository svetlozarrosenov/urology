<?php
// Care Area
register_post_type( 'crb_care_area', array(
	'labels' => array(
		'name' => __( 'Care Areas', 'crb' ),
		'singular_name' => __( 'Care Area', 'crb' ),
		'add_new' => __( 'Add New', 'crb' ),
		'add_new_item' => __( 'Add new Care Area', 'crb' ),
		'view_item' => __( 'View Care Area', 'crb' ),
		'edit_item' => __( 'Edit Care Area', 'crb' ),
		'new_item' => __( 'New Care Area', 'crb' ),
		'view_item' => __( 'View Care Area', 'crb' ),
		'search_items' => __( 'Search Care Areas', 'crb' ),
		'not_found' =>  __( 'No care areas found', 'crb' ),
		'not_found_in_trash' => __( 'No care areas found in trash', 'crb' ),
	),
	'public' => true,
	'exclude_from_search' => false,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'_edit_link' => 'post.php?post=%d',
	'rewrite' => array(
		'slug' => 'care-area',
		'with_front' => false,
	),
	'query_var' => true,
	'menu_icon' => 'dashicons-plus',
	'supports' => array( 'title', 'excerpt', 'page-attributes', 'thumbnail' ),
) );

// Condition
register_post_type( 'crb_condition', array(
	'labels' => array(
		'name' => __( 'Conditions', 'crb' ),
		'singular_name' => __( 'Condition', 'crb' ),
		'add_new' => __( 'Add New', 'crb' ),
		'add_new_item' => __( 'Add new Condition', 'crb' ),
		'view_item' => __( 'View Condition', 'crb' ),
		'edit_item' => __( 'Edit Condition', 'crb' ),
		'new_item' => __( 'New Condition', 'crb' ),
		'view_item' => __( 'View Condition', 'crb' ),
		'search_items' => __( 'Search Conditions', 'crb' ),
		'not_found' =>  __( 'No conditions found', 'crb' ),
		'not_found_in_trash' => __( 'No conditions found in trash', 'crb' ),
	),
	'public' => true,
	'exclude_from_search' => false,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'_edit_link' => 'post.php?post=%d',
	'rewrite' => array(
		'slug' => 'condition',
		'with_front' => false,
	),
	'query_var' => true,
	'menu_icon' => 'dashicons-universal-access',
	'supports' => array( 'title', 'excerpt', 'page-attributes', 'thumbnail' ),
) );

// Patient Story
register_post_type( 'crb_patient_story', array(
	'labels' => array(
		'name' => __( 'Patient Stories', 'crb' ),
		'singular_name' => __( 'Patient Story', 'crb' ),
		'add_new' => __( 'Add New', 'crb' ),
		'add_new_item' => __( 'Add new Patient Story', 'crb' ),
		'view_item' => __( 'View Patient Story', 'crb' ),
		'edit_item' => __( 'Edit Patient Story', 'crb' ),
		'new_item' => __( 'New Patient Story', 'crb' ),
		'view_item' => __( 'View Patient Story', 'crb' ),
		'search_items' => __( 'Search Patient Stories', 'crb' ),
		'not_found' =>  __( 'No patient stories found', 'crb' ),
		'not_found_in_trash' => __( 'No patient stories found in trash', 'crb' ),
	),
	'public' => true,
	'exclude_from_search' => false,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'_edit_link' => 'post.php?post=%d',
	'rewrite' => array(
		'slug' => 'patient-story',
		'with_front' => false,
	),
	'query_var' => true,
	'menu_icon' => 'dashicons-welcome-write-blog',
	'supports' => array( 'title', 'editor', 'excerpt', 'page-attributes', 'thumbnail' ),
) );

// News
register_post_type( 'crb_news', array(
	'labels' => array(
		'name' => __( 'News', 'crb' ),
		'singular_name' => __( 'News', 'crb' ),
		'add_new' => __( 'Add New', 'crb' ),
		'add_new_item' => __( 'Add new News', 'crb' ),
		'view_item' => __( 'View News', 'crb' ),
		'edit_item' => __( 'Edit News', 'crb' ),
		'new_item' => __( 'New News', 'crb' ),
		'view_item' => __( 'View News', 'crb' ),
		'search_items' => __( 'Search News', 'crb' ),
		'not_found' =>  __( 'No news found', 'crb' ),
		'not_found_in_trash' => __( 'No news found in trash', 'crb' ),

	),
	'public' => true,
	'exclude_from_search' => false,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'_edit_link' => 'post.php?post=%d',
	'rewrite' => array(
		'slug' => 'news',
		'with_front' => false,
	),
	'query_var' => true,
	'menu_icon' => 'dashicons-admin-site-alt',
	'supports' => array( 'title', 'editor', 'excerpt', 'page-attributes', 'thumbnail' ),
) );

// Newsletter
register_post_type( 'crb_newsletter', array(
	'labels' => array(
		'name' => __( 'Newsletters', 'crb' ),
		'singular_name' => __( 'Newsletter', 'crb' ),
		'add_new' => __( 'Add New', 'crb' ),
		'add_new_item' => __( 'Add new Newsletter', 'crb' ),
		'view_item' => __( 'View Newsletter', 'crb' ),
		'edit_item' => __( 'Edit Newsletter', 'crb' ),
		'new_item' => __( 'New Newsletter', 'crb' ),
		'view_item' => __( 'View Newsletter', 'crb' ),
		'search_items' => __( 'Search Newsletters', 'crb' ),
		'not_found' =>  __( 'No newsletters found', 'crb' ),
		'not_found_in_trash' => __( 'No newsletters found in trash', 'crb' ),
	),
	'public' => true,
	'exclude_from_search' => false,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'_edit_link' => 'post.php?post=%d',
	'rewrite' => array(
		'slug' => 'newsletter',
		'with_front' => false,
	),
	'query_var' => true,
	'menu_icon' => 'dashicons-admin-site-alt2',
	'supports' => array( 'title', 'editor', 'excerpt', 'page-attributes', 'thumbnail' ),
) );

// Press
register_post_type( 'crb_press', array(
	'labels' => array(
		'name' => __( 'Presses', 'crb' ),
		'singular_name' => __( 'Press', 'crb' ),
		'add_new' => __( 'Add New', 'crb' ),
		'add_new_item' => __( 'Add new Press', 'crb' ),
		'view_item' => __( 'View Press', 'crb' ),
		'edit_item' => __( 'Edit Press', 'crb' ),
		'new_item' => __( 'New Press', 'crb' ),
		'view_item' => __( 'View Press', 'crb' ),
		'search_items' => __( 'Search Presses', 'crb' ),
		'not_found' =>  __( 'No presses found', 'crb' ),
		'not_found_in_trash' => __( 'No presses found in trash', 'crb' ),
	),
	'public' => true,
	'exclude_from_search' => false,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'_edit_link' => 'post.php?post=%d',
	'rewrite' => array(
		'slug' => 'press',
		'with_front' => false,
	),
	'query_var' => true,
	'menu_icon' => 'dashicons-admin-site-alt3',
	'supports' => array( 'title', 'excerpt', 'editor', 'page-attributes', 'thumbnail' ),
) );

// Physician
register_post_type( 'crb_physician', array(
	'labels' => array(
		'name' => __( 'Physicians', 'crb' ),
		'singular_name' => __( 'Physician', 'crb' ),
		'add_new' => __( 'Add New', 'crb' ),
		'add_new_item' => __( 'Add new Physician', 'crb' ),
		'view_item' => __( 'View Physician', 'crb' ),
		'edit_item' => __( 'Edit Physician', 'crb' ),
		'new_item' => __( 'New Physician', 'crb' ),
		'view_item' => __( 'View Physician', 'crb' ),
		'search_items' => __( 'Search Physicians', 'crb' ),
		'not_found' =>  __( 'No physicians found', 'crb' ),
		'not_found_in_trash' => __( 'No physicians found in trash', 'crb' ),
	),
	'public' => true,
	'show_in_rest' => true,
	'exclude_from_search' => false,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'_edit_link' => 'post.php?post=%d',
	'rewrite' => array(
		'slug' => 'physician',
		'with_front' => false,
	),
	'query_var' => true,
	'menu_icon' => 'dashicons-portfolio',
	'supports' => array( 'title', 'editor', 'page-attributes', 'thumbnail' ),
) );

// Staff
register_post_type( 'crb_staff', array(
	'labels' => array(
		'name' => __( 'Staff', 'crb' ),
		'singular_name' => __( 'Staff', 'crb' ),
		'add_new' => __( 'Add New', 'crb' ),
		'add_new_item' => __( 'Add new Staff', 'crb' ),
		'view_item' => __( 'View Staff', 'crb' ),
		'edit_item' => __( 'Edit Staff', 'crb' ),
		'new_item' => __( 'New Staff', 'crb' ),
		'view_item' => __( 'View Staff', 'crb' ),
		'search_items' => __( 'Search Staff', 'crb' ),
		'not_found' =>  __( 'No staff found', 'crb' ),
		'not_found_in_trash' => __( 'No staff found in trash', 'crb' ),
	),
	'public' => true,
	'show_in_rest' => true,
	'exclude_from_search' => false,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'_edit_link' => 'post.php?post=%d',
	'rewrite' => array(
		'slug' => 'staff',
		'with_front' => false,
	),
	'query_var' => true,
	'menu_icon' => 'dashicons-universal-access',
	'supports' => array( 'title', 'editor', 'page-attributes', 'thumbnail' ),
) );

// Location
register_post_type( 'crb_location', array(
	'labels' => array(
		'name' => __( 'Locations', 'crb' ),
		'singular_name' => __( 'Location', 'crb' ),
		'add_new' => __( 'Add New', 'crb' ),
		'add_new_item' => __( 'Add new Location', 'crb' ),
		'view_item' => __( 'View Location', 'crb' ),
		'edit_item' => __( 'Edit Location', 'crb' ),
		'new_item' => __( 'New Location', 'crb' ),
		'view_item' => __( 'View Location', 'crb' ),
		'search_items' => __( 'Search Locations', 'crb' ),
		'not_found' =>  __( 'No locations found', 'crb' ),
		'not_found_in_trash' => __( 'No locations found in trash', 'crb' ),
	),
	'public' => true,
	'show_in_rest' => false,
	'exclude_from_search' => false,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'_edit_link' => 'post.php?post=%d',
	'rewrite' => array(
		'slug' => 'location',
		'with_front' => false,
	),
	'query_var' => true,
	'menu_icon' => 'dashicons-location',
	'supports' => array( 'title', 'page-attributes' ),
) );

// Patient
register_post_type( 'crb_patient', array(
	'labels' => array(
		'name' => __( 'Patients', 'crb' ),
		'singular_name' => __( 'Patient', 'crb' ),
		'add_new' => __( 'Add New', 'crb' ),
		'add_new_item' => __( 'Add new Patient', 'crb' ),
		'view_item' => __( 'View Patient', 'crb' ),
		'edit_item' => __( 'Edit Patient', 'crb' ),
		'new_item' => __( 'New Patient', 'crb' ),
		'view_item' => __( 'View Patient', 'crb' ),
		'search_items' => __( 'Search Patients', 'crb' ),
		'not_found' =>  __( 'No patients found', 'crb' ),
		'not_found_in_trash' => __( 'No patients found in trash', 'crb' ),
	),
	'public' => false,
	'show_in_rest' => false,
	'exclude_from_search' => false,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'_edit_link' => 'post.php?post=%d',
	'rewrite' => array(
		'slug' => 'patient',
		'with_front' => false,
	),
	'query_var' => true,
	'menu_icon' => 'dashicons-buddicons-buddypress-logo',
	'supports' => array( 'title', 'page-attributes' ),
) );

// Event
register_post_type( 'crb_event', array(
	'labels' => array(
		'name' => __( 'Events', 'crb' ),
		'singular_name' => __( 'Event', 'crb' ),
		'add_new' => __( 'Add New', 'crb' ),
		'add_new_item' => __( 'Add new Event', 'crb' ),
		'view_item' => __( 'View Event', 'crb' ),
		'edit_item' => __( 'Edit Event', 'crb' ),
		'new_item' => __( 'New Event', 'crb' ),
		'view_item' => __( 'View Event', 'crb' ),
		'search_items' => __( 'Search Events', 'crb' ),
		'not_found' =>  __( 'No events found', 'crb' ),
		'not_found_in_trash' => __( 'No events found in trash', 'crb' ),
	),
	'public' => true,
	'show_in_rest' => false,
	'exclude_from_search' => false,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'_edit_link' => 'post.php?post=%d',
	'rewrite' => array(
		'slug' => 'event',
		'with_front' => false,
	),
	'query_var' => true,
	'menu_icon' => 'dashicons-backup',
	'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
) );

// Team Members
register_post_type( 'crb_team_member', array(
	'labels' => array(
		'name' => __( 'Team Members', 'crb' ),
		'singular_name' => __( 'Team Member', 'crb' ),
		'add_new' => __( 'Add New', 'crb' ),
		'add_new_item' => __( 'Add new Team Member', 'crb' ),
		'view_item' => __( 'View Team Member', 'crb' ),
		'edit_item' => __( 'Edit Team Member', 'crb' ),
		'new_item' => __( 'New Team Member', 'crb' ),
		'view_item' => __( 'View Team Member', 'crb' ),
		'search_items' => __( 'Search Team Members', 'crb' ),
		'not_found' =>  __( 'No team members found', 'crb' ),
		'not_found_in_trash' => __( 'No team members found in trash', 'crb' ),
	),
	'public' => true,
	'show_in_rest' => false,
	'exclude_from_search' => false,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'_edit_link' => 'post.php?post=%d',
	'rewrite' => array(
		'slug' => 'team-member',
		'with_front' => false,
	),
	'query_var' => true,
	'menu_icon' => 'dashicons-businessman',
	'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
) );

// Video
register_post_type( 'crb_video', array(
	'labels' => array(
		'name' => __( 'Videos', 'crb' ),
		'singular_name' => __( 'Video', 'crb' ),
		'add_new' => __( 'Add New', 'crb' ),
		'add_new_item' => __( 'Add new Video', 'crb' ),
		'view_item' => __( 'View Video', 'crb' ),
		'edit_item' => __( 'Edit Video', 'crb' ),
		'new_item' => __( 'New Video', 'crb' ),
		'view_item' => __( 'View Video', 'crb' ),
		'search_items' => __( 'Search Videos', 'crb' ),
		'not_found' =>  __( 'No videos found', 'crb' ),
		'not_found_in_trash' => __( 'No videos found in trash', 'crb' ),
	),
	'public' => false,
	'show_in_rest' => false,
	'exclude_from_search' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'_edit_link' => 'post.php?post=%d',
	'rewrite' => array(
		'slug' => 'video',
		'with_front' => false,
	),
	'query_var' => true,
	'menu_icon' => 'dashicons-controls-play',
	'supports' => array( 'title', 'page-attributes' ),
) );