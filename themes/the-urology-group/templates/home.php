<?php
/**
 * Template Name: Home
 */
?>

<?php get_header(); the_post(); ?>

<?php crb_the_sections( 'crb_homepage_fields', 'homepage' ); ?>

<?php get_footer(); ?>