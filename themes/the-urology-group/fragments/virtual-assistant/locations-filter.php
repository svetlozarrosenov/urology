<?php
$locations_loop = new WP_Query( array(
	'post_type' => 'crb_location',
	'posts_per_page' => -1,
	'orderby' => 'title',
	'order' => 'ASC'
) );
if ( ! $locations_loop->have_posts() ) {
	return;
}
?>
<div class="form">
	<form action="?" method="post">
		<div class="select">
			<?php $index = 0; ?>
			<select name="field-location-assistant" id="field-location-assistant">
				<?php while ( $locations_loop->have_posts() ) : $locations_loop->the_post(); ?>
					<option value="loc<?php echo $index; ?>"><?php the_title(); ?></option>

					<?php $index++; ?>
				<?php endwhile; ?>

			<?php wp_reset_postdata(); ?>
			</select>
		</div><!-- /.select -->
	</form>
</div><!-- /.form -->