<?php
/**
 * Template Name: Patient Stories
 */
?>

<?php get_header(); the_post(); ?>

<?php crb_the_sections( 'crb_patient_stories_fields', 'patient-stories' ); ?>

<?php get_footer(); ?>