<?php
/**
 * Template Name: All Conditions
 */
?>

<?php get_header(); the_post(); ?>

<?php crb_the_sections( 'crb_all_conditions_fields', 'conditions' ); ?>

<?php get_footer(); ?>