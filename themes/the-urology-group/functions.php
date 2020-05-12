<?php
define( 'CRB_THEME_DIR', dirname( __FILE__ ) . DIRECTORY_SEPARATOR );

# Enqueue JS and CSS assets on the front-end
add_action( 'wp_enqueue_scripts', 'crb_enqueue_assets' );
function crb_enqueue_assets() {
	$template_dir = get_template_directory_uri();

	# Enqueue Google Maps Api
	$key = carbon_get_theme_option( 'crb_google_maps_api_key' );
	crb_enqueue_script( 'google-api', "https://maps.googleapis.com/maps/api/js?key={$key}", ['jquery'], null, true );

	crb_enqueue_script( 'rich-marker', $template_dir . '/resources/js/richmarker.js', array( 'jquery' ) );
	crb_enqueue_script( 'infobox', $template_dir . '/resources/js/infobox.js', array( 'jquery' ) );
	crb_enqueue_script( 'theme-marderwithlabel', $template_dir . '/resources/js/markerwithlabel.js', array( 'jquery' ) );
	crb_enqueue_script( 'vue-js', 'https://cdn.jsdelivr.net/npm/vue', ['jquery'], null, true );
	crb_enqueue_script( 'print-js', 'https://printjs.crabbly.com/' );


	# Enqueue Custom JS files
	wp_enqueue_script(
		'theme-js-bundle',
		$template_dir . crb_assets_bundle( 'js/bundle.js' ),
		array( 'jquery' ), // deps
		null, // version -- this is handled by the bundle manifest
		true // in footer
	);

	wp_localize_script( 'theme-js-bundle', 'crb_site_utils', [
		'ajaxurl' => admin_url( 'admin-ajax.php'),
		'themedir' => $template_dir,
		'current_page_url' => get_the_permalink(),
		'apiKey' => carbon_get_theme_option( 'crb_google_maps_api_key' )
	] );

	# Enqueue Resources Path
	$theme_data = array( 'theme_path' => get_bloginfo('stylesheet_directory'), );

	crb_enqueue_style( 'font-awesome', $template_dir . '/resources/font-awesome/css/all.css' );

	# Enqueue Custom CSS files
	wp_enqueue_style(
		'theme-css-bundle',
		$template_dir . crb_assets_bundle( 'css/bundle.css' )
	);


	# The theme style.css file may contain overrides for the bundled styles
	crb_enqueue_style( 'theme-styles', $template_dir . '/style.css' );

	# Enqueue Comments JS file
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

# Enqueue JS and CSS assets on admin pages
add_action( 'admin_enqueue_scripts', 'crb_admin_enqueue_scripts' );
function crb_admin_enqueue_scripts() {
	$template_dir = get_template_directory_uri();

	# Enqueue Scripts
	# @crb_enqueue_script attributes -- id, location, dependencies, in_footer = false
	# crb_enqueue_script( 'theme-admin-functions', $template_dir . '/js/admin-functions.js', array( 'jquery' ) );

	# Enqueue Styles
	# @crb_enqueue_style attributes -- id, location, dependencies, media = all
	# crb_enqueue_style( 'theme-admin-styles', $template_dir . '/css/admin-style.css' );

	# Editor Styles
	# add_editor_style( 'css/custom-editor-style.css' );
}

add_action( 'login_enqueue_scripts', 'crb_login_enqueue' );
function crb_login_enqueue() {
	# crb_enqueue_style( 'theme-login-styles', get_template_directory_uri() . '/css/login-style.css' );
}

# Attach Custom Post Types and Custom Taxonomies
add_action( 'init', 'crb_attach_post_types_and_taxonomies', 0 );
function crb_attach_post_types_and_taxonomies() {
	# Attach Custom Post Types
	include_once( CRB_THEME_DIR . 'options/post-types.php' );

	# Attach Custom Taxonomies
	include_once( CRB_THEME_DIR . 'options/taxonomies.php' );
}

add_action( 'after_setup_theme', 'crb_setup_theme' );

# To override theme setup process in a child theme, add your own crb_setup_theme() to your child theme's
# functions.php file.
if ( ! function_exists( 'crb_setup_theme' ) ) {
	function crb_setup_theme() {
		# Make this theme available for translation.
		load_theme_textdomain( 'crb', get_template_directory() . '/languages' );

		# Autoload dependencies
		$autoload_dir = CRB_THEME_DIR . 'vendor/autoload.php';
		if ( ! is_readable( $autoload_dir ) ) {
			wp_die( __( 'Please, run <code>composer install</code> to download and install the theme dependencies.', 'crb' ) );
		}
		include_once( $autoload_dir );
		\Carbon_Fields\Carbon_Fields::boot();

		# Additional libraries and includes
		include_once( CRB_THEME_DIR . 'includes/admin-login.php' );
		include_once( CRB_THEME_DIR . 'includes/blocks.php' );
		include_once( CRB_THEME_DIR . 'includes/boot-blocks.php' );
		include_once( CRB_THEME_DIR . 'includes/comments.php' );
		include_once( CRB_THEME_DIR . 'includes/title.php' );
		include_once( CRB_THEME_DIR . 'includes/gravity-forms.php' );
		include_once( CRB_THEME_DIR . 'includes/helpers.php' );
		include_once( CRB_THEME_DIR . 'includes/crb_walker_nav_menu.php' );
		include_once( CRB_THEME_DIR . 'includes/crb_location_query.php' );
		include_once( CRB_THEME_DIR . 'includes/csv-import.php' );
		include_once( CRB_THEME_DIR . 'includes/crb_ajax_get_symptoms.php' );
		include_once( CRB_THEME_DIR . 'includes/crb_ajax_get_conditions.php' );
		include_once( CRB_THEME_DIR . 'includes/crb_ajax_save_new_patient.php' );
		include_once( CRB_THEME_DIR . 'includes/crb_ajax_show_past_events.php' );
		include_once( CRB_THEME_DIR . 'includes/crb_ajax_filter_positions.php' );
		include_once( CRB_THEME_DIR . 'includes/crb_ajax_filter_gform_apointment_request.php' );
		include_once( CRB_THEME_DIR . 'includes/crb_ajax_physicians_filter.php' );
		include_once( CRB_THEME_DIR . 'includes/crb_ajax_reset_physicians_filter.php' );
		include_once( CRB_THEME_DIR . 'includes/crb_ajax_reset_staff_filter.php' );
		include_once( CRB_THEME_DIR . 'includes/crb_ajax_staff_filter.php' );
		include_once( CRB_THEME_DIR . 'includes/crb_ajax_predict_physician_name.php' );
		include_once( CRB_THEME_DIR . 'includes/crb_carbon_video_youtube.php' );
		include_once( CRB_THEME_DIR . 'includes/crb_ajax_pay_bill.php' );


		# Theme supports
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'menus' );
		add_theme_support( 'html5', array( 'gallery' ) );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		add_image_size('crb_invoice_image_size', 1583, 2048);

		# Manually select Post Formats to be supported - http://codex.wordpress.org/Post_Formats
		// add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

		# Register Theme Menu Locations

		register_nav_menus( array(
			'header-menu' => __( 'Header Menu', 'crb' ),
			'default-page-menu' => __( 'Default Page Menu', 'crb' ),
			'footer-menu' => __( 'Footer Menu', 'crb' ),
			'footer-menu-secondary' => __( 'Footer Menu Secondary', 'crb' ),
		) );


		# Attach custom widgets
		include_once( CRB_THEME_DIR . 'options/widgets.php' );

		# Attach custom shortcodes
		include_once( CRB_THEME_DIR . 'options/shortcodes.php' );

		# Add Actions
		add_action( 'widgets_init', 'crb_widgets_init' );
		add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );

		# Add Filters
		add_filter( 'excerpt_more', 'crb_excerpt_more' );
		add_filter( 'excerpt_length', 'crb_excerpt_length', 999 );
		add_filter( 'crb_theme_favicon_uri', function() {
			return get_template_directory_uri() . '/dist/images/favicon.ico';
		} );
		add_filter( 'carbon_fields_map_field_api_key', 'crb_get_google_maps_api_key' );
	}
}

