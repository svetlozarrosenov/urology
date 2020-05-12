<?php get_header(); the_post(); ?>

<?php crb_render_fragment( 'common/intro', [
	'section' => [
		'image' => carbon_get_the_post_meta( 'crb_physician_intro_image' ),
		'title' => get_the_title(),
		'subtitle' => carbon_get_the_post_meta( 'crb_physician_intro_subtitle' ),
		'text' => carbon_get_the_post_meta( 'crb_physician_intro_text' ),
		'right_aligned_banner' => carbon_get_the_post_meta( 'crb_physician_right_aligned_banner' ),
		'title_under_the_intro' => carbon_get_the_post_meta( 'crb_physician_title_under_the_intro' ),
	]
] );
?>

<section class="section-base section-single">
	<div class="shell">
		<div class="section__container">
			<div class="section__content entry">
				<?php the_content(); ?>
			</div><!-- /.section__content -->

			<?php crb_render_fragment( 'single-physician/sidebar' ); ?>
		</div><!-- /.section__container -->

		<?php crb_render_fragment( 'single-physician/locations' ); ?>
	</div><!-- /.shell -->
</section><!-- /.section-base -->

<?php get_footer(); ?>