<?php
/**
 * Template Name: Presses
 */
?>

<?php get_header(); the_post(); ?>

<?php crb_the_sections( 'crb_presses_page_fields', 'presses' ); ?>

<?php get_footer(); ?>