# Register Sidebars
# Note: In a child theme with custom crb_setup_theme() this function is not hooked to widgets_init
function crb_widgets_init() {
	$sidebar_options = array_merge( crb_get_default_sidebar_options(), array(
		'name' => __( 'Default Sidebar', 'crb' ),
		'id'   => 'default-sidebar',
	) );

	register_sidebar( $sidebar_options );
}

# Sidebar Options
function crb_get_default_sidebar_options() {
	return array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widget__title">',
		'after_title'   => '</h2>',
	);
}

function crb_attach_theme_options() {
	# Attach fields
	include_once( CRB_THEME_DIR . 'options/theme-options.php' );
	include_once( CRB_THEME_DIR . 'options/post-meta.php' );
}

function crb_excerpt_more() {
	return '...';
}

function crb_excerpt_length() {
	return 55;
}

/**
 * Returns the Google Maps API Key set in Theme Options.
 *
 * @return string
 */
function crb_get_google_maps_api_key() {
	return carbon_get_theme_option( 'crb_google_maps_api_key' );
}

/** 
 * ADD MEDIA FILE SIZE TO LIST */

add_filter( 'manage_media_columns', 'sk_media_columns_filesize' );
/**
 * Filter the Media list table columns to add a File Size column.
 *
 * @param array $posts_columns Existing array of columns displayed in the Media list table.
 * @return array Amended array of columns to be displayed in the Media list table.
 */
