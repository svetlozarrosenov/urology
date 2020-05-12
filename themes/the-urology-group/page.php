<?php get_header(); the_post(); ?>

<?php
crb_render_fragment( 'common/intro', [
	'section' => [
		'title' => get_the_title(),
		'subtitle' => esc_html( carbon_get_the_post_meta( 'crb_default_page_subtitle' ) ),
		'text' => esc_html( carbon_get_the_post_meta( 'crb_default_page_text' ) ),
		'image_thumbnail' => get_the_post_thumbnail_url( get_the_ID(), 'full' ), 
		'right_aligned_banner' => carbon_get_the_post_meta( 'crb_default_page_right_aligned_banner' ),
		'title_under_the_intro' => carbon_get_the_post_meta( 'crb_default_page_title_under_the_intro' )
	]
] );
?>

<section class="section-text section-base">
	<div class="shell">
		<?php 
		if ( has_nav_menu( 'default-page-menu' ) && carbon_get_the_post_meta( 'crb_show_default_page_menu' ) ) {
			wp_nav_menu( array(
				'theme_location' => 'default-page-menu',
				'container' => 'div',
				'container_class' => 'nav-links nav-links--small'
			) );
		}
		?>

		<div class="section__content entry">
			<?php the_content(); ?>
		</div><!-- /.section__content -->
	</div><!-- /.shell -->
</section><!-- /.section-text -->

<?php crb_the_sections( 'crb_default_page_fields', 'default-page' ); ?>

<?php get_footer(); ?>