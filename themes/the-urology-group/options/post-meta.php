<?php

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;
use Carbon_Fields\Block;

// Testimonials Block
Block::make( __( 'Testimonials', 'crb' ) )
    ->add_fields( array(
        Field::make( 'text', 'crb_block_testimonials_rotator_title', __( 'Title', 'crb' ) ),
		Field::make( 'rich_text', 'crb_block_testimonials_rotator_description', __( 'Description', 'crb' ) ),
		Field::make( 'text', 'crb_block_testimonials_rotator_shortcode', __( 'Shortcode', 'crb' ) ),

    ) )
    ->set_icon( 'welcome-write-blog' )
    ->set_render_callback( function ( $block ) {
        crb_render_fragment( 'blocks/testimonials', [
            'testimonials' => $block 
        ] );
    } );

function crb_get_intro_fields() {
	$args = array(
		Field::make( 'checkbox', 'right_aligned_banner', __( 'Right Aligned Intro Overlay', 'crb' ) ),
		Field::make( 'checkbox', 'title_under_the_intro', __( 'Title Under the Intro', 'crb' ) ),
		Field::make( 'image', 'image', __( 'Image', 'crb' ) ),
		Field::make( 'text', 'title', __( 'Title', 'crb' ) )
			->set_width( 50 ),
		Field::make( 'text', 'subtitle', __( 'Subtitle', 'crb' ) )
			->set_width( 50 ),
		Field::make( 'textarea', 'text', __( 'Text', 'crb' ) ),
	);

	return $args; 
};

function crb_get_callout_fields() {
	return array(
		Field::make( 'image', 'image', __( 'Image', 'crb' ) ),
		Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
		Field::make( 'text', 'text', __( 'Text', 'crb' ) ),
		Field::make( 'text', 'btn_label', __( 'Button Label', 'crb' ) )
			->set_width( 50 ),
		Field::make( 'text', 'btn_link', __( 'Button Link', 'crb' ) )
			->set_width( 50 ),
		Field::make( 'checkbox', 'video_btn_link', __( 'Video Link', 'crb' ) ),
	);
}

// Menu
Container::make( 'nav_menu_item', __( 'Menu Settings' ) )
    ->add_fields( array(
        Field::make( 'complex', 'crb_header_menu_submenu_fields', __( 'Submenu' ) )
        	->add_fields( 'links', __( 'Links' ), array(
        		Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
        		Field::make( 'complex', 'links', '' )
        			->add_fields( array(
						Field::make( 'text', 'title', __( 'Title', 'crb' ) )
		        			->set_width( 50 ),
		        		Field::make( 'text', 'link', __( 'Link', 'crb' ) )
		        			->set_width( 50 ),
		        		Field::make( 'checkbox', 'important_link', __( 'Important Link', 'crb' ) ),
	        			Field::make( 'checkbox', 'open_link_in_new_tab', __( 'Open link in a new tab', 'crb' ) ),
        			) )
        			->set_layout( 'tabbed-vertical' )
	        		->set_header_template( '<%- title %>' )
	        		->set_max( 11 ),
			) )
			->add_fields( 'find-physician', __( 'Find a Physician Form' ), array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'textarea', 'text', __( 'Text', 'crb' ) ),
				Field::make( 'text', 'link_label', __( 'Link Label', 'crb' ) )
        			->set_width( 50 ),
        		Field::make( 'text', 'link', __( 'Link', 'crb' ) )
        			->set_width( 50 ),
        		Field::make( 'checkbox', 'important_link', __( 'Important Link', 'crb' ) ),
			) )
			->add_fields( 'location', __( 'Location' ), array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'image', 'image', __( 'Image', 'crb' ) ),
				Field::make( 'select', 'location', __( 'Location', 'crb' ) )
					 ->set_options( 'crb_get_locations' )
			) )
			->add_fields( 'latest-blog-post', __( 'Latest Blog Post' ), array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'text', 'link_label', __( 'Link Label', 'crb' ) )
        			->set_width( 50 ),
        		Field::make( 'text', 'link', __( 'Link', 'crb' ) )
        			->set_width( 50 ),
        		Field::make( 'checkbox', 'important_link', __( 'Important Link', 'crb' ) ),
			) )	
			->add_fields( 'condition', __( 'Condition' ), array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'image', 'image', __( 'Image', 'crb' ) ),
				Field::make( 'select', 'condition', __( 'Condition', 'crb' ) )
					 ->set_options( 'crb_get_conditions_id_title' ),
				Field::make( 'text', 'link_label', __( 'Link Label', 'crb' ) )
        			->set_width( 50 ),
        		Field::make( 'text', 'link', __( 'Link', 'crb' ) )
        			->set_width( 50 ),
        		Field::make( 'checkbox', 'important_link', __( 'Important Link', 'crb' ) ),
			) )	
			->add_fields( 'phone', __( 'Phone' ), array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'text', 'phone', __( 'Phone', 'crb' ) ),
				Field::make( 'textarea', 'text', __( 'Text', 'crb' ) ),
				Field::make( 'text', 'link_label', __( 'Link Label', 'crb' ) )
        			->set_width( 50 ),
        		Field::make( 'text', 'link', __( 'Link', 'crb' ) )
        			->set_width( 50 ),
        		Field::make( 'checkbox', 'important_link', __( 'Important Link', 'crb' ) ),
			) )	
			->add_fields( 'banner-link', __( 'Banner Link' ), array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'image', 'image', __( 'Image', 'crb' ) ),
				Field::make( 'text', 'overlay_title', __( 'Overlay Title', 'crb' ) ),
				Field::make( 'text', 'overlay_description', __( 'Overlay Description', 'crb' ) ),
				Field::make( 'text', 'overlay_link_label', __( 'Overlay Link Label', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'overlay_link', __( 'Overlay Link', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'link_label', __( 'Link Label', 'crb' ) )
        			->set_width( 50 ),
        		Field::make( 'text', 'link', __( 'Link', 'crb' ) )
        			->set_width( 50 ),
        		Field::make( 'checkbox', 'important_link', __( 'Important Link', 'crb' ) ),
			) )	
        	->set_layout( 'tabbed-horizontal' )
	        ->set_max( 3 )
	        ->set_header_template( '<%- title %>' )
    ) );

