<?php get_header(); ?>

<section class="section-base">
	<div class="shell">
		<div class="section__content entry">
			<div class="timeline">
				<?php if ( have_posts() ) : ?>
					<div class="timeline__head">
						<i class="fa fa-calendar" aria-hidden="true"></i>
						<p><?php echo date( 'F d, Y '); ?></p>
					</div><!-- /.timeline__head -->
				<?php endif; ?>

				<div class="timeline__content">
					<?php 
					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post();	
							crb_render_fragment('common/article-timeline');
						}  

						wp_reset_postdata(); 

						
						carbon_pagination( 'posts', [
							'prev_html' => '<a href="{URL}" class="paging__prev">' . esc_html__( '« Previous Entries', 'crb' ) . '</a>',
							'next_html' => '<a href="{URL}" class="paging__next">' . esc_html__( 'Next Entries »', 'crb' ) . '</a>',
							'first_html'        => '<a href="{URL}" class="paging__first"></a>',
							'last_html'         => '<a href="{URL}" class="paging__last"></a>',
							'limiter_html'      => '<li class="paging__spacer">...</li>',
							'current_page_html' => '<span class="paging__label">Page {CURRENT_PAGE} of {TOTAL_PAGES}</span>',
						] );
					} else {
						crb_render_fragment( 'common/no-posts-found' );
					}
					?>
				</div><!-- /.timeline__content -->
			</div><!-- /.timeline -->
		</div><!-- /.section__content -->
	</div><!-- /.shell -->
</section><!-- /.section-base -->

<?php
get_footer();