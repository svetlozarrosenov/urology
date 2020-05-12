<?php
/**
 * Template Name: News
 */
?>

<?php get_header(); the_post(); ?>

<?php crb_the_sections( 'crb_news_page_fields', 'news' ); ?>

<?php get_footer(); ?>