function sk_media_columns_filesize( $posts_columns ) {
	$posts_columns['filesize'] = __( 'File Size', 'my-theme-text-domain' );

	return $posts_columns;
}

add_action( 'manage_media_custom_column', 'sk_media_custom_column_filesize', 10, 2 );
/**
 * Display File Size custom column in the Media list table.
 *
 * @param string $column_name Name of the custom column.
 * @param int    $post_id Current Attachment ID.
 */
function sk_media_custom_column_filesize( $column_name, $post_id ) {
	if ( 'filesize' !== $column_name ) {
		return;
	}

	$bytes = filesize( get_attached_file( $post_id ) );

	echo size_format( $bytes, 2 );
}

add_action( 'admin_print_styles-upload.php', 'sk_filesize_column_filesize' );
/**
 * Adjust File Size column on Media Library page in WP admin
 */
function sk_filesize_column_filesize() {
	echo
	'<style>
		.fixed .column-filesize {
			width: 10%;
		}
	</style>';
}

/** 
 * END ADD MEDIA FILE SIZE TO LIST */


/**
 * Get the path to a versioned bundle relative to the theme directory.
 *
 * @param  string $path
 * @return string
 */
function crb_assets_bundle( $path ) {
	static $manifest = null;

	if ( is_null( $manifest ) ) {
		$manifest_path = CRB_THEME_DIR . 'dist/manifest.json';

		if ( file_exists( $manifest_path ) ) {
			$manifest = json_decode( file_get_contents( $manifest_path ), true );
		} else {
			$manifest = array();
		}
	}

	$path = isset( $manifest[ $path ] ) ? $manifest[ $path ] : $path;

	return '/dist/' . $path;
}

/**
 * Sometimes, when using Gutenberg blocks the content output
 * contains empty unnecessary paragraph tags.
 *
 * In WP v5.2 this will be fixed, however, until then this function
 * acts as a temporary solution.
 *
 * @see https://core.trac.wordpress.org/ticket/45495
 *
 * @param  string $content
 * @return string
 */
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'crb_fix_empty_paragraphs_in_blocks' );
function crb_fix_empty_paragraphs_in_blocks( $content ) {
	global $wp_version;

	if ( version_compare( $wp_version, '5.2', '<' ) && has_blocks() ) {
		return $content;
	}

	return wpautop( $content );
}

