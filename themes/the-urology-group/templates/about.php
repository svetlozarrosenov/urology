<?php
/**
 * Template Name: About
 */
?>

<?php get_header(); the_post(); ?>

<?php crb_the_sections( 'crb_about_page_fields', 'about' ); ?>

<?php get_footer(); ?>