<?php
if ( ! $positions_loop->have_posts() ) {
	return;
}
?>

<div class="careers">
	<ul>
		<?php while ( $positions_loop->have_posts() ) : $positions_loop->the_post(); ?>
			<li>
				<div class="career">
					<a href="<?php the_permalink(); ?>">
						<h4><?php the_title(); ?></h4>

						<?php crb_render_fragment( 'about/positions/locations' ); ?>
					</a>
				</div><!-- /.career -->
			</li>
		<?php endwhile; ?>
		
		<?php wp_reset_postdata(); ?>
	</ul>
</div><!-- /.careers -->