add_filter( 'gform_pre_render_2', 'crb_populate_dropdown_with_physicians' );
add_filter( 'gform_pre_validation_2', 'crb_populate_dropdown_with_physicians' );
add_filter( 'gform_pre_submission_filter_2', 'crb_populate_dropdown_with_physicians' );
add_filter( 'gform_admin_pre_render_2', 'crb_populate_dropdown_with_physicians' );
function crb_populate_dropdown_with_physicians( $form ) {
    foreach ( $form['fields'] as &$field ) {

        if ( $field->id == 9 ) {
         	$physicians_to_exclude = crb_get_post_type_by_meta_value('crb_physician', '_crb_physician_hide_from_request_appointment_form', 'yes', 'ID');
         	
         	$staff_to_exclude = crb_get_post_type_by_meta_value('crb_staff', '_crb_staff_hide_from_request_appointment_form', 'yes', 'ID');
         	
         	$posts_to_exclude = array_merge( $physicians_to_exclude, $staff_to_exclude );

         	$physicians = crb_get_get_physicians_and_staff_ordered_by_last_name($posts_to_exclude);

	 		$choices[] = array( 'text' => 'Any', 'value' => 0 );

	        foreach ( $physicians as $physician ) {
	            $choices[] = array( 'text' => $physician['name'], 'value' => $physician['ID'] );
	        }

	        // update 'Select a Post' to whatever you'd like the instructive option to be
	        $field->placeholder = 'Preferred Physician';

	        $field->choices = $choices;
        }


    }

    return $form;
}

add_filter( 'gform_pre_render_2', 'crb_populate_dropdown_with_locations' );
add_filter( 'gform_pre_validation_2', 'crb_populate_dropdown_with_locations' );
add_filter( 'gform_pre_submission_filter_2', 'crb_populate_dropdown_with_locations' );
add_filter( 'gform_admin_pre_render_2', 'crb_populate_dropdown_with_locations' );
function crb_populate_dropdown_with_locations( $form ) {
    foreach ( $form['fields'] as &$field ) {

        if ( $field->id == 8 ) {

	        $locations_loop = new WP_Query( array(
	        	'post_type' => 'crb_location',
	        	'posts_per_page' => 100,
	        	'orderby' => 'title',
	        	'order' => 'ASC'
	        ) );

	        $choices[] = array( 'text' => 'Any', 'value' => 0 );

	        while ( $locations_loop->have_posts() ) {
	        	$locations_loop->the_post();
	            $choices[] = array( 'text' => get_the_title(), 'value' => get_the_id() );
	        }
 			wp_reset_postdata();
	        // update 'Select a Post' to whatever you'd like the instructive option to be
	        $field->placeholder = 'Preferred Location';
	        $field->choices = $choices;
        }


    }

    return $form;
}

add_filter( 'gform_pre_render_1', 'crb_populate_dropdown_with_physicians_on_thank_page' );
add_filter( 'gform_pre_validation_1', 'crb_populate_dropdown_with_physicians_on_thank_page' );
add_filter( 'gform_pre_submission_filter_1', 'crb_populate_dropdown_with_physicians_on_thank_page' );
add_filter( 'gform_admin_pre_render_1', 'crb_populate_dropdown_with_physicians_on_thank_page' );
function crb_populate_dropdown_with_physicians_on_thank_page( $form ) {

    foreach ( $form['fields'] as &$field ) {

        if ( $field->id == 1 ) {

	        $physicians_loop = new WP_Query( array(
	        	'post_type' => 'crb_physician',
	        	'posts_per_page' => 100,
	        ) );

	        $choices = array();

	        while ( $physicians_loop->have_posts() ) {
	        	$physicians_loop->the_post();
	            $choices[] = array( 'text' => get_the_title(), 'value' => get_the_id() );
	        }
 			wp_reset_postdata();
	        // update 'Select a Post' to whatever you'd like the instructive option to be
	        $field->placeholder = 'Select a Team Member';
	        $field->choices = $choices;
        }

    }

    return $form;
}

