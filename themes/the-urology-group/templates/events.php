<?php
/**
 * Template Name: Events
 */
?>

<?php get_header(); the_post(); ?>

<?php crb_the_sections( 'crb_events_page_fields', 'events' ); ?>

<?php get_footer(); ?>