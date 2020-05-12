<?php
/**
 * Template Name: All Physicians
 */
?>

<?php get_header(); the_post(); ?>

<?php crb_the_sections( 'crb_all_physicians_page_fields', 'all-physicians' ); ?>

<?php get_footer(); ?>