<?php
/**
 * Template Name: Locations
 */
?>

<?php get_header(); the_post(); ?>

<?php crb_the_sections( 'crb_all_locations_page_fields', 'all-locations' ); ?>

<?php get_footer(); ?>