// Homepage Settings
Container::make( 'post_meta', __( 'Homepage Settings', 'crb' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_template', '=', 'templates/home.php' )
	->add_fields( array(
		Field::make( 'complex', 'crb_homepage_fields', '' )
			->set_layout( 'tabbed-vertical' )
			->add_fields( 'slider', __( 'Slider', 'crb' ), array(
				Field::make( 'complex', 'slider', '' )
					->add_fields( array(
						Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
						Field::make( 'text', 'subtitle', __( 'Subtitle', 'crb' ) ),
						Field::make( 'text', 'text', __( 'Text', 'crb' ) ),
						Field::make( 'text', 'btn_label', __( 'Button Label', 'crb' ) )
							->set_width( 50 ),
						Field::make( 'text', 'btn_link', __( 'Button Link', 'crb' ) )
							->set_width( 50 ),
						Field::make( 'image', 'image', __( 'Image', 'crb' ) ),
					) )
					->set_layout( 'tabbed-horizontal' )
			) )	
			->add_fields( 'boxes', __( 'Boxes', 'crb' ), array(
				Field::make( 'separator', 'crb_boxes_separator', __( 'You can manage your boxes from Theme Options > Boxes', 'crb' ) )
			) )	
			->add_fields( 'callout', __( 'Callout', 'crb' ), array(
				Field::make( 'image', 'image', __( 'Image', 'crb' ) ),
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'text', 'text', __( 'Text', 'crb' ) ),
				Field::make( 'text', 'btn_label', __( 'Button Label', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'btn_link', __( 'Button Link', 'crb' ) )
					->set_width( 50 ),
			) )	
			->add_fields( 'areas-of-care', __( 'Areas of Care', 'crb' ), array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'subtitle', __( 'Subtitle', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'textarea', 'content', __( 'Content', 'crb' ) ),
				Field::make( 'association', 'care_areas', __( 'Select Areas of Care', 'crb' ) )
				->set_types( array(
			        array(
			            'type'      => 'post',
			            'post_type' => 'crb_care_area',
			        )
			    ) )
			    ->set_max( 6 )
			) )
			->add_fields( 'featured-story', __( 'Story', 'crb' ), array(	
				Field::make( 'image', 'image', __( 'Image', 'crb' ) ),
					Field::make( 'textarea', 'title', __( 'Title', 'crb' ) ),
					Field::make( 'text', 'subtitle', __( 'Subtitle', 'crb' ) ),
					Field::make( 'text', 'btn_label', __( 'Button Label', 'crb' ) )
						->set_width( 50 ),
					Field::make( 'text', 'btn_link', __( 'Button Link', 'crb' ) )
						->set_width( 50 ),
					Field::make( 'association', 'chosen_story', __( 'Story', 'crb' ) )
					->set_types( array(
				        array(
				            'type'      => 'post',
				            'post_type' => 'crb_patient_story',
				        )
				    ) )
					->set_max( 1 )
			) )	
			->add_fields( 'cards', __( 'Cards', 'crb' ), array(	
				Field::make( 'complex', 'cards', '' )
					->add_fields( array(
						Field::make( 'text', 'link', __( 'Link', 'crb' ) ),
						Field::make( 'text', 'btn_label', __( 'Button Label', 'crb' ) ),
						Field::make( 'image', 'image', __( 'Image', 'crb' ) ),
						Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
						Field::make( 'text', 'text', __( 'Text', 'crb' ) ),
					) )
					->set_layout( 'tabbed-horizontal' )
					->set_max( 3 )
					->set_header_template( '<%- title %>' )
			) )	
			->add_fields( 'testimonials', __( 'Testimonials', 'crb' ), array(	
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'rich_text', 'description', __( 'Description', 'crb' ) ),
				Field::make( 'text', 'shortcode', __( 'Shortcode', 'crb' ) ),
			) )
	) );

