<?php
$team_members_loop = new WP_Query( array(
	'post_type' => 'crb_team_member',
	'posts_per_page' => $section['team_members_per_page'],
) );

if ( ! $team_members_loop->have_posts() ) {
	return;
} 
?>
<section class="section-members section-base">
	<div class="shell">
		<div class="members">
			<ul>
				<?php while ( $team_members_loop->have_posts() ) : $team_members_loop->the_post(); ?>
					<li>
						<div class="member">
							<?php
							$image = carbon_get_the_post_meta( 'crb_team_member_image' );
							?>
							<?php if ( ! empty( $image ) ) : ?>
								<div class="member__image">
									<?php echo wp_get_attachment_image( $image, 'full' ); ?>
								</div><!-- /.member__image -->
							<?php endif; ?>

							<div class="member__content entry">
								<h5><?php the_title(); ?></h5>

								<p>
									<?php the_excerpt(); ?>
								</p>

								<a href="<?php the_permalink(); ?>" class="links-all">
									<?php _e( 'Read More', 'crb' ); ?>
								</a>
							</div><!-- /.member__content -->
						</div><!-- /.member -->
					</li>
				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>
			</ul>
		</div><!-- /.members -->
	</div><!-- /.shell -->
</section><!-- /.section-members -->