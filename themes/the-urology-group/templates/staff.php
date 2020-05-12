<?php
/**
 * Template Name: Staff
 */
?>

<?php get_header(); the_post(); ?>

<?php crb_the_sections( 'crb_staff_page_fields', 'staff' ); ?>

<?php get_footer(); ?>