// All Conditions Page Settings
Container::make( 'post_meta', __( 'All Conditions Page Settings', 'crb' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_template', '=', 'templates/all-conditions.php' )
	->add_fields( array(
		Field::make( 'complex', 'crb_all_conditions_fields', '' )
			->set_layout( 'tabbed-vertical' )
			->add_fields( 'intro', __( 'Intro', 'crb' ), crb_get_intro_fields() )	
			->add_fields( 'text', __( 'Text', 'crb' ), array(
				Field::make( 'textarea', 'text', '' )
			) )
			->add_fields( 'conditions', __( 'Conditions', 'crb' ), array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
			) )
			->add_fields( 'callout', __( 'Callout', 'crb' ), array(
				Field::make( 'image', 'image', __( 'Image', 'crb' ) ),
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'text', 'text', __( 'Text', 'crb' ) ),
				Field::make( 'text', 'btn_label', __( 'Button Label', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'btn_link', __( 'Button Link', 'crb' ) )
					->set_width( 50 ),
			) )	
			->add_fields( 'boxes', __( 'Boxes', 'crb' ), array(
				Field::make( 'separator', 'crb_boxes_separator', __( 'You can manage your boxes from Theme Options > Boxes', 'crb' ) )
			) )	
	) );

// Patient Stories Page Settings
Container::make( 'post_meta', __( 'Patient Stories Page Settings', 'crb' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_template', '=', 'templates/patient-stories.php' )
	->add_fields( array(
		Field::make( 'complex', 'crb_patient_stories_fields', '' )
			->set_layout( 'tabbed-vertical' )
			->add_fields( 'intro', __( 'Intro', 'crb' ), crb_get_intro_fields() )	
			->add_fields( 'stories-list', __( 'Stories List', 'crb' ), array(
				Field::make( 'textarea', 'text', __( 'Text', 'crb' ) ),
				Field::make( 'association', 'related_care_area', __( 'Care Area Filter', 'crb' ) )
				 ->set_types( array(
			        array(
			            'type'      => 'post',
			            'post_type' => 'crb_care_area',
			        )
			    ) ),
				Field::make( 'text', 'stories_per_page', __( 'Stories per Page', 'crb' ) ),
				Field::make( 'complex', 'chosen_stories', __( 'Chosen Stories', 'crb' ) )
					->add_fields( array(
						Field::make( 'image', 'image', __( 'Image', 'crb' ) ),
						Field::make( 'textarea', 'title', __( 'Title', 'crb' ) ),
						Field::make( 'text', 'subtitle', __( 'Subtitle', 'crb' ) ),
						Field::make( 'text', 'btn_label', __( 'Button Label', 'crb' ) )
							->set_width( 50 ),
						Field::make( 'text', 'btn_link', __( 'Button Link', 'crb' ) )
							->set_width( 50 ),
						Field::make( 'association', 'chosen_story', __( 'Story', 'crb' ) )
						->set_types( array(
					        array(
					            'type'      => 'post',
					            'post_type' => 'crb_patient_story',
					        )
					    ) )
						->set_max( 1 )
					) )
					->set_max( 2 )
					->set_layout( 'tabbed-horizontal' )
			) )	
	) );

// Staff Page Settings
Container::make( 'post_meta', __( 'Staff Page Settings', 'crb' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_template', '=', 'templates/staff.php' )
	->add_fields( array(
		Field::make( 'complex', 'crb_staff_page_fields', '' )
			->set_layout( 'tabbed-vertical' )
			->add_fields( 'intro', __( 'Intro', 'crb' ), crb_get_intro_fields() )	
			->add_fields( 'staff', __( 'Staff', 'crb' ), array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
			) )
			->add_fields( 'callout', __( 'Callout', 'crb' ), crb_get_callout_fields() )	
			->add_fields( 'boxes', __( 'Boxes', 'crb' ), array(
				Field::make( 'separator', 'crb_boxes_separator', __( 'You can manage your boxes from Theme Options > Boxes', 'crb' ) )
			) )	
	) );

// All Physicians Page Settings
Container::make( 'post_meta', __( 'All Physicians Page Settings', 'crb' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_template', '=', 'templates/all-physicians.php' )
	->add_fields( array(
		Field::make( 'complex', 'crb_all_physicians_page_fields', '' )
			->set_layout( 'tabbed-vertical' )
			->add_fields( 'intro', __( 'Intro', 'crb' ), crb_get_intro_fields() )	
			->add_fields( 'physicians', __( 'Physicians', 'crb' ), array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
			) )
			->add_fields( 'callout', __( 'Callout', 'crb' ), crb_get_callout_fields() )	
			->add_fields( 'boxes', __( 'Boxes', 'crb' ), array(
				Field::make( 'separator', 'crb_boxes_separator', __( 'You can manage your boxes from Theme Options > Boxes', 'crb' ) )
			) )	
	) );

// All Locations Page Settings
Container::make( 'post_meta', __( 'All Locations Page Settings', 'crb' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_template', '=', 'templates/locations.php' )
	->add_fields( array(
		Field::make( 'complex', 'crb_all_locations_page_fields', '' )
			->set_layout( 'tabbed-vertical' )
			->add_fields( 'intro', __( 'Intro', 'crb' ), crb_get_intro_fields() )	
			->add_fields( 'locations', __( 'Locations', 'crb' ), array(
				Field::make( 'text', 'text', __( 'Text', 'crb' ) ),
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'select', 'location_selected_distance', __( 'Location Selected Distance', 'crb' ) )
					->set_options( crb_get_distances() )
			) )
			->add_fields( 'callout', __( 'Callout', 'crb' ), crb_get_callout_fields() )	
			->add_fields( 'boxes', __( 'Boxes', 'crb' ), array(
				Field::make( 'separator', 'crb_boxes_separator', __( 'You can manage your boxes from Theme Options > Boxes', 'crb' ) )
			) )	
	) );

// About Page Settings
Container::make( 'post_meta', __( 'About Page Settings', 'crb' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_template', '=', 'templates/about.php' )
	->add_fields( array(
		Field::make( 'complex', 'crb_about_page_fields', '' )
			->set_layout( 'tabbed-vertical' )
			->add_fields( 'intro', __( 'Intro', 'crb' ), crb_get_intro_fields() )	
			->add_fields( 'text', __( 'Text', 'crb' ), array(
				Field::make( 'rich_text', 'content', __( 'Content', 'crb' ) ),
			) )
			->add_fields( 'list', __( 'List', 'crb' ), array(
				Field::make( 'complex', 'list', '' )
					->add_fields( array(
						Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
						Field::make( 'textarea', 'text', __( 'Text', 'crb' ) ),
					) )
					->set_layout( 'tabbed-horizontal' )
					->set_header_template( '<%- title %>' )
			) )
			->add_fields( 'symptom-checker-form', __( 'Symptom Checher Form', 'crb' ), array(
				Field::make( 'association', 'types', __( 'Select Types', 'crb' ) )
					->set_types( array(
				        array(
				            'type' => 'term',
				            'taxonomy' => 'crb_condition_type',
				        ),
				    ) )
				->set_max( 2 ),
				Field::make( 'text', 'form_title', __( 'Title', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'form_subtitle', __( 'Subtitle', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'rich_text', 'form_text', __( 'Text', 'crb' ) ),
				Field::make( 'separator', 'callout_separator', __( 'Callout', 'crb' ) ),
				Field::make( 'text', 'callout_title', __( 'Title', 'crb' ) ),
				Field::make( 'textarea', 'callout_text', __( 'Text', 'crb' ) ),
				Field::make( 'separator', 'form-steps', __( 'Form Steps', 'crb' ) ),
				Field::make( 'separator', 'separator-first-step', __( 'First Step', 'crb' ) ),
				Field::make( 'text', 'first_step_form_title', __( 'Title', 'crb' ) ),
				Field::make( 'text', 'first_step_form_age_text', __( 'Age Text', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'first_step_form_gender_text', __( 'Gender Text', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'separator', 'separator-second-step', __( 'Second Step', 'crb' ) ),
				Field::make( 'text', 'second_step_form_title', __( 'Title', 'crb' ) ),
				Field::make( 'rich_text', 'second_step_form_subtitle', __( 'Subtitle', 'crb' ) ),
				Field::make( 'rich_text', 'second_step_form_text', __( 'Text', 'crb' ) ),
				Field::make( 'separator', 'separator-third-step', __( 'Third Step', 'crb' ) ),
				Field::make( 'text', 'third_step_form_title', __( 'Title', 'crb' ) ),
				Field::make( 'rich_text', 'third_step_form_subtitle', __( 'Subtitle', 'crb' ) ),
				Field::make( 'rich_text', 'third_step_form_text', __( 'Text', 'crb' ) ),
			) )
			->add_fields( 'newsroom', __( 'Newsroom', 'crb' ), array(
				Field::make( 'text', 'newsletters_per_page', __( 'Newsletters per Page', 'crb' ) ),
				Field::make( 'text', 'news_per_page', __( 'News per Page', 'crb' ) ),
				Field::make( 'text', 'presses_per_page', __( 'Presses per Page', 'crb' ) ),
			) )
			->add_fields( 'positions', __( 'Positions', 'crb' ), array(
				Field::make( 'textarea', 'text', __( 'Text', 'crb' ) ),
				Field::make( 'text', 'positions_per_page', __( 'Positions per Page', 'crb' ) ),
			) )
			->add_fields( 'team-members', __( 'Team Members', 'crb' ), array(
				Field::make( 'text', 'team_members_per_page', __( 'Team Members per Page', 'crb' ) ),
			) )
			->add_fields( 'videos', __( 'Videos', 'crb' ), array(
				Field::make( 'textarea', 'text', __( 'Text', 'crb' ) ),
			) )
			->add_fields( 'callout', __( 'Callout', 'crb' ), crb_get_callout_fields() )	
			->add_fields( 'boxes', __( 'Boxes', 'crb' ), array(
				Field::make( 'separator', 'crb_boxes_separator', __( 'You can manage your boxes from Theme Options > Boxes', 'crb' ) )
			) )	
			->add_fields( 'testimonials', __( 'Testimonials', 'crb' ), array(	
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'rich_text', 'description', __( 'Description', 'crb' ) ),
				Field::make( 'text', 'shortcode', __( 'Shortcode', 'crb' ) ),
			) )
	) );

// Events Page Settings
Container::make( 'post_meta', __( 'Events Page Settings', 'crb' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_template', '=', 'templates/events.php' )
	->add_fields( array(
		Field::make( 'complex', 'crb_events_page_fields', '' )
			->set_layout( 'tabbed-vertical' )
			->add_fields( 'intro', __( 'Intro', 'crb' ), crb_get_intro_fields() )	
			->add_fields( 'events', __( 'Events', 'crb' ), array(
				Field::make( 'text', 'upcoming_events_per_page', __( 'Upcoming Events per Page', 'crb' ) ),

				Field::make( 'text', 'past_events_per_page', __( 'Past Events per Page', 'crb' ) ),
			) )
	) );

// Newsletters Page Settings
Container::make( 'post_meta', __( 'Newsletters Page Settings', 'crb' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_template', '=', 'templates/newsletters.php' )
	->add_fields( array(
		Field::make( 'complex', 'crb_newsletters_page_fields', '' )
			->set_layout( 'tabbed-vertical' )
			->add_fields( 'intro', __( 'Intro', 'crb' ), crb_get_intro_fields() )	
			->add_fields( 'newsletters', __( 'Newsletters', 'crb' ), array(
				Field::make( 'text', 'newsletters_per_page', __( 'Newsletters per Page', 'crb' ) ),
			) )
	) );

// News Page Settings
Container::make( 'post_meta', __( 'News Page Settings', 'crb' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_template', '=', 'templates/news.php' )
	->add_fields( array(
		Field::make( 'complex', 'crb_news_page_fields', '' )
			->set_layout( 'tabbed-vertical' )
			->add_fields( 'intro', __( 'Intro', 'crb' ), crb_get_intro_fields() )	
			->add_fields( 'news', __( 'News', 'crb' ), array(
				Field::make( 'text', 'news_per_page', __( 'News per Page', 'crb' ) ),
			) )
	) );

// Presses Page Settings
Container::make( 'post_meta', __( 'Presses Page Settings', 'crb' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_template', '=', 'templates/presses.php' )
	->add_fields( array(
		Field::make( 'complex', 'crb_presses_page_fields', '' )
			->set_layout( 'tabbed-vertical' )
			->add_fields( 'intro', __( 'Intro', 'crb' ), crb_get_intro_fields() )	
			->add_fields( 'presses', __( 'Presses', 'crb' ), array(
				Field::make( 'text', 'presses_per_page', __( 'Presses per Page', 'crb' ) ),
			) )
	) );

// Default Page Settings
Container::make( 'post_meta', __( 'Default Page Settings', 'crb' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_template', '!=', 'templates/home.php' )
	->where( 'post_template', '!=', 'templates/all-conditions.php' )
	->where( 'post_template', '!=', 'templates/patient-stories.php' )
	->where( 'post_template', '!=', 'templates/all-conditions.php' )
	->where( 'post_template', '!=', 'templates/about.php' )
	->where( 'post_template', '!=', 'templates/locations.php' )
	->where( 'post_template', '!=', 'templates/events.php' )
	->where( 'post_template', '!=', 'templates/newsletters.php' )
	->where( 'post_template', '!=', 'templates/news.php' )
	->where( 'post_template', '!=', 'templates/presses.php' )
	->where( 'post_template', '!=', 'templates/staff.php' )
	->add_fields( array(
		Field::make( 'checkbox', 'crb_default_page_right_aligned_banner', __( 'Right Aligned Intro Overlay', 'crb' ) ),
		Field::make( 'checkbox', 'crb_default_page_title_under_the_intro', __( 'Title Under the Intro', 'crb' ) ),
		Field::make( 'text', 'crb_default_page_subtitle', __( 'Subtitle', 'crb' ) ),
		Field::make( 'text', 'crb_default_page_text', __( 'Text', 'crb' ) ),
		Field::make( 'checkbox', 'crb_show_default_page_menu', __( 'Show Menu', 'crb' ) ),
		Field::make( 'complex', 'crb_default_page_fields', '' )
			->set_layout( 'tabbed-vertical' )
			->add_fields( 'text', __( 'Text', 'crb' ), array(
				Field::make( 'rich_text', 'text', '' )
			) )
			->add_fields( 'callout', __( 'Callout', 'crb' ), crb_get_callout_fields() )	
			->add_fields( 'boxes', __( 'Boxes', 'crb' ), array(
				Field::make( 'separator', 'crb_boxes_separator', __( 'You can manage your boxes from Theme Options > Boxes', 'crb' ) )
			) )	
			->add_fields( 'pay_bill_online', __( 'Pay Bill Online', 'crb' ), array(
				Field::make( 'rich_text', 'text', __( 'Text', 'crb' ) ),
				Field::make( 'image', 'tug_invoice', __( 'TUG Invoice', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'association', 'tug_locations', __( 'TUG Locations', 'crb' ) )
					->set_types( array(
				        array(
				            'type'      => 'post',
				            'post_type' => 'crb_location',
				        )
				    ) ),
				Field::make( 'text', 'tug_btn_link', __( 'TUG Button Link', 'crb' ) ),
				Field::make( 'image', 'tuc_invoice', __( 'TUC Invoice', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'association', 'tuc_locations', __( 'TUC Locations', 'crb' ) )
					->set_types( array(
				        array(
				            'type'      => 'post',
				            'post_type' => 'crb_location',
				        )
				    ) ),
				Field::make( 'text', 'tuc_btn_link', __( 'TUC Button Link', 'crb' ) ),
				Field::make( 'textarea', 'note', __( 'Note', 'crb' ) ),
			) )	
	) );

// CPT Post
Container::make( 'post_meta', __( 'Post Settings', 'crb' ) )
	->where( 'post_type', '=', 'post' )
	->add_fields( array(
		Field::make( 'text', 'crb_post_author', __( 'Author', 'crb' ) )
			->set_width( 50 ),
		Field::make( 'text', 'crb_post_author_link', __( 'Link' ) )
			->set_width( 50 ),
	) );

// CPT Video
Container::make( 'post_meta', __( 'Video Settings', 'crb' ) )
	->where( 'post_type', '=', 'crb_video' )
	->add_fields( array(
		Field::make( 'text', 'crb_video_link', __( 'Link', 'crb' ) ),
		Field::make( 'association', 'crb_video_care_area', __( 'Care Areas' ) )
		    ->set_types( array(
		        array(
		            'type'      => 'post',
		            'post_type' => 'crb_care_area',
		        )
		    ) )
	) );

// CPT Position
Container::make( 'post_meta', __( 'Position Settings', 'crb' ) )
	->where( 'post_type', '=', 'crb_position' )
	->add_fields( array(
		Field::make( 'association', 'crb_position_locations', __( 'Locations' ) )
		    ->set_types( array(
		        array(
		            'type'      => 'post',
		            'post_type' => 'crb_location',
		        )
		    ) )
	) );

// CPT Team Member
Container::make( 'post_meta', __( 'Team Member Settings', 'crb' ) )
	->where( 'post_type', '=', 'crb_team_member' )
	->add_fields( array(
		Field::make( 'image', 'crb_team_member_image', __( 'Image' ) )
	) );

// CPT Event
Container::make( 'post_meta', __( 'Event Settings', 'crb' ) )
	->where( 'post_type', '=', 'crb_event' )
	->add_fields( array(
		Field::make( 'image', 'crb_event_image', __( 'Image', 'crb' ) ),
		Field::make( 'date', 'crb_event_date', __( 'Date', 'crb' ) ),
		Field::make( 'checkbox', 'crb_event_is_important', __( 'Important Event', 'crb' ) ),
	) );

// CPT Newsletters, News, Presses
Container::make( 'post_meta', __( 'Settings', 'crb' ) )
	->where( 'post_type', '=', 'crb_newsletter' )
	->or_where( 'post_type', '=', 'crb_news' )
	->or_where( 'post_type', '=', 'crb_press' )
	->add_fields( array(
		Field::make( 'text', 'crb_news_subtitle', __( 'Subtitle', 'crb' ) ),
		Field::make( 'file', 'crb_news_file', __( 'File', 'crb' ) ),
	) );

// CPT Care Area
Container::make( 'post_meta', __( 'Care Area Settings', 'crb' ) )
	->where( 'post_type', '=', 'crb_care_area' )
	->add_fields( array(
		Field::make( 'association', 'crb_care_area_conditions', __( 'Select Conditions', 'crb' ) )
		->set_types( array(
	        array(
	            'type'      => 'post',
	            'post_type' => 'crb_condition',
	        )
	    ) ),
		Field::make( 'complex', 'crb_care_area_fields', '' )
			->set_layout( 'tabbed-vertical' )
			->add_fields( 'intro', __( 'Intro', 'crb' ), crb_get_intro_fields() )	
			->add_fields( 'conditions', __( 'Conditions', 'crb' ), array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'subtitle', __( 'Subtitle', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'textarea', 'content', __( 'Content', 'crb' ) ),
			) )	
			->add_fields( 'callout', __( 'Callout', 'crb' ), array(
				Field::make( 'image', 'image', __( 'Image', 'crb' ) ),
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'text', 'text', __( 'Text', 'crb' ) ),
				Field::make( 'text', 'btn_label', __( 'Button Label', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'btn_link', __( 'Button Link', 'crb' ) )
					->set_width( 50 ),
			) )	
			->add_fields( 'boxes', __( 'Boxes', 'crb' ), array(
				Field::make( 'separator', 'crb_boxes_separator', __( 'You can manage your boxes from Theme Options > Boxes', 'crb' ) )
			) )	
			->add_fields( 'recent-blog-posts', __( 'Recent Blogs', 'crb' ), array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'text', 'btn_label', __( 'Button Label', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'btn_link', __( 'Button Link', 'crb' ) )
					->set_width( 50 ),
			) )	
	) );

// CPT Condition
Container::make( 'post_meta', __( 'Condition Settings' ) )
    ->where( 'post_type', '=', 'crb_condition' )
    ->add_fields( array(
		Field::make( 'complex', 'crb_condition_fields', '' )
			->set_layout( 'tabbed-vertical' )
			->add_fields( 'intro', __( 'Intro', 'crb' ), crb_get_intro_fields() )	
			->add_fields( 'tabs', __( 'Tabs', 'crb' ), array(
				Field::make( 'complex', 'tabs', '' )	
					->add_fields( array(
						Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
						Field::make( 'rich_text', 'content', __( 'Content', 'crb' ) )
					) )
					->set_layout( 'tabbed-horizontal' )
					->set_max( 7 )
					->set_header_template( '<%- title %>' ),
			) )	
			->add_fields( 'section-with-video', __( 'Section with Video', 'crb' ), array(
				Field::make( 'image', 'image', __( 'Image', 'crb' ) ),
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'textarea', 'content', __( 'Content', 'crb' ) ),
				Field::make( 'text', 'video', __( 'Video', 'crb' ) ),
			) )
			->add_fields( 'boxes', __( 'Boxes', 'crb' ), array(
				Field::make( 'separator', 'crb_boxes_separator', __( 'You can manage your boxes from Theme Options > Boxes', 'crb' ) )
			) )	
			->add_fields( 'featured-story', __( 'Story', 'crb' ), array(	
				Field::make( 'image', 'image', __( 'Image', 'crb' ) ),
					Field::make( 'textarea', 'title', __( 'Title', 'crb' ) ),
					Field::make( 'text', 'subtitle', __( 'Subtitle', 'crb' ) ),
					Field::make( 'text', 'btn_label', __( 'Button Label', 'crb' ) )
						->set_width( 50 ),
					Field::make( 'text', 'btn_link', __( 'Button Link', 'crb' ) )
						->set_width( 50 ),
					Field::make( 'association', 'chosen_story', __( 'Story', 'crb' ) )
					->set_types( array(
				        array(
				            'type'      => 'post',
				            'post_type' => 'crb_patient_story',
				        )
				    ) )
					->set_max( 1 )
			) )	
			->add_fields( 'text', __( 'Text', 'crb' ), array(
				Field::make( 'rich_text', 'content', __( 'Content', 'crb' ) )
			) )
	) );

// CPT Patient Story
Container::make( 'post_meta', __( 'Patient Story Settings', 'crb' ) )
	->where( 'post_type', '=', 'crb_patient_story' )
	->add_fields( array(
		Field::make( 'text', 'crb_patient_story_subtitle', __( 'Subtitle', 'crb' ) ),
		Field::make( 'association', 'crb_patient_story_related_care_area', __( 'Related Care Area', 'crb' ) )
			->set_types( array(
		        array(
		            'type'      => 'post',
		            'post_type' => 'crb_care_area',
		        )
		    ) )
			->set_max( 1 )
	) );

// CPT Staff
Container::make( 'post_meta', __( 'Staff Settings', 'crb' ) )
	->where( 'post_type', '=', 'crb_staff' )
	->add_fields( array(
		Field::make( 'checkbox', 'crb_staff_hide_from_request_appointment_form', __( 'Hide from Request an Appointment Form', 'crb' ) ),
		Field::make( 'text', 'crb_staff_last_name', __( 'Last Name', 'crb' ) ),
		Field::make( 'checkbox', 'crb_staff_right_aligned_banner', __( 'Right Aligned Intro Overlay', 'crb' ) ),
		Field::make( 'checkbox', 'crb_staff_title_under_the_intro', __( 'Title Under the Intro', 'crb' ) ),
		Field::make( 'separator', 'crb_staff_style_subtitle', __( 'Medical Title', 'crb' ) ),
		Field::make( 'text', 'crb_staff_subtitle', '' ),
		Field::make( 'separator', 'crb_staff_style_info', __( 'Specialties', 'crb' ) ),
		Field::make( 'text', 'crb_staff_info', '' ),
		Field::make( 'image', 'crb_staff_intro_image', __( 'Lifestyle Image', 'crb' ) ),
		Field::make( 'text', 'crb_staff_intro_subtitle', __( 'Header Subtitle', 'crb' ) ),
		Field::make( 'text', 'crb_staff_intro_text', __( 'Header Description', 'crb' ) ),
		Field::make( 'separator', 'crb_staff_style_sidebar', __( 'Sidebar', 'crb' ) ),
		Field::make( 'image', 'crb_staff_sidebar_image', __( 'Headshot Image', 'crb' ) ),
		Field::make( 'complex', 'crb_staff_sidebar_btns', __( 'Buttons', 'crb' ) )
			->add_fields( array(
				Field::make( 'text', 'btn_label', __( 'Button label', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'btn_link', __( 'Button Link', 'crb' ) )
					->set_width( 50 ),
			) )
			->set_max( 2 )
			->set_layout( 'tabbed-horizontal' )
			->set_header_template( '<%- btn_label %>' ),
			Field::make( 'text', 'crb_staff_sidebar_specialities_list_title', __( 'Specialities List Title', 'crb' ) ),
			Field::make( 'text', 'crb_staff_sidebar_certificates_list_title', __( 'Certificates List Title', 'crb' ) ),
			Field::make( 'separator', 'crb_staff_locations_style_title', __( 'Locations', 'crb' ) ),
			Field::make( 'text', 'crb_staff_locations_title', __( 'Title', 'crb' ) ),
	) );

// CPT Physician
Container::make( 'post_meta', __( 'Physician Settings', 'crb' ) )
	->where( 'post_type', '=', 'crb_physician' )
	->add_fields( array(
		Field::make( 'checkbox', 'crb_physician_hide_from_request_appointment_form', __( 'Hide from Request an Appointment Form', 'crb' ) ),
		Field::make( 'text', 'crb_physician_last_name', __( 'Last Name', 'crb' ) ),
		Field::make( 'checkbox', 'crb_physician_right_aligned_banner', __( 'Right Aligned Intro Overlay', 'crb' ) ),
		Field::make( 'checkbox', 'crb_physician_title_under_the_intro', __( 'Title Under the Intro', 'crb' ) ),
		Field::make( 'separator', 'crb_physician_style_subtitle', __( 'Medical Title', 'crb' ) ),
		Field::make( 'text', 'crb_physician_subtitle', '' ),
		Field::make( 'separator', 'crb_physician_style_info', __( 'Specialties', 'crb' ) ),
		Field::make( 'text', 'crb_physician_info', '' ),
		Field::make( 'image', 'crb_physician_intro_image', __( 'Lifestyle Image', 'crb' ) ),
		Field::make( 'text', 'crb_physician_intro_subtitle', __( 'Header Subtitle', 'crb' ) ),
		Field::make( 'text', 'crb_physician_intro_text', __( 'Header Description', 'crb' ) ),
		Field::make( 'separator', 'crb_physician_style_sidebar', __( 'Sidebar', 'crb' ) ),
		Field::make( 'image', 'crb_physician_sidebar_image', __( 'Headshot Image', 'crb' ) ),
		Field::make( 'complex', 'crb_physician_sidebar_btns', __( 'Buttons', 'crb' ) )
			->add_fields( array(
				Field::make( 'text', 'btn_label', __( 'Button label', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'btn_link', __( 'Button Link', 'crb' ) )
					->set_width( 50 ),
			) )
			->set_max( 2 )
			->set_layout( 'tabbed-horizontal' )
			->set_header_template( '<%- btn_label %>' ),
		Field::make( 'text', 'crb_physician_sidebar_specialities_list_title', __( 'Specialities List Title', 'crb' ) ),
		Field::make( 'text', 'crb_physician_sidebar_certificates_list_title', __( 'Certificates List Title', 'crb' ) ),
		Field::make( 'separator', 'crb_physician_locations_style_title', __( 'Locations', 'crb' ) ),
		Field::make( 'text', 'crb_physician_locations_title', __( 'Title', 'crb' ) ),
	) );

// CPT Location
Container::make( 'post_meta', __( 'Location Settings', 'crb' ) )
	->where( 'post_type', '=', 'crb_location' )
 	->add_fields( array(
 		Field::make( 'checkbox', 'crb_location_sticky', __( 'Sticky', 'crb' ) ),
 		Field::make( 'association', 'crb_location_related_physicians', __( 'Related Physicians', 'crb' ) )
 			->set_types( array(
		        array(
		            'type'      => 'post',
		            'post_type' => 'crb_physician',
		        )
		    ) ),
		Field::make( 'association', 'crb_location_related_staff', __( 'Related Staff', 'crb' ) )
			->set_types( array(
		        array(
		            'type'      => 'post',
		            'post_type' => 'crb_staff',
		        )
		    ) ),
 		Field::make( 'map', 'crb_location_map', __( 'Map', 'crb' ) ),
 		Field::make( 'textarea', 'crb_location_address', __( 'Address', 'crb' ) ),
 		Field::make( 'textarea', 'crb_location_working_hours', __( 'Working Hours', 'crb' ) ),
 		Field::make( 'text', 'crb_location_phone', __( 'Phone', 'crb' ) ),
		Field::make( 'complex', 'crb_location_fields', '' )
			->set_layout( 'tabbed-vertical' )
			->add_fields( 'intro', __( 'Intro', 'crb' ), crb_get_intro_fields() )	
			->add_fields( 'location', __( 'Location', 'crb' ), array(
				Field::make( 'separator', 'office_hours_separator', __( 'Office Hours', 'crb' ) ),
				Field::make( 'text', 'office_hours_title', __( 'Title', 'crb' ) ),
				Field::make( 'text', 'office_hours_content', __( 'Content', 'crb' ) ),
				Field::make( 'separator', 'telephone_hours_separator', __( 'Telephone Hours', 'crb' ) ),
				Field::make( 'text', 'telephone_hours_title', __( 'Title', 'crb' ) ),
				Field::make( 'text', 'telephone_hours_content', __( 'Content', 'crb' ) ),
				Field::make( 'separator', 'fax_separator', __( 'Fax', 'crb' ) ),
				Field::make( 'text', 'fax_title', __( 'Title', 'crb' ) ),
				Field::make( 'textarea', 'fax', __( 'Content', 'crb' ) ),
			) )	
			->add_fields( 'physicians', __( 'Show Physicians', 'crb' ), array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) )
			) )
			->add_fields( 'additional-staff', __( 'Show Staff', 'crb' ), array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) )
			) )
			->add_fields( 'boxes', __( 'Boxes', 'crb' ), array(
				Field::make( 'separator', 'crb_boxes_separator', __( 'You can manage your boxes from Theme Options > Boxes', 'crb' ) )
			) )	
			->add_fields( 'callout', __( 'Callout', 'crb' ), array(
				Field::make( 'image', 'image', __( 'Image', 'crb' ) ),
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'text', 'text', __( 'Text', 'crb' ) ),
				Field::make( 'text', 'btn_label', __( 'Button Label', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'btn_link', __( 'Button Link', 'crb' ) )
					->set_width( 50 ),
			) )	
	) );