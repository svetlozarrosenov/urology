<?php
if ( empty( $section['past_events_per_page'] ) ) {
	$section['past_events_per_page'] = get_option( 'posts_per_page' );
}
if ( empty( $section['upcoming_events_per_page'] ) ) {
	$section['upcoming_events_per_page'] = get_option( 'posts_per_page' );
}
?>

<img class="spinner" src="<?php echo get_bloginfo( 'stylesheet_directory' ); ?>/resources/images/spinner.gif" alt="">

<section class="section-events section-base" data-past_events_per_page="<?php echo $section['past_events_per_page']; ?>">
	<div class="shell">
		<div class="section__content">
			<?php 
			crb_render_fragment( 'events/events-loop', [
				'posts_per_page' => $section['upcoming_events_per_page'],
				'compare' => '>=',
				'value' => date( 'Y-m-d' ),
				'order' => 'ASC'
			] ); 
			?>
		</div><!-- /.section__content -->

		<div class="section__actions">
			<?php crb_render_fragment( 'events/filter' ); ?>
<a href="#" class="btn btn--outline show-events-filter">
				<?php _e( 'Show Past Events', 'crb' ); ?>
			</a>		</div><!-- /.section__actions -->
	</div><!-- /.shell -->
</section><!-- /.section-events -->