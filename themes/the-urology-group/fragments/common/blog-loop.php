<?php
if ( ! $loop->have_posts() ) {
	return;
}

?>
<section class="section-base">
	<div class="shell">
		<div class="section__content entry">
			<div class="timeline">
				<div class="timeline__head">
					<i class="fa fa-calendar" aria-hidden="true"></i>
					<p><?php echo date( 'F d, Y '); ?></p>
				</div><!-- /.timeline__head -->

				<div class="timeline__content">
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<?php crb_render_fragment('common/article-timeline') ?>
					<?php endwhile; ?>

					<?php wp_reset_postdata(); 

					carbon_pagination( 'posts', [
						'prev_html' => '<a href="{URL}" class="paging__prev">' . esc_html__( 'Previous Page', 'crb' ) . '</a>',
						'next_html' => '<a href="{URL}" class="paging__next">' . esc_html__( 'Next Page', 'crb' ) . '</a>',
						'first_html'        => '<a href="{URL}" class="paging__first"></a>',
						'last_html'         => '<a href="{URL}" class="paging__last"></a>',
						'limiter_html'      => '<li class="paging__spacer">...</li>',
						'current_page_html' => '<span class="paging__label">Page {CURRENT_PAGE} of {TOTAL_PAGES}</span>',
						'current_page' => $paged,
						'total_pages' => $loop->max_num_pages,
					] );
					?>
				</div><!-- /.timeline__content -->
			</div><!-- /.timeline -->
		</div><!-- /.section__content -->
	</div><!-- /.shell -->
</section><!-- /.section-base -->