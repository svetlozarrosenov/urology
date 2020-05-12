<?php

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

Container::make( 'theme_options', __( 'Theme Options', 'crb' ) )
	->set_page_file( 'crbn-theme-options.php' )
	->add_fields( array(
		Field::make( 'text', 'crb_google_maps_api_key', __( 'Google Maps API Key', 'crb' ) )
			->help_text( sprintf(
				__( 'You can generate your own key, by visiting %s and clicking on the "GET A KEY" button there.', 'crb' ),
				sprintf(
					'<a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">%s</a>',
					_x( 'Get API Key', 'Google Maps Docs', 'crb' )
				)
			) ),
		Field::make( 'header_scripts', 'crb_header_script', __( 'Header Script', 'crb' ) ),
		Field::make( 'footer_scripts', 'crb_footer_script', __( 'Footer Script', 'crb' ) ),
	) );

Container::make( 'theme_options', __( 'Header Bar', 'crb' ) )
	->set_page_parent( 'crbn-theme-options.php' )
	->add_fields( array(
		Field::make( 'complex', 'crb_header_bar_links', __( 'Links', 'crb' ) )
			->add_fields( array(
				Field::make( 'text', 'link_label', __( 'Link Label', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'link', __( 'Link', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'checkbox', 'phone_number', __( 'Is Phone', 'crb' ) ),
				Field::make( 'checkbox', 'border', __( 'Add Border', 'crb' ) ),
				Field::make( 'checkbox', 'open_in_new_tab', __( 'Open in New Tab', 'crb' ) ),
			) )
			->set_layout( 'tabbed-horizontal' )
			->set_max( 3 )
			->set_header_template( '<%- link_label %>' ),
		Field::make( 'text', 'crb_header_bar_btn_label', __( 'Button Label', 'crb' ) )
			->set_width( 50 ),
		Field::make( 'text', 'crb_header_bar_btn_link', __( 'Button Link', 'crb' ) )
			->set_width( 50 ),
	) );


Container::make( 'theme_options', __( 'Boxes', 'crb' ) )
	->set_page_parent( 'crbn-theme-options.php' )
	->add_fields( array(
		Field::make( 'complex', 'crb_boxes', '' )
			->add_fields( 'find-location', __( 'Find a Location', 'crb' ), array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'text', 'text', __( 'Text', 'crb' ) ),
				Field::make( 'text', 'btn_label', __( 'Button Label', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'btn_link', __( 'Button Link', 'crb' ) )
					->set_width( 50 ),
			) )
			->add_fields( 'find-physician', __( 'Find a Physician', 'crb' ), array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'text', 'text', __( 'Text', 'crb' ) ),
				Field::make( 'text', 'btn_label', __( 'Button Label', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'btn_link', __( 'Button Link', 'crb' ) )
					->set_width( 50 ),
			) )
			->add_fields( 'callout', __( 'Callout', 'crb' ), array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'text', 'phone', __( 'Phone', 'crb' ) ),
				Field::make( 'text', 'text', __( 'Text', 'crb' ) ),
				Field::make( 'text', 'btn_label', __( 'Button Label', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'btn_link', __( 'Button Link', 'crb' ) )
					->set_width( 50 ),
			) )
			->set_max( 3 )
			->set_layout( 'tabbed-horizontal')
	) );

Container::make( 'theme_options', __( 'Footer Button', 'crb' ) )
	->set_page_parent( 'crbn-theme-options.php' )
	->add_fields( array(
		Field::make( 'text', 'crb_footer_btn_label', __( 'Button Label', 'crb' ) )
			->set_width( 50 ),
		Field::make( 'text', 'crb_footer_btn_link', __( 'Button Link', 'crb' ) )
			->set_width( 50 ),
	) );

Container::make( 'theme_options', __( 'Socials', 'crb' ) )
	->set_page_parent( 'crbn-theme-options.php' )
	->add_fields( array(
		Field::make( 'complex', 'crb_socials', '' )
			->add_fields( array(
				Field::make( 'icon', 'icon', __( 'Icon', 'crb' ) )
					->add_dashicons_options()
					->add_fontawesome_options()
					->set_width( 50 ),
				Field::make( 'text', 'link', __( 'Link', 'crb' ) )
					->set_width( 50 ),
			) )
			->set_layout( 'tabbed-horizontal' )
			->set_max( 3 )
	) );

Container::make( 'theme_options', __( 'Copyright', 'crb' ) )
	->set_page_parent( 'crbn-theme-options.php' )
	->add_fields( array(
		Field::make( 'text', 'crb_copyright', __( 'Content', 'crb' ) )
	) );

Container::make( 'theme_options', __( 'Virtual Assistant', 'crb' ) )
	->set_page_parent( 'crbn-theme-options.php' )
	    ->add_fields( array(
	    	Field::make( 'text', 'crb_virtual_assistant_title', __( 'title' ) ),
	        Field::make( 'text', 'crb_virtual_assistant_subtitle', __( 'Subtitle', 'crb' ) ),
	        Field::make( 'complex', 'crb_virtual_assistant_links', __( 'Links', 'crb' ) )
	        	->add_fields( 'directions-and-hours', __( 'Directions & Hours', 'crb' ), array(
	        		Field::make( 'text', 'title', __( 'Title' ) ),
	        		Field::make( 'text', 'text', __( 'Text' ) ),
	        	) )
	        	->set_header_template( '<%- title %>')
	        	->add_fields( 'billing-questions', __( 'Billing Questions', 'crb' ), array(
	        		Field::make( 'text', 'title', __( 'Title' ) ),
			        Field::make( 'text', 'text', __( 'Text' ) ),
			        Field::make( 'text', 'link_label', __( 'Link Label' ) )
			        	->set_width( 50 ),
			        Field::make( 'text', 'link', __( 'Link' ) )
			        	->set_width( 50 ),
			        Field::make( 'text', 'tab_title', __( 'Tab Title' ) ),
			        Field::make( 'rich_text', 'tab_text', __( 'Tab Text', 'crb' ) ),
	        	) )
	        	->set_header_template( '<%- title %>')
	        	->add_fields( 'text', __( 'Text', 'crb' ), array(
	        		Field::make( 'text', 'title', __( 'Title' ) ),
	        		Field::make( 'rich_text', 'content', __( 'Content' ) ),
	        	) )
	        	->set_header_template( '<%- title %>')
	        	->set_layout('tabbed-horizontal')
	    ) );