add_action('carbon_breadcrumbs_after_setup_trail', 'crb_physician_and_staff_added_new_item', 500);
function crb_physician_and_staff_added_new_item($trail) {
	if ( is_singular( 'crb_physician' ) ) {
		$all_physicians_link = get_page_url_by_template( 'all-physicians' );

		$trail->add_custom_item( __( 'All Physicians', 'crb' ), $all_physicians_link, 999 );
	}

	if ( is_singular( 'crb_staff' ) ) {
		$all_staff_link = get_page_url_by_template( 'staff' );

		$trail->add_custom_item( __( 'Staff', 'crb' ), $all_staff_link, 999 );
	}
}

# Remove the category items
add_action('carbon_breadcrumbs_after_setup_trail', 'crb_remove_category_item', 500);
function crb_remove_category_item($trail) {
	if ( is_singular( 'post' ) ) {
		foreach ( $trail->get_items() as $item ) {
			$item_link_holder = explode("/",$item[0]->get_link());
			if ( in_array( 'category', $item_link_holder ) ) {
				$trail->remove_item_by_link( $item[0]->get_link() );
			}
		}
	}
}

add_action('carbon_breadcrumbs_after_setup_trail', 'crb_add_custom_item_on_single_condition');
function crb_add_custom_item_on_single_condition($trail) {
	if ( is_singular( 'crb_condition' ) ) {
		$page_id = get_page_url_by_template('all-conditions', true);

		$trail->add_custom_item( get_the_title( $page_id ), get_permalink( $page_id ), 495 );

		if ( isset( $_GET['care_area_id'] ) ) {
			$care_area = get_post( absint( $_GET['care_area_id'] ) );

			$trail->add_custom_item( $care_area->post_title, get_permalink( $care_area->ID ), 500 );
		} else {
			$first_matched_care_area_id = crb_get_related_ids_from_association('crb_care_area_conditions', get_the_ID(), 1);
			if ( empty( $first_matched_care_area_id[0] ) ) {
				return;
			}

			$care_area = get_post( $first_matched_care_area_id[0] );

			$trail->add_custom_item( $care_area->post_title, get_permalink( $care_area->ID ), 500 );
		}
	}
}

add_action('carbon_breadcrumbs_after_setup_trail', 'crb_add_custom_item_on_single_care_area');
function crb_add_custom_item_on_single_care_area($trail) {
	if ( is_singular( 'crb_care_area' ) ) {
		$page_id = get_page_url_by_template('all-conditions', true);

		if ( $page_id ) {
			$trail->add_custom_item( get_the_title( $page_id ), get_permalink( $page_id ), 500 );
		}
	}
}

function my_epl_modify_listing_quantity( $query ) {
	// Do nothing if in dashboard or not an archive page
	if ( is_admin() || ! $query->is_main_query() )
		return;

	if ( is_search() ) {
		$query->set( 'posts_per_page' , 50 ); // Adjust the quantity
		return;
	}
}
add_action( 'pre_get_posts', 'my_epl_modify_listing_quantity' , 99  );

add_filter( 'embed_oembed_html', function( $cache, $url, $attr, $post_ID ) {

	// Modify youtube params
	if ( strstr( $cache, 'youtube.com/embed/' ) ) {
		$cache = str_replace( '?feature=oembed', '?rel=0', $cache );
	}

	// Return oEmbed html
	return $cache;

}, 10, 4 );

function crb_search_by_title_only( $search, $wp_query ) {
	if ( ! isset( $wp_query->query['search_by_title_only'] ) ) {
		return $search;
	}

    if ( ! empty( $search ) && ! empty( $wp_query->query_vars['search_terms'] ) ) {
        global $wpdb;

        $q = $wp_query->query_vars;
        $n = ! empty( $q['exact'] ) ? '' : '%';

        $search = array();

        foreach ( ( array ) $q['search_terms'] as $term )
            $search[] = $wpdb->prepare( "$wpdb->posts.post_title LIKE %s", $n . $wpdb->esc_like( $term ) . $n );

        if ( ! is_user_logged_in() )
            $search[] = "$wpdb->posts.post_password = ''";

        $search = ' AND ' . implode( ' AND ', $search );
    }

    return $search;
}

add_filter( 'posts_search', 'crb_search_by_title_only', 10, 2 );