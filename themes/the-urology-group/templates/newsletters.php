<?php
/**
 * Template Name: Newsletters
 */
?>

<?php get_header(); the_post(); ?>

<?php crb_the_sections( 'crb_newsletters_page_fields', 'newsletters' ); ?>

<?php get_footer(); ?>